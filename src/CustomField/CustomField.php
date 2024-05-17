<?php

namespace Shipmate\CustomField;

use Shipmate\ObjectEncoder;

/**
* Custom Field
*
* Custom Fields can be used across the Shipmate platform and can be used to supply custom information to carriers, invoke specific Routing Rules or display information on labels, as just a few examples. Custom Fields may be configured inside the Shipmate web portal, or via API.
*/

class CustomField extends ObjectEncoder {

    protected $id;
    protected $name;
    protected $key;
    protected $entity;
    protected $dataType;
    protected $source;
    protected $mappedTo;
    protected $defaultValue;
    protected $dataValidationRules;

    // setters

    /**
    * Set the ID
    *
    * @param string $id The ID of the custom field
    *
    * @return void 
    **/

    public function setId($id) {
        $this->id = $id;
    }

    /**
    * Set the Name
    *
    * @param string $name The name of the custom field
    *
    * @return void 
    **/

    public function setName($name) {
        $this->name = $name;
    }

    /**
    * Set the Key
    *
    * @param string $key The unique key for the custom field, used as the key in key => value pairs
    *
    * @return void
    **/
    
    public function setKey($key) {
        $this->key = $key;
    }

    /**
    * Set the Entity
    *
    * @param string $entity The entity on Shipmate this custom field is for. Can be one of SHIPMENT, PARCEL, CONTACT or SKU.
    *
    * @return void
    **/
    
    public function setEntity($entity) {
        $this->entity = $entity;
    }

    /**
    * Set the Data Type
    *
    * @param string $dataType The type of data being held in this custom field - see the data types table 
    *
    * @return void 
    **/
    
    public function setDataType($dataType) {
        $this->dataType = $dataType;
    }

    /**
    * Set the Source
    *
    * @param string $source The source of the data: DIRECT - the data will be supplied by API or CSV file; FIXED - the data will always have the same default_value; MAPPED - the data is mapped to another attribute or custom field specified in mapped_to
    *
    * @return void 
    **/
    
    public function setSource($source) {
        $this->source = $source;
    }

    /**
    * Set the Mapped To
    *
    * @param string $mappedTo The key of another custom field, if source is MAPPED.
    *
    * @return void 
    **/
    
    public function setMappedTo($mappedTo) {
        $this->mappedTo = $mappedTo;
    }

    /**
    * Set the Default Value
    *
    * @param string $defaultValue The value to apply to the custom field if data is not supplied. Acts as the fixed value if source is FIXED.
    *
    * @return void 
    **/
    
    public function setDefaultValue($defaultValue) {
        $this->defaultValue = $defaultValue;
    }

    /**
    * Set the Data Validation Rules
    *
    * @param \Shipmate\CustomField\DataValidationRules $dataValidationRules Optional validation you wish to apply to data used on this custom field.
    *
    * @return void 
    **/
    
    public function setDataValidationRules($dataValidationRules) {
        $this->dataValidationRules = $dataValidationRules;
    }

    // getters

    /**
    * Get the ID
    *
    * @return string The ID of the custom field
    **/

    public function id() {
        return $this->id;
    }

    /**
    * Get the Name
    *
    * @return string The name of the custom field
    **/

    public function name() {
        return $this->name;
    }

    /**
    * Get the Key
    *
    * @return string The unique key for the custom field, used as the key in key => value pairs
    **/
    
    public function key() {
        return $this->key;
    }

    /**
    * Get the Entity
    *
    * @return string The entity on Shipmate this custom field is for. Can be one of SHIPMENT, PARCEL, CONTACT or SKU.
    **/
    
    public function entity() {
        return $this->entity;
    }

    /**
    * Get the Data Type
    *
    * @return string The type of data being held in this custom field - see the data types table in API Docs
    *
    * @link https://www.shipmate.co.uk/guides/api#custom-field-object 
    **/
    
    public function dataType() {
        return $this->dataType;
    }

    /**
    * Get the Source
    *
    * @return string The source of the data: DIRECT - the data will be supplied by API or CSV file; FIXED - the data will always have the same default_value; MAPPED - the data is mapped to another attribute or custom field specified in mapped_to
    **/
    
    public function source() {
        return $this->source;
    }

    /**
    * Get the Mapped To
    *
    * @return string The key of another custom field, if source is MAPPED.
    **/
    
    public function mappedTo() {
        return $this->mappedTo;
    }

    /**
    * Get the Default Value
    *
    * @return string The value to apply to the custom field if data is not supplied. Acts as the fixed value if source is FIXED.
    **/
    
    public function defaultValue() {
        return $this->defaultValue;
    }

    /**
    * Get the Data Validation Rules
    *
    * @return \Shipmate\CustomField\DataValidationRules Optional validation you wish to apply to data used on this custom field.
    **/
    
    public function dataValidationRules() {
        return $this->dataValidationRules;
    }
}