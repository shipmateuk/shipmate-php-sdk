<?php

namespace Shipmate\Shipment;

use ObjectEncoder;

/**
* Item
*
* Items represent each individual item that is being sent within a Parcel and tracks data such as value and customs declaration details.
*/

class Item extends ObjectEncoder {

    protected $itemLineId;
    protected $sku;
    protected $shortDescription;
    protected $fullDescription;
    protected $countryOfOrigin;
    protected $harmonisedCode;
    protected $itemWeight;
    protected $itemValue;
    protected $itemQuantity;

    // setters

    /**
    * Set the Item Line ID
    *
    * @param string $itemLineId Used to link Items across multiple parcels. Optional, but if value matches the item will be considered to be split across the parcels this value appears. If used, additional validation prevents other non-matching Items appearing in the same Parcel.
    *
    * @return void 
    **/

    public function setItemLineId($itemLineId) {
        $this->itemLineId = $itemLineId;
    }

    /**
    * Set the SKU
    *
    * @param string $sku Attempts a lookup on the SKU Inventory, populating all subsequent attributes on successful match. Optional for Mainland UK Deliveries, or where all subsequent attributes are otherwise provided.
    *
    * @return void 
    **/
    
    public function setSku($sku) {
        $this->sku = $sku;
    }

    /**
    * Set the Short Description
    *
    * @param string $shortDescription A short description of the parcel contents. Optional for Mainland UK Deliveries, or when using SKU Inventory lookup. Overrides value held on SKU Inventory whenever provided.
    *
    * @return void 
    **/
    
    public function setShortDescription($shortDescription) {
        $this->shortDescription = $shortDescription;
    }

    /**
    * Set the Full Description
    *
    * @param string $fullDescription The full description of the parcel contents. Optional for Mainland UK Deliveries, or when using SKU Inventory lookup. Overrides value held on SKU Inventory whenever provided.
    *
    * @return void 
    **/
    
    public function setFullDescription($fullDescription) {
        $this->fullDescription = $fullDescription;
    }

    /**
    * Set the Country Of Origin
    *
    * @param string $countryOfOrigin Country of origin. Full name or ISO Alpha-2 code (e.g., "United Kingdom" or "GB"). Optional for Mainland UK Deliveries, or when using SKU Inventory lookup. Overrides value held on SKU Inventory whenever provided.
    *
    * @return void 
    **/
    
    public function setCountryOfOrigin($countryOfOrigin) {
        $this->countryOfOrigin = $countryOfOrigin;
    }

    /**
    * Set the Harmonised Code
    *
    * @param string $harmonisedCode Harmonised international trade code / tariff code. Optional for Mainland UK Deliveries, or when using SKU Inventory lookup. Overrides value held on SKU Inventory whenever provided.
    *
    * @return void 
    **/
    
    public function setHarmonisedCode($harmonisedCode) {
        $this->harmonisedCode = $harmonisedCode;
    }

    /**
    * Set the Item Weight
    *
    * @param int $itemWeight The weight of each item in grammes. Optional for Mainland UK Deliveries, or when using SKU Inventory lookup. Overrides value held on SKU Inventory whenever provided.
    *
    * @return void 
    **/
    
    public function setItemWeight($itemWeight) {
        $this->itemWeight = $itemWeight;
    }

    /**
    * Set the Item Value
    *
    * @param float $itemValue The value of each item in your account's base currency (2 d.p.). Optional for Mainland UK Deliveries, or when using SKU Inventory lookup. Overrides value held on SKU Inventory whenever provided.
    *
    * @return void 
    **/
    
    public function setItemValue($itemValue) {
        $this->itemValue = $itemValue;
    }

    /**
    * Set the Item Quantity
    *
    * @param int $itemQuantity The quantity of the item in the parcel. Optional for Mainland UK Deliveries. Defaults to 1 when using SKU Inventory lookup, unless value provided.
    *
    * @return void 
    **/
    
    public function setItemQuantity($itemQuantity) {
        $this->itemQuantity = $itemQuantity;
    }

    // getters

    /**
    * Get the Item Line ID
    *
    * @return string Used to link Items across multiple parcels. Optional, but if value matches the item will be considered to be split across the parcels this value appears. If used, additional validation prevents other non-matching Items appearing in the same Parcel.
    **/

    public function itemLineId() {
        return $this->itemLineId;
    }

    /**
    * Get the SKU
    *
    * @return string Attempts a lookup on the SKU Inventory, populating all subsequent attributes on successful match. Optional for Mainland UK Deliveries, or where all subsequent attributes are otherwise provided.
    **/
    
    public function sku() {
        return $this->sku;
    }

    /**
    * Get the Short Description
    *
    * @return string A short description of the parcel contents. Optional for Mainland UK Deliveries, or when using SKU Inventory lookup. Overrides value held on SKU Inventory whenever provided.
    **/
    
    public function shortDescription() {
        return $this->shortDescription;
    }

    /**
    * Get the Full Description
    *
    * @return string The full description of the parcel contents. Optional for Mainland UK Deliveries, or when using SKU Inventory lookup. Overrides value held on SKU Inventory whenever provided.
    **/
    
    public function fullDescription() {
        return $this->fullDescription;
    }

    /**
    * Get the Country Of Origin
    *
    * @return string Country of origin. Full name or ISO Alpha-2 code (e.g., "United Kingdom" or "GB"). Optional for Mainland UK Deliveries, or when using SKU Inventory lookup. Overrides value held on SKU Inventory whenever provided.
    **/
    
    public function countryOfOrigin() {
        return $this->countryOfOrigin;
    }

    /**
    * Get the Harmonised Code
    *
    * @return string Harmonised international trade code / tariff code. Optional for Mainland UK Deliveries, or when using SKU Inventory lookup. Overrides value held on SKU Inventory whenever provided.
    **/
    
    public function harmonisedCode() {
        return $this->harmonisedCode;
    }

    /**
    * Get the Item Weight
    *
    * @return int The weight of each item in grammes. Optional for Mainland UK Deliveries, or when using SKU Inventory lookup. Overrides value held on SKU Inventory whenever provided.
    **/
    
    public function itemWeight() {
        return $this->itemWeight;
    }

    /**
    * Get the Item Value
    *
    * @return float The value of each item in your account's base currency (2 d.p.). Optional for Mainland UK Deliveries, or when using SKU Inventory lookup. Overrides value held on SKU Inventory whenever provided.
    **/
    
    public function itemValue() {
        return $this->itemValue;
    }

    /**
    * Get the Item Quantity
    *
    * @return int The quantity of the item in the parcel. Optional for Mainland UK Deliveries. Defaults to 1 when using SKU Inventory lookup, unless value provided.
    **/
    
    public function itemQuantity() {
        return $this->itemQuantity;
    }
}