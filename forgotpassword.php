<!doctype html>
<html lang="en">
	           <title>Forgot Password</title>
<body style="background-image: url('images/hospital.jpg'); background-size: cover;">
 <?php include('head.php');
	   include('header.php'); ?>				
<section>
  <div class="container ">
    <div class="row justify-content-start">
      <div class="col col-xl-10 offset-md-1"> 
        <div class="card-body p-4 p-lg-5 text-black" style="margin-top: 50px;">
          <h3 class="text-center">Sign Up</h3>
          <form action="forgotactoion.php" method="POST">
            <div class="row justify-content-center"> <!-- Center the input boxes -->
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <label class="form-label" for="email">Email</label>
                  <input type="email" name="email"placeholder="Enter Your Email Id" id="email" class="form-control form-control-lg" required>
                </div>
              </div>
            </div>
            <div class="row justify-content-center"> <!-- Center the input boxes -->
              <div class="col-md-6 mb-4 pb-2">
                <div class="form-outline">
                  <div class="form-outline datepicker w-100">
                    <label for="birthdayDate" class="form-label">Date Of Birth</label>
                    <input type="text" class="form-control form-control-lg" name="dob" id="birthdayDate" placeholder="Enter Your Date Of Birth" required>
                  </div>
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
</section>



<div id="footer" class=" mt-auto fixed-bottom ">
            <!-- Your footer content goes here -->
            <?php include('footer.php'); ?>
        </div>


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
</body>	
</html>
