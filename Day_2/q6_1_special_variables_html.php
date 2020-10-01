
<!DOCTYPE html>
<html>
	<body>
		<div align="center">
			<h2>Enter ther sides of Triangle</h2>
			<form action="q6_1_special_variables_html.php" method="GET">
				<label for="side1">side1 :</label><br>
				<input type="text" id="side1" name="side1"><br>
				<label for="side2">side2 :</label><br>
				<input type="text" id="side2" name="side2"><br>
				<label for="side3">side3 :</label><br>
				<input type="text" id="side3 "name="side3"><br><br>
				<input type="submit" value="Submit">
			</form>
		</div>
	</body>
</html>
<div align="center">
	<h3>
		<?php 

			if(!empty($_GET['side1'])){
				$a = $_GET['side1'];
				$b = $_GET['side2'];
				$c = $_GET['side3'];
				echo "Triangle is ";
				if($a == $b && $b == $c)
					echo "Equilateral";
				elseif ((($a**2 + $b**2) == $c**2) || (($b**2 + $c**2) == $a**2) || (($a**2 + $c**2) == $b**2))
					echo "Right Angled And Scalene Triangle";
				elseif($a != $b && $b != $c && $a != $c)
					echo "Scalene";
				else
					echo "Isosceles";
			}

		?>
	</h3>
</div>