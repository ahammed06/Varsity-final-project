<?php
 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}

if (!isset($_SESSION['semester'])) {
    header('Location: up_routine.php');
    exit();
}

$semester = $_SESSION['semester'];
$year = $_SESSION['year'];
$intake = $_SESSION['intake'];
$section = $_SESSION['section'];
$department = $_SESSION['department'];

$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

?>

<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">
<?php 
include "style6.php";
?>
</head>

<body>
<?php
include "admin_header.php";
?>

<div class="bg-img">
<div>
<form action="up_rout.php" method="POST" class="container">
<h1 align="center">Update Routine</h1>
<p align="center"><u><B><a href="see_routine.php?semester=<?php echo $semester; ?>&year=<?php echo $year; ?>&section=<?php echo $section; ?>&intake=<?php echo $intake; ?>&department=<?php echo $department; ?>" class="btn btn-danger">See Current Routine</a></b></u></p>
<br>
<fieldset>

<label for="course_code">Course Code</label>
<?php

$sql= "SELECT course_code from offer WHERE semester='$semester' AND year='$year' AND intake='$intake' AND section='$section' AND department='$department' ORDER BY course_code ASC";
echo '<select class="form-control" id="catagory" name="course_code">';
$result = $conn-> query($sql);

if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
echo '<option value="'.$row['course_code'].'">'.$row['course_code'].'</option>';
}
echo '</select>';
}
else{
echo "0 result";}
?>

<button type="submit" class="btn" value="submit">Insert</button>
</fieldset>
</form>

</div> 
</div> 
<br><br><Br><br><br><Br>
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</body>
</html> 
