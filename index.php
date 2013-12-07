<!Doctype html>
<head></head>
<header><div id="fb-root"></div></header>
<?php echo(file_get_contents('./javascript/FBLogin.js'));	?>
<body>
<!--Your Impelementation goes below here-->		
<script>
		FB.api("/me",function(response){
			alert(response.name);
		});
</script>
</body>
<footer>

</footer>
</html>