<?php
include('admin/db.php'); 
$object = new database();

// Assuming you have the doctor_id in the $_POST data, otherwise add it to the AJAX data.
$doctor_id = $_POST['id'];

?>
<?php

$selectedDate = $_POST['date'];
$selectedTimeOfDay = $_POST['time_of_day'];

// Initialize an array to store the available time slots

// Assuming your appointment table contains columns 'appointment_date' and 'appointment_time'
$sql = "SELECT appointment_time FROM `appointment` WHERE doctor_id = " . $doctor_id . " AND appointment_date = '" . $selectedDate . "'";



$res = mysqli_query($object->dbConnection(), $sql);
if ($res) {
    // Fetch available time slots and store them in the array
    while ($row = mysqli_fetch_assoc($res)) {
        $availableTimeSlots = $row['appointment_time'];
		echo " S => ".$availableTimeSlots;
exit;
    }
}

// Send the response back to the client-side as JSON format

?>

