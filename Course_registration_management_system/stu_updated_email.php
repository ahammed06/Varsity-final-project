<?php

session_start();
if (!isset($_SESSION['user1'])) {
    header('Location: student.php');
    exit();
}

$email=filter_input(INPUT_POST, 'email');
//$department=filter_input(INPUT_POST, 'department');

if(isset($_POST['submit'])){		
		if(!empty($email)){
			
			if(preg_match('/^[A-z0-9_\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/', $email)) // email is valid
    {
      $valid = 1;
    }
    else // email is not valid
    {
		$valid = 0;
      echo 'Email invalid !';
    }
							$host="localhost";
							$dbusername="root";
							$dbpassword="";
							$dbname="course_list";
					    $con=new mysqli ($host, $dbusername, $dbpassword, $dbname);
						if(mysqli_connect_error()){
							die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
						}
	$delete_id = $_SESSION['user1'];
	$sql = "UPDATE `student` SET email='$email' WHERE `student_id` = $delete_id";
							
//check duplicate
$check_email="select email from student where email='$email'";
$em=mysqli_query($con,$check_email);
$count2=mysqli_num_rows($em);
if($count2>1){
	$m= "<h3>Duplicate E-mail ...</h3>";
	echo "<script type='text/javascript'>alert('$m');</script>";
}
if ($valid == 1) {
if($con->query($sql))
{
$msg = ("Successfully Updated!!!");
echo "<script type='text/javascript'>alert('$msg');</script>";
header("refresh:1; url=student_profile.php");
}
else
{
	$message = "Update Failed!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}
else
{
	$message = "Update Failed!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
}
header("refresh:1; url=student_profile.php");
$con->close();
}
else
{
	$message = "Empty!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=student_profile.php");
}}
else
{
	$message = "Empty!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=student_profile.php");
}
?>
