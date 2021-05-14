<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
	<script src="alert.js"></script>
	<link rel="stylesheet" type="text/css" href="settings.css">
	<title>Admin - Settings LMS</title>
</head>
<body>

	<div id="PopOverlay">
	</div>
	<div id="PopUp">
		<u>
			<p id="topic">
			</p>
		</u>
		<span id="content" clsss="content">
		</span>
		<button class="okay" onclick="Alert.oksettings()">
			OK
		</button>
	</div>


	<div id="TOP">
  		<h1><marquee>Library Mangement System-Lowa State University- Librarian Console</marquee></h1>
	</div>

	<div id="button">
		<a href="LibrarianForm.php" id="btnBack">Back to Main</a>	
	</div>

	<div id="FormDiv">
		<form method = "POST" action = "<?php echo $_SERVER['PHP_SELF']?>">
			<table id="tblForm">
				<tr>
					<td>Fine/day Rs.</td><td><input type="text" class="txtbox" name="txtfine" value="<?php 
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
																				$sql1 = "SELECT fine FROM fine";
																				$result=$connection->query($sql1);
																				if($result->num_rows>0)
																				{
																					while($row=$result->fetch_assoc())
																					{
																						echo $row['fine'];
																					}
																				}
																				else
																				{
																						echo 0;
																				}
																			}
																			$connection->close();
				?>"/></td>
				<td><input type="submit" class="inputbtn1" onclick="changeFine()" name="btnChangefine" value="Change"/></td>
			</tr>
			<tr>
				<td>
					Category
				</td>
				<td>
					<input type="text" class="txtbox" name="txtcategory" value=""/>
				</td>
				<td>
					<input type="submit" class="inputbtn1" onclick="AddCategory()" name="btnAddCategory" value="Add"/>
					<input type="submit" class="inputbtn1" onclick="DeleteCategory()" name="btnDeleteCategory" value="Delete"/>
				</td>
			</tr>
			</table>
		</form>
	</div>	

	<?php
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		if(isset($_POST['btnChangefine']))
		{
			changeFine();
		}
		if(isset($_POST['btnAddCategory']))
		{
			if(empty($_POST['txtcategory']))
			{
			?>
			<script type="text/javascript">
				Alert.errserver();
			</script>
			<?php
			}
			else
			{
				AddCategory();
			}
		}
		if(isset($_POST['btnDeleteCategory']))
		{
			if(empty($_POST['txtcategory']))
			{
			?>
			<script type="text/javascript">
				Alert.Afillform();
			</script>
			<?php
			}
			else
			{
				DeleteCategory();
			}
		}
	}
	function changeFine()
	{
		$server = "localhost";
		$uname = "root";
		$password = "";
		$db ="lms";

		$connection = new mysqli($server,$uname,$password,$db);

		if($connection->connect_error)
		{
			$connection->close();
			?>
			<script type="text/javascript">
				Alert.errserver();
			</script>
			<?php
		}
		else
		{
			$sql1 = "UPDATE fine SET fine='$_POST[txtfine]'";
			if($connection->query($sql1)==TRUE)
			{
			?>
				<script type="text/javascript">
					Alert.changefine();
				</script>
			<?php
			}
			else
			{
			?>
				<script type="text/javascript">
					Alert.errsql();
				</script>
			<?php
			}
		}
		$connection->close();
	}
	function AddCategory()
	{
		$server = "localhost";
		$uname = "root";
		$password = "";
		$db ="lms";

		$connection = new mysqli($server,$uname,$password,$db);

		if($connection->connect_error)
		{
			$connection->close();
			?>
			<script type="text/javascript">
				Alert.errserver();
			</script>
			<?php
		}
		else
		{
			$sql = "INSERT INTO category(category) VALUES('$_POST[txtcategory]')";
			if($connection->query($sql)==TRUE)
			{
			?>
				<script type="text/javascript">
					Alert.insertcategory();
				</script>
			<?php
			}
			else
			{
			?>
				<script type="text/javascript">
					Alert.errsql();
				</script>
			<?php
			}
		}
		$connection->close();
	}
	function DeleteCategory()
	{
		$server = "localhost";
		$uname = "root";
		$password = "";
		$db ="lms";

		$connection = new mysqli($server,$uname,$password,$db);

		if($connection->connect_error)
		{
			$connection->close();
			?>
			<script type="text/javascript">
				Alert.errserver();
			</script>
			<?php
		}
		else
		{
			$sql = "DELETE FROM category WHERE category='$_POST[txtcategory]'";
			if($connection->query($sql)==TRUE)
			{
			?>
				<script type="text/javascript">
					Alert.deletecategory();
				</script>
			<?php
			}
			else
			{
			?>
				<script type="text/javascript">
					Alert.errsql();
				</script>
			<?php
			}
		}
		$connection->close();
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