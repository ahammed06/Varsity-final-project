<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
if (!isset($_SESSION['course_code'])) {
    header('Location: up_course.php');
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
$update_id = $_SESSION['course_code'];
$update_dept = $_SESSION['department'];
$sql= "select course_title,course_code,pre_req,department,credit from course WHERE course_code = '$update_id' AND department='$update_dept'";
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
<form action="course_updated.php" method="POST" class="container">
<h3 align="center">UPDATE COURSE INFORMATION</h3>
<fieldset>
<label for="course_title">Course Title</label>
<input type="text" value="<?php echo $row['course_title']; ?>" name="course_title" required>

<label for="pre_req">Course Pre-requisite</label>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$sql2= "SELECT course_code from course ORDER BY course_code ASC";
echo '<select class="form-control" id="catagory" name="pre_req">';
$result2 = $conn-> query($sql2);
?>
<option selected="selected" value="<?php echo $row['pre_req']; ?>">---<?php echo $row['pre_req']; ?>---</option>
<option value="null">---Select Pre-requisite Course---</option>
<?php
if($result2-> num_rows > 0){
while ($row2 = $result2-> fetch_assoc()){
echo '<option value="'.$row2['course_code'].'">'.$row2['course_code'].'</option>';
}
echo '</select>';
}
else{
echo "0 result";}
$conn-> close();
?>

<label for="credit">Course Credit</label>
<input type="text" value="<?php echo $row['credit']; ?>" name="credit" required>

<label for="department">Department</label>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

$sql1= "SELECT dept_code from department";
echo '<select class="form-control" id="catagory" name="department">';
$result1 = $conn-> query($sql1);
?>
<option selected="selected" value="<?php echo $row['department']; ?>">---<?php echo $row['department']; ?>---</option>
<?php
if($result1-> num_rows > 0){
while ($row1 = $result1-> fetch_assoc()){
echo '<option value="'.$row1['dept_code'].'">'.$row1['dept_code'].'</option>';
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
