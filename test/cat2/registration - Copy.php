<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- saved from url=(0042)file:///C:/wamp/www/cat2/registration.html -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     

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
      <script>
	  $(document).ready(function() {
  //      $('#img').hide();

	//  $('#image').click(function(e) {
   //     $('#img').click();
   // });
    });	
	
	  </script>
</head>

<body>
<?php
 // Include confi.php
 include_once('confi.php');
 
 $email = isset($_POST['email']) ? mysql_real_escape_string($_POST['email']) :  "";
 
 $(!empty($email){
 $qur = mysql_query("select email  from  `users` where email='$email'");
 $ct=0;
 while($r = mysql_fetch_array($qur)){
 $ct=$ct+1;
 }
 }
 
 if(ct>0){
 $qur = mysql_query("select name, email, mobile,objective, univname, major,  minor  ,  skillname1 ,  skill1 ,  skillname2 ,  skill2 ,  exp1  ,  duration1 ,  exp1desc ,  exp2 ,  duration2 ,  exp2desc , hobby1 ,  hobby2  from  `users` where email='$email'");
 $result =array();
 while($r = mysql_fetch_array($qur)){
 extract($r);
 $result[] = array("name" => $name, "email" => $email, 'mobile' => $mobile, "objective" => $objective , "univname" =>$univname , "major" =>$major , "minor" =>$minor , "skillname1" =>$skillname1 , "skill1" => $skill1 , "skillname2" => $skillname2 , "skill2" => $skill2 , "exp1" => $exp1 , "duration1" => $duration1 , "exp1desc" => $exp1desc , "exp2" => $exp2 , "duration2" => $duration2 , "exp2desc" => $exp2desc , "hobby1" => $hobby1 , "hobby2" => $hobby2); 
 }
}
?>
    <div id="page-wrap">
      <form name="registrationform" action="profile.php" enctype="multipart/form-data" method="post">
    <div id="pic">
        
       <!-- <img src="<?php /* echo $_POST['image'] ;*/ ?>" id="image" width="150" height="150"/> -->
            <input type="file" name="image" id="img" required />
            
            </div>
           <!-- <p><input type="submit" name="submit" id="submit" value="Upload" />-->
  
        <div id="contact-info" class="vcard">
        
            <!-- Microformats! -->
        
            <h1 class="fn" id="name"><?php echo $_POST['name']; ?></h1>
        
            <p>
               Mobile: <span class="tel"><input type="text" id="mobile" name="mobile" required placeholder="Enter your 10 digit mobile number"></span><br>
                Email: <span id='email'><?php echo $_POST['email']; ?> </span>
                <input type="hidden" value="<?php echo $_POST['email']; ?>"  name="email" />
				<input type="hidden" value="<?php echo $_POST['name']; ?>"  name="name" />
            </p>
        </div>
                
        <div id="objective">
      <h3> Objective</h3>
            <p>
                <textarea name="objective" rows="5" cols="30" id="objective1" placeholder="Type the objective here" required ></textarea>
            </p>
        </div>
        
        <div class="clear"></div>
        
        <dl>
            <dd class="clear"></dd>
            
            <dt>Education</dt>
            <dd>
                <h2><input type="text" name="univname" id="univname" placeholder="University name" size="50" required /></h2>
                <p><strong>Major:</strong> <input type="text" name="major" id="major" placeholder="Type your major here" size="35" required /><br>
                   <strong>Minor:</strong> <input type="text" name="minor"  id="minor" placeholder="Type your minor studies here" size="35" required /></p>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Skills</dt>
            <dd>
                <h2><input type="text" name="skillname1" id="skillname1" placeholder="Type of skills eg:technical, non-technical" required /></h2>
                <p><input type="text" name="skill1" id="skill1" placeholder="Type your skills" size="35" required /></p>
                
                <h2><input type="text" name="skillname2" id="skillname2" placeholder="Type of skills eg:technical, non-technical" required /></h2>
                <p><input type="text" name="skill2" id="skill2" placeholder="Type your skills" size="35" required /></p>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Experience</dt>
            <dd>
                <h2><input type="text" name="exp1" id="exp1" placeholder="Type of your awards or experience " size="40" required /> 
                <span><input type="text" name="duration1" id="duration1" placeholder="Date and place of your achievement" size="30" required /></span></h2>
                <ul>
                    <li><input type="text" name="exp1desc" id="exp1desc" placeholder="Description about the experience" size="35" required /></li>
                    
                </ul>
                
                <h2><input type="text" name="exp2" id="exp2" placeholder="Type of your award or experience" size="40"  /><span><input type="text" name="duration2" placeholder="Date and place of your achievement" size="30"/></span></h2>
                <ul>
                    <li><input type="text" name="exp2desc" id="exp2desc" placeholder="Description about the experience" size="35"/></li>
                    
                </ul> 
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Hobbies</dt>
            <dd><input type="text" name="hobby1" id="hobby1" placeholder="Type your hobbies" size="40" required /></dd>
            <dd><input type="text" name="hobby2" id="hobby2" placeholder="Type your hobbies" size="40" required /></dd>
            
            <dd class="clear"></dd>
            
            <dt>References</dt>
            <dd>Available on request</dd>
            
            <dd class="clear"></dd>
        </dl>
        <input type="submit" name="submit" onclick="signup();"/>
        <div class="clear"></div>
    </form>
    </div>
    <script>
function signup(){
email=document.getElementById('email').innerHTML;
name=document.getElementById('name').innerHTML;
mobile=document.getElementById('mobile').value;
objective=document.getElementById('objective1').value;
univname= document.getElementById('univname').value;
major= document.getElementById('major').value;
minor= document.getElementById('minor').value;
skillname1= $('#skillname1').val();
skill1=  $('#skill1').val();
skillname2= $('#skillname2').val();
skill2= $('#skill2').val();
exp1= $('#exp1').val();
duration1= $('#duration1').val();
exp1desc=  $('#exp1desc').val();
exp2=  $('#exp2').val();
duration2=  $('#duration2').val();
exp2desc=  $('#exp2desc').val();
hobby1=  $('#hobby1').val();
hobby2=  $('#hobby2').val();
 
 $.post("signup.php", { 'email' : email ,'name' : name, 'mobile':  mobile,'objective' : objective, 'univname' : univname, 'major' :major, 
'minor' : minor, 'skillname1' : skillname1, 'skill1': skill1, 'skillname2' : skillname2, 'skill2': skill2, 'exp1': exp1 ,'duration1': duration1,
'exp1desc': exp1desc,'exp2': exp2, 'duration2': duration2, 'exp2desc':exp2desc, 'hobby1': hobby1, 'hobby2': hobby2 },function(data){
	if(data.status){
		alert("Registered Succesfully ");
		}
		else{
			alert("Registration Failed");
			}
	},'json');
}
</script>

</body></html>