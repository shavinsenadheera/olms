<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
	
	<link rel="stylesheet" href="Member.css">
	<title>Admin-Maintain Members</title>
</head>
<body>	
	<div id="TOP">
  		<h1><marquee>Library Management System-Lowa State University- Librarian Console</marquee></h1>
	</div>	

	<div id="button">
		<a href="LibrarianForm.php" id="btnBack">Main Menu</a>
		<div class="Divnavi">
		<button class="Btndropdown">
			<img src="icons8-settings-96.png" width="30px" height="30px">
		</button>
		<div class="DivnaviDrop">
			<a href="settings.php">
				Settings
			</a>
			<a href="mainForm.php">
				Logout
			</a>
		</div>
		</div>		
	</div>

	<?php	
		$server = "localhost";
		$uname = "root";
		$password = "";
		$db ="lms";

		$connection = new mysqli($server,$uname,$password,$db);

		if($connection->connect_error)
		{
			?>
			<script type="text/javascript">
				alert("Unable to connect with server..");
			</script>
			<?php
		}
		else
		{
			$sql1 = "SELECT * FROM member";
			$result = $connection->query($sql1);
			if($result->num_rows>0)
			{
				?>
				<table id="tblForm">
					<tr>
					<th>Category</th><th>Register No</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Address</th><th>Gender</th><th>Email</th><th>Username</th><th>Password</th><th colspan="2">Operations</th>
					</tr>
				<?php
				while($row = $result->fetch_assoc())
				{
					echo "<tr>
						<td>".$row['category']."</td>
						<td>".$row['registerNo']."</td>
						<td>".$row['firstName']."</td>
						<td>".$row['middleName']."</td>
						<td>".$row['lastName']."</td>
						<td>".$row['address']."</td>
						<td>".$row['gender']."</td>
						<td>".$row['email']."</td>
						<td>".$row['username']."</td>
						<td>".$row['password']."</td>
						<td><a href='UpdateMem.php?ct=$row[category]&rg=$row[registerNo]&fn=$row[firstName]&mn=$row[middleName]&ln=$row[lastName]&ad=$row[address]&gn=$row[gender]&em=$row[email]&us=$row[username]&pwd=$row[password]'>EDIT</a></td>
						<td><a href='DeleteMem.php?ct=$row[category]&rg=$row[registerNo]&fn=$row[firstName]&mn=$row[middleName]&ln=$row[lastName]&ad=$row[address]&gn=$row[gender]&em=$row[email]&us=$row[username]&pwd=$row[password]'>DELETE</a></td>
					</tr>";
				}
				?>
				</table>
				<?php
				}
				else
				{
					?>					
						<br>
						<span id="nonew">No member Found!</span>
						<br>
					<?php
				}
			}
		$connection->close();
		?>

	<footer>
		<div class="BottomMost">
			<span class="BottomMostSpan1">
				&copy; rabBIT Developers, WBS Team 2019
			</span>
		</div>
	</footer>
</body>
</html>