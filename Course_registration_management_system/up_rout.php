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
$semester = $_SESSION['semester'];
$year = $_SESSION['year'];
$intake = $_SESSION['intake'];
$section = $_SESSION['section'];
$department = $_SESSION['department'];
$course_code=$_POST['course_code'];

$sql= "select * from offer WHERE course_code='$course_code' AND semester='$semester' AND year='$year' AND intake='$intake' AND section='$section' AND department='$department'";
$result =$con-> query($sql);
if($result-> num_rows > 0){

$_SESSION['course_code']=$course_code;

header("refresh:0; url=up_rou.php");
}
else{
	$msg="No Such Course Offered!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
header("refresh:0; url=up_routine.php");
}

?>
