<?php 
session_start();
if (!isset($_SESSION['user2'])) {
    header('Location: teacher.php');
    exit();
}
//else{
//echo 'You have successfully logged as '.$_SESSION['user2'];
//}

if (isset($_SESSION['user2'])){$id = $_SESSION['user2'];}

$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
		if(isset($_POST['re_password']))
		{
		$code_name=($_POST['code_name']);
		$old_pass=$_POST['old_pass'];
		$new_pass=$_POST['new_pass'];
		$re_pass=$_POST['re_pass'];
		$chg_pwd="select * from teacher where id='$id'";
		$result = $conn-> query($chg_pwd);	
        $row = $result-> fetch_assoc();
		//$chg_pwd1=mysql_fetch_array($chg_pwd);
		$data_pwd=$row['password'];
		$code=$row['code_name'];
		if($code_name==$code){
		if($data_pwd==$old_pass){
		if($new_pass==$re_pass){
			$update_pwd="update teacher set password='$new_pass' where code_name='$code'";
			$result2 = $conn-> query($update_pwd);	
            //$row = $result-> fetch_assoc();
			echo "<script>alert('Password Sucessfully Changed...'); </script>";
		}
		else{
			echo "<script>alert('Your New Password and Retype Password do not match...'); </script>";
		}
		}
		else
		{
		echo "<script>alert('Your old password is wrong...');</script>";
		}}else
		{
		echo "<script>alert('Your Code Name is wrong...');</script>";
		}}
		header("refresh:1; url=t_my_profile.php");
		$conn->close();
?>