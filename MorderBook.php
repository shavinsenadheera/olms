<!doctype html>
<html>
<head>

<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 

<link rel="stylesheet" href="MorderBook.css">
<title>LMS - Order Books</title>
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
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
			<table id="tblslideMiddlediv">
				<tr>
					<td>
						<select class="combobox" name="txtCategory">
							<option value="not selected">---Select Category---</option>
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
								$sql1 = "SELECT category FROM category";
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
					<td>
						<input type="submit" class="btnSearch" name="btnSearch" value="Search" onclick="search()" />
					</td>
				</tr>
			</table>

		<?php	
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			if(isset($_POST['btnSearch']))
			{
				if(empty($_POST['txtCategory']))
				{
				?>
				<script type="text/javascript">
					alert("Please search some category...");
				</script>
				<?php
				}
				else
				{
					Search();
				}
			}
		}
		function Search()
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
				$sql1 = "SELECT * FROM book WHERE category = '$_POST[txtCategory]'";
				$result = $connection->query($sql1);
				if($result->num_rows>0)
				{
					while($row = $result->fetch_assoc())
					{
						if($row['qty'] > 0)
						{
						?>
						<table id="tblSearch">
							<caption>
								<?php echo  $row['title'] ?>
							</caption>
						<?php
						echo "<tr>
							<td>Book Library ID</td><td>".$row['id']."</td></tr>
							<td>AUTHOR</td><td>".$row['author']."</td></tr>
							<tr><td>PUBLISHER</td><td>".$row['publisher']."</td></tr>
							<tr><td>ISBN</td><td>".$row['isbn']."</td></tr>
							<tr><td>YEAR</td><td>".$row['year']."</td></tr>
							<tr><td>LANGUAGE</td><td>".$row['language']."</td></tr>
							<tr><td id='tdOrder'></td><td id='tdOrder'><a href='MorderBook1.php?id=$row[id]&rno=$_SESSION[srg]' class='linkOrder' name='btnOrder'>Order Book</a></td></tr>
							<p>";
						}
					}
					?>
					<?php
					}
					else
					{
						?>
						<br>
						<span id="nonew">No available book</span>
						<?php
					}
				}
				$connection->close();
			}
		?>
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