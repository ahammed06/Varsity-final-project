<?php
session_start();
if (!isset($_SESSION['user2'])) {
    header('Location: teacher.php');
    exit();
}
//else{
//echo 'You have successfully logged as '.$_SESSION['user2'];
//}

include "style11.php";

$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
else{
	if (isset($_SESSION['user2'])){$id = $_SESSION['user2'];
	//}
//if(isset($_GET['profile'])){
	
//	$id = $_GET['profile'];
	$sql= "select id,t_name,code_name,gender,email,mobile,room,designation,department,image from teacher 
	WHERE id = '$id'";
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
include "teach_header.php";
?>
<hr>
<!--<div class="sidenav">
  <a href="student_profile.php?profile=<?php echo $row["student_id"]; ?>">My Profile</a>
  <a href="#about">Course Registration</a>
  <a href="stu_offered_courses.php?profile=<?php echo $row["student_id"]; ?>">Offered Courses</a>
  <a href="#services">All Courses</a>
  <a href="#contact">My Intake Incharge</a>
  <a href="#contact">Payment Receipt</a>
  <a href="#services">Change Password</a>
</div>	-->
<div class="bg-img">
<div>
<?php
$row = $result-> fetch_assoc();
?>
<form method="POST" class="container" enctype="multipart/form-data">
<h2 style="font-family:cambria math" align="center">My Profile</h2>
<fieldset>
<img class="img-responsive" style="width:60%;" src="teacher_images/<?php  echo $row["image"];?>">
</img><br>

<a href="teacher_upd_detail.php" class="btn btn-danger">Update Profile</a><br>


<label for="t_name">Name: </label><?php echo $row['t_name'];?><br> 

<label for="code_name">Code Name: </label><?php echo $row['code_name'];?><br> 

<label for="gender">Gender: </label><?php echo $row['gender'];?><br> 

<label for="email">E-mail: </label><?php echo $row['email']; ?><br> 

<label for="mobile">Mobile No: </label><?php echo $row['mobile']; ?><br> 

<label for="room">Room: </label><?php echo $row['room']; ?><br>  

<label for="designation">Designation: </label><?php echo $row['designation']; ?><br>  

<label for="department">Department: </label><?php echo $row['department']; ?><br> 



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
