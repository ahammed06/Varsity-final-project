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
$semester=$_POST['semester'];
$year=$_POST['year'];

if (isset($_SESSION['user'])){$delet_id = $_SESSION['user'];

$sql="UPDATE semester SET s_name='$semester',year='$year' WHERE id = 16";

if(!preg_match('/^[0-9]+$/', $year)) 
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
header("refresh:1; url=update.php");
}
else
{
	$message = "Successfully Updated!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=update.php");
}}
else{
 $msg = "Update Failed!!!";
echo "<script type='text/javascript'>alert('$msg');</script>";
header("refresh:1; url=update.php");
}}
else
{
	$message = "Update Failed!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=update.php");
}


?>
