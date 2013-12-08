<!Doctype html>
<head></head>
<header><div id="fb-root"></div></header>
<?php echo(file_get_contents('./javascript/FBLogin.js')); ?>
<body>
<!--Your Impelementation goes below here-->		
<br></p><button onclick='f()'>PUSH THIS BUTTON</button>

<!-- A form to upload a picture -->		 
	<form enctype="multipart/form-data" action="./index.php" method="POST">
		Please choose a photo: <input name="source" type="file"><br/><br/>
		<input type="submit" value="Upload"/><br/>
	</form>
	
<!-- A form to generate an HTTP Post -->
	<form enctype="multipart/form-data" action="'.$graph_url.'" method="POST">
		<datalist>
		<option name="source" type="file" value="'.$_POST["source"].'"></option>
		</datalist>
		Say something about this photo: <input name="message" type="text" value=""><br/><br/>
		<input type="submit" value="Post to Facebook!"/><br/>
	</form>
<script>
function f(){
   FB.api('/me', function(response) {
      alert('Your name is ' + response.name);
   });
}
</script>
</body>
<footer>

</footer>
</html>