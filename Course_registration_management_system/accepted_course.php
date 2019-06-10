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

$sql3= "select DISTINCT student.section,student.intake,student.department,stu_offer.s_name,stu_offer.year,stu_offer.status from stu_offer,student WHERE stu_offer.student_id=student.student_id AND stu_offer.s_name='$sem' AND stu_offer.year='$yea' AND student.department='$dep' AND student.intake='$int' AND student.section='$sec' AND stu_offer.status='accepted'";
$result3 =$conn-> query($sql3);
if($result3-> num_rows > 0){
while ($row3 = $result3-> fetch_assoc()){
$section=$row3["section"];
?>

<br><br>
<h2 align="center"><u><B><?php echo strtoupper($row3['s_name'])?> <?php echo $row3['year']?></b></u></h2>

<h3 align="center"><u><B>Department of <?php echo strtoupper($row3['department']); ?></b></u></h3>

<h4 align="center" style="font-size:18px;"><u><B>Intake <?php echo $row3['intake']; ?></b></u></h4>

<p align="center" style="font-size:18px;"><u><B>Section <?php echo $row3['section']; ?></b></u></p>
<br>


<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

$sql= "select DISTINCT stu_offer.student_id, stu_offer.status,
	   receipt.receipt_no from receipt,stu_offer,student 
	   where stu_offer.student_id=receipt.student_id AND stu_offer.student_id=student.student_id AND stu_offer.s_name='$sem' AND student.section='$sec'
	   AND stu_offer.year='$yea' AND stu_offer.department='$dep' AND student.intake='$int' AND stu_offer.status='accepted' AND receipt.semester=stu_offer.s_name AND receipt.year=stu_offer.year";
$result =$conn-> query($sql);
if($result->num_rows>0){
	
?>
<table style="float:center; width:100%; padding-left:440px">
	<tr>
	<th>Student Id</th>
	<th>Receipt No</th>
	<th>Check</th>
	</tr>
<?php 
	while($row=$result->fetch_assoc()){
		
		echo "<tr>
		<td>".$row["student_id"]."</td> <!This is HTML tale data>
		<td>".$row["receipt_no"]."</td>";
		?>
		<td><a href="see_all_req_course.php?see=<?php echo $row["student_id"]; ?>&receipt=<?php echo $row["receipt_no"]; ?>" class="btn btn-danger">Check</a></td>
		</tr>
		<?php
	}
	echo "</table>";
}}}
else{
	echo "0 result";
}}}}}
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