<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
if (!isset($_SESSION['year'])) {
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
$semester = $_SESSION['semester'];
$year = $_SESSION['year'];
	$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
else{

$sql2= "select DISTINCT department from offer WHERE semester='$semester' AND year='$year' ORDER BY department ASC,year DESC,semester DESC,intake DESC,section ASC";
$result2 =$conn-> query($sql2);
if($result2-> num_rows > 0){
while ($row2 = $result2-> fetch_assoc()){
$department=$row2["department"];
?>
<h1 align="center"><u><B><?php echo strtoupper($semester); ?> <?php echo strtoupper($year); ?></b></u></h1>
<br>
<h3 align="center"><u><B>Department of <?php echo strtoupper($row2['department']); ?></b></u></h3>

<?php
$sql5= "select DISTINCT intake from offer WHERE semester='$semester' AND year='$year' AND department='$department' ORDER BY department ASC,year DESC,semester DESC,intake DESC,section ASC";
$result5 =$conn-> query($sql5);
if($result5-> num_rows > 0){
while ($row5 = $result5-> fetch_assoc()){
$intake=$row5["intake"];
?>

<h4 align="center"><u><B>Intake <?php echo $row5['intake']; ?></b></u></h4>

<?php
$sql3= "select DISTINCT section from offer WHERE semester='$semester' AND year='$year' AND department='$department' AND intake='$intake' ORDER BY department ASC,year DESC,semester DESC,intake DESC,section ASC";
$result3 =$conn-> query($sql3);
if($result3-> num_rows > 0){
while ($row3 = $result3-> fetch_assoc()){
$section=$row3["section"];
?>

<p align="center"><u><B>Section <?php echo $row3['section']; ?></b></u></p>
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
}}}}}}}
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