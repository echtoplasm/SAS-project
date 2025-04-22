<?php
/**
 * Initialization File
 * 
 * Sets up environment, loads required files, and establishes database connection
 */

/**
 * Load environment variables from .env file
 * 
 * @param string $path Path to the .env file
 * @return bool True if file was loaded successfully
 */
function loadEnvFile($path)
{
    // CHANGED: No change needed - already in camelCase
    if (!file_exists($path)) { // CHANGED: Added space after if and !
        return false;
    }
    
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) { // CHANGED: Added space after foreach
        // Skip comments
        if (strpos(trim($line), '#') === 0) { // CHANGED: Added space after if
            continue;
        }
        
        // Parse the line if it contains an equals sign
        if (strpos($line, '=') !== false) { // CHANGED: Added space after if
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);
            
            // Remove quotes if present
            if (strpos($value, '"') === 0 && strrpos($value, '"') === strlen($value) - 1) { // CHANGED: Added space after if
                $value = substr($value, 1, -1);
            } else if (strpos($value, "'") === 0 && strrpos($value, "'") === strlen($value) - 1) { // CHANGED: Fixed 'else if' spacing
                $value = substr($value, 1, -1);
            }
            
            // Set environment variable
            putenv("{$name}={$value}");
            $_ENV[$name] = $value;
        }
    }
    return true;
}

/**
 * Validate required environment variables
 * 
 * @param array $requiredVars Array of required environment variable names
 * @return void
 */
function checkRequiredEnvVars($requiredVars)
{
    // CHANGED: No change needed - already in camelCase
    $missing = [];
    foreach ($requiredVars as $var) { // CHANGED: Added space after foreach
        if (empty($_ENV[$var]) && empty(getenv($var))) { // CHANGED: Added space after if
            $missing[] = $var;
        }
    }
    
    if (!empty($missing)) { // CHANGED: Added space after if and !
        die("Missing required environment variables: " . implode(', ', $missing));
    }
}

// Define file paths
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

// Load environment variables from .env file
$envPath = dirname(PROJECT_PATH) . '/.env';
if (!loadEnvFile($envPath)) { // CHANGED: Added space after if and !
    die("Environment file not found at: {$envPath}");
}

// Check for required environment variables
checkRequiredEnvVars(['DB_SERVER', 'DB_USER', 'DB_PASS', 'DB_NAME']);

// Define database constants using environment variables
define("DB_SERVER", $_ENV['DB_SERVER']);
define("DB_USER", $_ENV['DB_USER']);
define("DB_PASS", $_ENV['DB_PASS']);
define("DB_NAME", $_ENV['DB_NAME']);

// Assign the root URL to a PHP constant
$publicEnd = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7; // CHANGED: Variable name to camelCase
$docRoot = substr($_SERVER['SCRIPT_NAME'], 0, $publicEnd); // CHANGED: Variable name to camelCase
define("WWW_ROOT", $docRoot);

// Include required files
require_once('functions.php');
require_once('database.php');
require_once('query_functions.php');
require_once('validation_functions.php');

// Connect to the database
$db = dbConnect(); // CHANGED: Function call to camelCase
$errors = [];
