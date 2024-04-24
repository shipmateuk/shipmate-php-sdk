<?php

namespace Shipmate\Responses;

/**
* Label
*
* The label object represents a single Parcel in a Shipment. When a label is requested it is returned in a format that provides key information about the parcel as well as label data in either ZPL, PDF or PNG format.
*/

class Label {

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
    * @param string $parcelReference Your unique reference for the Parcel
    *
    * @return void 
    **/
    
    public function setParcelReference($parcelReference) {
        $this->parcelReference = $parcelReference;
    }

    /**
    * Set the Carrier
    *
    * @param string $carrier The Carrier that is being used to send the Parcel
    *
    * @return void 
    **/
    
    public function setCarrier($carrier) {
        $this->carrier = $carrier;
    }

    /**
    * Set the Service Name
    *
    * @param string $serviceName The name of the Carrier Service the Parcel is being sent with
    *
    * @return void 
    **/
    
    public function setServiceName($serviceName) {
        $this->serviceName = $serviceName;
    }

    /**
    * Set the Tracking Reference
    *
    * @param string $trackingReference The tracking reference of the Parcel
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
    * @param string $createdBy The name of the User that generated the label
    *
    * @return void 
    **/
    
    public function setCreatedBy($createdBy) {
        $this->createdBy = $createdBy;
    }

    /**
    * Set the Created With
    *
    * @param string $createdWith The application used to generate the label
    *
    * @return void 
    **/
    
    public function setCreatedWith($createdWith) {
        $this->createdWith = $createdWith;
    }

    /**
    * Set the Created At
    *
    * @param string $createdAt The date that the label was created
    *
    * @return void 
    **/
    
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    /**
    * Set the Price
    *
    * @param string $price The price of the label
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
    * @param \Shipmate\Address $toAddress The Address that you want to send the Shipment to
    *
    * @return void 
    **/
    
    public function setToAddress($toAddress) {
        $this->toAddress = $toAddress;
    }

    /**
    * Set the PDF
    *
    * @param string $pdf Base 64 encoded label PDF
    *
    * @return void 
    **/
    
    public function setPDF($pdf) {
        $this->pdf = $pdf;
    }

    /**
    * Set the ZPL
    *
    * @param string $zpl ZPL label
    *
    * @return void 
    **/
    
    public function setZPL($zpl) {
        $this->zpl = $zpl;
    }

    /**
    * Set the PNG
    *
    * @param string $png Base 64 encoded label PNG
    *
    * @return void 
    **/
    
    public function setPNG($png) {
        $this->png = $png;
    }
    
    // getters

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
    * @return string Your unique reference for the Parcel
    **/
    
    public function parcelReference() {
        return $this->parcelReference;
    }

    /**
    * Get the Carrier
    *
    * @return string The Carrier that is being used to send the Parcel
    **/
    
    public function carrier() {
        return $this->carrier;
    }

    /**
    * Get the Service Name
    *
    * @return string The name of the Carrier Service the Parcel is being sent with
    **/
    
    public function serviceName() {
        return $this->serviceName;
    }

    /**
    * Get the Tracking Reference
    *
    * @return string The tracking reference of the Parcel
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
    * @return string The name of the User that generated the label
    **/
    
    public function createdBy() {
        return $this->createdBy;
    }

    /**
    * Get the Created With
    *
    * @return string The application used to generate the label
    **/
    
    public function createdWith() {
        return $this->createdWith;
    }

    /**
    * Get the Created At
    *
    * @return string The date that the label was created
    **/
    
    public function createdAt() {
        return $this->createdAt;
    }

    /**
	* Get the Price
	*
	* @return string The price of the label
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
    * @return \Shipmate\Address The Address that you want to send the Shipment to
    **/
    
    public function toAddress() {
        return $this->toAddress;
    }

    /**
    * Get the PDF
    *
    * @return string Base 64 encoded label PDF
    **/
    
    public function pdf() {
        return $this->pdf;
    }

    /**
    * Get the ZPL
    *
    * @return string ZPL label
    **/
    
    public function zpl() {
        return $this->zpl;
    }

    /**
    * Get the PNG
    *
    * @return string Base 64 encoded label PNG
    **/
    
    public function png() {
        return $this->png;
    }
}