<?php

namespace Shipmate\CustomField;

use Shipmate\ObjectEncoder;

/**
* Data Validation Rules
*
* Provides additional validation required for data entered into Custom Fields
*/

class DataValidationRules extends ObjectEncoder {

    protected $isRequired;
    protected $minLength;
    protected $maxLength;
    protected $regex;
    protected $options;
    protected $numericType;
    protected $minValue;
    protected $maxValue;

    // setters

    /**
    * Set the Is Required 
    *
    * @param bool $isRequired If data is required for this custom field. Can be set for all data types.
    *
    * @return void 
    **/

    public function setIsRequired($isRequired) {
        $this->isRequired = $isRequired;
    }

    /**
    * Set the Min Length
    *
    * @param int $minLength States the minimum length of a string. Can be set when data_type is TEXT
    *
    * @return void 
    **/
    
    public function setMinLength($minLength) {
        $this->minLength = $minLength;
    }

    /**
    * Set the Max Length
    *
    * @param int $maxLength States the maximum length of a string. Can be set when data_type is TEXT
    *
    * @return void 
    **/
    
    public function setMaxLength($maxLength) {
        $this->maxLength = $maxLength;
    }

    /**
    * Set the Regex
    *
    * @param string $regex States a Perl-compatible Regular Expression the supplied data must match. Can be set when data_type is TEXT
    *
    * @return void 
    **/
    
    public function setRegex($regex) {
        $this->regex = $regex;
    }

    /**
    * Set the Options
    *
    * @param string $options Accepts comma separated, quote encapsulated (and escaped) list of options. Can be set when data_type is LIST
    *
    * @return void 
    **/
    
    public function setOptions($options) {
        $this->options = $options;
    }

    /**
    * Set the Numeric Type
    *
    * @param string $numericType States the type of number to expect - INT or DECIMAL. Can be set when data_type is NUMERIC
    *
    * @return void 
    **/
    
    public function setNumericType($numericType) {
        $this->numericType = $numericType;
    }

    /**
    * Set the Min Value
    *
    * @param float $minValue States the minimum value. Can be set when data_type is NUMERIC
    *
    * @return void 
    **/
    
    public function setMinValue($minValue) {
        $this->minValue = $minValue;
    }

    /**
    * Set the Max Value
    *
    * @param float $maxValue States the maximum value. Can be set when data_type is NUMERIC
    *
    * @return void 
    **/
    
    public function setMaxValue($maxValue) {
        $this->maxValue = $maxValue;
    }

    // getters

    /**
    * Get the Is Required
    *
    * @return bool If data is required for this custom field. Can be set for all data types.
    **/

    public function isRequired() {
        return $this->isRequired;
    }

    /**
    * Get the Min Length
    *
    * @return int States the minimum length of a string. Can be set when data_type is TEXT
    **/
    
    public function minLength() {
        return $this->minLength;
    }

    /**
    * Get the Max Length
    *
    * @return int States the maximum length of a string. Can be set when data_type is TEXT
    **/
    
    public function maxLength() {
        return $this->maxLength;
    }

    /**
    * Get the Regex
    *
    * @return string States a Perl-compatible Regular Expression the supplied data must match. Can be set when data_type is TEXT
    **/
    
    public function regex() {
        return $this->regex;
    }

    /**
    * Get the Options
    *
    * @return string Accepts comma separated, quote encapsulated (and escaped) list of options. Can be set when data_type is LIST
    **/
    
    public function options() {
        return $this->options;
    }

    /**
    * Get the Numeric Type
    *
    * @return string States the type of number to expect - INT or DECIMAL. Can be set when data_type is NUMERIC
    **/
    
    public function numericType() {
        return $this->numericType;
    }

    /**
    * Get the Min Value
    *
    * @return float States the minimum value. Can be set when data_type is NUMERIC
    **/
    
    public function minValue() {
        return $this->minValue;
    }

    /**
    * Get the Max Value
    *
    * @return float States the maximum value. Can be set when data_type is NUMERIC
    **/
    
    public function maxValue() {
        return $this->maxValue;
    }
}