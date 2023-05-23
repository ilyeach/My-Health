<!doctype html>
<html lang="en">
  <head>

 <?php include('head.php'); ?>
<title>Login</title>

</head>

<body>
  <div id="header">
	<?php include('header.php'); ?>
  </div>

<section class="ftco-section">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 text-center mb-5">
<h2 class="heading-section">Login</h2>
</div>
</div>
<div class="row justify-content-center">
<div class="col-md-12 col-lg-10">
<div class="wrap d-md-flex">
<div ><img class="navbar-brand" src="images/doc.jpg" width="400" height="430"/>
</div>
<div class="login-wrap p-4 p-md-5">
<div class="d-flex">
<div class="w-100">
<h3 class="mb-4">Sign In</h3>
</div>
</div>
<form action="#" class="signin-form">
<div class="form-group mb-3">
<label class="label" for="name">Username</label>
<input type="text" class="form-control" placeholder="Username" required="">
</div>
<div class="input-group mb-3">
<input id="pass_log_id" type="password" class="form-control" placeholder="Password" required="">
<button class="btn btn-outline-secondary" type="button" id="button-addon2"><span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span></button>

</div>
<div class="form-group">
<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
</div>
<div class="form-group d-md-flex">
<div class="w-50 text-left">
<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
<input type="checkbox" checked="">
<span class="checkmark"></span>
</label>
</div>
<div class="w-50 text-md-right">
<a href="#">Forgot Password</a>
</div>
</div>
</form>
<p class="text-center">Not a member? <a data-toggle="tab" href="#signup">Sign Up</a></p>
</div>
</div>
</div>
</div>
</div>
</section>


</body>

	
	<div id="footer">
<?php include('footer.php'); ?>
 </div>
</html>