<?php
 // Include confi.php
 include_once('confi.php');
 
 $email = isset($_GET['email']) ? mysql_real_escape_string($_GET['email']) :  "";
 
 if(!empty($email)){
 $qur = mysql_query("select name, email, mobile,objective, univname, major,  minor  ,  skillname1 ,  skill1 ,  skillname2 ,  skill2 ,  exp1  ,  duration1 ,  exp1desc ,  exp2 ,  duration2 ,  exp2desc , hobby1 ,  hobby2  from  `users` where email='$email'");
 $result =array();
 while($r = mysql_fetch_array($qur)){
 extract($r);
 $result[] = array("name" => $name, "email" => $email, 'mobile' => $mobile, "objective" => $objective , "univname" =>$univname , "major" =>$major , "minor" =>$minor , "skillname1" =>$skillname1 , "skill1" => $skill1 , "skillname2" => $skillname2 , "skill2" => $skill2 , "exp1" => $exp1 , "duration1" => $duration1 , "exp1desc" => $exp1desc , "exp2" => $exp2 , "duration2" => $duration2 , "exp2desc" => $exp2desc , "hobby1" => $hobby1 , "hobby2" => $hobby2); 
 }
 $json = $result;
 }else{
 $json = array("status" => 0, "msg" => "User ID not defined");
 }
 @mysql_close($conn);
 
 /* Output header */
 header('Content-type: application/json');
 echo json_encode($json);
 
 ?>