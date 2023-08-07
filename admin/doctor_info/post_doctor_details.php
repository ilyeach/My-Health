		<?php
		include('..admin/db.php');
		$object = new database();

		if (!isset($_SESSION)) {
			session_start();
		}

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

		$sql = "SELECT * FROM doctor_info WHERE email_id = '$doctor_email'";
		$result = mysqli_query($object->dbConnection(), $sql);

		// Check if the query returned any rows
		if ($result && mysqli_num_rows($result) > 0) {
			$row = $result->fetch_assoc();

			if ($doctor_email == $row['email_id']) {
				header("Location: doctor_details.php?er=1");
				exit;
			}
		}

		// Check if a picture was provided
		if (isset($_FILES['pic']) && $_FILES['pic']['error'] == 0) {
			$picture = $_FILES['pic'];
			$picture_name = $picture['name'];
			$picture_tmp_name = $picture['tmp_name'];
			$picture_size = $picture['size'];

			// Define the upload directory and the target file path
			$upload_directory = '../images/'; // Change this to your desired directory
			$target_file = $upload_directory . basename($picture_name);

			// Move the uploaded file to the target directory
			if (move_uploaded_file($picture_tmp_name, $target_file)) {
				// File was uploaded successfully
				$currentTimestamp = date('Y-m-d H:i:s');

				$query = "INSERT INTO doctor_info (doctor_name, graduation_status, email_id, specialist, fees, gender, address, mobile, status, experience, profile_photo, created_at, update_at)
							VALUES ('$doctor_name', '$doctor_graduation', '$doctor_email', '$doctor_specialist', '$doctor_fees', '$doctor_gender', '$doctor_address', '$doctor_mobile', '$status', '$doctor_experience', '$target_file', '$currentTimestamp', '$currentTimestamp')";

				$result = mysqli_query($object->dbConnection(), $query);
				
				if ($result) {
					header("Location: doctor_details.php?reg=1");
					exit;
				} else {
					header("Location: doctor_details.php?error=1");
					exit;
				}
			} 
		}
		?>
