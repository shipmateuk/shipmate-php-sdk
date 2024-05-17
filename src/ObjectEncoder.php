<?php
/**
 * This extends of all request object to convert the object to snake_case when json_encode is called
 */

namespace Shipmate;

class ObjectEncoder implements \JsonSerializable {

    /**
     * This method is called when json_encode is called on an object
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize() {
        // Get all properties of the object and turn them from camelCase to snake_case
        $properties = get_object_vars($this);
        $snakeCaseProperties = [];
        foreach ($properties as $key => $value) {
            

            if (isset($key) && $value !== null) {
                $snakeCaseProperties[$this->camelToSnake($key)] = $value;
            }
        }

        return $snakeCaseProperties;
    }

    /**
     * Convert camelCase to snake_case
     * @param $key string The key to convert
     * @return string The converted key
     */
    private function camelToSnake($key) {
        //Convert camelCase to snake_case including numbers
        return strtolower(preg_replace('/(?<!^)[A-Z0-9]/', '_$0', $key));
    }
}