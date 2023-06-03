<?php

$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your MySQL username
$password = "test"; // Replace with your MySQL password
$database = "admin_login"; // Replace with your database name

session_start();

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['username']) && $_POST['password'])
{	
	$query="SELECT * FROM admin_login WHERE user_name= '".$_POST['username']."' AND password='".$_POST['password']."'" ;
 
	$result=mysqli_query($conn, $query);

	if (mysqli_num_rows($result) === 1) {
		$_SESSION["username"]= $_POST['username'];
		
		header("Location: admin.php");
		exit;
	} else {	
		header("Location: login.php?error=1");
		exit;
	}
}
?>
