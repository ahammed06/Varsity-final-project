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

if (isset($_SESSION['student_id'])){
	
	$delet_id = $_SESSION['student_id'];
	
	$sql1= "select image from student WHERE student_id = '$delet_id'";
$result = $conn-> query($sql1);

$row = $result-> fetch_assoc();
$data = $row["image"];
	$dir = "student_images/";
	$path = $dir.$data;
	$sql = "DELETE FROM student WHERE student_id=$delet_id";

	if ($conn->query($sql) === TRUE) {
		if(!empty($data)){
		if (!unlink($path)){
			echo "file not deleted";
		}}
		else{
		$m="Record Deleted!!!";
	   echo "<script type='text/javascript'>alert('$m');</script>";
	   header("refresh:1; url=up_student.php");
	}} else {
		$m= "Record Not Deleted!!!";
	   echo "<script type='text/javascript'>alert('$m');</script>";
	   header("refresh:1; url=up_student.php");
	}
	header("refresh:1; url=up_student.php");
	
}



?>