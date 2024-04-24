<?php

namespace Shipmate\Exceptions;
use Exception;
use Throwable;

/**
* @throws BadRequestException when response HTTP is 400
**/

class BadRequestException extends Exception {

    private $errorMessage;
    private $errors;

    public function __construct($message, $code = 0, Throwable $previous = null) {
        $obj = json_decode($message);

        $this->errorMessage = $obj->message;

        $this->errors = $obj->data;

        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }

    /**
	* Get the Error Message
	*
	* @return string Error message summary 
	**/

    public function errorMessage() {
        return $this->errorMessage; 
    }

     /**
	* Get the Error Message details
	*
	* @return object Error message details
	**/

    public function errors() {
        return $this->errors;
    }
}