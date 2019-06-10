<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
if (!isset($_SESSION['course_code'])) {
    header('Location: up_course.php');
    exit();
}
?>

<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">
<?php 
include "style11.php";
?>
</head>
<body>
<?php
include "admin_header.php";
?>

<h2 align="center"><u><B>Search Result</b></u></h2>
<table style="float:center; width:100%; padding-left:440px">
<tr>
<th bgcolor=#99ffb9>Course Title</th>
<th bgcolor=#99ffb9>Course Code</th>
<th bgcolor=#99ffb9>Pre-requisite Course</th>
<th bgcolor=#99ffb9>Course Credit</th>
<th bgcolor=#99ffb9>Department</th>
<th bgcolor=#99ffb9>Delete</th>
<th bgcolor=#99ffb9>Update</th>

</tr>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$course_code = $_SESSION['course_code'];
$department = $_SESSION['department'];
$sql= "select course_title,course_code,pre_req,department,credit from course WHERE course_code='$course_code' AND department='$department'";
$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
echo "<tr><td>". $row["course_title"] ."</td><td>". $row["course_code"] ."</td><td>". $row["pre_req"] ."</td><td>". $row["credit"] ."</td><td>". $row["department"] ."</td>";
?>
<td><a href="up_cou_dlt.php" class="btn btn-danger">Delete</a></td>
<td><a href="up_cou_upd.php" class="btn btn-danger">Update</a></td>
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