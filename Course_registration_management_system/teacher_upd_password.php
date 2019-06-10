<?php 
session_start();
if (!isset($_SESSION['user2'])) {
    header('Location: teacher.php');
    exit();
}
//else{
//echo 'You have successfully logged as '.$_SESSION['user2'];
//}
?>

<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">

<?php
include "style6.php";
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

//if(isset($_GET['profile'])){
	
//	$id = $_GET['profile'];
//}
if (isset($_SESSION['user2'])){$id = $_SESSION['user2'];}
?>
</head>
<body>
<div class="header" id="myHeader">
  <img src="images/BUBT-LOGO-1_01.png" width="300" height="120">
  <ul><b>
  <li><a href="t_my_profile.php">My Profile</a></li>
  <li><a href="confirm_course.php">Course Confirmation</a></li>
  <li><a href="accept_course.php">Accepted Course Request</a></li>
  <li><a href="teach_student_list.php">Incharged Student List</a></li>
  <li><a href="teach_off_course.php">Offered Course List</a></li>
  <li1><a href="logout2.php">Logout</a></li1></b>
</ul>

</div>
<hr>

<div class="bg-img">
<div>

<form action="teacher_updated_password.php" method="POST" class="container">
<h3 align="center">CHANGE PASSWORD</h3>

<fieldset>
<label for="code_name">Code Name</label>
<input type="text" placeholder="Code Name" name="code_name" required/>

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
