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
			<br><input name="fileUpload" type="file"><br><br>
		<input type="submit" value="Upload Image For Watermarking"/><br>
	</form>
	
	<?php #Print information about the uploaded file
	if (defined($_FILES) && $_Files && $_FILES["fileUpload"]["error"] > 0)
	{
		echo "Error: " . $_FILES["fileUpload"]["error"] . "<br>";
	}
	else
	{
		echo "Upload: " . $_FILES["fileUpload"]["name"] . "<br>";
		echo "Type: " . $_FILES["fileUpload"]["type"] . "<br>";
		echo "Size: " . ($_FILES["fileUpload"]["size"] / 1024) . " kB<br>";
		echo "Stored in: " . $_FILES["fileUpload"]["tmp_name"] . "<br>";
		
		// Note to self: $destpath junk can probably be tidied up a bit
 		$target_path = "uploads/";
		$fext = $userfile_extn = explode(".", strtolower($_FILES['fileUpload']['name']));
		echo 'alert('.$fext.')';
		$filename1 = strtolower(urlencode(basename($_FILES['fileUpload']['name'])));
		$dest_path1 = $target_path . $filename1;
		$dest_path2 = $target_path . 'tmarked.png';
		if (!move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dest_path1))
			echo '<h1>'.$_FILES["source"]["fileUpload"].' failed to load!</h1>';
		else
		{
			
		    echo "Stored in: " .$dest_path1.'<br>';	  
			echo '<image src="'.$dest_path1. '" width = "400"></image>';
			exec('java -cp uploads/ -jar uploads/dct-watermark-rev24.jar e -d '.$dest_path1.' '.$dest_path2.' "Hello World"');
			echo '<image src="'.$dest_path2. '" width = "400"></image><br>';
		}
	}
	?>
	
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