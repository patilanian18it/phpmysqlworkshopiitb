<?php 

	$servername = "localhost";
	$username = "root";
	$pass = "";
	$dbname = "result";
	$conn = mysqli_connect($servername, $username, $pass, $dbname) or die(mysqli_connect_error());

	echo "connected to database <br/>";

?>
<!DOCTYPE html>
<html>
	<body>
		<div align="center">
			<form action="q1.php" method="POST">
				<label for="name">Name of Student : </label>
				<input type="text" id="name" name="name" required><br>
				<p>Enter Marks</p>
				<label for="Physics">Physics :</label><br>
				<input type="number" id="Physics" name="Physics" min="0" max="100" required><br>
				<label for="Chemistry">Chemistry :</label><br>
				<input type="number" id="Chemistry" name="Chemistry" min="0" max="100" required><br>
				<label for="Mathematics">Mathematics :</label><br>
				<input type="number" id="Mathematics" name="Mathematics" min="0" max="100" required><br>
				<label for="Political">Political Science :</label><br>
				<input type="number" id="Political" name="Political" min="0" max="100" required><br>
				<label for="Geography">Geography :</label><br>
				<input type="number" id="Geography" name="Geography" min="0" max="100" required><br><br>
				<input type="submit" name="Submit">
			</form>
		</div>
	</body>
</html>
<?php 

	if(isset($_POST['Submit'])){
		$name = $_POST['name'];
		$sub1 = $_POST['Physics'];
		$sub2 = $_POST['Chemistry'];
		$sub3 = $_POST['Mathematics'];
		$sub4 = $_POST['Political'];
		$sub5 = $_POST['Geography'];
		echo "<h2><br>Name : ".$_POST['name']."<br></h2>";
		echo "<h3><br>Marks in Each Subject<br>";
		echo "<br>Physics           : ".$sub1;
		echo "<br>Chemistry         : ".$sub2;
		echo "<br>Mathematics       : ".$sub3;
		echo "<br>Political Science : ".$sub4;
		echo "<br>Geography 		: ".$sub5."<br>";
		$Total = $sub1+$sub2+$sub3+$sub4+$sub5;
		echo "<br>Total Marks Obtained : ".$Total;
		echo "<br>Total Marks : 500</h3>";
		$perc = $Total/500*100;
		echo "<h3><br>Percentage : ".$perc."<br></h3>";
		$sql = "INSERT INTO class1 (name, Physics, Chemistry, Mathematics, Political_Science, Geography, total_obtained, total_marks, percentage) VALUES ('$name', $sub1, $sub2, $sub3, $sub4, $sub5, $Total, 500, $perc)";
		if (mysqli_query($conn, $sql))
  			echo "New record created successfully";
		else
  			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  		mysqli_close($conn);
	}

?>