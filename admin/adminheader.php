
<div id="header">
<header class="p-3 bg-info text-white">
<div class="m-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
		<a href="index.php" > <img class="navbar-brand" src="../images/logo1.png" width="50" height="50" /></a>
		 <h3 class="text-dark nav-item nav-link active">My Health</h3>
<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="index.php" class="nav-item nav-link active"></a>               
					 </div>
					 <div class="navbar-nav">
                    <a href="" class="nav-item nav-link active"></a>
										 <div class="navbar-nav">
                    <a href="" class="nav-item nav-link active"></a>
                </div>
                </div>
				     </div>
		 <div class="row align-items col-md-2">     
					<div class="navbar-nav ms-auto">
                            <?php if(!isset($_SESSION))
							{
							session_start();
							 } ?>
								   <?php if(isset($_SESSION['username'])  && $_SESSION['username'] == true) {?>	
								   <a href="logout.php" class="btn btn-info btn-lg">
                                        <span class="glyphicon glyphicon-log-out"></span> Log out </a>
								   <?php } else { ?>
                  <button type="button" class="btn btn-outline-success">  <a href="login.php" class="nav-item nav-link">Login / Sign-up</a></button>
							<?php }  ?>
							
                     </div>
                    </div>
                  </div>
                </nav>
                   </div>
  </header>
  </div>