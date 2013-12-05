<?php
       $app_id = "1444502492438120";
       $app_secret = "e291c1917bd5f5963bb48305f50fb458";
       $post_login_url = "https://apps.facebook.com/waterthemark";
    
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
        //else 
        {
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
         $graph_url= "https://graph.facebook.com/me/photos?"
         . "access_token=" .$access_token;

         echo '<html><body>';
         echo '<form enctype="multipart/form-data" action="'
         .$graph_url .' "method="POST">';
         echo 'Please choose a photo: ';
         echo '<input name="source" type="file"><br/><br/>';
         echo 'Say something about this photo: ';
         echo '<input name="message" 
             type="text" value=""><br/><br/>';
         echo '<input type="submit" value="Upload"/><br/>';
         echo '</form>';
		 
		 
			if ($_FILES["source"]["error"] > 0)
			{
			echo "Error: " . $_FILES["source"]["error"] . "<br>";
			}
			else
			{
			echo "Upload: " . $_FILES["source"]["name"] . "<br>";
			echo "Type: " . $_FILES["source"]["type"] . "<br>";
			echo "Size: " . ($_FILES["source"]["size"] / 1024) . " kB<br>";
			echo "Stored in: " . $_FILES["source"]["tmp_name"];
			}
		 
         echo '</body></html>';
      }
?>