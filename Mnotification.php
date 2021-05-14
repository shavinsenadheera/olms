<!doctype html>
<html>
<head>

<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 

<link rel="stylesheet" href="Mnotification.css">
<title>LMS - Notifications</title>
</head>

<body>
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
			<input type="submit" name="btnMarkread" value="Mark as read" onclick="markNoti()">
		</form>
		<?php	
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			if(isset($_POST['btnMarkread']))
			{
				markNoti();
			}
		}


		function markNoti()
		{
			$server = "localhost";
			$uname = "root";
			$password = "";
			$db ="lms";

			$connection = new mysqli($server,$uname,$password,$db);

			if($connection->connect_error)
			{
				$connection->close();
				?>
				<script type="text/javascript">
					alert("Unable to connect with server..");
				</script>
				<?php
			}
			else
			{
				$sql = "UPDATE message SET status='Read!' WHERE registerNo = '$_SESSION[srg]'";

				if($connection->query($sql))
				{
					?>
					<script type="text/javascript">
						window.location = "student.php";
					</script>
					<?php
				}
				else
				{
					?>
					<script type="text/javascript">
						alert("Try again..!");
					</script>
					<?php
				}
			}

		}

			$server = "localhost";
			$uname = "root";
			$password = "";
			$db ="lms";

			$connection = new mysqli($server,$uname,$password,$db);

			if($connection->connect_error)
			{
				$connection->close();
				?>
				<script type="text/javascript">
					alert("Unable to connect with server..");
				</script>
				<?php
			}
			else
			{
				$sql = "SELECT * FROM message WHERE registerNo = '$_SESSION[srg]' AND status='Read!'";
				$result = $connection->query($sql);
				if($result->num_rows>0)
				{
					while($row = $result->fetch_assoc())
					{
						echo "<table id='tblSearch'><tr>
							<th>Message</th><td>".$row['msg']."</td></tr>
							<th>Message Date</th><td>".$row['date']."</td></tr>
							<p></table>";
					}
					?>
					<?php
				}
				else
				{
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
				$connection->close();
				?>
				<script type="text/javascript">
					alert("Unable to connect with server..");
				</script>
				<?php
			}
			else
			{
				$sql = "SELECT * FROM message WHERE registerNo = '$_SESSION[srg]' AND status='Not Read!'";
				$result = $connection->query($sql);
				if($result->num_rows>0)
				{
					while($row = $result->fetch_assoc())
					{
						echo "<table id='tblSearchNoti'><tr>
							<td>Message</td><td>".$row['msg']."</td></tr>
							<td>Message Date</td><td>".$row['date']."</td></tr>
							<p></table>";
					}
					?>
					<?php
				}
				else
				{
					?>
						<br>
						<span id="nonew">No new messages</span>
						<br>
					<?php
				}
			$connection->close();
			}
		?>
		

		</div>

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
		<h3>&copy; rabBIT Developers, WBS Team 2019</h3>
	</div>


</body>
</html>