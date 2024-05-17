<?php

namespace Shipmate\Shipment;

require "ObjectEncoder.php";

use Shipmate\ObjectEncoder;

/**
 * Shipment
 *
 * A Shipment represents the collection of parcels that you want to send for an individual order or shipment. It contains information about the parcels, the delivery service and delivery and collection addresses.
 */

class Shipment extends ObjectEncoder {
   
    protected $shipmentReference;
    protected $orderReference;
    protected $deliveryServiceKey;
    protected $locationCode;
    protected $despatchDate;
    protected $toAddress;
    protected $parcels;
    protected $deliveryInstructions;
    protected $customFields;
    protected $customsDeclaration;
    protected $recipientVatNumber;
    protected $recipientEoriNumber;
    protected $format;
    protected $printLabels;
    protected $printToUser;

    // setters

    /**
    * Set the Shipment Reference
    *
    * @param string $shipmentReference Your unique reference for the Shipment
    *
    * @return void
    **/

    public function setShipmentReference($shipmentReference) {
        $this->shipmentReference = $shipmentReference;
    }

    /**
    * Set the Order Reference
    *
    * @param string $orderReference The order reference or number given to your customer. May be added to parcel labels and does not need to be unique.
    *
    * @return void
    **/

    public function setOrderReference($orderReference) {
        $this->orderReference = $orderReference;
    }

    /**
    * Set the Delivery Service Key
    *
    * @param string $deliveryServiceKey The unique key that you set when generating the Delivery Service in the Shipmate Web Portal. Optional, defaults to Routing Rules.
    *
    * @return void 
    **/

    public function setDeliveryServiceKey($deliveryServiceKey) {
        $this->deliveryServiceKey = $deliveryServiceKey;
    }

    /**
    * Set the Location Code
    *
    * @param string $locationCode Lets you state which Location you are sending this Shipment from. Optional, defaults to your Default Location.
    *
    * @return void
    **/

    public function setLocationCode($locationCode) {
        $this->locationCode = $locationCode;
    }

    /**
    * Set the Despatch Date
    *
    * @param string $despatchDate The date for the Shipment to be despatched (YYYY-mm-dd HH:ii:ss), defaults to current day
    *
    * @return void
    **/

    public function setDespatchDate($despatchDate) {
        $this->despatchDate = $despatchDate;
    }

    /**
    * Set the To Address
    *
    * @param \Shipmate\Address $toAddress The Address that you want to send the Shipment to
    *
    * @return void 
    **/

    public function setToAddress($toAddress) {
        $this->toAddress = $toAddress;
    }

    /**
    * Set the Parcels
    *
    * @param array $parcels An array of Parcels to be sent
    *
    * @return void
    **/

    public function setParcels($parcels) {
        $this->parcels = $parcels;
    }

    /**
    * Add a Parcel
    *
    * @param \Shipmate\Shipment\Parcel $parcel Add a Parcel to the Parcels array
    *
    * @return void
    **/

    public function addParcel($parcel) {
        $this->parcels[] = $parcel;
    }

    /**
    * Set the Delivery Instructions
    *
    * @param string $deliveryInstructions Delivery instructions for the Carrier (e.g. Put in porch)
    *
    * @return void
    **/

    public function setDeliveryInstructions($deliveryInstructions) {
        $this->deliveryInstructions = $deliveryInstructions;
    }

    /**
    * Set the Custom Fields
    *
    * @param array $customFields Array of Custom Fields supplied as key => value pairs - for example "my_custom_field_key": "My Value". Custom Fields can be managed in the Shipmate Web Portal.
    *
    * @return void
    **/

    public function setCustomFields($customFields) {
        $this->customFields = $customFields;
    }

    /**
    * Set the Customs Declaration
    *
    * @param \Shipmate\Shipment\CustomsDeclaration $customsDeclaration Customs Declaration details, for international destinations, if overriding defaults
    *
    * @return void 
    **/

    public function setCustomsDeclaration($customsDeclaration) {
        $this->customsDeclaration = $customsDeclaration;
    }

    /**
    * Set the Recipient Vat Number
    *
    * @param string $recipientVatNumber The recipient's VAT number, for international destinations
    *
    * @return void 
    **/

    public function setRecipientVatNumber($recipientVatNumber) {
        $this->recipientVatNumber = $recipientVatNumber;
    }

