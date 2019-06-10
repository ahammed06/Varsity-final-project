<?php
$con=mysqli_connect('127.0.0.1','root','');
if(!$con)
{
	echo 'Not connected to server!!!';
}
if(!mysqli_select_db($con,'course_list'))
{
	echo 'Database not selected!!!';
}
$intake=$_POST['intake'];
$section=$_POST['section'];
$department=$_POST['department'];


$sql="insert into intake VALUES('$intake','$section','$department','')";


if(!mysqli_query($con,$sql))
{
 $msg = "Insertion Failed!!!";
echo "<script type='text/javascript'>alert('$msg');</script>";
}
else
{
	$message = "Successfully Inserted!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
}
header("refresh:1; url=add_intake.php");
?>
