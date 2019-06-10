<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
if (!isset($_SESSION['student_id'])) {
    header('Location: up_student.php');
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
include "style6.php";
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$update_id = $_SESSION['student_id'];
$sql= "select student_id,name,gender,email,intake,section,mobile,department,image from student WHERE `student_id` = $update_id";
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
<form action="student_updated.php" method="POST" class="container" enctype="multipart/form-data">
<h3 align="center">UPDATE STUDENT INFORMATION</h3>
<fieldset>
<label for="name">Name</label>
<input type="text" value="<?php echo $row['name']; ?>" name="name" required>

<label for="gender">Gender</label>
<select class="form-control" id="catagory" name="gender">
<option selected="selected" value="<?php echo $row['gender']; ?>">---<?php echo $row['gender']; ?>---</option>
<option value="male">Male</option>
<option value="female">Female</option>
</select>

<label for="email">E-mail</label>
<input type="email" value="<?php echo $row['email']; ?>" name="email" required>

<label for="intake">Intake</label>
<input type="number" value="<?php echo $row['intake']; ?>" name="intake" min="1" required>

<label for="section">Section</label>
<input type="number" value="<?php echo $row['section']; ?>" name="section" min="1" required>

<label for="mobile">Mobile No.</label>
<input type="tel" value="<?php echo $row['mobile']; ?>" name="mobile" pattern="[0-9]{11}" required>

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
