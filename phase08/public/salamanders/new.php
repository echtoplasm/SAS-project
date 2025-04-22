<?php
/**
 * Create New Salamander Page
 */

require_once('../../private/initialize.php'); 
include(SHARED_PATH . '/salamander-header.php');

if (isPostRequest()) { // CHANGED: Function call to camelCase and added space after if

  $salamander = [];
  $salamanderName = $_POST['name'] ?? ''; // CHANGED: Variable name to camelCase
  $salamanderHabitat = $_POST['habitat'] ?? ''; // CHANGED: Variable name to camelCase
  $salamanderDescription = $_POST['description'] ?? ''; // CHANGED: Variable name to camelCase

  $result = insertSalamander($salamanderName, $salamanderHabitat, $salamanderDescription); // CHANGED: Function call to camelCase and variable names to camelCase
  
  if ($result === true) { // CHANGED: Added space after if
    $newId = mysqli_insert_id($db); // CHANGED: Variable name to camelCase
    redirectTo(urlFor('/salamanders/show.php?id=' . $newId)); // CHANGED: Function calls to camelCase and variable name to camelCase
  } else {
    $errors = $result;
  }

} else {
  $salamander = [];
  $salamander['name'] = '';
  $salamander['habitat'] = '';
  $subject['description'] = '';

}


$pageTitle = 'Create Salamander'; // CHANGED: Variable name to camelCase
?>

<div id="content">

  <a href="<?php echo urlFor('salamanders/index.php'); ?>">&laquo; Back to list</a> <!-- CHANGED: Function call to camelCase -->

  <div>
    <h1>Create New Salamander</h1>

    <?php echo displayErrors($errors); ?> <!-- CHANGED: Function call to camelCase -->

    <form action="<?php echo urlFor('/salamanders/new.php'); ?>" method="post"> <!-- CHANGED: Function call to camelCase -->
      <dl>
        <dt>Salamander Name</dt>
        <dd><input type="text" name="name" value=""></dd>
      </dl>
      <dl>
        <dt>Salamander Habitat</dt>
        <dd><input type="textarea" name="habitat" value=""></dd>
      </dl>
      <dl>
        <dt>Salamander Description</dt>
        <dd><input type="textarea" name="description" value=""></dd>
      </dl>
      <input type="submit" value="Create Salamander">
    </form>
  </div>

</div>


<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
