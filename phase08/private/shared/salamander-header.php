<?php
/**
 * Salamander Header Template
 */

if (!isset($pageTitle)) { // CHANGED: Variable name to camelCase and added space after if and !
    $pageTitle = 'Salamanders'; // CHANGED: Variable name to camelCase
}
?>

<!doctype html>

<html lang="en">
  <head>
    <title>SAS - <?php echo h($pageTitle); ?></title> <!-- CHANGED: Variable name to camelCase -->
    <meta charset="utf-8">
  </head>

  <body>
    <header>
      <h1><a href="<?= urlFor('/'); ?>">Southern Appalachian Salamanders (SAS)</a></h1> <!-- CHANGED: Function call to camelCase -->
    </header>
    <navigation>
      <ul>
      <li><a href="<?= urlFor('salamanders/'); ?>">Salamanders</a></li> <!-- CHANGED: Function call to camelCase -->
      </ul>
    </navigation>
