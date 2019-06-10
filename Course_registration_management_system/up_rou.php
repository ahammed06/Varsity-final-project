<?php
 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}

if (!isset($_SESSION['course_code'])) {
    header('Location: up_routine.php');
    exit();
}

$semester = $_SESSION['semester'];
$year = $_SESSION['year'];
$intake = $_SESSION['intake'];
$section = $_SESSION['section'];
$department = $_SESSION['department'];
$course_code = $_SESSION['course_code'];

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
<form action="routine_added.php" method="POST" class="container">
<h1 align="center">Update Routine</h1>
<p align="center"><u><B><a href="see_routine.php?semester=<?php echo $semester; ?>&year=<?php echo $year; ?>&section=<?php echo $section; ?>&intake=<?php echo $intake; ?>&department=<?php echo $department; ?>" class="btn btn-danger">See Current Routine</a></b></u></p>
<br>
<h3 align="center">Course Code : <?php echo $course_code; ?></h3>
<fieldset>

<label for="day1">Day 1</label>
<?php
$sql1= "SELECT DISTINCT day from routine ORDER BY id ASC";
echo '<select class="form-control" id="catagory" name="day1">';
$sql= "SELECT day1 from offer WHERE course_code='$course_code' AND semester='$semester' AND year='$year' AND intake='$intake' AND section='$section' AND department='$department'";
$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
echo '<option value="'.$row['day1'].'">--- '.$row['day1'].' ---</option>';
}}
?>
<option value="">---Select Day 1---</option>
<?php
$result1 = $conn-> query($sql1);
if($result1-> num_rows > 0){
while ($row1 = $result1-> fetch_assoc()){
echo '<option value="'.$row1['day'].'">'.$row1['day'].'</option>';
}
echo '</select>';
}
else{
echo "0 result";}
?>

<label for="time1">Time 1</label>
<?php
$sql2= "SELECT DISTINCT time from routine ORDER BY id ASC";
echo '<select class="form-control" id="catagory" name="time1">';
$sql= "SELECT time1 from offer WHERE course_code='$course_code' AND semester='$semester' AND year='$year' AND intake='$intake' AND section='$section' AND department='$department'";
$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
echo '<option value="'.$row['time1'].'">--- '.$row['time1'].' ---</option>';
}}
?>
<option value="">---Select Time 1---</option>
<?php
$result2 = $conn-> query($sql2);
if($result2-> num_rows > 0){
while ($row2 = $result2-> fetch_assoc()){
echo '<option value="'.$row2['time'].'">'.$row2['time'].'</option>';
}
echo '</select>';
}
else{
echo "0 result";}
?>

<label for="day2">Day 2</label>
<?php
echo '<select class="form-control" id="catagory" name="day2">';
$sql= "SELECT day2 from offer WHERE course_code='$course_code' AND semester='$semester' AND year='$year' AND intake='$intake' AND section='$section' AND department='$department'";
$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
echo '<option value="'.$row['day2'].'">--- '.$row['day2'].' ---</option>';
}}
?>
<option value="">---Select Day 2---</option>
<?php
$result1 = $conn-> query($sql1);
if($result1-> num_rows > 0){
while ($row1 = $result1-> fetch_assoc()){
echo '<option value="'.$row1['day'].'">'.$row1['day'].'</option>';
}
echo '</select>';
}
else{
echo "0 result";}
?>

<label for="time2">Time 2</label>
<?php
echo '<select class="form-control" id="catagory" name="time2">';
$sql= "SELECT time2 from offer WHERE course_code='$course_code' AND semester='$semester' AND year='$year' AND intake='$intake' AND section='$section' AND department='$department'";
$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
echo '<option value="'.$row['time2'].'">--- '.$row['time2'].' ---</option>';
}}
?>
<option value="">---Select Time 2---</option>
<?php
$result2 = $conn-> query($sql2);
if($result2-> num_rows > 0){
while ($row2 = $result2-> fetch_assoc()){
echo '<option value="'.$row2['time'].'">'.$row2['time'].'</option>';
}
echo '</select>';
}
else{
echo "0 result";}
?>

<label for="day3">Day 3</label>
<?php
echo '<select class="form-control" id="catagory" name="day3">';
$sql= "SELECT day3 from offer WHERE course_code='$course_code' AND semester='$semester' AND year='$year' AND intake='$intake' AND section='$section' AND department='$department'";
$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
echo '<option value="'.$row['day3'].'">--- '.$row['day3'].' ---</option>';
}}
?>
<option value="">---Select Day 3---</option>
<?php
$result1 = $conn-> query($sql1);
if($result1-> num_rows > 0){
while ($row1 = $result1-> fetch_assoc()){
echo '<option value="'.$row1['day'].'">'.$row1['day'].'</option>';
}
echo '</select>';
}
else{
echo "0 result";}
?>

<label for="time3">Time 3</label>
<?php
echo '<select class="form-control" id="catagory" name="time3">';
$sql= "SELECT time3 from offer WHERE course_code='$course_code' AND semester='$semester' AND year='$year' AND intake='$intake' AND section='$section' AND department='$department'";
$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
echo '<option value="'.$row['time3'].'">--- '.$row['time3'].' ---</option>';
}}
?>
<option value="">---Select Time 3---</option>
<?php
$result2 = $conn-> query($sql2);
if($result2-> num_rows > 0){
while ($row2 = $result2-> fetch_assoc()){
echo '<option value="'.$row2['time'].'">'.$row2['time'].'</option>';
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
