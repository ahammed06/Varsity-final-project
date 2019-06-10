<?php
session_start();
include "s_style9.php";

$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
else{
if(isset($_GET['profile'])){
	
	$id = $_GET['profile'];
	$sql= "select id,t_name,code_name,gender,email,mobile,room,designation,department,image from teacher 
	WHERE `id` = $id";
$result = $conn-> query($sql);	
}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
rel="stylesheet">
</head>
<body>
<div class="header" id="myHeader">
  <img src="images/BUBT-LOGO-1_01.png" width="300" height="120">
  <ul><b>
  <li><a href="t_home.php?profile=<?php echo $id;?>">Home</a></li>
  <li><a href="t_my_profile.php?profile=<?php echo $id;?>">My Profile</a></li>
  <li><a href="confirm_course.php?profile=<?php echo $id; ?>">Course Registration</a></li>
  <li><a href="in_teacher_list.php">Teacher List</a><li>
  <li><a href="#">Change Password</a></li>
  <li1><a href="logout2.php">Logout</a></li1></b>
</ul>
</div>
<hr>
<div class="bg-img">
<br><br>
<div>
  <ul2>
  <li2><a href="t_my_profile.php?profile=<?php echo $id; ?>">My Profile</a></li2>
  <hr>
  <li2><a href="confirm_course.php?profile=<?php echo $id; ?>">Course Registration</a></li2>
  <hr>
  <li2><a href="incharge_stu_list.php?profile=<?php echo $id; ?>">Student List</a></li2>
  <hr>
  <li2><a href="in_teacher_list.php">Teacher List</a></li2>
  <hr>
  <li2><a href="#">Course List</a></li2>
  <hr>
  <li2><a href="#">Offered Course List</a></li2>
  <hr>
  <li2><a href="#">Search</a></li2>
</ul2>
</div>

<br><br>
</div>
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>

</body>
</html> 
