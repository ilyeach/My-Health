<!doctype html>
<html lang="en">
<?php 


 ?>

	<?php include('adminhead.php'); ?>
	<title>hospital_details.php</title>

 <body>
  
	<?php 
	include('adminheader.php'); ?>
 
  
<section  style="background-color: #ECFFEC;">
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
         
            
              <div class="card-body p-4 p-lg-5 text-black">
			  <h5 class="text-center">Hospital Details</h5>

           <form class="row g-3" action="post_hospital_details.php" method="POST">
		   
  
  <div class="col-md-6">
    <label for="hospital_name" class="form-label">Hospital Name</label>
    <input type="text" class="form-control" name="hospital_name" id="hospital_name">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Hospital Address</label>
    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="col-12">
    <label for="inputlocation" class="form-label">Location</label>
    <input type="text" class="form-control" name="location" id="inputlocation" placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-md-6">
    <label for="inputcontacy" class="form-label">Contact</label>
    <input type="text" class="form-control" name="contact" id="inputcontact">
	<br>
  </div>

  <div class="align-self-center mx-auto">
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Save</button>
<?php 	if(!isset($_SESSION))
{
	session_start();
}

if (isset($_SESSION['message'])) {
    echo '<script>alert("' . $_SESSION['message'] . '")</script>';
    unset($_SESSION['message']);
} ?>
  </div>
  </div>
</form>     
				

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php include('adminfooter.php'); ?>

</body>	
</html>
