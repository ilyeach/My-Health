<!doctype html>
<html lang="en">

<head>
<?php include('head.php');?>
  <?php 
    session_start();
    if ($_SESSION["username"]) { 
	 
	 
if(!isset($_SESSION)) {
    session_start();
}
// Access the stored patient_id and doctor_id

  ?>

  <title>admin</title>
    <?php include('header.php'); ?> 
 
</head>
<style>
/*
    DEMO STYLE
*/

@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
body {
    font-family: 'Poppins', sans-serif;
    background: #fafafa;
}

p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}

a,
a:hover,
a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

.navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: -10px; /* Adjust the margin-bottom value to move the sidebar up */
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
}

.line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

.wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
}

#sidebar {
    min-width: 250px;
    max-width: 250px;
    background: #7386D5;
    color: #fff;
    transition: all 0.3s;
}

#sidebar.active {
    margin-left: -250px;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #6d7fcc;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}

#sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
}

#sidebar ul li.active>a,
a[aria-expanded="true"] {
    color: #fff;
    background: #6d7fcc;
}

a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 100%;
    right: 20px;
    transform: translateY(-50%);
}

ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
}

ul.CTAs {
    padding: 30px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}

a.download {
    background: #fff;
    color: #7386D5;
}

a.article,
a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}

/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
    width: 100%;
    padding: 20px;
    min-height: 100vh;
    transition: all 0.3s;
}
/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

#sidebar {
    min-width: 250px;
    max-width: 250px;
    background: #7386D5;
    color: #fff;
}

/* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

@media (max-width: 768px) {
    #sidebar {
        display: block; /* Show the sidebar on smaller screens */
        margin-left: 0; /* Remove margin to fill the full width on smaller screens */
    }
    #sidebar.active {
        margin-left: -250px; /* Hide the sidebar by sliding to the left */
    }
    #content {
        margin-left: 0; /* Adjust the content to fill the full width on smaller screens */
    }

    /* Show the menu button on smaller screens */
    #sidebarCollapse {
        display: block;
    }
}

@media (min-width: 769px) {
    #sidebar {
        display: block; /* Show the sidebar on larger screens */
    }
    #sidebar.active {
        margin-left: 0; /* Center the sidebar on larger screens (no sliding) */
    }
    #content {
        margin-left: 250px; /* Adjust the content to leave space for the sidebar on larger screens */
    }

    /* Hide the menu button on larger screens (PC mode) */
    #sidebarCollapse {
        display: none;
    }
}

</style>
</style>
<body>
<body style="background-image: url('images/doc1.jpg'); background-size: cover;">
  <?php 	
  if(isset($_GET['reg']) && ($_GET['reg'] == 1)){
    echo '<div class="alert alert-success text-center" role="alert"> Appointment Registered Successfully </div>';
  } elseif(isset($_GET['error']) && ($_GET['error'] == 1)){
    echo '<div class="alert alert-danger text-center" role="alert"> Appointment Not Registered  </div>';
  }

if(isset($_GET['cancel']) && ($_GET['cancel'] == 1)){
    echo '<div class="alert alert-success text-center" role="alert"> Appointment cancel Successfully </div>';
  } elseif(isset($_GET['cancel_error']) && ($_GET['cancel_error'] == 1)){
    echo '<div class="alert alert-danger text-center" role="alert"> Appointment Not canceled  </div>';
  }

  if(isset($_GET['er']) && ($_GET['er'] == 1)){
    echo '<div class="alert alert-danger text-center" role="alert"> Appointment already exists </div>';
  }
  ?>
  <?php
if(!isset($_SESSION)) {
    session_start();
}

// Initialize $doctor_id to null


// Check if doctor_id is present in $_GET
if (isset($_GET['id'])) {
    $doctor_id = $_GET['id'];
	
    // Store it in the session for future use
} else{
}
if ($doctor_id !== null) {
    $query = "SELECT * FROM doctor_details WHERE doctor_id = '" . $doctor_id . "'";
    $result = mysqli_query($object->dbConnection(), $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $doctorName = $row['doctor_name'];
        // You can use $doctorName here or perform any other operations.
    }
}
 if (isset($_SESSION["username"])) {
    $userName = $_SESSION["username"];
    $query = "SELECT * FROM patient_details WHERE email_id = '" . $userName . "'";
    $result = mysqli_query($object->dbConnection(), $query);
    if ($row = mysqli_fetch_assoc($result)) {
      $patient_id = $row['patient_id'];
      $patient_name = $row['patient_name'];	  
    } else {
      echo "Patient not found!";
    }
  } else {
    echo "Session username not set!";
  } 

?>
 

 	
<?php include('menu.php'); ?>
            <div id="container" class="container-lg">
    <div class="d-flex justify-content-center">
      <div class="row">
        <form action="appointment_process.php" method="POST">
		<h3 class="text-center" style="font-size: 20px;">Booking Appointment For Doctor Name:<?php echo $doctorName; ?></h3>
          <input type="hidden" name="doctor_id" id="doctor_id" value="<?php echo $doctor_id; ?>">
          <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
          <div class="form-group">
            <label for="name" class="h3">Patient Name:</label>
            <input type="text" class="form-control form-control-lg" id="name" value="<?php echo $patient_name; ?>" name="name" readonly>
          </div>

          <div class="form-group">
            <label class="h3" for="date">Date</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fas fa-calendar-alt"></i></span>
              <input class="form-control form-control-lg" id="date" name="date" placeholder="MM/DD/YYYY" type="text">
            </div>
          </div>
          <div class="form-group">
            <label for="selectedTime" class="h3">Selected Time:</label>
            <select class="form-control form-control-lg" name="selectedTime" id="selectedTime" required>
              <option value="">Select</option>
              <option value="Morning">Morning</option>
              <option value="Afternoon">Afternoon</option>
              <option value="Evening">Evening</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control form-control-lg" name="timeOptions" id="timeOptions"></select>
          </div>
               <div class="container-lg">
  <div class="d-flex justify-content-center">
    <!-- Your existing form elements here -->
    
    <button type="submit" class="btn btn-primary btn-lg">Schedule Appointment</button>
  </div>
</div>

        </form>
      </div>
    </div>
  </div>

            

            
        </div>
    </div>
	<script>
	$(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
	</script>
	<?php include('appointmentscript.php'); ?> 
  
 <div id="footer" class="bg-light mt-auto fixed-bottom ">
            <!-- Your footer content goes here -->
            <?php include('footer.php'); ?>
        </div>
<?php 
  } else {
    header("Location: user_login.php");
    exit();
  }
?>
</body>
	
</html>