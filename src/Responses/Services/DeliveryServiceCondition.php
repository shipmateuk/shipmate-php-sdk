<?php

namespace Shipmate\Responses\Services;

/**
* Delivery Service Condition
*
* An array of conditions that must be met in order to use the Service
*/

class DeliveryServiceCondition {

    protected $field;
    protected $operator;
    protected $value;

    // setters

    /**
	* Set the Field
	*
	* @param string $field The field for the condition
	*
	* @return void
	**/

    public function setField($field) {
        $this->field = $field;
    }

    /**
	* Set the Operator
	*
	* @param string $operator The operator for the condition
	*
	* @return void
	**/
    
    public function setOperator($operator) {
        $this->operator = $operator;
    }

    /**
	* Set the Value
	*
	* @param string $value The value for the condition 
	*
	* @return void
	**/
    
    public function setValue($value) {
        $this->value = $value;
    }

    // getters 

    /**
	* Get the Field
	*
	* @return string The field for the condition
	**/

    public function field() {
        return $this->field;
    }

    /**
	* Get the Operator
	*
	* @return string The operator for the condition
	**/
    
    public function operator() {
        return $this->operator;
    }

    /**
	* Get the Value
	*
	* @return string The value for the condition
	**/
    
    public function value() {
        return $this->value;
    }
}