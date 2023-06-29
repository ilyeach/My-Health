<?php 

	include('admin/db.php'); 

	if($_SESSION["username"]) {
		header("Location: home.php");
	} else {
		header("Location: user_login.php");
	}
?>