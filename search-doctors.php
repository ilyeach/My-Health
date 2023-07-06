<html lang="en">

<head>
  <?php 
    session_start();
    if ($_SESSION["username"]) { 
      include('head.php'); 
    }
  ?>
  <title>admin</title>
  <style>
    html, body {
      height: 100%;
    }
    body {
      display: flex;
      flex-direction: column;
    }
    #content {
      flex: 1;
    }
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
    
    .row {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
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

<body>
  <div id="header">
    <?php include('header.php'); ?>
  </div>
  <?php
    $searchTerm = $_POST['term'];
    $query = "SELECT * FROM doctor_details WHERE doctor_name LIKE '%$searchTerm%'";
    // Execute the query
    $result = mysqli_query($object->dbConnection(), $query);

    // Check if any rows were found
    if (mysqli_num_rows($result) > 0) {
      echo '<div class="row">';
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col-lg-6 col-md-6 col-12">';
        echo '<div class="card">';
        echo '<div class="row">';
        echo '<div class="col-lg-4 col-md-4 col-12">';
        echo '<div class="profile-image float-md-right">';
        echo '<img src="images/all.jpg" alt="" class="card-image">';
        echo '</div>';
        echo '</div>';
        echo '<div class="col-lg-8 col-md-8 col-12">';
        echo '<h4 class="card-title"><strong>' . $row['doctor_name'] . '</strong></h4>';
        echo '<span class="card-subtitle">' . $row['specialist'] . '</span>';
        echo '<p class="card-text">' . $row['experience'] . 'rs</p>';
        echo '<p class="card-text">' . $row['fees'] . 'rs</p>';
        echo '<div class="card-buttons">';
        echo '<a href="booking.php" class="btn btn-primary btn-round">Book Now</a>
';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
      echo '</div>';
    } else {
      // No doctors found
      echo "No doctors found.";
    }
  ?>
  <div id="footer">
    <?php include('footer.php'); ?>
  </div>
</body>

</html>
