
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
$course_title=$_POST['course_title'];
$course_code=$_POST['course_code'];
$pre_req=$_POST['pre_req'];
$credit=$_POST['credit'];
$department=$_POST['department'];

$sql="insert into course VALUES('$course_title','$course_code','$pre_req','$department','$credit')";
$valid=0;
if(!preg_match('/^[.0-9]+$/', $credit))
    {
      $valid = 0;
      echo 'Credit invalid !';
      // your other code here
    }
	else{
		$valid=1;
	}

if($valid==1){
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
header("refresh:1; url=add_course.php");
}
else{
 $msg = "Insertion Failed!!!";
echo "<script type='text/javascript'>alert('$msg');</script>";
	header("refresh:1; url=add_course.php");
}
?>
