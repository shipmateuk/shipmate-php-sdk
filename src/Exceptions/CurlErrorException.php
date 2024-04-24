<?php

namespace Shipmate\Exceptions;
use Exception;
use Throwable;

/**
* @throws CurlErrorException when internal curl error occurs
**/

class CurlErrorException extends Exception {

    private $errorMessage;

    public function __construct($message, $code = 0, Throwable $previous = null) {

        $this->errorMessage = $message;

        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }

    /**
	* Get the Error Message
	*
	* @return string Error message
	**/

    public function errorMessage() {
        return $this->errorMessage;
    }
}