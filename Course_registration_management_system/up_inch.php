<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
if (!isset($_SESSION['semester'])) {
    header('Location: up_incharge.php');
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
include "style15.php";
?>
</head>
<body>
<?php
include "admin_header.php";
?>
<div class="bg-img">
<hr>

<h2 align="center"><u><B>Incharge List</b></u></h2>
<table style="float:center; width:100%; padding-left:440px">
<tr>
<th bgcolor=#99ffb9>Semester</th>
<th bgcolor=#99ffb9>Year</th>
<th bgcolor=#99ffb9>Intake</th>
<th bgcolor=#99ffb9>Section</th>
<th bgcolor=#99ffb9>Department</th>
<th bgcolor=#99ffb9>Code Name</th>
<th bgcolor=#99ffb9>Incharge Name</th>
<th bgcolor=#99ffb9>Incharge Designation</th>
<th bgcolor=#99ffb9>Incharge Room No.</th>
<th bgcolor=#99ffb9>Incharge Mobile No.</th>
<th bgcolor=#99ffb9>Incharge Email</th>
<th bgcolor=#99ffb9>Delete</th>
<th bgcolor=#99ffb9>Update</th>

</tr>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$semester = $_SESSION['semester'];
$year = $_SESSION['year'];
$intake = $_SESSION['intake'];
$section = $_SESSION['section'];
$department = $_SESSION['department'];
$sql= "select semester,year,code_name,intake,section,department,id from incharge WHERE semester='$semester' AND year='$year' AND intake='$intake' AND section='$section' AND department='$department' ORDER BY year DESC,semester ASC,department ASC,intake DESC, section ASC";
$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
echo "<tr><td>". $row["semester"] ."</td><td>". $row["year"] ."</td><td>". $row["intake"] ."</td><td>". $row["section"] ."</td><td>". $row["department"] ."</td><td>". $row["code_name"] ."</td>";
$code_name=$row["code_name"];
$sql1 = "select code_name,t_name,designation,room,mobile,email from teacher WHERE code_name='$code_name'";

$result1 = $conn-> query($sql1);
if($result1-> num_rows > 0){
while ($row1 = $result1-> fetch_assoc()){
echo "<td>". $row1["t_name"] ."</td><td>". $row1["designation"] ."</td><td>". $row1["room"] ."</td><td>". $row1["mobile"] ."</td><td>". $row1["email"] ."</td>";

?>
<td><a href="up_incharge_dlt.php" class="btn btn-danger">Delete</a></td>
<td><a href="up_incharge_upd.php" class="btn btn-danger">Update</a></td>
</tr>
<?php
}}}
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