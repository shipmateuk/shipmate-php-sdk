
<?php

// Recursively converts keys from snake_case to camelCase
function convertKeysToCamelCase($array)
{
    $result = [];
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $value = convertKeysToCamelCase($value);
        }
        $result[snakeToCamelCase($key)] = $value;
    }
    return $result;
}

// Converts keys from snake_case to camelCase
function snakeToCamelCase($snake_case_string) {
    return lcfirst(str_replace('_', '', ucwords($snake_case_string, '_')));
}