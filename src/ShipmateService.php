<?php

namespace Shipmate;

require "Exceptions/CurlErrorException.php";
require "Exceptions/BadRequestException.php";
require "Exceptions/UnauthorizedException.php";
require "Exceptions/ForbiddenException.php";
require "Exceptions/NotFoundException.php";
require "Exceptions/InternalServerErrorException.php";
require 'Responses/ShipmentResponse.php';
require 'Responses/PackagingOptions.php';
require 'Responses/PackagingType.php';
require 'Responses/ShipmentService.php';
require 'Responses/ShipmentServicesResponse.php';
require 'Responses/Services/DeliveryService.php';
require 'Responses/Services/DeliveryServiceCondition.php';
require 'Responses/TrackingEvents/ParcelTrackingEvents.php';
require 'Responses/TrackingEvents/TrackingEvent.php';
require 'Responses/Label.php';
require 'Responses/AccessTokenResponse.php';
require 'User.php';
require 'utils/convertKeysToCamelCase.php';
require 'utils/mapArrayToObject.php';
require 'Environment.php';

use Shipmate\Exceptions\CurlErrorException;
use Shipmate\Exceptions\BadRequestException;
use Shipmate\Exceptions\UnauthorizedException;
use Shipmate\Exceptions\ForbiddenException;
use Shipmate\Exceptions\NotFoundException;
use Shipmate\Exceptions\InternalServerErrorException;
use Shipmate\Responses\ShipmentResponse;
use Shipmate\Responses\PackagingType;
use Shipmate\Responses\PackagingOptions;
use Shipmate\Responses\ShipmentServicesResponse;
use Shipmate\Responses\Services\DeliveryService;
use Shipmate\Responses\Services\DeliveryServiceCondition;
use Shipmate\Responses\TrackingEvents\ParcelTrackingEvents;
use Shipmate\Responses\TrackingEvents\TrackingEvent;
use Shipmate\Responses\Label;
use Shipmate\Responses\AccessTokenResponse;
use Shipmate\Location;
use Shipmate\User;
use Shipmate\Environment;

class ShipmateService {

    protected $productionUrl = 'https://api.shipmate.co.uk/v1.2';

    protected $stagingUrl = 'https://api-staging.shipmate.co.uk/v1.2';

    protected $environment = Environment::PRODUCTION;

    public $apiKey = '';

    public $apiToken = '';

    // setters 

    /**
	* Set the Environment
	*
	* @param \Shipmate\Environment $environment Accepts either Environment::STAGING or Environment::PRODUCTION. If setEnvironment is not called then production URL will be used by default in requests.
    *
	* @return void
	**/

    function setEnvironment($environment) {
        $this->environment = $environment;
    }

    /**
	* Set the API Key
	*
	* @param string $apiKey API Key 
    *
    * @link https://www.shipmate.co.uk/guides/api#registering
	*
	* @return void
	**/

    public function setAPIKey($apiKey) {
        $this->apiKey = $apiKey;
    }

    /**
	* Set the API Token
	*
	* @param string $apiToken API Token
	*
    * @link https://www.shipmate.co.uk/guides/api#authentication
    *
	* @return void
	**/

    public function setAPIToken($apiToken) {
        $this->apiToken = $apiToken;
    }

    // getters
    
    /**
	* Get the Environment
	*
	* @return string The environment in which API requests will be made in
	**/

    public function environment() {
        return $this->environment;
    }

    /**
	* Get the API Key
	*
	* @return string API Key
	**/

    public function apiKey() {
        return $this->apiKey;
    }

    /**
	* Get the API Token
	*
	* @return string API Token
	**/

    public function apiToken() {
        return $this->apiToken;
    }

    public function setupCurl($endpoint, $method, $body = null) { // TODO Check if null as default is error-prone
        $ch = curl_init();
        
        $headers = [
            'X-SHIPMATE-API-KEY: ' . $this->apiKey,
            'X-SHIPMATE-TOKEN: ' . $this->apiToken,
            'Accept: application/json',
            'Content-Type: application/json'
        ];

        curl_setopt($ch, CURLOPT_URL, $this->baseUrl() . $endpoint);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // if body exists, POST it

        if ($body) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        }

