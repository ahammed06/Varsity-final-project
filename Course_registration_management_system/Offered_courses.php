<?php
session_start();
if (!isset($_SESSION['user1'])) {
    header('Location: student.php');
    exit();
}

if (!isset($_SESSION['semester'])) {
    header('Location: stu_offered_courses.php');
    exit();
}

$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
if (isset($_SESSION['user1'])){
	
	$id = $_SESSION['user1'];
	$sql2= "select student_id,intake,section,department from student WHERE `student_id` = $id";
$result2 = $conn-> query($sql2);	}

$semester = $_SESSION['semester'];
$year = $_SESSION['year'];
$intake = $_SESSION['intake'];
$section = $_SESSION['section'];
$department = $_SESSION['department'];
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">
<?php 
include "style13.php";
?>
</head>
<body>
<?php
include "stu_header.php";
?>
<div class="bg-img">
<hr>

<h2 align="center"><u><B>*Search Result*</b></u></h2>

<p align="center"><u><B><a href="see_stu_routine.php?semester=<?php echo $semester; ?>&year=<?php echo $year; ?>&section=<?php echo $section; ?>&intake=<?php echo $intake; ?>&department=<?php echo $department; ?>" class="btn btn-danger">See Current Routine</a></b></u></p>
<br>

<?php

if(!empty($year)){
	if(!empty($intake)){
		if(!empty($section)){
			if(!empty($department)){
				if(!empty($semester)){
	$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$sql= "select offer.semester, offer.year,offer.intake,offer.section,offer.department,offer.course_code, 
	   course.course_title,course.pre_req,course.credit from course,offer 
	   where offer.course_code=course.course_code AND offer.semester='$semester' AND offer.section=$section 
	   AND offer.year='$year' AND offer.department='$department' AND offer.intake='$intake' AND course.department=offer.department
	   ORDER BY department ASC,year DESC,semester DESC,intake DESC,section ASC";
$result =$conn-> query($sql);
if($result->num_rows>0){
?>
<table style="float:center; width:100%; padding-left:440px">
	<tr>
	<th>Course code</th>
	<th>Course title</th>
	<th>Pre-Requisite</th>
	<th>Credit</th>
	</tr>
<?php 
	while($row=$result->fetch_assoc()){
		echo "<tr>
		<td>".$row["course_code"]."</td>
		<td>".$row["course_title"]."</td>
		<td>".$row["pre_req"]."</td>
		<td>".$row["credit"]."</td>
		</tr>";
	}
	echo "</table>";
}}}}}
else{
	echo "NOT YET OFFERED!!!";
}
}
$conn->close();
?> 

<br><br><br><br><br><br><br><br><br>
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</div>
</body>
</html>
