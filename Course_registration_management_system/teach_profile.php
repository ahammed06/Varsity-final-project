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
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
rel="stylesheet">
<?php
include "style2.php";
?>
</head>
<body>
<div class="header" id="myHeader">
  <img src="images/BUBT-LOGO-1_01.png" width="300" height="120">
  <ul><b>
  <li><a href="https://www.bubt.edu.bd/">BUBT HOME</a></li>
  <li><a href="http://www.annex.bubt.edu.bd/">BUBT ANNEX</a></li>
  <li1><a href="logout2.php">Logout</a></li1></b>
</ul>
</div>
<hr>
<div class="bg-img">
<br><br>
<div>
<?php
//if(isset($_GET['profile'])){
//$id = $_GET['profile'];
//}
if (isset($_SESSION['user2'])){$id = $_SESSION['user2'];}
?>
<br><br><br><br>
  <ul2>
  <li2><a href="t_my_profile.php">My Profile</a></li2>
  <hr>
  <li2><a href="confirm_course.php">Course Confirmation</a></li2>
  <hr>
  <li2><a href="accept_course.php">Accepted Course Request</a></li2>
  <hr>
  <li2><a href="teach_student_list.php">Incharged Student List</a></li2>
  <hr>
  <li2><a href="teach_off_course.php">Offered Course List</a></li2>
</ul2>
<br><br><br><br>
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
