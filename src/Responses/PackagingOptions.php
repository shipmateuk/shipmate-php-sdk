<?php

namespace Shipmate\Responses;

/**
* Packaging Options
*
* The Get Packaging Options request will return your Packaging Options, along with an array of available Packaging Types that can be used when creating a Shipment. You may optionally provide the key of the Packaging Type you wish to use as the packaging_type_key attribute for each parcel within your Shipment.  
*
* If the allow_override option is set to true, you may provide the weight and individual parcel dimensions in your POST /shipments requests, otherwise you must supply a packaging_type_key, or the default Packaging Type dimensions will be used.
*
* If the net_weight option is set to true, the packaging_weight of the chosen Packaging Type is added to the supplied weight of the parcel, or otherwise added to the default_weight value of the Packaging Type when the Shipment is created.
*
* All weight values are in grammes and all dimension values are in mm.
*/

class PackagingOptions {

    protected $netWeight;
    protected $allowOverride;
    protected $packagingTypes = [];

    // setters

    /**
     * Set Net Weight
     *
     * @param bool $netWeight If the net_weight option is set to true, the packaging_weight of the chosen Packaging Type is added to the supplied weight of the parcel, or otherwise added to the default_weight value of the Packaging Type when the Shipment is created.
     *
     * @return void
     **/

    public function setNetWeight($netWeight) {
        $this->netWeight = $netWeight;
    }

    /**
     * Set whether override is allowed
     *
     * @param bool $allowOverride If the allow_override option is set to true, you may provide the weight and individual parcel dimensions in your POST /shipments requests, otherwise you must supply a packaging_type_key, or the default Packaging Type dimensions will be used.
     *
     * @return void
     **/
    
    public function setAllowOverride($allowOverride) {
        $this->allowOverride = $allowOverride;
    }

    /**
     * Set the Packaging Types
     *
     * @param array $packagingTypes Packaging Types that can be used when creating a Shipment.
     *
     * @return void
     **/
    
    public function setPackagingTypes($packagingTypes) {
        $this->packagingTypes = $packagingTypes;
    }

    /**
     * Add a Packaging Type
     *
     * @param \Shipmate\Responses\PackagingType $packagingType Packaging Type that can be used when creating a Shipment.
     *
     * @return void
     **/

    public function addPackagingType($packagingType)
    {
        $this->packagingTypes[] = $packagingType;
    }

    // getters

    /**
     * Get the Net Weight.
     *
     * @return bool If the net_weight option is set to true, the packaging_weight of the chosen Packaging Type is added to the supplied weight of the parcel, or otherwise added to the default_weight value of the Packaging Type when the Shipment is created.
     **/

    public function netWeight() {
        return $this->netWeight;
    }

    /**
     * Get whether override is allowed.
     *
     * @return bool If the allow_override option is set to true, you may provide the weight and individual parcel dimensions in your POST /shipments requests, otherwise you must supply a packaging_type_key, or the default Packaging Type dimensions will be used.
     **/
    
    public function allowOverride() {
        return $this->allowOverride;
    }

    /**
     * Get the Packaging Types.
     *
     * @return array Packaging Types that can be used when creating a Shipment
     **/
    
    public function packagingTypes() {
        return $this->packagingTypes;
    }
}