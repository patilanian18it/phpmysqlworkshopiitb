<!DOCTYPE html>
<html>
	<body>
		<form action="q6_2_special_variables_html.php" method="GET">
			<label for="name">Name of Student : </label>
			<input type="text" id="name" name="name" required><br>
			<p>Enter Marks</p>
			<label for="Physics">Physics :</label><br>
			<input type="text" id="Physics" name="Physics" required> /100<br>
			<label for="Chemistry">Chemistry :</label><br>
			<input type="text" id="Chemistry" name="Chemistry" required> /100<br>
			<label for="Mathematics">Mathematics :</label><br>
			<input type="text" id="Mathematics" name="Mathematics" required> /100<br>
			<label for="Pilitical">Political Science :</label><br>
			<input type="text" id="Political" name="Political" required> /100<br>
			<label for="Geography">Geography :</label><br>
			<input type="input" id="Geography" name="Geography" required> /100<br><br>
			<input type="submit" name="Submit">
		</form>
	</body>
</html>
<?php 

	if(!empty($_GET['name'])){
		echo "<br>Name : ".$_GET['name']."<br>";
		echo "<br>Marks in Each Subject<br>";
		echo "<br>Physics           : ".$_GET['Physics'];
		echo "<br>Chemistry         : ".$_GET['Chemistry'];
		echo "<br>Mathematics       : ".$_GET['Mathematics'];
		echo "<br>Pilitical Science : ".$_GET['Political'];
		echo "<br>Geography 		: ".$_GET['Geography']."<br>";
		$Total = $_GET['Physics']+$_GET['Chemistry']+$_GET['Mathematics']+$_GET['Political']+$_GET['Geography'];
		echo "<br>Total Marks Obtained : ".$Total;
		echo "<br>Total Marks : 500";
		echo "<br>Percentage : ".$Total/500*100;
	}

?>