<!DOCTYPE html>
<html lang="en">
<head>
  <title>doctor_details.php</title>
  <?php 
  if (!isset($_SESSION)) {
    session_start();
  }
  include('../adminhead.php'); 
  ?>

  <style>
  .container {
    max-width: 100%;
    overflow-x: hidden;
  }

  section {
    /* Add this style to limit the section height to the viewport */
    height: calc(100vh - 80px);
  }
  
     .picture-container {
    position: relative;
    cursor: pointer;
    text-align: center;
    float: left; /* Add this line to position the container to the left */
  }
    .picture {
      width: 106px;
      height: 106px;
      background-color: #999999;
      border: 4px solid #CCCCCC;
      color: #FFFFFF;
      border-radius: 50%;
      margin: 0px auto;
      overflow: hidden;
      transition: all 0.2s;
      -webkit-transition: all 0.2s;
    }

    .picture:hover {
      border-color: #2ca8ff;
    }

    .content.ct-wizard-green .picture:hover {
      border-color: #05ae0e;
    }

    .content.ct-wizard-blue .picture:hover {
      border-color: #3472f7;
    }

    .content.ct-wizard-orange .picture:hover {
      border-color: #ff9500;
    }

    .content.ct-wizard-red .picture:hover {
      border-color: #ff3b30;
    }

    .picture input[type="file"] {
      cursor: pointer;
      display: block;
      height: 100%;
      left: 0;
      opacity: 0 !important;
      position: absolute;
      top: 0;
      width: 100%;
    }

    .picture-src {
      width: 100%;
    }
  </style>

  <script>
    $(document).ready(function(){
      // Prepare the preview for profile picture
      $("#pro").change(function(){
        readURL(this);
      });
    });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
</head>

<body>
  <?php include('../adminheader.php'); ?>

  <?php 
  if (isset($_GET['reg']) && ($_GET['reg'] == 1)) {
    echo '<div class="alert alert-success text-center" role="alert">Doctor Details Registered Successfully</div>';
  } elseif (isset($_GET['error']) && ($_GET['error'] == 1)) {
    echo '<div class="alert alert-danger text-center" role="alert">Doctor Details Not Registered</div>';
  }

  if (isset($_GET['er']) && ($_GET['er'] == 1)) {
    echo '<div class="alert alert-danger text-center" role="alert">Email already exists</div>';
  }
  ?>

<section style="background-image: url('../images/doc1.jpg'); flex: 1; margin-bottom: 80px; height: 70vh;">  
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="card-body p-4 p-lg-5 text-black">
              <h3 class="text-center">Doctor Details</h3>
              <?php 
              if (isset($_SESSION['message'])) {
                echo '<script>alert("' . $_SESSION['message'] . '")</script>';
                unset($_SESSION['message']);
              } ?>
<form class="form-horizontal" action="post_doctor_details.php" method="POST" enctype="multipart/form-data" style="background-color: transparent;">                <div class="container d-flex justify-content-center">
                  <!-- Profile Picture -->
                  <div class="picture-container d-flex justify-content-center align-items-center">
                    <div class="picture">
                      <img src="" class="picture-src" id="wizardPicturePreview" title="">
                      <input type="file" name="pic" id="pro">
                    </div>
                    <h6 class="text-center">Choose Picture</h6>
                  </div>
                </div>
				<br>
				<br>

                <div class="row">
                  <!-- Doctor Name -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label col-sm-4">Doctor Name</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" id="doctor_name" required>
                      </div>
                    </div>
                  </div>

                  <!-- Graduation Status -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label col-sm-4">Graduation Status</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="graduation" id="graduation" required>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <!-- Email ID -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label col-sm-4">Email ID</label>
                      <div class="col-sm-8">
                        <input type="email" class="form-control" name="email" id="email" required>
                      </div>
                    </div>
                  </div>

                  <!-- Mobile -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label col-sm-4">Mobile</label>
                      <div class="col-sm-8">
  <input type="text" pattern="\d{10}" title="Please enter a 10-digit number" required>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <!-- Address -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label class="control-label col-sm-2">Address</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" id="address" required>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <!-- Specialist -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Specialist</label>
                      <div class="col-sm-8">
                        <select class="form-control form-control-lg" name="specialist" id="specialist" required>
						<option value="">Select</option>
                          <option value="general">General</option>
                          <option value="neurologist">Neurologist</option>
                          <option value="urologist">Urologist</option>
                          <option value="surgeon">Surgeon</option>
                          <option value="cardiologist">Cardiologist</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <!-- Fees -->
                   <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Fees</label>
                      <div class="col-sm-8">
                        <select class="form-control form-control-lg" name="fees" id="fees" required>
                          <option value="">Select</option>
                          <option value="500">500</option>
                          <option value="1000">1000</option>
                          <option value="1500">1500</option>
                          <option value="2000">2000</option>
                          <option value="2500">2500</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <!-- Years Of Experience -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Years Of Experience</label>
                      <div class="col-sm-8">
                        <select class="form-control form-control-lg" name="experience" id="experience" required>
                          <option value="">Select</option>
                          <option value="2 ">2 years</option>
                          <option value="3">3 years</option>
                          <option value="4">4 years</option>
                          <option value="5">5 years</option>
                          <option value="6">6 years</option>
                          <option value="7-10">7-10 years</option>
                          <option value="10-13">10-13 years</option>
                          <option value="13-15">13-15 years</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <!-- Gender -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 control-label" required>Gender</label>
                      <div class="col-sm-8">
                        <label class="radio-inline"> <input type="radio" name="gender" id="gendermale" value="male"> Male </label>
                        <label class="radio-inline"> <input type="radio" name="gender" id="genderfemale" value="female"> Female </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <!-- Status -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Status</label>
                      <div class="col-sm-8">
                        <select class="form-control form-control-lg" name="status" id="status">
                          <option value="active">active</option>
                          <option value="inactive">inactive</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 d-flex justify-content-center"> 
                    <div>
                      <button class="btn btn-primary waves-effect waves-light" id="btn-submit">Save</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<script>
  // Validate the contact number input
  document.getElementById('inputcontact').addEventListener('input', function() {
    var inputValue = this.value.replace(/\D/g, ''); // Remove non-digit characters
    if (inputValue.length > 10) {
      inputValue = inputValue.slice(0, 10); // Keep only the first 10 digits
    }
    this.value = inputValue;
  });
</script>

    <footer style="background-color: #f8f9fa; padding: 5px; position: fixed; bottom: 0; width: 100%;">
        <!-- Add your footer content here -->
        <?php include('../adminfooter.php'); ?>
    </footer>
  </body>
</html>