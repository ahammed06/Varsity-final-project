<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">
<?php 
include "style2.php";
?>
</head>
<body>
<div class="header" id="myHeader">
  <img src="images/BUBT-LOGO-1_01.png" width="300" height="120">
  <ul><b>
  <li><a href="s_profile.php">Home</a></li>
  <li><a href="notice.php">Notice Board</a></li>
  <li><a href="phone.php">Phone Book</a></li>
  <li1><a href="logout1.php">Logout</a></li1></b>
</ul>
<div class="dropdown">
   </div>
</div>
<hr>

<h2 align="center"><u><B>Offered Course List</b></u></h2>
<table style="float:center; width:100%; padding-left:440px">
<tr>
<th bgcolor=#99ffb9>1.Course Code</th>
<th bgcolor=#99ffb9>2.Course Code</th>
<th bgcolor=#99ffb9>3.Course Code</th>
<th bgcolor=#99ffb9>4.Course Code</th>
<th bgcolor=#99ffb9>5.Course Code</th>
<th bgcolor=#99ffb9>6.Course Code</th>
</tr>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$semester = $_POST['semester'];
$year = $_POST['year'];
$intake= $_POST['intake'];
$section = $_POST['section'];
$department = $_POST['department'];

$sql= "select course_code1,course_code2,course_code3,course_code4,course_code5,course_code6 from offer 
       WHERE `semester` = $semester AND `year` = $year AND `intake` = $intake AND `section` = $section AND `department` = $department";
$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
?>

<td><a href="stu_add_course.php?add=<?php echo $row["student_id"]; ?>" class="btn btn-danger">Add</a></td>
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
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</body>
</html>