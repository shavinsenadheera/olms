<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
	<script src="alert.js"></script>
	<link rel="stylesheet" href="Update.css">
	<title>Admin-Update Book Details</title>
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
		<button class="okay" onclick="Alert.okdeletebook()">
			OK
		</button>
	</div>

	<?php
		//Get data when submitted the form
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			//When Submit button click execute the Update function
			if(isset($_POST['btnUpdate']))
			{
				//Check combo boxes and textboxes are empty or not
				if(empty($_POST['txtCategory'])||empty($_POST['txtID'])||empty($_POST['txtTitle'])||empty($_POST['txtAuthor'])||empty($_POST['txtPublisher'])||empty($_POST['txtISBN'])||empty($_POST['txtYear'])||empty($_POST['txtPrice'])||empty($_POST['txtLanguage'])||empty($_POST['txtQty']))
				{
					?>
					<script type="text/javascript">
						alert("Please fill the form..");
					</script>
					<?php
				}
				else
				{
					//Execute update function
					upadetBook();
				}
			}
		}
		
		//Create function update
		function upadetBook()
		{
			//Create requirements to connect to the sever
			$server = "localhost";
			$uname = "root";
			$password = "";
			$db ="lms";

			//Create connection to MySQL Server
			$connection = new mysqli($server,$uname,$password,$db);

			//Check if conenction error or not
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
				//Create update query
				$sql = "UPDATE book SET category='$_POST[txtCategory]',title='$_POST[txtTitle]',author='$_POST[txtAuthor]',publisher='$_POST[txtPublisher]',isbn='$_POST[txtISBN]',year='$_POST[txtYear]',price='$_POST[txtPrice]',language='$_POST[txtLanguage]',qty ='$_POST[txtQty]' WHERE id='$_POST[txtID]'";

				//Check the sql query is executed or not
				if($connection->query($sql)==TRUE)
				{
					?>
					<script type="text/javascript">
						Alert.updatebook();
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
			//Close the server connection
			$connection->close();
		}
	?>
	<div id="TOP">
  		<h1><marquee>Library Management System-Lowa State University- Librarian Console</marquee></h1>
	</div>

	<div id="button">
		<a href="UpdateDelete.php" id="btnBack">Back Page</a>	
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
				<td>
					<label>
						Category
					</label>
				</td>
				<td>
					<input type="text" class="txtbox" name="txtCategory" value="<?php echo $_GET['ct'];?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label>
						ID
					</label>
				</td>
				<td>
					<input type="text" class="txtbox" name="txtID" value="<?php echo $_GET['id']?>" readonly/>
				</td>
			</tr>
			<tr>
				<td>
					<label>
						Title
					</label>
				</td>
				<td>
					<input type="text" class="txtbox" name="txtTitle" value="<?php echo $_GET['tt']?>"></td>
				</td>
			</tr>
			<tr>
				<td>
					<label>
						Author
					</label>
				</td>
				<td>
					<input type="text" class="txtbox" name="txtAuthor" value="<?php echo $_GET['at']?>"></td>
				</td>
			</tr>
			<tr>
				<td>
					<label>
						Publisher
					</label>
				</td>
				<td>
					<input type="text" class="txtbox" name="txtPublisher" value="<?php echo $_GET['pb']?>"></td>
				</td>
			</tr>
			<tr>
				<td>
					<label>
						ISBN
					</label>
				</td>
				<td>
					<input type="text" class="txtbox" name="txtISBN" value="<?php echo $_GET['in']?>"></td>
				</td>
			</tr>
			<tr>
				<td>
					<label>
						Year
					</label>
				</td>
				<td>
					<input type="text" class="txtbox" name="txtYear" value="<?php echo $_GET['yr']?>"></td>
				</td>
			</tr>
			<tr>
				<td>
					<label>
						Price Rs.
					</label>
				</td>
				<td>
					<input type="text" class="txtbox" name="txtPrice" value="<?php echo $_GET['pr']?>"></td>
				</td>
			</tr>
			<tr>
				<td>
					<label>
						Language
					</label>
				</td>
				<td>
					<input type="text" class="txtbox" name="txtLanguage" value="<?php echo $_GET['ln']?>"></td>
				</td>
			</tr>
			<tr>
				<td>
					<label>
						Quantity
					</label>
				</td>
				<td>
					<input type="text" class="txtbox" name="txtQty" value="<?php echo $_GET['qty']?>"></td>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input onclick="upadetBook()" type="submit" class="inputbtn" name="btnUpdate" value="Update Book Details"></td>
				</td>
			</tr>
		</table>
	</form>
	</div>
</body>

	<footer>
		<div class="BottomMost">
			<span class="BottomMostSpan1">
				&copy; rabBIT Developers, WBS Team 2019
			</span>
		</div>
	</footer>

</html>