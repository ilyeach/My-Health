<!doctype html>
<html lang="en">

<head>
<?php include('head.php');?>
<?php 
    session_start();
    if ($_SESSION["username"]) { 
	  
  ?>

  <title>Profile</title>
    <?php include('header.php'); ?> 
 
</head>
<style>
/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
    min-height: 85vh;
}

</style>
<body style="background-image: url('images/hospital.jpg'); background-size: cover;">
 

<?php include ('menu.php');?>
        <!-- Page Content  -->
 <?php
if (isset($_GET['id']) && isset($_GET['success'])) {
    $patient_id = $_GET['id'];
    $success = $_GET['success'];  
echo '<div class="alert alert-success text-center mb-0 d-flex justify-content-center" role="alert" style="width: 1147px;">
    <span class="me-auto">Profile Details Changed Successfully</span>
</div>';	
}
if ( isset($_GET['error'])) { 
echo '<div class="alert alert-success text-center mb-0 d-flex justify-content-center" role="alert" style="width: 1147px;">
    <span class="me-auto">Profile Details Not Changed </span>
</div>';	
}
?>      
  <?php 
if (isset($_GET['id'])) {
  // Sanitize the input to prevent SQL injection (you should use proper sanitization methods)
  $id = $_GET['id'];
  $query = "SELECT * FROM patient_details WHERE patient_id = '" . $id . "'";
  $result = mysqli_query($object->dbConnection(), $query);
  if ($row = mysqli_fetch_assoc($result)) {
    $patient_name = $row['patient_name'];
    $email_id = $row['email_id'];
    $dob = $row['dob'];
    $gender = $row['gender'];
    $address = $row['address'];
    $contact_number = $row['contact_number'];
  } else {
    echo "Patient not found!";
    // If the patient is not found, you might want to handle this case, e.g., redirect to an error page.
    exit; // Stop execution since patient not found.
  }
}
?>

<section class="vh-100">
    <div class="container h-100 mt-5">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white active"
                            style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <img src="images/patient-avatar.png" alt="Avatar" class="img-fluid my-5" style="width: 180px;" />
                            <h5><?php echo $patient_name; ?></h5>
                            <p><?php echo $patient_name; ?></p>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Information</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Email</h6>
                                        <p class="text-muted"><?php echo $email_id; ?></p>
                                    </div>
                                    <?php $dob = date('d-m-Y', strtotime($dob)); ?>
                                    <div class="col-6 mb-3">
                                        <h6>Date of Birth</h6>
                                        <p type="date" class="text-muted"><?php echo $dob; ?></p>
                                    </div>
                                </div>
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Mobile</h6>
                                        <p class="text-muted"><?php echo $contact_number; ?></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Gender</h6>
                                        <p class="text-muted"><?php echo $gender; ?></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Address</h6>
                                        <p class="text-muted"><?php echo $address; ?></p>
                                    </div>
                                </div>
                                <h6></h6>
                                <hr class="mt-0 mb-4">
                                <a href="editpro.php?id=<?php echo $patient_id; ?>" class="btn btn-info">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






	
	<?php include('appointmentscript.php'); ?> 
  
  <div id="footer" class="fixed-bottom ">
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