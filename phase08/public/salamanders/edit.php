<?php
/**
 * Edit Salamander Page
 */

require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php'); 
$pageTitle = 'Edit Salamander'; // CHANGED: Variable name to camelCase
$id = $_GET['id'];
// need to remove this line but right now it works.

$salamander = findSalamanderById($id); // CHANGED: Function call to camelCase

if (isPostRequest()) { // CHANGED: Function call to camelCase and added space after if
    $salamander = [];
    $salamander['id'] = $id;
    $salamander['name'] = $_POST['name'] ?? '';
    $salamander['habitat'] = $_POST['habitat'] ?? '';
    $salamander['description'] = $_POST['description'] ?? '';

  $result = updateSalamander($salamander); // CHANGED: Function call to camelCase
  if ($result === true) { // CHANGED: Added space after if
    redirectTo(urlFor('salamanders/show.php?id=' . $id)); // CHANGED: Function calls to camelCase
  } else {
    $errors = $result;
    //var_dump($errors);
  }
}
?>
<?php echo displayErrors($errors); ?> <!-- CHANGED: Function call to camelCase -->

<form action="<?= urlFor('salamanders/edit.php?id=' . h(u($id))); ?>" method="post"> <!-- CHANGED: Function calls to camelCase -->
<label for="name">
     <p>Name:<br> <input type="text" name="name" value="<?= h($salamander['name']); ?>"></p>
 </label>
 <label for="habitat">
     <p>Habitat: <br>
        <textarea rows="4" cols="50" name="habitat">
            <?= h($salamander['habitat']); ?>
        </textarea>
    </p>
</label>
 <label for="description">
     <p>Description:<br>
         <textarea rows="4" cols="50" name="description">
            <?= h($salamander['description']); ?>
        </textarea> 
     </p>
 </label>
 <lable for="submit">
     <p><input type="submit" value="Edit Salamander"></p>
 </label>
</form>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
