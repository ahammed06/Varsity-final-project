<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
if (!isset($_SESSION['code_name'])) {
    header('Location: up_teacher.php');
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

<h2 align="center"><u><B>Search Result</b></u></h2>
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
<th bgcolor=#99ffb9>Delete</th>
<th bgcolor=#99ffb9>Update</th>

</tr>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$code_name = $_SESSION['code_name'];
$sql= "select t_name,code_name,gender,email,mobile,room,designation,department,image from teacher WHERE code_name='$code_name'";
$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
	?>
	<tr><td><img class="img-responsive" style="width: 100px; " src="teacher_images/<?php  echo $row["image"]; ?>"></td>
	<?php
echo "<td>". $row["t_name"] ."</td><td>". $row["code_name"] ."</td><td>". $row["gender"] ."</td><td>". $row["email"] ."</td><td>". $row["mobile"] ."</td><td>". $row["room"] ."</td><td>". $row["designation"] ."</td><td>". $row["department"] ."</td>";
?>
<td><a href="up_teach_dlt.php" class="btn btn-danger">Delete</a></td>
<td><a href="up_teach_upd.php" class="btn btn-danger">Update</a></td>
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