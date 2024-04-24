<?php

namespace Shipmate\Exceptions;
use Exception;
use Throwable;

/**
* @throws UnauthorizedException when response HTTP is 401
**/

class UnauthorizedException extends Exception {}