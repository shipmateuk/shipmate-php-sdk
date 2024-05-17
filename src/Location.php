<?php

namespace Shipmate;

use Shipmate\ObjectEncoder;

/**
* Location
*
* A Location represents one of the Locations you have set up in your Shipmate account.
*/

class Location extends ObjectEncoder {

    protected $id;
    protected $code;
    protected $name;
    protected $type;
    protected $telephone;
    protected $email;
    protected $addressName;
    protected $addressLine1;
    protected $addressLine2;
    protected $addressLine3;
    protected $addressTownCity;
    protected $addressCounty;
    protected $addressCountry;
    protected $addressPostZipCode;
    protected $default;
    protected $isCurrentLocation;
    protected $createdAt;
    protected $updatedAt;

    // setters

    /**
    * Set the ID
    *
    * @param string $id Unique system identifier
    *
    * @return void 
    **/

    public function setId($id) {
        $this->id = $id;
    }

    /**
    * Set the Code
    *
    * @param string $code Location code e.g., HQ
    *
    * @return void 
    **/
    
    public function setCode($code) {
        $this->code = $code;
    }

    /**
    * Set the Name
    *
    * @param string $name Location name e.g., Headquarters
    *
    * @return void 
    **/
    
    public function setName($name) {
        $this->name = $name;
    }

    /**
    * Set the Type
    *
    * @param string $type Type of Location e.g., Store or Warehouse
    *
    * @return void 
    **/
    
    public function setType($type) {
        $this->type = $type;
    }

    /**
    * Set the Telephone
    *
    * @param string $telephone Telephone number for the Location
    *
    * @return void 
    **/
    
    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    /**
    * Set the Email
    *
    * @param string $email Email address for the Location
    *
    * @return void 
    **/
    
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
    * Set the Address Name
    *
    * @param string $addressName Company or FAO name for Location
    *
    * @return void 
    **/
    
    public function setAddressName($addressName) {
        $this->addressName = $addressName;
    }

    /**
    * Set the Address Line 1
    *
    * @param string $addressLine1 Address line 1 of Location
    *
    * @return void 
    **/
    
    public function setAddressLine1($addressLine1) {
        $this->addressLine1 = $addressLine1;
    }

    /**
    * Set the Address Line 2
    *
    * @param string $addressLine2 Address line 2 of Location
    *
    * @return void 
    **/
    
    public function setAddressLine2($addressLine2) {
        $this->addressLine2 = $addressLine2;
    }

    /**
    * Set the Address Line 3
    *
    * @param string $addressLine3 Address line 3 of Location
    *
    * @return void 
    **/
    
    public function setAddressLine3($addressLine3) {
        $this->addressLine3 = $addressLine3;
    }

    /**
    * Set the Address Town City
    *
    * @param string $addressTownCity Town or city of Location
    *
    * @return void 
    **/
    
    public function setAddressTownCity($addressTownCity) {
        $this->addressTownCity = $addressTownCity;
    }

    /**
    * Set the Address County
    *
    * @param string $addressCounty County of Location
    *
    * @return void 
    **/
    
    public function setAddressCounty($addressCounty) {
        $this->addressCounty = $addressCounty;
    }
    
    /**
    * Set the Address Country
    *
    * @param \Shipmate\Country $addressCountry Country of Location
    *
    * @return void 
    **/

    public function setAddressCountry($addressCountry) {
        $this->addressCountry = $addressCountry;
    }

    /**
    * Set the Address Post Zip Code
    *
    * @param string $addressPostZipCode Postcode of Location
    *
    * @return void 
    **/
    
    public function setAddressPostZipCode($addressPostZipCode) {
        $this->addressPostZipCode = $addressPostZipCode;
    }

    /**
    * Set the Default
    *
    * @param bool $default Whether this is the account's default Location
    *
    * @return void 
    **/
    
    public function setDefault($default) {
        $this->default = $default;
    }

    /**
	* Set the Is Current Location
	*
	* @param bool $isCurrentLocation Whether this is the account's current Location
	*
	* @return void
	**/

    public function setIsCurrentLocation($isCurrentLocation) {
        $this->isCurrentLocation = $isCurrentLocation;
    }

    /**
    * Set the Created At
    *
    * @param string $createdAt When the Location was first created on Shipmate
    *
    * @return void 
    **/
    
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    /**
    * Set the Updated At
    *
    * @param string $updatedAt When the Location was last updated on Shipmate
    *
    * @return void 
    **/
    
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }
    
    // getters

    /**
    * Get the ID
    *
    * @return string Unique system identifier
    **/

    public function id() {
        return $this->id;
    }

    /**
    * Get the Code
    *
    * @return string Location code e.g., HQ
    **/
    
    public function code() {
        return $this->code;
    }

    /**
    * Get the Name
    *
    * @return string Location name e.g., Headquarters
    **/
    
    public function name() {
        return $this->name;
    }

    /**
    * Get the Type
    *
    * @return string Type of Location e.g., Store or Warehouse
    **/
    
    public function type() {
        return $this->type;
    }

    /**
    * Get the Telephone
    *
    * @return string Telephone number for the Location
    **/
    
    public function telephone() {
        return $this->telephone;
    }

    /**
    * Get the Email
    *
    * @return string Email address for the Location
    **/
    
    public function email() {
        return $this->email;
    }

    /**
    * Get the Address Name
    *
    * @return string Company or FAO name for Location
    **/
    
    public function addressName() {
        return $this->addressName;
    }

    /**
    * Get the Address Line 1
    *
    * @return string Address line 1 of Location
    **/
    
    public function addressLine1() {
        return $this->addressLine1;
    }

    /**
    * Get the Address Line 2
    *
    * @return string Address line 2 of Location
    **/
    
    public function addressLine2() {
        return $this->addressLine2;
    }

    /**
    * Get the Address Line 3
    *
    * @return string Address line 3 of Location
    **/
    
    public function addressLine3() {
        return $this->addressLine3;
    }

    /**
    * Get the Address Town City
    *
    * @return string Town or city of Location
    **/
    
    public function addressTownCity() {
        return $this->addressTownCity;
    }

    /**
    * Get the Address County
    *
    * @return string County of Location
    **/
    
    public function addressCounty() {
        return $this->addressCounty;
    }

    /**
    * Get the Address Country
    *
    * @return \Shipmate\Country Country of Location
    **/
    
    public function addressCountry() {
        return $this->addressCountry;
    }

    /**
    * Get the Address Post Zip Code
    *
    * @return string Postcode of Location
    **/
    
    public function addressPostZipCode() {
        return $this->addressPostZipCode;
    }

    /**
    * Get the Default
    *
    * @return bool Whether this is the account's default Location
    **/
    
    public function default() {
        return $this->default;
    }

    /**
    * Get the Current Location
    *
    * @return bool Whether this is the account's current Location
    **/

    public function isCurrentLocation() {
        return $this->isCurrentLocation;
    }

    /**
    * Get the Created At
    *
    * @return string When the Location was first created on Shipmate
    **/
    
    public function createdAt() {
        return $this->createdAt;
    }

    /**
    * Get the Updated At
    *
    * @return string When the Location was last updated on Shipmate
    **/
    
    public function updatedAt() {
        return $this->updatedAt;
    }
}