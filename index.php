<!Doctype html>
<head></head>
<header></header>
<?php echo(file_get_contents('./javascript/FBLogin.php')); ?>
<body>
<!-- Debug Code -->
<?php #echo(file_get_contents('./javascript/debugcode.php')); ?>







<!--Your Impelementation goes below here-->
<!-- A form to upload a picture -->		 
	<form enctype="multipart/form-data" action="./index.php" method="POST">
		Please choose a photo you would like to watermark:
			<br><input name="FU" type="file"><br><br>
		<input type="submit" value="Upload Image For Watermarking"/><br>
	</form>
	<?php if ($_FILES && $_FILES["FU"]): ?>
	<?php #Print information about the uploaded file
	# If there were any errors in the file upload go here
	if ($_FILES["FU"]["error"] > 0)
	{
		echo "Error: " . $_FILES["FU"]["error"] . "<br>";
	}
	# If there were no erros in the file upload go here
	else
	{
		# Please print out information about the uploaded file
		echo "Upload: " . $_FILES["FU"]["name"] . "<br>";
		echo "Type: " . $_FILES["FU"]["type"] . "<br>";
		echo "Size: " . ($_FILES["FU"]["size"] / 1024) . " kB<br>";
		echo "Stored in: " . $_FILES["FU"]["tmp_name"] . "<br>";
		
		// Note to self: $destpath junk can probably be tidied up a bit
 		$target_path = "uploads/";
		$fext = explode(".", strtolower($_FILES['FU']['name']));
		echo 'alert('.$fext[size($fext)].')';
		$filename1 = strtolower(urlencode(basename($_FILES['FU']['name'])));
		$dest_path1 = $target_path . $filename1;
		$dest_path2 = $target_path . 'tmarked.png';
		# Try to move the file from /tmp to /uploads and print an error message on falure
		if (!move_uploaded_file($_FILES['FU']['tmp_name'], $dest_path1))
			echo '<h1>'.$_FILES["source"]["FU"].' failed to load!</h1>';
		# If the file has successfully uploaded
		else{
			# Watermark the image
			exec('java -cp uploads/ -jar uploads/dct-watermark-rev24.jar e -d '.$dest_path1.' '.$dest_path2.' "Hello World"');
			# echo final pathname of the unwatermarked image
		    echo "Stored in: " .$dest_path1.'<br>';	  
			# display the unwatermarked image
			echo '<image src="'.$dest_path1. '" height = "400"></image>';
			# display the watermarked image
			echo '<image src="'.$dest_path2. '" height = "400"></image><br>';
		}
	}
	?>
	<?php else: ?>
		<script>console.log("$_FILES does not exist")</script>
	<?php endif; ?>
	
<!-- A form to generate an HTTP Post -->
<!--
	<form enctype="multipart/form-data" action="'.$graph_url.'" method="POST">
		<datalist>
		<option name="source" type="file" value="'.$_POST["source"].'"></option>
		</datalist>
		Say something about this photo: <input name="message" type="text" value=""><br/><br/>
		<input type="submit" value="Post to Facebook!"/><br/>
	</form>
-->

</body>
<footer>

</footer>
</html>