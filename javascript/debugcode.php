<script>
var G;
function i(){
	var urlOfPhoto = 'http://waterthemark.herokuapp.com/uploads/OrigLena.png';
	var messageForPhoto = "I posted this using the javascript sdk and an FB.api CALL!";
	FB.api('/me/photos', 'post', { url: urlOfPhoto, message: messageForPhoto}, function(response) {
	  if (!response) {
	    alert('Error occured: No response!');
	  }  
	  else if(response.error){
	  	console.log(response.error);
	  	console.log(FB.getAuthResponse('AccessToken'));
	  } else {
	    alert('Post ID: ' + response.id);
	  }
	});
};
function h(){
	var body = 'Message posted from but button that says: "PUSH THIS BUTTON TO POST ON THE USERS FEED!!!!"';
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
<br><button onclick='f()'>PUSH THIS BUTTON</button>
<br><button onclick='h()'>PUSH THIS BUTTON TO POST ON THE USERS FEED!!!!</button>
<br><button onclick='i()'>PUSH THIS BUTTON TO POST A PHOTO!!!!</button>