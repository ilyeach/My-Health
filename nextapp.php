<!doctype html>
<html lang="en">
<head>
<?php include('head.php');?>
<?php 
    session_start();
    if ($_SESSION["username"]) { 
	  
  ?>

  <title>Next Appointment</title>
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
    $noAppointment = false;
    
    echo '<section>
        <div class="container ml-auto">
            <!-- Appointment Booking Card -->
<div class="row justify-content-start">';
    
    while ($row = mysqli_fetch_assoc($res)) {
        $bookDate = $row['appointment_date'];
        $doctor_id = $row['doctor_id'];		
		$bookTime = $row['appointment_time'];
$bookHour = date('H', strtotime($bookTime));
$bookMinute = date('i', strtotime($bookTime));
        
        date_default_timezone_set('Asia/Kolkata');
        $currentDate = date("d/m/Y");
        
        list($bookDay, $bookMonth, $bookYear) = explode('/', $bookDate);
        $bookMonth = intval($bookMonth); // Convert to integer

        list($currentDay, $currentMonth, $currentYear) = explode('/', $currentDate);
        $currentMonth = intval($currentMonth); // Convert to integer

        $query = "SELECT * FROM doctor_details WHERE doctor_id = '" . $doctor_id . "'";		
        $result = mysqli_query($object->dbConnection(), $query);
        
        if ($row = mysqli_fetch_assoc($result)) {
            $doctorname = $row['doctor_name'];   
			
        } 
		$currentTime = date('g:i a');
$currentHour = date('g');
$currentMinute = date('i');

$bookTimestamp = strtotime("$bookYear-$bookMonth-$bookDay $bookHour:$bookMinute");
$currentTimestamp = strtotime("$currentYear-$currentMonth-$currentDay $currentHour:$currentMinute");

      if ($bookTimestamp >= $currentTimestamp)    {
    // Your code for handling upcoming appointments

    $noAppointment = false;

    echo '<div class="col-md-6 mb-4">
        <div class="card shadow-0 border rounded-3">
            <div class="card-body">
                <h3>Your Next Appointment </h3>
                <h5 class="card-title">Doctor Name: ' . $doctorname . '</h5>
                <h5 class="card-title">Your booking date: ' . $bookDate . '</h5>
                <h5 class="card-subtitle mb-2 text-muted">Your booking time: ' . $bookTime . '</h5>
                <a href="cancel_appointment.php?doctor_id=' . $doctor_id . '&patient_id=' . $patient_id . '&appointment_date=' . $bookDate . '&appointment_time=' . $bookTime . '" class="btn btn-danger">Cancel Booking</a>
            </div>
        </div>
    </div>';
    
    echo '</div>
          </div>
        </section>';
	  }
else {
    $noAppointment = true;
    // This is just for testing, you can replace it with appropriate code
}
}
if($noAppointment = false ){
echo "<h2>No Next Appointment!</h2>";	
}
}


	

?>

</form>
</div>
</div>
  </div>         
        </div>
    </div>
	
	
	<?php include('appointmentscript.php'); ?> 
  
  <div id="footer" class=" fixed-bottom ">
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