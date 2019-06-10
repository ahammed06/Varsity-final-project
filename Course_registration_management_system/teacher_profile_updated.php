<?php

session_start();
if (!isset($_SESSION['user2'])) {
    header('Location: teacher.php');
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
$email=$_POST['email'];
$mobile=$_POST['mobile'];

if (isset($_SESSION['user2'])){$delet_id = $_SESSION['user2'];

$sql="UPDATE teacher SET t_name='$t_name',email='$email',mobile='$mobile' WHERE id = '$delet_id'";
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

if(!empty($email)){
			
			if(preg_match('/^[A-z0-9_\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/', $email)) // email is valid
    {
      $valid = 1;

      // your other code here
    }
    else // email is not valid
    {
		$valid = 0;
      echo 'Email invalid !';
    }
}

if(!empty($mobile)){
						
			if(preg_match('/^[0-9]{11}+$/', $mobile)) // mobile is valid
    {
      $valid = 1;

      // your other code here
    }
    else // mobile is not valid
    {
		$valid = 0;
      echo 'Phone number invalid !';
    }
}

if ($valid == 1) {
if(!mysqli_query($con,$sql))
{
 $msg = "Update Failed!!!";
echo "<script type='text/javascript'>alert('$msg');</script>";
header("refresh:1; url=t_my_profile.php");
}
else
{
	$message = "Successfully Updated!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=t_my_profile.php");
}
}}
else
{
	$message = "Update Failed!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=t_my_profile.php");
}


?>
