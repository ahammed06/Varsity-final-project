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
$full_name=$_POST['full_name'];
$dept_code=$_POST['dept_code'];

$sql="insert into department VALUES('$full_name','$dept_code')";
//check duplicate 
$check_name="select full_name from department where dept_code='$dept_code'";
$name=mysqli_query($con,$check_name);
$count1=mysqli_num_rows($name);
if($count1>0){
	$m= "<h3>Duplicate Department Name ...</h3>";
	echo "<script type='text/javascript'>alert('$m');</script>";
}

$check_code="select dept_code from department where dept_code='$dept_code'";
$code=mysqli_query($con,$check_code);
$count2=mysqli_num_rows($code);
if($count2>0){
	$m= "<h3>Duplicate Department Code ...</h3>";
	echo "<script type='text/javascript'>alert('$m');</script>";
}

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
header("refresh:1; url=add_department.php");
?>
