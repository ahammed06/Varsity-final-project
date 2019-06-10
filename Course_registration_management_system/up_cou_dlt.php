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

if (isset($_SESSION['course_code'])){
	
	$delet_id = $_SESSION['course_code'];
	$delet_dept = $_SESSION['department'];
	$sql = "DELETE FROM course WHERE course_code='$delet_id' AND department='$delet_dept'";
	$sql1 = "DELETE FROM offer WHERE course_code='$delet_id' AND department='$delet_dept'";
	

	if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) {
		$m="Record Deleted!!!";
	   echo "<script type='text/javascript'>alert('$m');</script>";
	   header("refresh:1; url=up_course.php");
	} else {
		$m= "Record Not Deleted!!!";
	   echo "<script type='text/javascript'>alert('$m');</script>";
	   header("refresh:1; url=up_course.php");
	}
	header("refresh:1; url=up_course.php");
	
}



?>