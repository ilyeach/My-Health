<?php
include('../db.php');
$object = new database();

if (!isset($_SESSION)) {
  session_start();
}

// Check if the form is submitted

$id = $_SESSION['id'];
$doctor_name = $_POST['name'];
$doctor_graduation = $_POST['graduation'];
$doctor_gender = $_POST['gender'];
$doctor_email = $_POST['email'];
$doctor_mobile = $_POST['mobile'];
$doctor_address = $_POST['address'];
$doctor_specialist = $_POST['specialist'];
$doctor_fees = $_POST['fees'];
$doctor_experience = $_POST['experience'];
$status = $_POST['status'];



// Check if a new profile picture is uploaded
if (isset($_FILES['pic']) && $_FILES['pic']['error'] == 0) {
    $picture_tmp_name = $_FILES['pic']['tmp_name'];
    $target_file = '../images/' . basename($_FILES['pic']['name']);
	print_r($_FILES['pic']);
	exit;

    if (move_uploaded_file($picture_tmp_name, $target_file)) {
    // Update the other details in the database
    $sql = "UPDATE doctor_info SET doctor_name='$doctor_name', graduation_status='$doctor_graduation', email_id='$doctor_email', specialist='$doctor_specialist',  fees='$doctor_fees', gender='$doctor_gender',  address='$doctor_address', mobile='$doctor_mobile', status='$status', experience='$doctor_experience', profile_photo='$target_file' WHERE doctor_id='$id'";

    

    $result = mysqli_query($object->dbConnection(), $sql);

    if ($result) {
      header("Location: edit_doctor_details?update=1");
      exit;
    } else {
      header("Location: edit_doctor_details?error=1");
      exit;
    }
  }
}
?>
