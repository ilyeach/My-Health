<!doctype html>
<html lang="en">

 
<?php 

	session_start();

	if($_SESSION["username"]) { ?>
		
		<head>
<?php include('adminhead.php'); ?>
<title>admin</title>
</head>
 <body style="background-image: url('images/abg.jpg'); background-size: cover;">

		  <div id="header">
<?php include('adminheader.php'); ?>
		  </div>
		   <h1 class="text-center">WELCOME ADMIN</h1>
		   <h5 class="text-center">
<?php //print_r($_SESSION["username"]);?></h5>


<!-- Dashboard -->
<?php
// Your existing PHP code
$query = "SELECT COUNT(*) AS doctor_count FROM doctor_details";
  $result = mysqli_query($object->dbConnection(), $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $doctorCount = $row['doctor_count'];
	
} else {
    $doctorCount = "N/A";
}
$query = "SELECT COUNT(*) AS hospital_count FROM hospital_details";
  $result = mysqli_query($object->dbConnection(), $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $hospitalCount = $row['hospital_count'];
	
} else {
    $hospitalCount = "N/A";
}
$query = "SELECT COUNT(*) AS patientCount FROM patient_details";
  $result = mysqli_query($object->dbConnection(), $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $patientCount = $row['patientCount'];
	
} else {
    $patientCount = "N/A";
}
date_default_timezone_set('Asia/Kolkata');
		$currentDate = date("d/m/Y");

$sql = "SELECT COUNT(*) AS appoitmentCount FROM appointment WHERE appointment_date = '$currentDate'";


$res = mysqli_query($object->dbConnection(), $sql);

if ($res && mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $appoitmentCount = $row['appoitmentCount'];
} else {
    $appoitmentCount = "N/A";
}

$sql = "SELECT COUNT(*) AS reportCount FROM report_details";

$res = mysqli_query($object->dbConnection(), $sql);

if ($res && mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $reportCount = $row['reportCount'];
} else {
    $reportCount = "N/A";
}
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                   <a href="edit_doctor_details.php" class=" btn-link card-title">
Total Doctors</a>
                    <p class="card-text h3"><?= $doctorCount ?></p>
                </div>
            </div>
        </div>
		<div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <a href="edit_hospital_details.php" class=" btn-link card-title">
Total Hospital</a>
                    <p class="card-text h3"><?= $hospitalCount ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <a href="patient.php" class=" btn-link card-title">
Total Patients</a>
                    <p class="card-text h3"><?= $patientCount ?></p>
                </div>
            </div>
        </div>
		</div>
	    <div class="row mt-4">
	
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
<a href="newappointment.php" class=" btn-link card-title">
                Today Appointment
            </a>                    <p class="card-text h3"><?= $appoitmentCount ?></p>

                </div>
            </div>
        </div>
		<div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
<a href="view_message.php" class=" btn-link card-title">
               Message
            </a>      <p class="card-text h3"><?= $reportCount ?></p>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
		   <div id="footer" class=" mt-auto fixed-bottom ">

<?php include('adminfooter.php'); ?>
</div>
				
<?php } 
 else 
{
header("Location: login.php");
 exit();
}?>


 
</html>