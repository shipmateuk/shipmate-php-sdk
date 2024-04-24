<?php

namespace Shipmate\Responses\TrackingEvents;

class ParcelTrackingEvents {

    protected $shipmentReference;
    protected $courierTrackingReference;
    protected $trackingEvents = [];

    // setters

    /**
	* Set the Shipment Reference
	*
	* @param string $shipmentReference The Shipment reference
	*
	* @return void
	**/

    public function setShipmentReference($shipmentReference) {
        $this->shipmentReference = $shipmentReference;
    }

    /**
	* Set the Courier Tracking Reference
	*
	* @param string $courierTrackingReference The courier tracking reference
	*
	* @return void
	**/

    public function setCourierTrackingReference($courierTrackingReference) {
        $this->courierTrackingReference = $courierTrackingReference;
    }

    /**
	* Add a Tracking Event
	*
	* @param \Shipmate\Responses\TrackingEvents\TrackingEvent $trackingEvent Shipmate retrieves tracking events from each Carrier and converts them into a standard Shipmate format
	*
	* @return void
	*
	* @link https://www.shipmate.co.uk/guides/api#tracking-object
	**/

    public function addTrackingEvent($trackingEvent) {
        $this->trackingEvents[] = $trackingEvent;
    }

    // getters

    /**
	* Get the Shipment Reference
	*
	* @return string The Shipment reference
	**/

    public function shipmentReference() {
        return $this->shipmentReference;
    }

    /**
	* Get the Courier Tracking Reference
	*
	* @return string The courier tracking reference
	**/
    
    public function courierTrackingReference() {
        return $this->courierTrackingReference;
    }

    /**
	* Get the Tracking Events
	*
	* @return array Shipmate retrieves tracking events from each Carrier and converts them into a standard Shipmate format
	**/

    public function trackingEvents() {
        return $this->trackingEvents;
    }
    
}
