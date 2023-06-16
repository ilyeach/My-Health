<?php
include('../db.php');
$object = new database();

if (!isset($_SESSION)) {
  session_start();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
  print_r($_POST['pic']);
  exit;

  // Check if a new profile picture is uploaded
 if ($_FILES['pic']['error'] !== UPLOAD_ERR_OK) {
  echo 'File upload error: ' . $_FILES['pic']['error'];
  exit;
}
	 
    // Specify the directory where you want to save the uploaded file
    $targetDirectory = 'images/';

   
    // Create the target directory if it doesn't exist
    if (!is_dir($targetDirectory)) {
      mkdir($targetDirectory, 0777, true);
    }
    
    // Get the name and temporary location of the uploaded file
    $fileName = $_FILES['pic']['name'];
    $tempFilePath = $_FILES['pic']['tmp_name'];
    
    // Generate a unique name for the file to avoid conflicts
    $targetFilePath = $targetDirectory . uniqid() . '_' . $fileName;
    
    // Move the uploaded file to the target location
    if (move_uploaded_file($tempFilePath, $targetFilePath)) {
      // File was uploaded successfully
      $currentTimestamp = date('Y-m-d H:i:s');
      
      // Update the other details in the database including the profile photo
      $sql = "UPDATE doctor_info SET doctor_name='$doctor_name', graduation_status='$doctor_graduation', email_id='$doctor_email', specialist='$doctor_specialist', fees='$doctor_fees', gender='$doctor_gender', address='$doctor_address', mobile='$doctor_mobile', status='$status', experience='$doctor_experience', update_at='$currentTimestamp'";

      // Check if a new image is selected and update the profile photo if true
      if (!empty($fileName)) {
        $sql .= ", profile_photo='$targetFilePath'";
      }

      $sql .= " WHERE doctor_id='$id'";

      $result = mysqli_query($object->dbConnection(), $sql);

      if ($result) {
        header("Location: edit_doctor_details?update=1");
        exit;
      } else {
        header("Location: edit_doctor_details?error=1");
        exit;
      }
    } else {
      // Failed to move uploaded file
      header("Location: edit_doctor_details?error=2");
      exit;
    }
  }

?>
