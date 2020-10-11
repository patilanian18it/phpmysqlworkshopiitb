<?php
	include('session_a.php');

	#To add Student Data

	if(isset($_POST['adds'])) {
    	$fname = $_POST['afname'];
    	$lname = $_POST['alname'];
    	$email = $_POST['auname'];
    	$pass = md5($_POST['apass']);

    	$sql = "INSERT INTO student (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$pass')";
    	$res = mysqli_query($conn, $sql);
    	$sql1 = "INSERT INTO student_marks (email) VALUES ('$email');";
      	$res1 = mysqli_query($conn, $sql1);

    	if ($res) {
    		echo '<script>alert("Student Added Successfully!")</script>';
		}

		else{
			echo '<script>alert("Error adding record: ' . mysqli_error($conn) . '")</script>';
		}
	}

	#To Remove Student Data

	if(isset($_POST['removes'])) {
    	$fname = $_POST['rfname'];
    	$lname = $_POST['rlname'];
    	$email = $_POST['runame'];

    	$sql = "DELETE FROM student WHERE fname='$fname' AND lname='$lname' AND email='$email'";
    	$sqlm = "DELETE FROM student_marks WHERE email='$email'";
    	$res = mysqli_query($conn, $sql);
    	$res1 = mysqli_query($conn, $sqlm);

    	if ($res and $res1) {
    		echo '<script>alert("Student Removed Successfully!")</script>';
		}

		else{
			echo '<script>alert("Error removing data: ' . mysqli_error($conn) . '")</script>';
		}
	}

	#To Add Marks

	if(isset($_POST['addm'])) {
    	$email = $_POST['chuname'];
    	$PHP = $_POST['PHP'];
    	$MYSQL = $_POST['MYSQL'];
    	$HTML = $_POST['HTML'];
    	$total_obtained = $PHP+$MYSQL+$HTML;
    	$perc = $total_obtained/3;

    	$sql = "UPDATE student_marks SET PHP=$PHP, MYSQL=$MYSQL, HTML=$HTML, total_obtained=$total_obtained, total=300, percentage=$perc WHERE email='$email'";
    	$res = mysqli_query($conn, $sql);

    	if ($res) {
    		echo '<script>alert("Marks Added Successfully!")</script>';
		}

		else{
			echo '<script>alert("Error Adding Data: ' . mysqli_error($conn) . '")</script>';
		}
	}


	#To Update Marks

	if(isset($_POST['updatem'])) {
    	$email = $_POST['uname'];
		$sub = $_POST['upsubject'];
		$new_marks = $_POST['marks'];
		$get_data = "SELECT * FROM student_marks WHERE email='$email'";
		$data = mysqli_query($conn, $get_data);

		if (mysqli_num_rows($data) > 0){
			$row = mysqli_fetch_assoc($data);
			$old_marks = $row[$sub];
			$total_obtained = $row["total_obtained"];
		}


    	$total_obtained = $total_obtained - $old_marks + $new_marks;
    	$perc = $total_obtained/3;

    	$sql = "UPDATE student_marks SET $sub=$new_marks, total_obtained=$total_obtained, percentage=$perc WHERE email='$email'";
    	$res = mysqli_query($conn, $sql);

    	if ($res) {
    		echo '<script>alert("Marks Updated Successfully!")</script>';
		}

		else{
			echo '<script>alert("Error Updating Data: ' . mysqli_error($conn) . '")</script>';
		}
	}


	#To Delete Marks

	if(isset($_POST['deletem'])) {
    	$email = $_POST['duname'];
		$sub = $_POST['delsubject'];
		$get_data = "SELECT * FROM student_marks WHERE email='$email'";
		$data = mysqli_query($conn, $get_data);

		if (mysqli_num_rows($data) > 0){
			$row = mysqli_fetch_assoc($data);
			$old_marks = $row[$sub];
			$total_obtained = $row["total_obtained"];
		}


    	$total_obtained = $total_obtained - $old_marks;

    	$sql = "UPDATE student_marks SET $sub=NULL, total_obtained=$total_obtained, percentage=NULL WHERE email='$email'";

    	$res = mysqli_query($conn, $sql);

    	if ($res) {
    		echo '<script>alert("Marks Deleted Successfully!")</script>';
		}

		else{
			echo '<script>alert("Error Deleting Data: ' . mysqli_error($conn) . '")</script>';
		}
	}



