<!doctype html>
<html>
<head>

<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
<script src="alert.js"></script>

<link rel="stylesheet" href="MorderBook1.css">
<title>LMS - Order Books</title>
</head>

<body>

	<div id="PopOverlay">
	</div>
	<div id="PopUp">
		<u><p id="topic">
		</p></u>
		<span id="content" clsss="content">
		</span>
		<button class="okay" onclick="Alert.orderok()">
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
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
			<table id="tblslideMiddlediv">
				<tr>
					<td>
						Register No
					</td>
					<td>
						<input type="text" name="txtregNo" class="txtBox" value="<?php echo $_GET['rno']?>" readonly/>
					</td>
				</tr>
				<tr>
					<td>
						Book ID
					</td>
					<td>
						<input type="text" name="txtId" class="txtBox" value="<?php echo $_GET['id']?>" readonly/>
					</td>
				</tr>
				<tr>
					<td id="tdBack">
						<input type="submit" onclick="Back()" name="btnBack" class="btnInput1" value="Back"/>
					</td>
					<td id="tdConfirm">
						<input type="submit" onclick="confirmBook()" name="btnConfirm" class="btnInput2" value="Confirm Book"/>
					</td>
				</tr>
			</table>
		</form>
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

		<?php
			if($_SERVER['REQUEST_METHOD']=="POST")
			{
				if(isset($_POST['btnBack']))
				{
					Back();
				}
				if(isset($_POST['btnConfirm']))
				{
					confirmBook();
				}
			}

			function Back()
			{
				?>
				<script>
					window.location = "MorderBook.php";
				</script>
				<?php
			}

			function confirmBook()
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
				}
				else
				{
					$sql1 = "INSERT INTO orderbook(registerNo,id) VALUES('$_POST[txtregNo]','$_POST[txtId]')";
					if($connection->query($sql1)==TRUE)
					{
						?>
						<script type="text/javascript">
							Alert.orderdone();
						</script>
						<?php
					}
					else
					{
						?>
						<script type="text/javascript">
							Alert.ordercancel();
						</script>
						<?php
					}
				}
			}
		?>	



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