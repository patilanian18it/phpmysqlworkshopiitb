<?php 

	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$feedback = $_POST['feedback'];
		$subjectForUser = "Thanks for connecting with us!";
		$feedbackForUser = "Thank You ".$name." For your valuable Feedback";
		mail($email, $subjectForUser, $feedbackForUser);
		$mailForAdmin = "Name : ".$name."\nEmail : ".$email."\nFeedback : ".$feedback;
		mail('patilanian18it@student.mes.ac.in', 'Feedback from '.$name, $mailForAdmin);
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div align="center">
		<form action="q2_send_mail.php" method="POST">
			<input class="inputstyle" type="text" name="name" placeholder="Name" required min='1' max='30'><br><br>
			<input class="inputstyle" type="email" name="email" placeholder="Email" required><br><br>
			<textarea class="inputstyle" name="feedback" required maxlength="300" rows="4" cols="50" placeholder="feedback"></textarea><br><br>
			<input id="submit" type="submit" name="submit" value="send feedback">
		</form> <br><br>
		<?php 
			if (isset($_POST['submit'])){
				echo "<h2>Feedback Submitted</h2>";		
				 $page = $_SERVER['PHP_SELF'];
				 $sec = "5";
				 header("Refresh: $sec; url=$page");
			}
		 ?>
	</div>
</body>
</html>
