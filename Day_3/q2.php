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
<head>
	<title>UPDATE MARKS</title>
</head>
	<body>
		<div align="center">
			<label for="sub">Choose a Subject:</label>
			<select id="sub" name="subject" form="subform" required>
 		 		<option value="Physics">Physics</option>
  				<option value="Chemistry">Chemistry</option>
  				<option value="Mathematics">Mathematics</option>
  				<option value="Political_Science">Political Science</option>
  				<option value="Geography">Geography</option>
			</select>
			<br>
			<br>
			<form action="q2.php" id="subform" method="POST">
  				<label for="fname">Name:</label>
  				<input type="text" id="fname" name="fname" required><br><br>
  				<label for="fname">Marks:</label>
  				<input type="number"  name="marks" min="0" max="100" required><br><br>
  				<input type="submit" name="Submit">
			</form>
			<br>			
		</div>
	</body>
</html>



<?php 
	if(isset($_POST['Submit'])){
		$name = $_POST['fname'];
		$sub = $_POST['subject'];
		$new_marks = $_POST['marks'];



		$get_data = "SELECT * FROM class1 WHERE name='$name'";
		$data = mysqli_query($conn, $get_data);
		echo "<h4>Before Updating the data: </h4><br>";
		echo "<table style='width: 100%' border='1'>
				<tr>
					<th>id</th>
					<th>Name</th>
					<th>Physics</th>
					<th>Chemistry</th>
					<th>Mathematics</th>
					<th>Political Science</th>
					<th>Geography</th>
					<th>Total Obtained</th>
					<th>Total Marks</th>
					<th>Percentage</th>
				</tr>";
		

		if (mysqli_num_rows($data) > 0) {
  			// output data of each row
  			while($row = mysqli_fetch_assoc($data)) {
    			echo "<tr>";
				echo "<td>". $row["id"]. "</td>";
				echo "<td>". $row["name"]. "</td>";
				echo "<td>". $row["Physics"]. "</td>";
				echo "<td>". $row["Chemistry"]. "</td>";
				echo "<td>". $row["Mathematics"]. "</td>";
				echo "<td>". $row["Political_Science"]. "</td>";
				echo "<td>". $row["Geography"]. "</td>";
				echo "<td>". $row["total_obtained"]. "</td>";
				echo "<td>". $row["total_marks"]. "</td>";
				echo "<td>". $row["percentage"]. "</td>";
				$old_marks = $row[$sub];
				$total = $row["total_obtained"];
  			}
  			echo "</table>";
		} 
		else {
  			echo "0 results";
		}
		



		$total = $total-$old_marks+$new_marks;
		$percentage = $total/500*100;
		$sql = "UPDATE class1 SET $sub=$new_marks, total_obtained=$total, percentage=$percentage WHERE name='$name'";
		if (mysqli_query($conn, $sql)) {
  			echo "<br>Record updated successfully<br>";
		} 
		else {
  			echo "Error updating record: " . mysqli_error($conn);
		}




		$data = mysqli_query($conn, $get_data);
		echo "<h4>After Updating the data: </h4><br>";
		echo "<table style='width: 100%' border='1'>
				<tr>
					<th>id</th>
					<th>Name</th>
					<th>Physics</th>
					<th>Chemistry</th>
					<th>Mathematics</th>
					<th>Political Science</th>
					<th>Geography</th>
					<th>Total Obtained</th>
					<th>Total Marks</th>
					<th>Percentage</th>
				</tr>";
		

		if (mysqli_num_rows($data) > 0) {
  			// output data of each row
  			while($row = mysqli_fetch_assoc($data)) {
    			echo "<tr>";
				echo "<td>". $row["id"]. "</td>";
				echo "<td>". $row["name"]. "</td>";
				echo "<td>". $row["Physics"]. "</td>";
				echo "<td>". $row["Chemistry"]. "</td>";
				echo "<td>". $row["Mathematics"]. "</td>";
				echo "<td>". $row["Political_Science"]. "</td>";
				echo "<td>". $row["Geography"]. "</td>";
				echo "<td>". $row["total_obtained"]. "</td>";
				echo "<td>". $row["total_marks"]. "</td>";
				echo "<td>". $row["percentage"]. "</td>";
				$old_marks = $row[$sub];
				$total = $row["total_obtained"];
  			}
  			echo "</table>";
		} 
		else {
  			echo "0 results";
		}

		mysqli_close($conn);
	}

?>
