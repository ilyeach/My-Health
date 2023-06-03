<?php 

include('db.php'); 
$object = new database();


session_start();
session_unset();

header("Location: index.php");
session_unset(); 

$_SESSION['username'];

 ?>
