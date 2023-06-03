<?php

include('db.php'); 
$object = new database();

if(!isset($_SESSION))
{
	session_start();
}
	$id = $_SESSION['id'];
	$hospital_name = $_POST["name"];
	$hospital_address =  $_POST["address"];
	$hospital_location = $_POST["location"];
	$hospital_contact = $_POST["contact"];



$sql = "UPDATE hospital_info SET hospital_name='$hospital_name', hospital_address='$hospital_address', location='$hospital_location', contact_number='$hospital_contact', update_at=NULL WHERE id='$id'";
$result = mysqli_query($object->dbConnection(), $sql);

if ($result) {
    $_SESSION['message'] = "Record updated successfully.";
    header("Location: all_hospital_details.php");
    exit;
} else {
    $_SESSION['message'] = "Error updating record.";
    header("Location: all_hospital_details.php");
    exit;
}

  ?>
