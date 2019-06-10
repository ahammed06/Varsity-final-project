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
$t_name=$_POST['t_name'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$room=$_POST['room'];
$designation=$_POST['designation'];
$department=$_POST['department'];

if (isset($_SESSION['code_name'])){

$delet_id = $_SESSION['code_name'];
$sql="UPDATE teacher SET t_name='$t_name',gender='$gender',email='$email',mobile='$mobile',room='$room',designation='$designation',department='$department' WHERE code_name = '$delet_id'";
//check duplicate 

$check_email="select email from teacher where email='$email'";
$em=mysqli_query($con,$check_email);
$count2=mysqli_num_rows($em);
if($count2>1){
	$m= "<h3>Duplicate E-mail ...</h3>";
	echo "<script type='text/javascript'>alert('$m');</script>";
}
$check_mobile="select mobile from teacher where mobile='$mobile'";
$mo=mysqli_query($con,$check_mobile);
$count3=mysqli_num_rows($mo);
if($count3>1){
	$m= "<h3>Duplicate Mobile Number ...</h3>";
	echo "<script type='text/javascript'>alert('$m');</script>";
}

$valid=0;
if(!preg_match('/^[.A-z0-9_\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/', $email)) // email is valid
    {
      $valid = 0;
      echo 'Email invalid !';

      // your other code here
    }
elseif(!preg_match('/^[0-9]{11}+$/', $mobile)) // mobile is valid
    {
      $valid = 0;
      echo 'Phone number invalid !';

      // your other code here
    }
elseif(!preg_match('/^[0-9]+$/', $room)) // mobile is valid
    {
      $valid = 0;
      echo 'Room no. invalid !';
      // your other code here
    }
else // mobile is not valid
    {
		$valid = 1;
    }

if ($valid == 1) {
if(!mysqli_query($con,$sql))
{
 $msg = "Update Failed!!!";
echo "<script type='text/javascript'>alert('$msg');</script>";
header("refresh:1; url=up_teacher.php");
}
else
{
	$message = "Successfully Updated!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=up_teacher_pic.php");
}
}
else
{
	$message = "Update Failed!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=up_teacher.php");
}}
else
{
	$message = "Update Failed!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=up_teacher.php");
}


?>
