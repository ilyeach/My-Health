<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // Start the session

include('db.php');
$object = new database();

session_unset(); // Unset all session variables

// Redirect to the index.php page or any other desired page
header("Location: index.php");
exit();
?>
