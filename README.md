waterthemark
============

A facebook application to automatically watermark images and upload them to your facebook photos

Necessary Components: "Included in the repository"
index.php
/uploads/watermark-dct.jar
/javascript/FBLogin.php


To use the application:

Phase one: Create a Facebook application
  Log onto Facebook using a developer account; or make an account into a developer account.
  Create a new Facebook application
    Details for the last two steps can be found here < https://developers.facebook.com/docs/opengraph/getting-started/#prerequisites >
IMPORTANT: You will need the Facebook App ID to configure the web app
  Copy this to your clipboard

Phase Two: Host the web app on a web server 
  Download the repository from github < https://github.com/christoph2005/waterthemark >
  In the uploads/FBLogin.php file in the method FB.init() Set the App ID to your App ID from phase one
  Create a heroku web server (app) using the php framework < www.heroku.com >
  Push the repository to the heroku web server you just created
IMPORTANT: You will need the url of your heroku web app for phase three
  Find the url of your heroku web app from the settings page for your app on heroku.com
    Copy this url to your clipboard.

Phase three: Link your Facebook application to your heroku web app
  Log into Facebook using your developer account
    Click on the settings icon
    Click on Manage Apps
    Click on your application in the navigation bar on the left
    Click on Edit Settings ( for your Facebook application )
      The page should refresh and show you configuration information for your facebook webapp
      Under the section that says "Select how your app integrates with Facebook"
      Select App on Facebook.
      Paste the url of your heroku web app (from phase two) into the boxes for:
        Canvas URL:
        Secure Canvas URL:
      Make sure to prefix it with http:// and https:// respectively and also make sure the url ends with a /
        For example, our webapp is configured as:
          Canvas URL: http://waterthemark.herokuapp.com/
          Secure Canvas URL https://waterthemark.herokuapp.com/
      Save these settings
      
Your app should be visible now on your "Facebook Canvas Page"
          
  
    
