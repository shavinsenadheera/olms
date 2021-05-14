<!DOCTYPE html>
<html>
<head>
	<script src="alert.js"></script>

	<title>Test 1</title>
</head>
<body>

<?php
	function Select()
	{
		$server = "localhost";
		$username = "root";
		$password = "";
		$dbName = "lms";

		$connection = new mysqli($server, $username, $passwordm , $dbName);

		if($connection->connect_error)
		{
			?>
			<script type="text/javascript">
				Alert.errserver();
			</script>
			<?php
		}
	}
?>

</body>
</html>