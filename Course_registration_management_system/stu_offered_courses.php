<?php
session_start();
if (!isset($_SESSION['user1'])) {
    header('Location: student.php');
    exit();
}
include "style11.php";

$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
else{
if (isset($_SESSION['user1'])){$id = $_SESSION['user1'];
	
	$sql= "select student_id,name,semester,email,intake,section,mobile,department,image from student 
	WHERE `student_id` = $id";
$result = $conn-> query($sql);	
//$row=$result->fetch_assoc();
}}

?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">
</head>
<body>
<?php
include "stu_header.php";
?>
<hr>
<div class="bg-img">

<div>
<form action="stu_off_course.php" method="POST" class="container" enctype="multipart/form-data">
<h2 style="font-family:cambria math; font-size:23px;" align="center">Search Offered Courses</h2>
<fieldset>
<label for="semester">Semester</label>
<select class="form-control" id="catagory" name="semester">
<option value="fall">Fall</option>
<option value="spring">Spring</option>
<option value="summer">Summer</option>
</select>

<label for="year">Year</label>
<input type="number" placeholder="Enter Year" name="year" min="2000" required>

<label for="intake">Intake</label>
<input type="number" placeholder="Enter Intake" name="intake" min="1" required>

<label for="section">Section</label>
<input type="number" placeholder="Enter Section" name="section" min="1" required>

<label for="department">Department</label>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$sql= "SELECT dept_code from department";
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

<button type="search" name="next" class="btn" value="search">Search</button>
<a href="courseOffer.php" class="signup">View All</a>
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
