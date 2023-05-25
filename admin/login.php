<!doctype html>
<html lang="en">
 <head>
 <style>

</style>
<div id="head">

 
 <?php include('adminhead.php'); ?>
 </div>
<title>admin</title>

</head
 <body>
  <div id="header">
	<?php include('adminheader.php'); ?>
  </div>

<section  style="background-color: #ECFFEC  ;">
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="../images/doc.jpg"   alt="login form" class="bg-image"  style=".bg-image" height= 600px />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="#" class="signin-form">
				 <div class="d-flex align-items-center mb-3 pb-1">
                    
                    <span class="h1 fw-bold mb-0"></span>
                  </div>
				  

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your admin account</h5>
<div class="form-group">
<input type="text" class="form-control" placeholder="Username" required="">
</div>
<div class="input-group mb-3">
<input id="pass_log_id" type="password" class="form-control" placeholder="Password" required="">
<span class="input-group-text"><i class="fa fa-fw fa-eye field_icon toggle-password"></i></span>
</div>
<div class="form-group">
<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
</div>
<div class="form-group d-md-flex">
<div class="w-50">
<label class="checkbox-wrap checkbox-primary">Remember Me
<input type="checkbox" checked="">
<span class="checkmark"></span>
</label>
</div>
<div class="w-50 text-md-right">
<a href="#" style="color: #fff">Forgot Password</a>
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

<div id="footer">

 
 <?php include('adminfooter.php'); ?>
 </div>
</body>

	
	
</html>
