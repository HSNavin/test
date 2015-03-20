
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

     <title>Resume</title>

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
   
 <script src="js/jquery-2.1.1.min.js"></script>
</head>
<?php
$target_dir = "pics/";
$email=$_POST['email'];
$filename=$_FILES["image"]["name"];
$target_file = $target_dir . $email.basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
//echo basename($_FILES["image"]["name"]);
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
      //  echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"] > 500000) {
   // echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" ) //&& $imageFileType != "png" && $imageFileType != "jpeg"
//&& $imageFileType != "gif" ) 
{
  //  echo "File is not of jpg format";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   // echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	//$temp = explode(".",$_FILES["file"]["name"]);
//$newfilename = rand(1,99999) . '.' .end($temp);
//move_uploaded_file($_FILES["file"]["tmp_name"], "../img/imageDirectory/" . $newfilename;
	
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
     //   echo "The file ". basename( $filename). " has been uploaded.";
		rename($target_file,$target_dir.$email.".".$imageFileType);
    } else {
       // echo "Sorry, there was an error uploading your file.";
    }
}

?>



<body>

    <div id="page-wrap">
<!--    <input type="hidden" id="emailid" value= "<?php //echo $_POST['email'];
?>
" /> -->
        <input type="hidden" id="email" value="<?php echo $_POST['email']; ?>" name="email" />
          
        <img alt="Photo" id="pic" src="pics/<?php echo $_POST['email'].".jpg"; ?>" height="200" width="200" />
    
        <div id="contact-info" class="vcard">
        
                    
            <h1 class="fn" id="name"><?php echo $_POST['name']; ?></h1>
        
            <p>
                Cell: <span class="tel" id="mobile"><?php echo $_POST['mobile']; ?></span><br />
                Email: <a class="email" href="mailto:<?php echo $_POST['email']; ?> " > <?php echo $_POST['email']; ?> </a>
            </p>
        </div>
                
        <div id="objective">
            <p id="objective">
<?php echo $_POST['objective']; ?>
            </p>
        </div>
        
        <div class="clear"></div>
        
        <dl>
            <dd class="clear"></dd>
            
            <dt>Education</dt>
            <dd>
                <h2 id="univname"><?php echo $_POST['univname']; ?></h2>
                <p><strong>Major:</strong> <i id="major"><?php echo $_POST['major']; ?></i><br />
                   <strong>Minor:</strong><i id="minor"> <?php echo $_POST['minor']; ?> </i></p>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Skills</dt>
            <dd>
                <h2 id="skillname1"><?php echo $_POST['skillname1']; ?></h2>
                <p id="skill1"><?php echo $_POST['skill1']; ?></p>
                
                <h2 id="skillname2"><?php echo $_POST['skillname2']; ?></h2>
                <p id="skill2"><?php echo $_POST['skill2']; ?></p>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Experience</dt>
            <dd>
                <h2 id="exp1"> <?php echo $_POST['exp1']; ?><span id="duration1"><?php echo $_POST['duration1']; ?></span></h2>
                <ul>
                    <li id="exp1desc"><?php echo $_POST['exp1desc']; ?></li>

                </ul>
                
                <h2 id="exp2">  <?php echo $_POST['exp2']; ?><span id="duration2"><?php echo $_POST['duration2']; ?> </span></h2>
                <ul>
                    <li id="exp2desc"> <?php echo $_POST['exp2desc']; ?></li>
                    
                </ul> 
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Hobbies</dt>
            <dd id="hobby1"> <?php echo $_POST['hobby1']; ?></dd>
            <dd id="hobby2"> <?php echo $_POST['hobby2']; ?></dd>
            <dd class="clear"></dd>
            
            <dt>References</dt>
            <dd>Available on request</dd>
            
            <dd class="clear"></dd>
        </dl>
        
        <div class="clear"></div>
        <?php
       
		
 ?>
   <script>
var email=$('#email').val();
console.log("Email "+email);
$.get("info.php", { 'email' : email },function(data){
	$('#name').innerHTML=data[0].name;
	document.getElementById('major').innerHTML=data[0].major;
	
	},'json');
	
  
</script>
 
         <form name="printform" method="post" action="pdftest.php" >
    <input type="hidden" name="url" id="url"  / >
    <input type="hidden" name="html" id="html" />
    <button type="submit" name="submit">Print</button>
    </form>
        <script>
		var url=window.location.href;
		//console.log("the page "+url);
document.getElementById("url").innerHTML=url;
var src=new XMLSerializer().serializeToString(document);
document.getElementById("html").value=src;
		</script>
       
    </div>

</body>


</html>


