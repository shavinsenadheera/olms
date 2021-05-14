<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script src="signup.js"></script>
<script src="alert.js"></script>
<link rel="stylesheet" href="signup.css">

<title>LMS-Signup Form</title>

<style type="text/css">
	span
	{
		color: red;
	}
</style>

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
		<button class="okay" onclick="Alert.ok()">
			OK
		</button>
	</div>



	<div id="TOP">
 		 <h1><marquee>Library Management System-Lowa State University</marquee></h1>
	</div>

	<div id="secondTop">
		<marquee><span id="slide"></span></marquee>
		<script>
			ele = document.getElementById("slide");
			Slide();
		</script>
	</div>


<?php
	//Create and initialize the variable
	$category=$regno = $firstname = $middlename = $lastname = $address =$gender = $email=$contactno = $username=$password=$re_password=""; 
	$categoryErr=$regnoErr = $firstnameErr = $middlenameErr = $lastnameErr = $addressErr =$genderErr = $emailErr=$contactnoErr = $usernameErr=$passwordErr=$re_passwordErr=""; 

	//Get data from submitted form 
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		//check th entire textboxs and combo boxes are empty or not
		if(empty($_POST['comboBox']) || $_POST['comboBox']=="Select a category")
		{
			$categoryErr = "*";
		}
		else
		{
			$category = sec_data($_POST['comboBox']);
		}
			
		if(empty($_POST['regno']))
		{
			$regnoErr = "*";
		}
		else
		{
			$regno = sec_data($_POST['regno']);
		}

		if(empty($_POST['firstname']))
		{
			$firstnameErr = "*";
		}
		else
		{
			$firstname = sec_data($_POST['firstname']);
		}

		if(empty($_POST['middlename']))
		{
			$middlenameErr = " ";
		}
		else
		{
			$middlename = sec_data($_POST['middlename']);
		}

		if(empty($_POST['lastname']))
		{
			$lastnameErr = "*";
		}
		else
		{
			$lastname = sec_data($_POST['lastname']);
		}

		if(empty($_POST['address']))
		{
			$addressErr = "*";
		}
		else
		{
			$address = sec_data($_POST['address']);
		}

		if(empty($_POST['gender']))
		{
			$genderErr = "*";
		}
		else
		{
			$gender = sec_data($_POST['gender']);
		}

		if(empty($_POST['email']))
		{
			$emailErr = "*";
		}
		else
		{
			$email = sec_data($_POST['email']);
		}

		if(empty($_POST['contactno']))
		{
			$contactnoErr = "*";
		}
		else
		{
			$contactno = sec_data($_POST['contactno']);
		}

		if(empty($_POST['username']))
		{
			$usernameErr = "*";
		}
		else
		{
			$username = sec_data($_POST['username']);
		}

		if(empty($_POST['password']))
		{
			$passwordErr = "*";
		}
		else
		{
			$password = sec_data($_POST['password']);
		}

		if(empty($_POST['re_password']))
		{
			$re_passwordErr = "*";
		}
		else
		{
			$re_password = sec_data($_POST['re_password']);
		}
	}
	//Secure data
	function sec_data($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>

<?php
	//Execute Insert query when click the Submit button
	if(isset($_POST['btnSubmit']))
	{
		//Check the password is matched with re pasword or not
		if($password!=$re_password)
		{
			?>
			<script>
					Alert.pwd();
			</script>
			<?php
		}
		else if($category = "" || $registerNo = "" || $firstname = "" || $lastname = "" || $address = "" || $email = "" || $contactno = "" || $username ="" || $password = "" || $re_password = "")
		{
			?>
			<script>
					Alert.fillform();
			</script>
			<?php			
		}
		else
		{
		//Server Requirements
		$server = "localhost";
		$uname = "root";
		$pwd = "";
		$db = "lms";

		//Create MySQL Server Connection
		$connection = new mysqli($server,$uname,$pwd,$db);

		//Check connection error of server or not
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
			$sql = "INSERT INTO member(category,registerNo,firstName,middleName,lastName,address,gender,email,contactNo,username,password,repassword) VALUE('$category','$regno','$firstname','$middlename','$lastname','$address','$gender','$email','$contactno','$username','$password','$re_password')";
			if($connection->query($sql)==TRUE)
			{
				?>
				<script type="text/javascript">
					Alert.register();
				</script>
				<?php
			}
			else
			{
				?>
				<script type="text/javascript">
					Alert.error();
				</script>	
				<?php
			}
		}
	}
	}
