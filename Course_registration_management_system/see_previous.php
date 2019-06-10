<?php
session_start();
if (!isset($_SESSION['user1'])) {
    header('Location: student.php');
    exit();
}
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
if (isset($_SESSION['user1'])){$id = $_SESSION['user1'];
	$sql2= "select student_id,intake,section,department from student WHERE `student_id` = $id";
$result2 = $conn-> query($sql2);
$row2 = $result2-> fetch_assoc();
$stu_id=$row2['student_id'];
$int=$row2["intake"];
$section=$row2['section'];
$department=$row2['department'];	
}
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">
<?php 
include "style15.php";
?>
</head>
<body>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">

</head>
<body>
<?php
include "stu_header.php";
?>
<div class="bg-img">
<hr>

<h1 align="center"><u><B>Course Registration</b></u></h1>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

$sql4= "select DISTINCT s_name,year from semester";
$result4 =$conn-> query($sql4);
if($result4-> num_rows > 0){
while ($row4 = $result4-> fetch_assoc()){
$semester=$row4["s_name"];
$year=$row4["year"];
?>
<h2 align="center"><u><B><?php echo strtoupper($row4['s_name'])?> <?php echo $row4['year']?></b></u></h2>

<?php
$sql2= "select DISTINCT department from offer WHERE semester='$semester' AND year='$year' ORDER BY department ASC,year DESC,semester DESC,intake DESC,section ASC";
$result2 =$conn-> query($sql2);
if($result2-> num_rows > 0){
while ($row2 = $result2-> fetch_assoc()){
$department=$row2["department"];
?>

<?php
$sql5= "select DISTINCT intake from offer WHERE intake>='$int' AND semester='$semester' AND year='$year' AND department='$department' ORDER BY department ASC,year DESC,semester DESC,intake ASC,section ASC";
$result5 =$conn-> query($sql5);
if($result5-> num_rows > 0){
while ($row5 = $result5-> fetch_assoc()){
$intake=$row5["intake"];
?>

<h4 align="center" style="font-size:18px;"><u><B>Intake <?php echo $row5['intake']; ?></b></u></h4>

<?php
$sql3= "select DISTINCT section from offer WHERE intake>='$intake' AND semester='$semester' AND year='$year' AND department='$department' AND intake='$intake' ORDER BY department ASC,year DESC,semester DESC,intake DESC,section ASC";
$result3 =$conn-> query($sql3);
if($result3-> num_rows > 0){
while ($row3 = $result3-> fetch_assoc()){
$section=$row3["section"];
?>
<h4 align="center" style="font-size:18px;"><u><B>Section <?php echo $row3['section']; ?></b></u></h4>

<p align="center"><u><B><a href="see_stu_routine.php?semester=<?php echo $semester; ?>&year=<?php echo $year; ?>&section=<?php echo $section; ?>&intake=<?php echo $intake; ?>&department=<?php echo $department; ?>" class="btn btn-danger">See Current Routine</a></b></u></p>
<br>

<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$sql= "select offer.semester, offer.year,offer.intake,offer.section,offer.department,offer.course_code,offer.day1,offer.day2,offer.day3,offer.time1,offer.time2,offer.time3, 
	   course.course_title,course.pre_req,course.credit from course,offer 
	   where offer.course_code=course.course_code AND offer.department='$department' AND course.department=offer.department AND offer.intake='$intake' 
	   AND offer.semester='$semester' AND offer.year='$year' AND offer.section='$section'
	   ORDER BY department ASC,year DESC,semester DESC,intake DESC,section ASC,course_code ASC";
$result =$conn-> query($sql);
if($result->num_rows>0){
?>
<form action='new.php' method="post">
<table style="float:center; width:100%; padding-left:440px">
	<tr>
	<th>Course code</th>
	<th>Course title</th>
	<th>Pre-Requisite</th>
	<th>Credit</th>
	<th>Schedule 1</th>
	<th>Schedule 2</th>
	<th>Schedule 3</th>
	<th>ADD</th>
	</tr>
	
<?php 
	while($row=$result->fetch_assoc()){
		echo "<tr>
		<td>".$row["course_code"]."</td>
		<td>".$row["course_title"]."</td>
		<td>".$row["pre_req"]."</td>
		<td>".$row["credit"]."</td>
		<td>".$row["day1"]." ".$row["time1"]."</td>
		<td>".$row["day2"]." ".$row["time2"]."</td>
		<td>".$row["day3"]." ".$row["time3"]."</td>";
?>
<td><input type="checkbox" name="add[]" value="<?php echo $row["course_code"]; ?> <?php echo $row["day1"]; ?> <?php echo $row["day2"]; ?> <?php echo $row["day3"]; ?> <?php echo $row["time1"]; ?> <?php echo $row["time2"]; ?> <?php echo $row["time3"]; ?> <?php echo $row["intake"]; ?> <?php echo $row["section"]; ?>" ></td>
<?php
"</tr>";	}
	echo "</table>";

}}}}}}}

else{
	echo "0 result";
}}}
?>
<br>
<input type="submit" value="Submit" name="submit" class="button">

</form>
<br>
<!--<div class="bottom">
<marquee direction="left">*** You can Submit only one time ***</marquee>
</div>-->
<br><br><br><br><br><br><br><br><br>
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</div>

</body>
</html>