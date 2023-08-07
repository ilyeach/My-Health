<!doctype html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php 
    session_start();
    if ($_SESSION["username"]) { 
	  
  ?>

  <title>admin</title>
    <?php include('header.php'); ?> 
 
</head>
<style>
/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
    width: 100%;
    padding: 20px;
    min-height: 100vh;
    transition: all 0.3s;
}

</style>
<body style="background-image: url('images/doc1.jpg'); background-size: cover;">
  <?php 	
if(isset($_GET['cancel']) && ($_GET['cancel'] == 1)){
    echo '<div class="alert alert-success text-center" role="alert"> Appointment cancel Successfully </div>';
  } elseif(isset($_GET['cancel_error']) && ($_GET['cancel_error'] == 1)){
    echo '<div class="alert alert-danger text-center" role="alert"> Appointment Not canceled  </div>';
  } 
  ?> 

<?php include ('menu.php');?>
        <!-- Page Content  -->
       
            <div id="container" class="container-lg">
    <div class="d-flex justify-content-center">
      <div class="row">
        <form action="appointment_process.php" method="POST">
<?php  

if (isset($_GET['id'])) {
        // Retrieve the values from the URL
        $patient_id = $_GET['id'];
		
  } else {
        echo "Doctor ID ";
    }

$sql = "SELECT * FROM `appointment` WHERE patient_id = '" . $patient_id . "'";		
 $res = mysqli_query($object->dbConnection(), $sql);

if ($res && mysqli_num_rows($res) > 0) {
    // Open the left column container
   echo '<section>
        <div class="container ml-auto">
            <!-- Appointment Booking Card -->
<div class="row justify-content-start">';
    while ($row = mysqli_fetch_assoc($res)) {
        $bookDate = $row['appointment_date'];
        $bookTime = $row['appointment_time'];
        $doctor_id = $row['doctor_id'];
	    $bookTimestamp = strtotime($bookTime);
		$currentDate = date("d/m");
	$query = "SELECT * FROM doctor_details WHERE doctor_id = '" . $doctor_id . "'";		
  $result = mysqli_query($object->dbConnection(), $query);
  if ($row = mysqli_fetch_assoc($result)) {
    $doctorname = $row['doctor_name'];    
  } 
    $bookTimestamp = strtotime($bookDate);
	$currentTimestamp = strtotime($currentDate . '/' . date('Y'));
	$bookDayMonth = date("d/m", $bookTimestamp);
	$currentDayMonth = date("d/m", $currentTimestamp);
	
 if ($bookDayMonth >= $currentDayMonth) {
echo '<div class="col-md-6 mb-4">
<div class="card shadow-0 border rounded-3">
<div class="card-body">
<h3>Your Next Appointment </h3>
<h5 class="card-title">Doctor Name: ' . $doctorname . '</h5>
<h5 class="card-title">Your booking date: ' . $bookDate . '</h5>
<h5 class="card-subtitle mb-2 text-muted">Your booking time: ' . $bookTime . '</h5><a href="cancel_appointment.php?doctor_id=' . $doctor_id . '&patient_id=' . $patient_id . '&appointment_date=' .$bookDate . '&appointment_time=' . $bookTime . '" class="btn btn-danger">Cancel Booking</a>
</div>
</div>
</div>';
}
}
echo '</div>
      </div>
    </section>';
}else {
echo '<h3>No Next Appointment!</h3>';
}

	

?>

</form>
</div>
</div>
  </div>         
        </div>
    </div>
	
	
	<?php include('appointmentscript.php'); ?> 
  
  <div id="footer" class="bg-light mt-auto fixed-bottom ">
            <!-- Your footer content goes here -->
            <?php include('footer.php'); ?>
        </div>
<?php 
  } else {
    header("Location: user_login.php");
    exit();
  }
?>
</body>	
</html>