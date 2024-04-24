<?php

namespace Shipmate\Responses\TrackingEvents;

/**
* Tracking Event
*
* Shipmate retrieves tracking events from each Carrier and converts them into a standard Shipmate format
*/

class TrackingEvent {
    
    protected $code;
    protected $name;
    protected $description;
    protected $date;
    protected $type;

    // setters

    /**
    * Set the Code
    *
    * @param string $code The carrier code for the Event
    *
    * @return void 
    **/

    public function setCode($code) {
        $this->code = $code;
    }

    /**
    * Set the Name
    *
    * @param string $name The readable name of the Event
    *
    * @return void 
    **/

    
    public function setName($name) {
        $this->name = $name;
    }

    /**
    * Set the Description
    *
    * @param string $description The readable description of the Event
    *
    * @return void 
    **/
    
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
    * Set the Date
    *
    * @param string $date The date of the Event
    *
    * @return void 
    **/
    
    public function setDate($date) {
        $this->date = $date;
    }

    /**
    * Set the Type
    *
    * @param string $type The Shipmate Tracking Event Type
    *
    * @return void 
    **/
    
    public function setType($type) {
        $this->type = $type;
    }
    
    // getters

    /**
    * Get the Code
    *
    * @return string The Carrier code for the Event
    **/

    public function code() {
        return $this->code;
    }

    /**
    * Get the Name
    *
    * @return string The readable name of the Event
    **/
    
    public function name() {
        return $this->name;
    }

    /**
    * Get the Description
    *
    * @return string The readable description of the Event
    **/
    
    public function description() {
        return $this->description;
    }

    /**
    * Get the Date
    *
    * @return string The date of the Event
    **/
    
    public function date() {
        return $this->date;
    }

    /**
    * Get the Type
    *
    * @return string The Shipmate Tracking Event Type
    **/
    
    public function type() {
        return $this->type;
    }
}