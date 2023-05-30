<?php 

	include('db.php'); 

	if($_SESSION["username"]) {
		header("Location: admin.php");
	} else {
		header("Location: login.php");
	}
?>