<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}

$con=mysqli_connect('127.0.0.1','root','');
if(!$con)
{
	echo 'Not connected to server!!!';
}
if(!mysqli_select_db($con,'course_list'))
{
	echo 'Database not selected!!!';
}

if (isset($_POST['next'])) {
	
$target_dir = "student_images/";
if (!file_exists('student_images/')) {
    mkdir('student_images/', 0777, true);
}
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

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
$student_id=$_SESSION['student_id'];

$sql1= "select image from student WHERE student_id = '$student_id'";
$result = $con-> query($sql1);

$row = $result-> fetch_assoc();
$data = $row["image"];
	$dir = "student_images/";
	$path = $dir.$data;
	
$sql="UPDATE student SET image='$image' WHERE student_id = '$student_id'";

if ($uploadOk == 1) {
if(!mysqli_query($con,$sql))
{
 $msg = "Insertion Failed!!!";
echo "<script type='text/javascript'>alert('$msg');</script>";
header("refresh:1; url=up_student_pic.php");
}
else
{
	if (!unlink($path)){
			echo "file not deleted";
		}
		else{
	//move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
	
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file . $newfilename);
	echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	echo "file deleted";
	$message = "Successfully Updated!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=up_student.php");
}}}
else
{
	$message = "Insertion Failed!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=up_student_pic.php");
}}

elseif (isset($_POST['skip']))
{
	$message = "Skipped!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=up_student.php");
}

?>
