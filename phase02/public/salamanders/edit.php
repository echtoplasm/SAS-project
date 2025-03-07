<?php 
require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/salamanders/index.php'));
}

$id = $_GET['id'];
$salamanderName = '';

if (is_post_request()) {
  $salamanderName = $_POST['salamanderName'] ?? '';
  echo "Salamander Name: " . $salamanderName; 
  }
?>

<?php $page_title = 'Edit Salamander'; ?>

<h1>Edit Salamander</h1>
<form action="<?php echo url_for('salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
    <label for="salamanderName">Name</label><br>
    <input type="text" name="salamanderName" value="<?php echo $salamanderName; ?>"><br><br>
    <input type="submit" value="Edit Salamander">
</form>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
