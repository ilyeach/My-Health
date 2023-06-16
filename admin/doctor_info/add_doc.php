<!doctype html>
<html lang="en">
<head>
<?php include('../adminhead.php'); ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Doctor Details</title>
  
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

</head>
<body>
  <?php 
  if (!isset($_SESSION)) {
    session_start();
  }

  if ($_SESSION["username"]) {
    include('../db.php');
    $object = new database();
    include('../adminhead.php');
  ?>
  <?php include('../adminheader.php'); ?>
  <?php
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
    $sql = "SELECT * FROM doctor_info WHERE doctor_id='$id'";
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
   <section style="background-color: #ECFFEC; flex: 1; margin-bottom: 80px; height: 100vh;">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="card-body p-4 p-lg-5 text-black">
              <h3 class="text-center">Edit Doctor Details</h3>
              <form class="form-horizontal" action="edit_doctor_details_action.php" method="POST" enctype "multipart/form-data">
                
			   <div class="col-sm-12 d-flex justify-content-center">
                  <!-- Profile Picture -->
                  <div class="picture-container d-flex justify-content-center align-items-center">
                    <div class="picture">
					  <img src="<?php echo $imageURL; ?>" class="picture-src" id="wizardPicturePreview" title="">
					  <input type="file" name="pic" id="pro">
					</div>
				 <h6 class="text-center">Choose Picture</h6>
                  </div>
                </div>
				<br>
				<br>
			
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label col-sm-4">Doctor Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="name" id="doctor_name"   value=" <?php echo $doctor_name; ?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-4">Graduation Status</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="graduation" id="graduation"  value=" <?php echo $doctor_graduation; ?>" required>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label col-sm-4">Email ID</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" name="email" id="email" value=" <?php echo $doctor_email; ?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-4">Mobile</label>
                    <div class="col-sm-8">
              <input type="text" class="form-control" name="mobile" id="mobile"  value=" <?php echo $doctor_mobile; ?>"required>
                    </div>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group">
                    <label class="control-label col-sm-2">Address</label>
                    <div class="col-sm-10">
           <input type="text" class="form-control" name="address" id="address" rows="2"  value=" <?php echo $doctor_address; ?>" required>
                    </div>
                  </div>
                </div>

                  <!-- Specialist -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Specialist</label>
                      <div class="col-sm-8">
                        <select class="form-control form-control-lg" name="specialist" id="specialist" required>
						<option value="">Select</option>
                          <option value="general" <?php if ($doctor_specialist == 'general') echo 'selected'; ?>>General</option>
                          <option value="neurologist" <?php if ($doctor_specialist == 'neurologist') echo 'selected'; ?>>Neurologist</option>
                          <option value="urologist" <?php if ($doctor_specialist == 'urologist') echo 'selected'; ?>>Urologist</option>
                          <option value="surgeon" <?php if ($doctor_specialist == 'surgeon') echo 'selected'; ?>>Surgeon</option>
                          <option value="cardiologist" <?php if ($doctor_specialist == 'cardiologist') echo 'selected'; ?>>Cardiologist</option>
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
                          <option value="500" <?php if ($doctor_fees == '500') echo 'selected'; ?>>500</option>
                          <option value="1000" <?php if ($doctor_fees == '1000') echo 'selected'; ?>>1000</option>
                          <option value="1500" <?php if ($doctor_fees == '1500') echo 'selected'; ?>>1500</option>
                          <option value="2000"<?php if ($doctor_fees == '2000') echo 'selected'; ?>>2000</option>
                          <option value="2500" <?php if ($doctor_fees == '2500') echo 'selected'; ?>>2500</option>
                        </select>
                      </div>
                    </div>
                  </div>
              

                
                  <!-- Years Of Experience -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Years Of Experience</label>
                      <div class="col-sm-8">
                           <select class="form-control form-control-lg" name="experience" id="experience" required>
							  <option value="">Select</option>
							  <option value="2 Years" <?php if ($doctor_experience == '2') echo 'selected'; ?>>2 years</option>
							  <option value="3 Years" <?php if ($doctor_experience == '3') echo 'selected'; ?>>3 years</option>
							  <option value="4 Years" <?php if ($doctor_experience == '4') echo 'selected'; ?>>4 years</option>
							  <option value="5 Years" <?php if ($doctor_experience == '5') echo 'selected'; ?>>5 years</option>
							  <option value="6 Years" <?php if ($doctor_experience == '6') echo 'selected'; ?>>6 years</option>
							  <option value="7-10 Years"<?php if ($doctor_experience == '7-10') echo 'selected'; ?>>7-10 years</option>
							  <option value="10-13 Years"<?php if ($doctor_experience == '10-13') echo 'selected'; ?>>10-13 years</option>
							  <option value="13-15 Years"<?php if ($doctor_experience == '13-15') echo 'selected'; ?>>13-15 years</option>
							</select>
                      </div>
                    </div>
                  </div>

                  <!-- Gender -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 control-label" required>Gender</label>
                      <div class="col-sm-8">
                        <label class="radio-inline">
					<input type="radio" name="gender" id="gendermale" value="male" <?php if ($doctor_gender == 'male') echo 'checked'; ?>> Male
				  </label>
                         <label class="radio-inline">
					<input type="radio" name="gender" id="genderfemale" value="female" <?php if ($doctor_gender == 'female') echo 'checked'; ?>> Female
				  </label>
                      </div>
                    </div>
                  </div>
               

             
                  <!-- Status -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Status</label>
                      <div class="col-sm-8">
                       <select class="form-control form-control-lg" name="status" id="status">
						<option value="active" <?php if ($status == 'active') echo 'selected'; ?>>active</option>
						<option value="inactive" <?php if ($status == 'inactive') echo 'selected'; ?>>inactive</option>
					  </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-12 d-flex justify-content-center"> 
                    
                      <button class="btn btn-primary waves-effect waves-light" id="btn-submit">Update</button>
                
                  <input type="hidden" name="action" id="action" value="event_dialog_add_newpartnerdata" />
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
        var inputValue = this.value.replace(/[^0-9]/g, ''); // Remove non-digit characters
        if (inputValue.length > 10) {
            inputValue = inputValue.slice(0, 10); // Keep only the first 10 digits
        }
        this.value = inputValue;
    });
	
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

    
  </section>

  <footer style="background-color: #f8f9fa; padding: 10px; position: fixed; bottom: 0; width: 100%;">
        <!-- Add your footer content here -->
        <?php include('../adminfooter.php'); ?>
    </footer>
  <?php } ?>
  <?php } 
  else {
    header("Location: ../login.php");
  } ?>
</body>
</html>
