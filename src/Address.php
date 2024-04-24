<?php

namespace Shipmate;

use ObjectEncoder;

/**
* Address
*
* An Address represents a physical address that will be used for delivery.
*/

class Address extends ObjectEncoder {

    protected $name;
    protected $companyName;
    protected $telephone;
    protected $emailAddress;
    protected $line1;
    protected $line2;
    protected $line3;
    protected $city;
    protected $county;
    protected $postcode;
    protected $country;

    // setters

    /**
    * Set the Name
    *
    * @param string $name The name of the recipient
    *
    * @return void 
    **/

    public function setName($name) {
        $this->name = $name;
    }

    /**
    * Set the Company Name
    *
    * @param string $companyName The company name of the address
    *
    * @return void 
    **/

    public function setCompanyName($companyName) {
        $this->companyName = $companyName;
    }

    /**
    * Set the Telephone
    *
    * @param string $telephone The telephone number to contact for the address
    *
    * @return void 
    **/

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    /**
    * Set the Email Address
    *
    * @param string $emailAddress The email address to contact for the address
    *
    * @return void 
    **/

    public function setEmailAddress($emailAddress) {
        $this->emailAddress = $emailAddress;
    }

    /**
    * Set the Line 1
    *
    * @param string $line1 The first line of the address
    *
    * @return void 
    **/

    public function setLine1($line1) {
        $this->line1 = $line1;
    }

    /**
    * Set the Line 2
    *
    * @param string $line2 The second line of the address
    *
    * @return void 
    **/

    public function setLine2($line2) {
        $this->line2 = $line2;
    }

    /**
    * Set the Line 3
    *
    * @param string $line3 The third line of the address
    *
    * @return void 
    **/

    public function setLine3($line3) {
        $this->line3 = $line3;
    }

    /**
    * Set the City
    *
    * @param string $city The city of the address
    *
    * @return void 
    **/

    public function setCity($city) {
        $this->city = $city;
    }

    /**
    * Set the County
    *
    * @param string $county The county of the address
    *
    * @return void 
    **/

    public function setCounty($county) {
        $this->county = $county;
    }

    /**
    * Set the Postcode
    *
    * @param string $postcode The postcode of the address
    *
    * @return void 
    **/

    public function setPostcode($postcode) {
        $this->postcode = $postcode;
    }

    /**
    * Set the Country
    *
    * @param string $country The two character ISO 3166-1 country code of the address
    *
    * @return void 
    **/

    public function setCountry($country) {
        $this->country = $country;
    }

    // getters

    /**
    * Get the Name
    *
    * @return string The name of the recipient
    **/

    public function name() {
        return $this->name;
    }

    /**
    * Get the Company Name
    *
    * @return string The company name of the address
    **/
    
    public function companyName() {
        return $this->companyName;
    }

    /**
    * Get the Telephone
    *
    * @return string The telephone number to contact for the address
    **/
    
    public function telephone() {
        return $this->telephone;
    }

    /**
    * Get the Email Address
    *
    * @return string The email address to contact for the address
    **/
    
    public function emailAddress() {
        return $this->emailAddress;
    }
    
    /**
    * Get the Line 1
    *
    * @return string The first line of the address
    **/

    public function line1() {
        return $this->line1;
    }

    /**
    * Get the Line 2
    *
    * @return string The second line of the address
    **/
    
    public function line2() {
        return $this->line2;
    }

    /**
    * Get the Line 3
    *
    * @return string The third line of the address
    **/
    
    public function line3() {
        return $this->line3;
    }

    /**
    * Get the City
    *
    * @return string The city of the address
    **/
    
    public function city() {
        return $this->city;
    }

    /**
    * Get the County
    *
    * @return string The county of the address
    **/
    
    public function county() {
        return $this->county;
    }

    /**
    * Get the Postcode
    *
    * @return string The postcode of the address
    **/
    
    public function postcode() {
        return $this->postcode;
    }

    /**
    * Get the Country
    *
    * @return string The two character ISO 3166-1 country code of the address
    **/
    
    public function country() {
        return $this->country;
    }
    
}