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

<div class="row align-items col-md-2">
<div class="navbar-nav ms-auto">
<?php
// Check if the user is logged in
if (isset($_SESSION['username'])) {
$username = $_SESSION['username'];

$query = "SELECT patient_name FROM patient_details WHERE email_id = '$username'";
$result = mysqli_query($object->dbConnection(), $query);

if ($result && mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
$userName = $row['patient_name'];

?>                                           
<div class="btn-group" style="margin-left: 950px;">
<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
Welcome <?php echo $userName; ?>
</button>
<div class="dropdown-menu dropdown-menu-left" style="margin-top: 10px;">
<a class="dropdown-item" href="http://localhost/myhealth/project/logout.php">Log out</a>
</div>
</div>
<?php
}
}
?>
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</div>
