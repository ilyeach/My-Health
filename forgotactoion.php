<?php
include('admin/db.php');
$object = new database();

if (!isset($_SESSION)) {
    session_start();
}

$patient_email = $_POST["email"];
$patient_dob = $_POST["dob"];
    $sql = "SELECT * FROM patient_details WHERE email_id = '" . $patient_email . "' AND dob = '" . $patient_dob . "'";	 
    $result = mysqli_query($object->dbConnection(), $sql);   
   if ($row = mysqli_fetch_assoc($result)) {	  
       $check = 1;      
        header("Location: forgot.php");
        exit();
    }   
 if ($check == 0) {
        header("Location: user_login.php?invalid=1");
        exit();
    }
?>
