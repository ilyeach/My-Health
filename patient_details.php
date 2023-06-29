<!doctype html>
<html lang="en">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include jQuery UI library -->
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>

<!-- Include jQuery UI CSS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css">
<script>
  $(function() {
    $("#birthdayDate").datepicker({
      dateFormat: "dd/mm/yy",
      changeYear: true,
      yearRange: "1900:2030" 
    });
  });
</script>
<?php 


      include('admin/adminhead.php'); ?>
	           <title>Patient Details</title>
<body>
 <?php 
	   include('header.php'); ?>
	   <?php 
			  if(isset($_GET['reg'] ) && ($_GET['reg'] == 1)  ){
		            echo '<div class="alert alert-success text-center" role="alert"> Patient Details Registered Successfully </div>';
			   }elseif(isset($_GET['error'] ) && ($_GET['error'] == 1)  ){
		            echo '<div class="alert alert-danger text-center" role="alert"> Patient Details Not Registered  </div>';
			   }
				   ?>
				 <?php 
			  if(isset($_GET['er'] ) && ($_GET['er'] == 1)  ){ 
		            echo '<div class="alert alert-danger text-center" role="alert"> email already exists </div>';
			   } ?>
<section style="background-color: #ECFFEC; flex: 1; margin-bottom: 80px; height: 100vh;">
			   <div class="container">
			   <div class="row d-flex justify-content-center align-items-center h-100">
			   <div class="col col-xl-10">
			   <div class="card" style="border-radius: 1rem;">
			   <div class="card-body p-4 p-lg-5 text-black">
					<h3 class="text-center">Sign Up</h3>
<form action="post_patient_details.php" method="POST">
	<div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="firstName">Patient Name</label>
                    <input type="text" name="name" id="firstName" class="form-control form-control-lg" required>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
					<label class="form-label" for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 ">
			  <label class="form-label" for="username">User Name</label>
			  <input type="tel" name="username" id="username" class="form-control form-control-lg" required>
				</div>
                <div class="col-md-6 mb-4">
                  <h6 class="mb-2 pb-1" required>Gender: </h6>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="grnder" id="femaleGender"
                      value="Female" checked />
                    <label class="form-check-label" name="grnder" for="femaleGender">Female</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="grnder" id="maleGender"
                      value="Male" />
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="grnder" id="otherGender"
                      value="Other" />
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                 <div class="form-outline">
				  <div class="form-outline datepicker w-100">
    <label for="birthdayDate" class="form-label">Date Of Birth</label>
    <input type="text" class="form-control form-control-lg" name="dob" id="birthdayDate" required>
  </div> 
</div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
			        <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg" required>
                  </div>

                </div>
              </div>
					 <div class="row">
					  <div class="col-12">
						<div class="form-outline">
						  <div class="form-outline">
						  <label class="form-label" for="phoneNumber">Phone Number</label>
						  <input type="tel" name="contact" id="phoneNumber" class="form-control form-control-lg" required pattern="\d{10}" maxlength="10">
						</div>
						</div>
					  </div>
					</div>				
					<div class="row">
					  <div class="col-12">
						<div class="form-outline">
						<label class="form-label" for="address">Address</label>
			  			 <textarea class="form-control" name="address" id="address" rows="4"required></textarea>
						</div>
					  </div>
					</div>
				  <div class="mt-4 pt-2">
				  <div class="d-flex justify-content-center">
					<input class="btn btn-primary btn-lg" type="submit" value="Submit" />
				  </div>
				</div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php include('footer.php'); ?>


</body>	
</html>
