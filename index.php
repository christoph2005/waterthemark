<!Doctype html>
<head></head>
<header></header>
<?php echo(file_get_contents('./javascript/FBLogin.php')); ?>
<body>

<!--Your Impelementation goes below here-->
<!-- A form to upload a picture -->		 
	<form id="UploadForm" enctype="multipart/form-data" action="./upload.php" method="POST">
		<label for="FU">Please choose a photo you would like to watermark:</label>
			<input name="FU" type="file"><br>
		<label for="message">Post image with message:</label>
			<input name="message" type="text"><br>
		<input type="submit" value="Watermark this image!"/><br>
	</form>

</body>
<footer>

</footer>
</html>