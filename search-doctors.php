<!doctype html>
<html lang="en">

<head>
  <?php 
    session_start();
    if ($_SESSION["username"]) { 
      include('admin/adminhead.php'); 
  ?>
  <title>admin</title>
  <style>
    html, body {
      height: 100%;
    }
    body {
      display: flex;
      flex-direction: column;
    }
    #content {
      flex: 1;
    }
    #footer {
      flex-shrink: 0;
    }
  </style>
</head>

<body>
  <div id="header">
    <?php include('header.php'); ?>
  </div>
<?php
$searchTerm = $_POST['term'];
$query = "SELECT * FROM doctor_details WHERE doctor_name LIKE '%$searchTerm%'";
// Execute the query
$result = mysqli_query($object->dbConnection(), $query);

// Check if any rows were found
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Doctor Name</th><th>Specialization</th><th>Location</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['doctor_name'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    // No doctors found
    echo "No doctors found.";
	}}
?>
