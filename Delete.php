<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
	<script src="alert.js"></script>
	<link rel="stylesheet" href="Delete.css">
	<title>Admin-Delete book</title>
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
		<form method="POST" action = "<?php echo $_SERVER['PHP_SELF']?>">
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
					<input type="submit" class="inputbtn" name="btnDelete" value="Delete Book"></td>
				</td>
			</tr>
		</table>
		</form>
	</div>

<?php
	//Initialize variables
	$category=$id=$title=$author=$publisher=$isbn=$year=$price=$language=$qty="";
	$categoryErr=$idErr=$titleErr=$authorErr=$publisherErr=$isbnErr=$yearErr=$priceErr=$languageErr=$qtyErr="";
	//Get data from submitted form
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
			//Check textboxes are empty or not
			if(empty($_POST['txtCategory']))
			{
				$categoryErr = "*";
			}
			else
			{
				$category = sec_data($_POST['txtCategory']) ;
			}
			if(empty($_POST['txtID']))
			{
				$idErr = "*";
			}
			else
			{
				$id = sec_data($_POST['txtID']) ;
			}
			if(empty($_POST['txtTitle']))
			{
				$titleErr = "*";
			}
			else
			{
				$title = sec_data($_POST['txtTitle']) ;
			}
			if(empty($_POST['txtAuthor']))
			{
				$authorErr = "*";
			}
			else
			{
				$publisher = sec_data($_POST['txtAuthor']) ;
			}
			if(empty($_POST['txtPublisher']))
			{
				$publisherErr = "*";
			}
			else
			{
				$publisher = sec_data($_POST['txtPublisher']) ;
			}
			if(empty($_POST['txtISBN']))
			{
				$isbnErr = "*";
			}
			else
			{
				$isbn = sec_data($_POST['txtISBN']) ;
			}
			if(empty($_POST['txtYear']))
			{
				$yearErr = "*";
			}
			else
			{
				$year = sec_data($_POST['txtYear']) ;
			}
			if(empty($_POST['txtPrice']))
			{
				$priceErr = "*";
			}
			else
			{
				$price = sec_data($_POST['txtPrice']) ;
			}
			if(empty($_POST['txtLanguage']))
			{
				$languageErr = "*";
			}
			else
			{
				$language = sec_data($_POST['txtLanguage']) ;
			}
			if(empty($_POST['txtQty']))
			{
				$qtyErr = "*";
			}
			else
			{
				$qty = sec_data($_POST['txtQty']) ;
			}
	}
	//Secure data
	function sec_data($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data =  htmlspecialchars($data);
		return $data;
	}
	//Execution delete qnuery when click the delete button
	if(isset($_POST['btnDelete']))
	{
		//Server Requirements
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "lms";

		$connection = new mysqli($servername,$username,$password,$dbname);
		if($connection->connect_error)
		{
			?>
			<script type="text/javascript">
				Alert.errserver();
			</script>
			<?php
			$connection->close();
		}
		else
		{
			$sql = "DELETE FROM book WHERE id = '$id' ";

			if($connection->query($sql))
			{
				?>
					<script type="text/javascript">
						Alert.deletebook();
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