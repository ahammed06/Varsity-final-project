<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}

$name=filter_input(INPUT_POST, 'name');
$gender=filter_input(INPUT_POST, 'gender');
$email=filter_input(INPUT_POST, 'email');
$intake=filter_input(INPUT_POST, 'intake');
$section=filter_input(INPUT_POST, 'section');
$mobile=filter_input(INPUT_POST, 'mobile');
$department=filter_input(INPUT_POST, 'department');


if (isset($_SESSION['student_id'])){
	
	
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
							
	$delet_id = $_SESSION['student_id'];
							$sql = "UPDATE `student` SET name='$name',gender='$gender',email='$email',intake='$intake',section='$section',mobile='$mobile',department='$department' WHERE `student_id` = $delet_id";
							
//check duplicate
$check_email="select email from student where email='$email'";
$em=mysqli_query($con,$check_email);
$count2=mysqli_num_rows($em);
if($count2>1){
	$m= "<h3>Duplicate E-mail ...</h3>";
	echo "<script type='text/javascript'>alert('$m');</script>";
}

$check_mobile="select mobile from student where mobile='$mobile'";
$mo=mysqli_query($con,$check_mobile);
$count3=mysqli_num_rows($mo);
if($count3>1){
	$m= "<h3>Duplicate Mobile Number ...</h3>";
	echo "<script type='text/javascript'>alert('$m');</script>";
}

$valid=0;
	if(!preg_match('/^[0-9]+$/', $intake)) // mobile is valid
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

if ($valid == 1) {
if($con->query($sql))
{
	
$msg = ("Successfully Updated!!!");
echo "<script type='text/javascript'>alert('$msg');</script>";
$sql= "select student_id from student WHERE student_id='$delet_id'";
$result = $con-> query($sql);
header("refresh:1; url=up_student_pic.php");
}
else
{
	$message = "Update Failed!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=up_student.php");
}}
else
{
	$message = "Update Failed!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=up_student.php");
}

$con->close();
}}}}}}}}
?>
