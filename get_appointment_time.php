<?php
include('admin/db.php'); 
$object = new database();

// Check if the selectedDate is sent from the AJAX call
if (isset($_POST['date'])) {
  // Retrieve the selected date from the POST data
  $selectedDate = $_POST['date'];
  // Sanitize the input to prevent SQL injection
  $selectedDate = mysqli_real_escape_string($object->dbConnection(), $selectedDate);

  // Perform the SQL query to fetch the appointment time for the selected date
  $sql = "SELECT appo_time FROM appointment WHERE app_date = '$selectedDate'";
  $result = mysqli_query($object->dbConnection(), $sql);

  if ($result) {
    // Initialize an array to store the appointment times
    $appointmentTimes = array();

    // Loop through the result to fetch all appointment times
    while ($row = mysqli_fetch_assoc($result)) {
      $appointmentTimes[] = $row['appo_time'];
    }

    // Return the appointment times as a JSON response
    echo json_encode(array('appointmentTimes' => $appointmentTimes));
    exit;
  } else {
    // Handle database query errors if any
    echo json_encode(array('error' => "Error: " . $sql . "<br>" . mysqli_error($object->dbConnection())));
    exit;
  }
}

// Return an empty response if the date is not set
echo json_encode(array());
?>
