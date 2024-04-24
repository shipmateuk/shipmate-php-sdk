<?php

namespace Shipmate;

class User {

    protected $id;
    protected $userType;
    protected $title;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $accountName;
    protected $merchantId;
    protected $profileImageUrl;
    protected $accountLogoUrl;
    protected $location;
    protected $locations;
    protected $accessLevel;
    protected $printerOnline;

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
    * Set the User Type
    *
    * @param string $userType User Type 
    *
    * @return void 
    **/

    public function setUserType($userType) {
        $this->userType = $userType;
    }
    
    /**
    * Set the Title
    *
    * @param string $title e.g., Mr, Miss, Mrs, Mx
    *
    * @return void 
    **/
    
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
    * Set the First Name
    *
    * @param string $firstName The user's first name
    *
    * @return void 
    **/
    
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    /**
    * Set the Last Name
    *
    * @param string $lastName The user's last name
    *
    * @return void 
    **/
    
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    /**
    * Set the Email
    *
    * @param string $email The user's email address
    *
    * @return void 
    **/
    
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
    * Set the Account Name
    *
    * @param string $accountName Account name
    *
    * @return void 
    **/

    public function setAccountName($accountName) {
        $this->accountName = $accountName;
    }

    /**
    * Set the Merchant ID
    *
    * @param string $merchantId Merchant ID
    *
    * @return void 
    **/

    public function setMerchantId($merchantId) {
        $this->merchantId = $merchantId;
    }

    /**
    * Set the Profile Image Url
    *
    * @param string $profileImageUrl URL to the user's profile image
    *
    * @return void 
    **/
    
    public function setProfileImageUrl($profileImageUrl) {
        $this->profileImageUrl = $profileImageUrl;
    }

    /**
    * Set the Account Logo Url
    *
    * @param string $accountLogoUrl URL to the user's account logo
    *
    * @return void 
    **/

    public function setAccountLogoUrl($accountLogoUrl) {
        $this->accountLogoUrl = $accountLogoUrl;
    }

    /**
    * Set the Location
    *
    * @param \Shipmate\Location $location The user's currently assigned Location
    *
    * @return void 
    **/
    
    public function setLocation($location) {
        $this->location = $location;
    }

    /**
    * Set the Locations
    *
    * @param array $locations The user's Locations
    *
    * @return void 
    **/

    public function setLocations($locations) {
        $this->locations = $locations;
    }

    /**
    * Set the Access Level
    *
    * @param string $accessLevel The user's access level, one of MERCHANT_ADMIN, MERCHANT_USER, 3PL_ADMIN, 3PL_USER
    *
    * @return void 
    **/
    
    public function setAccessLevel($accessLevel) {
        $this->accessLevel = $accessLevel;
    }

    /**
    * Set the Printer Online
    *
    * @param bool $printerOnline Returns true if the user currently has the Desktop Printer App running
    *
    * @return void 
    **/
    
    public function setPrinterOnline($printerOnline) {
        $this->printerOnline = $printerOnline;
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
    * Get the User Type
    *
    * @return string User Type
    **/

    public function userType() {
        return $this->userType;
    }

    /**
    * Get the Title
    *
    * @return string e.g., Mr, Miss, Mrs, Mx
    **/
    
    public function title() {
        return $this->title;
    }

    /**
    * Get the First Name
    *
    * @return string The user's first name
    **/
    
    public function firstName() {
        return $this->firstName;
    }

    /**
    * Get the Last Name
    *
    * @return string The user's last name
    **/
    
    public function lastName() {
        return $this->lastName;
    }

    /**
    * Get the Email
    *
    * @return string The user's email address
    **/
    
    public function email() {
        return $this->email;
    }

    /**
    * Get the Account Name
    *
    * @return string Account name
    **/

    public function accountName() {
        return $this->accountName;
    }

    /**
    * Get the Merchant ID
    *
    * @return string Merchant ID
    **/

    public function merchantId() {
        return $this->merchantId;
    }

    /**
    * Get the Profile Image Url
    *
    * @return string URL to the user's profile image
    **/
    
    public function profileImageUrl() {
        return $this->profileImageUrl;
    }

    /**
	* Get the Account Logo Url
	*
	* @return string URL to the user's account logo
	**/

    public function accountLogoUrl() {
        return $this->accountLogoUrl;
    }

    /**
    * Get the Location
    *
    * @return \Shipmate\Location The user's currently assigned Location
    **/
    
    public function location() {
        return $this->location;
    }

    /**
	* Get the Locations
	*
	* @return array Locations on the user's account 
	**/

    public function locations() {
        return $this->locations;
    }

    /**
    * Get the Access Level
    *
    * @return string The user's access level, one of MERCHANT_ADMIN, MERCHANT_USER, 3PL_ADMIN, 3PL_USER
    **/
    
    public function accessLevel() {
        return $this->accessLevel;
    }

    /**
    * Get the Printer Online
    *
    * @return bool Returns true if the user currently has the Desktop Printer App running
    **/
    
    public function printerOnline() {
        return $this->printerOnline;
    }
}