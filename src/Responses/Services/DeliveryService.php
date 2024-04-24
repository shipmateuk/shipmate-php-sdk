<?php

namespace Shipmate\Responses\Services;

/**
* Delivery Service
*
* Services represent Delivery Services that you have set up in your Shipmate Account. A Service is used when creating a Shipment to specify how it should be sent.
*/

class DeliveryService {

    protected $id;
    protected $carrier;
    protected $name;
    protected $description;
    protected $key;
    protected $price;
    protected $conditions = [];

    // setters

    /**
    * Set the ID
    *
    * @param string $id The ID of the delivery service.
    *
    * @return void
    **/

    public function setId($id) {
        $this->id = $id;
    }

    /**
    * Set the Carrier
    *
    * @param string $carrier The carrier of the delivery service.
    *
    * @return void
    **/
    
    public function setCarrier($carrier) {
        $this->carrier = $carrier;
    }

    /**
    * Set the Name
    *
    * @param string $name The name of the delivery service.
    *
    * @return void
    **/
    
    public function setName($name) {
        $this->name = $name;
    }

    /**
    * Set the Description
    *
    * @param string $description The description of the delivery service.
    *
    * @return void
    **/
    
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
    * Set the Key
    *
    * @param string $key The key of the delivery service.
    *
    * @return void
    **/
    
    public function setKey($key) {
        $this->key = $key;
    }

    /**
    * Set the Price
    *
    * @param string $price The price of the delivery service.
    *
    * @return void
    **/
    
    public function setPrice($price) {
        $this->price = $price;
    }

    /**
    * Set the Conditions
    *
    * @param array $conditions The conditions of the delivery service.
    *
    * @return void
    **/
    
    public function setConditions($conditions) {
        $this->conditions = $conditions;
    }

    /**
    * Add a Condition
    *
    * @param \Shipmate\Responses\Services\DeliveryServiceCondition $deliveryServiceCondition A condition of the delivery service.
    *
    * @return void
    **/

    public function addCondition($deliveryServiceCondition) {
        $this->conditions[] = $deliveryServiceCondition;
    }

    // getters

    /**
    * Get the ID of the Delivery Service
    *
    * @return string The ID of the delivery service
    **/

    public function id() {
        return $this->id;
    }

    /**
    * Get the Carrier of the Delivery Service
    *
    * @return string The carrier of the delivery service
    **/
    
    public function carrier() {
        return $this->carrier;
    }

    /**
    * Get the Name of the Delivery Service
    *
    * @return string The name of the delivery service
    **/
    
    public function name() {
        return $this->name;
    }

    /**
    * Get the Description of the Delivery Service
    *
    * @return string The description of the delivery service
    **/
    
    public function description() {
        return $this->description;
    }

    /**
    * Get the Key of the Delivery Service
    *
    * @return string The key of the delivery service
    **/
    
    public function key() {
        return $this->key;
    }

    /**
    * Get the Price of the Delivery Service
    *
    * @return string The price of the delivery service
    **/
    
    public function price() {
        return $this->price;
    }

    /**
    * Get the Conditions of the Delivery Service
    *
    * @return array The conditions of the delivery service
    **/
    
    public function conditions() {
        return $this->conditions;
    }
}