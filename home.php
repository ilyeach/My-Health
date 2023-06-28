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
