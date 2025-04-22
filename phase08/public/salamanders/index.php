<?php 
/**
 * Salamander Listing Page
 */

require_once('../../private/initialize.php');

$salamanderSet = findAllSalamanders(); // CHANGED: Variable name to camelCase and function call to camelCase
$pageTitle = 'Salamanders'; // CHANGED: Variable name to camelCase
include(SHARED_PATH . '/salamander-header.php'); 

?>
    <h1>Salamanders</h1>
    
    <a href="<?= urlFor('salamanders/new.php'); ?>">Create Salamander</a> <!-- CHANGED: Function call to camelCase -->
    
    <table border="1">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Habitat</th>
        <th>Desc</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>
      
      <?php while ($salamander = mysqli_fetch_assoc($salamanderSet)) { ?> <!-- CHANGED: Variable name to camelCase and added space after while -->
        <tr>
          <td><?= h($salamander['id']); ?></td>
          <td><?= h($salamander['name']); ?></td>
          <td><?= h($salamander['habitat']); ?></td>
          <td><?= h($salamander['description']); ?></td>
          <td><a href="<?= urlFor('salamanders/show.php?id=' . h(u($salamander['id']))); ?>">View</a></td> <!-- CHANGED: Function calls to camelCase -->
          <td><a href="<?= urlFor('salamanders/edit.php?id=' . h(u($salamander['id']))); ?>">Edit</a></td> <!-- CHANGED: Function calls to camelCase -->
          <td><a href="<?= urlFor('salamanders/delete.php?id=' . h(u($salamander['id']))); ?>">Delete</a></td> <!-- CHANGED: Function calls to camelCase -->
        </tr>
      <?php } ?>
  	</table>
  <?php mysqli_free_result($salamanderSet); ?> <!-- CHANGED: Variable name to camelCase -->
  Thanks to <a href="https://herpsofnc.org">Ampibians and Reptiles of North Carolina</a>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
