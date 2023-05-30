<?php 

session_start();



	session_unset();
	
	header("Location: index.php");
	
	session_unset();
        $_SESSION['username'];

 ?>
