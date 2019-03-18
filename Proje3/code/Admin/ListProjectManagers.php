<html>
	<head>
		<title>Project Managers</title>
		<link rel="stylesheet" type="text/css" href="../design.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	<p><strong> List of Project Managers</strong></p>
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
				//List records
				$sql = "SELECT * FROM ProjectManagers";
				$result = $conn->query($sql);
				
				if( $result->num_rows > 0){
					?>
					<table id="table1">
						<tr>
							<th>Operations </th>
							<th>User ID</th>
							<th>Name</th>
							<th>Surname</th>
							<th>Password</th>
							<th>Email</th>
						</tr>
					<?php
					
					//output data of each row
					while($row = $result->fetch_assoc()){
						?>
						<tr>
							<td>
								<a href = "delete_projectManager.php?id=<?php echo $row["UserID"]; ?>"><i class="fa fa-close"></i></a>
								<a href = "edit_projectManager.php?id=<?php echo $row["UserID"]; ?>"><i class="fa fa-edit"></i></a>
							
							<td><?php echo $row["UserID"]; ?></td>
							<td><?php echo $row["Name"]; ?></td>
							<td><?php echo $row["Surname"]; ?></td>
							<td><?php echo $row["Password"]; ?></td>
							<td><?php echo $row["Email"]; ?></td>
						</tr>
						<?php
					}
					?>
					</table>
					<br>
					<br>
					<a href = "create_new_projectManager.php"> <i class="fa fa-plus" style="color:white"> Add new Project Manager </i></a>
					<?php
				}
				else{
					echo "No result found!";
					?>
					<a href = "create_new_projectManager.php"> <i class="fa fa-plus" style="color:white"> Add new Project Manager </i></a>
					<?php
				}	
			}
			$conn->close();
		}
		?>
	</body>
</html>