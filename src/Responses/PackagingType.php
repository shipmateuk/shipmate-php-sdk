<?php

namespace Shipmate\Responses;

class PackagingType {

    protected $name;
    protected $key;
    protected $default;
    protected $internalWidth;
    protected $internalHeight;
    protected $internalDepth;
    protected $externalWidth;
    protected $externalHeight;
    protected $externalDepth;
    protected $maxWeight;
    protected $defaultWeight;
    protected $packagingWeight;
    protected $available;

    // setters

    /**
    * Set the Name of the Packaging Type
    *
    * @param string $name The name of the Packaging Type
    *
    * @return void
    **/

    public function setName($name) {
        $this->name = $name;
    }

    /**
    * Set the Key of the Packaging Type
    *
    * @param string $key The key of the Packaging Type
    *
    * @return void
    **/

    public function setKey($key) {
        $this->key = $key;
    }

    /**
    * Set the Default of the Packaging Type
    *
    * @param bool $default Whether or not this is the default Packaging Type
    *
    * @return void
    **/

    public function setDefault($default) {
        $this->default = $default;
    }

    /**
    * Set the Internal Width of the Packaging Type
    *
    * @param int $internalWidth The internal width of the Packaging Type
    *
    * @return void
    **/

    public function setInternalWidth($internalWidth) {
        $this->internalWidth = $internalWidth;
    }

    /**
    * Set the Internal Height of the Packaging Type
    *
    * @param int $internalHeight The internal height of the Packaging Type
    *
    * @return void
    **/

    public function setInternalHeight($internalHeight) {
        $this->internalHeight = $internalHeight;
    }

    /**
    * Set the Internal Depth of the Packaging Type
    *
    * @param int $internalDepth The internal depth of the Packaging Type
    *
    * @return void
    **/

    public function setInternalDepth($internalDepth) {
        $this->internalDepth = $internalDepth;
    }

    /**
    * Set the External Width of the Packaging Type
    *
    * @param int $externalWidth The external width of the Packaging Type
    *
    * @return void
    **/

    public function setExternalWidth($externalWidth) {
        $this->externalWidth = $externalWidth;
    }

    /**
    * Set the External Height of the Packaging Type
    *
    * @param int $externalHeight The external height of the Packaging Type
    *
    * @return void
    **/

    public function setExternalHeight($externalHeight) {
        $this->externalHeight = $externalHeight;
    }

    /**
    * Set the External Depth of the Packaging Type
    *
    * @param int $externalDepth The external depth of the Packaging Type
    *
    * @return void
    **/

    public function setExternalDepth($externalDepth) {
        $this->externalDepth = $externalDepth;
    }

    /**
    * Set the Maximum Weight of the Packaging Type
    *
    * @param int $maxWeight The maximum weight of the Packaging Type
    *
    * @return void
    **/

    public function setMaxWeight($maxWeight) {
        $this->maxWeight = $maxWeight;
    }

    /**
    * Set the Default Weight of the Packaging Type
    *
    * @param int $defaultWeight The default weight of the Packaging Type
    *
    * @return void
    **/

    public function setDefaultWeight($defaultWeight) {
        $this->defaultWeight = $defaultWeight;
    }

    /**
    * Set the Packaging Weight of the Packaging Type
    *
    * @param int $packagingWeight The packaging weight of the Packaging Type
    *
    * @return void
    **/

    public function setPackagingWeight($packagingWeight) {
        $this->packagingWeight = $packagingWeight;
    }

    /**
    * Set the Available of the Packaging Type
    *
    * @param bool $available Whether or not this Packaging Type is available
    *
    * @return void
    **/

    public function setAvailable($available) {
        $this->available = $available;
    }

    // getters

    /**
	* Get the Name
	*
	* @return string The name of the Packaging Type
	**/

    public function name() {
        return $this->name;
    }

    /**
	* Get the Key
	*
	* @return string The key of the Packaging Type
	**/
    
    public function key() {
        return $this->key;
    }

    /**
	* Get the Default
	*
	* @return bool Whether or not this is the default Packaging Type
	**/
    
    public function default() {
        return $this->default;
    }

    /**
	* Get the Internal Width
	*
	* @return int The internal width of the Packaging Type
	**/
    
    public function internalWidth() {
        return $this->internalWidth;
    }

    /**
	* Get the Internal Height
	*
	* @return int The internal height of the Packaging Type
	**/
    
    public function internalHeight() {
        return $this->internalHeight;
    }

    /**
	* Get the Internal Depth
	*
	* @return int The internal depth of the Packaging Type
	**/
    
    public function internalDepth() {
        return $this->internalDepth;
    }

    /**
	* Get the External Width
	*
	* @return int The external width of the Packaging Type
	**/
    
    public function externalWidth() {
        return $this->externalWidth;
    }

    /**
	* Get the External Height
	*
	* @return int The external height of the Packaging Type
	**/
    
    public function externalHeight() {
        return $this->externalHeight;
    }

    /**
	* Get the External Depth
	*
	* @return int The external depth of the Packaging Type
	**/
    
    public function externalDepth() {
        return $this->externalDepth;
    }

    /**
	* Get the Max Weight
	*
	* @return int The maximum weight of the Packaging Type
	**/
    
    public function maxWeight() {
        return $this->maxWeight;
    }

    /**
	* Get the Default Weight
	*
	* @return int The default weight of the Packaging Type
	**/
    
    public function defaultWeight() {
        return $this->defaultWeight;
    }

    /**
	* Get the Packaging Weight
	*
	* @return int The packaging weight of the Packaging Type
	**/
    
    public function packagingWeight() {
        return $this->packagingWeight;
    }

    /**
	* Get the Availability of the Packaging Type 
	*
	* @return bool Whether or not this Packaging Type is available
	**/

    public function available() {
        return $this->available;
    }
}