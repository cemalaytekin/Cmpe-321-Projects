 <html>
	<head>
		<title>Result</title>
	</head>
	<body>
	<?php 
		session_start();
		if(!isset($_SESSION['Username'])){
			$msg = "Please <a href = 'http://Localhost/Project_Management/AdminLogin.php'>log in</a> to view this page";
			echo $msg;
		}
		else{
			?>
	
		<?php 
		$servername = 'localhost';
			$username = "root";
			$password = "";
			$dbname = "cmpe321";
			
			//Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			//Check connection
			if($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			else{
				//Insert te record
				$sql ="UPDATE Employees SET Name='" . $_POST['name'] ."',Surname='". $_POST['surname'] 
				. "',Salary ='". $_POST['salary']
				."' WHERE EmployeeID = " . $_POST['id']; 
					
				if($conn->query($sql) === TRUE) {
					echo "Record has been updated successfully <br/>";
					echo "<a href='ListEmployees.php'>Go Back</a>";
				}
				else{
					echo "Error updating record: " . $conn->error;
				}
			}
			$conn->close();
		}
		?>
	</body>
</html>