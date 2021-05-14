<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script src="alert.js"></script>
<link rel="stylesheet" href="MprofileChange1.css">
<title>LMS - Profile Change</title>
</head>

<body>

	<div id="PopOverlay">
	</div>
	<div id="PopUp">
		<u><p id="topic">
		</p></u>
		<span id="content" clsss="content">
		</span>
		<button class="okay" onclick="Alert.profileok()">
			OK
		</button>
	</div>

	<div id="TOPdiv">
  		<h1><marquee><span id="a">L</span><span id="b">i</span><span id="c">b</span></span><span id="d">r</span><span id="e">a</span></span><span id="f">r</span><span id="g">y</span> <span id="a">M</span></span><span id="b">a</span><span id="c">n</span><span id="d">a</span><span id="e">g</span><span id="f">e</span><span id="g">m</span><span id="a">e</span><span id="b">n</span><span id="c">t</span> <span id="d">S</span><span id="e">y</span><span id="f">s</span><span id="g">t</span><span id="a">e</span><span id="b">m</span> - </span> <span id="c">L</span></span><span id="d">o</span></span><span id="e">w</span></span><span id="f">a</span> </span><span id="f">S</span></span><span id="g">t</span></span><span id="a">a</span></span><span id="b">t</span></span><span id="c">e</span> </span><span id="d">U</span></span><span id="e">n</span></span><span id="f">i</span></span><span id="g">v</span></span><span id="a">e</span></span><span id="b">r</span></span><span id="c">s</span></span><span id="d">i</span></span><span id="e">t</span></span><span id="f">y</span></marquee></h1>
	</div>

	<div id="TOPbotdiv">
		<table id="tblTOPbotdiv">
			<tr>
				<td>
					<span id="hiUser">
						<?php
							session_start();
							 echo "Hello! ".$_SESSION['su'];
						?>
					</span>
				</td>
			</tr>
		</table>
	</div>

	<div id="maindiv">
		<div id="slideLeftdiv">
			<table id="tblslideLeftdiv">
				<tr>
					<td>
						<button onclick="refresh()">HOME</button>
					</td>
				</tr>
				<tr>
					<td>
						<button onclick="services()">SERVICES</button>
					</td>
				</tr>
				<tr>
					<td>
						<button onclick="aboutUS()">ABOUT US</button>
					</td>
				</tr>
				<tr>
					<td>
						<button id="logOUT" onclick="logOUT()">LOG OUT</button>
					</td>
				</tr>
			</table>
		</div>

		<div id="slideMiddlediv">
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<table id="tblSearch">
			<tr>
				<td>Category</td>
				<td id="tdValue">
					<input type="text" class="txtbox" name="txtCategory" value="<?php echo $_GET['ctry'];?>" readonly/>
				</td>
			</tr>
			<tr>
				<td>Register No</td>
				<td id="tdValue">
					<input type="text" class="txtbox" name="txtMID" value="<?php echo $_GET['rgno']?>" readonly/>
				</td>
			</tr>
			<tr>
				<td>First Name</td>
				<td id="tdValue">
					<input type="text" class="txtbox" name="txtFname" value="<?php echo $_GET['fname']?>"></td>
				</td>
			</tr>
			<tr>
				<td>Middle Name</td>
				<td id="tdValue"> 
					<input type="text" class="txtbox" name="txtMname" value="<?php echo $_GET['mname']?>"></td>
				</td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td id="tdValue">
					<input type="text" class="txtbox" name="txtLname" value="<?php echo $_GET['lname']?>"></td>
				</td>
			</tr>
			<tr>
				<td>Address</td>
				<td id="tdValue">
					<input type="text" class="txtbox" name="txtaddrs" value="<?php echo $_GET['adrs']?>"></td>
				</td>
			</tr>
			<tr>
				<td>Gender</td>
				<td id="tdValue">
					<select class="comboBox" name="txtGender">
						<option>
							<?php
							 echo $_GET['gndr'];
							?>
						</option>
						<option>
							<?php
								if($_GET['gndr']=="Male")
								{
									echo "Female</option>
									<option>Other";
								}
								elseif($_GET['gndr']=="Female")
								{
									echo "Male</option>
									<option>Other";
								}
								else
								{
									echo "Male</option>
									<option>Female";
								}
							?>
						</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td id="tdValue">
					<input type="text" class="txtbox" name="txtEmail" value="<?php echo $_GET['eml']?>"></td>
				</td>
			</tr>
			<tr>
				<td>Contact No</td>
				<td id="tdValue">
					<input type="text" class="txtbox" name="txtConno" value="<?php echo $_GET['cntno']?>"></td>
				</td>
			</tr>
			<tr>
				<td>Username</td>
				<td id="tdValue">
					<input type="text" class="txtbox" name="txtUname" value="<?php echo $_GET['uname']?>"></td>
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td id="tdValue">
					<input type="text" class="txtbox" name="txtPWD" value="<?php echo $_GET['pwd'] ; ?>"></td>
				</td>
			</tr>
			<tr>
				<td id="tdEmpty"></td>
				<td id="tdValue">
					<input onclick="updateProfile()" type="submit" class="inputbtn" name="btnUpdate" value="Update">
				</td>
			</tr>
		</table>
		</form>
	</div>

		<?php
			if($_SERVER['REQUEST_METHOD']=="POST")
			{
				if(isset($_POST['btnUpdate']))
				{
					if(empty($_POST['txtFname']) || empty($_POST['txtLname'])|| empty($_POST['txtaddrs']) || empty($_POST['txtGender'])||empty($_POST['txtEmail']) || empty($_POST['txtConno'])||empty($_POST['txtUname'])||empty($_POST['txtPWD']))
					{
						?>
						<script type="text/javascript">
							Alert.fillform();
						</script>
						<?php
					}
					else
					{
						updateProfile();
					}
				}
			}
			function updateProfile()
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
					$sql = "UPDATE member SET firstName='$_POST[txtFname]',middleName='$_POST[txtMname]',lastName='$_POST[txtLname]',address='$_POST[txtaddrs]',gender='$_POST[txtGender]',email='$_POST[txtEmail]',contactNo='$_POST[txtConno]',username ='$_POST[txtUname]', password= '$_POST[txtPWD]' WHERE registerNo='$_POST[txtMID]'";

					if($connection->query($sql)==TRUE)
					{
						?>
						<script type="text/javascript">
							Alert.profilechange();
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
		?>

		<div id="slideRightdiv">
			<h3>NEWS UPDATE!</h3>
			<span id="news">
				<marquee>
					Online book reading feature is upcoming!:::
					Mr. Maithreepala Sirisena promises to donate 1000$ for LMS
				</marquee>
			</span>

			<div class="mySlides fade">
 		
 				<div class="numbertext">1 / 3</div>
  					<img id="slide" src="L1.jpg">
 			 	<div class="caption">Lowa State Library</div>
			</div>

			<div class="mySlides fade">
  				<div class="numbertext">2 / 3</div>
  					<img id="slide" src="L3.jpg">
  				<div class="caption">Lowa State Library</div>
			</div>

			<div class="mySlides fade">
  				<div class="numbertext">3 / 3</div>
  					<img id="slide" src="L4.jpg">
 				<div class="caption">Lowa State Library</div>
			</div>

		</div>
	</div>


	<script type="text/javascript">
		function refresh()
		{
			window.location ="student.php";
		}
		function services()
		{
			window.location ="services.php";
		}
		function aboutUS()
		{
			window.location ="aboutUS.php";
		}
		function logOUT()
		{
			window.location = "mainForm.php";
		}
		var slideIndex = 0;

		showSlides();	

		function showSlides()
		{
  			var i;
  			var slides = document.getElementsByClassName("mySlides");
  			var dots = document.getElementsByClassName("dot");
  			for (i = 0; i < slides.length; i++) 
  			{
    			slides[i].style.display = "none";  
 			}
 			slideIndex++;
  			if (slideIndex > slides.length) 
  			{
  				slideIndex = 1;
  			}    
 			for (i = 0; i < dots.length; i++) 
 			{
    			dots[i].className = dots[i].className.replace(" active", "");
  			}
 			slides[slideIndex-1].style.display = "block";  
  			setTimeout(showSlides, 2000);
		}
	</script>


	<div id="footerdiv">
		<h3>
				&copy; rabBIT Developers, WBS Team 2019
		</h3>
	</div>


</body>
</html>