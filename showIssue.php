<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
	
	<link rel="stylesheet" href="OrderList.css">
	<title>Admin - Show Issue Books</title>
</head>
<body>
	<div id="TOP">
  		<h1><marquee>Library Management System-Lowa State University- Librarian Console</marquee></h1>
	</div>	

	<div id="button">
		<a href="IssueBook.php" id="btnBack">Back to Main</a>	
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
			$sql1 = "SELECT * FROM issue";
			$result = $connection->query($sql1);
			if($result->num_rows>0)
			{
				?>
				<table id="tblForm">
					<tr>
						<th>Issue ID</th><th>Book ID</th><th>Member ID</th><th>Issue Date</th><th>Due Date</th><th>Current Status</th>
					</tr>
				<?php
				while($row = $result->fetch_assoc())
				{
					echo "<tr>
						<td>".$row['issueID']."</td>
						<td>".$row['id']."</td>
						<td>".$row['registerNo']."</td>
						<td>".$row['issuedate']."</td>
						<td>".$row['returndate']."</td>
						<td>".$row['status']."</td>
					</tr>";
				}
				?>
				</table>
				<?php
			}
				else
				{
					print("No data found::ERROR::0");
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