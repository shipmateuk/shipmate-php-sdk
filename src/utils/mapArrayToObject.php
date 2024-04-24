<?php

// input associative array of data,

// output object thats been mapped to

function mapArrayToObject($array, $classInstance) {

    $obj = $classInstance;
	
    foreach ($array as $key => $value) {
		
    	if (method_exists($obj, 'set' . ucfirst($key))) {

			$obj->{'set' . ucfirst($key)}($value);
    	}
	}
	return $obj;
}

