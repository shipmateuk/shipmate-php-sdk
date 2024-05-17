<?php

namespace Shipmate\Shipment;

use Shipmate\ObjectEncoder;

/**
* Parcel
*
* A Parcel represents each individual box that is being sent within a Shipment and tracks data such as dimensions, weight, value and contents.
*/

class Parcel extends ObjectEncoder {
    
    protected $reference;
    protected $packagingTypeKey;
    protected $weight;
    protected $width;
    protected $length;
    protected $depth;
    protected $value;
    protected $items;
    protected $customsDeclaration;
    protected $customFields;

    // setters

    /**
    * Set the Reference
    *
    * @param string $reference Your unique reference for the Parcel
    *
    * @return void 
    **/

    public function setReference($reference) {
        $this->reference = $reference;
    }

    /**
    * Set the Packaging Type Key
    *
    * @param string $packagingTypeKey If using a Packaging Type, its unique key Optional, not required if supplying weight and dimensions or using a Default Packaging Type.
    *
    * @return void 
    **/

    public function setPackagingTypeKey($packagingTypeKey) {
        $this->packagingTypeKey = $packagingTypeKey;
    }

    /**
    * Set the Weight
    *
    * @param int $weight The weight of the Parcel in grammes. Required unless supplying packaging_type_key or using a Default Packaging Type.
    *
    * @return void 
    **/

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    /**
    * Set the Width
    *
    * @param int $width The width of the Parcel in centimetres. Required unless supplying packaging_type_key or using a Default Packaging Type.
    *
    * @return void 
    **/

    public function setWidth($width) {
        $this->width = $width;
    }

    /**
    * Set the Length
    *
    * @param int $length The length of the Parcel in centimetres. Required unless supplying packaging_type_key or using a Default Packaging Type.
    *
    * @return void 
    **/

    public function setLength($length) {
        $this->length = $length;
    }

    /**
    * Set the Depth
    *
    * @param int $depth The depth of the Parcel in centimetres. Required unless supplying packaging_type_key or using a Default Packaging Type.
    *
    * @return void 
    **/

    public function setDepth($depth) {
        $this->depth = $depth;
    }

    /**
    * Set the Value
    *
    * @param float $value The value of the Parcel's contents in your account's base currency (2 d.p.)
    *
    * @return void 
    **/

    public function setValue($value) {
        $this->value = $value;
    }

    /**
    * Set the Items
    *
    * @param array $items Parcel contents details for customs declarations. Optional for Mainland UK Deliveries.
    *
    * @return void 
    **/

    public function setItems($items) {
        $this->items = $items;
    }

    /**
    * Set the Item
    *
    * @param \Shipmate\Shipment\Item $item Items represent each individual item that is being sent within a Parcel and tracks data such as value and customs declaration details.
    *
    * @return void 
    **/

    public function setItem($item) {
        $this->items[] = $item;
    }

    /**
    * Set the Customs Declaration
    *
    * @param \Shipmate\Shipment\CustomsDeclaration $customsDeclaration Customs Declaration details, for international destinations, if overriding defaults.
    *
    * @return void 
    **/

    public function setCustomsDeclaration($customsDeclaration) {
        $this->customsDeclaration = $customsDeclaration;
    }

    /**
    * Set the Custom Fields
    *
    * @param array $customFields Array of Custom Fields supplied as key => value pairs - for example "my_custom_field_key": "My Value" Custom Fields can be managed in the Shipmate Web Portal.
    *
    * @return void 
    **/

    public function setCustomFields($customFields) {
        $this->customFields = $customFields;
    }

    // getters

    /**
    * Get the Reference
    *
    * @return string Your unique reference for the Parcel
    **/

    public function reference() {
        return $this->reference;
    }

    /**
    * Get the Packaging Type Key
    *
    * @return string If using a Packaging Type, its unique key Optional, not required if supplying weight and dimensions or using a Default Packaging Type.
    **/
    
    public function packagingTypeKey() {
        return $this->packagingTypeKey;
    }

    /**
    * Get the Weight
    *
    * @return int The weight of the Parcel in grammes. Required unless supplying packaging_type_key or using a Default Packaging Type.
    **/
    
    public function weight() {
        return $this->weight;
    }

    /**
    * Get the Width
    *
    * @return int The width of the Parcel in centimetres. Required unless supplying packaging_type_key or using a Default Packaging Type.
    **/
    
    public function width() {
        return $this->width;
    }

    /**
    * Get the Length
    *
    * @return int The length of the Parcel in centimetres. Required unless supplying packaging_type_key or using a Default Packaging Type.
    **/
    
    public function length() {
        return $this->length;
    }

    /**
    * Get the Depth
    *
    * @return int The depth of the Parcel in centimetres. Required unless supplying packaging_type_key or using a Default Packaging Type.
    **/
    
    public function depth() {
        return $this->depth;
    }

    /**
    * Get the Value
    *
    * @return float The value of the Parcel's contents in your account's base currency (2 d.p.)
    **/
    
    public function value() {
        return $this->value;
    }

    /**
    * Get the Items
    *
    * @return array Parcel contents details for customs declarations. Optional for Mainland UK Deliveries.
    **/
    
    public function items() {
        return $this->items;
    }

    /**
    * Get the Customs Declaration
    *
    * @return \Shipmate\Shipment\CustomsDeclaration Customs Declaration details, for international destinations, if overriding defaults.
    **/
    
    public function customsDeclaration() {
        return $this->customsDeclaration;
    }

    /**
    * Get the Custom Fields
    *
    * @return array Array of Custom Fields supplied as key => value pairs - for example "my_custom_field_key": "My Value" Custom Fields can be managed in the Shipmate Web Portal.
    **/
    
    public function customFields() {
        return $this->customFields;
    }
    
}