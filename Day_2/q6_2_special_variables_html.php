<!DOCTYPE html>
<html>
	<body>
		<div align="center">
			<form action="q6_2_special_variables_html.php" method="POST">
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

	if(!empty($_POST['name'])){
		echo "<h2><br>Name : ".$_POST['name']."<br></h2>";
		echo "<h3><br>Marks in Each Subject<br>";
		echo "<br>Physics           : ".$_POST['Physics'];
		echo "<br>Chemistry         : ".$_POST['Chemistry'];
		echo "<br>Mathematics       : ".$_POST['Mathematics'];
		echo "<br>Political Science : ".$_POST['Political'];
		echo "<br>Geography 		: ".$_POST['Geography']."<br>";
		$Total = $_POST['Physics']+$_POST['Chemistry']+$_POST['Mathematics']+$_POST['Political']+$_POST['Geography'];
		echo "<br>Total Marks Obtained : ".$Total;
		echo "<br>Total Marks : 500</h3>";
		echo "<h3><br>Percentage : ".$Total/500*100;
	}

?>