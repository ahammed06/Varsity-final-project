<?php
session_start();
include "style15.php";

$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
else{
if(isset($_GET['profile'])){
	
	$id = $_GET['profile'];
	$sql= "select id,code_name from teacher WHERE `id` = $id";
$result = $conn-> query($sql);	
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
<div class="header" id="myHeader">
  <img src="images/BUBT-LOGO-1_01.png" width="300" height="120">
  <ul><b>
  <li><a href="t_my_profile.php?profile=<?php echo $id;?>">My Profile</a></li>
  <li><a href="confirm_course.php?profile=<?php echo $id; ?>">Course Registration</a></li>
  <!--<li><a href="in_teacher_list.php">Teacher List</a><li>-->
  <li><a href="#">Change Password</a></li>
  <li1><a href="logout2.php">Logout</a></li1></b>
</ul>
<div class="dropdown">
   </div>
</div>
<hr>

<h1 align="center"><u><B>STUDENT LIST</b></u></h1>

<table style="float:center; width:100%; padding-left:440px">
<tr>
<th bgcolor=#99ffb9>Image</th>
<th bgcolor=#99ffb9>Student ID</th>
<th bgcolor=#99ffb9>Name</th>
<th bgcolor=#99ffb9>Gender</th>
<th bgcolor=#99ffb9>E-mail</th>
<th bgcolor=#99ffb9>Intake</th>
<th bgcolor=#99ffb9>Section</th>
<th bgcolor=#99ffb9>Mobile</th>
<th bgcolor=#99ffb9>Department</th>
</tr>
<?php
if(!$result)
{
  die();
}
else 
{
$row = $result-> fetch_assoc();
$code_name=$row['code_name'];}

$sql2="select * FROM incharge where `code_name`=$code_name";
$result2 = $conn-> query($sql2);
if($result2)
{
  $row2 = $result2-> fetch_assoc();
$intake=$row2['intake'];
$section=$row2['section'];
$department=$row2['department'];
}
else 
{
	die("$code_name " . mysqli_connect_error());
}

$sql3= "select student_id,name,gender,email,intake,section,mobile,department,image from student 
        WHERE intake='$intake' AND section='$section' 
		ORDER BY student_id ASC";
$result3 = $conn-> query($sql3);
if($result3-> num_rows > 0){
while ($row3 = $result3-> fetch_assoc()){
	?>	
	<tr><td><img class="img-responsive" style="width: 100px; " src="student_images/<?php  echo $row["image"]; ?>"></td>
	<?php
echo "<td>". $row["student_id"] ."</td>
      <td>". $row["name"] ."</td>
	  <td>". $row["gender"] ."</td>
	  <td>". $row["email"] ."</td>
	  <td>". $row["intake"] ."</td>
	  <td>". $row["section"] ."</td>
	  <td>". $row["mobile"] ."</td>
	  <td>". $row["department"] ."</td></tr>";
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
<br><br><br><br><br><br><br><br><br>
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</body>
</html>