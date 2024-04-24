<?php

namespace Shipmate\Exceptions;
use Exception;
use Throwable;

/**
* @throws ForbiddenException when response HTTP is 403
**/

class ForbiddenException extends Exception {}
