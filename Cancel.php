<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
	<script src="alert.js"></script>
	<link rel="stylesheet" href="AddBooks.css">
	<title>Admin-Adding Books</title>
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
		<button class="okay" onclick="Alert.okcancelorder()">
			OK
		</button>
	</div>



<div id="TOP">
  	<h1><marquee>Library Mangement System-Lowa State University- Librarian Console</marquee></h1>
</div>
<div id="button">
	<a href="IssueBook.php" id="btnBack">Back to Page</a>	
</div>
<div id="Form">
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		<table id="tblForm">
			<tr>
				<td>Register ID</td><td><input type="text" class="txtbox" name="txtID" value="<?php echo $_GET['regino'] ;?>" readonly></td>
			</tr>
			<tr>
				<td>Book ID</td><td><input type="text" class="txtbox" name="txtBID" value="<?php echo $_GET['bid'] ;?>" readonly></td>
			</tr>
			<tr>
				<td>Message</td>
				<td>
					<textarea rows="7" cols="6" class="txtbox" name="txtMsg">Dear Member,
						<?php echo $_GET['bid'] ;?> book that you have ordered on <?php echo $_GET['odate']; ?> is canceled by Admin. Because...
					</textarea>
				</td>
			</tr>
			<tr>
				<td></td><td><input onclick="sendMSG()" type="submit" class="inputbtn" name="btnSubmit" value="Send Message"/></td>
			</tr>
		</table>
	</form>
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
					alert("Please fill the form..");
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
				$sql1 = "INSERT INTO message(registerNo,msg) VALUES('$_POST[txtID]','$_POST[txtMsg]');";
				$sql1 .= "UPDATE issue SET status='Canceled!' WHERE registerNo='$_POST[txtID]' AND id='$_POST[txtBID]';";
				$sql1 .= "UPDATE orderbook SET status='Canceled!' WHERE registerNo='$_POST[txtID]' AND id='$_POST[txtBID]';";

				if(mysqli_multi_query($connection,$sql1))
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
<p>
	<footer>
		<div class="BottomMost">
			<span class="BottomMostSpan1">
				&copy; rabBIT Developers, WBS Team 2019
			</span>
		</div>
	</footer>




</body>
</html>