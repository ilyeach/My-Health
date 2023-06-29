<!doctype html>
<html lang="en">

<head>
  <?php 
    session_start();
    if ($_SESSION["username"]) { 
      include('admin/adminhead.php'); 
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
  </style>
</head>

<body>
  <div id="header">
    <?php include('header.php'); ?>
  </div>

  <div id="content">
    <h1 class="text-center">HOME</h1>
    <h5 class="text-center">
     <?php
$query = "SELECT * FROM doctor_details ORDER BY doctor_id ASC";
// Execute the query and fetch the results

// Assuming you have a database connection named $conn
$result =mysqli_query($object->dbConnection(), $query);

// Loop through the results and display the doctor details
while ($row = mysqli_fetch_assoc($result)) {
    $doctorName = $row['doctor_name'];
    $specialist = $row['specialist'];
    $fees = $row['fees'];
    $imageURL = "images/all.jpg"; // Replace with the actual image URL

    echo '<div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
              <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                <img src="' . $imageURL . '" class="w-100" />
                <a href="#!">
                  <div class="mask"> 
                    <div class="d-flex justify-content-start align-items-end h-100">
                      <h5><span class="badge bg-primary ms-2"></span></h5>
                    </div>
                  </div>
                  <div class="hover-overlay">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </div>
                </a>
              </div>
              <div class="card-body">
                <a href="" class="text-reset">
                  <h5 class="card-title mb-3">Doctor Name: ' . $doctorName . '</h5>
                </a>
                <a href="" class="text-reset">
                  <p>Specialist: ' . $specialist . '</p>
                </a>
                <h6 class="mb-3">Fees: ' . $fees . 'rs</h6>
              </div>
            </div>
          </div>';
}
?>

    </h5>
  </div>

  <div id="footer">
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
