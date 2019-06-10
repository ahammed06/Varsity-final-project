<?php 
session_start();
if (!isset($_SESSION['user2'])) {
    header('Location: teacher.php');
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
if (isset($_SESSION['user2'])){$profile = $_SESSION['user2'];}
?>
</head>

<body>
<?php
include "teach_header.php";
?>
<hr>

<div class="bg-img">
<br>
<form action="teach_stu_incharge_search.php" method="POST" class="container">
<h3 align="center">SEARCH ACCEPTED COURSE</h3>
<fieldset>
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


<button type="submit" name="next" class="btn" name="update">Search</button>
<a href="teach_stu_incharge_list.php" class="signup">See All</a>

</fieldset>
</form>
<br> 

</div>

<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</body>
</html> 
