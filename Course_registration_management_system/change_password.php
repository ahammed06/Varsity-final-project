<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">

<?php
session_start();
if (!isset($_SESSION['user1'])) {
    header('Location: student.php');
    exit();
}
include "style6.php";
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
else{
if (isset($_SESSION['user1'])){$id = $_SESSION['user1'];
}}

?>
</head>
<body>
<?php
include "stu_header.php";
?>
<hr>

<div class="bg-img">
<div>
<?php 
		$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
		if(isset($_POST['re_password']))
		{
		$s_id=($_POST['student_id']);
		$old_pass=$_POST['old_pass'];
		$new_pass=$_POST['new_pass'];
		$re_pass=$_POST['re_pass'];
		$chg_pwd="select * from student where student_id='$id'";
		$result = $conn-> query($chg_pwd);	
        $row = $result-> fetch_assoc();
		//$chg_pwd1=mysql_fetch_array($chg_pwd);
		$data_pwd=$row['password'];
		if($id==$s_id){
		if($data_pwd==$old_pass){
		if($new_pass==$re_pass){
			$update_pwd="update student set password='$new_pass' where student_id='$id'";
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
		}}
		else
		{
		echo "<script>alert('Wrong ID...');</script>";
		}}
	?>
<form method="POST" class="container">
<h3 align="center" style="font-size:20px;">CHANGE PASSWORD</h3>

<fieldset>
<label for="student_id">Student ID</label>
<input type="text" placeholder="Student ID" name="student_id" required/>

<label for="old_pass">Old Password</label>
<input type="password" placeholder="old password" name="old_pass" required/>

<label for="new_pass">New Password</label>
<input type="password" placeholder="New Password" name="new_pass" required/>

<label for="re_pass">Repeat New Password</label>
<input type="password" placeholder="Repeat Password" name="re_pass" required/>

<input type="submit" class="btn" name="re_password" value="Submit"/>
</form>
</fieldset>
<!--<h3>Password must contain the following:</h3>
  <p>At least One Number...</p>
  <p>At least one letter...</p>
  <p>there have to be 8-12 characters...</p>-->



</div> 
</div> 
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</body>
</html> 
