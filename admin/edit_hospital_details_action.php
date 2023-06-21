<?php

include('db.php'); 
$object = new database();

if (!isset($_SESSION)) {
    session_start();
}

$id = $_SESSION['id'];
$hospital_name = $_POST["name"];
$email_id = $_POST["email"];
$hospital_address = $_POST["address"];
$hospital_location = $_POST["location"];
$hospital_contact = $_POST["contact"];

if (isset($_POST['update'])) {
    $sql = "UPDATE `hospital_details` SET `hospital_name`='".$hospital_name."', `hospital_address`='".$hospital_address."' ,`email_id`='".$email_id."', `location`='".$hospital_location."',`contact_number`='".$hospital_contact."', `update_at`=NULL WHERE hospital_id=".$id."";
	
	 $result = $object->dbConnection()->query($sql);
   // $result = mysqli_query($object->dbConnection(), $sql);
   

    if ($result) {
        header("Location: edit_hospital_details?update=1");
        exit;
    } else {
        header("Location: edit_hospital_details?error=1");
        exit;
    }
}

			  ?>
