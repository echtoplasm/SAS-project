<?php
// localhost connection
// Create PHP constants for the database connection
define("DB_SERVER", "localhost");
define("DB_USER", "sally");
define("DB_PASS", "P@ssword1234");
define("DB_NAME", "salamanders");


// webhost connection
// use this connection when you upload your files to the webhost
// comment them out when working locally
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
?>
