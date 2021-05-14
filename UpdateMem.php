<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
	<script src="alert.js"></script>
	<link rel="stylesheet" href="UpdateMem.css">
	<title>Admin-Update Member Details</title>
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
		<button class="okay" onclick="Alert.okdeletemem()">
			OK
		</button>
	</div>

	<?php

		$category=$regno=$fname=$mname=$lname=$address=$gender=$email=$username=$pwd="";
		$categoryErr=$regnoErr=$fnameErr=$mnameErr=$lnameErr=$addressErr=$genderErr=$emailErr=$usernameErr=$pwdErr="";

		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			if(empty($_POST['txtCategory']))
			{
				$categoryErr = "*";
			}
			else
			{
				$category = sec_data($_POST['txtCategory']) ;
			}
			if(empty($_POST['txtRegno']))
			{
				$regnoErr = "*";
			}
			else
			{
				$regno = sec_data($_POST['txtRegno']) ;
			}
			if(empty($_POST['txtfname']))
			{
				$fnameErr = "*";
			}
			else
			{
				$fname = sec_data($_POST['txtfname']) ;
			}
			if(empty($_POST['txtmname']))
			{
				$mnameErr = "*";
			}
			else
			{
				$mname = sec_data($_POST['txtmname']) ;
			}
			if(empty($_POST['txtlname']))
			{
				$lnameErr = "*";
			}
			else
			{
				$lname = sec_data($_POST['txtlname']) ;
			}
			if(empty($_POST['txtAddress']))
			{
				$addressErr = "*";
			}
			else
			{
				$address = sec_data($_POST['txtAddress']) ;
			}
			if(empty($_POST['txtGender']))
			{
				$genderErr = "*";
			}
			else
			{
				$gender = sec_data($_POST['txtGender']) ;
			}
			if(empty($_POST['txtEmail']))
			{
				$emailErr = "*";
			}
			else
			{
				$email = sec_data($_POST['txtEmail']) ;
			}
			if(empty($_POST['txtuname']))
			{
				$usernameErr = "*";
			}
			else
			{
				$username = sec_data($_POST['txtuname']) ;
			}
			if(empty($_POST['txtpwd']))
			{
				$pwdErr = "*";
			}
			else
			{
				$pwd = sec_data($_POST['txtpwd']) ;
			}
		}


		function sec_data($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		if(isset($_POST['btnUpdate']))
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
				$connection->close();
			}
			else
			{
				
				$sql = "UPDATE member SET category='$category',firstName='$fname',middleName='$mname',lastName='$lname',address='$address',gender='$gender',email='$email',username ='$username',password = '$pwd' WHERE registerNo='$regno' ";

				if($connection->query($sql))
				{
					?>
					<script type="text/javascript">
						Alert.updatemem();
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
					$connection->close();
				}
			}
		}
	?>
	<div id="TOP">
  		<h1><marquee>Library Management System-Lowa State University- Librarian Console</marquee></h1>
	</div>

	<div id="button">
		<a href="Member.php" id="btnBack">Back</a>	
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
				<td>Category</td>
				<td>
					<input type="text" class="txtbox" name="txtCategory" value="<?php echo $_GET['ct']?>"/>
				</td>
			</tr>
			<tr>
				<td>Register No</td>
				<td>
					<input type="text" class="txtbox" name="txtRegno" value="<?php echo $_GET['rg']?>" readonly/>
				</td>
			</tr>
			<tr>
				<td>First Name</td>
				<td>
					<input type="text" class="txtbox" name="txtfname" value="<?php echo $_GET['fn']?>"></td>
				</td>
			</tr>
			<tr>
				<td>Middle Name</td>
				<td>
					<input type="text" class="txtbox" name="txtmname" value="<?php echo $_GET['mn']?>"></td>
				</td>
			</tr>
			<tr>
				<td>Last name</td>
				<td>
					<input type="text" class="txtbox" name="txtlname" value="<?php echo $_GET['ln']?>"></td>
				</td>
			</tr>
			<tr>
				<td>Address</td>
				<td>
					<input type="text" class="txtbox" name="txtAddress" value="<?php echo $_GET['ad']?>"></td>
				</td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>
					<input type="text" class="txtbox" name="txtGender" value="<?php echo $_GET['gn']?>"></td>
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>
					<input type="text" class="txtbox" name="txtEmail" value="<?php echo $_GET['em']?>"></td>
				</td>
			</tr>
			<tr>
				<td>Username</td>
				<td>
					<input type="text" class="txtbox" name="txtuname" value="<?php echo $_GET['us']?>"></td>
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
					<input type="text" class="txtbox" name="txtpwd" value="<?php echo $_GET['pwd']?>"></td>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" class="inputbtn" name="btnUpdate" value="Update Member Details"></td>
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