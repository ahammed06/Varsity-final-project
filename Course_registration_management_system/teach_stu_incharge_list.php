<?php 
session_start();
if (!isset($_SESSION['user2'])) {
    header('Location: teacher.php');
    exit();
}
//else{
//echo 'You have successfully logged as '.$_SESSION['user2'];
//}
?>

<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">
<?php 
include "style13.php";
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
//if(isset($_GET['profile'])){
//$profile = $_GET['profile'];
//}
if (isset($_SESSION['user2'])){$profile = $_SESSION['user2'];}
?>
</head>
<body>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">

</head>
<body>
<?php
include "teach_header.php";
?>
<div class="bg-img">
<hr>

<h1 align="center"><u><B>INCHARGED STUDENT LIST</b></u></h1>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

$sql8="SELECT s_name,year FROM semester";
	$result8 =$conn-> query($sql8);
if($result8-> num_rows > 0){
while ($row8 = $result8-> fetch_assoc()){
$s_name=$row8["s_name"];
$year=$row8["year"];
}}

$sql6= "select code_name from teacher WHERE id = '$profile'";
$result6 =$conn-> query($sql6);
if($result6-> num_rows > 0){
while ($row6 = $result6-> fetch_assoc()){
$code_name=$row6["code_name"];

$sql7= "select code_name,semester,year,section,intake,department from incharge WHERE code_name = '$code_name' AND semester='$s_name' AND year='$year'";
$result7 =$conn-> query($sql7);
if($result7-> num_rows > 0){
while ($row7 = $result7-> fetch_assoc()){
$sem=$row7["semester"];
$yea=$row7["year"];
$sec=$row7["section"];
$int=$row7["intake"];
$dep=$row7["department"];

$sql2= "select DISTINCT department from student WHERE department='$dep' ORDER BY department ASC,intake DESC,section ASC,student_id ASC";
$result2 =$conn-> query($sql2);
if($result2-> num_rows > 0){
while ($row2 = $result2-> fetch_assoc()){
$department=$row2["department"];
?>
<br><br><br>
<h2 align="center"><u><B>Department of <?php echo strtoupper($row2['department']); ?></b></u></h2>

<?php
$sql1= "select DISTINCT intake from student WHERE department='$department' AND department='$dep' AND intake='$int' ORDER BY department ASC,intake DESC,section ASC,student_id ASC";
$result1 =$conn-> query($sql1);
if($result1-> num_rows > 0){
while ($row1 = $result1-> fetch_assoc()){
$intake=$row1["intake"];
?>

<h3 align="center"><u><B>Intake <?php echo $row1['intake']; ?></b></u></h3>

<?php
$sql3= "select DISTINCT section from student WHERE department='$department' AND department='$dep' AND intake='$intake' AND intake='$int' AND section='$sec' ORDER BY department ASC,intake DESC,section ASC,student_id ASC";
$result3 =$conn-> query($sql3);
if($result3-> num_rows > 0){
while ($row3 = $result3-> fetch_assoc()){
$section=$row3["section"];
?>

<h4 align="center"><u><B>Section <?php echo $row3['section']; ?></b></u></h4>
<br>


<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}



$sql= "select student_id,name,gender,email,intake,section,mobile,department,image from student WHERE department='$department' AND department='$dep' AND intake='$intake' AND intake='$int' AND section='$section' AND section='$sec' ORDER BY department ASC,intake DESC,section ASC,student_id ASC";
$result =$conn-> query($sql);
if($result-> num_rows > 0){
?>
<table style="float:center; width:100%; padding-left:440px">
	<tr>
	<th bgcolor=#99ffb9>Image</th>
	<th bgcolor=#99ffb9>Student ID</th>
	<th bgcolor=#99ffb9>Name</th>
	<th bgcolor=#99ffb9>Registration</th>
	</tr>
<?php 
	while($row=$result->fetch_assoc()){
		
		$student_id=$row["student_id"];
		
		
		
		?>
	<tr><td><a  href="stu_prof.php?id=<?php echo $student_id; ?>"><img class="img-responsive" style="width: 100px; " src="student_images/<?php  echo $row["image"]; ?>"></td>
	<?php
		echo "
		<td>".$row["student_id"]."</td> <!This is HTML tale data>
		<td>".$row["name"]."</td>";
		
		$sql9="SELECT DISTINCT receipt_no FROM receipt WHERE student_id='$student_id' AND semester='$s_name' AND year='$year'";
	$result9 =$conn-> query($sql9);
if($result9-> num_rows > 0){
	while($row9=$result9->fetch_assoc()){
		$rcpt=$row9['receipt_no'];
}

?>
		<td><a href="see_req_course.php?see=<?php echo $row["student_id"]; ?>&receipt=<?php echo $rcpt; ?>" class="btn btn-danger">Registered</a></td>
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
}}}}}}}
else{
	echo "0 result";
}}}}}
$conn->close();
?> 

<br><br><br><br><br><br><br><br><br>
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</div>
</body>
</html>