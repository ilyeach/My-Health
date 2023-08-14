<!doctype html>
<html lang="en">
<?php 

	if(!isset($_SESSION))
   {
	session_start();
   }
	if($_SESSION["username"]) 
   {  
      include('adminhead.php'); ?>
	           <title>hospital_details.php</title>

 <body style="background-image: url('images/a_bg1.jpg'); background-size: cover;">

 <?php 
	   include('adminheader.php'); ?>
	   <?php 
	
			  if(isset($_GET['reg'] ) && ($_GET['reg'] == 1)  ){
		            echo '<div class="alert alert-success text-center" role="alert"> Hospital Details Registered Successfully </div>';
			   }elseif(isset($_GET['error'] ) && ($_GET['error'] == 1)  ){
		            echo '<div class="alert alert-danger text-center" role="alert"> Hospital Details Not Registered  </div>';
			   }
				   ?>
				 <?php 
			  if(isset($_GET['er'] ) && ($_GET['er'] == 1)  ){ 
		            echo '<div class="alert alert-danger text-center" role="alert"> email already exists </div>';
			   } ?>
<section >
			   <div class="container">
			   <div class="row d-flex justify-content-center align-items-center h-100">
			   <div class="col col-xl-10">
			   <div class="card" style="border-radius: 1rem;">
			   <div class="card-body p-4 p-lg-5 text-black">
					<h3 class="text-center">Hospital Details</h3>
<form action="post_hospital_details.php" method="POST">
	<div class="container ">
		<div class="row">
			<div class="col-md-6">
				<label for="hospital_name" class="form-label">Hospital Name</label>
				<input type="text" class="form-control" name="hospital_name" id="hospital_name" required>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label for="inputEmail" class="form-label">Hospital Email</label>
				<input type="email" class="form-control" name="email" id="inputEmail" placeholder="abc@email.com" required>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label for="inputAddress" class="form-label">Hospital Address</label>
				<input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St" required>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label for="inputlocation" class="form-label">Location</label>
				<input type="text" class="form-control" name="location" id="inputlocation" placeholder="Apartment, studio, or floor" required>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label for="inputcontact" class="form-label">Contact</label>
				<input type="text" class="form-control" name="contact" id="inputcontact" required>
			</div>
		</div>
		<div class="text-left mt-3">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
</form>




						

				 </div>
				 </div>
				 </div>
				 </div>
				 </div>
				 </div>
				 <script>
    // Validate the contact number input
    document.getElementById('inputcontact').addEventListener('input', function() {
        var inputValue = this.value.replace(/[^0-9]/g, ''); // Remove non-digit characters
        if (inputValue.length > 10) {
            inputValue = inputValue.slice(0, 10); // Keep only the first 10 digits
        }
        this.value = inputValue;
    });
</script>
</section>


<?php include('adminfooter.php'); ?>
<?php } else {
		header("Location: login.php");
	}?>

</body>	
</html>
