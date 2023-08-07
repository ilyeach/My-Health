<!doctype html>
<html lang="en">

<head>
  <?php 
    session_start();
    if ($_SESSION["username"]) { 
      include('head.php'); 
  ?>
  <title>admin</title>
 
  <style>
/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
    width: 100%;
    padding: 20px;
    min-height: 100vh;
    transition: all 0.3s;
}

 
</style>
</head>

<body>
  <div id="header">
    <?php include('header.php'); ?>
  </div>
<?php include('menu.php'); ?>

<body style="background-image: url('images/hospital.jpg'); background-size: cover;">
    <div class="container" >
        <div id="content" class="py-5">
<h1 class="text-center" style="color: black;">HOME</h1>
            <form method="post" action="search-doctors.php">
                <div class="input-group" style="max-width: 200px; margin: auto;">
                    <div class="input-group-append" style="display: flex; justify-content: center;">
                        <div class="form-outline">
                            <input id="search-focus" placeholder="search doctor name" type="search" name="term" class="form-control form-control-sm" value="<?php echo isset($_POST['term']) ? $_POST['term'] : ''; ?>" />
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
