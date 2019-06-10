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

<h1 align="center"><u><B>ACCEPTED COURSE LIST</b></u></h1>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

$sql6= "select code_name from teacher WHERE id = '$profile'";
$result6 =$conn-> query($sql6);
if($result6-> num_rows > 0){
while ($row6 = $result6-> fetch_assoc()){
$code_name=$row6["code_name"];

$sql7= "select code_name,semester,year,section,intake,department from incharge WHERE code_name = '$code_name'";
$result7 =$conn-> query($sql7);
if($result7-> num_rows > 0){
while ($row7 = $result7-> fetch_assoc()){
$sem=$row7["semester"];
$yea=$row7["year"];
$sec=$row7["section"];
$int=$row7["intake"];
$dep=$row7["department"];

$s = $_SESSION['semester'];
$y = $_SESSION['year'];

$sql4= "select DISTINCT s_name,year from stu_offer WHERE s_name='$sem' AND year='$yea' AND s_name='$s' AND year='$y' ORDER BY department ASC,year DESC,s_name DESC,intake DESC,section ASC,student_id ASC";
$result4 =$conn-> query($sql4);
if($result4-> num_rows > 0){
while ($row4 = $result4-> fetch_assoc()){
$semester=$row4["s_name"];
$year=$row4["year"];
?>

<?php
$receipt_id = $_GET['receipt'];
$stu_id = $_GET['accept'];
$sql8= "select DISTINCT student_id from stu_offer WHERE s_name='$semester' AND s_name='$sem' AND year='$year' AND year='$yea' AND department='$dep' AND year='$yea' AND s_name='$s' AND year='$y' AND student_id='$stu_id' AND status='accepted' ORDER BY department ASC,year DESC,s_name DESC,intake DESC,section ASC,student_id ASC";
$result8 =$conn-> query($sql8);
if($result8-> num_rows > 0){
while ($row8 = $result8-> fetch_assoc()){
$student_id=$row8["student_id"];
?>

<p align="center"><B>Student ID <?php echo $row8['student_id']; ?></b></p>
<p align="center"><u><B><a href="see_teach_routine.php?id=<?php echo $stu_id; ?>&semester=<?php echo $s; ?>&year=<?php echo $y; ?>" class="btn btn-danger">See Routine</a></b></u></p>

<br><br>
<h2 align="center"><u><B><?php echo strtoupper($row4['s_name'])?> <?php echo $row4['year']?></b></u></h2>

<?php
$sql2= "select DISTINCT department from stu_offer WHERE student_id='$stu_id' AND status='accepted' AND s_name='$semester' AND s_name='$sem' AND year='$year' AND year='$yea' AND department='$dep' AND year='$yea' AND s_name='$s' AND year='$y' ORDER BY department ASC,year DESC,s_name DESC,intake DESC,section ASC,student_id ASC";
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


$sql= "select stu_offer.id, stu_offer.s_name, stu_offer.year,stu_offer.intake,stu_offer.section,stu_offer.department,stu_offer.course_code,stu_offer.student_id, stu_offer.status,
	   stu_offer.day1, stu_offer.day2,stu_offer.day3,stu_offer.time1,stu_offer.time2,stu_offer.time3,receipt.receipt_no, course.course_title, course.pre_req, course.credit from receipt,stu_offer,course 
	   where stu_offer.student_id=receipt.student_id AND stu_offer.course_code=course.course_code AND stu_offer.s_name='$semester' AND stu_offer.s_name='$sem'
	   AND stu_offer.year='$year' AND stu_offer.year='$yea' AND stu_offer.department='$department' AND stu_offer.department='$dep' AND stu_offer.status='accepted'
	   AND stu_offer.student_id='$stu_id' AND receipt.receipt_no='$receipt_id' AND receipt.year='$y' AND receipt.semester='$s' AND receipt.year=stu_offer.year AND receipt.semester=stu_offer.s_name";
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
	<th>Schedule 1</th>
	<th>Schedule 2</th>
	<th>Schedule 3</th>
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
		<td>".$row["day1"]." ".$row["time1"]."</td>
		<td>".$row["day2"]." ".$row["time2"]."</td>
		<td>".$row["day3"]." ".$row["time3"]."</td>";
		?>
		<td><a href="drop_course_acc_search.php?delete=<?php echo $row["id"]; ?>&see=<?php echo $stu_id; ?>&receipt=<?php echo $receipt_id; ?>" class="btn btn-danger">Drop</a></td>
		<?php
echo "</tr>";
	}
	echo "</table>";
	echo "<br><br>";
?>

<div style="text-align:right">
<a href="drop_all_course_search.php?delete=<?php echo $stu_id; ?>&receipt=<?php echo $receipt_id; ?>" class="btn1 btn-danger">Drop All</a>
</div>

<?php
}}}}}
else{
	echo "0 result";
}}}}}}}
$conn->close();
?> 



<br><br><br><br><br><br><br>
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</div>
</body>
</html>