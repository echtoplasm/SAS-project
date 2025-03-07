<?php 
require_once('../../private/initialize.php'); 
$page_title = 'Create Salamander'; 
include(SHARED_PATH . '/salamander-header.php'); 
?>

<h1>Edit Salamander</h1>
<form action="/sas/phase02/public/salamanders/create.php" method="post">
    <label for="salamanderName">Name</label><br>
    <input type="text" name="salamanderName"/><br>
    <input type="submit" value="Edit Salamander"/>
</form>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
