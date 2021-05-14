<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content= "width=device-width, initial-scale=1.0"> 
	<title>Library Management System</title>
	<link rel="stylesheet" href="mainForm.css">
	<script src="alert.js"></script>
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
		<button class="okay" onclick="Alert.oklogin()">
			OK
		</button>
	</div>

<?php
	$username=$password="";
	$usernameErr = $passwordErr="";
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		if(empty($_POST['username']))
		{
		?>
			<script>
				Alert.erruser();
			</script>
		<?php
		}
		else
		{
			$username=$_POST['username'];
		}

		if(empty($_POST['password']))
		{
		?>
			<script>
				Alert.errpwd();
			</script>
		<?php
		}
		else
		{
			$password=$_POST['password'];
		}

	}
?>

<?php
	session_start();
	if(isset($_POST['btnlogin']))
	{
		$server = "localhost";
		$uname = "root";
		$pwd = "";
		$db = "lms";

		$connection = new mysqli($server,$uname,$pwd,$db);

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
			$sql = "SELECT * FROM member WHERE username='$username' && password='$password'";

			$result = $connection->query($sql);
			if($result->num_rows==1)
			{
				while($row=$result->fetch_assoc())
				{
					$category = $row['category'];
					if($category=="Student")
					{
						$_SESSION['su'] = $row['firstName']." ".$row['middleName']." ".$row['lastName'];
						$_SESSION['sun'] = $row['username'];
						$_SESSION['srg'] = $row['registerNo'];
						?>
						<script>
							window.location="student.php";
						</script>
						<?php
					}
					if($category=="Proffesor")
					{
						$_SESSION['su'] = $row['firstName']." ".$row['middleName']." ".$row['lastName'];
						$_SESSION['sun'] = $row['username'];
						$_SESSION['srg'] = $row['registerNo'];
					?>
						<script type="text/javascript">
							window.location="proffesor.php";
						</script>
					<?php
					}
					if($category=="Admin")
					{
						$_SESSION['u'] = $row['firstName']." ".$row['middleName']." ".$row['lastName'];
						$_SESSION['un'] = $row['username'];
						$_SESSION['rg'] = $row['registerNo'];
					?>
						<script type="text/javascript">
							window.location="LibrarianForm.php";
						</script>
					<?php
					}
				}
			}
		}
	}

?>

<div id="TOP">
  <h1><marquee>Library Mangement System-Lowa State University</marquee></h1>
</div>
<div id="LOGIN">
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		<table id="mainFormTable">
			<tr>
				<td>
					<input type="text" name="username" class="txtBox" placeholder="Username..." autocomplete="off"/>
				</td>
			</tr>

			<tr>
				<td>
					<input type="password" name="password" class="txtBox" placeholder="Password..." autocomplete="off"/>
				</td>
			</tr>

			<tr>
				<td>
					<input type="submit" name="btnlogin" class="button" value="Log In"/>
				</td>
			</tr>
			<tr>
				<td>
					<a href="signup.php"><button type="button" id="btnsignup" class="button">Sign Up</button></a>
				</td>
			</tr>
		</table>
			<p id="warning">If you don't have an account please sign up.</p>
			<p id="warning"><a href="ForgotPWD.php" id="aforgotpwd">If you have forgotten you'r password ?</a></p>
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