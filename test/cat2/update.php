<?php
 // Include confi.php
include_once('confi.php');
 
if($_SERVER['REQUEST_METHOD'] == "PUT"){
 $email = isset($_SERVER['HTTP_EMAIL']) ? mysql_real_escape_string($_SERVER['HTTP_EMAIL']) : "";
 $name = isset($_SERVER['HTTP_NAME']) ? mysql_real_escape_string($_SERVER['HTTP_NAME']) : "";
 
 
 foreach($_SERVER as $key=>$value){
	 $updt.=$key." = " .$value .",";
	 }
	 $updt=substr($updt,0,-1);
 // Add your validations
 if(!empty($name)){
 $qur = mysql_query("UPDATE `users` SET  `name` =  '$name' WHERE  `users`.`email` ='$email';");
 if($qur){
 $json = array("status" => 1, "msg" => "Status updated!!.".$updt);
 }else{
 $json = array("status" => 0, "msg" => "Error updating status");
 }
 }else{
 $json = array("status" => 0, "msg" => "User ID not define");
 }
}else{
 $json = array("status" => 0, "msg" => "User ID not define" , "error" => mysql_error());
 }
 @mysql_close($conn);
 
 /* Output header */
 header('Content-type: application/json');
 echo json_encode($json);