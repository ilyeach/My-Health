  <meta charset="UTF-8">
  <?php
if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION["username"]) {
    ?>
  <?php  include('adminhead.php'); 
  include('adminheader.php'); ?>
  <style>
  
  body {
  background-color: #ECFFEC !important;
}

.form-control:focus {
  box-shadow: none;
  border-color: #BA68C8;
}

.profile-button {
  background: rgb(99, 39, 120);
  box-shadow: none;
  border: none;
}

.profile-button:hover {
  background: #682773;
}

.profile-button:focus {
  background: #682773;
  box-shadow: none;
}

.profile-button:active {
  background: #682773;
  box-shadow: none;
}

.back:hover {
  color: #682773;
  cursor: pointer;
}

.labels {
  font-size: 11px;
}

.add-experience:hover {
  background: #BA68C8;
  color: #fff;
  cursor: pointer;
  border: solid 1px #BA68C8;
}

</style>
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
        width: 200px;
        height: 200px;
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
  $(document).ready(function() {
    var doctorNameInput = document.getElementById('doctor_name');
    doctorNameInput.addEventListener('input', function() {
      var inputValue = doctorNameInput.value;
      doctorNameInput.value = capitalizeFirstLetter(inputValue);
    });

    function capitalizeFirstLetter(string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
    }
  });
</script>



 <!--  <script>
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
  </script> -->
 <body style="background-image: url('images/abg.jpg'); background-size: cover;">

  
 
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
<form class="form-horizontal" action="post_doctor_details.php" method="POST" enctype="multipart/form-data" style="background-color: transparent;">
  <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
      <div class="col-md-3 border-right">
        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
          <div class="picture">
		  
		  

		  
		  
            <img src="./images/logo1.png" class="picture-src rounded-circle" id="wizardPicturePreview" title="">
            <input type="file" name="pic" id="pro">
          </div>
          <span class="font-weight-bold">Upload Doctor Picture</span>
          <span class="text-black-50">thiva@mail.com.my</span><span> </span>
        </div>
      </div>
      <div class="col-md-5 border-right">
        <div class="p-3 py-5">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-right">Doctor Details</h2>
          </div>
          <?php 
            if (isset($_SESSION['message'])) {
              echo '<script>alert("' . $_SESSION['message'] . '")</script>';
              unset($_SESSION['message']);
            }
          ?>
          <div class="row mt-2">
            <div class="col-md-6">
  <label class="labels">Doctor Name</label>
  <input type="text" class="form-control" name="name" id="doctor_name" required>
</div>

            <div class="col-md-6">
              <label class="labels">Degree</label>
              <select class="form-control form-control-lg" name="graduation" id="graduation" required> 
                <option value="">Select</option>
                <option value="BAMS">BAMS</option>
                <option value="BDS, MDS">BDS, MDS</option>
                <option value="MBBS">MBBS</option>
                <option value="DGO.,DNB(OG)">DGO.,DNB(OG)</option>
                <option value="MBBS,MS">MBBS,MS</option>
                <option value="MBBS,MD">MBBS,MD</option>
                <option value="MS.,Mch.,(NS)">MS.,Mch.,(NS)</option>
              </select>
            </div>
          </div>
		
          <div class="row mt-3">
            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="tel" class="form-control" name="mobile" id="inputcontact" required></div>
			
			
            <div class="col-md-12"><label class="labels">Email ID</label><input type="email" class="form-control" name="email" id="email" required></div>
            <div class="col-md-6">
              <label class="labels">Specialist</label>
              <select class="form-control form-control-lg" name="specialist" id="specialist" required>
                <option value="">Select</option>
                <option value="General">General</option>
                <option value="Neurologist">Neurologist</option>
                <option value="Urologist">Urologist</option>
                <option value="Surgeon">Surgeon</option>
                <option value="Cardiologist">Cardiologist</option>
              </select>
            </div>
			<br>
           <div class="col-md-6">
			  <label class="labels">Fees</label>
			  <select class="form-control form-control-lg" name="fees" id="fees" required>
				<option value="">Select</option>
				<option value="500">500</option>
				<option value="600">600</option>
				<option value="700">700</option>
				<option value="800">800</option>
				<option value="900">900</option>
				<option value="1000">1000</option>
				<option value="1200">1200</option>
				<option value="1400">1400</option>
				<option value="1600">1600</option>
			  </select>
				</div>

            
            <div class="col-md-6">
              <label class="labels">Years Of Experience</label>
               
              <select class="form-control form-control-lg" name="experience" id="experience" required>
                <option value="">Select</option>
                <option value="6 months">6 months</option>
                <option value="1 year">1 year</option>
                <option value="2 years">2 years</option>
                <option value="3 years">3 years</option>
                <option value="4 years">4 years</option>
                <option value="5 years">5 years</option>
                <option value="6 years">6 years</option>
                <option value="7 years">7 years</option>
                <option value="8 years">8 years</option>
                <option value="9 years">9 years</option>
                <option value="10 years">10 years</option>
                <option value="11 years">11 years</option>
                <option value="12 years">12 years</option>
                <option value="13 years">13 years</option>
                <option value="14 years">14 years</option>
                <option value="15 years">15 years</option>
              </select>
            </div>
                <br>
            <div class="col-md-6">
			 <br>
  <label class="labels" required>Gender</label>
  <label class="radio-inline"> <input type="radio" name="gender" id="gendermale" value="male"> Male </label>
  <label class="radio-inline"> <input type="radio" name="gender" id="genderfemale" value="female"> Female </label>
</div>


            <div class="col-md-12">
              <label class="labels" required>Status</label>
              <select class="form-control form-control-lg" name="status" id="status">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
            <div class="col-md-12">
              <label class="labels">Address</label>
			  			 <textarea class="form-control" name="address" id="address" rows="4"required></textarea>

            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-6"><label class="labels"></label></div>
            <div class="col-md-6"><label class="labels"></label></div>
          </div>
          <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-3 py-5">
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  function updateRangeValue(value) {
    document.getElementById("range").textContent = value + " &#8377;";
  }

  function updateExperienceValue(value) {
    const years = Math.floor(value / 12);
    const months = value % 12;
    document.getElementById("experience").textContent = years + " years, " + months + " months";
  }
</script>

</div>
</div>
<script>
  // Get the input element
  var inputElement = document.getElementById('inputcontact');
  
  // Listen for input event
  inputElement.addEventListener('input', function(event) {
    var input = event.target.value;
    
    // Remove any non-digit characters from the input
    var digits = input.replace(/\D/g, '');
    
    // Restrict the input to 10 digits
    var limitedDigits = digits.slice(0, 10);
    
    // Update the input value
    inputElement.value = limitedDigits;
  });
</script>


    <div id="footer" class=" mt-auto ">

<?php include('adminfooter.php');} ?>
</div>
  </body>
</html>