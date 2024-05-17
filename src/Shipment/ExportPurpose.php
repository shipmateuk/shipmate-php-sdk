<?php

namespace Shipmate\Shipment;

use Shipmate\ObjectEncoder;

class ExportPurpose extends ObjectEncoder {

    protected $gift;
    protected $documents;
    protected $saleOfGoods;
    protected $commercialSample;
    protected $returnedGoods;
    protected $other;

    // setters

    /**
    * Set the Gift
    *
    * @param bool $gift True if this Parcel contains a Gift
    *
    * @return void 
    **/

    public function setGift($gift) {
        $this->gift = $gift;
    }

    /**
    * Set the Documents
    *
    * @param bool $documents True if this Parcel contains Documents
    *
    * @return void 
    **/
    
    public function setDocuments($documents) {
        $this->documents = $documents;
    }

    /**
    * Set the Sale Of Goods
    *
    * @param bool $saleOfGoods True if this Parcel is for Sale of Goods
    *
    * @return void 
    **/
    
    public function setSaleOfGoods($saleOfGoods) {
        $this->saleOfGoods = $saleOfGoods;
    }

    /**
    * Set the Commercial Sample
    *
    * @param bool $commercialSample True if this Parcel contains a Commercial Sample
    *
    * @return void 
    **/
    
    public function setCommercialSample($commercialSample) {
        $this->commercialSample = $commercialSample;
    }

    /**
    * Set the Returned Goods
    *
    * @param bool $returnedGoods True if this Parcel contains Returned Goods
    *
    * @return void 
    **/
    
    public function setReturnedGoods($returnedGoods) {
        $this->returnedGoods = $returnedGoods;
    }

    /**
    * Set the Other
    *
    * @param string $other Other export purpose, if not represented by one of the above options.
    *
    * @return void 
    **/
    
    public function setOther($other) {
        $this->other = $other;
    }

    // getters

    /**
    * Get the Gift
    *
    * @return bool True if this Parcel contains a Gift
    **/

    public function gift() {
        return $this->gift;
    }

    /**
    * Get the Documents
    *
    * @return bool True if this Parcel contains Documents
    **/
    
    public function documents() {
        return $this->documents;
    }

    /**
    * Get the Sale Of Goods
    *
    * @return bool True if this Parcel is for Sale of Goods
    **/
    
    public function saleOfGoods() {
        return $this->saleOfGoods;
    }

    /**
    * Get the Commercial Sample
    *
    * @return bool True if this Parcel contains a Commercial Sample
    **/
    
    public function commercialSample() {
        return $this->commercialSample;
    }

    /**
    * Get the Returned Goods
    *
    * @return bool True if this Parcel contains Returned Goods
    **/
    
    public function returnedGoods() {
        return $this->returnedGoods;
    }

    /**
    * Get the Other
    *
    * @return string Other export purpose, if not represented by one of the above options.
    **/
    
    public function other() {
        return $this->other;
    }   
}