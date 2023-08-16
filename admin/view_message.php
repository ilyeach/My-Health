<!doctype html>
<html lang="en">
<?php
if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION["username"]) {
    ?>
   
    <?php include('adminhead.php'); ?>
    <title>Message</title>

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
                            <h3 class="text-center">Message</h3>
                           

                            <div class="table-responsive">
                                <table class="table table-striped mb-4" style="width: 100%;">
                                    <tr>
                                        <th> Id</th>
                                        <th>Patient Name</th>
                                        <th>Emai</th>
                                        <th>Message</th>
                                        
                                    </tr>
                                  <?php
if (!isset($_SESSION)) {
    session_start();
}
$sql = "SELECT * FROM `report_details` ";		
 $res = mysqli_query($object->dbConnection(), $sql);
if ($res && mysqli_num_rows($res) > 0) {
	$noAppointment = false;
    // Open the left column container
    while ($row = mysqli_fetch_assoc($res)) {
        $rep_id = $row['rep_id'];
        $patient_id = $row['patient_id'];
        $patient_name = $row['patient_name'];
        $email_id = $row['email_id'];
        $message = $row['message'];
        $created_at = $row['created_at'];
	    
		$currentDate = date("d/m/Y");
	
	
 if ($created_at = $currentDate) {
	 $noAppointment = false;

echo "<tr>
                            <td>" . $rep_id . "</td>
                            <td>" . $patient_name . "</td>
                            <td>" . $email_id . "</td>
                            <td>" . $message . "</td>
                        </tr>";
    
exit;	
}else{
$noAppointment = true;
}

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
} else {
    header("Location: login.php");
	exit;
}
?>


</body>

</html>
