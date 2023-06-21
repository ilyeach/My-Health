<!doctype html>
<html lang="en">
<?php if(!isset($_SESSION))
	{
		session_start();
	}

	if($_SESSION["username"]) { ?>
<?php 
	include('db.php'); 
	$object = new database();
 ?>
<?php include('adminhead.php'); ?>
	<title>hospital_details.php</title>

<body>
  
<?php 
	include('adminheader.php'); ?>
 
  
<section  style="background-color: #ECFFEC;">
		  <div class="container">
		  <div class="row d-flex justify-content-center align-items-center h-100">
		  <div class="col col-xl-10">
		  <div class="card" style="border-radius: 1rem;">
		  <div class="card-body p-4 p-lg-5 text-black">
			  <h5 class="text-center">Edit Hospital Details</h5>
			  

<form class="row g-3" action="edit_hospital_details_action.php" method="POST">
<?php 
	 if(!isset($_SESSION))
	{
		session_start();
	}

	
		
		$query="SELECT * FROM hospital_details";
		$result=mysqli_query($object->dbConnection(), $query); 
	if ($result->num_rows > 0) 
	{
      echo "<table border='1' class='table table-striped'>

				<tr>

					<th>Id</th>

					<th>hospital_name</th>

					<th>hospital_address</th>

					<th>location</th>

					<th>contact_number</th>

				</tr>";
  
  
	 if ($result->num_rows > 0) 
		 
	  // output data of each row
	  while($row = $result->fetch_assoc()) 
	  {
	   echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['hospital_name'] . "</td>
                <td>" . $row['hospital_address'] . "</td>
                <td>" . $row['location'] . "</td>
                <td>" . $row['contact_number'] . "</td>
              </tr>";
	   }
	   } 
	   else
	   {
	  echo "0 results";
	   }
	
?>	   
		   
		   
		   

  
</form>     
				

            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
</section>


<?php } 
     else {
		header("Location: login.php");
	}?>


</body>	
</html>
