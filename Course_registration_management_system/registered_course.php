<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
//else{
//echo 'You have successfully logged as '.$_SESSION['user'];
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
if (isset($_SESSION['user'])){$profile = $_SESSION['user'];}
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
include "admin_header.php";
?>
<div class="bg-img">
<hr>

<h1 align="center"><u><B>ACCEPTED COURSE LIST</b></u></h1>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$stu_id = $_GET['accept'];

$sql8="SELECT s_name,year FROM semester";
	$result8 =$conn-> query($sql8);
if($result8-> num_rows > 0){
while ($row8 = $result8-> fetch_assoc()){
$sem=$row8["s_name"];
$yea=$row8["year"];
}}

$sql4= "select DISTINCT s_name,year from stu_offer WHERE s_name='$sem' AND year='$yea' AND student_id='$stu_id' AND status='accepted' ORDER BY department ASC,year DESC,s_name DESC,intake DESC,section ASC,student_id ASC";
$result4 =$conn-> query($sql4);
if($result4-> num_rows > 0){
while ($row4 = $result4-> fetch_assoc()){
$semester=$row4["s_name"];
$year=$row4["year"];
?>
<p align="center"><u><B>Student ID <?php echo $stu_id; ?></b></u></p>
<br>
<h2 align="center"><u><B><?php echo strtoupper($row4['s_name'])?> <?php echo $row4['year']?></b></u></h2>

<?php
$sql2= "select DISTINCT department from stu_offer WHERE s_name='$sem' AND year='$yea' AND s_name='$semester' AND year='$year' AND student_id='$stu_id' ORDER BY department ASC,year DESC,s_name DESC,intake DESC,section ASC,student_id ASC";
$result2 =$conn-> query($sql2);
if($result2-> num_rows > 0){
while ($row2 = $result2-> fetch_assoc()){
$department=$row2["department"];
?>

<h3 align="center"><u><B>Department of <?php echo strtoupper($row2['department']); ?></b></u></h3>

<?php
$sql5= "select DISTINCT intake from stu_offer WHERE s_name='$sem' AND year='$yea' AND s_name='$semester' AND year='$year' AND department='$department' AND student_id='$stu_id' ORDER BY department ASC,year DESC,s_name DESC,intake DESC,section ASC,student_id ASC";
$result5 =$conn-> query($sql5);
if($result5-> num_rows > 0){
while ($row5 = $result5-> fetch_assoc()){
$intake=$row5["intake"];
?>

<h4 align="center"><u><B>Intake <?php echo $row5['intake']; ?></b></u></h4>

<?php
$sql3= "select DISTINCT section from stu_offer WHERE s_name='$sem' AND year='$yea' AND s_name='$semester' AND year='$year' AND department='$department' AND intake='$intake' AND student_id='$stu_id' ORDER BY department ASC,year DESC,s_name DESC,intake DESC,section ASC,student_id ASC";
$result3 =$conn-> query($sql3);
if($result3-> num_rows > 0){
while ($row3 = $result3-> fetch_assoc()){
$section=$row3["section"];
?>

<p align="center"><u><B>Section <?php echo $row3['section']; ?></b></u></p>

<br>

<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

$receipt_id = $_GET['receipt'];

$sql= "select stu_offer.s_name, stu_offer.year,stu_offer.intake,stu_offer.section,stu_offer.department,stu_offer.course_code,stu_offer.student_id, stu_offer.status,
	   receipt.receipt_no, course.course_title, course.pre_req, course.credit from receipt,stu_offer,course 
	   where stu_offer.student_id=receipt.student_id AND stu_offer.course_code=course.course_code AND stu_offer.s_name='$semester' AND stu_offer.section='$section'
	   AND stu_offer.s_name='$sem' AND stu_offer.year='$yea' AND stu_offer.year='$year' AND stu_offer.department='$department' AND course.department=stu_offer.department AND stu_offer.intake='$intake' AND stu_offer.status='accepted'
	   AND stu_offer.student_id='$stu_id' AND receipt.receipt_no='$receipt_id'
	   ORDER BY department ASC,year DESC,s_name DESC,intake DESC,section ASC,student_id ASC";
$result =$conn-> query($sql);
if($result->num_rows>0){
?>
<table style="float:center; width:100%; padding-left:440px">
	<tr>
	<th>Course Title</th>
	<th>Course Code</th>
	<th>Course Pre-requisite</th>
	<th>Course Credit</th>
	<th>Receipt No</th>
	</tr>
<?php 
	while($row=$result->fetch_assoc()){
		echo "<tr>
		<td>".$row["course_title"]."</td>
		<td>".$row["course_code"]."</td>
		<td>".$row["pre_req"]."</td>
		<td>".$row["credit"]."</td>
		<td>".$row["receipt_no"]."</td>";
	}
	echo "</table>";
}}}}}}}
else{
	echo "0 result";
}}}
else{
	echo "0 result";
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