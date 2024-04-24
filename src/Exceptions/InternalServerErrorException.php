<?php

namespace Shipmate\Exceptions;
use Exception;
use Throwable;

/**
* @throws InternalServerErrorException when response HTTP is 500
**/

class InternalServerErrorException extends Exception {}