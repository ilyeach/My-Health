<?php

	include('admin/db.php'); 
	$object = new database();

	if(!isset($_SESSION))
	{
		session_start();
	}
		$name = $_POST['name'];
		$age = $_POST['age'];
		$date = $_POST['date'];
		$time = $_POST['selectedTime'];
		
		$doctorName = $_POST["doctorName"];
		print_r($doctorName);
		exit;
		
		
		
		
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