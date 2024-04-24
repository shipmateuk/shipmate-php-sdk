# __Shipmate PHP SDK__
This officially supported SDK provides an interface to the Shipmate API for use in PHP applications.

Shipmate is a shipping automation platform for UK and Ireland merchants that can be used to produce shipping labels and track parcels for multiple carriers the merchant has accounts with, within one platform. This reduces integration effort while simplifying daily operations by only needing to regularly use one platform for key shipping interactions, and can operate at scale.

To use this SDK you will need an active Shipmate account - if you don’t already have access to one, [visit the Shipmate website](https://www.shipmate.co.uk/) to find out more about the account types available and to open an account.

This SDK makes use of the [Shipmate API version 1.2](https://www.shipmate.co.uk/guides/api), and provides interfaces to all functionality, including:

- Shipment Creation
- Label Printing
- Delivery Services
- Tracking Events
- SKU Inventory
- Custom Fields


## Installation
```
composer require shipmate/shipmate-php-sdk
```


## Configuration
To access the Shipmate API you will need to configure both the environment and the API Key.

You may request a staging / sandbox account as part of your Shipmate subscription, or as a development partner.

[Register an API key for your application](https://www.shipmate.co.uk/guides/api#versioning) in the Shipmate web portal and configure the SDK as follows:
```
// Create an instance of Shipmate Service
$shipmate = new ShipmateService();

// Set the API key
$shipmate->setApiKey('YOUR_SHIPMATE_API_KEY');

// Set the Access Token
$shipmate->setApiToken('YOUR_SHIPMATE_API_TOKEN');

// Set the Environment
$shipmate->setEnvironment(Environment::STAGING); // if setEnvironment is not called then production URL will be used by default in requests.
```

## Using the SDK
#### Create Shipment object - Mainland UK - 1 Parcel - Required Attributes
```
// Create an instance of the Shipment class
$shipment = new Shipment();
	
// Set properties for the Shipment
$shipment->setShipmentReference('123456789');
$shipment->setOrderReference("987654321");

// Create an instance of the Address class for the to_address
$toAddress = new Address();
$toAddress->setName('Mr Shipmate Test');
$toAddress->setLine1('Friar Gate Studios');
$toAddress->setLine2('Ford Street');
$toAddress->setLine3('TEST LABEL - DO NOT DELIVER');
$toAddress->setCity('Derby');
$toAddress->setPostcode('DE1 1EE');
$toAddress->setCountry('GB');
$toAddress->setTelephone('01332460888');
$toAddress->setEmailAddress('support@shipmate.co.uk');

// Add the toAddress to the Shipment 
$shipment->setToAddress($toAddress);

$shipment->setDeliveryInstructions('Leave with receptionist');

// Create an instance of the Parcel class
$parcel = new Parcel();
$parcel->setReference('56789');
$parcel->setWeight(450);
$parcel->setWidth(20);
$parcel->setLength(20);
$parcel->setDepth(20);
$parcel->setValue(14.99);

// Add the Parcel object to the parcels array of the Shipment object
$shipment->addParcel($parcel);
```

#### Create a Shipment on the Shipmate account
```
$shipmentResponse = $shipmate->createShipment($shipment);
```

#### Access the Shipment Label
``` 
$shipmentResponse[0]->ZPL(); // get label of parcel 1
``` 

#### Print Labels
``` 
$shipmate->printLabels('SHIPMENT_ID', 'SHIPMATE_USER_ID');
``` 

#### Get Delivery Services
```
$deliveryServices = $shipmate->getDeliveryServices();
```

#### Get Tracking Events 
```
$shipmentTrackingEvents = $shipmate->getEventsByShipment(‘SHIPMENT_REFERENCE’);

$parcelTrackingEvents = $shipmate->getEventsByParcel(‘PARCEL_TRACKING_REFERENCE’);
```

#### Create SKU object - Required Attributes
```
$sku = new SKU();
$sku->setSku('6776929224');
$sku->setProductName('Blue Shipmate T-shirt (Cotton), size Large');
$sku->setTariffCode('6109100010');
$sku->setTariffDescription('Mens T-shirts (Cotton)');
$sku->setCountryOfOrigin('GB');
$sku->setValueExVat('20.82');
$sku->setVatRate('20.0');
$sku->setValueIncVat('24.99');
$sku->setGrossWeight(350);
$sku->setNetWeight(350);
$sku->setWidth(200);
$sku->setLength(200);
$sku->setDepth(20);
$sku->setIsStockedItem(true);
$sku->setInStock(true);
$sku->setItemHandling('Packable');
```


#### Add SKU to Shipmate account
```
$shipmate->createSKU($sku);
```

#### Get all SKUs on the Shipmate account
```
$shipmate->getSKUs();
```


#### Create Custom Field object 
```
// Create a new instance of the CustomField class
$customField = new CustomField();

// Set properties for the Custom Field 
$customField->setName('Insurance Cover Value');
$customField->setKey('SHIPMENT_INSURANCE_COVER_VALUE');
$customField->setEntity('SHIPMENT');
$customField->setDataType('NUMERIC');
$customField->setSource('DIRECT');
$customField->setDefaultValue('0');

// Create a new instance of the DataValidationRules class
$dataValidationRules = new DataValidationRules();
$dataValidationRules->setNumericType('DECIMAL');
$dataValidationRules->setMaxValue(200.00);

// Add Data Validation Rules to the Custom Field
$customField->setDataValidationRules($dataValidationRules);
```

#### Add Custom Field to Shipmate account
```
$shipmate->createCustomField($customField);
```

#### Get all Custom Fields
```
$shipmate->getCustomFields();
```

## Licence
Usage of this SDK is provided under the [MIT License](https://opensource.org/license/mit). See LICENSE for full details.

# __LICENSE__
Copyright 2024 Shipmate Systems Limited

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the “Software”), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.






