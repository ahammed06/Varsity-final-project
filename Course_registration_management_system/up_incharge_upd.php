<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
if (!isset($_SESSION['semester'])) {
    header('Location: up_incharge.php');
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
include "style6.php";
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
	$semester = $_SESSION['semester'];
	$year = $_SESSION['year'];
	$intake = $_SESSION['intake'];
	$section = $_SESSION['section'];
	$department = $_SESSION['department'];
$sql= "select semester,year,code_name,intake,section,department,id from incharge WHERE semester='$semester' AND year='$year' AND intake='$intake' AND section='$section' AND department='$department'";
$result = $conn-> query($sql);
?>
</head>

<body>
<?php
include "admin_header.php";
?>

<div class="bg-img">
<div>
<?php
while ($row = $result-> fetch_assoc()){

        ?>
<form action="incharge_updated.php" method="POST" class="container">
<h3 align="center">UPDATE INCHARGE INFORMATION</h3>
<fieldset>
<label for="semester">Semester</label>
<select class="form-control" id="catagory" name="semester">
<option selected="selected" value="<?php echo $row['semester']; ?>">---<?php echo $row['semester']; ?>---</option>
<option value="fall">Fall</option>
<option value="spring">Spring</option>
<option value="summer">Summer</option>
</select>

<label for="year">Year</label>
<input type="number" value="<?php echo $row['year']; ?>" name="year" min="2000" required>

<label for="code_name">Code Name</label>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$sql1= "SELECT code_name from teacher ORDER BY code_name ASC";
echo '<select class="form-control" id="catagory" name="code_name">';
$result1 = $conn-> query($sql1);
?>
<option selected="selected" value="<?php echo $row['code_name']; ?>">---<?php echo $row['code_name']; ?>---</option>
<?php
if($result1-> num_rows > 0){
while ($row1 = $result1-> fetch_assoc()){
echo '<option value="'.$row1['code_name'].'">'.$row1['code_name'].'</option>';
}
echo '</select>';
}
else{
echo "0 result";}
$conn-> close();
?>

<label for="intake">Intake</label>
<input type="number" value="<?php echo $row['intake']; ?>" name="intake" min="1" required>

<label for="section">Section</label>
<input type="number" value="<?php echo $row['section']; ?>" name="section" min="1" required>

<label for="department">Department</label>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

$sql= "SELECT dept_code from department";
echo '<select class="form-control" id="catagory" name="department">';
$result = $conn-> query($sql);
?>
<option selected="selected" value="<?php echo $row['department']; ?>">---<?php echo $row['department']; ?>---</option>
<?php
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
echo '<option value="'.$row['dept_code'].'">'.$row['dept_code'].'</option>';
}
echo '</select>';
}
else{
echo "0 result";}
$conn-> close();
?>

<button type="submit" class="btn" value="submit">UPDATE</button>
</fieldset>
</form>
<?php
}
?>
</div> 
</div> 
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</body>
</html> 
