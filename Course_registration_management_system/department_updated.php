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
if (isset($_SESSION['dept_code'])){
	
	$delet_id = $_SESSION['dept_code'];
$full_name=$_POST['full_name'];
$dept_code=$_POST['dept_code'];
$sql="UPDATE department SET full_name='$full_name', dept_code='$dept_code' WHERE dept_code = '$delet_id'";
//check duplicate 
$check_name="select full_name from department where full_name='$full_name'";
$name=mysqli_query($con,$check_name);
$count1=mysqli_num_rows($name);
if($count1>1){
	$m= "<h3>Duplicate Department Name ...</h3>";
	echo "<script type='text/javascript'>alert('$m');</script>";
}

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
header("refresh:1; url=edit_department.php");
}
?>
