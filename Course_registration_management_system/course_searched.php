<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
if (!isset($_SESSION['department'])) {
    header('Location: course_search.php');
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

<h1 align="center"><u><B>COURSE LIST</b></u></h1>

<?php
$dep = $_SESSION['department'];
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

?>

<h2 align="center"><u><B>Department of <?php echo strtoupper($dep); ?></b></u></h2>

<table style="float:center; width:100%; padding-left:440px">
<tr>
<th bgcolor=#99ffb9>Course Title</th>
<th bgcolor=#99ffb9>Course Code</th>
<th bgcolor=#99ffb9>Pre-requisite Course</th>
<th bgcolor=#99ffb9>Course Credit</th>
<th bgcolor=#99ffb9>Department</th>
</tr>
<?php

$sql= "select course_title,course_code,pre_req,department,credit from course WHERE department='$dep' ORDER BY department ASC,course_code ASC";
$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
echo "<tr><td>". $row["course_title"] ."</td><td>". $row["course_code"] ."</td><td>". $row["pre_req"] ."</td><td>". $row["credit"] ."</td><td>". $row["department"] ."</td></tr>";
}
echo "</table>";
}
else{
	echo "0 result";
}
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