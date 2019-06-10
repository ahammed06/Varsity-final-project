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
<!--<?php
 if (isset($_SESSION['student_id'])){
echo $_SESSION['student_id'];}
else "bristy"?>-->

<div class="header" id="myHeader">
  <img src="images/BUBT-LOGO-1_01.png" width="300" height="120">
  <ul><b>
  <li><a href="s_profile.php">Home</a></li>
  <li><a href="notice.php">Notice Board</a></li>
  <li><a href="phone.php">Phone Book</a></li>
  <li1><a href="logout1.php">Logout</a></li1></b>
</ul>

</div>
<hr>

<div class="bg-img">

<div>
<form action="see_stu_offered_course.php" method="POST" class="container" enctype="multipart/form-data">
<h3 align="center">Offered Courses</h3>
<fieldset>
	
<label for="semester">Semester</label>
<select class="form-control" id="catagory" name="semester">
<option value="Fall">Fall</option>
<option value="Spring">Spring</option>
<option value="Summer">Summer</option>
</select>

<label for="year">Year</label>
<input type="text" placeholder="Enter Year" name="year" required>

<label for="intake">Intake</label>
<input type="text" placeholder="Enter Intake" name="intake" required>

<label for="section">Section</label>
<input type="text" placeholder="Enter Section" name="section" required>

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

<button type="submit" class="btn" value="submit">Submit</button>
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
