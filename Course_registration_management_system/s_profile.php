<?php
session_start();

$connection=mysqli_connect('localhost', 'root', '');
mysqli_select_db($connection, 'course_list');

if (isset($_POST['student_id']) and isset($_POST['password'])){
	$student_id=$_POST['student_id'];
	$password=$_POST['password'];
	$sql="select * from student where student_id='".$student_id."' AND password='".$password."'";
	
	$result=mysqli_query($connection,$sql) or die(mysqli_error($connection));
	
	
	if(mysqli_num_rows($result)==1){
		while($row=mysqli_fetch_assoc($result)){
		//$student_id=$row["student_id"];
		//session_start();
		$_SESSION['user1']=$student_id;
		}
		header("refresh:0; url=student_profile.php");
	}
	else{
		$msg="Invalid user1 name/Password...";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:0; url=student.php");
	}	
}
?>

