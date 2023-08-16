<?php
include('admin/db.php'); 
$object = new database();

		if (!isset($_SESSION)) {
			session_start();
		}
if ($_SESSION["username"]) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id = $_POST["patient_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $query ="INSERT INTO `report_details`( `patient_id`, `patient_name`, `email_id`, `message`, `created_at`) VALUES ('$id', '$name', '$email', '$message', NOW())";
	    
		$result=mysqli_query($object->dbConnection(), $query);
     if ($result) {
 header("Location: contactus.php?id=" . $id . "&success=1");
        exit;
      } else {
 header("Location: contactus.php?error=1");
        exit;
      }
 
} }else {
        header("Location: user_login.php");
        exit();
    }
?>
