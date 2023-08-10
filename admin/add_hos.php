<!doctype html>
<html lang="en">
<?php 
    if(!isset($_SESSION))
		{
			session_start();
		}

	if($_SESSION["username"]) { ?>

<?php      include('adminhead.php'); ?>
	         <title>hospital_details.php</title>

<body>
  
<?php 
	       include('adminheader.php'); ?> 
<section style="background-color: #ECFFEC; flex: 1; margin-bottom: 80px; height: 100vh;">
		  <div class="container">
		  <div class="row d-flex justify-content-center align-items-center h-100">
		  <div class="col col-xl-10">
		  <div class="card" style="border-radius: 1rem;">
		  <div class="card-body p-4 p-lg-5 text-black">
		       <h3 class="text-center">Update Hospital Details</h3>
<?php
				$id = $_GET['id'];
				$_SESSION['id'] = $id;
				$sql = "SELECT * FROM hospital_details
				WHERE hospital_id='$id'";
				$res = mysqli_query($object->dbConnection(), $sql);
				

			if ($row = $res->fetch_assoc()) {
				
				$hospitalName = $row['hospital_name'];
				$hospitalEmail = $row['email_id'];
				$hospitalAddress = $row['hospital_address'];
				$location = $row['location'];
				$contactNumber = $row['contact_number'];
				
			} { ?>
<form class="row g-3" action="edit_hospital_details_action.php" method="POST">		

         <div class="col-md-6">
               <label for="hospital_name" class="form-label">Hospital Name</label>
					  <input type="text" class="form-control" name="name" id="hospital_name" value=" <?php echo $hospitalName; ?>" required>
		  </div>
		  <div class="col-12">
			          <label for="inputAddress" class="form-label">Hospital Email</label>
			          <input type="email" class="form-control" name="email" id="inputemail" value="<?php echo $hospitalEmail; ?>" required>
		  </div>
		  <div class="col-12">
			          <label for="inputAddress" class="form-label">Hospital Address</label>
			          <input type="text" class="form-control" name="address" id="inputAddress" value="<?php echo $hospitalAddress; ?>"required>
		  </div>
		  <div class="col-12">
			          <label for="inputlocation" class="form-label">Location</label>
			          <input type="text" class="form-control" name="location" id="inputlocation"  value="<?php echo $location; ?>"required>
		  </div>
<div class="col-md-6">
    <label for="inputcontact" class="form-label">Contact</label>
    <input type="text" class="form-control" name="contact" id="inputcontact" value="<?php echo $contactNumber; ?>" required>
    <br>
</div>



		  <div class="align-self-center mx-auto">
		  <div class="col-12">
			         <button type="submit" class="btn btn-primary" name="update">Update</button>
		 </div>
		 </div>
		  

</form>     
		<?php } ?>
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
<div id="footer" class="bg-light mt-auto fixed-bottom ">
            <!-- Your footer content goes here -->
<?php include('adminfooter.php'); ?>
        </div>	  
<?php } else {
		header("Location:login.php");
	}?>


</body>	
</html>
