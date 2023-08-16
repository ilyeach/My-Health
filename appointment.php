<!doctype html>
<html lang="en">

<head>
<?php include('head.php');?>
  <?php 
    session_start();
    if ($_SESSION["username"]) { 
	 
	 
if(!isset($_SESSION)) {
    session_start();
}
// Access the stored patient_id and doctor_id

  ?>

  <title>appointment</title>
    <?php include('header.php'); ?> 
 
</head>
<style>
/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
    width: 100%;
    min-height: 84vh;
    transition: all 0.3s;
}
</style>
<body style="background-image: url('images/doc1.jpg'); background-size: cover;">
 
  <?php
if(!isset($_SESSION)) {
    session_start();
}

// Initialize $doctor_id to null


// Check if doctor_id is present in $_GET
if (isset($_GET['id'])) {
    $doctor_id = $_GET['id'];
	
    // Store it in the session for future use
} else{
}
if ($doctor_id !== null) {
    $query = "SELECT * FROM doctor_details WHERE doctor_id = '" . $doctor_id . "'";
    $result = mysqli_query($object->dbConnection(), $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $doctorName = $row['doctor_name'];
        // You can use $doctorName here or perform any other operations.
    }
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

?>
  <?php 	
  if(isset($_GET['reg']) && ($_GET['reg'] == 1)){
    echo '<div class="alert alert-success text-center mb-0 d-flex justify-content-center" role="alert">
    <span class="me-auto">Appointment Booked Successfully</span>
</div>';
  } elseif(isset($_GET['error']) && ($_GET['error'] == 1)){
    echo '<div class="alert alert-danger text-center mb-0 d-flex justify-content-center" role="alert">
    <span class="me-auto">Appointment Not Booked</span>
</div>';
  }

if(isset($_GET['cancel']) && ($_GET['cancel'] == 1)){
    echo '<div class="alert alert-success text-center mb-0 d-flex justify-content-center" role="alert">
    <span class="me-auto">Appointment canceled Successfullys</span>
</div>';
  } elseif(isset($_GET['cancel_error']) && ($_GET['cancel_error'] == 1)){
    echo '<div class="alert alert-danger text-center mb-0 d-flex justify-content-center" role="alert">
    <span class="me-auto">Appointment Not canceled</span>
</div>';
  }

  if(isset($_GET['er']) && ($_GET['er'] == 1)){
    echo '<div class="alert alert-danger text-center mb-0 d-flex justify-content-center" role="alert">
    <span class="me-auto">Appointment already exists</span>
</div>';
  }
   include('menu.php'); ?>
            <div id="container" class="container-lg"> 
    <div class="d-flex justify-content-center">
      <div class="row">
        <form action="appointment_process.php" method="POST">
		<h3 class="text-center" style="font-size: 20px;">Booking Appointment For Doctor Name:<?php echo $doctorName; ?></h3>
          <input type="hidden" name="doctor_id" id="doctor_id" value="<?php echo $doctor_id; ?>">
          <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
          <div class="form-group">
            <label for="name" class="h3">Patient Name:</label>
            <input type="text" class="form-control form-control-lg" id="name" value="<?php echo $patient_name; ?>" name="name" readonly>
          </div>

          <div class="form-group">
            <label class="h3" for="date">Appointment Date:</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fas fa-calendar-alt"></i></span>
              <input class="form-control form-control-lg" id="date" name="date" placeholder="MM/DD/YYYY" type="text">
            </div>
          
        <div class="form-group">
    <label for="selectedTime" class="h3">Select Time Slot:</label>
    <select class="form-control form-control-lg h-100" name="selectedTime" id="selectedTime" required>
        <option value="">Select</option>
        <option value="Morning">Morning</option>
        <option value="Afternoon">Afternoon</option>
        <option value="Evening">Evening</option>
    </select>
</div>
          <div class="form-group">
            <select class="form-control form-control-lg" name="timeOptions" id="timeOptions"></select>
          </div>
               <div class="container-lg">
  <div class="d-flex justify-content-center">
    <!-- Your existing form elements here -->
    
    <button type="submit" class="btn btn-primary btn-lg">Schedule Appointment</button>
  </div>
</div>

        </form>
      </div>
    </div>
  </div> </div>

            

            
<div id="footer" class=" mt-auto fixed-bottom " style="margin-left: 300px;">
            <!-- Your footer content goes here -->
            <?php include('footer.php'); ?>
        </div>
	<script>
	$(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
	</script>           	
	<?php include('appointmentscript.php'); ?> 
  
            <!-- Your footer content goes here -->
<?php 
  } else {
    header("Location: user_login.php");
    exit();
  }
?>
</body>
	
</html>