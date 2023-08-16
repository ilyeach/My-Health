<!doctype html>
<html lang="en">
<?php
if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION["username"]) {
    ?>
   
    <?php include('adminhead.php'); ?>
    <title>Today Appointment</title>

 <body style="background-image: url('images/a_bg1.jpg'); background-size: cover;">
    <?php
    include('adminheader.php');
    ?>


    <section>
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <h3 class="text-center">Today Appointment</h3>
                           

                            <div class="table-responsive">
                                <table class="table table-striped mb-4" style="width: 100%;">
                                    <tr>
                                        <th>Appointment Id</th>
                                        <th>Doctor Name</th>
                                        <th>Patient Name</th>
                                        <th>Appointment Date</th>
                                        
                                    </tr>
                                  <?php
if (!isset($_SESSION)) {
    session_start();
}
$sql = "SELECT * FROM `appointment` ";		
 $res = mysqli_query($object->dbConnection(), $sql);
if ($res && mysqli_num_rows($res) > 0) {
	$noAppointment = false;
    // Open the left column container
    while ($row = mysqli_fetch_assoc($res)) {
        $bookDate = $row['appointment_date'];
        $bookTime = $row['appointment_time'];
		$bookHour = date('H', strtotime($bookTime));
$bookMinute = date('i', strtotime($bookTime));
        $appointment_id = $row['appointment_id'];
        $doctor_id = $row['doctor_id'];
        $patient_id = $row['patient_id'];
		date_default_timezone_set('Asia/Kolkata');
		$currentDate = date("d/m/Y");
		
		
		 list($bookDay, $bookMonth, $bookYear) = explode('/', $bookDate);
        $bookMonth = intval($bookMonth); 
		 list($currentDay, $currentMonth, $currentYear) = explode('/', $currentDate);
        $currentMonth = intval($currentMonth); // Convert to integer
		
	$query = "SELECT * FROM doctor_details WHERE doctor_id = '" . $doctor_id . "'";		
  $result = mysqli_query($object->dbConnection(), $query);
  if ($row = mysqli_fetch_assoc($result)) {
    $doctorname = $row['doctor_name'];    
  } 
  $query = "SELECT * FROM patient_details WHERE patient_id = '" . $patient_id . "'";		
  $result = mysqli_query($object->dbConnection(), $query);
  if ($row = mysqli_fetch_assoc($result)) {
    $patientname = $row['patient_name'];    
  $currentTime = date('g:i a');
$currentHour = date('g');
$currentMinute = date('i');
	
	$bookTimestamp = strtotime("$bookYear-$bookMonth-$bookDay $bookHour:$bookMinute");
$currentTimestamp = strtotime("$currentYear-$currentMonth-$currentDay $currentHour:$currentMinute");

 if ($bookDate = $currentDate) {
	 $noAppointment = false;

echo "<tr>
                            <td>" . $appointment_id . "</td>
                            <td>" . $doctorname . "</td>
                            <td>" . $patientname . "</td>
                            <td>" . $bookDate . "</td>
                        </tr>";
    
exit;	
}else{
$noAppointment = true;
}

}
if($noAppointment = true ){exit;
echo "<h2>No Next Appointment!</h2>";	
}
}

?>
</table>

        
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="footer" class=" mt-auto fixed-bottom ">

<?php include('adminfooter.php'); ?>
</div>



    <?php
} }else {
    header("Location: login.php");
	exit;
}
?>


</body>

</html>
