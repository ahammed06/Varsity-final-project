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
include "style18.php";
?>
</head>

<body>
<?php
include "admin_header.php";
?>

<div class="bg-img">
<div>
<form action="student_added.php" method="POST" class="container" enctype="multipart/form-data">
<h3 align="center" style="font-size:20px;">ADD NEW STUDENT</h3>
<fieldset>
	
<label for="student_id">ID</label>
<input type="text" placeholder="Enter ID" name="student_id" required>

<label for="name">Name</label>
<input type="text" placeholder="Enter Name" name="name" required>

<label for="gender">Gender</label>
<select class="form-control" id="catagory" name="gender">
<option value="male">Male</option>
<option value="female">Female</option>
</select>

<label for="email">E-mail</label>
<input type="email" placeholder="Enter E-mail" name="email" required>

<label for="intake">Intake</label>
<input type="number" placeholder="Enter Intake" name="intake" min="1" required>

<label for="section">Section</label>
<input type="number" placeholder="Enter Section" name="section" min="1" required>

<label for="mobile">Mobile No.</label>
<input type="tel" placeholder="Enter mobile Ex: 01xxxxxxxxx" name="mobile" pattern="[0-9]{11}" required>

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
