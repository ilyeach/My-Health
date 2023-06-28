<?php

	include('admin/db.php'); 
	$object = new database();

	if(!isset($_SESSION))
	{
		session_start();
	}
		$patient_name = $_POST["name"];
      	$patient_email =  $_POST["email"];
		$patient_username =  $_POST["username"];
		$patient_address =  $_POST["address"];
		$patient_dob = $_POST["dob"];
		$patient_grnder = $_POST["grnder"];
		$patient_contact = $_POST["contact"];
		$patient_password = $_POST["password"];
		$patient_address = $_POST["address"];
		
		
         	$sql="SELECT * FROM patient_details WHERE email_id ='".$patient_email."'";	
				
		    $result=mysqli_query($object->dbConnection(), $sql);
			$row = $result->fetch_assoc();
        			
		if ($patient_email == $row['email_id']) 
		{
						
			
			header("Location:patient_details.php?er=1");
		    exit;
		}
		
		else
		{	
		$query ="INSERT INTO `patient_details` (`patient_name`,`user_name`, `email_id`, `dob`, `contact_number`, `gender`, `address`, `password`, `created_at`) VALUES ('$patient_name','$patient_username', '$patient_email', '$patient_dob', '$patient_contact', '$patient_grnder', '$patient_address', '$patient_password','')";
	    
		$result=mysqli_query($object->dbConnection(), $query);

		 if ($result) {
		header("Location:  patient_details.php?reg=1");
		exit;
		} else {
		header("Location:  patient_details.php?error=1");
		exit;
		}
		}
?>