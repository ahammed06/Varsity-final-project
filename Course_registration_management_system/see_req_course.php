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
if (isset($_SESSION['user2'])){$profile = $_SESSION['user2'];}
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
include "teach_header.php";
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

$sql6= "select code_name from teacher WHERE id = '$profile'";
$result6 =$conn-> query($sql6);
if($result6-> num_rows > 0){
while ($row6 = $result6-> fetch_assoc()){
$code_name=$row6["code_name"];

$sql7= "select code_name,semester,year,section,intake,department from incharge WHERE code_name = '$code_name' AND semester='$s' AND year='$y'";
$result7 =$conn-> query($sql7);
if($result7-> num_rows > 0){
while ($row7 = $result7-> fetch_assoc()){
$sem=$row7["semester"];
$yea=$row7["year"];
$sec=$row7["section"];
$int=$row7["intake"];
$dep=$row7["department"];

$stu_id = $_GET['see'];
$receipt_id = $_GET['receipt'];

?>
<h1 align="center"><u><B>Student ID : <?php echo $stu_id; ?></b></u></h1>
<p align="center"><u><B><a href="see_teach_routine.php?id=<?php echo $stu_id; ?>&semester=<?php echo $s; ?>&year=<?php echo $y; ?>" class="btn btn-danger">See Routine</a></b></u></p>
<p align="center"><u><B><a href="confirm_course_updated.php?update=<?php echo $stu_id; ?>&receipt=<?php echo $receipt_id; ?>" class="btn btn-danger">Add New Course</a></b></u></p>

<?php

$sql4= "select DISTINCT s_name,year from stu_offer WHERE s_name='$sem' AND year='$yea' AND s_name='$s' AND year='$y' AND student_id='$stu_id' ORDER BY department ASC,year DESC,s_name DESC,intake DESC,section ASC,student_id ASC";
$result4 =$conn-> query($sql4);
if($result4-> num_rows > 0){
while ($row4 = $result4-> fetch_assoc()){
$semester=$row4["s_name"];
$year=$row4["year"];
?>
<br><br>
<h2 align="center"><u><B><?php echo strtoupper($row4['s_name'])?> <?php echo $row4['year']?></b></u></h2>

<?php
$sql2= "select DISTINCT department from stu_offer WHERE s_name='$semester' AND s_name='$sem' AND year='$year' AND year='$yea' AND department='$dep' AND student_id='$stu_id' ORDER BY department ASC,year DESC,s_name DESC,intake DESC,section ASC,student_id ASC";
$result2 =$conn-> query($sql2);
if($result2-> num_rows > 0){
while ($row2 = $result2-> fetch_assoc()){
$department=$row2["department"];
?>

<h3 align="center"><u><B>Department of <?php echo strtoupper($row2['department']); ?></b></u></h3>

<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}


$sql= "select stu_offer.s_name, stu_offer.year,stu_offer.intake,stu_offer.section,stu_offer.department,stu_offer.course_code,stu_offer.student_id, stu_offer.status, stu_offer.id,
	   receipt.receipt_no, course.course_title, course.pre_req, course.credit from receipt,stu_offer,course 
	   where stu_offer.student_id=receipt.student_id AND stu_offer.course_code=course.course_code AND stu_offer.s_name='$semester' AND stu_offer.s_name='$sem'
	   AND stu_offer.year='$year' AND stu_offer.year='$yea' AND stu_offer.department='$department' AND stu_offer.department='$dep' AND course.department=stu_offer.department 
	   AND stu_offer.student_id='$stu_id' AND receipt.receipt_no='$receipt_id' AND receipt.year='$y' AND receipt.semester='$s' AND receipt.year=stu_offer.year AND receipt.semester=stu_offer.s_name
	   ORDER BY course_code ASC,department ASC,year DESC,s_name DESC,intake DESC,section ASC,student_id ASC, status ASC";
$result =$conn-> query($sql);
if($result->num_rows>0){
?>

<table style="float:center; width:100%; padding-left:440px">
	<tr>
	<th>Course Title</th>
	<th>Course Code</th>
	<th>Course Pre-requisite</th>
	<th>Course Credit</th>
	<th>Intake</th>
	<th>Section</th>
	<th>Receipt No</th>
	<th>Status</th>
	<th>Drop</th>
	</tr>
<?php 
	while($row=$result->fetch_assoc()){
		echo "<tr>
		<td>".$row["course_title"]."</td>
		<td>".$row["course_code"]."</td>
		<td>".$row["pre_req"]."</td>
		<td>".$row["credit"]."</td>
		<td>".$row["intake"]."</td>
		<td>".$row["section"]."</td>
		<td>".$row["receipt_no"]."</td>
		<td>".$row["status"]."</td>";
		if($row["status"]=='accepted'){
		?>
		<td><a href="drop_course.php?delete=<?php echo $row["id"]; ?>&see=<?php echo $stu_id; ?>&receipt=<?php echo $receipt_id; ?>" class="btn btn-danger">Drop</a></td>
		<?php
		}
		else{
			echo "<td> - </td>";
		}
echo "</tr>";
	}
	echo "</table>";
}}}
else{
	echo "0 result";
}}}}}}}
$conn->close();
?> 

<br><br>

<div style="text-align:right">
<a href="drop_all.php?delete=<?php echo $stu_id; ?>&receipt=<?php echo $receipt_id; ?>" class="btn1 btn-danger">Drop All</a>
</div>

<br><br><br><br><br><br><br>
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</div>
</body>
</html>