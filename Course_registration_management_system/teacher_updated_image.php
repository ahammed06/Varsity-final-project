<?php
session_start();
if (!isset($_SESSION['user2'])) {
    header('Location: teacher.php');
    exit();
}
//else{
//echo 'You have successfully logged as '.$_SESSION['user2'];
//}

if (isset($_SESSION['user2'])){$update_id = $_SESSION['user2'];}

$target_dir = "teacher_images/";
if (!file_exists('teacher_images/')) {
    mkdir('teacher_images/', 0777, true);
}
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
					if(!empty($uploadOk)){
							$host="localhost";
							$dbuser2name="root";
							$dbpassword="";
							$dbname="course_list";
					    $con=new mysqli ($host, $dbuser2name, $dbpassword, $dbname);
						if(mysqli_connect_error()){
							die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
						}
						else{
							// Check if image file is a actual image or fake image
//if(isset($_POST["profile"])) {
	if (isset($_SESSION['user2'])){
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 

$temp = explode(".", $_FILES["fileToUpload"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
$image = addslashes($_FILES['fileToUpload']['name']) . $newfilename;
							//$update_id = $_GET['profile'];
							
$sql2= "select image from teacher WHERE id = '$update_id'";
$result = $con-> query($sql2);

$row = $result-> fetch_assoc();
$data = $row["image"];
	$dir = "teacher_images/";
	$path = $dir.$data;
	
							$sql = "UPDATE `teacher` SET image='$image' WHERE `id` = $update_id";
							
if ($uploadOk == 1) {
if($con->query($sql))
{
	if (file_exists('$path')){
	if (!unlink($path)){
			echo "file not deleted";
		}
		else{
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file . $newfilename);
	//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
$msg = ("Successfully Updated!!!");
echo "<script type='text/javascript'>alert('$msg');</script>";
header("refresh:1; url=t_my_profile.php");
}}
else{
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file . $newfilename);
	//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
$msg = ("Successfully Updated!!!");
echo "<script type='text/javascript'>alert('$msg');</script>";
header("refresh:1; url=t_my_profile.php");
}
}
else
{
	$message = "Update Failed!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}
else
{
	$message = "Update Failed!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
}
header("refresh:1; url=t_my_profile.php");
$con->close();
}}
?>
