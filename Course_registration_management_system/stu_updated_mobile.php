<?php
session_start();
if (!isset($_SESSION['user1'])) {
    header('Location: student.php');
    exit();
}

$mobile=filter_input(INPUT_POST, 'mobile');
//$department=filter_input(INPUT_POST, 'department');

if(isset($_POST['submit'])){		
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
							$host="localhost";
							$dbusername="root";
							$dbpassword="";
							$dbname="course_list";
					    $con=new mysqli ($host, $dbusername, $dbpassword, $dbname);
						if(mysqli_connect_error()){
							die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
						}
	$delete_id = $_SESSION['user1'];
	$sql = "UPDATE `student` SET mobile='$mobile' WHERE `student_id` = $delete_id";
							
//check duplicate
$check_mobile="select mobile from student where mobile='$mobile'";
$em=mysqli_query($con,$check_mobile);
$count2=mysqli_num_rows($em);
if($count2>1){
	$m= "<h3>Duplicate Mobile ...</h3>";
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
}else
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
