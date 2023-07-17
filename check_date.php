<?php
// 

// Replace this with your actual connection and query to fetch time based on the selected date
// For security, consider using prepared statements to prevent SQL injection.
$selectedDate = $_POST['date'];
$availableTimes = array();

// Example query to retrieve the corresponding time for the selected date
$sql = "SELECT appo_time FROM `appointment` WHERE app_date = '$selectedDate'";
$res = mysqli_query($object->dbConnection(), $sql);
 
while ($row = $res->fetch_assoc()) {
  $availableTimes[] = $row['appo_time'];
 
}

// Return the available times as a JSON response
echo json_encode($availableTimes);
?>
