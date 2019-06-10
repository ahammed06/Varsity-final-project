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
include "style13.php";
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
//if(isset($_GET['profile'])){
//$profile = $_GET['profile'];
//}
if (isset($_SESSION['user1'])){$profile = $_SESSION['user1'];}

$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

$sql5="UPDATE stu_offer SET seen='1' WHERE student_id = '$profile' AND seen='0' AND (status='accepted' OR status='rejected' OR status='dropped')";
$result5 =$conn-> query($sql5);
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

<h1 align="center"><u><B>REQUESTED COURSE LIST</b></u></h1>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

$sql8="SELECT s_name,year FROM semester";
	$result8 =$conn-> query($sql8);
if($result8-> num_rows > 0){
while ($row8 = $result8-> fetch_assoc()){
$s=$row8["s_name"];
$y=$row8["year"];
}}

$sql7= "select DISTINCT stu_offer.student_id, stu_offer.status,
	   receipt.receipt_no from receipt,stu_offer 
	   where stu_offer.student_id='$profile' AND stu_offer.student_id=receipt.student_id AND stu_offer.s_name='$s' AND stu_offer.s_name=receipt.semester
	   AND stu_offer.year='$y' AND stu_offer.year=receipt.year";
	   $result7 =$conn-> query($sql7);
if($result7->num_rows>0){
	while($row7=$result7->fetch_assoc()){
		$rcpt=$row7['receipt_no'];
}}


?>
<h1 align="center"><u><B>Student ID : <?php echo $profile; ?></b></u></h1>

<p align="center"><u><B><a href="see_stu_routi.php" class="btn btn-danger">See Requested Course Schedule</a></b></u></p>
<br>

<?php

$sql4= "select DISTINCT s_name,year from stu_offer WHERE s_name='$s' AND year='$y' AND student_id='$profile' ORDER BY department ASC,year DESC,s_name DESC,intake DESC,section ASC,student_id ASC";
$result4 =$conn-> query($sql4);
if($result4-> num_rows > 0){
while ($row4 = $result4-> fetch_assoc()){
$semester=$row4["s_name"];
$year=$row4["year"];
?>
<br><br>
<h2 align="center"><u><B><?php echo strtoupper($row4['s_name'])?> <?php echo $row4['year']?></b></u></h2>

<?php
$sql2= "select DISTINCT department from stu_offer WHERE s_name='$semester' AND year='$year' AND student_id='$profile' ORDER BY department ASC,year DESC,s_name DESC,intake DESC,section ASC,student_id ASC";
$result2 =$conn-> query($sql2);
if($result2-> num_rows > 0){
while ($row2 = $result2-> fetch_assoc()){
$department=$row2["department"];
?>

<h3 align="center"><u><B>Department of <?php echo strtoupper($row2['department']); ?></b></u></h3>

<table style="float:center; width:100%; padding-left:440px">
	<tr>
	<th>Course Title</th>
	<th>Course Code</th>
	<th>Intake</th>
	<th>Section</th>
	<th>Course Credit</th>
	<th>Status</th>
	</tr>

<?php

$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

$sql= "select stu_offer.s_name, stu_offer.year,stu_offer.intake,stu_offer.section,stu_offer.department,stu_offer.course_code,stu_offer.student_id, stu_offer.status, stu_offer.id,
	   receipt.receipt_no, course.course_title, course.pre_req, course.credit from receipt,stu_offer,course 
	   where stu_offer.student_id=receipt.student_id AND stu_offer.course_code=course.course_code AND stu_offer.s_name='$semester'
	   AND stu_offer.year='$year' AND stu_offer.department='$department' AND course.department=stu_offer.department
	   AND stu_offer.student_id='$profile' AND receipt.receipt_no='$rcpt' AND receipt.year='$y' AND receipt.semester='$s' AND receipt.year=stu_offer.year AND receipt.semester=stu_offer.s_name
	   ORDER BY status ASC,department ASC,year DESC,s_name DESC,intake DESC,section ASC,student_id ASC";
$result =$conn-> query($sql);
if($result->num_rows>0){

	while($row=$result->fetch_assoc()){
		echo "<tr>
		<td>".$row["course_title"]."</td>
		<td>".$row["course_code"]."</td>
		<td>".$row["intake"]."</td>
		<td>".$row["section"]."</td>
		<td>".$row["credit"]."</td>
		<td>".$row["status"]."</td></tr>";
		
	}
	
echo "</table>";
}
}}
else{
	echo "0 result";
}}}
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