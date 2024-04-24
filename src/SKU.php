<?php

namespace Shipmate;

use ObjectEncoder;

/**
* SKU
*
* A SKU represents a stock keeping unit or product that you will despatch in orders.
*/


class SKU extends ObjectEncoder {

    protected $id;
    protected $sku;
    protected $productName;
    protected $outerBarcode;
    protected $innerBarcode;
    protected $productCode;
    protected $descriptionShort;
    protected $descriptionFull;
    protected $department;
    protected $category;
    protected $location;
    protected $warehouseLocation;
    protected $tariffCode;
    protected $tariffDescription;
    // protected $countryOfManufacture;
    protected $countryOfOrigin;
    protected $manufacturerName;
    protected $partNumber;
    protected $valueExVat;
    protected $vatRate;
    protected $valueIncVat;
    protected $grossWeight;
    protected $netWeight;
    protected $width;
    protected $length;
    protected $depth;
    protected $hazardCodes;
    protected $isStockedItem;
    protected $inStock;
    protected $customFields;
    protected $itemHandling;
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
    * Set the SKU
    *
    * @param string $sku SKU number used to match on your other systems
    *
    * @return void 
    **/
    
    public function setSKU($sku) {
        $this->sku = $sku;
    }

    /**
    * Set the Product Name
    *
    * @param string $productName The name of the product
    *
    * @return void 
    **/
    
    public function setProductName($productName) {
        $this->productName = $productName;
    }

    /**
    * Set the Outer Barcode
    *
    * @param string $outerBarcode Barcode used on the containing packaging of the product
    *
    * @return void 
    **/
    
    public function setOuterBarcode($outerBarcode) {
        $this->outerBarcode = $outerBarcode;
    }

    /**
    * Set the Inner Barcode
    *
    * @param string $innerBarcode Barcode used on the product
    *
    * @return void 
    **/ 
    
    public function setInnerBarcode($innerBarcode) {
        $this->innerBarcode = $innerBarcode;
    }

    /**
    * Set the Product Code
    *
    * @param string $productCode The manufacturer's product number or code
    *
    * @return void 
    **/
    
    public function setProductCode($productCode) {
        $this->productCode = $productCode;
    }

    /**
    * Set the Description Short
    *
    * @param string $descriptionShort A short description of the product
    *
    * @return void 
    **/
    
    public function setDescriptionShort($descriptionShort) {
        $this->descriptionShort = $descriptionShort;
    }

    /**
    * Set the Description Full
    *
    * @param string $descriptionFull The full description of the product
    *
    * @return void 
    **/
    
    public function setDescriptionFull($descriptionFull) {
        $this->descriptionFull = $descriptionFull;
    }

    /**
    * Set the Department
    *
    * @param string $department Department name or code for categorisation
    *
    * @return void 
    **/
    
    public function setDepartment($department) {
        $this->department = $department;
    }

    /**
    * Set the Category
    *
    * @param string $category Category name
    *
    * @return void 
    **/
    
    public function setCategory($category) {
        $this->category = $category;
    }

    /**
    * Set the Location
    *
    * @param \Shipmate\Location $location The Location this SKU is held at
    *
    * @return void 
    **/
    
    public function setLocation($location) {
        $this->location = $location;
    }

    /**
    * Set the Warehouse Location
    *
    * @param string $warehouseLocation Storage location code to help you locate SKU
    *
    * @return void 
    **/
    
    public function setWarehouseLocation($warehouseLocation) {
        $this->warehouseLocation = $warehouseLocation;
    }

    /**
    * Set the Tariff Code
    *
    * @param string $tariffCode Harmonised Code or Tariff Code for Customs Declarations
    *
    * @return void 
    **/
    
    public function setTariffCode($tariffCode) {
        $this->tariffCode = $tariffCode;
    }

    /**
    * Set the TariffDescription
    *
    * @param string $tariffDescription Product description for Customs Declarations
    *
    * @return void 
    **/
    
    public function setTariffDescription($tariffDescription) {
        $this->tariffDescription = $tariffDescription;
    }

    /**
    * Set the Country of Manufacture
    *
    * @param string $countryOfManufacture The two character ISO 3166-1 country code, e.g., GB
    *
    * @return void 
    **/
    
    // public function setCountryOfManufacture($countryOfManufacture) {
    //     $this->countryOfManufacture = $countryOfManufacture;
    // }

    /**
    * Set the Country Of Origin
    *
    * @param string $countryOfOrigin The two character ISO 3166-1 country code, e.g., GB
    *
    * @return void 
    **/
    
