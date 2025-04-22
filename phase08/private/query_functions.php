<?php
/**
 * Query Functions for Salamander Database
 * 
 * This file contains functions for querying and manipulating salamander data
 */

/**
 * Find all salamanders in the database
 * 
 * @return mysqli_result The result set containing all salamander records
 */
function findAllSalamanders()
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    global $db;
    $sql = "SELECT * FROM salamander ";
    $sql .= "ORDER BY name ASC";
    $result = mysqli_query($db, $sql);
    confirmResultSet($result); // CHANGED: Function name to camelCase
    return $result;
}

/**
 * Find a salamander by its ID
 * 
 * @param int $id The ID of the salamander to find
 * @return array|null The salamander record as an associative array, or null if not found
 */
function findSalamanderById($id)
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    global $db;
    $sql = "SELECT * FROM salamander WHERE id=?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    confirmResultSet($result); // CHANGED: Function name to camelCase
    $salamander = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $salamander;
}

/**
 * Validate salamander data
 * 
 * @param array $salamander The salamander data to validate
 * @return array An array of validation errors
 */
function validateSalamander($salamander)
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    $errors = [];

    // Name validation
    if (isBlank($salamander['name'])) { // CHANGED: Function name to camelCase and added space after if
        $errors[] = "Name cannot be blank.";
    } elseif (!hasLength($salamander['name'], ['min' => 2, 'max' => 255])) { // CHANGED: Function name to camelCase and added space after !
        $errors[] = "Name must be between 2 and 255 characters.";
    }

    // Habitat validation
    // CHANGED: Updated comment to reflect the actual field being validated
    if (isBlank($salamander['habitat'])) { // CHANGED: Function name to camelCase and added space after if
        $errors[] = "Habitat cannot be blank.";
    } elseif (!hasLength($salamander['habitat'], ['min' => 2, 'max' => 255])) { // CHANGED: Function name to camelCase and added space after !
        $errors[] = "Habitat must be between 2 and 255 characters."; // CHANGED: Fixed error message to say "Habitat" instead of "Name"
    }

    // Description validation
    // CHANGED: Updated comment to reflect the actual field being validated
    if (isBlank($salamander['description'])) { // CHANGED: Function name to camelCase and added space after if
        $errors[] = "Description cannot be blank.";
    } elseif (!hasLength($salamander['description'], ['min' => 25, 'max' => 1000])) { // CHANGED: Function name to camelCase and added space after !
        $errors[] = "Description must be between 25 and 1000 characters."; // CHANGED: Fixed min value in error message to match validation rule
    }

    return $errors;
}

/**
 * Insert a new salamander record
 * 
 * @param string $salamanderName The name of the salamander
 * @param string $salamanderHabitat The habitat of the salamander
 * @param string $salamanderDescription The description of the salamander
 * @return bool|array True on success, array of errors on failure
 */
function insertSalamander($salamanderName, $salamanderHabitat, $salamanderDescription)
{
    // CHANGED: Function name and parameters to camelCase per PSR-1/PSR-12
    global $db;

    $salamander = [];
    $salamander['name'] = $salamanderName;
    $salamander['habitat'] = $salamanderHabitat;
    $salamander['description'] = $salamanderDescription;

    $errors = validateSalamander($salamander); // CHANGED: Function name to camelCase
    if (!empty($errors)) { // CHANGED: Added space after if and !
        return $errors;
    }

    $sql = "INSERT INTO salamander (name, habitat, description) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $salamanderName, $salamanderHabitat, $salamanderDescription);
    $result = mysqli_stmt_execute($stmt);

    if ($result) { // CHANGED: Added space after if
        return true;
    } else {
        echo mysqli_error($db);
        dbDisconnect($db); // CHANGED: Function name to camelCase
        exit;
    }
}

/**
 * Update an existing salamander record
 * 
 * @param array $salamander The salamander data to update
 * @return bool|array True on success, array of errors on failure
 */
function updateSalamander($salamander)
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    global $db;

    $errors = validateSalamander($salamander); // CHANGED: Function name to camelCase
    if (!empty($errors)) { // CHANGED: Added space after if and !
        return $errors;
    }

    $sql = "UPDATE salamander SET name=?, habitat=?, description=? WHERE id=? LIMIT 1";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $salamander['name'], $salamander['habitat'], $salamander['description'], $salamander['id']);
    $result = mysqli_stmt_execute($stmt);

    if ($result) { // CHANGED: Added space after if
        return true;
    } else {
        echo mysqli_error($db);
        dbDisconnect($db); // CHANGED: Function name to camelCase
        exit();
    }
}

/**
 * Delete a salamander record
 * 
 * @param int $id The ID of the salamander to delete
 * @return bool True on success
 */
function deleteSalamander($id)
{
    // CHANGED: Function name to camelCase per PSR-1/PSR-12
    global $db;
    $sql = "DELETE FROM salamander WHERE id=? LIMIT 1";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) { // CHANGED: Added space after if
        return true;
    } else {
        echo mysqli_error($db);
        dbDisconnect($db); // CHANGED: Function name to camelCase
        exit();
    }
}