?>

<html>
   
   <head>
      <title>Welcome </title>
      <link rel="stylesheet" type="text/css" href="css/admin.css">
   </head>
   
   <body>

   <div  class="rem-student">
   		<div><button onclick="document.getElementById('id01').style.display='flex'" name="addstu">Add Student</button></div>
   		<div><button onclick="document.getElementById('id02').style.display='flex'" name="remove">Remove Student</button></div>
   		<div><button onclick="document.getElementById('id03').style.display='flex'" name="addmarks">Add Marks</button></div>
   		<div><button onclick="document.getElementById('id04').style.display='flex'" name="update">Update Marks</button></div>
   		<div><button onclick="document.getElementById('id05').style.display='flex'" name="delete">delete Marks</button></div>
   </div>


   <div id="id01" class="hidden">
		<form class="hidden-content animate" action="" method="POST">
			<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">&times;</span>
      		<label for="afname">First Name</label>
			<input type="text" name="afname" required>
      		<label for="alname">Last Name</label>
			<input type="text" name="alname" required>
      		<label for="auname">Email Address</label>
			<input type="email" name="auname" required>
			<label for="apass">Password</label>
			<input type="password" name="apass" required>
			<button class="submit" type="submit" name="adds" style="width: auto;">ADD STUDENT</button>
		</form>
   	</div>


    <div id="id02" class="hidden">
		<form class="hidden-content animate" action="" method="POST">
			<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close">&times;</span>
      		<label for="rfname">First Name</label>
			<input type="text" name="rfname" required>
      		<label for="rlname">Last Name</label>
			<input type="text" name="rlname" required>
      		<label for="runame">Email Address</label>
			<input type="email" name="runame" required>
			<button class="submit" type="submit" name="removes" style="width: auto;">REMOVE STUDENT</button>
		</form>
   	</div>


   	<div id="id03" class="hidden">
		<form class="hidden-content animate" action="" method="POST">
			<span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close">&times;</span>
      		<label for="chuname">Email Address</label>
			<input type="email" name="chuname" required>
			<label for="PHP">PHP</label>
			<input type="number" name="PHP" required>
      		<label for="MYSQL">MYSQL</label>
			<input type="number" name="MYSQL" required>
			<label for="HTML">HTML</label>
			<input type="number" name="HTML" required>
			<button class="submit" type="submit" name="addm" style="width: auto;">ADD MARKS</button>
		</form>
   	</div>


   	<div id="id04" class="hidden">
		<form id="user-form" class="hidden-content animate" action="" method="POST">
			<span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close">&times;</span>
      		<label for="uname">Email Address</label>
			<input type="email" name="uname" required>
			<label for="sub">Choose a Subject</label>

			<div>
			<select form="user-form" id="sub" name="upsubject" form="subform" required>
 		 		<option value="PHP">PHP</option>
  				<option value="MYSQL">MYSQL</option>
  				<option value="HTML">HTML</option>
			</select>
			</div>

			<label for="marks">Marks</label>
			<input type="number" name="marks" required>
			<button class="submit" type="submit" name="updatem" style="width: auto;">UPDATE MARKS</button>
		</form>
   	</div>


   	<div id="id05" class="hidden">
		<form id='delm' class="hidden-content animate" action="" method="POST">
			<span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close">&times;</span>
      		<label for="duname">Email Address</label>
			<input type="email" name="duname" required>
			<label for="sub">Choose a Subject</label>
			
			<div>
			<select form='delm' id="sub" name="delsubject" form="subform" required>
 		 		<option value="PHP">PHP</option>
  				<option value="MYSQL">MYSQL</option>
  				<option value="HTML">HTML</option>
			</select>
			</div>

			<button class="submit" type="submit" name="deletem" style="width: auto;">DELETE MARKS</button>
		</form>
   	</div>






   	<div>
   		<form method="get" action="logout.php">
    		<button id="log" type="submit" style="width:auto;">Sign Out</button>
		  </form>
   	</div>
   </body>
   
</html>