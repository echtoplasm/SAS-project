<?php require_once('../../private/initialize.php'); 
include(SHARED_PATH . '/salamander-header.php');

if(is_post_request()) {

  $salamander = [];
  $salamander_name = $_POST['name'] ?? '';
  $salamander_habitat = $_POST['habitat'] ?? '';
  $salamander_description = $_POST['description'] ?? '';

  $result = insert_salamander($salamander_name, $salamander_habitat, $salamander_description);
  
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/salamanders/show.php?id=' .$new_id));
  }else{
    $errors = $result;
  }

}else{
  $salamander = [];
  $salamander['name'] = '';
  $salamander['habitat'] = '';
  $subject['description'] = '';

}


$page_title = 'Create Salamander'; 
?>

<div id="content">

  <a href="<?php echo url_for('salamanders/index.php')?>">&laquo; Back to list</a>

  <div>
    <h1>Create New Salamander</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/salamanders/new.php'); ?>" method="post">
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
