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

  default:
    echo 'No error';
    break;
}
?>
