<?php 
session_start();
if (!isset($_SESSION['user1'])) {
    header('Location: student.php');
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
else{
if (isset($_SESSION['user1'])){$id = $_SESSION['user1'];

$sql= "select student_id,name,gender,email,intake,section,mobile,department,image from student WHERE `student_id` = $id";
$result = $conn-> query($sql);}}
?>
</head>

<body>
<?php
include "stu_header.php";
?>
<hr>

<div class="bg-img">
<div>
<?php
$row = $result-> fetch_assoc();
?>
<form action="stu_updated_email.php" method="POST" class="container" enctype="multipart/form-data">
<h3 align="center">UPDATE E-mail</h3>
<fieldset>

<label for="email">E-mail</label>
<input type="email" value="<?php echo $row['email']; ?>" name="email" required>

<button type="submit" class="btn" value="submit" name="submit">UPDATE</button>
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
