<?php
session_start();
if (!isset($_SESSION['user1'])) {
    header('Location: student.php');
    exit();
}
include "style14.php";
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
else{
if (isset($_SESSION['user1'])){$id = $_SESSION['user1'];

	$sql2= "select student_id,intake,section,department from student WHERE `student_id` = $id";
$result2 = $conn-> query($sql2);
$row2 = $result2-> fetch_assoc();
$stu_id=$row2['student_id'];
$intake=$row2['intake'];
$section=$row2['section'];
$department=$row2['department'];	
}}

?>
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

<h2 align="center"><u><B>Course Registration</b></u></h2>

<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

$sql3= "select * FROM semester";
$result3 = $conn-> query($sql3);	
$row3 = $result3-> fetch_assoc();

$s_name=$row3['s_name'];
$year=$row3['year'];

$sql= "select offer.semester, offer.year,offer.intake,offer.section,offer.department,offer.course_code,offer.day1,offer.day2,offer.day3,offer.time1,offer.time2,offer.time3, 
	   course.course_title,course.pre_req,course.credit from course,offer 
	   where offer.course_code=course.course_code AND offer.department='$department' AND course.department=offer.department AND offer.intake='$intake' 
	   AND offer.semester='$s_name' AND offer.year='$year' AND section='$section'
	   ORDER BY department ASC,year DESC,semester DESC,intake DESC,section ASC,course_code ASC";
$result =$conn-> query($sql);
$count=$result->num_rows;
if($result->num_rows>0){
?>
<h2 align="center"><u><B><?php echo strtoupper($row3['s_name']).','?> <?php echo $row3['year']?></b></u></h2>

<p align="center"><u><B><a href="see_stu_routine.php?semester=<?php echo $s_name; ?>&year=<?php echo $year; ?>&section=<?php echo $section; ?>&intake=<?php echo $intake; ?>&department=<?php echo $department; ?>" class="btn btn-danger">See Current Routine</a></b></u></p>
<br>

<form action='cou_reg.php' method="post" <!--id="myform" class="mform"-->
<table style="float:center; width:100%; padding-left:440px">	
	<tr>
	<th>Course code</th>
	<th>Course title</th>
	<th>Pre-Requisite</th>
	<th>Credit</th>
	<th>Schedule 1</th>
	<th>Schedule 2</th>
	<th>Schedule 3</th>
	<th><input type="submit" value="Submit" name="submit" class="button1" ></th>
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
<td><input type="checkbox" name="add[]" value="<?php echo $row["course_code"]; ?> <?php echo $row["day1"]; ?> <?php echo $row["day2"]; ?> <?php echo $row["day3"]; ?> <?php echo $row["time1"]; ?> <?php echo $row["time2"]; ?> <?php echo $row["time3"]; ?>" ></td>

<?php
	"</tr>";
$course_code=$row["course_code"];
$course_title=$row["course_title"];
$pre_req=$row["pre_req"];
$credit=$row["credit"];
	}

	echo "</table>";
}
else{
	echo "0 result";
}

$conn->close();
?> 
<br>
<a href="see_previous.php" class="button">View More</a>
</form>

<br><br><br><br><br><br><br><br><br>
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</div>
</body> 
</html>