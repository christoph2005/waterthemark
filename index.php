<!Doctype html>
<head></head>
<header><div id="fb-root"></div></header>
<?php echo(file_get_contents('./javascript/FBLogin.js')); ?>
<body>
<!--Your Impelementation goes below here-->		
<button onclick='f()'>PUSH THIS BUTTON</button>
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