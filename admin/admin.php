<!doctype html>
<html lang="en">

 
<?php 

	include('db.php'); 

	if($_SESSION["username"]) { ?>
		
		
		
		<head>
<?php include('adminhead.php'); ?>
<title>admin</title>
</head>
<body>

  <div id="header">
	<?php include('adminheader.php'); ?>
  </div>
<h1>WELCOME ADMIN</h1>
</body>
	<div id="footer">
<?php include('adminfooter.php'); ?>
 </div>
		
	<?php } else {
		header("Location: login.php");
	}?>


 
</html>