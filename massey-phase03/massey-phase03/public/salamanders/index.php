<?php

require_once('../../private/initialize.php');
$db = db_connect();
// Use the fina_all_salamanders() function to get an associative array

$salamander_set = find_all_salamanders();


$page_title = 'Salamanders';
include(SHARED_PATH . '/salamander-header.php');

?>
<link rel="stylesheet" media="all" href="../stylesheets/salamanders.css">
<h1>Salamanders</h1>

<a href="<?= url_for('salamanders/create.php'); ?>">Create Salamander</a>

<!-- Use CSS to style the table -->
<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Habitat</th>
    <th>Desc</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

  <!-- Add PHP code here to loop through the $salamander_set array
  // and output the salamander data in a table
  // Use the h() function to escape data output
  // Use u() function to encode data for URLs
  // Use url_for() function to create URLs
  // Use the mysqli_fetch_assoc() function to get an associative array
  // Use the mysqli_free_result() function to free the result set
-->
  <?php while ($salamander = mysqli_fetch_assoc($salamander_set)) {
    ?>
    <tr>
      <td><?= h($salamander['id']); ?></td>
      <td><?= h($salamander['name']); ?></td>
      <td><?= h($salamander['habitat']); ?></td>
      <td><?= h($salamander['description']); ?></td>
      <td><a href="<?= url_for('salamanders/show.php?id=' . u($salamander['id'])); ?>">View</a></td>
      <td><a href="<?= url_for('salamanders/edit.php?id=' . u($salamander['id'])); ?>">Edit</a></td>
      <td><a href="<?= url_for('salamanders/delete.php?id=' . u($salamander['id'])); ?>">Delete</a></td>
    </tr>
<?php } ?>
</table>

  Thanks to <a href="https://herpsofnc.org">Ampibians and Reptiles of North Carolina</a>

  <?php include(SHARED_PATH . '/salamander-footer.php'); ?>
