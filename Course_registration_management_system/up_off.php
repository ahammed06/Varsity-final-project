<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
if (!isset($_SESSION['semester'])) {
    header('Location: up_offer.php');
    exit();
}
$semester = $_SESSION['semester'];
$year = $_SESSION['year'];
$intake = $_SESSION['intake'];
$section = $_SESSION['section'];
$department = $_SESSION['department'];
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

<h2 align="center"><u><B>Search Result</b></u></h2>
<p align="center"><u><B><a href="see_routine.php?semester=<?php echo $semester; ?>&year=<?php echo $year; ?>&section=<?php echo $section; ?>&intake=<?php echo $intake; ?>&department=<?php echo $department; ?>" class="btn btn-danger">See Current Routine</a></b></u></p>
<br>
<table style="float:center; width:100%; padding-left:440px">
<tr>
<th bgcolor=#99ffb9>Semester</th>
<th bgcolor=#99ffb9>Year</th>
<th bgcolor=#99ffb9>Intake</th>
<th bgcolor=#99ffb9>Section</th>
<th bgcolor=#99ffb9>Department</th>
<th bgcolor=#99ffb9>Course Code</th>
<th bgcolor=#99ffb9>Delete</th>
<th bgcolor=#99ffb9>Update</th>

</tr>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$sql= "select semester,year,intake,section,department,course_code from offer WHERE semester='$semester' AND year='$year' AND intake='$intake' AND section='$section' AND department='$department'";
$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
echo "<tr><td>". $row["semester"] ."</td><td>". $row["year"] ."</td><td>". $row["intake"] ."</td><td>". $row["section"] ."</td><td>". $row["department"] ."</td><td>". $row["course_code"] ."</td>";
?>
<td><a href="up_off_dlt.php?delete=<?php echo $row["course_code"]; ?>" class="btn btn-danger">Delete</a></td>
<td><a href="up_off_upd.php?update=<?php echo $row["course_code"]; ?>" class="btn btn-danger">Update</a></td>
</tr>
<?php
}
echo "</table>";
}
else{
echo "0 result";}
$conn-> close();
?>
</table>
<br><br><br><br><br><br><br><br><br>
</div>
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</body>
</html>