<?php

function find_all_salamanders() {
    global $db;
    $sql = "SELECT * FROM salamander ";
    $sql .= "ORDER BY name ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_salamander_by_id($id) {
  global $db;
  $sql = "SELECT * FROM salamander ";
  $sql .="WHERE id='" . $id . "'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result, $sql);
  $subject = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $subject;
}


function validate_salamander($salamander) {
  $errors = [];

  // menu_name
  if(is_blank($salamander['name'])) {
    $errors[] = "Name cannot be blank.";
  } elseif(!has_length($salamander['name'], ['min' => 2, 'max' => 255])) {
    $errors[] = "Name must be between 2 and 255 characters.";
  }

  // position
  // Make sure we are working with an integer
  if(is_blank($salamander['habitat'])) {
    $errors[] = "Habitat cannot be blank.";
  } elseif(!has_length($salamander['habitat'], ['min' => 2, 'max' => 255])) {
    $errors[] = "Name must be between 2 and 255 characters.";
  }

  // visible
  // Make sure we are working with a string
  if(is_blank($salamander['description'])) {
    $errors[] = "Description cannot be blank.";
  } elseif(!has_length($salamander['description'], ['min' => 25, 'max' => 1000])) {
    $errors[] = "Description must be between 100 and 1000 characters.";
  }

  return $errors;
}


function insert_salamander(
  $salamander_name, 
  $salamander_habitat, 
  $salamander_description
  ){
  global $db;

  $salamander = [];
  $salamander['name'] = $salamander_name;
  $salamander['habitat'] = $salamander_habitat;
  $salamander['description'] = $salamander_description;

  $errors = validate_salamander($salamander);
  
  if(!empty($errors)) {
    return $errors;
  }


  $sql = "INSERT INTO salamander ";
  $sql .= "(name, habitat, description) ";
  $sql .= "VALUES (";
  $sql .=  "'" . $salamander_name . "',";
  $sql .= "'" . $salamander_habitat . "',";
  $sql .= "'" . $salamander_description . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);


  if($result) {
    return true;

  }else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }

}


function update_salamander($salamander) {
    global $db;


  $errors = validate_salamander($salamander);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE salamander SET ";
    $sql .= "name='" .  $salamander['name'] . "', ";
    $sql .= "habitat='" .  $salamander['habitat'] . "',";
    $sql .= "description='" .  $salamander['description'] . "' ";
    $sql .= "WHERE id='" . $salamander['id'] . "' ";
    $sql .= "LIMIT 1";
  
    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}


function delete_salamander($id) {
    global $db;
    $sql = "DELETE FROM salamander ";
    $sql .= "WHERE id = '" . $id . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}
