<?php
function process_salamander_submission() {
  if(is_post_request()) {
    global $db;
    
    $salamander_name = $_POST['name'] ?? '';
    $salamander_habitat = $_POST['habitat'] ?? '';
    $salamander_description = $_POST['description'] ?? '';
    
    $sql = "INSERT INTO salamander ";
    $sql .= "(name, habitat, description) ";
    $sql .= "VALUES (";
    $sql .=  "'" . $salamander_name . "',";
    $sql .= "'" . $salamander_habitat . "',";
    $sql .= "'" . $salamander_description . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    if($result) {
      $new_id = mysqli_insert_id($db);
      redirect_to(url_for('/salamanders/show.php?id=' . $new_id));
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }
  return false; 
}
?>
