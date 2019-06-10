<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
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
include "style13.php";
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
//if(isset($_GET['profile'])){
//$profile = $_GET['profile'];
//}
if (isset($_SESSION['user'])){$profile = $_SESSION['user'];}
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
include "admin_header.php";
?>
<div class="bg-img">
<hr>

<h1 align="center"><u><B>Section Incharge</b></u></h1>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$code_name = $_GET['accept'];

$sql8="SELECT s_name,year FROM semester";
	$result8 =$conn-> query($sql8);
if($result8-> num_rows > 0){
while ($row8 = $result8-> fetch_assoc()){
$sem=$row8["s_name"];
$yea=$row8["year"];
}}

$sql4= "select DISTINCT semester,year from incharge WHERE semester='$sem' AND year='$yea' AND code_name='$code_name' ORDER BY department ASC,year DESC,semester DESC,intake DESC,section ASC";
$result4 =$conn-> query($sql4);
if($result4-> num_rows > 0){
while ($row4 = $result4-> fetch_assoc()){
$semester=$row4["semester"];
$year=$row4["year"];
?>
<p align="center"><u><B>Code Name : <?php echo $code_name; ?></b></u></p>

<h2 align="center"><u><B><?php echo strtoupper($row4['semester'])?> <?php echo $row4['year']?></b></u></h2>


<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

$sql= "select intake,section,department from incharge 
	   where code_name='$code_name' AND semester='$sem' AND year='$yea'
	   ORDER BY department ASC,year DESC,semester DESC,intake DESC,section ASC";
$result =$conn-> query($sql);
if($result->num_rows>0){
?>
<table style="float:center; width:100%; padding-left:440px">
	<tr>
	<th>Intake</th>
	<th>Section</th>
	<th>Department</th>
	</tr>
<?php 
	while($row=$result->fetch_assoc()){
		echo "<tr>
		<td>".$row["intake"]."</td>
		<td>".$row["section"]."</td>
		<td>".$row["department"]."</td>";
	}
	echo "</table>";
}
else{
	echo "0 result";
}}}
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