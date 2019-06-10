<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: admin_profile.php');
    exit();
}

if (isset($_SESSION['user1'])) {
    header('Location: student_profile.php');
    exit();
}

if (isset($_SESSION['user2'])) {
    header('Location: t_my_profile.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">
<?php 
include "style.php";
?>
</head>

<body>
<div class="header">
  <img src="images/BUBT-LOGO-1_01.png" width="300" height="120">
  <ul><b>
  <li><a href="https://www.bubt.edu.bd/">BUBT HOME</a></li>
  <li><a href="http://www.annex.bubt.edu.bd/">BUBT ANNEX</a></li>
  <div class="dropdown">
    <button class="dropbtn">LOGIN AS... 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="student.php">STUDENT</a>
      <a href="teacher.php">TEACHER</a>
      <a href="admin.php">ADMIN</a>
    </div>
  </div> 
 </ul>
</div>
<hr>

<div class="bg">
<Br>
<form method="post" action="s_profile.php" class="container">
<h3 align="center">Student Login</h3>

<label for="student_id">Student ID</label>
<input type="text" placeholder="Enter Student ID" name="student_id" required>

<label for="password">Password</label>
<input type="password" placeholder="Enter Password" name="password" required>

<button type="submit" class="btn" value="submit">Login</button>
<hr>
<button type="reset" class="btn" value="Reset">Reset</button>

</form>
<Br>
</div>

<div class="footer">
  <ul><b>
  <li2><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li2>
</ul>
</div>

</body>