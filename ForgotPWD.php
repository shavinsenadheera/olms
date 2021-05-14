<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="ForgotPWD.css">
	<title>Forgot Password</title>
</head>
<body>
	<div id="TOP">
  		<h1><marquee>Library Mangement System-Lowa State University</marquee></h1>
	</div>
	<div class="SecondTop">
	<div id="divForm">
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<table id="tblForm">
				<tr>
					<td>
						Email
					</td>
				</tr>

				<tr>
					<td>
						<input type="text" name="txtEmail" class="txtBox" placeholder="Enter you'r email..." autocomplete="off"/>
					</td>
				</tr>
				<tr>
					<td>
						<input onclick="Sendmail()" type="submit" name="btnNext" class="inputbtn" value="Next">
					</td>
				</tr>
			</table>
		</form>
	</div>

	<?php
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		if(isset($_POST['btnNext']))
		{
			Sendmail();
		}
	}

	function Sendmail()
	{
		require 'PHPMailer-master/PHPMailerAutoload.php';
		$mail = new PHPMailer();
		$mail ->IsSmtp();
		$mail ->SMTPDebug = 1;
		$mail ->SMTPAuth = true;
		$mail ->SMTPSecure = 'ssl';
		$mail ->Host = "smtp.gmail.com";
		$mail ->Port = 465;
		$mail ->IsHTML(true);
		$mail ->Username = "rabBITDevs@gmail.com";
		$mail ->Password = "1998#Shavind";
		$mail ->SetFrom("rabBITDevs@gmail.com");
		$mail ->Subject = "rabBIT Devs - Reset The Password";
		$mail ->Body = "OTP code is 1234";
		$mail ->AddAddress($_POST['txtEmail']);

		if(!$mail->Send())
		{
			echo "Mail not send...";
		}
		else
		{
			echo "Mail sent...";
		}
	}
	?>

</body>
</html>