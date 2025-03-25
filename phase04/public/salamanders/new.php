<?php require_once('../../private/initialize.php'); 
include(SHARED_PATH . '/salamander-header.php');

$test = $_GET['test'] ?? '';

switch($test) {
  case 404:
    error_404();
    break;
  case 500:
    error_500();
    break;
  case 'redirect':
    redirect_to(url_for('salamanders/index.php'));
}

$page_title = 'Create Salamander'; 
?>

<div id="content">

  <a href="<?php echo url_for('salamanders/index.php')?>">&laquo; Back to list</a>

  <div>
    <h1>Create New Salamander</h1>

    <form action="<?php echo url_for('/salamanders/create.php'); ?>" method="post">
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
