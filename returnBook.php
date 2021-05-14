<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
	<script src="alert.js"></script>
	<link rel="stylesheet" type="text/css" href="returnBook.css">
	<title>Admin - Return Book Maintain</title>
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

	<div id="FormDiv">
		<form method = "POST" action = "<?php echo $_SERVER['PHP_SELF']?>">
			<table id="tblForm">
				<tr>
					<td>Book ID</td><td>
					<input type="text" class="txtbox" name="txtID"/></td>
				</tr>
				<tr>
					<td>Borrower ID</td><td>
					<input type="text" class="txtbox" name="txtMID"/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" onclick="checkBook()" class="inputbtn1" name="btnCheckID" value="Check"/></td>
				</tr>

	<?php
	$id=$idErr="";
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		if(isset($_POST['btnCheckID']))
		{
			if(empty($_POST['txtID'])||empty($_POST['txtMID']))
			{	
			?>
			<script type="text/javascript">
				Alert.Afillform();
			</script>
			<?php
			}
			else
			{
				checkBook();
			}
		}

		elseif(isset($_POST['btnReturn']))
		{
			if(empty($_POST['txtid'])||empty($_POST['txtmid'])||empty($_POST['dtreturn'])||empty($_POST['dttoday'])||$_POST['txtlatedays']==""||$_POST['txtFine']=="")
			{
					?>
					<script type="text/javascript">
						Alert.Afillform();
					</script>
				<?php
			}
			else
			{
				returnBook();
			}
		}
	}

	function checkBook()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "lms";

		$connection = new mysqli($servername, $username, $password, $dbname);
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
			$sql = "SELECT * FROM issue WHERE id = '$_POST[txtID]' AND registerNo = '$_POST[txtMID]' ";

			$result = $connection->query($sql);

			if($result->num_rows == 1)
			{
				while($row = $result->fetch_assoc())
				{
					session_start();
					$_SESSION['redt'] = $row['returndate'];
					echo "<tr>
							<td>
								Book ID
							</td>
							<td>
								<input type='text' class='txtbox' name='txtid' value='$row[id]'>
							</td>
						</tr>
						<tr>
							<td>
								Borrower ID
							</td>
							<td>
								<input type='text' class='txtbox' name='txtmid' value='$row[registerNo]'>
							</td>
						</tr>
						<tr>
							<td>
								Issue Date
							</td>
							<td>
								<input type='date' class='txtbox' name='dtissue' value='$row[issuedate]'>
							</td>
						</tr>
						<tr>
							<td>
								Due Date
							</td>
							<td>
								<input type='date' class='txtbox' name='dtreturn' value='$row[returndate]'>
							</td>
						</tr>
							"
							;
				}
						$connection->close();
				?>
						<tr>
							<td>
								Return Date
							</td>
							<td>
								<input type='date' class='txtbox' name="dttoday" value="<?php $today = date("Y-m-d");
																								echo $today;	?>"/>
							</td>
						</tr>
						<tr>
							<td>Late Days</td>
							<td><input type="text" class="txtbox" name="txtlatedays" value="<?php
															$returndt = strtotime(date("Y-m-d"));
															$duedt= strtotime($_SESSION['redt']);
															if($returndt > $duedt)
															{
																$days = ($returndt - $duedt)/60/60/24;
													
															}
															else
															{
																$days = 0;
															}
															echo $days;?>"/>
							</td>
						</tr>
						<tr>
						<td>Fine</td>
							<td><input type="text" class="txtbox" name="txtFine" value="<?php
																			$fine = "";
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
																						 $fine=$row['fine'];
																					}
																				}
																				else
																				{
																						 $fine=0;
																				}
																			}
																			$connection->close();											
												$returndt = strtotime(date("Y-m-d"));
												$duedt= strtotime($_SESSION['redt']);
												$fineday = $fine;
												if($returndt > $duedt)
												{
													$days = ($returndt - $duedt)/60/60/24;
													
												}
												else
												{
													$days = 0;
												}
												$fined = $fineday*$days;
												echo $fined;
													?>"/>
						<tr>
							<td>
								
							</td>
							<td>
								<input onclick="returnBook()" type="submit" name="btnReturn" class="inputbtn1" value="Return Book"/>
							</td>
						</tr>
			<?php

			}
			else
			{
				?>
				<script type="text/javascript">
					alert("Book is not issued...");
				</script>
				<?php
			}
		}
	}
	?>
					</table>
	

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
				Alert.errserver();
			</script>
			<?php
		}
		else
		{
			$sql1 = "SELECT * FROM returnbook";
			$result = $connection->query($sql1);
			if($result->num_rows>0)
			{
				?>
				<table id="tblSearch">
					<tr>
						<th>Book ID</th><th>Member ID</th><th>Due Date</th><th>Return Date</th><th>Late Days</th><th>Fine Rs.</th><th>Operation</th>
					</tr>
				<?php
				while($row = $result->fetch_assoc())
				{
					echo "<tr>
						<td>".$row['id']."</td>
						<td>".$row['registerNo']."</td>
						<td>".$row['duedate']."</td>
						<td>".$row['returndate']."</td>
						<td>".$row['latedays']."</td>
						<td>".$row['fine']."</td>
						<td><a href='returnUpdate.php?id=$row[id]&regno=$row[registerNo]&due=$row[duedate]&rtrn=$row[returndate]&ltd=$row[latedays]&fne=$row[fine]'>Edit</a></td>
					</tr>";
				}
				?>
				</table>
				<?php
			}
				else
				{
					?>					
						<br>
						<span id="nonew">No Book Found!</span>
						<br>
					<?php
				}
			}
			$connection->close();

	?>
	

				</form>
			</div>
	<?php
		function returnBook()
		{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "lms";

		$connection = new mysqli($servername, $username, $password, $dbname);

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
			$sql = "INSERT INTO returnbook(id,registerNo,duedate,returndate,latedays,fine) VALUES('$_POST[txtid]','$_POST[txtmid]','$_POST[dtreturn]','$_POST[dttoday]','$_POST[txtlatedays]','$_POST[txtFine]');UPDATE book SET qty = qty + 1 WHERE id = '$_POST[txtid]';UPDATE issue SET status='Returned!' WHERE registerNo ='$_POST[txtmid]' AND id ='$_POST[txtid]';UPDATE orderbook SET status = 'Returned!' WHERE registerNo = '$_POST[txtmid]' AND id = '$_POST[txtid]';";

			if(mysqli_multi_query($connection,$sql)==TRUE)
			{
				?>
				<script type="text/javascript">
					Alert.returnbook();
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
				echo $connection->error;
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