<?php
   include("config.php");
   session_start();
   
   if(isset($_POST['asubmit'])) {
      
      $myusername = mysqli_real_escape_string($conn,$_POST['auname']);
      $mypassword = mysqli_real_escape_string($conn,md5($_POST['apass']));
      
      $sql = "SELECT id FROM admin WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
		
      if($count == 1) {
         #session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: adminpage.php");
      }else {
         $error = "Your email or Password is invalid";
      }
   }

   if(isset($_POST['ssubmit'])) {
      
      $myusername = mysqli_real_escape_string($conn,$_POST['suname']);
      $mypassword = mysqli_real_escape_string($conn,md5($_POST['spass']));
      
      $sql = "SELECT id FROM student WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
		
      if($count == 1) {
         #session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: studentpage.php");
      }else {
         $error = "Your email or Password is invalid";
      }
  	}

      if(isset($_POST['rsubmit'])) {
      	$fname = $_POST['fname'];
      	$lname = $_POST['lname'];
      	$email = $_POST['runame'];
      	$pass = md5($_POST['rpass']);


      	#CHECK IF ACCOUNT ALREADY EXISTS
      	$query = "SELECT id FROM student WHERE email = '$email'";
      	$check = mysqli_query($conn,$query);
      	$count = mysqli_num_rows($check);

      	if($count == 1){
      		echo '<script>alert("Account already exsits with given Email Address")</script>';
      		die();
      	}



      	$sql = "INSERT INTO student (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$pass');";
      	$sql1 = "INSERT INTO student_marks (email) VALUES ('$email');";
      	$res = mysqli_query($conn, $sql);
      	$res1 = mysqli_query($conn, $sql1);

      	if ($res) {
      		$myusername = mysqli_real_escape_string($conn,$_POST['runame']);
      		$mypassword = mysqli_real_escape_string($conn,md5($_POST['rpass']));

      		$query = "SELECT id FROM student WHERE email = '$myusername' and password = '$mypassword'";
      		$result = mysqli_query($conn,$query);
      		if (!$result) {
    			echo "Error: " . mysqli_error($conn);
    			exit();
			}
      		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      		$count = mysqli_num_rows($result);

      		if($count == 1) {
      			$_SESSION['login_user'] = $myusername;

      			header("location: studentpage.php");
      		}
		}
		else{
			echo "Error adding record: " . mysqli_error($conn);
		}

      }
?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	
	<div class="admin">
	<h1>Admin Login</h1>
		<form action="" method="POST">
			<label for="auname">Email Address</label>
			<input type="email" name="auname" required><br>
			<label for="apass">Password</label>
			<input type="password" name="apass" required><br>
			<button type="submit" name="asubmit" style="width: auto;">SIGN IN</button>
		</form>
		<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($_POST['asubmit'])) { echo $error; }?></div>
	</div>

	   <div class="vl"></div>
	
	<div class="student">
		<h1>Student Login</h1>
		<form action="" method="POST">
			<label for="suname">Email Address</label>
			<input type="email" name="suname" required><br>
			<label for="spass">Password</label>
			<input type="password" name="spass" required><br>
			<button type="submit" name="ssubmit" style="width: auto;">SIGN IN</button><br>
		</form>
		<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($_POST['ssubmit'])) { echo $error; }?></div>
		<div>
			<button onclick="document.getElementById('id01').style.display='flex'" class='button2'>CREATE ACCOUNT</button>
		</div>
	</div>
		

	
	<div id="id01" class="hidden">
		<form class="hidden-content animate" action="" method="POST">
			<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">&times;</span>
      		<label for="fname">First Name</label>
			<input type="text" name="fname" required>
      		<label for="lname">Last Name</label>
			<input type="text" name="lname" required>
      		<label for="runame">Email Address</label>
			<input type="email" name="runame" required>
      		<label for="rpass">Password</label>
			<input type="password" name="rpass" required>
			<button type="submit" name="rsubmit" style="width: auto;">CREATE ACCOUNT</button>
		
		</form>
	</div>
</body>
</html>