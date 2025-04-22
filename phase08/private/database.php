<?php
/**
 * Database Functions
 * 
 * Functions for database connection and query operations
 */

/**
 * Connect to the database
 * 
 * @return mysqli The database connection
 */
function dbConnect()
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirmDbConnect(); // CHANGED: Function call to camelCase
    return $connection;
}

/**
 * Disconnect from the database
 * 
 * @param mysqli $connection The database connection
 * @return void
 */
function dbDisconnect($connection)
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    if (isset($connection)) { // CHANGED: Added space after if
        mysqli_close($connection);
    }
}

/**
 * Confirm database connection
 * 
 * @return void
 */
function confirmDbConnect()
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    if (mysqli_connect_errno()) { // CHANGED: Added space after if
        $msg = "Database connection failed: ";
        $msg .= mysqli_connect_error();
        $msg .= "(" . mysqli_connect_errno() . ")";
        exit($msg);
    }
}

/**
 * Confirm query result set
 * 
 * @param mysqli_result|bool $resultSet The result set to confirm
 * @return void
 */
function confirmResultSet($resultSet)
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    if (!$resultSet) { // CHANGED: Added space after if and !
        exit("Database query failed.");
    }
}
