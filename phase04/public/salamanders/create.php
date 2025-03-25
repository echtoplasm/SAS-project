<?php
require_once('../../private/initialize.php');
require_once('../../private/query_functions.php');

include(SHARED_PATH . '/salamander-header.php'); 

echo "<h1>Stub for Create Salamander</h1>";

if(is_post_request()) {

  $salamander_name = $_POST['name'] ?? '';
  $salamander_habitat = $_POST['habitat'] ?? '';
  $salamander_description = $_POST['description'] ?? '';

  $result = insert_salamander($salamander_name, $salamander_habitat, $salamander_description);
  $new_id = mysqli_insert_id($db);
  redirect_to(url_for('/salamanders/show.php?id=' . $new_id));
}else{
  echo mysqli_error($db);
  db_disconnect($db);
  exit;
}

include(SHARED_PATH . '/salamander-footer.php'); 
?>
