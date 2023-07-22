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
        	print_r($row);
            exit;			
		
				
			
?>