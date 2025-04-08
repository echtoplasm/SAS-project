<?php
// Initialize environment variables from .env file
function loadEnvFile($path) {
    if (!file_exists($path)) {
        return false;
    }
    
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Skip comments
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        
        // Parse the line if it contains an equals sign
        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);
            
            // Remove quotes if present
            if (strpos($value, '"') === 0 && strrpos($value, '"') === strlen($value) - 1) {
                $value = substr($value, 1, -1);
            } else if (strpos($value, "'") === 0 && strrpos($value, "'") === strlen($value) - 1) {
                $value = substr($value, 1, -1);
            }
            
            // Set environment variable
            putenv("{$name}={$value}");
            $_ENV[$name] = $value;
        }
    }
    return true;
}

// Validate required environment variables
function checkRequiredEnvVars($requiredVars) {
    $missing = [];
    foreach ($requiredVars as $var) {
        if (empty($_ENV[$var]) && empty(getenv($var))) {
            $missing[] = $var;
        }
    }
    
    if (!empty($missing)) {
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
if (!loadEnvFile($envPath)) {
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
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

// Include required files
require_once('functions.php');
require_once('database.php');
require_once('query_functions.php');
require_once('validation_functions.php');

// Connect to the database
$db = db_connect();
$errors = [];