    public function setCountryOfOrigin($countryOfOrigin) {
        $this->countryOfOrigin = $countryOfOrigin;
    }

    /**
    * Set the Manufacturer Name
    *
    * @param string $manufacturerName Manufacturer name
    *
    * @return void 
    **/
    
    public function setManufacturerName($manufacturerName) {
        $this->manufacturerName = $manufacturerName;
    }

    /**
    * Set the Part Number
    *
    * @param string $partNumber Manufacturer part number
    *
    * @return void 
    **/
    
    public function setPartNumber($partNumber) {
        $this->partNumber = $partNumber;
    }

    /**
    * Set the Value Ex Vat
    *
    * @param float $valueExVat Value of SKU excluding VAT
    *
    * @return void 
    **/
    
    public function setValueExVat($valueExVat) {
        $this->valueExVat = $valueExVat;
    }

    /**
    * Set the Vat Rate
    *
    * @param float $vatRate The VAT Rate of this SKU
    *
    * @return void 
    **/
    
    public function setVatRate($vatRate) {
        $this->vatRate = $vatRate;
    }

    /**
    * Set the Value Inc Vat
    *
    * @param float $valueIncVat Value of SKU including VAT
    *
    * @return void 
    **/
    
    public function setValueIncVat($valueIncVat) {
        $this->valueIncVat = $valueIncVat;
    }

    /**
    * Set the Gross Weight
    *
    * @param int $grossWeight Gross weight of SKU, in grammes
    *
    * @return void 
    **/
    
    public function setGrossWeight($grossWeight) {
        $this->grossWeight = $grossWeight;
    }

    /**
    * Set the Net Weight
    *
    * @param int $netWeight Net weight of SKU, in grammes
    *
    * @return void 
    **/
    
    public function setNetWeight($netWeight) {
        $this->netWeight = $netWeight;
    }

    /**
    * Set the Width
    *
    * @param int $width Width of SKU, in mm
    *
    * @return void 
    **/
    
    public function setWidth($width) {
        $this->width = $width;
    }

    /**
    * Set the Length
    *
    * @param int $length Length of SKU, in mm
    *
    * @return void 
    **/
    
    public function setLength($length) {
        $this->length = $length;
    }

    /**
    * Set the Depth
    *
    * @param int $depth Depth of SKU, in mm
    *
    * @return void 
    **/
    
    public function setDepth($depth) {
        $this->depth = $depth;
    }

    /**
    * Set the Hazard Codes
    *
    * @param array $hazardCodes UN hazard codes
    *
    * @return void 
    **/
    
    public function setHazardCodes($hazardCodes) {
        $this->hazardCodes = $hazardCodes;
    }

    /**
    * Set the Is Stocked Item
    *
    * @param bool $isStockedItem Whether this is an item kept in stock
    *
    * @return void 
    **/
    
    public function setIsStockedItem($isStockedItem) {
        $this->isStockedItem = $isStockedItem;
    }

    /**
    * Set the In Stock
    *
    * @param bool $inStock Whether this item is currently in stock
    *
    * @return void 
    **/
    
    public function setInStock($inStock) {
        $this->inStock = $inStock;
    }
    
    /**
    * Set the Custom Fields
    *
    * @param array $customFields Array of key => value pairs
    *
    * @return void 
    **/

    public function setCustomFields($customFields) {
        $this->customFields = $customFields;
    }

    /**
    * Set the Item Handling
    *
    * @param string $itemHandling PACKABLE or NON_PACKABLE
    *
    * @return void 
    **/
    
    public function setItemHandling($itemHandling) {
        $this->itemHandling = $itemHandling;
    }

    /**
    * Set the Created At
    *
    * @param string $createdAt Date and time SKU was created
    *
    * @return void 
    **/
    
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    /**
    * Set the Updated At
    *
    * @param string $updatedAt Date and time SKU was last updated
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
    * Get the SKU
    *
    * @return string SKU number used to match on your other systems
    **/
    
    public function sku() {
        return $this->sku;
    }

    /**
    * Get the Product Name
    *
    * @return string The name of the product
    **/
    
    public function productName() {
        return $this->productName;
    }

    /**
    * Get the Outer Barcode
    *
    * @return string Barcode used on the containing packaging of the product
    **/
    
    public function outerBarcode() {
        return $this->outerBarcode;
    }

    /**
    * Get the Inner Barcode
    *
    * @return string Barcode used on the product
    **/
    
    public function innerBarcode() {
        return $this->innerBarcode;
    }

    /**
    * Get the Product Code
    *
    * @return string The manufacturer's product number or code
    **/
    
