<!doctype html>
<html lang="en">
<?php 
include('db.php'); 
$object = new database();
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
 <h5 class="text-center">Update Hospital Details</h5>
 <?php 


		 $id = $_GET['id'];
		$_SESSION['id'] = $id;
		
    $sql =("SELECT * FROM hospital_info WHERE id='$id'");
    $res = mysqli_query($object->dbConnection(), $sql);
	
	
	if ($row = $res->fetch_assoc()) {
    $hospitalName = $row['hospital_name'];
    $hospitalAddress = $row['hospital_address'];
    $location = $row['location'];
    $contactNumber = $row['contact_number'];
} { ?>
<form class="row g-3" action="edit_hospital_details_action.php" method="POST">		

  <div class="col-md-6">
      <label for="hospital_name" class="form-label">Hospital Name</label>
      <input type="text" class="form-control" name="name" id="hospital_name" value=" <?php echo $hospitalName; ?>">
  </div>
  <div class="col-12">
      <label for="inputAddress" class="form-label">Hospital Address</label>
      <input type="text" class="form-control" name="address" id="inputAddress" value="<?php echo $hospitalAddress; ?>">
  </div>
  <div class="col-12">
    <label for="inputlocation" class="form-label">Location</label>
    <input type="text" class="form-control" name="location" id="inputlocation"  value="<?php echo $location; ?>">
  </div>
  <div class="col-md-6">
    <label for="inputcontacy" class="form-label">Contact</label>
    <input type="text" class="form-control" name="contact" id="inputcontact" value="<?php echo $contactNumber; ?>">
	<br>
  </div>

  <div class="align-self-center mx-auto">
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Update</button>
	<button type="submit" class="btn btn-danger">Delete</button>
	
	
	
	
  </div>
  </div>
</form>     
		<?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    
</section>			  
<?php include('adminfooter.php'); ?>

</body>	
</html>
