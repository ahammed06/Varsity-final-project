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

$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

if(isset($_GET['delete'])){
	
	$acc_id = $_GET['delete'];
	$receipt_id = $_GET['receipt'];
	//$update_id = $_GET['profile'];
	$sql1="SELECT s_name,year FROM semester";
	$result1 =$conn-> query($sql1);
if($result1-> num_rows > 0){
while ($row1 = $result1-> fetch_assoc()){
$s_name=$row1["s_name"];
$year=$row1["year"];
}}
	$sql="UPDATE stu_offer SET status='dropped' WHERE student_id = '$acc_id' AND (status='accepted' OR status='pending') AND s_name='$s_name' AND year='$year'";

	if ($conn->query($sql) === TRUE) {
		
		$m="Record Dropped!!!";
	   echo "<script type='text/javascript'>alert('$m');</script>";
	   header("refresh:1; url=see_req_course.php?see=$acc_id&receipt=$receipt_id");
	} else {
		$m= "Record Not Dropped!!!";
	   echo "<script type='text/javascript'>alert('$m');</script>";
	   header("refresh:1; url=see_req_course.php?see=$acc_id&receipt=$receipt_id");
	}
	header("refresh:1; url=see_req_course.php?see=$acc_id&receipt=$receipt_id");
	
}



?>