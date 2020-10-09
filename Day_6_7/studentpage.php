<?php
	include('session_s.php');


   	$sql = "SELECT * FROM student_marks WHERE email='$user_check'";
   	$result = mysqli_query($conn, $sql);
   	$row = mysqli_fetch_assoc($result);
   	if(mysqli_num_rows($result) > 0){
   		if($row['PHP'] == NULL)
   			$php = "N.A.";
   		else
   			$php = $row['PHP'];
   		if($row['MYSQL'] == NULL)
   			$mysql = "N.A.";
   		else
   			$mysql = $row['MYSQL'];
   		if($row['HTML'] == NULL)
   			$html = "N.A.";
   		else
   			$html = $row['HTML'];
   		if($row['total_obtained'] == NULL)
   			$total = "N.A.";
   		else
   			$total = $row['total_obtained'];
   		if($row['percentage'] == NULL)
   			$percentage = "N.A.";
   		else{
   			$percentage = $row['percentage'];
   			$percentage .= " %";
   		}
   	}

   	if (isset($_POST['sendm'])) {
		$email = $_POST['pemail'];
		$subject = "Result of $login_session1 $login_session2";
		$content = '<!DOCTYPE html>
		<html>
		<head>
			<title></title>
			<style>
				table, th, td {
  				border: 1px solid black;
  				border-collapse: collapse;
				}
			</style>
		</head>
		<body>
			<table style="width: 100%">
				<thead>
					<tr>
						<th>PHP</th>
						<th>MYSQL</th>
						<th>HTML</th>
						<th>Total</th>
						<th>Percentage</th>
					</tr>
				</thead>
				<tbody>
					<tr style="text-align:center">
						<td>'.$php.'</td>
						<td>'.$mysql.'</td>
						<td>'.$html.'</td>
						<td>'.$total.'</td>
						<td>'.$percentage.'</td>
					</tr>
				</tbody>
			</table>
		</body>
		</html>';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		mail($email, $subject, $content, $headers);
	}

?>
<html>
   
   <head>
      <title>Student Dashboard</title>
      <link rel="stylesheet" type="text/css" href="css/student.css">
   </head>
   
   <body>
      <h1 class="welcome">Welcome <?php echo $login_session1." ".$login_session2; ?></h1> 
      <div>
   		<form method="get" action="logout.php">
    		<button id="log" type="submit" style="width:auto;">Sign Out</button>
		  </form>
   	</div>




   	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver3 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">PHP</th>
									<th class="cell100 column2">MYSQL</th>
									<th class="cell100 column3">HTML</th>
									<th class="cell100 column4">Total</th>
									<th class="cell100 column5">Percentage</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
								<tr class="row100 body">
									<td class="cell100 column1"><?php echo $php; ?></td>
									<td class="cell100 column2"><?php echo $mysql; ?></td>
									<td class="cell100 column3"><?php echo $html; ?></td>
									<td class="cell100 column4"><?php echo $total; ?></td>
									<td class="cell100 column5"><?php echo $percentage; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="congrats">
		<?php  if($percentage>60){echo "<p>Congratulations on $percentage</p>";} ?>
	</div>
	<div class="mail">
		<form action="" method="POST" name="EmailForm">
			<input type="email" name="pemail" placeholder="Parent's Email">
			<button type="submit" name="sendm">Send</button>
		</form>
	</div>



   </body>
   
</html>`