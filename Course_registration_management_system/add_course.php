<?php
 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
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
include "style11.php";
?>
</head>

<body>
<?php
include "admin_header.php";
?>

<div class="bg-img">
<div>
<form action="course_added.php" method="POST" class="container">
<h3 align="center">ADD NEW COURSE</h3>
<fieldset>
<label for="course_title">Course Title</label>
<input type="text" placeholder="Enter Course Title" name="course_title" required>

<label for="course_code">Course Code</label>
<input type="text" placeholder="Enter Course Code Ex: CSE101" name="course_code" pattern="[A-z0-9]+" required>

<label for="pre_req">Course Pre-requisite</label>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$sql= "SELECT course_code from course ORDER BY course_code ASC";
echo '<select class="form-control" id="catagory" name="pre_req">';
$result = $conn-> query($sql);
?>
<option selected="selected" value="null">---Select Pre-requisite Course---</option>
<?php
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
echo '<option value="'.$row['course_code'].'">'.$row['course_code'].'</option>';
}

}
else{
echo "0 result";}
echo '</select>';
$conn-> close();
?>

<label for="credit">Course Credit</label>
<input type="text" placeholder="Enter Course Credit" name="credit" required>

<label for="department">Department</label>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$sql= "SELECT dept_code from department ORDER BY dept_code ASC";
echo '<select class="form-control" id="catagory" name="department">';
$result = $conn-> query($sql);
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

          

<button type="submit" class="btn" value="submit">Insert</button>
</fieldset>
</form>

</div> 
</div> 
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</body>
</html> 
