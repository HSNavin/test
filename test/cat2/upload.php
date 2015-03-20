<?php
$target_dir = "pics/";
$email=$_POST['emailid'];
$filename=$_FILES["image"]["name"];
$target_file = $target_dir . $email.basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
echo basename($_FILES["image"]["name"]);
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" ) //&& $imageFileType != "png" && $imageFileType != "jpeg"
//&& $imageFileType != "gif" ) 
{
    echo "File is not of jpg format";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	//$temp = explode(".",$_FILES["file"]["name"]);
//$newfilename = rand(1,99999) . '.' .end($temp);
//move_uploaded_file($_FILES["file"]["tmp_name"], "../img/imageDirectory/" . $newfilename;
	
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $filename). " has been uploaded.";
		rename($target_file,$target_dir.$email.".".$imageFileType);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>
