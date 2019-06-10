<?php
session_start();
if (!isset($_SESSION['user1'])) {
    header('Location: student.php');
    exit();
}

$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

$sql= "SELECT s_name, year from semester";
$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
$s_name=$row['s_name'];
$year=$row['year'];
}
}

if (isset($_SESSION['user1'])){$update_id = $_SESSION['user1'];}
$sql2= "select student_id,semester,year from receipt WHERE student_id = '$update_id' AND semester='$s_name' AND year='$year'";
$result2 = $conn-> query($sql2);
if($result2-> num_rows > 0){
	$sql3= "select student_id,s_name,year from stu_offer WHERE student_id = '$update_id' AND s_name='$s_name' AND year='$year'";
	$result3 = $conn-> query($sql3);
	if($result3-> num_rows > 0){
		$msg = "Already Registered!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header('refresh:1; url=course_registration.php');
	}
	else{
	header("refresh:1; url=course_registration.php");
	}
}
else{
	header("refresh:1; url=receipt_no.php");
}

?>