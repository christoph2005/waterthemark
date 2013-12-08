<!Doctype html>
<body>
<?php
			if ($_FILES["source"]["error"] > 0)
			{
				echo "Error: " . $_FILES["source"]["error"] . "<br>";
			}
			else
			{
				echo "Upload: " . $_FILES["source"]["name"] . "<br>";
				echo "Type: " . $_FILES["source"]["type"] . "<br>";
				echo "Size: " . ($_FILES["source"]["size"] / 1024) . " kB<br>";
				echo "Stored in: " . $_FILES["source"]["tmp_name"] . "<br>";
				
				// Note to self: $destpath junk can probably be tidied up a bit
		 		$target_path = "uploads/";
				$filename1 = strtolower(urlencode(basename($_FILES['source']['name'])));
				$dest_path1 = $target_path . $filename1;
				$dest_path2 = $target_path . 'tmarked.png';
				if (!move_uploaded_file($_FILES['source']['tmp_name'], $dest_path1))
					echo '<h1>'.$_FILES["source"]["name"].' failed to load!</h1>';
				else
				{
					
				    echo "Stored in: " .$dest_path1.'<br>';	  
					echo '<image src="'.$dest_path1. '" width = "400"></image>';
					exec('java -cp uploads/ -jar uploads/dct-watermark-rev24.jar e -d '.$dest_path1.' '.$dest_path2.' "Hello World"');
					echo '<image src="'.$dest_path2. '" width = "400"></image><br>';
				}
			}
?>
</body></html>