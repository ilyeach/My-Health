<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
    session_start();
    if ($_SESSION["username"]) {
      include('head.php'); 

		?> 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyHealth - Your Health Hub</title>
  <!-- Link Bootstrap CSS -->
  
</head>
<style>
/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
    min-height: 84vh;
}

</style>
<body style="background-image: url('images/doc3.jpg'); background-size: cover;">
  <!-- Navigation Bar -->
  <?php include('header.php'); ?>
<?php include ('menu.php');?>
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
?>
<?php
if (isset($_GET['id']) && isset($_GET['success'])) {
    $patient_id = $_GET['id'];
    $success = $_GET['success'];  
echo '<div class="alert alert-success text-center mb-0 d-flex justify-content-center" role="alert" style="width: 1147px;">
    <span class="me-auto"> Message received successfully, we will contact you soon </span>
</div>';	
}
if ( isset($_GET['error'])) { 
echo '<div class="alert alert-success text-center mb-0 d-flex justify-content-center" role="alert" style="width: 1147px;">
    <span class="me-auto">Message not received </span>
</div>';	
}
?>      
<section class="py-5">
    <div class="container">
	
      <h2 class=" mb-5">Contact Us</h2>
      <div class="row">
        <div class="col-md-6">
         <form action="contaction.php" method="post">
 <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">


            <div class="form-group">
              <label for="name">Your Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?php echo $patient_name; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="email">Your Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $email_id; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" rows="5"  name="message" placeholder="Enter your message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
       
      </div>
    </div>
  </section>
  <div id="footer" class=" mt-auto ">
            <!-- Your footer content goes here -->
            <?php include('footer.php'); ?>
        </div>

  <!-- Link Bootstrap JS -->
  
<?php 
  } else {
    header("Location: user_login.php");
    exit();
  }
?>