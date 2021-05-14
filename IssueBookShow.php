<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 

	<link rel="stylesheet" type="text/css" href="IssueBookShow.css">
	<title>Admin - Show Issue Books</title>
</head>
<body>
	<div id="TOP">
  		<h1><marquee>Library Mangement System-Lowa State University- Librarian Console</marquee></h1>
	</div>

	<div id="button">
			<a href="LibrarianForm.php" id="btnBack">Main Menu</a>
			<a href="IssueBook.php" id="btnBack">Back Page</a>
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

	<div id="FormDiv">
		<form method = "POST" action = "<?php echo $_SERVER['PHP_SELF']?>">
			<table id="tblForm">
				<tr id="sectbl">
					<td>By Book ID</td>
					<td>By Member ID</td>
					<td>By Issue Date</td>
					<td>By Return Date</td>
					<td></td>
				</tr>
				<tr id="sectbl">
					<td><input type="text" class="txtbox" name = "txtID"></td>
					<td><input type="text" class="txtbox" name = "txtMID"></td>
					<td><input type="date" class="txtbox" name = "txtissueDT"></td>
					<td><input type="date" class="txtbox" name = "txtreturnDT"></td>
					<td><input type="submit" class="inputbtn" name = "btnSearch" value="Search"></td>
				</tr>
			</table>
		</form>


	<?php
		//Execute search function when get data that submitted in form
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			searchIssue();			
		}
		//Create function for search data
		function searchIssue()
		{
			//Server Requirements
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "lms";

			//Create MySQL Server Connection
			$connection = new mysqli($servername, $username, $password, $dbname);

			//Check if connection error of server or nor
			if($connection->connect_error)
			{
				?>
				<script type="text/javascript">
					alert("Unable to connect with server...");
				</script>
				"<?php
				$connection->close();
			}
			else
			{
				//Select SQL query in PHP Code
				$sql = "SELECT * FROM issue WHERE id='$_POST[txtID]' OR registerNo ='$_POST[txtMID]' OR issuedate='$_POST[txtissueDT]' OR returndate='$_POST[txtreturnDT]'";

				//Check the query is executed
				$result = $connection->query($sql);

				//Check if result rows > 0 or not
				if($result->num_rows>0)
				{
					?>
					<table id="tblSearch">
						<tr>
							<th>Issue ID</th>
							<th>Book ID</th>
							<th>Member ID</th>
							<th>Issue Date</th>
							<th>Return Date</th>
							<th>Currnet Status</th>
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
									<td>".$row['status']."</td></tr>";
						}	
				}
			}
			//Close connection of MySQL Server
			$connection->close();
		}
		?>
	</table>
</div>
	<footer>
		<div class="BottomMost">
			<span class="BottomMostSpan1">
				&copy; rabBIT Developers, WBS Team 2019
			</span>
		</div>
	</footer>

</body>
</html>
	