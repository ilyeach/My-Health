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

	
		
		$query="SELECT * FROM hospital_info";
		$result=mysqli_query($object->dbConnection(), $query); 
	if ($result->num_rows > 0) 
	{
      echo "<table border='1' class='table table-striped'>

				<tr>

					<th>Id</th>

					<th>Hospital Name</th>
					
					<th>Hospital Email</th>

					<th>Hospital Address</th>

					<th>Location</th>

					<th>Contact Number</th>

				</tr>"; 
  
  
	 if ($result->num_rows > 0) 
		 
	  // output data of each row
	  while($row = $result->fetch_assoc()) 
	  {
	   echo "<tr>
                <td>" . $row['hospital_id'] . "</td>
                <td>" . $row['hospital_name'] . "</td>
				<td>" . $row['email_id'] . "</td>
                <td>" . $row['hospital_address'] . "</td>
                <td>" . $row['location'] . "</td>
                <td>" . $row['contact_number'] . "</td>" ?> 
			  <td><a class="edit" title="Edit" data-toggle="tooltip" href="add_hos.php?id=<?php echo $row['hospital_id']; ?>"><i class="material-icons"></i></a></td>  
              <td><a class="delete" title="Delete" data-toggle="tooltip" href="?id=<?php echo $row['hospital_id']; ?>&action=delete"><i class="material-icons"></i></a></td> 
              </tr> 
			  
			  
			 
			  
	<?php   }
	   } 
	   else
	   {
	  echo "0 results";
	   }
	   
	  if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $deleteId = $_GET['id'];
	   
		$query = "DELETE FROM hospital_info WHERE hospital_id='$deleteId'";
    if (mysqli_query($object->dbConnection(), $query)) {
        echo '<div class="alert alert-success text-center mx-auto" role="alert">Record deleted successfully</div>';
       
        exit;
    } else {
        echo '<div class="alert alert-danger text-center mx-auto" role="alert">Record Not deleted</div>';
        exit;
    }
}
	   
	   
	if(!isset($_SESSION))
	{
		session_start();
	}
 if(isset($_GET['update'] ) && ($_GET['update'] == 1)  ){
			       
				   
		            echo '<div class="alert alert-success text-center mx-auto" role="alert"> Record Updating Successfully </div>';

			   }elseif(isset($_GET['error'] ) && ($_GET['error'] == 1)  ){
			       
				   
		            echo '<div class="alert alert-danger text-center mx-auto" role="alert"> Record Not Update  </div>';

			   }
			   
	
	
	if (isset($_GET['dlt'] ) && ($_GET['dlt'] == 1)  ){
			       
				   
		            echo '<div class="alert alert-success text-center mx-auto" role="alert"> Record deleted successfully </div>';

			   }elseif(isset($_GET['er'] ) && ($_GET['er'] == 1)  ){
			       
				   
		            echo '<div class="alert alert-danger text-center mx-auto" role="alert"> Record Not Delete  </div>';

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
