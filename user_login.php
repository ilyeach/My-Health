<!doctype html> 
<html lang="en">
<style>
.input-group {
    position: relative;
}

.input-group-append {
    position: absolute;
    right: 0;
    top: 0;
    bottom: 0;
    z-index: 2;
    padding: 0;
}

.input-group-append .btn {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
.custom-input {
    width: 20px; /* Adjust the width value as desired */
}

</style>
<?php 


	session_start();
	if(@$_SESSION["username"]){
		
	}
 ?>

	<?php include('admin/adminhead.php'); ?>
	<title>User</title>

 <body>
  
	<?php 
	include('header.php'); ?>
 <?php 
	
			  if(isset($_GET['done'] ) && ($_GET['done'] == 1)  ){
		            echo '<div class="alert alert-success text-center" role="alert"> Password Changed Successfully </div>';
			   }elseif(isset($_GET['invalid'] ) && ($_GET['invalid'] == 1)  ){
		            echo '<div class="alert alert-danger text-center" role="alert"> Input Value Incorrect </div>';
			   }
				   ?>
  
<section  style="background-color: #ECFFEC;">
       <div class="container">
       <div class="row d-flex justify-content-center align-items-center h-100">
       <div class="col col-xl-10">
       <div class="card" style="border-radius: 1rem;">
       <div class="row g-0">
       <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="admin/images/doc.jpg"   alt="login form" class="bg-image"  style=".bg-image" height= 600px />
       </div>
       <div class="col-md-6 col-lg-7 d-flex align-items-center">
       <div class="card-body p-4 p-lg-5 text-black"> 
<form class="signin-form" action="login_submit.php" method="POST"  >
       <div class="d-flex align-items-center mb-3 pb-1">
       <span class="h1 fw-bold mb-0"></span>
       </div>
       <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
       <div class="form-group">
	   
			  <?php 
			  if(isset($_GET['error'] ) && ($_GET['error'] == 1)  ){ ?>
			       <p> 
			  <?php 
                     echo '<div class="alert alert-danger" role="alert"> Username Or Password is incorrect </div>';
 	           ?>
		           </p>

			  <?php }?>
			  
               <input type="text" class="form-control" placeholder="Username" name="username" required>
        </div>
    <div class="input-group mb-3">
    <input id="pass_log_id" type="password" class="form-control" style="width: 421px;" placeholder="Password" name="password" required>
    <div class="input-group-append">
    <a class="btn btn-secondary" type="submit" style="outline: none;" >
      <span class="group">
        <i class="fa fa-fw fa-eye field_icon toggle-password"></i>
      </span>
    </a>
  </div>
</div>	
        <div class="form-group">
                <button type="submit" name="signin" class="form-control btn btn-primary submit px-3">Sign In</button>
        </div>
        <div class="form-group d-md-flex">
        <div class="w-50">
                <a href="http://localhost/myhealth/project/patient_details.php" class="checkbox-wrap checkbox-primary">Sign Up
               
                </a>
        </div>
        <div class="w-50 text-md-right">
                <a href="forgotpassword.php" style="color: #fff">Forgot Password</a>
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


<?php include('admin/adminfooter.php'); ?>

</body>	
</html>
