<?php 
require_once('../../private/initialize.php');
$page_title = 'Create Salamander'; 

if (is_post_request()) {

$salamanderName = $_POST['salamanderName'] ?? '';
echo "Salamander Name: " . $salamanderName;

} else {
    redirect_to(url_for('/salamanders/new.php'));
}
