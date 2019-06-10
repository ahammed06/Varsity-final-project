<?php
session_start();
$connection=mysqli_connect('localhost', 'root', '');
mysqli_select_db($connection, 'course_list');

if (isset($_POST['code_name']) and isset($_POST['password'])){
	$code_name=$_POST['code_name'];
	$password=$_POST['password'];
	$sql="select * from teacher where code_name='".$code_name."' AND password='".$password."'";
	
	$result=mysqli_query($connection,$sql) or die(mysqli_error($connection));
		
	if(mysqli_num_rows($result)==1){
		while($row=mysqli_fetch_assoc($result)){
		//$student_id=$row["student_id"];
		//session_start();
		$id=$row['id'];
		$_SESSION['user2'] = $id;
                  header("Location:t_my_profile.php");
		}
		//header("refresh:0; url=t_my_profile.php?profile=$id");
	}
	else{
		$msg="Invalid user2name/Password...";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:0; url=teacher.php");
	}
}
//echo $id;
?>

