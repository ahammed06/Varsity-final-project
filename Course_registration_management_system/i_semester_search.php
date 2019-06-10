<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
if (!isset($_SESSION['semester'])) {
    header('Location: search_incharge.php');
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
if(!empty($year)){
if(!empty($semester)){
	$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
else{

$sql2= "select DISTINCT department from incharge WHERE semester='$semester' AND year='$year' ORDER BY department ASC,year DESC,semester DESC,intake DESC,section ASC";
$result2 =$conn-> query($sql2);
if($result2-> num_rows > 0){
while ($row2 = $result2-> fetch_assoc()){
$department=$row2["department"];
?>

<br>
<h3 align="center"><u><B>Department of <?php echo strtoupper($row2['department']); ?></b></u></h3>

<?php
$sql5= "select DISTINCT intake from incharge WHERE semester='$semester' AND year='$year' AND department='$department' ORDER BY department ASC,year DESC,semester DESC,intake DESC,section ASC";
$result5 =$conn-> query($sql5);
if($result5-> num_rows > 0){
while ($row5 = $result5-> fetch_assoc()){
$intake=$row5["intake"];
?>

<h4 align="center"><u><B>Intake <?php echo $row5['intake']; ?></b></u></h4>

<?php
$sql3= "select DISTINCT section from incharge WHERE semester='$semester' AND year='$year' AND department='$department' AND intake='$intake' ORDER BY department ASC,year DESC,semester DESC,intake DESC,section ASC";
$result3 =$conn-> query($sql3);
if($result3-> num_rows > 0){
while ($row3 = $result3-> fetch_assoc()){
$section=$row3["section"];
?>

<p align="center"><u><B>Section <?php echo $row3['section']; ?></b></u></p>
<br>

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
</tr>
<?php
$sql = "select * from incharge WHERE semester='$semester' AND year='$year' AND department='$department' AND intake='$intake' AND section='$section' ORDER BY year DESC,semester ASC,department ASC,intake DESC, section ASC";

$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
echo "<tr><td>". $row["semester"] ."</td><td>". $row["year"] ."</td><td>". $row["intake"] ."</td><td>". $row["section"] ."</td><td>". $row["department"] ."</td><td>". $row["code_name"] ."</td>";
$code_name=$row["code_name"];
$sql1 = "select code_name,t_name,designation,room,mobile,email from teacher WHERE code_name='$code_name'";

$result1 = $conn-> query($sql1);
if($result1-> num_rows > 0){
while ($row1 = $result1-> fetch_assoc()){
echo "<td>". $row1["t_name"] ."</td><td>". $row1["designation"] ."</td><td>". $row1["room"] ."</td><td>". $row1["mobile"] ."</td><td>". $row1["email"] ."</td></tr>";
}}}
echo "</table>";
}}}}}}}
else{
echo "0 result";}
$conn-> close();
}}}
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