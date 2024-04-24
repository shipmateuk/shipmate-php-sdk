<?php

namespace Shipmate\Exceptions;
use Exception;
use Throwable;

/**
* @throws NotFoundException when response HTTP is 404
**/

class NotFoundException extends Exception {}