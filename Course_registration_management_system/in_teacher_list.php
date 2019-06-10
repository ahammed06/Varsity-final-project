<?php
session_start();
include "style11.php";

$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
else{
if(isset($_GET['profile'])){
	
	$id = $_GET['profile'];
	$sql= "select id,t_name,code_name,gender,email,mobile,room,designation,department,image from teacher 
	WHERE id = '$id'";
	
$result = $conn-> query($sql);
$row = $result1-> fetch_assoc()	;

echo $id;
}
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
<div class="header" id="myHeader">
  <img src="images/BUBT-LOGO-1_01.png" width="300" height="120">
  <ul><b>
  <li><a href="t_my_profile.php?profile=<?php echo $id;?>">My Profile</a></li>
  <li><a href="confirm_course.php?profile=<?php echo $id; ?>">Course Registration</a></li>
  <li><a href="in_teacher_list.php">Teacher List</a><li>
  <li><a href="#">Change Password</a></li>
  <li1><a href="logout2.php">Logout</a></li1></b>
</ul>
<div class="dropdown">
   </div>
   
</div>
<div class="bg-img">
<hr>

<h1 align="center"><u><B>TEACHER LIST</b></u></h1>

<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$sql1= "select DISTINCT department from teacher ORDER BY department ASC,designation ASC,code_name ASC";
$result1 = $conn-> query($sql1);
if($result1-> num_rows > 0){
while ($row1 = $result1-> fetch_assoc()){
	$department=$row1["department"];
	?>
<br><br><br>
<h2 align="center"><u><B>Department of <?php echo strtoupper($row1['department']); ?></b></u></h2>
<br>
<?php
$sql2= "select DISTINCT designation from teacher WHERE department='$department' ORDER BY department ASC,designation ASC,code_name ASC";
$result2 = $conn-> query($sql2);
if($result2-> num_rows > 0){
while ($row2 = $result2-> fetch_assoc()){
	$designation=$row2["designation"];
?>
<h3 align="center"><u><B><?php echo strtoupper($row2['designation']); ?></b></u></h3>
<br>
<table style="float:center; width:100%; padding-left:440px">
<tr>
<th bgcolor=#99ffb9>Image</th>
<th bgcolor=#99ffb9>Name</th>
<th bgcolor=#99ffb9>Code Name</th>
<th bgcolor=#99ffb9>Gender</th>
<th bgcolor=#99ffb9>E-mail</th>
<th bgcolor=#99ffb9>Mobile</th>
<th bgcolor=#99ffb9>Room</th>
<th bgcolor=#99ffb9>Designation</th>
<th bgcolor=#99ffb9>Department</th>
</tr>
<?php

$sql= "select t_name,code_name,gender,email,mobile,room,designation,department,image from teacher WHERE department='$department' AND designation='$designation' ORDER BY department ASC,designation ASC,code_name ASC";
$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
	?>
	<tr><td><img class="img-responsive" style="width: 100px; " src="teacher_images/<?php  echo $row["image"]; ?>"></td>
	<?php
echo "<td>". $row["t_name"] ."</td><td>". $row["code_name"] ."</td><td>". $row["gender"] ."</td><td>". $row["email"] ."</td><td>". $row["mobile"] ."</td><td>". $row["room"] ."</td><td>". $row["designation"] ."</td><td>". $row["department"] ."</td></tr>";
}
echo "</table>";
?>
<br><br><br><br>
<?php
}}}
else{
echo "0 result";}
}}
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