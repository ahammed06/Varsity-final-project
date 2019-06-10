<?php
session_start();
if (!isset($_SESSION['user1'])) {
    header('Location: student.php');
    exit();
}
include "style15.php";

$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
else{
if (isset($_SESSION['user1'])){$id = $_SESSION['user1'];
	$sql7= "select * from student WHERE `student_id` = $id";
$result7 = $conn-> query($sql7);	
while($row7=$result7->fetch_assoc()){
$dept=$row7['department'];
}
}}

?>
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

<h1 align="center"><u><B>COURSE LIST</b></u></h1>

<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
?>
<table style="float:center; width:100%; padding-left:440px;">
<tr>
<th bgcolor=#99ffb9>Course Code</th>
<th bgcolor=#99ffb9>Course Title</th>
<th bgcolor=#99ffb9>Course Credit</th>
<th bgcolor=#99ffb9>Pre-requisite Course</th>
</tr>
<?php

$sql= "select *from course WHERE department='$dept' ORDER BY department ASC,course_code ASC";
$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
echo "<tr>
<td>". $row["course_code"] ."</td>
<td>". $row["course_title"] ."</td>
<td>". $row["credit"] ."</td>
<td>". $row["pre_req"] ."</td>
</tr>";
}
echo "</table>";
?>
<br><br><br><br>
<?php
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