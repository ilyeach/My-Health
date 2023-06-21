  <meta charset="UTF-8">
  <?php 
  if (!isset($_SESSION)) {
    session_start();
  }
  include('adminhead.php'); 
  
  ?>
   <style>
  
 body {
    background-color: rgb(99, 39, 120) !important;
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
  function updateRangeValue(value) {
    var outputElement = document.getElementById("range");
    outputElement.innerHTML = value + " &#8377;";
  }
</script>
<script>
    function updateExperienceValue(value) {
        var years = Math.floor(value / 12);
        var months = value % 12;

        var outputElement = document.getElementById("experience");
        outputElement.innerHTML = years + " years, " + months + " months";
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

  </script>
  <body>
  <?php 
  if (!isset($_SESSION)) {
    session_start();
  }

  if ($_SESSION["username"]) {
    include('db.php');
    $object = new database();
    include('adminhead.php');
  ?>
  <?php include('adminheader.php'); ?>

  <?php 
 $id = $_GET['id'];
 
    $_SESSION['id'] = $id;
    $sql = "SELECT * FROM doctor_details WHERE doctor_id='$id'";
    $res = mysqli_query($object->dbConnection(), $sql);

    if ($row = $res->fetch_assoc()) {
      $doctor_name = $row['doctor_name'];
      $doctor_graduation = $row['graduation_status'];
      $doctor_gender = $row['gender'];
      $doctor_email = $row['email_id'];
      $doctor_mobile = $row['mobile'];
      $doctor_address = $row['address'];
      $doctor_specialist = $row['specialist'];
      $doctor_fees = $row['fees'];
      $doctor_experience = $row['experience'];
      $status = $row['status'];
      $imageURL = $row['profile_photo'];
	
	  
  ?>  
<form class="form-horizontal" action="edit_doctor_details_action.php" method="POST" enctype="multipart/form-data" style="background-color: transparent;">
  <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
      <div class="col-md-3 border-right">
        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                              <div class="picture">
                      <img src=" <?php echo $imageURL; ?>" class="picture-src" id="wizardPicturePreview" title="">
                      <input type="file" name="pic" id="pro">
                    </div>
          <span class="font-weight-bold">Upload Doctor Picture</span>
          <span class="text-black-50">edogaru@mail.com.my</span><span> </span>
        </div>
      </div>
      <div class="col-md-5 border-right">
        <div class="p-3 py-5">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-right">Edit Doctor Details</h2>
          </div>
          <?php 
            if (isset($_SESSION['message'])) {
              echo '<script>alert("' . $_SESSION['message'] . '")</script>';
              unset($_SESSION['message']);
            }
          ?>
          <div class="row mt-2">
            <div class="col-md-6"><label class="labels">Doctor Name</label><input type="text" class="form-control" name="name" id="doctor_name"  value=<?php echo $doctor_name;?> required></div>
            <div class="col-md-6">
              <label class="labels">Degree</label>
              <select class="form-control form-control-lg" name="graduation" id="graduation" required> 
                <option value="">Select</option>
                <option value="bams" <?php if ($doctor_graduation == 'bams') echo 'selected'; ?>>BAMS</option>
                <option value="mbbs" <?php if ($doctor_graduation == 'mbbs') echo 'selected'; ?>>MBBS</option>
                <option value="mbbs,ms" <?php if ($doctor_graduation == 'mbbs,ms') echo 'selected'; ?>>MBBS,MS</option>
                <option value="mbbs,md" <?php if ($doctor_graduation == 'mbbs,md') echo 'selected'; ?>>MBBS,MD</option>
              </select>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="tel" class="form-control" name="mobile" id="inputcontact"  value=<?php echo $doctor_mobile; ?> required></div>
            <div class="col-md-12"><label class="labels">Email ID</label><input type="email" class="form-control" name="email" id="email" value=<?php echo $doctor_email; ?> required></div>
            <div class="col-md-12">
              <label class="labels">Specialist</label>
              <select class="form-control form-control-lg" name="specialist" id="specialist" required>
                <option value="">Select</option>
                <option value="general" <?php if ($doctor_specialist == 'general') echo 'selected'; ?>>General</option>
                <option value="neurologist" <?php if ($doctor_specialist == 'neurologist') echo 'selected'; ?>>Neurologist</option>
                <option value="urologist"<?php if ($doctor_specialist == 'urologist') echo 'selected'; ?>>Urologist</option>
                <option value="surgeon" <?php if ($doctor_specialist == 'surgeon') echo 'selected'; ?>>Surgeon</option>
                <option value="cardiologist" <?php if ($doctor_specialist == 'cardiologist') echo 'selected'; ?>>Cardiologist</option>
              </select>
            </div>
            <div class="col-md-12">
              <label class="labels">Fees</label>
                <div class="range">
                <input type="range" name="range" min="150" max="5000" value=" <?php echo $doctor_fees; ?>" onchange="updateRangeValue(this.value)" required>
                <output id="range"><?php echo $doctor_fees; ?>  &#8377;</output>
              </div>
            </div>
            <div class="col-md-12">
             <label class="labels">Years Of Experience</label>
			<div class="range">
				<?php
        $years = floor($doctor_experience / 12); // Calculate years
        $months = $doctor_experience % 12; // Calculate remaining months
        ?>
        <input type="range" name="experience" min="0" max="360" value="<?php echo isset($doctor_experience) ? $doctor_experience : 0; ?>" onchange="updateExperienceValue(this.value)" required>
        <output id="experience">
            <?php
            echo $years . " year(s), " . $months . " month(s)";
            ?>
			</output>
             </div>

            </div>
            <div class="col-md-12">
              <label class="labels" required>Gender</label>
              <label class="radio-inline"> <input type="radio" name="gender" id="gendermale" value="male"  <?php if ($doctor_gender == 'male') echo 'checked'; ?>> Male </label>
              <label class="radio-inline"> <input type="radio" name="gender" id="genderfemale" value="female"  <?php if ($doctor_gender == 'female') echo 'checked'; ?>> Female </label>
            </div>
            <div class="col-md-12">
              <label class="labels" required>Status</label>
              <select class="form-control form-control-lg" name="status" id="status">
                <option value="1" <?php if ($status == 'active') echo 'selected'; ?>>Active</option>
                <option value="0" <?php if ($status == 'inactive') echo 'selected'; ?>>Inactive</option>
              </select>
            </div>
            <div class="col-md-12">
              <label class="labels">Address</label>
			 <input type="text" class="form-control" name="address" id="address" value=" <?php echo $doctor_address; ?>" required>

            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-6"><label class="labels"></label></div>
            <div class="col-md-6"><label class="labels"></label></div>
          </div>
          <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Update Profile</button></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-3 py-5">
          <img src="" alt="Image" style="width: 350px; height: 600px;">
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
  <?php } }  include('adminfooter.php'); ?>
    </footer>
  </body>
</html>