    /**
    * Set the Recipient Eori Number
    *
    * @param string $recipientEoriNumber The recipient's EORI number, for international destinations
    *
    * @return void 
    **/

    public function setRecipientEoriNumber($recipientEoriNumber) {
        $this->recipientEoriNumber = $recipientEoriNumber;
    }

    /**
    * Set the Format
    *
    * @param string $format The format of the label to be returned (ZPL, PDF, PNG), defaults to ZPL
    *
    * @return void 
    **/

    public function setFormat($format) {
        $this->format = $format;
    }

    /**
    * Set the Print Labels
    *
    * @param bool $bool Set to true to send generated label(s) to the authenticated user's Shipmate Desktop App 
    *
    * Default value is false.
    *
    * @return void 
    **/

    public function setPrintLabels($bool) {
        $this->printLabels = $bool;
    }

    /**
    * Set the Print To User
    *
    * @param string $user Optional ID of User you wish to print to. print_labels must be set to true when setting this attribute.
    *
    * @return void 
    **/

    public function setPrintToUser($user) {
        $this->printToUser = $user;
    }

    // getters

    /**
    * Get the Shipment Reference
    *
    * @return string Your unique reference for the Shipment
    **/

    public function shipmentReference() {
        return $this->shipmentReference;
    }

    /**
    * Get the Order Reference
    *
    * @return string The order reference or number given to your customer. May be added to parcel labels and does not need to be unique.
    **/
    
    public function orderReference() {
        return $this->orderReference;
    }

    /**
    * Get the Delivery Service Key
    *
    * @return string The unique key that you set when generating the Delivery Service in the Shipmate Web Portal. Optional, defaults to Routing Rules.
    **/
    
    public function deliveryServiceKey() {
        return $this->deliveryServiceKey;
    }

    /**
    * Get the Location Code
    *
    * @return string Lets you state which Location you are sending this Shipment from. Optional, defaults to your Default Location.
    **/
    
    public function locationCode() {
        return $this->locationCode;
    }

    /**
    * Get the Despatch Date
    *
    * @return string The date for the Shipment to be despatched (YYYY-mm-dd HH:ii:ss), defaults to current day
    **/
    
    public function despatchDate() {
        return $this->despatchDate;
    }

    /**
    * Get the To Address
    *
    * @return \Shipmate\Address The Address that you want to send the Shipment to
    **/
    
    public function toAddress() {
        return $this->toAddress;
    }

    /**
    * Get the Parcels
    *
    * @return array An array of Parcels to be sent
    **/
    
    public function parcels() {
        return $this->parcels;
    }

    /**
    * Get the Delivery Instructions
    *
    * @return string Delivery instructions for the Carrier (e.g. Put in porch)
    **/
    
    public function deliveryInstructions() {
        return $this->deliveryInstructions;
    }

    /**
    * Get the Custom Fields
    *
    * @return array Array of Custom Fields supplied as key => value pairs - for example "my_custom_field_key": "My Value"
    *
    * Custom Fields can be managed in the Shipmate Web Portal.
    **/
    
    public function customFields() {
        return $this->customFields;
    }

    /**
    * Get the Customs Declaration
    *
    * @return \Shipmate\Shipment\CustomsDeclaration Customs Declaration details, for international destinations, if overriding defaults
    **/
    
    public function customsDeclaration() {
        return $this->customsDeclaration;
    }

    /**
    * Get the Recipient Vat Number
    *
    * @return string The recipient's VAT number, for international destinations
    **/
    
    public function recipientVatNumber() {
        return $this->recipientVatNumber;
    }

    /**
    * Get the Recipient Eori Number
    *
    * @return string The recipient's EORI number, for international destinations
    **/    
    
    public function recipientEoriNumber() {
        return $this->recipientEoriNumber;
    }

    /**
    * Get the Format
    *
    * @return string The format of the label to be returned (ZPL, PDF, PNG), defaults to ZPL
    **/
    
    public function format() {
        return $this->format;
    }

    /**
    * Get the Print Labels
    *
    * @return bool Set to true to send generated label(s) to the authenticated user's Shipmate Desktop App 
    *
    * Default value is false.
    **/
    
    public function printLabels() {
        return $this->printLabels;
    }

    /**
    * Get the Print To User
    *
    * @return string Optional ID of User you wish to print to.
    **/
    
    public function printToUser() {
        return $this->printToUser;
    }

}

    


