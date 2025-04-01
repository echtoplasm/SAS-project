<?php require_once('../../private/initialize.php');

$id = $_GET['id'] ?? '1'; // PHP > 7.0
$salamander = find_salamander_by_id($id);

$page_title = 'View Salamander';
include(SHARED_PATH . '/salamander-header.php'); 
?>


  <a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject show">
    <h1>Salamander: <?php echo h($salamander['name']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Salamander Name</dt>
        <dd><?php echo h($salamander['name']); ?></dd>
      </dl>
      <dl>
        <dt>Habitat</dt>
        <dd><?php echo h($salamander['habitat']); ?></dd>
      </dl>
      <dl>
        <dt>Description</dt>
        <dd><?php echo h($salamander['description']);?></dd> 
      </dl>
    </div>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
