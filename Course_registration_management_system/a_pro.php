<?php
 
session_start();

$connection=mysqli_connect('localhost', 'root', '');
mysqli_select_db($connection, 'course_list');

if(isset($_POST['username'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$sql="select * from admin where username='".$username."' AND password='".$password."' limit 1";
	
	$result=mysqli_query($connection,$sql);
	
	if(mysqli_num_rows($result)==1){
		$_SESSION['user']=$username;
		header("refresh:0; url=admin_profile.php");
	}
	else{
		$msg="Login Failed";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:1; url=admin.php");
		exit();
	}
}
?>