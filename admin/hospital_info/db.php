<?php
class database
{
	
	public function __construct()
	{	
		return $this->dbConnection();
	}

	public function dbConnection()
	{
		$servername = "localhost"; // Replace with your server name
		$username = "root"; // Replace with your MySQL username
		$password = "test"; // Replace with your MySQL password
		$database = "admin_login"; // Replace with your database name

		// Create a connection
		$conn = new mysqli($servername, $username, $password, $database);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		return $conn;
	}
}
	 
?>