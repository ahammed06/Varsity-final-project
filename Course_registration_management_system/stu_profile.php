<?php 
session_start();
if (!isset($_SESSION['user1'])) {
    header('Location: student.php');
    exit();
}
//else{
//echo 'You have successfully logged as '.$_SESSION['user1'];
//}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
rel="stylesheet">
<?php
include "s_style9.php";
if (isset($_SESSION['user1'])){$student_id = $_SESSION['user1'];}
?>
</head>
<body>
<div class="header" id="myHeader">
  <img src="images/BUBT-LOGO-1_01.png" width="300" height="120">
  <ul><b>
  <li><a href="notice.php">Notice Board</a></li>
  <li><a href="phone.php">Phone Book</a></li> 
  <li1><a href="logout.php">Logout</a></li1></b>
</ul>
</div>
<hr>

<br><br><br><br><br>
<div>
<ul3>
<li>
<a href="student_profile.php">
<div class="icon">
<i class="fa fa-user" aria-hidden="true"></i>
</div>
<div class="name" data-text="MY PROFILE">MY PROFILE</div>
</a>
</li>

<li>
<a href="receipt_no.php">
<div class="icon">
<i class="fa fa-folder-open" aria-hidden="true"></i>
</div>
<div class="name" data-text="COURSE REGISTRATION">COURSE REGISTRATION</div>
</a>

</li>

<li>
<a href="stu_course_list.php">
<div class="icon">
<i class="fa fa-files-o" aria-hidden="true"></i>
</div>
<div class="name" data-text="ALL COURSES">ALL COURSES</div>
</a>
</li>

<li>
<a href="stu_offered_courses.php">
<div class="icon">
<i class="fa fa-book" aria-hidden="true"></i>
</div>
<div class="name" data-text="OFFERED COURSES">OFFERED COURSES</div>
</a>
</li>

<li>
<a href="stu_incharge.php">
<div class="icon">
<i class="fa fa-users" aria-hidden="true"></i>
</div>
<div class="name" data-text="MY INTAKE INCHARGE">MY INTAKE INCHARGE</div>
</a>
</li>

<li>
<a href="Completed_Courses.php">
<div class="icon">
<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
</div>
<div class="name" data-text="PAYMENT RECEIPT">COMPLETED COURSES</div>

</a>
</li>

<li>
<a href="change_password.php">
<div class="icon">
<i class="fa fa-user-secret" aria-hidden="true"></i>
</div>
<div class="name" data-text="CHANGE PASSWORD">CHANGE PASSWORD</div>
</a>
</li>
</ul3>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>

</body>
</html> 
