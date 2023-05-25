<div id="header">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
<script type="text/javascript">
        $(document).on('click', '.toggle-password', function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    
    var input = $("#pass_log_id");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
});
</script>

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
                  
                  <button type="button" class="btn btn-outline-success">  <a href="login.php" class="nav-item nav-link">Login / Sign-up</a></button>
				      <div>
                </div>
            </div>
        </div>
    </nav>
</div>
  </header>
  </div>