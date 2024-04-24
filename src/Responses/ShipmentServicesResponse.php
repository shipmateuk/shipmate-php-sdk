<?php

namespace Shipmate\Responses;

class ShipmentServicesResponse {

    protected $recommendedService;
    protected $services = [];

    // setters

    /**
	* Set the Recommended Service
	*
	* @param \Shipmate\responses\ShipmentService $recommendedService The recommended Service for the provided Shipment
	*
	* @return void
	**/

    public function setRecommendedService($recommendedService) {
        $this->recommendedService = $recommendedService;
    }

    /**
	* Add a Service to the services array 
	*
	* @param \Shipmate\responses\ShipmentService $service A Shipment Service 
	*
	* @return void
	**/

    public function addService($service) {
        $this->services[] = $service;
    }

    // getters

    /**
	* Get the Recommended Service
	*
	* @return \Shipmate\responses\ShipmentService The recommended Service for the provided Shipment
	**/

    public function recommendedService() {
        return $this->recommendedService;
    }

    /**
	* Get the Services
	*
	* @return array The available Services for the provided Shipment 
	**/

    public function services() {
        return $this->services;
    }

}