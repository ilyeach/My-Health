<!doctype html>
<html lang="en">




	           <title>Forgot Password</title>
<body>
 <?php include('head.php');
	   include('header.php'); ?>
	   
				
<section style="background-color: #ECFFEC; flex: 1; margin-bottom: 80px; height: 100vh;">
			   <div class="container">
			   <div class="row d-flex justify-content-center align-items-center h-100">
			   <div class="col col-xl-10">
			   <div class="card" style="border-radius: 1rem;">
			   <div class="card-body p-4 p-lg-5 text-black">
					<h3 class="text-center">Sign Up</h3>
<form action="forgotactoion.php" method="POST">
	<div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
					<label class="form-label" for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg" required>
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
