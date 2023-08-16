<html lang="en">

<head>
  <?php 
    session_start();
    if ($_SESSION["username"]) { 
      include('head.php'); 
   
  ?>
  <div id="header">
    <?php include('header.php'); ?>
  </div>
  <title>search-doctors</title>
  <style>
    
    #footer {
      flex-shrink: 0;
    }
    
    .card {
      box-shadow: 0 0 4px rgba(0, 0, 0, 0.1);
      border-radius: 4px;
      padding: 20px;
      margin-bottom: 20px;
    }
    
    .card-image {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 20px;
    }
    
    .card-title {
      margin: 0;
      font-size: 20px;
      font-weight: bold;
    }
    
    .card-subtitle {
      margin-bottom: 10px;
    }
    
    .card-text {
      margin-bottom: 10px;
    }
    
    .card-buttons {
      display: flex;
      gap: 10px;
    }
    
    .social-icon a {
      margin-right: 5px;
    }
    
    
    
    .col-lg-6,
    .col-md-6,
    .col-12 {
      flex-basis: calc(50% - 20px);
      max-width: calc(50% - 20px);
    }
    
     @media (max-width: 767px) {
            .col-lg-6,
            .col-md-6,
            .col-12 {
                flex-basis: 100%;
                max-width: 100%;
      }
    }
  </style>
</head>

<body style="background-image: url('images/hospital.jpg'); background-size: cover;">
  <?php include('menu.php'); ?>
  <h3 class="text-center">Select Doctor</h3>
<?php
if (isset($_POST['term'])) {
    $searchTerm = $_POST['term'];
    $query = "SELECT * FROM doctor_details WHERE doctor_name LIKE '%$searchTerm%'";
} else {
    $query = "SELECT * FROM doctor_details";
}

// Execute the query
$result = mysqli_query($object->dbConnection(), $query);

// Check if any rows were found
if (mysqli_num_rows($result) > 0) {
    echo '<div class="row">';
    while ($row = mysqli_fetch_assoc($result)) {
        $gender = $row['gender'];
        $profileImage = ($gender === 'male') ? 'doctor2.jpg' : 'doctor3.jpg';

        echo '<div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="profile-image float-md-right">
                            <img src="images/' . $profileImage . '" alt="" class="card-image">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-12">
                        <h4 class="card-title"><strong>' . $row['doctor_name'] . '</strong></h4>
                        <span class="card-subtitle">' . $row['specialist'] . '</span>
                        <p class="card-text">' . $row['experience'] . 'rs</p>
                        <p class="card-text">' . $row['fees'] . 'rs</p>
                        <div class="doctor-id" style="display: none;">' . $row['doctor_id'] . '</div> 
                        <div class="card-buttons">
                            <a href="appointment.php?id=' . $row['doctor_id'] . '" class="btn btn-primary btn-round">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
    echo '</div>';
} else {
    // Handle case where no doctors are found
    echo 'No doctors found.';
}
?>


 <div id="footer" class=" mt-auto" style="margin-left: 20px;">
            <!-- Your footer content goes here -->
            <?php include('footer.php'); ?>
        </div>
  <?php 
	}
?>
</body>

</html>
