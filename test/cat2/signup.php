<?php 
include_once('confi.php');
 
if($_SERVER['REQUEST_METHOD'] == "POST"){
 // Get data
 $name = isset($_POST['name']) ? mysql_real_escape_string($_POST['name']) : "";
 $email = isset($_POST['email']) ? mysql_real_escape_string($_POST['email']) : "";
 $mobile = isset($_POST['mobile']) ? mysql_real_escape_string($_POST['mobile']) : "";
 $objective = isset($_POST['objective']) ? mysql_real_escape_string($_POST['objective']) : "";
 $univname = isset($_POST['univname']) ? mysql_real_escape_string($_POST['univname']) : "";
 $major = isset($_POST['major']) ? mysql_real_escape_string($_POST['major']) : "";
 $minor = isset($_POST['minor']) ? mysql_real_escape_string($_POST['minor']) : "";
 $skillname1 = isset($_POST['skillname1']) ? mysql_real_escape_string($_POST['skillname1']) : "";
 $skill1 = isset($_POST['skill1']) ? mysql_real_escape_string($_POST['skill1']) : "";
 $skillname2 = isset($_POST['skillname2']) ? mysql_real_escape_string($_POST['skillname2']) : "";
 $skill2 = isset($_POST['skill2']) ? mysql_real_escape_string($_POST['skill2']) : "";
 $exp1 = isset($_POST['exp1']) ? mysql_real_escape_string($_POST['exp1']) : "";
 $duration1 = isset($_POST['duration1']) ? mysql_real_escape_string($_POST['duration1']) : "";
 $exp1desc = isset($_POST['exp1desc']) ? mysql_real_escape_string($_POST['exp1desc']) : "";
 $exp2 = isset($_POST['exp2']) ? mysql_real_escape_string($_POST['exp2']) : "";
 $duration2= isset($_POST['duration2']) ? mysql_real_escape_string($_POST['duration2']) : "";
 $exp2desc = isset($_POST['exp2desc']) ? mysql_real_escape_string($_POST['exp2desc']) : "";
 $hobby1 = isset($_POST['hobby1']) ? mysql_real_escape_string($_POST['hobby1']) : "";
 $hobby2 = isset($_POST['hobby2']) ? mysql_real_escape_string($_POST['hobby2']) : ""; 
 $errorcount=0;
 $requiredfields =array();

 foreach ($_POST as $key=>$value)
 {
  if($key !='exp2' || $key !='exp2desc' || $key !='duration2' || $key !='hobby2' )
   {
     if(empty($value))
     {
      array_push($requiredfields,$key);
      $errorcount++;
     }
   }
 }

 if($errorcount==0)
 {
  $sql = "INSERT INTO `rest_resume`.`users` (`name`, `email`, `mobile`,`objective`, `univname`, `major`, `minor` , `skillname1`, `skill1`, `skillname2`, `skill2`, `exp1` , `duration1`, `exp1desc`, `exp2`, `duration2`, `exp2desc`,`hobby1`, `hobby2`) VALUES ('$name','$email','$mobile', '$objective','$univname','$major','$minor' ,'$skillname1','$skill1','$skillname2','$skill2','$exp1','$duration1','$exp1desc','$exp2','$duration2','$exp2desc','$hobby1','$hobby2');";
  $qur = mysql_query($sql);
 
   if($qur)
   {
    $json = array("status" => 1, "msg" => "Done User added!");
   }
  
   else
   {
   $json = array("status" => 0, "msg" => "Error adding user!" , "error" => mysql_error());
   }
 }

 else
  {
  $json = array("status" => 0, "msg" => "Required Fields are empty" , "Required Fields" =>$requiredfields);
  }
 }

 else
 {
  $json = array("status" => 0, "msg" => "Request method not accepted");
 }
 
@mysql_close($conn);
 
/* Output header */
 header('Content-type: application/json');
 echo json_encode($json);
 ?>