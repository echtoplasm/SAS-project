<?php
  if(!isset($page_title)) { $page_title = 'Salamanders'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>SAS - <?php echo h($page_title); ?></title>
    <link rel="stylesheet" media="all" href="<?= url_for('stylesheets/salamander.css'); ?>" />
    <meta charset="utf-8">
  </head>

  <body>
    <header>
      <h1><a href="<?= url_for('/'); ?>">Southern Appalachian Salamanders (SAS)</a></h1>
    </header>
    <navigation>
      <ul>
      <li><a href="<?= url_for('salamanders/'); ?>">Salamanders</a></li>
      </ul>
    </navigation>

