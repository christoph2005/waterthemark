<!Doctype html>
<head></head>
<header><div id="fb-root"></div></header>
<?php echo(file_get_contents('./javascript/FBLogin.js')); ?>
<body>
<!--Your Impelementation goes below here-->		
<br></p><button onclick='f()'>PUSH THIS BUTTON</button>
<br></p><button onclick='h()'>PUSH THIS BUTTON TO POST ON THE USERS FEED!!!!</button>
<br></p><button onclick='i()'>PUSH THIS BUTTON TO POST A PHOTO!!!!</button>

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
function i(){
	var urlOfPhoto = 'waterthemark.herokuapp.com/uploads/OrigLena.png';
	var messageForPhoto = "I posted this using the javascript sdk and an FB.api CALL!";
	FB.api('/me/photos', 'post', { url: urlOfPhoto, message: messageForPhoto}, function(response) {
	  if (!response || response.error) {
	    alert('Error occured');
	  } else {
	    alert('Post ID: ' + response.id);
	  }
	});
};
function h(){
	var body = 'Reading JS SDK documentation';
	FB.api('/me/feed', 'post', { message: body }, function(response) {
	  if (!response || response.error) {
	    alert('Error occured');
	  } else {
	    alert('Post ID: ' + response.id);
	  }
	});
};
function f(){
   FB.api('/me', function(response) {
      alert('Your name is ' + response.name);
   });
};
</script>
</body>
<footer>

</footer>
</html>