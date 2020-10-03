<!DOCTYPE html>
<html>
<body>

<form action="q3_file_upload.php" method="post" enctype="multipart/form-data">
  Select file to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload" name="submit">
</form>

</body>
</html>




<?php
if(isset($_POST['submit'])){
	$filename = basename($_FILES["fileToUpload"]["name"]);
 	$size = filesize($_FILES["fileToUpload"]["tmp_name"]);
 	$file_type=$_FILES['fileToUpload']['type'];
 	$extension= pathinfo(basename($_FILES['fileToUpload']['name']),PATHINFO_EXTENSION);
 	echo "<br><table style='width: 100%' border='1'>
				<tr>
					<th>File Name</th>
					<th>Extension</th>
					<th>Type</th>
					<th>Size (Bytes)</th>
				</tr>
				<tr>
				<td>$filename</td>
				<td>$extension</td>
				<td>$file_type</td>
				<td>$size</td>
				</tr>
			</table>";
}

?>
