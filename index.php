<?php
       $app_id = "1444502492438120";
       $app_secret = "e291c1917bd5f5963bb48305f50fb458";
       $post_login_url = "https://apps.facebook.com/waterthemark/";
    
       $code = $_REQUEST["code"];

       //Obtain the access_token with publish_stream permission 
       if(empty($code)){ 
          $dialog_url= "http://www.facebook.com/dialog/oauth?"
           . "client_id=" .  $app_id 
           . "&redirect_uri=" . urlencode( $post_login_url)
           .  "&scope=publish_stream";
          echo("<script>top.location.href='" . $dialog_url 
          . "'</script>");
         }
        else {
          $token_url="https://graph.facebook.com/oauth/access_token?"
           . "client_id=" . $app_id 
		   . "&redirect_uri=" . urlencode( $post_login_url)
           . "&client_secret=" . $app_secret
           . "&code=" . $code;
          $response = file_get_contents($token_url);
          $params = null;
          parse_str($response, $params);
          $access_token = $params['access_token'];

         // Show photo upload form to user and post to the Graph URL
         $graph_url= "https://graph.facebook.com/me/photos?". "access_token=" .$access_token;
		 $this_url = "http://waterthemark.herokuapp.com?";
         echo '<html><body>';
		 
			if(empty($_POST) || empty($_FILES['source']))
			{
		         echo '<form enctype="multipart/form-data" action="./index.php" method="POST">';
				 echo phpinfo();
				 echo 'POST: '; echo empty($_POST);
				 echo '<br>';
				 print_r($_POST);
				 echo '<br>';
				 echo '<br>';
				 echo $_POST['message'];
				 echo '<br>';
				 echo '<br>';
				 
				 echo 'FILES: '; echo empty($_FILES);
				 echo '<br>';
				 print_r($_FILES);
				 echo '<br>';
				 echo '<br>';
				 
			         echo 'Please choose a photo: ';
			         echo '<input name="source" type="file"><br/><br/>';
			         echo 'Say something about this photo: ';
			         echo '<input name="message" type="text" value=""><br/><br/>';
			         echo '<input type="submit" value="Upload"/><br/>';
				 
		         echo '</form>';
			}
			if (move_uploaded_file($_FILES['source']['tmp_name'], $uploadfile))
         echo '</body></html>';
      }
?>