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
	$sql= "select student_id,name,gender,email,intake,section,mobile,department,image from student 
	WHERE `student_id` = $id";
$result = $conn-> query($sql);	
}
}
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
<!--<div class="sidenav">
  <a href="student_profile.php?profile=<?php echo $id; ?>">My Profile</a>
  <a href="#about">Course Registration</a>
  <a href="stu_offered_courses.php?profile=<?php echo $id; ?>">Offered Courses</a>
  <a href="#services">All Courses</a>
  <a href="#contact">My Intake Incharge</a>
  <a href="#contact">Payment Receipt</a>
  <a href="#services">Change Password</a>
</div>	-->
<div class="bg-img">
<div class="main">
<div>
<?php
$row = $result-> fetch_assoc();
?>
<form action="student_updated.php" method="POST" class="container" enctype="multipart/form-data">
<h2 style="font-family:cambria math" align="center">My Profile</h2>
<fieldset>
<img class="img-responsive" style="width:60%;" src="student_images/<?php  echo $row["image"];?>">
</img><br>
<a href="stu_upd.php" class="btn btn-danger">Edit Profile</a><br> 
<label for="name">Name: </label><?php echo $row['name'];?><br> 

<label for="name">ID: </label><?php echo $row['student_id'];?><br> 

<label for="email">E-mail: </label><?php echo $row['email']; ?><br> 

<label for="intake">Intake: </label><?php echo $row['intake']; ?><br> 

<label for="section">Section: </label><?php echo $row['section']; ?><br> 

<label for="mobile">Mobile No: </label><?php echo $row['mobile']; ?><br> 

<label for="department">Department: </label><?php echo $row['department']; ?><br> 
</fieldset>
</form>
</div> 
</div> 
</div>
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</body>
</html> 
