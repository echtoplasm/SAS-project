<?php require_once('../../private/initialize.php');

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$sql = "select * from salamander ";
$sql .= "Where id='" . $id . "'";
$result = mysqli_query($db, $sql);


confirm_result_set($result, $sql);

$subject = mysqli_fetch_assoc($result);

mysqli_free_result($result);



$page_title = 'View Salamander';


include(SHARED_PATH . '/salamander-header.php'); 
?>


  <a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject show">
    <h1>Salamander: <?php echo h($subject['name']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Salamander Name</dt>
        <dd><?php echo h($subject['name']); ?></dd>
      </dl>
      <dl>
        <dt>Habitat</dt>
        <dd><?php echo h($subject['habitat']); ?></dd>
      </dl>
      <dl>
        <dt>Description</dt>
        <dd><?php echo h($subject['description']);?></dd> 
      </dl>
    </div>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
