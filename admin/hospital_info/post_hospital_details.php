<?php

include('db.php'); 
$object = new database();

if(!isset($_SESSION))
{
	session_start();
}
	$hospital_name = $_POST["hospital_name"];
	$hospital_address =  $_POST["address"];
	$hospital_location = $_POST["location"];
	$hospital_contact = $_POST["contact"];

//$query = "INSERT INTO hospital_info (`hospital_name`, `hospital_address`, `location`, `contact_number`) VALUES ($hospital_name, $hospital_address, $hospital_location, $hospital_contact)";
			
		$query =	"INSERT INTO `hospital_info` (`hospital_name`, `hospital_address`, `location`, `contact_number`) VALUES ('$hospital_name', '$hospital_address', '$hospital_location', '$hospital_contact')";
	

	
$result=mysqli_query($object->dbConnection(), $query);

print_r($result);

		 if($result) 
		 {
		 echo '<script>alert("record inserted successfully")</script>';
		 header("Location: hospital_details.php");
		 }else 
		 {
		// echo "Error: " . $sql . "<br>" . $conn->error;
		 header("Location: hospital_details.php");
		   } 
		   if ($result) {
    $_SESSION['message'] = "record inserted successfully.";
    header("Location:  hospital_details.php");
    exit;
} else {
    $_SESSION['message'] = "Error.";
    header("Location:  hospital_details.php");
    exit;
}
?>