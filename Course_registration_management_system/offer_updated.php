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
if (isset($_SESSION['course_code'])){
	
	$sem = $_SESSION['semester'];
	$yea = $_SESSION['year'];
	$int = $_SESSION['intake'];
	$sec = $_SESSION['section'];
	$dep = $_SESSION['department'];
	$cou = $_SESSION['course_code'];
	
$semester=$_POST['semester'];
$year=$_POST['year'];
$intake=$_POST['intake'];
$section=$_POST['section'];
$course_code=$_POST['course_code'];
$sql="UPDATE offer SET semester='$semester',year='$year',intake='$intake',section='$section',course_code='$course_code' WHERE semester='$sem' AND year='$yea' AND intake='$int' AND section='$sec' AND department='$dep' AND course_code='$cou'";

$valid=0;
if(!preg_match('/^[0-9]+$/', $intake)) // mobile is valid
    {
      $valid = 0;
      echo 'Intake invalid !';
      echo $intake;
      // your other code here
    }
	elseif(!preg_match('/^[0-9]+$/', $section)) // mobile is valid
    {
      $valid = 0;
      echo 'Section invalid !';
      // your other code here
    }
	elseif(!preg_match('/^[0-9]+$/', $year)) 
    {
      $valid = 0;
      echo 'Year invalid !';
      // your other code here
    }
    else // mobile is not valid
    {
		$valid = 1;
    }

if($valid==1){
if(!mysqli_query($con,$sql))
{
 $msg = "Update Failed!!!";
echo "<script type='text/javascript'>alert('$msg');</script>";
header("refresh:1; url=up_offer.php");
}
else
{
	$message = "Successfully Updated!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=up_rou.php");
}
}
else
{
	$message = "Successfully Updated!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=up_offer.php");
}
}
?>
