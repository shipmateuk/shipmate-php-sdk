<?php

namespace Shipmate\Shipment;

use ObjectEncoder;

class CustomsDeclaration extends ObjectEncoder {

    protected $dutyMethod;
    protected $commercialInvoiceNumber;
    protected $insuranceValue;
    protected $freightValue;
    protected $packingValue;
    protected $handlingValue;
    protected $otherValue;
    protected $currencyCode;
    protected $exportLicenseNumber;
    protected $exportCertificateNumber;
    protected $otherExportComments;
    protected $exportPurpose;

    // setters

    /**
    * Set the Duty Method
    *
    * @param string $dutyMethod Whether this is DAP or DDP. Defaults to value on account. Accepts only DAP or DDP.
    *
    * @return void 
    **/

    public function setDutyMethod($dutyMethod) {
        $this->dutyMethod = $dutyMethod;
    }

    /**
    * Set the Commercial Invoice Number
    *
    * @param string $commercialInvoiceNumber Defaults to Order Reference.
    *
    * @return void 
    **/
    
    public function setCommercialInvoiceNumber($commercialInvoiceNumber) {
        $this->commercialInvoiceNumber = $commercialInvoiceNumber;
    }

    /**
    * Set the Insurance Value
    *
    * @param float $insuranceValue Used to populate Commercial Invoice. Defaults to 0.00.
    *
    * @return void 
    **/
    
    public function setInsuranceValue($insuranceValue) {
        $this->insuranceValue = $insuranceValue;
    }

    /**
    * Set the Freight Value
    *
    * @param float $freightValue Used to populate Commercial Invoice. Defaults to 0.00.
    *
    * @return void 
    **/
    
    public function setFreightValue($freightValue) {
        $this->freightValue = $freightValue;
    }

    /**
    * Set the Packing Value
    *
    * @param float $packingValue Used to populate Commercial Invoice. Defaults to 0.00.
    *
    * @return void 
    **/
    
    public function setPackingValue($packingValue) {
        $this->packingValue = $packingValue;
    }

    /**
    * Set the Handling Value
    *
    * @param float $handlingValue Used to populate Commercial Invoice. Defaults to 0.00.
    *
    * @return void 
    **/
    
    public function setHandlingValue($handlingValue) {
        $this->handlingValue = $handlingValue;
    }

    /**
    * Set the Other Value
    *
    * @param float $otherValue Used to populate Commercial Invoice. May be a negative value for discounts. Defaults to 0.00.
    *
    * @return void 
    **/
    
    public function setOtherValue($otherValue) {
        $this->otherValue = $otherValue;
    }

    /**
    * Set the Currency Code
    *
    * @param string $currencyCode Used to populate Commercial Invoice. Defaults to account value. Accepts ISO currency code e.g., GBP, EUR.
    *
    * @return void 
    **/
    
    public function setCurrencyCode($currencyCode) {
        $this->currencyCode = $currencyCode;
    }

    /**
    * Set the Export License Number
    *
    * @param string $exportLicenseNumber Used to populate Commercial Invoice. Optional.
    *
    * @return void 
    **/
    
    public function setExportLicenseNumber($exportLicenseNumber) {
        $this->exportLicenseNumber = $exportLicenseNumber;
    }

    /**
    * Set the Export Certificate Number
    *
    * @param string $exportCertificateNumber Used to populate Commercial Invoice. Optional.
    *
    * @return void 
    **/
    
    public function setExportCertificateNumber($exportCertificateNumber) {
        $this->exportCertificateNumber = $exportCertificateNumber;
    }

    /**
    * Set the Other Export Comments
    *
    * @param string $otherExportComments Used to populate Commercial Invoice. Optional, accepts up to 1,000 characters.
    *
    * @return void 
    **/
    
    public function setOtherExportComments($otherExportComments) {
        $this->otherExportComments = $otherExportComments;
    }

    /**
    * Set the Export Purpose
    *
    * @param \Shipmate\Shipment\ExportPurpose $exportPurpose Export Purpose for customs declaration
    *
    * @return void 
    **/
    
    public function setExportPurpose($exportPurpose) {
        $this->exportPurpose = $exportPurpose;
    }

    // getters

    /**
    * Get the Duty Method
    *
    * @return string Whether this is DAP or DDP. Defaults to value on account. Accepts only DAP or DDP.
    **/

    public function dutyMethod() {
        return $this->dutyMethod;
    }

    /**
    * Get the Commercial Invoice Number
    *
    * @return string Defaults to Order Reference.
    **/
    
    public function commercialInvoiceNumber() {
        return $this->commercialInvoiceNumber;
    }

    /**
    * Get the Insurance Value
    *
    * @return float Used to populate Commercial Invoice. Defaults to 0.00.
    **/
    
    public function insuranceValue() {
        return $this->insuranceValue;
    }

    /**
    * Get the Freight Value
    *
    * @return float Used to populate Commercial Invoice. Defaults to 0.00.
    **/
    
    public function freightValue() {
        return $this->freightValue;
    }

    /**
    * Get the Packing Value
    *
    * @return float Used to populate Commercial Invoice. Defaults to 0.00.
    **/
    
    public function packingValue() {
        return $this->packingValue;
    }

    /**
    * Get the Handling Value
    *
    * @return float Used to populate Commercial Invoice. Defaults to 0.00.
    **/
    
    public function handlingValue() {
        return $this->handlingValue;
    }

    /**
    * Get the Other Value
    *
    * @return float Used to populate Commercial Invoice. May be a negative value for discounts. Defaults to 0.00.
    **/
    
    public function otherValue() {
        return $this->otherValue;
    }

    /**
    * Get the Currency Code
    *
    * @return string Used to populate Commercial Invoice. Defaults to account value. Accepts ISO currency code e.g., GBP, EUR.
    **/
    
    public function currencyCode() {
        return $this->currencyCode;
    }

    /**
    * Get the Export License Number
    *
    * @return string Used to populate Commercial Invoice. Optional.
    **/
    
    public function exportLicenseNumber() {
        return $this->exportLicenseNumber;
    }

    /**
    * Get the Export Certificate Number
    *
    * @return string Used to populate Commercial Invoice. Optional.
    **/
    
    public function exportCertificateNumber() {
        return $this->exportCertificateNumber;
    }

    /**
    * Get the Other Export Comments
    *
    * @return string Used to populate Commercial Invoice. Optional, accepts up to 1,000 characters.
    **/
    
    public function otherExportComments() {
        return $this->otherExportComments;
    }

    /**
    * Get the Export Purpose
    *
    * @return \Shipmate\Shipment\ExportPurpose Export Purpose for customs declaration
    **/
    
    public function exportPurpose() {
        return $this->exportPurpose;
    }    
}