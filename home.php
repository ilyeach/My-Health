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
	<form method="post" action="search-doctors.php">
  <div class="input-group" style="max-width: 200px; margin: auto;">
    <div class="input-group-append" style="display: flex; justify-content: center;">
      <div class="form-outline">
        <input id="search-focus" type="search" name="term" class="form-control form-control-sm" value="<?php echo isset($_POST['term']) ? $_POST['term'] : ''; ?>" />
      </div>
      <button type="submit" class="btn btn-primary btn-sm">
        <i class="fas fa-search"></i>
      </button>
    </div>
  </div>
</form>


  



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
