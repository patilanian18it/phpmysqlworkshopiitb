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
 	if(is_writable($_FILES["fileToUpload"]["tmp_name"]))
 		echo "true";
 	echo "<br><table style='width: 100%' border='1'>
				<tr>
					<th>File Name</th>
					<th>Size (Bytes)</th>
				</tr>
				<tr>
				<td>$filename</td>
				<td>$size</td>
				</tr>
			</table>";
}

?>
