<?php

// Create the find_all_salamanders() function

$db = db_connect();


function find_all_salamanders() {
    global $db;
    $sql = "SELECT * FROM salamander ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    return $result;

}
// This function should return an associative array of salamanders
// Remember that $db needs to be global in scope
