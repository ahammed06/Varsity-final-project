<?php
 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}

$student_id=filter_input(INPUT_POST, 'student_id');
$name=filter_input(INPUT_POST, 'name');
$gender=filter_input(INPUT_POST, 'gender');
$email=filter_input(INPUT_POST, 'email');
$intake=filter_input(INPUT_POST, 'intake');
$section=filter_input(INPUT_POST, 'section');
$mobile=filter_input(INPUT_POST, 'mobile');
$department=filter_input(INPUT_POST, 'department');
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$password = substr( str_shuffle( $chars ), 0, 8 );


if(!empty($student_id)){
	if(!empty($name)){
		if(!empty($email)){
			if(!empty($intake)){
				if(!empty($section)){
					if(!empty($mobile)){
						if(!empty($department)){
							$host="localhost";
							$dbusername="root";
							$dbpassword="";
							$dbname="course_list";
					    $con=new mysqli ($host, $dbusername, $dbpassword, $dbname);
						if(mysqli_connect_error()){
							die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
						}
						else{
	
	$valid=0;
	if(!preg_match('/^[0-9]+$/', $student_id)) // mobile is valid
    {
      $valid = 0;
      echo 'Student id invalid !';
      // your other code here
    }
	elseif(!preg_match('/^[0-9]+$/', $intake)) // mobile is valid
    {
      $valid = 0;
      echo 'Intake invalid !';
      // your other code here
    }
	elseif(!preg_match('/^[0-9]+$/', $section)) // mobile is valid
    {
      $valid = 0;
      echo 'Section invalid !';
      // your other code here
    }
	elseif(!preg_match('/^[.A-z0-9_\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/', $email)) // email is valid
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
    else // mobile is not valid
    {
		$valid = 1;
    }
	
							
							
							$sql = "INSERT INTO student VALUES ('','$student_id','$name','$gender','$email','$intake','$section','$mobile','$department','$password','')";

$check_id="select student_id from student where student_id='$student_id'";
$id=mysqli_query($con,$check_id);
$count1=mysqli_num_rows($id);
if($count1>0){
	$m= "<h3>Duplicate Student ID ...</h3>";
	echo "<script type='text/javascript'>alert('$m');</script>";
}
//check duplicate
$check_email="select email from student where email='$email'";
$em=mysqli_query($con,$check_email);
$count2=mysqli_num_rows($em);
if($count2>0){
	$m= "<h3>Duplicate E-mail ...</h3>";
	echo "<script type='text/javascript'>alert('$m');</script>";
}

$check_mobile="select mobile from student where mobile='$mobile'";
$mo=mysqli_query($con,$check_mobile);
$count3=mysqli_num_rows($mo);
if($count3>0){
	$m= "<h3>Duplicate Mobile Number ...</h3>";
	echo "<script type='text/javascript'>alert('$m');</script>";
}
if ($valid == 1) {
if($con->query($sql))
{
	
$msg = ("Successfully Inserted!!!");
echo "<script type='text/javascript'>alert('$msg');</script>";
$sql= "select student_id from student WHERE student_id='$student_id'";
$result = $con-> query($sql);
header("refresh:1; url=add_student_pic.php?submit=$student_id");
}
else
{
	$message = "Insertion Failed!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=add_student.php");
}}
else
{
	$message = "Insertion Failed!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=add_student.php");
}

$con->close();
}}}}}}}}
?>
