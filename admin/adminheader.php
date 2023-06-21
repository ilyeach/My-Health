<div id="header">
    <header class="bg-white text-white">
        <div class="m-4">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
			
                <div class="container-fluid">
                    <a href="index.php">
                        <img class="navbar-brand" src="../images/logo1.png" width="50" height="50" />
                    </a>
                    <h3 class="text-dark nav-item nav-link active">My Health</h3>

                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav">
                            <a href="index.php" class="nav-item nav-link active"></a>
							<?php if(isset($_SESSION['username'])  && $_SESSION['username'] == true) {?>
    
                            <div class="btn-group" style="margin-right: 10px;">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Hospital Info</button>
                                <div class="dropdown-menu dropdown-menu-left" style="margin-top: 10px;">
                                    <a class="dropdown-item" href="hospital_details.php">Add Hospital</a>
                                    <a class="dropdown-item" href="edit_hospital_details.php">View Hospital Details</a>
                                </div>
                            </div>

                            <div class="btn-group" style="margin-right: 10px;">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Doctor Info</button>
                                <div class="dropdown-menu dropdown-menu-left" style="margin-top: 10px;">
                                    <a class="dropdown-item" href="doc_details.php">Add Doctor</a>
                                    <a class="dropdown-item" href="edit_doctor_details.php">View Doctor Details</a>
                                </div>
                            </div>
                        </div>

                        <div class="navbar-nav">
                            <a href="" class="nav-item nav-link active"></a>
                        </div>
                    </div>

                    <div class="row align-items col-md-2">
                        <div class="navbar-nav ms-auto">
                            <?php ?>
                            	
                                <div class="btn-group">
  <a href="http://localhost/myhealth/project/admin/logout.php" class="btn btn-info">Log out</a>
</div>
                            <?php } else { ?>
                                <button type="button" class="btn btn-outline-success">
                                    <a href="login.php" class="nav-item nav-link">Login / Sign-up</a>
                                </button>
                            <?php }  ?>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</div>
