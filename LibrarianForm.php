<!doctype html>
<html>
<head>

<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
	
<link rel="stylesheet" href="LibrarianForm.css">
<title>Librarian Console</title>
</head>

<body>
	<div id="TOP">
  		<h1><marquee>Library Management System - Lowa State University - Librarian Console</marquee></h1>
	</div>

	<div id="Userdiv">
		<?php
			session_start();
		?>
			<span id="Userp">
		<?php
			print("Hi Admin! ".$_SESSION['u']);
		?>
			</span>

		<a href="mainForm.php" id="btnlogout">Log Out</a>
	</div>

	<div id="Form">
		<table id="tblForm">
			<tr>
			<td><a href="AddBooks.php"><button type="button" class="btn" id="btnAddBooks"><img src="icons8-add-96.png"></button></a></td>
			<td><a href="UpdateDelete.php"><button type="button" class="btn" id="btnMaintainBooks"><img src="icons8-open-book-96 (1).png"></button></a></td>
			<td><a href="Search.php"><button type="button" class="btn" id="btnSearchBooks"><img src="icons8-available-updates-96.png"></button></a></td>
			<td><a href="OrderList.php"><button type="button" class="btn" id="btnOrderList"><img src="icons8-purchase-order-96.png"></button></a></td>
			<td><a href="IssueBook.php"><button type="button" class="btn" id="btnIssueBooks"><img src="icons8-sell-96.png"></button></a></td>
			<td><a href="returnBook.php"><button type="button" class="btn" id="btnReturnBooks"><img src="icons8-return-96.png"></button></a></td>
			<td><a href="Member.php"><button type="button" class="btn" id="btnAddBooks"><img src="icons8-badge-96.png"></button></a></td>
			<td><a href="Message.php"><button type="button" class="btn" id="btnMessages"><img src="icons8-new-message-96 (1).png"></button></a></td>
			<td><a href="settings.php"><button type="button" class="btn" id="btnAddBooks"><img src="icons8-settings-96.png"></button></a></td>
			</tr>
			<tr>
				<td id="txt">Adding Books</td>
				<td id="txt">Maintain Books</td>
				<td id="txt">Books Availability</td>
				<td id="txt">Order List</td>
				<td id="txt">Issue Books</td>
				<td id="txt">Return Books</td>
				<td id="txt">Maintain Members</td>
				<td id="txt">Messages</td>
				<td id="txt">Settings</td>
			</tr>
		</table>
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