        return $ch;
    }

    public function baseUrl() {
        if ($this->environment == Environment::STAGING) {
            return $this->stagingUrl;
        }
        else if ($this->environment == Environment::PRODUCTION) {
             return $this->productionUrl;
        }
        else {
            throw new CurlErrorException('Invalid Environment set. Please check that the parameter passed to setEnvironment() is either Environment::STAGING or Environment::PRODUCTION');
        }
    }

    /**
    * Generate Access Token
    *
    * @param string $username Shipmate username
    * @param string $password Shipmate password
    *
    * @return \Shipmate\Responses\AccessTokenResponse Contains access token and user details 
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/

    function generateAccessToken($username, $password) {

        $curl = $this->setupCurl('/tokens', 'POST', json_encode(['username' => $username, 'password' => $password]));   

        $response = curl_exec($curl);    
        
        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        // Decode JSON into associative array
        $dataArray = json_decode($response, true);

        // Access value of "data" (i.e the returned Object)
        $dataArray = $dataArray["data"];

        // Convert keys of the array to camelCase
        $dataArray = convertKeysToCamelCase($dataArray);

        $newAccessTokenResponseObj = new AccessTokenResponse();
        $newAccessTokenResponseObj = mapArrayToObject($dataArray, $newAccessTokenResponseObj);

        // Handle nested objects
        $userObj = new User();
        $userObj = mapArrayToObject($dataArray['user'], $userObj);

        $newAccessTokenResponseObj->setUser($userObj);

        return $newAccessTokenResponseObj;
    }   

    /**
    * Validate Access Token
    *
    * @return \Shipmate\Responses\AccessTokenResponse Contains access token and user details
    *
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/

    function validateAccessToken() {
        $curl = $this->setupCurl('/tokens', 'GET');   

        $response = curl_exec($curl); 
        
        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        // Decode JSON into associative array
        $dataArray = json_decode($response, true);

        // Access value of "data" (i.e the returned Object)
        $dataArray = $dataArray["data"];

        // Convert keys of the array to camelCase
        $dataArray = convertKeysToCamelCase($dataArray);

        $newAccessTokenResponseObj = new AccessTokenResponse();
        $newAccessTokenResponseObj = mapArrayToObject($dataArray, $newAccessTokenResponseObj);

        // Handle nested objects
        $userObj = new User();
        $userObj = mapArrayToObject($dataArray['user'], $userObj);

        $locationsArray = [];

        foreach ($dataArray['user']['locations'] as $locationData) {
            $locationObj = new Location();
            $locationObj = mapArrayToObject($locationData, $locationObj);
            $locationObj->setAddressPostZipCode($locationData['addressPostalZipCode']);
            
            $locationsArray[] = $locationObj;
        }

        $userObj->setLocations($locationsArray);
        $newAccessTokenResponseObj->setUser($userObj);

        return $newAccessTokenResponseObj;
    }

    /**
    * Invalidate Access Token
    *
    * @return string Empty server message
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/

    function invalidateAccessToken() {
        $curl = $this->setupCurl('/tokens', 'DELETE');   

        $response = curl_exec($curl);    
        
        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        return $response;
    }

    /**
    * Create a Shipment 
    *
    * @param \Shipmate\Shipment\Shipment $shipment Shipment Object 
    *
    * @return array Shipment Response Objects
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws NotFoundException when response HTTP is 404
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/
    
    public function createShipment($shipment) {

        $curl = $this->setupCurl('/shipments', 'POST', json_encode($shipment));   

        $response = curl_exec($curl);    
        
        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        // Decode JSON into associative array
        $dataArray = json_decode($response, true);

        $dataArray = $dataArray['data'];

        $shipmentResponsesArray = [];

        foreach($dataArray as $shipmentResponse) {

        // Converts keys of the array to camelCase
        $shipmentResponse = convertKeysToCamelCase($shipmentResponse);

        $newShipmentResponse = new ShipmentResponse();

        // Map top layer properties of array to object 
        $newShipmentResponse = mapArrayToObject($shipmentResponse, $newShipmentResponse);
        
        // Handle nested objects
        // Address Object
        $addressInstance = new Address();
        $addressObj = mapArrayToObject($shipmentResponse['toAddress'], $addressInstance);
        $addressObj->setName($shipmentResponse['toAddress']['deliveryName']);
        $newShipmentResponse->setToAddress($addressObj);

        $shipmentResponsesArray[] = $newShipmentResponse;
        }

        return $shipmentResponsesArray;
    }

    /**
    * Get the Services for a Shipment 
    *
    * @param \Shipmate\Shipment\Shipment $shipment Shipment Object
    *
    * @return \Shipmate\Responses\ShipmentServicesResponse All suitable services for the supplied Shipment, along with delivery costs.
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/
         
    public function getServicesForShipment($shipment) {
      
        $curl = $this->setupCurl('/shipments/get-services', 'POST', json_encode($shipment));

        $response = curl_exec($curl);
        
        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        // Decode JSON into associative array
        $dataArray = json_decode($response, true);  

        // Convert keys of the array to camelCase
        $dataArray = convertKeysToCamelCase($dataArray);   

        $newShipmentServicesResponse = new ShipmentServicesResponse();

        // Set recommended service
            $recommendedServiceObj = new ShipmentService();
            // map recomended_services array to ShipmentService
            $recommendedServiceObj = mapArrayToObject($dataArray['data']['recommendedService'], $recommendedServiceObj);
            // push ShipmentService to recommendedService property of ShipmentServicesResponse Object
            $newShipmentServicesResponse->setRecommendedService($recommendedServiceObj);

        // Set other services
            $servicesData = $dataArray['data']['services'];

            foreach ($servicesData as $serviceData) {
                $shipmentServiceObj = new ShipmentService();

                // map the current service to $shipmentServiceObj 
                $shipmentServiceObj = mapArrayToObject($serviceData, $shipmentServiceObj);

                // push $shipmentServiceObj to shipmentServicesResponse services array 
                $newShipmentServicesResponse->addService($shipmentServiceObj);
            }

        return $newShipmentServicesResponse;
    }

    /**
    * Cancel a Shipment 
    *
    * @param string $reference Shipment Reference
    *
    * @return string Server message response
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws NotFoundException when response HTTP is 404
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/

    public function cancelShipment($reference) {

        $curl = $this->setupCurl("/shipments/$reference", 'DELETE');

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        return $response;
    }

    /**
    * Create a SKU
    *
    * @param \Shipmate\SKU $sku A SKU represents a stock keeping unit or product that you will despatch in orders.
    *
    * @return \Shipmate\SKU The created SKU
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/

    public function createSKU($sku) {

        $curl = $this->setupCurl('/skus', 'POST', json_encode($sku));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        // Decode JSON into associative array
        $dataArray = json_decode($response, true);

        // Access value of "data" (i.e the returned Object)
        $dataArray = $dataArray["data"];

        // Convert keys of the array to camelCase
        $dataArray = convertKeysToCamelCase($dataArray);

        $newSKU = new SKU();

        // Map top layer properties of array to object
        $newSKU = mapArrayToObject($dataArray, $newSKU);

        // Handle nested objects
        if ($dataArray['location']) {
            
            // Location Object
            $locationObj = new Location();
            $locationObj = mapArrayToObject($dataArray['location'], $locationObj);

            
            $newSKU->setLocation($locationObj);
            
            // Country Object for addressCountry
            $addressCountryObj = new Country();
            $addressCountryObj = mapArrayToObject($dataArray['location']['addressCountry'], $addressCountryObj);

            // Set Location's addressCountry property to addressCountry object
            $newSKU->location()->setAddressCountry($addressCountryObj);
        }

        // if ($dataArray['countryOfManufacture']) {
            
        //     // Country Object for Country of Manufacture 
        //     $countryObj = new Country();
        //     $countryObj = mapArrayToObject($dataArray['countryOfManufacture'], $countryObj);

        //     $newSKU->setCountryOfManufacture($countryObj);
        // }
    
        // Country Object for CountryOfOrigin
        $countryOfOriginObj = new Country();
        $countryOfOriginObj = mapArrayToObject($dataArray['countryOfOrigin'], $countryOfOriginObj);
        $newSKU->setCountryOfOrigin($countryOfOriginObj);
        
        return $newSKU;
    }

    /**
    * Update a SKU
    *
    * @param \Shipmate\SKU $sku A SKU represents a stock keeping unit or product that you will despatch in orders.
    * @param string $reference May be either the SKU number or ID.
    *
    * @return \Shipmate\SKU The updated SKU
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws NotFoundException when response HTTP is 404
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/

    public function updateSKU($sku, $reference) {

        // Setting id properties to null to avoid error "the sku has already been taken"
        // (null values for properties will be ignored in PUT request)
        $sku->setId(null);
        $sku->setSKU(null);

        $curl = $this->setupCurl("/skus/$reference", 'PATCH', json_encode($sku));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        // Decode JSON into associative array
        $dataArray = json_decode($response, true);

        // Access value of "data" (i.e the returned Object)
        $dataArray = $dataArray["data"];

        // Convert keys of the array to camelCase
        $dataArray = convertKeysToCamelCase($dataArray);

        $newSKU = new SKU();

        // Map top layer properties of array to object
        $newSKU = mapArrayToObject($dataArray, $newSKU);

        // Handle nested objects
        if ($dataArray['location']) {
            
            // Location Object
            $locationObj = new Location();
            $locationObj = mapArrayToObject($dataArray['location'], $locationObj);

            
            $newSKU->setLocation($locationObj);
            
            // Country Object for addressCountry
            $addressCountryObj = new Country();
            $addressCountryObj = mapArrayToObject($dataArray['location']['addressCountry'], $addressCountryObj);

            // Set Location's addressCountry property to addressCountry object
            $newSKU->location()->setAddressCountry($addressCountryObj);
        }

        // if ($dataArray['countryOfManufacture']) {
            
        //     // Country Object for Country of Manufacture 
        //     $countryObj = new Country();
        //     $countryObj = mapArrayToObject($dataArray['countryOfManufacture'], $countryObj);

        //     $newSKU->setCountryOfManufacture($countryObj);
        // }
    
        // Country Object for CountryOfOrigin
        $countryOfOriginObj = new Country();
        $countryOfOriginObj = mapArrayToObject($dataArray['countryOfOrigin'], $countryOfOriginObj);
        $newSKU->setCountryOfOrigin($countryOfOriginObj);
        
        return $newSKU;
    }

    /**
    * Get all SKUs 
    * 
    * @param int $pageNumber Page Number 
    *
    * @return array Retrieves a list of SKUs on the Shipmate account, 30 records at a time.
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws NotFoundException when response HTTP is 404
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/
    
    public function getSKUs($pageNumber = null) {

        $url = '/skus';

        if ($pageNumber) {
            $url = "/skus?page=$pageNumber";
        }

        $curl = $this->setupCurl($url, 'GET');

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        // Decode JSON into associative array
        $dataArray = json_decode($response, true);

        // Access value of "data" (i.e the returned Object)
        $dataArray = $dataArray["data"];

        // Convert keys of the array to camelCase
        $dataArray = convertKeysToCamelCase($dataArray);

        $SKUsArray = [];
        
        // For each item in array, map it to SKU object 
        foreach ($dataArray as $skuData) {

            $skuObj = new SKU();

            // map the current SKU to $skuObj
            $skuObj = mapArrayToObject($skuData, $skuObj);

            // Handle nested objects
            if ($skuData['location']) {
                
                // Location Object
                $locationObj = new Location();
                $locationObj = mapArrayToObject($skuData['location'], $locationObj);
                
                $skuObj->setLocation($locationObj);
                
                // Country Object for addressCountry
                $addressCountryObj = new Country();
                $addressCountryObj = mapArrayToObject($skuData['location']['addressCountry'], $addressCountryObj);
    
                // Set Location's addressCountry property to addressCountry object
                $skuObj->location()->setAddressCountry($addressCountryObj);
            }

            // if ($skuData['countryOfManufacture']) {
            
            //     // Country Object for Country of Manufacture 
            //     $countryObj = new Country();
            //     $countryObj = mapArrayToObject($skuData['countryOfManufacture'], $countryObj);
    
            //     $skuObj->setCountryOfManufacture($countryObj);
            // }
        
            // Country Object for CountryOfOrigin
            $countryOfOriginObj = new Country();
            $countryOfOriginObj = mapArrayToObject($skuData['countryOfOrigin'], $countryOfOriginObj);
            $skuObj->setCountryOfOrigin($countryOfOriginObj);

            // push $skuObj to $SKUsArray 
            $SKUsArray[] = $skuObj;
        }
        
        return $SKUsArray;
    }

    /**
    * Get Single SKU
    *
    * @param string $reference May be either the SKU number or ID.
    *
    * @return \Shipmate\SKU Specified SKU 
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws NotFoundException when response HTTP is 404
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/

    public function getSKU($reference) {

        $curl = $this->setupCurl("/skus/$reference", 'GET');

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        // Decode JSON into associative array
        $dataArray = json_decode($response, true);

        // Access value of "data" (i.e the returned Object)
        $dataArray = $dataArray["data"];

        // Convert keys of the array to camelCase
        $dataArray = convertKeysToCamelCase($dataArray);

        $skuObj = new SKU();

        // Map top layer properties of array to object
        $skuObj = mapArrayToObject($dataArray, $skuObj);

        // Handle nested objects
        if ($dataArray['location']) {
            
            // Location Object
            $locationObj = new Location();
            $locationObj = mapArrayToObject($dataArray['location'], $locationObj);

            
            $skuObj->setLocation($locationObj);
            
            // Country Object for addressCountry
            $addressCountryObj = new Country();
            $addressCountryObj = mapArrayToObject($dataArray['location']['addressCountry'], $addressCountryObj);

            // Set Location's addressCountry property to addressCountry object
            $skuObj->location()->setAddressCountry($addressCountryObj);
        }

        // if ($dataArray['countryOfManufacture']) {
            
        //     // Country Object for Country of Manufacture 
        //     $countryObj = new Country();
        //     $countryObj = mapArrayToObject($dataArray['countryOfManufacture'], $countryObj);

        //     $skuObj->setCountryOfManufacture($countryObj);
        // }
    
        // Country Object for CountryOfOrigin
        $countryOfOriginObj = new Country();
        $countryOfOriginObj = mapArrayToObject($dataArray['countryOfOrigin'], $countryOfOriginObj);
        $skuObj->setCountryOfOrigin($countryOfOriginObj);
        
        return $skuObj;
    }


    /**
    * Get Custom Fields
    *
    * @return array Custom Fields available on the account
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws NotFoundException when response HTTP is 404
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/

    public function getCustomFields() {

        $curl = $this->setupCurl('/custom-fields', 'GET');

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        // Decode JSON into associative array
        $dataArray = json_decode($response, true);

        // Access value of "data" (i.e the returned Object)
        $dataArray = $dataArray["data"];

        // Convert keys of the array to camelCase
        $dataArray = convertKeysToCamelCase($dataArray);

        $customFieldsArray = [];

        foreach ($dataArray as $customField) {

            $customFieldObj = new \Shipmate\CustomField\CustomField();    

            // map the current customField to $customFieldObj
            $customFieldObj = mapArrayToObject($customField, $customFieldObj);

            // push $customFieldObj to customFields array 
            $customFieldsArray[] = $customFieldObj;
        }

        return $customFieldsArray;
    }

    /**
    * Get Single Custom Field
    *
    * @param string $reference Either the key or id of the individual Custom Field
    *
    * @return \Shipmate\CustomField\CustomField A single Custom Field from the account
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws NotFoundException when response HTTP is 404
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/

    public function getCustomField($reference) {

        $curl = $this->setupCurl("/custom-fields/$reference", 'GET');

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        // Decode JSON into associative array
        $dataArray = json_decode($response, true);

        // Access value of "data" (i.e the returned Object)
        $dataArray = $dataArray["data"];

        // Convert keys of the array to camelCase
        $dataArray = convertKeysToCamelCase($dataArray);

        $customFieldObj = new \Shipmate\CustomField\CustomField();    

        // map the customField data to $customFieldObj
        $customFieldObj = mapArrayToObject($dataArray, $customFieldObj);        

        return $customFieldObj;
    }

    /**
    * Create Custom Field
    *
    * @param \Shipmate\CustomField\CustomField $customField Custom Fields can be used across the Shipmate platform and can be used to supply custom information to carriers, invoke specific Routing Rules or display information on labels, as just a few examples.
    *
    * @return \Shipmate\CustomField\CustomField The created Custom Field
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/

    public function createCustomField($customField) {

        $curl = $this->setupCurl('/custom-fields', 'POST', json_encode($customField, JSON_UNESCAPED_SLASHES));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        // Decode JSON into associative array
        $dataArray = json_decode($response, true);

        // Access value of "data" (i.e the returned Object)
        $dataArray = $dataArray["data"];

        // Convert keys of the array to camelCase
        $dataArray = convertKeysToCamelCase($dataArray);

        $customFieldObj = new \Shipmate\CustomField\CustomField();    

        // map the customField data to $customFieldObj
        $customFieldObj = mapArrayToObject($dataArray, $customFieldObj);        

        return $customFieldObj;
    }

    /**
    * Get Label
    *
    * @param string $reference Carrier's Tracking Reference
    * @param string $format The format that the label should be returned in, either PDF, ZPL or PNG
    *
    * @return \Shipmate\Label A label along with both Shipment and Parcel data
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws NotFoundException when response HTTP is 404
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/

    public function getLabel($reference, $format = "ZPL") {

        $curl = $this->setupCurl("/parcels/$reference/label?format=$format", 'GET');

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        // Decode JSON into associative array
        $dataArray = json_decode($response, true);

        // Access value of "data" (i.e the returned Object)
        $dataArray = $dataArray["data"][0];

        // Convert keys of the array to camelCase
        $dataArray = convertKeysToCamelCase($dataArray);

        $labelObj = new Label();

        // Map top layer properties of array to object
        $labelObj = mapArrayToObject($dataArray, $labelObj);
        
        // Handle nested objects
        // Address Object
        $addressObj = new Address();
        $addressObj = mapArrayToObject($dataArray['toAddress'], $addressObj);
        $addressObj->setName($dataArray['toAddress']['deliveryName']);
        $labelObj->setToAddress($addressObj);

        return $labelObj;
    }

    /**
    * Print Labels
    *
    * @param string $reference Shipment ID or reference, Order reference, Shipmate tracking reference or the Carrier's tracking reference
    * @param string $userId Optional ID of User you wish to print to
    *
    * @return string The API assumes a successful print and does not handle print failures - an error will not be returned if there is not a printer to send the request to. Users should check any error messages on the Desktop Printer App or their printer for onward troubleshooting.
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws NotFoundException when response HTTP is 404
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/

    public function printLabels($reference, $userId = false) {

        $curl = $this->setupCurl("/shipments/$reference/print", 'PUT', !$userId ? null : json_encode(['print_to_user' => $userId]));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        return $response;
    }

    /**
    * Get Users
    *
    * @return array Retrieves a list of Users on the Shipmate account
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/

    public function getUsers() {

        $curl = $this->setupCurl('/users', 'GET');

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        // Decode JSON into associative array
        $dataArray = json_decode($response, true);

        // Access value of "data" (i.e the returned Object)
        $dataArray = $dataArray["data"];

        // Convert keys of the array to camelCase
        $dataArray = convertKeysToCamelCase($dataArray);

        $usersArray = [];

        // For each item in array, map it to a User object
        foreach ($dataArray as $userData) {

            $userObj = new User();

            // Map top layer properties of array to object
            $userObj = mapArrayToObject($userData, $userObj);

            // Handle nested objects
            // Location Object

            if ($userData['location']) {
                $locationObj = new Location();
                $locationObj = mapArrayToObject($userData['location'], $locationObj);
                $userObj->setLocation($locationObj);

                // Country Object
                $countryObj = new Country();
                $countryObj = mapArrayToObject($userData['location']['addressCountry'], $countryObj);

                // Set Location's addressCountry property to Country object
                $userObj->location()->setAddressCountry($countryObj);
            }

            // Push $userObj to $usersArray
            $usersArray[] = $userObj;
        }

        return $usersArray;

    }

    /**
    * Get All Locations
    *
    * @return array A list of all Locations on the Shipmate account
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws NotFoundException when response HTTP is 404
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/

    public function getLocations() {

        $curl = $this->setupCurl('/locations', 'GET');

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        // Decode JSON into associative array
        $dataArray = json_decode($response, true);

        // Access value of "data" (i.e the returned Object)
        $dataArray = $dataArray["data"]["data"];

        // Convert keys of the array to camelCase
        $dataArray = convertKeysToCamelCase($dataArray);

        $locationsArray = [];

        // For each item in array, map it to a Location object 
        foreach ($dataArray as $locationData) {
            $locationObj = new Location();

            // map the current Location to $locationObj
            $locationObj = mapArrayToObject($locationData, $locationObj);
            
            // Handle nested objects                    
                
            // Country Object for addressCountry
            $addressCountryObj = new Country();
            $addressCountryObj = mapArrayToObject($locationData['addressCountry'], $addressCountryObj);
    
            // Set Location's addressCountry property to addressCountry object
            $locationObj->setAddressCountry($addressCountryObj);

            // push $locationObj to $locationsArray
            $locationsArray[] = $locationObj;
        }

        return $locationsArray;
    }
    
    /**
    * Get Single Location
    *
    * @param string $reference May be either the Location code or ID
    *
    * @return \Shipmate\Location Specific Location on the Shipmate account
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws NotFoundException when response HTTP is 404
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/

    public function getLocation($reference) {

        $curl = $this->setupCurl("/locations/$reference", 'GET');

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        // Decode JSON into associative array
        $dataArray = json_decode($response, true);

        // Access value of "data" (i.e the returned Object)
        $dataArray = $dataArray["data"];

        // Convert keys of the array to camelCase
        $dataArray = convertKeysToCamelCase($dataArray);

        $locationObj = new Location();

        // map the current Location to $locationObj
        $locationObj = mapArrayToObject($dataArray, $locationObj);
        
        // Handle nested objects                    
            
        // Country Object for addressCountry
        $addressCountryObj = new Country();
        $addressCountryObj = mapArrayToObject($dataArray['addressCountry'], $addressCountryObj);

        // Set Location's addressCountry property to addressCountry object
        $locationObj->setAddressCountry($addressCountryObj);

        return $locationObj;
    }

    /**
    * Get Delivery Services
    *
    * @param int $weight The weight of your parcel in grammes
    * @param int $length The length of your parcel in centimetres
    * @param int $depth The depth of your parcel in centimetres
    * @param int $width The width of your parcel in centimetres
    *
    * @return array Delivery Services that have been set up in your Shipmate Account and are currently available to use.
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws NotFoundException when response HTTP is 404
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/

    public function getDeliveryServices($weight = null, $length = null, $depth = null, $width = null) {

        $curl = $this->setupCurl('/services?' . http_build_query([
            'weight' => $weight,
            'length' => $length,
            'depth' => $depth,
            'width' => $width
        ]), 'GET');

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        $deliveryServices = [];

        $dataArray = json_decode($response, true);
    
        // TODO refactor this code to use 'mapArrayToObject' util function 
        foreach ($dataArray['data'] as $serviceData) {
            $deliveryService = new DeliveryService();
            $deliveryService->setId($serviceData['id']);
            $deliveryService->setCarrier($serviceData['carrier']);
            $deliveryService->setName($serviceData['name']);
            $deliveryService->setDescription($serviceData['description']);
            $deliveryService->setKey($serviceData['key']);
            $deliveryService->setPrice($serviceData['price']);
    
            // Check if conditions exist and create DeliveryServiceCondition object
            if (isset($serviceData['conditions']) && is_array($serviceData['conditions']) && !empty($serviceData['conditions'])) {

                foreach($serviceData['conditions'] as $condition) {
                    $conditions = new DeliveryServiceCondition();
                    $conditions->setField($condition[0]);
                    $conditions->setOperator($condition[1]);
                    $conditions->setValue($condition[2]);

                    $deliveryService->addCondition($conditions);
                }
                
            }
    
            $deliveryServices[] = $deliveryService;
        }
    
        return $deliveryServices;
    }

    /**
    * Get Packaging Options
    *
    * @return \Shipmate\Responses\PackagingOptions Your Packaging Options, along with an array of available Packaging Types that can be used when creating a Shipment.
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws NotFoundException when response HTTP is 404
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/

    public function getPackagingOptions() {

        $curl = $this->setupCurl('/packaging-options', 'GET');

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        // Decode JSON into associative array
        $dataArray = json_decode($response, true); 

        // Convert keys of the main array to camelCase
        $dataArray = convertKeysToCamelCase($dataArray['data']);

        $packagingOptionsObj = new PackagingOptions();

        // Set the values to the corresponding properties
        $packagingOptionsObj->setNetWeight($dataArray['netWeight']);
        $packagingOptionsObj->setAllowOverride($dataArray['allowOverride']);

        foreach ($dataArray['packagingTypes'] as $packagingTypeData) {
            $packagingTypeObj = new PackagingType();
            $packagingTypeObj = mapArrayToObject($packagingTypeData, $packagingTypeObj);
            $packagingOptionsObj->addPackagingType($packagingTypeObj);
        }
        
        return $packagingOptionsObj;

}

    /**
    * Get Events by Shipment
    *
    * @param string $reference Shipment Reference or ID
    *
    * @return array Shipmate Tracking Events for the requested Shipment Reference or ID. The returned events will be grouped by Parcel, with each Parcel response including the Shipment Reference and the Carrier Tracking Reference of the parcel.
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws NotFoundException when response HTTP is 404
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/

    public function getEventsByShipment($reference) {

        $curl = $this->setupCurl("/shipments/$reference/events", 'GET');

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

        // Decode JSON into associative array
        $dataArray = json_decode($response, true);

        // Access value of "data" (i.e the returned Object)
        $dataArray = $dataArray["data"];

        // Convert keys of the array to camelCase
        $dataArray = convertKeysToCamelCase($dataArray);

        $eventsByShipment = [];

        foreach($dataArray as $parcelTrackingEventsData) {

            $parcelTrackingEventsObj = new ParcelTrackingEvents();

            // Map top level properties
            $parcelTrackingEventsObj = mapArrayToObject($parcelTrackingEventsData, $parcelTrackingEventsObj);

            // Handle nested objects (Tracking Events)
            foreach($parcelTrackingEventsData["trackingEvents"] as $trackingEventData) {
                $trackingEventObj = new TrackingEvent();
                $trackingEventObj = mapArrayToObject($trackingEventData, $trackingEventObj);
                $parcelTrackingEventsObj->addTrackingEvent($trackingEventObj);
            }

            $eventsByShipment[] = $parcelTrackingEventsObj;

        }

        return $eventsByShipment;

    }

    /**
    * Get Events by Parcel
    *
    * @param string $reference Parcel Tracking Reference
    *
    * @return array Shipmate Tracking Events for the requested Parcel Tracking Reference.
    *
    * @throws BadRequestException when response HTTP is 400
    * @throws UnauthorizedException when response HTTP is 401
    * @throws ForbiddenException when response HTTP is 403
    * @throws NotFoundException when response HTTP is 404
    * @throws InternalServerErrorException when response HTTP is 500
    * @throws CurlErrorException when internal curl error occurs
    **/

    public function getEventsByParcel($reference) {

        $curl = $this->setupCurl("/parcels/$reference/events", 'GET');

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new CurlErrorException(curl_error($curl));
        }

        if (!curl_errno($curl)) {
            $this->checkForResponseErrors($curl, $response);
        }

         // Decode JSON into associative array
         $dataArray = json_decode($response, true);

         // Access value of "data" (i.e the returned Object)
         $dataArray = $dataArray["data"];
 
         // Convert keys of the array to camelCase
         $dataArray = convertKeysToCamelCase($dataArray);

        $trackingEventsArray = [];

        // Map each tracking event to a TrackingEvent Object

        foreach ($dataArray as $trackingEventData) {

            $trackingEventObj = new TrackingEvent();

            $trackingEventObj = mapArrayToObject($trackingEventData, $trackingEventObj);

            $trackingEventsArray[] = $trackingEventObj;

        }

        return $trackingEventsArray;
    }
    
    private function checkForResponseErrors($curl, $response)
    {
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        
        switch ($httpCode) {
            case 400:
                throw new BadRequestException($response);
                break;
            case 401:
                throw new UnauthorizedException($response);
                break;
            case 403:
                throw new ForbiddenException($response);
                break;
            case 404:
                throw new NotFoundException($response);
                break;
            case 500:
                throw new InternalServerErrorException($response);
                break;
        }
    
    }
}