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
?>
</head>

<body>
<?php
include "admin_header.php";
?>

<div class="bg-img" align="center"><br><br><br><Br>
<h1><u>Update Information</u></h1>
<br>
<div class="row">
<style>
.column {color:#000000;}     
.column:visited {color:#000000;}  
.column:hover {color:#DE0E23;}  
.column:active {color:#000000;} 

.column1 {color:#000000;}     
.column1:visited {color:#000000;}  
.column1:hover {color:#DE0E23;}  
.column1:active {color:#000000;} 

.column2 {color:#000000;}     
.column2:visited {color:#000000;}  
.column2:hover {color:#DE0E23;}  
.column2:active {color:#000000;} 

.column3 {color:#000000;}     
.column3:visited {color:#000000;}  
.column3:hover {color:#DE0E23;}  
.column3:active {color:#000000;} 
</style>
  
  <a href="up_student.php">
<div class="column" style="background-image:url('images/student.jpg'); background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;">
        <div id="linkedinB" >
		<br>
		<br>
		<br>
		<br>
		<br>
		<h1>Update Student's Information</h1>
        </div>
  </div></a>
  
  <a href="up_teacher.php">
<div class="column" style="background-image:url('images/teacher.jpg'); background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;">
        <div id="linkedinB" >
		<br>
		<br>
		<br>
		<br>
		<br>
		<h1>Update Teacher's Information</h1>
        </div>
  </div></a>

  <a href="up_course.php">
<div class="column" style="background-image:url('images/course.jpg'); background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;">
        <div id="linkedinB" >
		<br>
		<br>
		<br>
		<br>
		<br>
		<h1>Update Courses</h1>
        </div>
  </div></a>
  
  <a href="up_department.php">
<div class="column" style="background-image:url('images/department.jpg'); background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;">
        <div id="linkedinB" >
		<br>
		<br>
		<br>
		<br>
		<br>
		<h1>Update Department Information</h1>
        </div>
  </div></a>
  
  <a href="up_offer.php">
<div class="column" style="background-image:url('images/offered-course.jpg'); background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;">
        <div id="linkedinB" >
		<br>
		<br>
		<br>
		<br>
		<br>
		<h1>Update Offered Course</h1>
        </div>
  </div></a>
  
  <a href="up_routine.php">
<div class="column" style="background-image:url('images/routine.jpg'); background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;">
        <div id="linkedinB" >
		<br>
		<br>
		<br>
		<br>
		<br>
		<h1>Update Routine</h1>
        </div>
  </div></a>
  
  <a href="up_incharge.php">
<div class="column1" style="background-image:url('images/incharge.jpg'); background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;">
        <div id="linkedinB" >
		<br>
		<br>
		<br>
		<br>
		<br>
		<h1>Update Incharge Information</h1>
        </div>
  </div></a>
  
  <a href="up_semester.php">
<div class="column2" style="background-image:url('images/semester.jpg'); background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;">
        <div id="linkedinB" >
		<br>
		<br>
		<br>
		<br>
		<br>
		<h1>Set Current Semester</h1>
        </div>
  </div></a>
  
</div>

<br><br><Br><br><br><Br><br><br>
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</body>
</html> 
