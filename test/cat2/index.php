<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

   

     <style type="text/css">
        * { margin: 0; padding: 0; }
        body { font: 16px Helvetica, Sans-Serif; line-height: 24px; background: url(images/noise.jpg); }
        .clear { clear: both; }
        #page-wrap { width: 800px; margin: 40px auto 60px; }
        #pic { float: right; margin: -30px 0 0 0; }
        h1 { margin: 0 0 16px 0; padding: 0 0 16px 0; font-size: 42px; font-weight: bold; letter-spacing: -2px; border-bottom: 1px solid #999; }
        h2 { font-size: 20px; margin: 0 0 6px 0; position: relative; }
        h2 span { position: absolute; bottom: 0; right: 0; font-style: italic; font-family: Georgia, Serif; font-size: 16px; color: #999; font-weight: normal; }
        p { margin: 0 0 16px 0; }
        a { color: #999; text-decoration: none; border-bottom: 1px dotted #999; }
        a:hover { border-bottom-style: solid; color: black; }
        ul { margin: 0 0 32px 17px; }
        #objective { width: 500px; float: left; }
        #objective p { font-family: Georgia, Serif; font-style: italic; color: #666; }
        dt { font-style: italic; font-weight: bold; font-size: 18px; text-align: right; padding: 0 26px 0 0; width: 150px; float: left; height: 100px; border-right: 1px solid #999;  }
        dd { width: 600px; float: right; }
        dd.clear { float: none; margin: 0; height: 15px; }
     </style>

    <title>E-Resume | Your Online Resume Creator</title>
 <script src = "https://plus.google.com/js/client:plusone.js"></script>
	 <script src="js/jquery-2.1.1.min.js"></script>


  </head>

  <body>
  
 
	 <div id="page-wrap">
    
       <!-- <img src="images/cthulu.png" alt="Photo of Cthulu" id="pic" /> -->
    
        <div id="contact-info" class="vcard">
        
           
        
            <h1 class="fn">Simple Resume Creator</h1>
        
            <p>
               Create and Download your resume within minutes.
            </p>
        </div>
                
        <div id="objective">
           
        </div>
        
        <div class="clear"></div>
        <div id="login">
		
       
        <form name="loginform" action="" method="post" id="gform" > 
		
		 <h3 id="left_out" class="sprited">Feeling left out?</h3>
                <span>Don't be sad, just use your google account to sign up!</span>
                 <div id="gConnect" class="button">
      <button class="g-signin" id="signin"
          data-scope="email"
          data-clientid="1081257644131-h6gcu3oolkojk8bvlflkn35tdbu0t9qt.apps.googleusercontent.com"
          data-callback="onSignInCallback"
          data-theme="dark"
          data-cookiepolicy="single_host_origin">
      </button>
		</div>
         </form>
          <form name="profile" action="registration.php" method="post" id="confirm"> 
          <input type="hidden" name="email" id="email" />
          <input type="hidden" name="name" id="name" />
          <input type="hidden" name="image" id="imagesrc" />
          
        <p>Your name is 
        <b name="name" id="uname">  </b> </p>
        <!-- <p>and your pic is <img id="image" />-->
         <input type="submit" name="submit" value="Proceed" />
		 <?php echo "<br>" ?>
		 <?php echo "<br>" ?>
		 <?php echo "<br>" ?>
		 <?php echo "<br>" ?>
       </p></form>
	</div>
       
        
        <div class="clear"></div>
    
    </div>

  
  
 <script type="text/javascript">
 $(document).ready(function(e) {
    $('#confirm').hide();
});
$("#name").click(function(e) {
    
});
  function onSignInCallback(resp) {
    gapi.client.load('plus', 'v1', apiClientLoaded);
  }

  
  function apiClientLoaded() {
    gapi.client.plus.people.get({userId: 'me'}).execute(handleEmailResponse);
  }

  function handleEmailResponse(resp) {
    var primaryEmail;
    for (var i=0; i < resp.emails.length; i++) {
      if (resp.emails[i].type === 'account') primaryEmail = resp.emails[i].value;
	 }
   	uname=resp.displayName;
	image=resp.image.url.slice(0,-2)+"130";
	console.log(uname);
	console.log(image);


	//	document.getElementById("image").src=(image);
		document.getElementById("imagesrc").value=image;
		document.getElementById("name").value=(uname);
		document.getElementById("uname").innerHTML=(uname);
		document.getElementById("email").value=primaryEmail;
		//$('#email').value=primaryEmail;
		$('#gform').hide(1000);
		$('#confirm').show(1000);
		
  }

  </script>
 
   
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014 Company, Inc. &middot; </p>
      </footer>

</body>

</html>

  
   




