<?php 
session_start();
if (!isset($_SESSION['user2'])) {
    header('Location: teacher.php');
    exit();
}

$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}


$sql4= "select DISTINCT s_name,year from semester";
$result4 =$conn-> query($sql4);
if($result4-> num_rows > 0){
while ($row4 = $result4-> fetch_assoc()){
$semester=$row4["s_name"];
$year=$row4["year"];
}}

$stu_id=$_GET["update"];
$receipt=$_GET["receipt"];

if(isset($_POST["accept"]))
{
	if(isset($_POST["add"])){
	
	foreach($_POST["add"] as $values){
		$values = explode(" ", $values);
		$id = $values[0];
		
		$sql1="UPDATE stu_offer SET status='accepted' WHERE id = '$id'";
	   $result1 =$conn-> query($sql1) or die(mysql_error());
		   $valid=1;
	}
		   if ($result1 === TRUE) {
        $msg="Successfully Submitted!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:1; url=confirm_course.php");
		
} else {
	$msg="Failed!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:1; url=confirm_course_detail.php?accept=$stu_id&receipt=$receipt");
    //echo "Error: " . $sql4 . "<br>" . $conn->error;
}}
else {
	$msg="Empty!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:1; url=confirm_course_detail.php?accept=$stu_id&receipt=$receipt");
    //echo "Error: " . $sql4 . "<br>" . $conn->error;
}}

if(isset($_POST["reject"]))
{
	if(isset($_POST["add"])){
	
	foreach($_POST["add"] as $values){
		$values = explode(" ", $values);
		$id = $values[0];
		
		$sql1="UPDATE stu_offer SET status='rejected' WHERE id = '$id'";
	   $result1 =$conn-> query($sql1) or die(mysql_error());
		   $valid=1;
	}
		   if ($result1 === TRUE) {
        $msg="Successfully Submitted!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:1; url=confirm_course.php");
		
} else {
	$msg="Failed!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:1; url=confirm_course_detail.php?accept=$stu_id&receipt=$receipt");
    //echo "Error: " . $sql4 . "<br>" . $conn->error;
}}
else {
	$msg="Empty!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:1; url=confirm_course_detail.php?accept=$stu_id&receipt=$receipt");
    //echo "Error: " . $sql4 . "<br>" . $conn->error;
}}
	
$conn->close();
?>