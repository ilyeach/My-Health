<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
    session_start();

    if ($_SESSION["username"]) { 
      include('head.php'); 
    }
  ?>
  <?php include('header.php'); ?> 
  <title>Doctor Appointment Scheduling</title>
  <style>
    #date-container {
      width: 20%;
      float:center;
      padding: 20px;
    }
	
    .time-button {
      margin-right: 10px;
      margin-bottom: 10px; /* Add margin-bottom for spacing */
    }
  </style>
</head>
<body>
  <?php 	
  if(isset($_GET['reg']) && ($_GET['reg'] == 1)){
    echo '<div class="alert alert-success text-center" role="alert"> Appointment Registered Successfully </div>';
  } elseif(isset($_GET['error']) && ($_GET['error'] == 1)){
    echo '<div class="alert alert-danger text-center" role="alert"> Appointment Not Registered  </div>';
  }

if(isset($_GET['cancel']) && ($_GET['cancel'] == 1)){
    echo '<div class="alert alert-success text-center" role="alert"> Appointment cancel Successfully </div>';
  } elseif(isset($_GET['cancel_error']) && ($_GET['cancel_error'] == 1)){
    echo '<div class="alert alert-danger text-center" role="alert"> Appointment Not canceled  </div>';
  }

  if(isset($_GET['er']) && ($_GET['er'] == 1)){
    echo '<div class="alert alert-danger text-center" role="alert"> Appointment already exists </div>';
  }
  ?>
  <?php
if (isset($_GET['id'])) {
  $doctor_id = $_GET['id'];
  $query = "SELECT * FROM doctor_details WHERE doctor_id = '" . $doctor_id . "'";
  $result = mysqli_query($object->dbConnection(), $query);
  if ($row = mysqli_fetch_assoc($result)) {
    $doctorName = $row['doctor_name'];
    echo '<h3 class="text-center" style="font-size: 20px;">Booking Appointment For Doctor Name: ' . $doctorName . '</h3>';
  }
 if (isset($_SESSION["username"])) {
    $userName = $_SESSION["username"];
    $query = "SELECT * FROM patient_details WHERE email_id = '" . $userName . "'";
    $result = mysqli_query($object->dbConnection(), $query);
    if ($row = mysqli_fetch_assoc($result)) {
      $patient_id = $row['patient_id'];
      $patient_name = $row['patient_name'];	  
    } else {
      echo "Patient not found!";
    }
  } else {
    echo "Session username not set!";
  } 
}
?>
<?php 
$sql = "SELECT * FROM `appointment` WHERE doctor_id = " . $doctor_id . " AND patient_id = '" . $patient_id . "'";
$res = mysqli_query($object->dbConnection(), $sql);
if ($res) {
  // Open the left column container
  echo '<div class="col-lg-6 col-md-6 col-12">';
  
  // Fetch booked appointments and display them as cards
  while ($row = mysqli_fetch_assoc($res)) {
    $bookDate = $row['appointment_date'];
    $bookTime = $row['appointment_time'];
    echo '<div class="card">		
      <div class="card-body">
		<h3>Your Booking Details</h3>
        <h5 class="card-title">Your booking date: ' . $bookDate . '</h5>
        <h5 class="card-subtitle mb-2 text-muted">Your booking time: ' . $bookTime . '</h5>
        <a href="cancel_appointment.php?doctor_id=' . $doctor_id . '&patient_id=' . $patient_id . '&appointment_date=' . $bookDate . '&appointment_time=' . $bookTime . '" class="card-link">Booking Cancel</a>
      </div>
    </div><br>';
  }
  
  // Close the left column container
  echo '</div><br>';
}

?>
  <div id="container"></div>
<div class="d-flex justify-content-lg-center">  <div class="row">
                
<form action="appointment_process.php" method="POST">
	      <input type="hidden" name="doctor_id" id="doctor_id" value="<?php echo $doctor_id; ?>">
	      <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
      <div class="form-group">
		  <label for="name">Patient Name:</label>
		  <input type="text" class="form-control" id="name" value="<?php echo $patient_name; ?>" name="name" readonly>
      </div>
	<div class="form-group">
	  <label class="control-label" for="date">Date</label>
	  <div class="input-group">
		<span class="input-group-addon"><i class="fas fa-calendar-alt"></i></span>
		<input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text">
	  </div>
	</div>
      <div class="form-group">
        <label for="selectedTime">Selected Time:</label>                  
                        <select class="form-control form-control-lg" name="selectedTime" id="selectedTime" required>
						<option value="">Select</option>
                          <option value="Morning">Morning</option>
                          <option value="Afternoon">Afternoon</option>
                          <option value="Evening">Evening</option>                     
                        </select>
                      </div>
	<div class="form-group">
	  <select class="form-control form-control-lg" name="timeOptions" id="timeOptions"></select>
	</div>



      <button type="submit" class="btn btn-primary">Schedule Appointment</button>
</form>
  </div>
  </div>

   
 <?php include('appointmentscript.php'); ?> 
  
  <div id="footer">
    <?php include('footer.php'); ?>
  </div>

</body>
</html>
