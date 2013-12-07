<!Doctype html>
<head></head>
<header><div id="fb-root"></div></header>
<body>
<!--Your Impelementation goes below here-->		
<script>
		FB.api("/me",function(response){
			alert(response.name);
		});
</script>
</body>
<footer>
<?php echo(file_get_contents('./javascript/FBLogin.js'));	?>
</footer>
</html>