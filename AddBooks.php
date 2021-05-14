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
		<button class="okay" onclick="Alert.okaddbook()">
			OK
		</button>
	</div>


<?php
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		if(isset($_POST['btnSubmit']))
		{
			if(empty($_POST['txtCategory'])||empty($_POST['txtID'])||empty($_POST['txtTitle'])||empty($_POST['txtAuthor'])||empty($_POST['txtPublisher'])||empty($_POST['txtISBN'])||empty($_POST['txtYear'])||empty($_POST['txtPrice'])||empty($_POST['txtLanguage'])||empty($_POST['txtQty']))
			{
								?>
					<script type="text/javascript">
						Alert.fillform();
					</script>
					<?php
			}
			else
			{
				addBook();
			}
		}
	}	
		function sec_data($data)
		{
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		//Create Function of Insert Books
		function addBook()
		{
			//Server Requirements
			$server = "localhost";
			$username = "root";
			$pwd = "";
			$db = "lms";

			//Create MySQL Server Connection
			$connection = new mysqli($server,$username,$pwd,$db);

			//Check connection error of server
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
				//Insert SQL query in PHP Code
				$sql1 = "INSERT INTO book(category,id,title,author,publisher,isbn,year,price,language,qty) VALUES('$_POST[txtCategory]','$_POST[txtID]','$_POST[txtTitle]','$_POST[txtAuthor]','$_POST[txtPublisher]','$_POST[txtISBN]','$_POST[txtYear]','$_POST[txtPrice]','$_POST[txtLanguage]','$_POST[txtQty]')";

				//Check the query is executed or not
				if($connection->query($sql1)==TRUE)
				{
					?>
					<script type="text/javascript">
						Alert.addbook();
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
			//Clode connection
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
				<td>
					<select  onchange="SelectIndexChanged()" class="combobox" name="txtCategory">
						<option value="not selected">---Select Book Category---</option>
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
								$sql1 = "SELECT * FROM category";
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
			</tr>
			<tr>
				<td>
					<input type="text" class="txtbox" name="txtID" placeholder="Book ID..." />
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" class="txtbox" name="txtTitle" placeholder="Book Title..." />
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" class="txtbox" name="txtAuthor" placeholder="Author..." />
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" class="txtbox" name="txtPublisher" placeholder="Publisher..."/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" class="txtbox" name="txtISBN" placeholder="ISBN..."/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" class="txtbox" name="txtYear" placeholder="Published Year..."/>
				</td>
			</tr>
			<tr>	
				<td>
					<input type="text" class="txtbox" name="txtPrice" placeholder="Price Rs."/>
				</td>
			</tr>
			<tr>	
				<td>
					<input type="text" class="txtbox" name="txtLanguage" placeholder="Language..."/>
				</td>
			</tr>
			<tr>	
				<td>
					<input type="text" class="txtbox" name="txtQty" placeholder="Quantity..."/>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" class="inputbtn" name="btnSubmit" value="Add Book"/>
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