
<!DOCTYPE html>
<html>
	<body>
		<form action="q6_1_special_variables_html.php" method="GET">
			<label for="side1">side1 :</label><br>
			<input type="text" id="side1" name="side1"><br>
			<label for="side2">side2 :</label><br>
			<input type="text" id="side2" name="side2"><br>
			<label for="side3">side3 :</label><br>
			<input type="text" id="side3 "name="side3"><br><br>
			<input type="submit" value="Submit">
		</form>
	</body>
</html>
<?php 

	if(!empty($_GET['side1'])){
		$a = $_GET['side1'];
		$b = $_GET['side2'];
		$c = $_GET['side3'];
		echo "Triangle is ";
		if($a == $b && $b == $c)
			echo "Equilateral";
		elseif($a != $b && $b != $c && $a != $c)
			echo "Scalene";
		else
			echo "Isosceles";
	}

?>