<?php

	include('db.php'); 
	$object = new database();

	if(!isset($_SESSION))
	{
		session_start();
	}
		$hospital_name = $_POST["hospital_name"];
      	$hospital_email =  $_POST["email"];
		$hospital_address =  $_POST["address"];
		$hospital_location = $_POST["location"];
		$hospital_contact = $_POST["contact"];
		
		
		
         	$sql="SELECT * FROM hospital_details WHERE email_id ='".$hospital_email."'";	
           			
		    $result=mysqli_query($object->dbConnection(), $sql);
			$row = $result->fetch_assoc();
        			
		if ($hospital_email == $row['email_id']) 
		{
			
			header("Location: hospital_details.php?er=1");
		    exit;
		}
		
		else
		{	
		$query ="INSERT INTO `hospital_details` (`hospital_name`, `email_id`, `hospital_address`, `location`, `contact_number`) VALUES ('$hospital_name', '$hospital_email', '$hospital_address', '$hospital_location', '$hospital_contact')";
	
		$result=mysqli_query($object->dbConnection(), $query);


		 if ($result) {
		header("Location:  hospital_details.php?reg=1");
		exit;
		} else {
		header("Location:  hospital_details.php?error=1");
		exit;
		}
		}
?>