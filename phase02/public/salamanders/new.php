<?php 

require_once('../../private/initialize.php'); 

$test = $_GET['test'] ?? '';

switch($test) {
  case '404':
    error_404();
    break;

  case '500':
    error_500();
    break;

  case 'redirect':
    redirect_to(url_for('/salamanders/index.php'));
    break;

  case 'redirect_external':
    redirect_to('http://www.google.com');
    break;
}
?>

<?php $page_title = 'Create Salamander'; ?>

<?php include(SHARED_PATH . '/salamander-header.php'); ?>

<h1>Create Salamander</h1>
<form action="/sas/phase02/public/salamanders/create.php" method="post">
    <label for="salamanderName">Name</label><br>
    <input type="text" name="salamanderName"/><br>
    <input type="submit" value="Create Salamander"/>
</form>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
