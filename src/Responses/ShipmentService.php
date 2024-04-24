<?php

namespace Shipmate;

class ShipmentService {

    protected $carrier;
    protected $carrierAccount;
    protected $serviceName;
    protected $fullServiceName;
    protected $serviceKey;
    protected $basePrice;
    protected $additionalParcelPrice;
    protected $surcharges;
    protected $fuelSurcharge;
    protected $totalPrice;
    protected $estimatedDeliveryDate;

    // setters

    /**
	* Set the Carrier
	*
	* @param string $carrier The Carrier of the Service
	*
	* @return void
	**/

    public function setCarrier($carrier) {
        $this->carrier = $carrier;
    }

    /**
	* Set the Carrier Account
	*
	* @param string $carrierAccount The Carrier account
	*
	* @return void
	**/
    
    public function setCarrierAccount($carrierAccount) {
        $this->carrierAccount = $carrierAccount;
    }

    /**
	* Set the Service Name
	*
	* @param string $serviceName The Service name
	*
	* @return void
	**/
    
    public function setServiceName($serviceName) {
        $this->serviceName = $serviceName;
    }

    /**
	* Set the Full Service Name
	*
	* @param string $fullServiceName The full Service name
	*
	* @return void
	**/
    
    public function setFullServiceName($fullServiceName) {
        $this->fullServiceName = $fullServiceName;
    }

    /**
	* Set the Service Key
	*
	* @param string $serviceKey The Service key
	*
	* @return void
	**/
    
    public function setServiceKey($serviceKey) {
        $this->serviceKey = $serviceKey;
    }

    /**
	* Set the Base Price
	*
	* @param string $basePrice The base price
	*
	* @return void
	**/
    
    public function setBasePrice($basePrice) {
        $this->basePrice = $basePrice;
    }

    /**
	* Set the Additional Parcel Price
	*
	* @param string $additionalParcelPrice The additional parcel price
	*
	* @return void
	**/
    
    public function setAdditionalParcelPrice($additionalParcelPrice) {
        $this->additionalParcelPrice = $additionalParcelPrice;
    }

    /**
	* Set the Surcharges
	*
	* @param string $surcharges The surcharges
	*
	* @return void
	**/
    
    public function setSurcharges($surcharges) {
        $this->surcharges = $surcharges;
    }

    /**
	* Set the Fuel Surcharge
	*
	* @param string $fuelSurcharge The fuel surcharge
	*
	* @return void
	**/
    
    public function setFuelSurcharge($fuelSurcharge) {
        $this->fuelSurcharge = $fuelSurcharge;
    }

    /**
	* Set the Total Price
	*
	* @param string $totalPrice The total price
	*
	* @return void
	**/
    
    public function setTotalPrice($totalPrice) {
        $this->totalPrice = $totalPrice;
    }

    /**
	* Set the Estimated Delivery Date
	*
	* @param string $estimatedDeliveryDate The estimated delivery date
	*
	* @return void
	**/
    
    public function setEstimatedDeliveryDate($estimatedDeliveryDate) {
        $this->estimatedDeliveryDate = $estimatedDeliveryDate;
    }

    // getters

    /**
    * Get the Carrier
    *
    * @return string The Carrier of the Service
    **/

    public function carrier() {
        return $this->carrier;
    }

    /**
    * Get the Carrier Account
    *
    * @return string The Carrier account
    **/
    
    public function carrierAccount() {
        return $this->carrierAccount;
    }

    /**
    * Get the Service Name
    *
    * @return string The Service name
    **/
    
    public function serviceName() {
        return $this->serviceName;
    }

    /**
    * Get the Full Service Name
    *
    * @return string The full Service name
    **/
    
    public function fullServiceName() {
        return $this->fullServiceName;
    }

    /**
    * Get the Service Key
    *
    * @return string The Service key
    **/
    
    public function serviceKey() {
        return $this->serviceKey;
    }

    /**
    * Get the Base Price
    *
    * @return string The base price
    **/
    
    public function basePrice() {
        return $this->basePrice;
    }

    /**
    * Get the Additional Parcel Price
    *
    * @return string The additional parcel price
    **/
    
    public function additionalParcelPrice() {
        return $this->additionalParcelPrice;
    }

    /**
    * Get the Surcharges
    *
    * @return string The surcharges
    **/
    
    public function surcharges() {
        return $this->surcharges;
    }

    /**
    * Get the Fuel Surcharge
    *
    * @return string The fuel surcharge
    **/
    
    public function fuelSurcharge() {
        return $this->fuelSurcharge;
    }

    /**
    * Get the Total Price
    *
    * @return string The total price
    **/
    
    public function totalPrice() {
        return $this->totalPrice;
    }

    /**
    * Get the Estimated Delivery Date
    *
    * @return string The estimated delivery date
    **/
    
    public function estimatedDeliveryDate() {
        return $this->estimatedDeliveryDate;
    }
}