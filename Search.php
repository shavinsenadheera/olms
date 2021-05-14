<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 

	<link rel="stylesheet" type="text/css" href="Search.css">
	<title>Admin - Search Book</title>
</head>
<body>
	<div id="TOP">
  		<h1>
  			<marquee>Library Management System-Lowa State University- Librarian Console</marquee>
  		</h1>
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

	<div>
		<form method = "POST" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
			<table id="tblsearch">
				<tr>
					<td>
						<p id="note">* search by category</p>
					</td>
					<td>
						<select name = "category" class="combobox">
							<option value="not selected">---Select Category---</option>
							<?php
							$server = "localhost";
							$uname = "root";
							$password = "";
							$db ="lms";

							$connection = new mysqli($server,$uname,$password,$db);

							if($connection->connect_error)
							{
							$connection->close();
							}
							else
							{
								$sql1 = "SELECT category FROM category";
								$result=$connection->query($sql1);
								if($result->num_rows>0)
								{
									while($row=$result->fetch_assoc())
									{
										echo "<option>".$row['category']."</option>";
									}
								}
								else
								{
									echo 0;
								}
							}
							$connection->close();
						?>
						</select>	
					</td>
					<td>
						<input onclick="Search()" type="submit" class="inputbtn" name="btnsearch" value="Search">
					</td>
				</tr>
			</table>
		</form>
	</div>

	<?php
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			if(isset($_POST['btnsearch']))
			{
				if(empty($_POST['category']))
				{
				?>
					<script type="text/javascript">
						alert("Please input category to search...");
					</script>
				<?php
				}
				else
				{
					Search();
				}
			}		
		}
		function Search()
		{
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "lms";

			$connection = new mysqli($servername, $username, $password, $dbname);

			if($connection->connect_error)
			{
				print("Unable to connect with server...");
				$connection->close();
			}
			else
			{
				$sql = "SELECT * FROM book WHERE category = '$_POST[category]' ";

				$result = $connection->query($sql);

				if($result->num_rows > 0)
				{
			?>
					<table id="tblForm">
					<tr>
						<th>Category</th>
						<th>Id</th>
						<th>Title</th>
						<th>Author</th>
						<th>Publisher</th>
						<th>ISBN</th>
						<th>Year</th>
						<th>Price Rs.</th>
						<th>Language</th>
						<th>Quantity</th>
						<th>Status</th>
					</tr>
			<?php
					while($row=$result->fetch_assoc())
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
							<td>".$status=$row['qty']."</td>";
								if($status > 0)
								{
								?>
									<td><p id="available">Available</p></td></tr>
								<?php
								}
								else
								{
								?>
									<td><p id="notavailable">Not Available</p></td></tr>
								<?php
								}
						}
						?>
						</table>
						<?php
					}
				}
			}
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