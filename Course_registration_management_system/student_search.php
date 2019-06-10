<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
if (!isset($_SESSION['student_id'])) {
    header('Location: student_pass.php');
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
<table style="float:center; width:100%; padding-left:440px">
<tr>
<th bgcolor=#99ffb9>ID</th>
<th bgcolor=#99ffb9>Name</th>
<th bgcolor=#99ffb9>Password</th>
</tr>
<?php
$student_id = $_SESSION['student_id'];
if(!empty($student_id)){
	$conn= mysqli_connect("localhost", "root", "", "course_list");
if(mysqli_connect_error()){
							die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
						}
						else{
							$sql = "SELECT student_id,name,password from student where student_id='$student_id'";

$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
echo "<tr><td>". $row["student_id"] ."</td><td>". $row["name"] ."</td><td>". $row["password"] ."</td></tr>";
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