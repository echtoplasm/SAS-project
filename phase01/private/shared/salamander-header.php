
<?php
require_once(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . '/initialize.php');

if (!isset($pageTitle)) {
  $pageTitle = 'Salamanders';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>SAS - <?php echo h($pageTitle); ?></title>
  <meta charset="utf-8">
  <link rel="stylesheet" media="all" href="<?php echo urlFor('/stylesheets/salamanders.css'); ?>" />
</head>

<body>
  <header>
    <h1><a href="<?php echo urlFor('/'); ?>">Southern Appalachian Salamanders (SAS)</a></h1>
  </header>
  <nav>
    <ul>
      <li><a href="<?php echo urlFor('/salamanders/'); ?>">Salamanders</a></li>
    </ul>
  </nav>



