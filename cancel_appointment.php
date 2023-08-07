<?php
include('admin/db.php'); 
$object = new database();
session_start();

// Check if the user is logged in as a patient
if (!isset($_SESSION["username"])) {
  // Redirect to the login page or handle the error accordingly
  header("Location: login.php");
  exit();
}

// Include the database connection and other necessary files

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  // Get the doctor ID, patient ID, appointment date, and appointment time from the query parameters
  $doctor_id = $_GET["doctor_id"];
  $patient_id = $_GET["patient_id"];
  $appointment_date = $_GET["appointment_date"];
  $appointment_time = $_GET["appointment_time"];

  // Perform any necessary data validation and sanitization here

  // Delete the appointment from the database
  $query = "DELETE FROM appointment WHERE doctor_id = " . $doctor_id . " AND patient_id = " . $patient_id . " AND appointment_date = '" . $appointment_date . "'  AND appointment_time = '" . $appointment_time . "'";
$res = mysqli_query($object->dbConnection(), $query);


  if ($res) {
    // Redirect back to the doctor's appointment page with a success message
    header("Location: appointment.php?id=$doctor_id&cancel=1");
    exit();
  } else {
    // Redirect back to the doctor's appointment page with an error message
    header("Location: appointment.php?id=$doctor_id&cancel_error=1");
    exit();
  }
}
?>
