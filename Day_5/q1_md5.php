<?php 

	$server = "localhost";
	$username = "root";
	$pass = "";
	$dbname = "data1";
	$conn = mysqli_connect($server, $username, $pass, $dbname) or die(mysqli_connect_error());

	echo "Connected to Database<br>";

?>
<!DOCTYPE html>
<html>
<body>
	<div align="center">
		<form action="q1_md5.php" method="post">
			<label for="username">Username : </label>
			<input type="text" id="username" name="username"><br><br>
			<label for="password">Password  :</label>
			<?php
				if(isset($_POST['submit']))
					$passhash = md5($_POST['password']);
			?>
			<input type="password" id="password" name="password"><br><br>
			<input type="submit" name="submit">
		</form>
	</div>
</body>
</html>
<?php 

	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$sql = "INSERT INTO login (username, password) VALUES ('$username', '$passhash')";
		if(mysqli_query($conn, $sql))
			echo "successful";
		else
			echo "An eroor occurred";
	}

?>