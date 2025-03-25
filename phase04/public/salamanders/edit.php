<?php

require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php'); 

echo "<h1>Edit Salamander</h1>";

$id=$_GET['id'];

if(is_post_request()) {

  $salamander = [];
  $salamander['id'] = $id;
  $salamander['name'] = $_POST['salamander_name'] ?? '';
  $salamander['habitat'] = $_POST['salamander_habitat'] ?? '';
  $salamander['description'] = $_POST['salamander_description'] ?? '';

 $result = update_salamander($salamander);
  redirect_to(url_for('/salamanders/show.php?id=' . $id));

} else {

  $salamander = find_salamander_by_id($id);

}

?>
<div id="content">

  <a href="<?php echo url_for('salamanders/index.php')?>">&laquo; Back to list</a>

  <div>
    <form action="<?php echo url_for('/salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Salamander Name</dt>
        <dd><input type="text" name="salamander_name" value="<?php echo h($salamander['name']); ?>"></dd>
      </dl>
      <dl>
        <dt>Salamander Habitat</dt>
        <dd><input type="text" name="salamander_habitat" value="<?php echo h($salamander['habitat']); ?>"></dd>
      </dl>
      <dl>
        <dt>Salamander Description</dt>
        <dd><input type="text" name="salamander_description" value="<?php echo h($salamander['description']); ?>"></dd>
      </dl>
      <input type="submit" value="edit salamander">
    </form>
  </div>
</div>



<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
