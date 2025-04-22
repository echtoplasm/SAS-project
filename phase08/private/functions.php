<?php
/**
 * Utility Functions
 * 
 * Common utility functions for the application
 */

/**
 * Generate a URL for a script path
 * 
 * @param string $scriptPath The script path
 * @return string The complete URL
 */
function urlFor($scriptPath)
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    // add the leading '/' if not present
    if ($scriptPath[0] != '/') { // CHANGED: Added space after if
        $scriptPath = "/" . $scriptPath;
    }
    return WWW_ROOT . $scriptPath;
}

/**
 * URL encode a string
 * 
 * @param string $string The string to encode
 * @return string The URL encoded string
 */
function u($string = "")
{
    // CHANGED: Added space in function declaration
    return urlencode($string);
}

/**
 * Raw URL encode a string
 * 
 * @param string $string The string to encode
 * @return string The raw URL encoded string
 */
function rawU($string = "")
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12 and added space in function declaration
    return rawurlencode($string);
}

/**
 * Convert special characters to HTML entities
 * 
 * @param string $string The string to convert
 * @return string The converted string
 */
function h($string = "")
{
    // CHANGED: Added space in function declaration
    return htmlspecialchars($string);
}

/**
 * Send a 404 Not Found response
 * 
 * @return void
 */
function error404()
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    exit();
}

/**
 * Send a 500 Internal Server Error response
 * 
 * @return void
 */
function error500()
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
    exit();
}

/**
 * Redirect to a location
 * 
 * @param string $location The location to redirect to
 * @return void
 */
function redirectTo($location)
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    header("Location: " . $location);
    exit;
}

/**
 * Check if the request method is POST
 * 
 * @return bool True if the request method is POST
 */
function isPostRequest()
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

/**
 * Check if the request method is GET
 * 
 * @return bool True if the request method is GET
 */
function isGetRequest()
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

/**
 * Display validation errors
 * 
 * @param array $errors The errors to display
 * @return string HTML for displaying errors
 */
function displayErrors($errors = array())
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12 and added space in function declaration
    $output = '';
    if (!empty($errors)) { // CHANGED: Added space after if and !
        $output .= "<div class=\"errors\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach ($errors as $error) { // CHANGED: Added space after foreach
            $output .= "<li>" . h($error) . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}
