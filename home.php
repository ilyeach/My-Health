<!doctype html>
<html lang="en">

<head>
  <?php 
	session_start();
	if(@$_SESSION["username"]){
		
	
 ?>
  <title>Home</title>
 
  <style>
/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
    width: 100%;
    min-height: 80vh;
    transition: all 0.3s;
}


</style>
 	<?php include('head.php'); ?>

</head>
<?php 
	include('header.php'); ?>
	<?php 
	include('menu.php'); ?>
	

  

<body style="background-image: url('images/hospital.jpg'); background-size: cover;">
  	


    <div class="container" >
        <div id="content" >
<h1 class="text-center" style="color: black;">Search Doctor Name</h1>
            <form method="post" action="search-doctors.php">
                <div class="input-group" style="max-width: 250px; margin: auto;">
                    <div class="input-group-append" style="display: flex; justify-content: center;">
                        <div class="form-outline" style="width: 250px;">
                            <input id="search-focus" placeholder="search doctor name here!" type="search" name="term" class="form-control form-control-sm" value="<?php echo isset($_POST['term']) ? $_POST['term'] : ''; ?>" />
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
   <div id="footer" class=" mt-auto fixed-bottom " style="margin-left: 300px;">
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
