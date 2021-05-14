<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 

	<link rel="stylesheet" href="UpdateDelete.css">
	<title>Admin-Maintain Books</title>
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
			$sql1 = "SELECT * FROM book";
			$result = $connection->query($sql1);
			if($result->num_rows>0)
			{
				?>
				<table id="tblForm">
					<tr>
					<th>Category</th><th>ID</th><th>Title</th><th>Author</th><th>Publisher</th><th>ISBN</th><th>Year</th><th>Price Rs.</th><th>Language</th><th>Quantity</th><th colspan="2">Operations</th>
					</tr>
				<?php
				while($row = $result->fetch_assoc())
				{
					echo "<tr>
						<td>".$row['category']."</td>
						<td>".$row['id']."</td>
						<td>".$row['title']."</td>
						<td>".$row['author']."</td>
						<td>".$row['publisher']."</td>
						<td>".$row['isbn']."</td>
						<td>".$row['year']."</td>
						<td>".$row['price']."</td>
						<td>".$row['language']."</td>
						<td>".$row['qty']."</td>
						<td><a href='Update.php?ct=$row[category]&id=$row[id]&tt=$row[title]&at=$row[author]&pb=$row[publisher]&in=$row[isbn]&yr=$row[year]&pr=$row[price]&ln=$row[language]&qty=$row[qty]'>EDIT</a></td>
						<td><a href='Delete.php?ct=$row[category]&id=$row[id]&tt=$row[title]&at=$row[author]&pb=$row[publisher]&in=$row[isbn]&yr=$row[year]&pr=$row[price]&ln=$row[language]&qty=$row[qty]'>DELETE</a></td>
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