?>
<div id="mainBody">
	<div id="firstbody">
		<span class="caption">Welcome to Lowa State Library Student/Proffesor Registration Unit!</span>
		<img src="L8.jpg" height="700px" width="100%">
	</div>
	<div id="secondbody">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<table id="signTable">
				<tr>
					<td>Category</td>
					<td>
						<select name="comboBox" id="comboBox">
							<option selected>Select a category</option>
							<option value="Student">Student</option>
							<option value="Proffesor">Proffesor</option>
						</select>
						<span><?php echo $categoryErr;?></span>
					</td>
				</tr>
				<tr>
					<td>Register No</td>
					<td>
						<input type="text" class="txtBox" name="regno" autocomplete="off"/>
						<span id="error"><?php echo $regnoErr;?></span>
					</td>
				</tr>
				<tr>
					<td>First Name</td>
					<td>
						<input type="text" class="txtBox" name="firstname" autocomplete="off"/>
						<span id="error"><?php echo $firstnameErr;?></span>
					</td>
				</tr>
				<tr>
					<td>Middle Name</td>
					<td>
						<input type="text" class="txtBox" name="middlename" autocomplete="off"/>
						<span id="error"><?php echo $middlenameErr;?></span>
					</td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td>
						<input type="text" class="txtBox" name="lastname" autocomplete="off"/>
						<span id="error"><?php echo $lastnameErr;?></span>
					</td>
				</tr>
				<tr>
					<td>Address</td>
					<td>
						<input type="text" class="txtBox" name="address" autocomplete="off"/>
						<span id="error"><?php echo $addressErr;?></span>
					</td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>
						<input type="radio" name="gender" <?php if(isset($gender) && $gender=="Male") echo "checked";?> value="Male"/>
						Male
						<span id="error"><?php echo $genderErr;?></span>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="radio" name="gender" <?php if(isset($gender) && $gender=="Female") echo "checked";?>  value="Female"/>
						Female
						<span id="error"><?php echo $genderErr;?></span>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="radio" name="gender" <?php if(isset($gender) && $gender=="Other") echo "checked";?>  value="Other"/>
						Other
						<span id="error"><?php echo $genderErr;?></span>
					</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>
						<input type="text" class="txtBox" name="email" autocomplete="off"/>
						<span id="error">
							<?php echo $emailErr;?>	
						</span>
					</td>
				</tr>
				<tr>
					<td>Contact No</td><td><input type="text" class="txtBox" name="contactno" autocomplete="off"/><span id="error"><?php echo $contactnoErr;?></span></td>
				</tr>
				<tr>
					<td>Username</td><td><input type="text" class="txtBox" name="username" autocomplete="off"/><span id="error"><?php echo $usernameErr;?></span></td>
				</tr>
				<tr>
					<td>Password</td><td><input type="password" class="txtBox" name="password" autocomplete="off"/><span id="error"><?php echo $passwordErr;?></span></td>
				</tr>
				<tr>
					<td>re-Password</td><td><input type="password" class="txtBox" name="re_password" autocomplete="off"/><span id="error"><?php echo $re_passwordErr;?></span></td>
				</tr>
				<tr>
					<td></td><td><input type="submit" class="btnSubmit" name="btnSubmit" value="Register"/></td>
				</tr>
			</table>
		</form>
	</div>
</div>


		<div class="BottomMost">
			<span class="BottomMostSpan1">
				&copy; rabBIT Developers, WBS Team 2019
			</span>
		</div>



</body>
</html>