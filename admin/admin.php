<!doctype html>
<html lang="en">

 
<?php 

	session_start();

	if($_SESSION["username"]) { ?>
		
		<head>
<?php include('adminhead.php'); ?>
<title>admin</title>
</head>
<body>

  <div id="header">
	<?php include('adminheader.php'); ?>
  </div>
<h1 class="text-center">WELCOME ADMIN</h1>
<h5 class="text-center">
 <?php //print_r($_SESSION["username"]);?></h5>
</body>
	<div id="footer">
<?php include('adminfooter.php'); ?>
 </div>
		
	<?php } else {
		//header("Location: login.php");
	}?>


 
</html>