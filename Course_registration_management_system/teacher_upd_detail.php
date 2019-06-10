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
include "style5.php";
if (isset($_SESSION['user2'])){$profile = $_SESSION['user2'];}
?>
</head>
<STYLE></STYLE>
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

<div class="body">
<br><br><br><br><br><br>
<h2>Update Profile</h2>
<div class="menu">
<div class="btn"><a href="teacher_upd_photo.php">Change Photo</a></div>
<div class="btn"><a href="teacher_upd_profile.php">Update Profile Information</a></div>
<div class="btn"><a href="teacher_upd_password.php">Change Password</a></div>
</div>
</div>
<div class="footer">
  <ul><b>
  <li2><c>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</c></li2>
</ul>
</div>
</body>
</html>
