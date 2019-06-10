<?php
 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
?>

<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">
<?php 
include "style2.php";
if (isset($_SESSION['user'])){$id = $_SESSION['user'];}
?>
</head>

<body>

<?php
include "admin_header.php";
?>

<div class="bg-img">
<br><br><Br>
<div>
  <ul2>
  <li2><a href="add_student.php">Add New Student</a></li2>
  <hr>
  <li2><a href="add_teacher.php">Add New Teacher</a></li2>
  <hr>
  <li2><a href="add_course.php">Add New Course</a></li2>
  <hr>
  <li2><a href="add_incharge.php">Add Incharge</a></li2>
  <hr>
  <li2><a href="course_offer.php">New Course Offer</a></li2>
  <hr>
  <li2><a href="student_list.php">Student List</a></li2>
  <hr>
  <li2><a href="teacher_list.php">Teacher List</a></li2>
  <hr>
  <li2><a href="course_search.php">Course List</a></li2>
  <hr>
  <li2><a href="search_incharge.php">Incharge List</a></li2>
  <hr>
  <li2><a href="search_offered_course.php">Offered Course List</a></li2>
  <hr>
  <li2><a href="student_pass.php">Students Primary Password</a></li2>
  <hr>
  <li2><a href="teacher_pass.php">Teachers Primary Password</a></li2>
  <hr>
  <li2><a href="update.php">Update</a></li2>
  <hr>
  <li2><a href="search.php">Search</a></li2>
</ul2>
</div>
<br><br><Br>
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</div>
</body>
</html> 
