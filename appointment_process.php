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
        	$sql="SELECT * FROM appointment WHERE doctor_name ='".$doctorName."' AND patient_name ='".$name."' ";	           			
		    $result=mysqli_query($object->dbConnection(), $sql);
			$row = $result->fetch_assoc();
        			
		if ($name == $row['patient_name']) 
		{
			
			header("Location: appointment.php?er=1");
		    exit;
		}
		
		else
		{	
		$query ="INSERT INTO `appointment`(`doctor_name`,`patient_name`, `patient_age`, `app_date`, `appo_time`) VALUES ('$doctorName','$name','$age','$date','$time',)";
	
		$result=mysqli_query($object->dbConnection(), $query);


		 if ($result) {
		header("Location:  appointment.php?reg=1");
		exit;
		} else {
		header("Location:  appointment.php?error=1");
		exit;
		}
		}
?>