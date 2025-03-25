<?php

require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php'); 

echo "<h1>Stub for Create Salamander</h1>";

if(is_post_request()) {

  $salamander_name = $_POST['name'] ?? '';
  $salamander_habit = $_POST['habitat'] ?? '';
  $salamander_description = $_POST['description'] ?? '';

  $sql = "INSERT INTO salamander ";
  $sql .= "(name, habitat, description) ";
  $sql .= "VALUES (";
  $sql .=  "'" . $salamander_name . "',";
  $sql .= "'" . $salamander_habit . "',";
  $sql .= "'" . $salamander_description . "'";
  $sql .= ")";
}

include(SHARED_PATH . '/salamander-footer.php'); 
?>
