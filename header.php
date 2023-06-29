<?php  

	include('admin/db.php'); 
	$object = new database();
	?>
<style>
    .username {
        margin-left: 30px; /* Adjust the value as needed */
    }
</style>
<div id="header">
    <header class="bg-white text-white">
        <div class="m-4">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a href="home.php">
                        <img class="navbar-brand" src="admin/images/logo1.png" width="50" height="50" />
                    </a>
                    <br>
                    <br>
                    <h3 class="text-dark nav-item nav-link active">My Health</h3>
  <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav">
                            <a href="index.php" class="nav-item nav-link active"></a>
                            <?php if (isset($_SESSION['username']) && $_SESSION['username'] == true) { ?>
                                <div class="btn-group" style="margin-right: 10px;">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Hospital Info</button>
                                    <div class="dropdown-menu dropdown-menu-left" style="margin-top: 10px;">
                                        <a class="dropdown-item" href="viewhospital.php">View Hospital Details</a>
                                    </div>
                                </div>

                                <div class="btn-group" style="margin-right: 10px;">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Doctor Info</button>
                                    <div class="dropdown-menu dropdown-menu-left" style="margin-top: 10px;">
                                        <a class="dropdown-item" href="viewdoctor.php">View Doctor Details</a>
                                    </div>
                                </div>
                        </div>                                                           
                        </div>
                        <div class="navbar-nav">
                            <a href="" class="nav-item nav-link active"></a>
                        </div>
                    </div>
                    <div class="row align-items col-md-2">
                        <div class="navbar-nav ms-auto">
                            <?php
    $query = "SELECT patient_name FROM patient_details WHERE email_id = '" . $_SESSION['username'] . "'";
    $result = mysqli_query($object->dbConnection(), $query);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        
        if ($row) {
            $userName = $row['patient_name'];
            ?>
                            <div class="btn-group" style="margin-right: 10px;">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    Welcome <?php echo $userName; ?>
                                </button>
                                <div class="dropdown-menu dropdown-menu-left" style="margin-top: 10px;">
                                    <a class="dropdown-item" href="http://localhost/myhealth/project/logout.php">Log out</a>
							<?php }  } else {
        echo "Error executing the query: " . mysqli_error($object->dbConnection());
							}}?>  </div>
								
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</div>
