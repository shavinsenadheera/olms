<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
	<script src="alert.js"></script>
	<link rel="stylesheet" href="returnUpdate.css">
	<title>Admin-Update Return Details</title>
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
		<button class="okay" onclick="Alert.okretuenbook()">
			OK
		</button>
	</div>

	<?php
	
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			if(isset($_POST['btnUpdate']))
			{
				if(empty($_POST['txtBID'])||empty($_POST['txtMID'])||empty($_POST['txtDue'])||empty($_POST['txtReturn'])||empty($_POST['txtLate'])||empty($_POST['txtFine']))
				{
					?>
					<script type="text/javascript">
						Alert.Afillform();
					</script>
					<?php
				}
				else
				{
					upadetReturn();
				}
			}
		}

		function upadetReturn()
		{
			$server = "localhost";
			$uname = "root";
			$password = "";
			$db ="lms";

			$connection = new mysqli($server,$uname,$password,$db);

			if($connection->connect_error)
			{
					?>
					<script type="text/javascript">
						Alert.errserver();
					</script>
					<?php				
			}
			else
			{
				
				$sql = "UPDATE returnbook SET id='$_POST[txtBID]',registerNo='$_POST[txtMID]',duedate='$_POST[txtDue]',returndate='$_POST[txtReturn]',latedays='$_POST[txtLate]',fine='$_POST[txtFine]' WHERE id='$_POST[txtBID]' AND registerNo='$_POST[txtMID]' ";

				if($connection->query($sql)==TRUE)
				{
					?>
					<script type="text/javascript">
						Alert.updatereturnbook();
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
	<div id="TOP">
  		<h1><marquee>Library Management System-Lowa State University- Librarian Console</marquee></h1>
	</div>

	<div id="button">
		<a href="returnBook.php" id="btnBack">Back Page</a>

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

	<div id="Form">
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<table id="tblForm">
			<tr>
				<td>Book ID</td>
				<td>
					<input type="text" class="txtbox" name="txtBID" value="<?php echo $_GET['id'];?>" readonly/>
				</td>
			</tr>
			<tr>
				<td>Member ID</td>
				<td>
					<input type="text" class="txtbox" name="txtMID" value="<?php echo $_GET['regno']?>" readonly/>
				</td>
			</tr>
			<tr>
				<td>Due Date</td>
				<td>
					<input type="text" class="txtbox" name="txtDue" value="<?php echo $_GET['due']?>"></td>
				</td>
			</tr>
			<tr>
				<td>Return Date</td>
				<td>
					<input type="text" class="txtbox" name="txtReturn" value="<?php echo $_GET['rtrn']?>"></td>
				</td>
			</tr>
			<tr>
				<td>Late Days</td>
				<td>
					<input type="text" class="txtbox" name="txtLate" value="<?php echo $_GET['ltd']?>"></td>
				</td>
			</tr>
			<tr>
				<td>Fine Rs.</td>
				<td>
					<input type="text" class="txtbox" name="txtFine" value="<?php echo $_GET['fne']?>"></td>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input onclick="upadetReturn()" type="submit" class="inputbtn" name="btnUpdate" value="Update Return Details">
				</td>
			</tr>
		</table>
	</form>
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