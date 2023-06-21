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
    background: rgb(99, 39, 120)
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
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
  function checkValidity(input) {
  input.setCustomValidity('');
  if (!input.checkValidity()) {
    input.setCustomValidity('Please select a valid value.');
  }
}

function updateRangeValue(value) {
  var outputElement = document.getElementById("range");
  outputElement.innerHTML = value + " &#8377;";
  checkValidity(outputElement);
}

function updateExperienceValue(value) {
  var years = Math.floor(value / 12);
  var months = value % 12;

  var outputElement = document.getElementById("experience");
  outputElement.innerHTML = years + " years, " + months + " months";
  checkValidity(outputElement);
}

</script>
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
  <body>
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
            <img src="./images/logo1.png" class="picture-src rounded-circle" id="wizardPicturePreview" title="" required>
            <input type="file" name="pic" id="pro" required>
          </div>
          <span class="font-weight-bold">Upload Doctor Picture</span>
          <span class="text-black-50">edogaru@mail.com.my</span><span> </span>
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
            <div class="col-md-6"><label class="labels">Doctor Name</label><input type="text" class="form-control" name="name" id="doctor_name" required></div>
            <div class="col-md-6">
              <label class="labels">Degree</label>
              <select class="form-control form-control-lg" name="graduation" id="graduation" required> 
                <option value="">Select</option>
                <option value="bams">BAMS</option>
                <option value="mbbs">MBBS</option>
                <option value="mbbs,ms">MBBS,MS</option>
                <option value="mbbs,md">MBBS,MD</option>
              </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="tel" class="form-control" name="mobile" id="inputcontact" required></div>
            <div class="col-md-12"><label class="labels">Email ID</label><input type="email" class="form-control" name="email" id="email" required></div>
            <div class="col-md-12">
              <label class="labels">Specialist</label>
              <select class="form-control form-control-lg" name="specialist" id="specialist" required>
                <option value="">Select</option>
                <option value="general">General</option>
                <option value="neurologist">Neurologist</option>
                <option value="urologist">Urologist</option>
                <option value="surgeon">Surgeon</option>
                <option value="cardiologist">Cardiologist</option>
              </select>
            </div>
            <div class="col-md-12">
              <label class="labels">Fees</label>
                <div class="range">
                <input type="range" name="range" min="150" max="5000" value="50" onchange="updateRangeValue(this.value)" required>
                <output id="range">100 &#8377;</output>
              </div>
            </div>
            <div class="col-md-12">
              <label class="labels">Years Of Experience</label>
              <div class="range">
                <input type="range" name="experience" min="0" max="360" value="0" onchange="updateExperienceValue(this.value)" required>
                <output id="experience">0 years, 0 months</output>
              </div>
            </div>
            <div class="col-md-12">
              <label class="labels" required>Gender</label>
              <label class="radio-inline"> <input type="radio" name="gender" id="gendermale" value="male"> Male </label>
              <label class="radio-inline"> <input type="radio" name="gender" id="genderfemale" value="female"> Female </label>
            </div>
            <div class="col-md-12">
              <label class="labels" required>Status</label>
              <select class="form-control form-control-lg" name="status" id="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
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
          <img src="./images/doc2.jpeg" alt="Image" style="width: 350px; height: 600px;">
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


    <footer style="background-color: #f8f9fa; padding: 5px;  bottom: 0; width: 100%;">
        <!-- Add your footer content here -->
        <?php 		

include('adminfooter.php'); } ?>
    </footer>
  </body>
</html>