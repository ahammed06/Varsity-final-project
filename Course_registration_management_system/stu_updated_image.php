<?php

session_start();
if (!isset($_SESSION['user1'])) {
    header('Location: student.php');
    exit();
}

$target_dir = "student_images/";
if (!file_exists('student_images/')) {
    mkdir('student_images/', 0777, true);
}
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
					if(!empty($uploadOk)){
							$host="localhost";
							$dbusername="root";
							$dbpassword="";
							$dbname="course_list";
					    $con=new mysqli ($host, $dbusername, $dbpassword, $dbname);
						if(mysqli_connect_error()){
							die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
						}
						else{
							// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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

$image = addslashes($_FILES['fileToUpload']['name']);

							$delete_id = $_SESSION['user1'];
							$sql = "UPDATE `student` SET image='$image' WHERE `student_id` = $delete_id";
							
if ($uploadOk == 1) {
if($con->query($sql))
{
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
	//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
$msg = ("Successfully Updated!!!");
echo "<script type='text/javascript'>alert('$msg');</script>";
header("refresh:1; url=student_profile.php");
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
header("refresh:1; url=student_profile.php");
$con->close();
}}
?>
