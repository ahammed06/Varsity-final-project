<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
if (!isset($_SESSION['code_name'])) {
    header('Location: search_teacher.php');
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
<th bgcolor=#99ffb9>Image</th>
<th bgcolor=#99ffb9>Name</th>
<th bgcolor=#99ffb9>Code Name</th>
<th bgcolor=#99ffb9>Incharge</th>
</tr>
<?php
$code_name=$_SESSION['code_name'];
if(!empty($code_name)){
	$conn= mysqli_connect("localhost", "root", "", "course_list");
if(mysqli_connect_error()){
							die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
						}
						else{
							
	$sql8="SELECT s_name,year FROM semester";
	$result8 =$conn-> query($sql8);
if($result8-> num_rows > 0){
while ($row8 = $result8-> fetch_assoc()){
$sem=$row8["s_name"];
$yea=$row8["year"];
}}

							$sql = "select t_name,code_name,gender,email,mobile,designation,department,image from teacher where code_name='$code_name' ORDER BY department ASC, code_name ASC";

$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
	?>
	<tr><td><a  href="teach_pro.php?id=<?php echo $row["code_name"]; ?>"><img class="img-responsive" style="width: 100px; " src="teacher_images/<?php  echo $row["image"]; ?>"></td>
	<?php
echo "<td>". $row["t_name"] ."</td><td>". $row["code_name"] ."</td>";
$sql9="SELECT code_name FROM incharge WHERE code_name='$code_name' AND semester='$sem' AND year='$yea'";
	$result9 =$conn-> query($sql9);
if($result9-> num_rows > 0){

?>
		<td><a href="teach_incharged.php?accept=<?php echo $row["code_name"]; ?>" class="btn btn-danger">Incharged</a></td>
		</tr>
		<?php
}
else{
	?>
		<td>Not Incharged</td>
		</tr>
		<?php
}}
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