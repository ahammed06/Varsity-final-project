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
?>
</head>

<body>
<?php
include "admin_header.php";
?>

<div class="bg-img">
<div>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

$submit_id = $_SESSION['student_id'];
$sql= "select student_id from student WHERE student_id = '$submit_id'";
$result = $conn-> query($sql);

$row = $result-> fetch_assoc();
?>
<form action="student_pic_updated.php" method="POST" class="container" enctype="multipart/form-data">
<h3 align="center">ADD PROFILE PICTURE</h3>
<fieldset>

<label for="image">Upload Image</label>
<input type="file" name="fileToUpload" id="fileToUpload">

<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
?>

<button type="skip" name="skip" class="btn" value="skip">Skip</button>
<button type="submit" name="next" class="btn" value="submit">Submit</button>
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
