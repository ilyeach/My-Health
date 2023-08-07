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
 

<?php include ('menu.php');?>
        <!-- Page Content  -->
       
<?php 
if (isset($_GET['id'])) {
  // Sanitize the input to prevent SQL injection (you should use proper sanitization methods)
  $id = $_GET['id'];
  $query = "SELECT * FROM patient_details WHERE patient_id = '" . $id . "'";
  $result = mysqli_query($object->dbConnection(), $query);
  if ($row = mysqli_fetch_assoc($result)) {
    $patient_id = $row['patient_id'];
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
?><form action="editproaction.php" method="post">
<section class="vh-100" style="background-color: ;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white active"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="images\patient-avatar.png" alt="Avatar" class="img-fluid my-5" style="width: 180px;" />
         <input type="text" class="form-control-sm text-dark" value="<?php echo $patient_name; ?>" name="name">                 
            </div>
			  <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">

            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Information</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <input type="text" class="form-control" value="<?php echo $email_id; ?>" name="email_id">
                  </div>
				  <?php $dob = date('Y-d-m', strtotime($dob)); ?>
                  <div class="col-6 mb-3">
                    <h6>Date of Birth</h6>
                    <input type="date" class="form-control" value="<?php echo $dob; ?>" name="dob">
                  </div>
                </div>
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Mobile</h6>
                    <input type="text" class="form-control" value="<?php echo $contact_number; ?>" name="contact_number">
                  </div>
                  <div class="col-6 mb-3">
  <h6>Gender</h6>
  <select class="form-control-lg" name="gender">
    <option value="male" <?php if ($gender === 'Male') echo 'selected'; ?>>Male</option>
    <option value="female" <?php if ($gender === 'Female') echo 'selected'; ?>>Female</option>
    <option value="other" <?php if ($gender === 'Other') echo 'selected'; ?>>Other</option>
  </select>
</div>
                  <div class="col-6 mb-3">
                    <h6>Address</h6>
                    <textarea class="form-control" name="address"><?php echo $address; ?></textarea>
                  </div>
                </div>
                <h6></h6>
                <hr class="mt-0 mb-4">
                <button class="btn btn-info">Save Changes</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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