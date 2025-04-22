<?php
/**
 * Delete Salamander Page
 */

require_once('../../private/initialize.php'); 
include(SHARED_PATH . '/salamander-header.php');
if (!isset($_GET['id'])) { // CHANGED: Added space after if and !
    redirectTo(urlFor('salamanders/index.php')); // CHANGED: Function calls to camelCase
  }
  $id = $_GET['id'];
    
  if (isPostRequest()) { // CHANGED: Function call to camelCase and added space after if
    deleteSalamander($id); // CHANGED: Function call to camelCase
    redirectTo(urlFor('salamanders/index.php')); // CHANGED: Function calls to camelCase
  } else {
    $salamander = findSalamanderById($id); // CHANGED: Function call to camelCase
  }
  
  $pageTitle = 'Delete Salamander'; // CHANGED: Variable name to camelCase
?>
  
    <a href="<?php echo urlFor('salamanders/index.php'); ?>">&laquo; Back to Salamanders</a> <!-- CHANGED: Function call to camelCase -->
      <h1>Delete Salamander</h1>
      <p>Are you sure you want to delete this salamander?</p>
      <p><?php echo h($salamander['name']); ?></p>
  
      <form action="<?php echo urlFor('salamanders/delete.php?id=' . h(u($salamander['id']))); ?>" method="post"> <!-- CHANGED: Function calls to camelCase -->
          <input type="submit" name="commit" value="Delete Salamander" />
      </form>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
