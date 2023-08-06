		<div id="footer">
		  <!-- Copyright -->
	    <div class="text-center p-3" style="background-color:info text-dark(0, 0, 0, 0.2);">
			© 2023 Copyright:
			  <a class="text-dark" href="login.php">myhealth.com</a>
	    </div>
  <!-- Copyright -->
</footer>
		<div class="bg-info text-center text-lg-start fixed-bottom" id="footer"></div>
		      <script src="../library/js/jquery-3.4.1.slim.min.js" ></script>
              <script type="text/javascript">
					$(document).on('click', '.toggle-password', function() {

				$(this).toggleClass("fa-eye fa-eye-slash");
				
				var input = $("#pass_log_id");
				input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
			});
			
			  </script>
			 
		</div>