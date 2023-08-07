<?php
include('admin/db.php'); 
$object = new database();

		if (!isset($_SESSION)) {
			session_start();
		}
if ($_SESSION["username"]) {
    // Ensure that the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Sanitize and validate the input (you should use proper sanitization and validation methods)
        $patient_id = $_POST['patient_id'];
        $patient_name = $_POST['name'];
        $email_id = $_POST['email_id'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
		
$query = "UPDATE patient_details SET patient_name='$patient_name', email_id='$email_id', dob='$dob', gender='$gender', contact_number='$contact_number', address='$address', update_at=CURRENT_TIMESTAMP WHERE patient_id='$patient_id'";
   $result = mysqli_query($object->dbConnection(), $query);

      if ($result) {
 header("Location: profile.php?id=" . $patient_id . "&success=1");
        exit;
      } else {
 header("Location: profile.php?error=1");
        exit;
      }
 
} }else {
        header("Location: user_login.php");
        exit();
    }

