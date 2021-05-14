<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
	<script src="alert.js"></script>
	<link rel="stylesheet" href="Message.css">
	<title>Admin - Messaging</title>
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
		<button class="okay" onclick="Alert.okmeesage()">
			OK
		</button>
	</div>

<?php
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		if(isset($_POST['btnSubmit']))
		{
			if(empty($_POST['txtID'])||empty($_POST['txtMsg']))
			{
				?>
				<script type="text/javascript">
					Alert.Afillform();
				</script>
				<?php
			}
			else
			{
				sendMSG();
			}
		}
	}	
		function sendMSG()
		{
			$server = "localhost";
			$username = "root";
			$pwd = "";
			$db = "lms";

			$connection = new mysqli($server,$username,$pwd,$db);

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
				$sql1 = "INSERT INTO message(registerNo,msg) VALUES('$_POST[txtID]','$_POST[txtMsg]')";

				if($connection->query($sql1)==TRUE)
				{
				?>
					<script type="text/javascript">
						Alert.sendmsg();
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
			$connection->close();
			}
		}

?>
	
<div id="TOP">
  	<h1><marquee>Library Mangement System-Lowa State University- Librarian Console</marquee></h1>
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
<div id="Form">
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		<table id="tblForm">
			<tr>
				<td>Register ID</td><td><input type="text" class="txtbox" name="txtID"/></td>
			</tr>
			<tr>
				<td>Message</td><td><textarea rows="7" cols="7" class="txtbox" name="txtMsg"></textarea></td>
			</tr>
			<tr>
				<td></td><td><input type="submit" class="inputbtn" name="btnSubmit" value="Send Message"/></td>
			</tr>
		</table>
	</form>

		<?php

			$server = "localhost";
			$username = "root";
			$pwd = "";
			$db = "lms";

			$connection = new mysqli($server,$username,$pwd,$db);

			if($connection->connect_error)
			{
				$connection->close();
				?>
					<script type="text/javascript">
						alert("Unable to connect with server..");
					</script>
				<?php
			}
			else
			{
				$sql1 = "SELECT * FROM message ";

				$result = $connection->query($sql1);
				
				if($result->num_rows > 0)
				{
					?>
					<table id="tblSearch">
					<tr>
						<th>Member ID</th><th>Message</th><th>Sent Date</th><th>Current Status</th>
					</tr>
					<?php
					while($row=$result->fetch_assoc())
					{
						echo "<tr>
								<td>".$row['registerNo']."</td>
								<td>".$row['msg']."</td>
								<td>".$row['date']."</td>
								<td>".$row['status']."</td>
							</tr>";
					}
					?>
					</table>
					<?php
				}
				else
				{
					print("Unable to send message to member :::ERROR:::".$connection->error);
				}
			$connection->close();
			}

		?>
	</div>

	<footer>
		<div class="BottomMost">
			<span class="BottomMostSpan1">
				&copy; rabBIT Developers, WBS Team 2019
			</span>
		</div>
	</footer>

</div>

</body>
</html>