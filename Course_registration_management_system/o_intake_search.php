<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
if (!isset($_SESSION['department'])) {
    header('Location: search_offered_course.php');
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
include "style15.php";
?>
</head>
<body>
<?php
include "admin_header.php";
?>
<div class="bg-img">
<hr>

<h2 align="center"><u><B>*Search Result*</b></u></h2>

<?php
$department = $_SESSION['department'];
$intake = $_SESSION['intake'];
$section = $_SESSION['section'];
	$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
else{
$sql4= "select DISTINCT semester,year from offer WHERE department='$department' AND intake='$intake' AND section='$section' ORDER BY department ASC,year DESC,semester DESC,intake DESC,section ASC";
$result4 =$conn-> query($sql4);
if($result4-> num_rows > 0){
while ($row4 = $result4-> fetch_assoc()){
$semester=$row4["semester"];
$year=$row4["year"];
?>
<br>
<h3 align="center"><u><B>Intake : <?php echo $intake?> Section : <?php echo $section?> Department : <?php echo strtoupper($department)?></b></u></h3>
<br><br>
<h3 align="center"><u><B><?php echo strtoupper($row4['semester'])?> <?php echo $row4['year']?></b></u></h3>
<br>

<p align="center"><u><B><a href="see_routine.php?semester=<?php echo $semester; ?>&year=<?php echo $year; ?>&section=<?php echo $section; ?>&intake=<?php echo $intake; ?>&department=<?php echo $department; ?>" class="btn btn-danger">See Routine</a></b></u></p>
<br>

<table style="float:center; width:100%; padding-left:440px">
<tr>
<th bgcolor=#99ffb9>Course Code</th>
	<th bgcolor=#99ffb9>Course title</th>
	<th bgcolor=#99ffb9>Pre-Requisite</th>
	<th bgcolor=#99ffb9>Credit</th>
</tr>
<?php
$sql= "select offer.semester, offer.year,offer.intake,offer.section,offer.department,offer.course_code, 
	   course.course_title,course.pre_req,course.credit from course,offer 
	   where offer.course_code=course.course_code AND offer.semester='$semester' 
	   AND offer.year='$year' AND offer.department='$department' AND course.department=offer.department AND offer.intake='$intake' AND offer.section='$section'
	   ORDER BY department ASC,year DESC,semester DESC,intake DESC,section ASC";
$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
echo "<tr><td>". $row["course_code"] ."</td><td>".$row["course_title"]."</td>
		<td>".$row["pre_req"]."</td>
		<td>".$row["credit"]."</td></tr>";
}
echo "</table>";
}}}
else{
echo "0 result";}
$conn-> close();
}
?>
</table>
<br><br><Br><br><br><Br><br><br>
</div>
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</body>
</html>