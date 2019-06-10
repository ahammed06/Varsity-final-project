<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
if (!isset($_SESSION['code_name'])) {
    header('Location: up_teacher.php');
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
$update_id = $_SESSION['code_name'];
$sql= "select t_name,code_name,gender,email,mobile,room,designation,department,image from teacher WHERE code_name = '$update_id'";
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
<form action="teacher_updated.php" method="POST" class="container" enctype="multipart/form-data">
<h3 align="center">UPDATE TEACHER INFORMATION</h3>
<fieldset>
<label for="t_name">Name</label>
<input type="text" value="<?php echo $row['t_name']; ?>" name="t_name" required>

<label for="gender">Gender</label>
<select class="form-control" id="catagory" name="gender">
<option selected="selected" value="<?php echo $row['gender']; ?>">---<?php echo $row['gender']; ?>---</option>
<option value="male">Male</option>
<option value="female">Female</option>
</select>

<label for="email">E-mail</label>
<input type="email" value="<?php echo $row['email']; ?>" name="email" required>

<label for="mobile">Mobile No.</label>
<input type="tel" value="<?php echo $row['mobile']; ?>" name="mobile" pattern="[0-9]{11}" required>

<label for="room">Room No.</label>
<input type="number" value="<?php echo $row['room']; ?>" name="room" min="100" required>

<label for="designation">Designation</label>
<select class="form-control" id="catagory" name="designation">
<option selected="selected" value="<?php echo $row['designation']; ?>">---<?php echo $row['designation']; ?>---</option>
<option value="Lecturer">Lecturer</option>
<option value="Assistant Professor">Assistant Professor</option>
<option value="Professor & Chairman">Professor & Chairman</option>
</select>

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
