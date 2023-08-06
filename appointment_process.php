<?php
include('admin/db.php'); 
$object = new database();

if(!isset($_SESSION)) {
    session_start();
}

$doctor_id = $_POST['doctor_id'];
$patient_id = $_POST['patient_id'];
$date = $_POST['date'];
$time_of_day = $_POST['selectedTime'];
$time = $_POST['timeOptions'];


$sql = "SELECT * FROM appointment WHERE doctor_id = '$doctor_id' AND patient_id = '$patient_id' ";

$result = mysqli_query($object->dbConnection(), $sql);

if (mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
    if ($name == $row['patient_name'] && $date == $row['app_date']) {
        header("Location: appointment.php?er=1&id=" .$doctor_id);
        exit;
    }
}

$query = "INSERT INTO `appointment`(`doctor_id`, `patient_id`, `appointment_date`, `appointment_time_of_day`,`appointment_time`,`created_at`,`update_at`) VALUES ('$doctor_id`', '$patient_id', '$date', '$time_of_day', '$time', NOW(), NOW())";
$result = mysqli_query($object->dbConnection(), $query);
if ($result) {
    header("Location: appointment.php?reg=1&id=" .$doctor_id);
    exit;
} else {
    header("Location: appointment.php?error=1&id=" .$doctor_id);
    exit;
}
?>
