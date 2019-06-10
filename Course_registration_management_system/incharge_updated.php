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
	$sem = $_SESSION['semester'];
	$yea = $_SESSION['year'];
	$int = $_SESSION['intake'];
	$sec = $_SESSION['section'];
	$dep = $_SESSION['department'];
	
$semester=$_POST['semester'];
$year=$_POST['year'];
$code_name=$_POST['code_name'];
$intake=$_POST['intake'];
$section=$_POST['section'];
$department=$_POST['department'];

$sql="UPDATE incharge SET semester='$semester',year='$year',code_name='$code_name',intake='$intake',section='$section',department='$department' WHERE semester='$sem' AND year='$yea' AND intake='$int' AND section='$sec' AND department='$dep'";

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
}
else
{
	$message = "Successfully Updated!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
}
header("refresh:1; url=up_incharge.php");
}
else
{
	$message = "Successfully Updated!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=up_incharge.php");
}
?>
