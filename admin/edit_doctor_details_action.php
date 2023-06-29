
<?php
include('db.php');
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
				  
  
	if (isset($_FILES['pic']) && $_FILES['pic']['error'] == 0) {
	$picture = $_FILES['pic'];
	$picture_name = $picture['name'];
	$picture_tmp_name = $picture['tmp_name'];
	$picture_size = $picture['size'];
	
	echo "<pre>";
	print_r($_FILES);
	exit();
   

	// Define the upload directory and the target file path
	$upload_directory = '../images/'; // Change this to your desired directory
	$target_file = $upload_directory . basename($picture_name);
	//exit();
		// Move the uploaded file to the target directory
		if (move_uploaded_file($picture_tmp_name, $target_file)) {
			// File was uploaded successfully
			$currentTimestamp = date('Y-m-d H:i:s');
		}
	}
  
	// Update the other details in the database including the profile photo
	echo $sql = "UPDATE doctor_details SET doctor_name='$doctor_name', graduation_status='$doctor_graduation', email_id='$doctor_email', specialist='$doctor_specialist', fees='$doctor_fees', gender='$doctor_gender', address='$doctor_address', mobile='$doctor_mobile', status='$status', experience='$doctor_experience', profile_photo='$target_file', update_at='$currentTimestamp' WHERE doctor_id='$id'";

	
	$result = mysqli_query($object->dbConnection(), $sql);

//exit();
	if ($result) {
		header("Location: edit_doctor_details?update=1");
		exit;
	} else {
		header("Location: edit_doctor_details?error=1");
		exit;
	}
?>
