<!Doctype html>
<head></head>
<header><div id="fb-root"></div></header>
<?php echo(file_get_contents('./javascript/FBLogin.js')); ?>
<body>
<!-- Debug Code -->
<?php #echo(file_get_contents('./javascript/debugcode.php')); ?>







<!--Your Impelementation goes below here-->
<!-- A form to upload a picture -->		 
	<form enctype="multipart/form-data" action="./uploader.php" method="POST">
		Please choose a photo you would like to watermark:
			<input name="fileUpload" type="file"><br/><br/>
		<input type="submit" value="Upload"/><br/>
	</form>
	<script> if ($_FILES) {</script>
		<script>alert("HEY BUDDY");</script>
	<script>};</script>
		
<!-- A form to generate an HTTP Post -->
	<form enctype="multipart/form-data" action="'.$graph_url.'" method="POST">
		<datalist>
		<option name="source" type="file" value="'.$_POST["source"].'"></option>
		</datalist>
		Say something about this photo: <input name="message" type="text" value=""><br/><br/>
		<input type="submit" value="Post to Facebook!"/><br/>
	</form>

</body>
<footer>

</footer>
</html>