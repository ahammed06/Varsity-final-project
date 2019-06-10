<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
if (!isset($_SESSION['course_code'])) {
    header('Location: search_course.php');
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
include "style2.php";
?>
</head>
<body>
<?php
include "admin_header.php";
?>
<div class="bg-img">
<hr>

<h2 align="center"><u><B>*Search Result*</b></u></h2>
<table style="float:center; width:100%; padding-left:440px">
<tr>
<th bgcolor=#99ffb9>Course Title</th>
<th bgcolor=#99ffb9>Course Code</th>
<th bgcolor=#99ffb9>Pre-requisite Course</th>
<th bgcolor=#99ffb9>Course Credit</th>
<th bgcolor=#99ffb9>Department</th>
</tr>
<?php
$course_code=$_SESSION['course_code'];
if(!empty($course_code)){
	$conn= mysqli_connect("localhost", "root", "", "course_list");
if(mysqli_connect_error()){
							die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
						}
						else{
							$sql = "select course_title,course_code,pre_req,credit,department from course where course_code='$course_code'";

$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
echo "<tr><td>". $row["course_title"] ."</td><td>". $row["course_code"] ."</td><td>". $row["pre_req"] ."</td><td>". $row["credit"] ."</td><td>". $row["department"] ."</td></tr>";
}
echo "</table>";
}
else{
echo "0 result";}
$conn-> close();
}}
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