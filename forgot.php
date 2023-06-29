<!doctype html>
<html lang="en">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include jQuery UI library -->
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>

<!-- Include jQuery UI CSS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css">

<?php 


      include('admin/adminhead.php'); ?>
	           <title>Enter New Password</title>

<body>
 <?php 
	   include('header.php'); 
	   
				if(isset($_GET['invalid'] ) && ($_GET['invalid'] == 1)  ){
		            echo '<div class="alert alert-danger text-center" role="alert"> Input Value Incorrect </div>';
				}
				   ?>
<section style="background-color: #ECFFEC; flex: 1; margin-bottom: 80px; height: 100vh;">
			   <div class="container">
			   <div class="row d-flex justify-content-center align-items-center h-100">
			   <div class="col col-xl-10">
			   <div class="card" style="border-radius: 1rem;">
			   <div class="card-body p-4 p-lg-5 text-black">
					<h3 class="text-center">Sign Up</h3>
<form action="forgotaction.php" method="POST">
				<div class="row">
                
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
			        <label class="form-label" for="password">New Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg" required>
                  </div>

                </div>
              </div>
			  <div class="row">
                
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
			        <label class="form-label" for="password">Re-enter New Password</label>
                    <input type="password" name="newpassword" id="newpassword" class="form-control form-control-lg" required>
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
