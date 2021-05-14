<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
	<script src="alert.js"></script>
	<link rel="stylesheet" type="text/css" href="IssueBook.css">
	<title>Admin - Issue Book - Checking Book availability</title>
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
		<button class="okay" onclick="Alert.okissuebook()">
			OK
		</button>
	</div>


	<div id="TOP">
  		<h1><marquee>Library Mangement System-Lowa State University- Librarian Console</marquee></h1>
	</div>

	<div id="button">
			<a href="LibrarianForm.php" id="btnBack">Main Menu</a>
			<a href="IssueBookShow.php" id="btnGOIssue">Issued Info</a>
			<a href="showIssue.php" id="btnGOIssue">Show Issue Books</a>
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
					<td>Book ID</td>
					<td><input type="text" class="txtbox" name="txtID" id="txtID"/></td>
					<td><input onclick="checkID()" type="submit" class="inputbtn" name="btnCheckID" value="Check availability"/></td>
					<td><p id="statusID"></p></td>
					<td></td>
				</tr>
				<tr>
					<td>Member ID</td>
					<td><input type="text" class="txtbox" name="txtMID" id="txtMID"/></td>
					<td><input onclick="checkMID()" type="submit" class="inputbtn" name="btnCheckMID" value="Check availability"/></td>
					<td><p id="statusMID"></p></td>
					<td></td>
				</tr>
				<tr>
					<td>Member Availability</td>
					<td>
						<input onclick="checkAvailability()" type="submit" class="inputbtn1" name="btnCheckAvailability" value="Check availability"/>
					</td>
					<td></td>
					<td><p id="statusAVL"></p></td>
					<td></td>
				</tr>
				<tr>
					<td>Issue Date</td>
					<td><input type="date" class="txtbox" name="dtIssue"/></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Return Date</td>
					<td><input type="date" class="txtbox" name="dtReturn"/></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input onclick="issueBook()" type="submit" class="inputbtn" name="btnissueBook" value="Issue Book"/></td>			
					<td></td>
				</tr>
			</table>

	<?php

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		if(isset($_POST['btnCheckID']))
		{
			if(empty($_POST['txtID']))
			{	
			?>
				<script type="text/javascript">
					Alert.Afillform();
				</script>
			<?php
			}
			else
			{
				checkID();
			}
		}



		elseif(isset($_POST['btnCheckMID']))
		{
			if(empty($_POST['txtMID']))
			{	
			?>
				<script type="text/javascript">
					Alert.Afillform();
				</script>
			<?php
			}
			else
			{
				checkMID();
			}
		}

		elseif(isset($_POST['btnCheckAvailability']))
		{
			if(empty($_POST['txtMID']) || empty($_POST['txtID']))
			{	
			?>
				<script type="text/javascript">
					Alert.Afillform();
				</script>
			<?php
			}
			else
			{
				checkAvailability();
			}
		}

		elseif(isset($_POST['btnissueBook']))
		{
			if(empty($_POST['txtMID']) || empty($_POST['txtID']) || empty($_POST['dtIssue']) || empty($_POST['dtReturn']))
			{	
			?>
				<script type="text/javascript">
					Alert.Afillform();
				</script>
			<?php
			}
			else
			{
				issueBook();
			}
		}

		elseif(isset($_POST['btncheckOrder']))
		{
			checkList();
		}
	}

	function checkID()
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
			$sql = "SELECT * FROM book WHERE id = '$_POST[txtID]' ";

			$result = $connection->query($sql);

			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					if($row['qty']>0)
					{
						session_start();
						$_SESSION['id'] = $row['id'];
						$_SESSION['statusID'] ="okay";
						?>
						<script type="text/javascript">
							document.getElementById('statusID').innerHTML = "okay";
							document.getElementById('txtID').value = "<?= $row['id'] ?>";
						</script>
						<?php
					}
					else
					{
						$_SESSION['statusID'] ="no book available";
						?>
						<script type="text/javascript">
							document.getElementById('statusID').innerHTML = "no book available";
						</script>
						<?php
					}
				}
			}
			else
			{
				$_SESSION['statusID'] ="no book found";
				?>
				<script type="text/javascript">
					document.getElementById('statusID').innerHTML = "no book found";
				</script>
				<?php
			}
		}
		$connection->close();
	}

	function checkMID()
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
			$sql = "SELECT * FROM member WHERE registerNo = '$_POST[txtMID]'; ";

			$result = $connection->query($sql);

			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					session_start();
					$_SESSION['regno'] = $row['registerNo'];
					?>
						<script type="text/javascript">
							document.getElementById('statusMID').innerHTML = "okay";
							document.getElementById('txtMID').value = "<?= $row['registerNo'] ?>";
							document.getElementById('txtID').value = "<?= $_SESSION['id'] ?>";
							document.getElementById('statusID').innerHTML ="<?= $_SESSION['statusID'] ?>";
						</script>
					<?php
				}
			}
			else
			{
				?>
				<script type="text/javascript">
					document.getElementById('statusMID').innerHTML = "no account match";
				</script>
				<?php
			}
		}
		$connection->close();
	}

	function checkAvailability()
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
			$sql = "SELECT * FROM issue WHERE id = '$_POST[txtID]' AND registerNo = '$_POST[txtMID]' AND status='Issued!'; ";

			$result = $connection->query($sql);

			if($result->num_rows >= 1)
			{
				session_start();
				?>
				<script type="text/javascript">
					document.getElementById('statusAVL').innerHTML = "Member borrow same book.";
					document.getElementById('statusMID').innerHTML = "okay";
					document.getElementById('statusMID').innerHTML = "okay";
					document.getElementById('txtMID').value = "<?= $_SESSION['regno'] ?>";
					document.getElementById('txtID').value = "<?= $_SESSION['id'] ?>";
					document.getElementById('statusID').innerHTML ="<?= $_SESSION['statusID'] ?>";
				</script>
				<table id="tblSearch">
					<caption>Issued Books</caption>
					<tr>
						<th>Issue ID</th>
						<th>Book ID</th>
						<th>Member ID</th>
						<th>Issue Date</th>
						<th>Return Date</th>
					</tr>
				<?php
					while($row = $result->fetch_assoc())
					{
						echo "<tr>
								<td>".$row['issueID']."</td>
								<td>".$row['id']."</td>
								<td>".$row['registerNo']."</td>
								<td>".$row['issuedate']."</td>
								<td>".$row['returndate']."</td></tr>";
					}
			}
			else
			{
				session_start();
				?>
				<script type="text/javascript">
					document.getElementById('statusMID').innerHTML = "okay";
					document.getElementById('txtMID').value = "<?= $_SESSION['regno'] ?>";
					document.getElementById('txtID').value = "<?= $_SESSION['id'] ?>";
					document.getElementById('statusID').innerHTML ="<?= $_SESSION['statusID'] ?>";
					document.getElementById('statusAVL').innerHTML = "Passed!";

				</script>
				<?php
			}
		}
		$connection->close();
	}

	function issueBook()
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
			$sql = "INSERT INTO issue(id,registerNo,issuedate,returndate) VALUES('$_POST[txtID]','$_POST[txtMID]','$_POST[dtIssue]','$_POST[dtReturn]');";
			$sql .= "UPDATE book SET qty = qty - 1 WHERE id = '$_POST[txtID]';";
			$sql .= "UPDATE orderbook SET status = 'Issued!' WHERE registerNo = '$_POST[txtMID]' AND id = '$_POST[txtID]';";

			if(mysqli_multi_query($connection, $sql))
			{
				?>
				<script type="text/javascript">
					Alert.issuebook();
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
			$sql1 = "SELECT * FROM orderbook WHERE status='Confirmed! Please Borrow book!' ";
			$result = $connection->query($sql1);
			if($result->num_rows>0)
			{
				?>
				<table id="tblSearch">
					<caption>Order Books</caption>
					<tr>
						<th>Order ID</th><th>Member ID</th><th>Book ID</th><th>Order Date</th><th>Status</th><th>Operations</th>
					</tr>
				<?php
				while($row = $result->fetch_assoc())
				{
					echo "<tr>
						<td>".$row['orderid']."</td>
						<td>".$row['registerNo']."</td>
						<td>".$row['id']."</td>
						<td>".$row['orderdate']."</td>
						<td>".$row['status']."</td>
						<td><a href='Cancel.php?regino=$row[registerNo]&bid=$row[id]&odate=$row[orderdate]'>Cancel</a></td>
					</tr>";
				}
				?>
				<?php
			}
				else
				{
					?>
					<h4>
						No Orders yet! have a rest Admin!
					</h4>
					<?php
				}
			}
	$connection->close();
	?>
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