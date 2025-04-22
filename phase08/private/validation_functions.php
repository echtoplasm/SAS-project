<?php
/**
 * Validation Functions
 * 
 * Common validation functions for form data
 */

/**
 * Check if a value is blank
 * 
 * @param mixed $value The value to check
 * @return bool True if the value is blank, false otherwise
 */
function isBlank($value)
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    return !isset($value) || trim($value) === '';
}

/**
 * Check if a value has presence (is not blank)
 * 
 * @param mixed $value The value to check
 * @return bool True if the value has presence, false otherwise
 */
function hasPresence($value)
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    return !isBlank($value); // CHANGED: Function call to camelCase
}

/**
 * Check if a value has a length greater than the minimum
 * 
 * @param string $value The value to check
 * @param int $min The minimum length
 * @return bool True if the value's length is greater than the minimum
 */
function hasLengthGreaterThan($value, $min)
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    $length = strlen($value);
    return $length > $min;
}

/**
 * Check if a value has a length less than the maximum
 * 
 * @param string $value The value to check
 * @param int $max The maximum length
 * @return bool True if the value's length is less than the maximum
 */
function hasLengthLessThan($value, $max)
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    $length = strlen($value);
    return $length < $max;
}

/**
 * Check if a value has an exact length
 * 
 * @param string $value The value to check
 * @param int $exact The exact length
 * @return bool True if the value's length matches the exact length
 */
function hasLengthExactly($value, $exact)
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    $length = strlen($value);
    return $length == $exact;
}

/**
 * Check if a value has an appropriate length based on options
 * 
 * @param string $value The value to check
 * @param array $options Options for length validation (min, max, exact)
 * @return bool True if the value matches the length options
 */
function hasLength($value, $options)
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    if (isset($options['min']) && !hasLengthGreaterThan($value, $options['min'] - 1)) { // CHANGED: Function call to camelCase and added space after if and !
        return false;
    } elseif (isset($options['max']) && !hasLengthLessThan($value, $options['max'] + 1)) { // CHANGED: Function call to camelCase and added space after !
        return false;
    } elseif (isset($options['exact']) && !hasLengthExactly($value, $options['exact'])) { // CHANGED: Function call to camelCase and added space after !
        return false;
    } else {
        return true;
    }
}

/**
 * Check if a value is included in a set
 * 
 * @param mixed $value The value to check
 * @param array $set The set of values to check against
 * @return bool True if the value is in the set
 */
function hasInclusionOf($value, $set)
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    return in_array($value, $set);
}

/**
 * Check if a value is excluded from a set
 * 
 * @param mixed $value The value to check
 * @param array $set The set of values to check against
 * @return bool True if the value is not in the set
 */
function hasExclusionOf($value, $set)
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    return !in_array($value, $set);
}

/**
 * Check if a value contains a required string
 * 
 * @param string $value The value to check
 * @param string $requiredString The string that should be contained
 * @return bool True if the value contains the required string
 */
function hasString($value, $requiredString)
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    return strpos($value, $requiredString) !== false;
}
