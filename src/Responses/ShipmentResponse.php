<?php

namespace Shipmate\Responses;

class ShipmentResponse {

    protected $id;
    protected $shipmentReference;
    protected $parcelReference;
    protected $carrier;
    protected $serviceName;
    protected $trackingReference;
    protected $universalTrackingReference;
    protected $createdBy;
    protected $createdWith;
    protected $createdAt;
    protected $price;
    protected $estimatedDeliveryDate;
    protected $toAddress;
    protected $pdf;
    protected $zpl;
    protected $png;

    // setters

    /**
    * Set the ID
    *
    * @param string $id The ID of the Shipment
    *
    * @return void 
    **/

    public function setId($id) {
        $this->id = $id;
    }

    /**
	* Set the Shipment Reference
	*
	* @param string $shipmentReference Your unique reference for the Shipment
	*
	* @return void
	**/

    public function setShipmentReference($shipmentReference) {
        $this->shipmentReference = $shipmentReference;
    }

    /**
	* Set the Parcel Reference
	*
	* @param string $parcelReference The reference to the Parcel
	*
	* @return void
	**/

    public function setParcelReference($parcelReference) {
        $this->parcelReference = $parcelReference;
    }

    /**
    * Set the Carrier
    *
    * @param string $carrier The Carrier for the Shipment 
    *
    * @return void
    **/

    public function setCarrier($carrier) {
        $this->carrier = $carrier;
    }


    /**
	* Set the Service Name
	*
	* @param string $serviceName The Carrier Service used 
	*
	* @return void
	**/

    public function setServiceName($serviceName) {
        $this->serviceName = $serviceName;
    }


    /**
    * Set the Tracking Reference
    *
    * @param string $trackingReference The tracking reference
    *
    * @return void
    **/

    public function setTrackingReference($trackingReference) {
        $this->trackingReference = $trackingReference;
    }

    /**
	* Set the Universal Tracking Reference
	*
	* @param string $universalTrackingReference The universal tracking reference
	*
	* @return void
	**/

    public function setUniversalTrackingReference($universalTrackingReference) {
        $this->universalTrackingReference = $universalTrackingReference;
    }

    /**
	* Set the Created By
	*
	* @param string $createdBy The account name that created the Shipment  
	*
	* @return void
	**/

    public function setCreatedBy($createdBy) {
        $this->createdBy = $createdBy;
    }

    /**
	* Set the Created With
	*
	* @param string $createdWith The source of the Shipment
	*
	* @return void
	**/

    public function setCreatedWith($createdWith) {
        $this->createdWith = $createdWith;
    }

    /**
	* Set the Created At
	*
	* @param string $createdAt The time the Shipment was created
	*
	* @return void
	**/

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    /**
	* Set the Price
	*
	* @param string $price The price of the Shipment 
	*
	* @return void
	**/

    public function setPrice($price) {
        $this->price = $price;
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

    /**
	* Set the To Address
	*
	* @param \Shipmate\Address $toAddress The Address the Shipment will be sent to 
	*
	* @return void
	**/

    public function setToAddress($toAddress) {
        $this->toAddress = $toAddress;
    }

    /**
	* Set the PDF
	*
	* @param string $pdf The Parcel label in PDF format  
	*
	* @return void
	**/

    public function setPDF($pdf) {
        $this->pdf = $pdf;
    }

    /**
	* Set the ZPL
	*
	* @param string $zpl The Parcel label in ZPL format  
	*
	* @return void
	**/

    public function setZPL($zpl) {
        $this->zpl = $zpl;
    }

    /**
	* Set the PNG
	*
	* @param string $png The Parcel label in PNG format
	*
	* @return void
	**/ 

    public function setPNG($png) {
        $this->png = $png;
    }

    // getters 

    /**
    * Get the ID
    *
    * @return string The ID of the Shipment
    **/

    public function id() {
        return $this->id;
    }

    /**
	* Get the Shipment Reference
	*
	* @return string Your unique reference for the Shipment
	**/

    public function shipmentReference() {
        return $this->shipmentReference;
    }

    /**
	* Get the Parcel Reference
	*
	* @return string The reference to the Parcel
	**/
    
    public function parcelReference() {
        return $this->parcelReference;
    }

    /**
	* Get the Carrier
	*
	* @return string The Carrier for the Shipment
	**/
    
    public function carrier() {
        return $this->carrier;
    }

    /**
	* Get the Service Name
	*
	* @return string The Carrier Service used 
	**/
    
    public function serviceName() {
        return $this->serviceName;
    }

    /**
	* Get the Tracking Reference
	*
	* @return string The tracking reference 
	**/
    
    public function trackingReference() {
        return $this->trackingReference;
    }

    /**
	* Get the Universal Tracking Reference
	*
	* @return string The universal tracking reference 
	**/
    
    public function universalTrackingReference() {
        return $this->universalTrackingReference;
    }

    /**
	* Get the Created By
	*
	* @return string The account name that created the Shipment  
	**/
    
    public function createdBy() {
        return $this->createdBy;
    }

    /**
	* Get the Created With
	*
	* @return string The source of the Shipment
	**/
    
    public function createdWith() {
        return $this->createdWith;
    }

    /**
	* Get the Created At
	*
	* @return string The time the Shipment was created
	**/
    
    public function createdAt() {
        return $this->createdAt;
    }

    /**
	* Get the Price
	*
	* @return string The price of the Shipment 
	**/
    
    public function price() {
        return $this->price;
    }

    /**
	* Get the Estimated Delivery Date
	*
	* @return string The estimated delivery date 
	**/
    
    public function estimatedDeliveryDate() {
        return $this->estimatedDeliveryDate;
    }

    /**
	* Get the To Address
	*
	* @return \Shipmate\Address The Address the Shipment will be sent to 
	**/
    
    public function toAddress() {
        return $this->toAddress;
    }

    /**
	* Get the PDF
	*
	* @return string The Parcel label in PDF format  
	**/
    
    public function pdf() {
        return $this->pdf;
    }

    /**
	* Get the ZPL
	*
	* @return string The Parcel label in ZPL format  
	**/
    
    public function zpl() {
        return $this->zpl;
    }

    /**
	* Get the PNG
	*
	* @return string The Parcel label in PNG format
	**/
    
    public function png() {
        return $this->png;
    }    
}