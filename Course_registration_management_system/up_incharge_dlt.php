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

if (isset($_SESSION['semester'])){
	
	$semester = $_SESSION['semester'];
	$year = $_SESSION['year'];
	$intake = $_SESSION['intake'];
	$section = $_SESSION['section'];
	$department = $_SESSION['department'];
	
	$sql = "DELETE FROM incharge WHERE semester='$semester' AND year='$year' AND intake='$intake' AND section='$section' AND department='$department'";

	if ($conn->query($sql) === TRUE) {
		$m="Record Deleted!!!";
	   echo "<script type='text/javascript'>alert('$m');</script>";
	} else {
		$m= "Record Not Deleted!!!";
	   echo "<script type='text/javascript'>alert('$m');</script>";
	}
	header("refresh:1; url=up_incharge.php");
	
}



?>