    public function productCode() {
        return $this->productCode;
    }

    /**
    * Get the Description Short
    *
    * @return string A short description of the product
    **/
    
    public function descriptionShort() {
        return $this->descriptionShort;
    }

    /**
    * Get the Description Full
    *
    * @return string The full description of the product
    **/
    
    public function descriptionFull() {
        return $this->descriptionFull;
    }

    /**
    * Get the Department
    *
    * @return string Department name or code for categorisation
    **/
    
    public function department() {
        return $this->department;
    }

    /**
    * Get the Category
    *
    * @return string Category name
    **/
    
    public function category() {
        return $this->category;
    }

    /**
    * Get the Location
    *
    * @return \Shipmate\Location The Location this SKU is held at
    **/
    
    public function location() {
        return $this->location;
    }

    /**
    * Get the Warehouse Location
    *
    * @return string Storage location code to help you locate SKU
    **/
    
    public function warehouseLocation() {
        return $this->warehouseLocation;
    }

    /**
    * Get the Tariff Code
    *
    * @return string Harmonised Code or Tariff Code for Customs Declarations
    **/
    
    public function tariffCode() {
        return $this->tariffCode;
    }

    /**
    * Get the TariffDescription
    *
    * @return string Product description for Customs Declarations
    **/
    
    public function tariffDescription() {
        return $this->tariffDescription;
    }

    /**
    * Get the Country of Manufacture
    *
    * @return \Shipmate\Country Country of Manufacture
    **/
    
    // public function countryOfManufacture() {
    //     return $this->countryOfManufacture;
    // }

    /**
    * Get the Country Of Origin
    *
    * @return \Shipmate\Country Country of Origin
    **/
    
    public function countryOfOrigin() {
        return $this->countryOfOrigin;
    }

    /**
    * Get the Manufacturer Name
    *
    * @return string Manufacturer name
    **/
    
    public function manufacturerName() {
        return $this->manufacturerName;
    }

    /**
    * Get the Part Number
    *
    * @return string Manufacturer part number
    **/
    
    public function partNumber() {
        return $this->partNumber;
    }

    /**
    * Get the Value Ex Vat
    *
    * @return float Value of SKU excluding VAT
    **/
    
    public function valueExVat() {
        return $this->valueExVat;
    }

    /**
    * Get the Vat Rate
    *
    * @return float The VAT Rate of this SKU
    **/
    
    public function vatRate() {
        return $this->vatRate;
    }

    /**
    * Get the Value Inc Vat
    *
    * @return float Value of SKU including VAT
    **/
    
    public function valueIncVat() {
        return $this->valueIncVat;
    }

    /**
    * Get the Gross Weight
    *
    * @return int Gross weight of SKU, in grammes
    **/
    
    public function grossWeight() {
        return $this->grossWeight;
    }

    /**
    * Get the Net Weight
    *
    * @return int Net weight of SKU, in grammes
    **/
    
    public function netWeight() {
        return $this->netWeight;
    }

    /**
    * Get the Width
    *
    * @return int Width of SKU, in mm
    **/
    
    public function width() {
        return $this->width;
    }

    /**
    * Get the Length
    *
    * @return int Length of SKU, in mm
    **/
    
    public function length() {
        return $this->length;
    }

    /**
    * Get the Depth
    *
    * @return int Depth of SKU, in mm
    **/
    
    public function depth() {
        return $this->depth;
    }

    /**
    * Get the Hazard Codes
    *
    * @return array UN hazard codes
    **/
    
    public function hazardCodes() {
        return $this->hazardCodes;
    }

    /**
    * Get the Is Stocked Item
    *
    * @return bool Whether this is an item kept in stock
    **/
    
    public function isStockedItem() {
        return $this->isStockedItem;
    }

    /**
    * Get the In Stock
    *
    * @return bool Whether this item is currently in stock
    **/
    
    public function inStock() {
        return $this->inStock;
    }

    /**
    * Get the Custom Fields
    *
    * @return array Array of key => value pairs
    **/
    
    public function customFields() {
        return $this->customFields;
    }

    /**
    * Get the Item Handling
    *
    * @return string PACKABLE or NON_PACKABLE
    **/
    
    public function itemHandling() {
        return $this->itemHandling;
    }

    /**
    * Get the Created At
    *
    * @return string Date and time SKU was created
    **/
    
    public function createdAt() {
        return $this->createdAt;
    }

    /**
    * Get the Updated At
    *
    * @return string Date and time SKU was last updated
    **/
    
    public function updatedAt() {
        return $this->updatedAt;
    }
}