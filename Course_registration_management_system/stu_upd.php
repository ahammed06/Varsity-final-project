<?php 
session_start();
if (!isset($_SESSION['user1'])) {
    header('Location: student.php');
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
<?php
include "stu_header.php";
?>
<hr>

<div class="body">
<br><br><br><br><br><br>
<h2>Update Profile</h2>
<div class="menu">
<div class="btn"><a href="stu_upd_photo.php">Change Photo</a></div>
<div class="btn"><a href="stu_upd_email.php">Update Email</a></div>
<div class="btn"><a href="stu_upd_mobile.php">Update Mobile</a></div>
<div class="btn"><a href="change_password.php">Change Password</a></div>
</div>
</div>
<div class="footer">
  <ul><b>
  <li2><c>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</c></li2>
</ul>
</div>
</body>
</html>
