<?php
  $debug = false;
  // Remember to copy files from the SDK's src/ directory to a
  // directory in your application on the server, such as php-sdk/
  if ($debug)
  	echo " before require_once()";
  
  require_once('./facebook-sdk/src/facebook.php');
       $app_id = "1444502492438120";
       $app_secret = "e291c1917bd5f5963bb48305f50fb458";
       $post_login_url = "https://apps.facebook.com/waterthemark";
	   
   if ($debug)
      echo "After require_once()";
	   
  $config = array(
    'appId' => $app_id,
    'secret' => $app_secret,
    'fileUpload' => true,
    'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
  );

  $facebook = new Facebook($config);
  if($debug)
  	echo ' $facebook object made';
  $user_id = $facebook->getUser();
  if ($debug)
  	echo ' $user_id = getUser();';

  $photo = 'http://waterthemark.herokuapp.com/uploads/OrigLena.png'; // Path to the photo on the local filesystem
  $message = 'Photo upload via the PHP SDK!';
?>
<html>
  <head><image src='"'.<?php echo $photo; ?>.'"'</image></head>
  <body>

  <?php
    if($user_id) {

      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {

        // Upload to a user's profile. The photo will be in the
        // first album in the profile. You can also upload to
        // a specific album by using /ALBUM_ID as the path 
        $ret_obj = $facebook->api('/me/photos', 'POST', array(
                                         'source' => '@' . $photo,
                                         'message' => $message,
                                         )
                                      );
        echo '<pre>Photo ID: ' . $ret_obj['id'] . '</pre>';
        echo '<br /><a href="' . $facebook->getLogoutUrl() . '">logout</a>';
      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl( array(
                       'scope' => 'photo_upload'
                       )); 
        echo 'Please <a href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, print a link for the user to login
      // To upload a photo to a user's wall, we need photo_upload  permission
      // We'll use the current URL as the redirect_uri, so we don't
      // need to specify it here.
      $login_url = $facebook->getLoginUrl( array( 'scope' => 'photo_upload') );
      echo 'Please <a href="' . $login_url . '">login.</a>';

    }

  ?>

  </body>
</html>