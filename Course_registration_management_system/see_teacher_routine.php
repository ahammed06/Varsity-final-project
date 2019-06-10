<?php 
session_start();
if (!isset($_SESSION['user2'])) {
    header('Location: teacher.php');
    exit();
}

$semester = $_GET['semester'];
$year = $_GET['year'];
$section = $_GET['section'];
$intake = $_GET['intake'];
$department = $_GET['department'];

$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
?>

<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">
<?php 
include "style20.php";
?>
</head>

<body>
<?php
include "teach_header.php";
?>
<div class="bg-img">
<hr>

<br>
<h1 align="center"><u><B>Routine</b></u></h1>
<br>
<br>
<br>

<table style="float:center; width:100%; padding-left:440px">
	<tr>
	<th>DAY\TIME</th>
	<th>08:30-09:30</th>
	<th>09:35-10:35</th>
	<th>10:40-11:40</th>
	<th>11:45-12:45</th>
	<th>01:15-02:15</th>
	<th>02:20-03:20</th>
	<th>03:25-04:25</th>
	<th>04:30-05:30</th>
	</tr>

<tr>
	<th>Saturday</th>
	<?php
	$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Saturday' AND time1='08:30-09:30') OR (day2='Saturday' AND time2='08:30-09:30') OR (day3='Saturday' AND time3='08:30-09:30'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Saturday' AND time1='09:35-10:35') OR (day2='Saturday' AND time2='09:35-10:35') OR (day3='Saturday' AND time3='09:35-10:35'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Saturday' AND time1='10:40-11:40') OR (day2='Saturday' AND time2='10:40-11:40') OR (day3='Saturday' AND time3='10:40-11:40'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Saturday' AND time1='11:45-12:45') OR (day2='Saturday' AND time2='11:45-12:45') OR (day3='Saturday' AND time3='11:45-12:45'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Saturday' AND time1='13:15-14:15') OR (day2='Saturday' AND time2='13:15-14:15') OR (day3='Saturday' AND time3='13:15-14:15'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Saturday' AND time1='14:20-15:20') OR (day2='Saturday' AND time2='14:20-15:20') OR (day3='Saturday' AND time3='14:20-15:20'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Saturday' AND time1='15:25-16:25') OR (day2='Saturday' AND time2='15:25-16:25') OR (day3='Saturday' AND time3='15:25-16:25'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Saturday' AND time1='16:30-17:30') OR (day2='Saturday' AND time2='16:30-17:30') OR (day3='Saturday' AND time3='16:30-17:30'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}
?>
</tr>

<tr>
	<th>Sunday</th>
	<?php
	$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Sunday' AND time1='08:30-09:30') OR (day2='Sunday' AND time2='08:30-09:30') OR (day3='Sunday' AND time3='08:30-09:30'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Sunday' AND time1='09:35-10:35') OR (day2='Sunday' AND time2='09:35-10:35') OR (day3='Sunday' AND time3='09:35-10:35'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Sunday' AND time1='10:40-11:40') OR (day2='Sunday' AND time2='10:40-11:40') OR (day3='Sunday' AND time3='10:40-11:40'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Sunday' AND time1='11:45-12:45') OR (day2='Sunday' AND time2='11:45-12:45') OR (day3='Sunday' AND time3='11:45-12:45'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Sunday' AND time1='13:15-14:15') OR (day2='Sunday' AND time2='13:15-14:15') OR (day3='Sunday' AND time3='13:15-14:15'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Sunday' AND time1='14:20-15:20') OR (day2='Sunday' AND time2='14:20-15:20') OR (day3='Sunday' AND time3='14:20-15:20'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Sunday' AND time1='15:25-16:25') OR (day2='Sunday' AND time2='15:25-16:25') OR (day3='Sunday' AND time3='15:25-16:25'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Sunday' AND time1='16:30-17:30') OR (day2='Sunday' AND time2='16:30-17:30') OR (day3='Sunday' AND time3='16:30-17:30'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}
?>
</tr>

<tr>
	<th>Monday</th>
	<?php
	$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Monday' AND time1='08:30-09:30') OR (day2='Monday' AND time2='08:30-09:30') OR (day3='Monday' AND time3='08:30-09:30'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Monday' AND time1='09:35-10:35') OR (day2='Monday' AND time2='09:35-10:35') OR (day3='Monday' AND time3='09:35-10:35'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Monday' AND time1='10:40-11:40') OR (day2='Monday' AND time2='10:40-11:40') OR (day3='Monday' AND time3='10:40-11:40'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Monday' AND time1='11:45-12:45') OR (day2='Monday' AND time2='11:45-12:45') OR (day3='Monday' AND time3='11:45-12:45'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Monday' AND time1='13:15-14:15') OR (day2='Monday' AND time2='13:15-14:15') OR (day3='Monday' AND time3='13:15-14:15'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Monday' AND time1='14:20-15:20') OR (day2='Monday' AND time2='14:20-15:20') OR (day3='Monday' AND time3='14:20-15:20'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Monday' AND time1='15:25-16:25') OR (day2='Monday' AND time2='15:25-16:25') OR (day3='Monday' AND time3='15:25-16:25'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Monday' AND time1='16:30-17:30') OR (day2='Monday' AND time2='16:30-17:30') OR (day3='Monday' AND time3='16:30-17:30'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}
