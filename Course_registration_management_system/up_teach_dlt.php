<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}

$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

if (isset($_SESSION['code_name'])){
	
	$delet_id = $_SESSION['code_name'];
	
	$sql2= "select image from teacher WHERE code_name = '$delet_id'";
$result = $conn-> query($sql2);

$row = $result-> fetch_assoc();
$data = $row["image"];
	$dir = "teacher_images/";
	$path = $dir.$data;
	
	$sql = "DELETE FROM teacher WHERE code_name='$delet_id'";
	$sql1 = "DELETE FROM incharge WHERE code_name='$delet_id'";

	if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) {
		if(!empty($data)){
		if (!unlink($path)){
			echo "file not deleted";
		}}
		else{
		$m="Record Deleted!!!";
	   echo "<script type='text/javascript'>alert('$m');</script>";
	   header("refresh:1; url=up_teacher.php");
	}} else {
		$m= "Record Not Deleted!!!";
	   echo "<script type='text/javascript'>alert('$m');</script>";
	   header("refresh:1; url=up_teacher.php");
	}
	header("refresh:1; url=up_teacher.php");
	
}



?>