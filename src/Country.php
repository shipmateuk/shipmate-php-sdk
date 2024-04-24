<?php

namespace Shipmate;

class Country {
    
    protected $code;
    protected $name;

    // setters

    /**
    * Set the Code
    *
    * @param string $code The two character ISO 3166-1 country code, e.g., GB
    *
    * @return void 
    **/

    public function setCode($code) {
        $this->code = $code;
    }

    /**
    * Set the Name
    *
    * @param string $name The full name of the country, e.g., United Kingdom
    *
    * @return void 
    **/
    
    public function setName($name) {
        $this->name = $name;
    }
    
    // getters

    /**
    * Get the Code
    *
    * @return string The two character ISO 3166-1 country code, e.g., GB
    **/

    public function code() {
        return $this->code;
    }

    /**
    * Get the Name
    *
    * @return string The full name of the country, e.g., United Kingdom
    **/
    
    public function name() {
        return $this->name;
    }
}