?>
</tr>

<tr>
	<th>Tuesday</th>
	<?php
	$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Tuesday' AND time1='08:30-09:30') OR (day2='Tuesday' AND time2='08:30-09:30') OR (day3='Tuesday' AND time3='08:30-09:30'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Tuesday' AND time1='09:35-10:35') OR (day2='Tuesday' AND time2='09:35-10:35') OR (day3='Tuesday' AND time3='09:35-10:35'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Tuesday' AND time1='10:40-11:40') OR (day2='Tuesday' AND time2='10:40-11:40') OR (day3='Tuesday' AND time3='10:40-11:40'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Tuesday' AND time1='11:45-12:45') OR (day2='Tuesday' AND time2='11:45-12:45') OR (day3='Tuesday' AND time3='11:45-12:45'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Tuesday' AND time1='13:15-14:15') OR (day2='Tuesday' AND time2='13:15-14:15') OR (day3='Tuesday' AND time3='13:15-14:15'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Tuesday' AND time1='14:20-15:20') OR (day2='Tuesday' AND time2='14:20-15:20') OR (day3='Tuesday' AND time3='14:20-15:20'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Tuesday' AND time1='15:25-16:25') OR (day2='Tuesday' AND time2='15:25-16:25') OR (day3='Tuesday' AND time3='15:25-16:25'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Tuesday' AND time1='16:30-17:30') OR (day2='Tuesday' AND time2='16:30-17:30') OR (day3='Tuesday' AND time3='16:30-17:30'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}
?>
</tr>

<tr>
	<th>Wednesday</th>
	<?php
	$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Wednesday' AND time1='08:30-09:30') OR (day2='Wednesday' AND time2='08:30-09:30') OR (day3='Wednesday' AND time3='08:30-09:30'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Wednesday' AND time1='09:35-10:35') OR (day2='Wednesday' AND time2='09:35-10:35') OR (day3='Wednesday' AND time3='09:35-10:35'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Wednesday' AND time1='10:40-11:40') OR (day2='Wednesday' AND time2='10:40-11:40') OR (day3='Wednesday' AND time3='10:40-11:40'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Wednesday' AND time1='11:45-12:45') OR (day2='Wednesday' AND time2='11:45-12:45') OR (day3='Wednesday' AND time3='11:45-12:45'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Wednesday' AND time1='13:15-14:15') OR (day2='Wednesday' AND time2='13:15-14:15') OR (day3='Wednesday' AND time3='13:15-14:15'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Wednesday' AND time1='14:20-15:20') OR (day2='Wednesday' AND time2='14:20-15:20') OR (day3='Wednesday' AND time3='14:20-15:20'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Wednesday' AND time1='15:25-16:25') OR (day2='Wednesday' AND time2='15:25-16:25') OR (day3='Wednesday' AND time3='15:25-16:25'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Wednesday' AND time1='16:30-17:30') OR (day2='Wednesday' AND time2='16:30-17:30') OR (day3='Wednesday' AND time3='16:30-17:30'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}
?>
</tr>

<tr>
	<th>Thursday</th>
	<?php
	$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Thursday' AND time1='08:30-09:30') OR (day2='Thursday' AND time2='08:30-09:30') OR (day3='Thursday' AND time3='08:30-09:30'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Thursday' AND time1='09:35-10:35') OR (day2='Thursday' AND time2='09:35-10:35') OR (day3='Thursday' AND time3='09:35-10:35'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Thursday' AND time1='10:40-11:40') OR (day2='Thursday' AND time2='10:40-11:40') OR (day3='Thursday' AND time3='10:40-11:40'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Thursday' AND time1='11:45-12:45') OR (day2='Thursday' AND time2='11:45-12:45') OR (day3='Thursday' AND time3='11:45-12:45'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Thursday' AND time1='13:15-14:15') OR (day2='Thursday' AND time2='13:15-14:15') OR (day3='Thursday' AND time3='13:15-14:15'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Thursday' AND time1='14:20-15:20') OR (day2='Thursday' AND time2='14:20-15:20') OR (day3='Thursday' AND time3='14:20-15:20'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Thursday' AND time1='15:25-16:25') OR (day2='Thursday' AND time2='15:25-16:25') OR (day3='Thursday' AND time3='15:25-16:25'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}

$sql2= "select semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3 from offer 
	   where semester='$semester' AND section='$section' AND year='$year' AND department='$department' AND intake='$intake' AND ((day1='Thursday' AND time1='16:30-17:30') OR (day2='Thursday' AND time2='16:30-17:30') OR (day3='Thursday' AND time3='16:30-17:30'))";
$result2 =$conn-> query($sql2);
if($result2->num_rows>0){
	while($row2=$result2->fetch_assoc()){
		echo "<td>".$row2["course_code"]."</td>";
}}
else{
	echo "<td> </td>";
}
?>
</tr>
	
</table>

<br><br><br><br><br><br><br><br><br>
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</div>
</body>
</html>