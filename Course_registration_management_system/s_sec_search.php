<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
if (!isset($_SESSION['intake'])) {
    header('Location: search_student.php');
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

<h2 align="center"><u><B>*Search Result*</b></u></h2>
<table style="float:center; width:100%; padding-left:440px">
<tr>
<th bgcolor=#99ffb9>Image</th>
<th bgcolor=#99ffb9>Student ID</th>
<th bgcolor=#99ffb9>Name</th>
<th bgcolor=#99ffb9>Registration</th>
</tr>
<?php
$section=$_SESSION['section'];
$department=$_SESSION['department'];
$intake=$_SESSION['intake'];
if(!empty($intake)){
if(!empty($section)){
if(!empty($department)){
	$conn= mysqli_connect("localhost", "root", "", "course_list");
if(mysqli_connect_error()){
							die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
						}
						else{
							
	$sql8="SELECT s_name,year FROM semester";
	$result8 =$conn-> query($sql8);
if($result8-> num_rows > 0){
while ($row8 = $result8-> fetch_assoc()){
$s_name=$row8["s_name"];
$year=$row8["year"];
}}

							$sql = "select student_id,name,gender,email,intake,section,mobile,department,image from student where intake='$intake' AND section='$section' AND department='$department' ORDER BY department ASC, intake DESC, section ASC, student_id ASC";

$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
	$student_id=$row["student_id"];
	?>
	<tr><td><a  href="stu_pro.php?id=<?php echo $row["student_id"]; ?>"><img class="img-responsive" style="width: 100px; " src="student_images/<?php  echo $row["image"]; ?>"></td>
	<?php
echo "<td>". $row["student_id"] ."</td><td>". $row["name"] ."</td>";

$sql9="SELECT student_id FROM stu_offer WHERE student_id='$student_id' AND s_name='$s_name' AND year='$year' AND status='accepted'";
	$result9 =$conn-> query($sql9);
if($result9-> num_rows > 0){
	$sql5= "select DISTINCT stu_offer.student_id, stu_offer.status,
	   receipt.receipt_no from receipt,stu_offer 
	   where stu_offer.student_id='$student_id' AND stu_offer.student_id=receipt.student_id AND stu_offer.s_name='$s_name' AND stu_offer.section='$section'
	   AND stu_offer.year='$year' AND stu_offer.department='$department' AND stu_offer.intake='$intake' AND stu_offer.status='accepted' AND stu_offer.s_name=receipt.semester AND stu_offer.year=receipt.year";
	   $result5 =$conn-> query($sql5);
if($result5->num_rows>0){
	while($row5=$result5->fetch_assoc()){
		$rcpt=$row5['receipt_no'];
}}

?>
		<td><a href="registered_course.php?accept=<?php echo $row["student_id"]; ?>&receipt=<?php echo $rcpt; ?>" class="btn btn-danger">Registered</a></td>
		</tr>
		<?php
}
else{
	?>
		<td>Not Registered</td>
		</tr>
		<?php
}
}
echo "</table>";
}
else{
echo "0 result";}
$conn-> close();
}}}}
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