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

	$sql= "select student_id,intake,section,department from student 
	WHERE `student_id` = $id";
$result = $conn-> query($sql);	
$row = $result-> fetch_assoc();
$intake=$row["intake"];
$section=$row["section"];
$department=$row["department"];
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
<?php
$connection= mysqli_connect("localhost", "root", "", "course_list");
if($connection-> connect_error){
die("connection failed".$connection-> connect_error);
}
$sql2= "SELECT incharge.code_name, teacher.t_name,teacher.code_name, teacher.gender, teacher.email,teacher.room,
       teacher.mobile,teacher.designation,teacher.department,teacher.image, incharge.semester, incharge.year,
	   incharge.intake,incharge.section,incharge.department 
	   FROM teacher,incharge 
	   WHERE teacher.code_name=incharge.code_name AND incharge.intake='$intake' AND incharge.section='$section' 
	   AND incharge.department='$department' ";
	   $result2 =$connection-> query($sql2);
/*echo $section ;
echo $intake;
echo $department;*/

//$row2 = $result2-> fetch_assoc();
?>
<div>
<form action="#" method="POST" class="container" enctype="multipart/form-data">
<h2 style="font-family:cambria math" align="center">My Incharge</h2>
<fieldset>
<?php
$row2 = $result2-> fetch_assoc();
?>
<img class="img-responsive" style="width:60%;" src="teacher_images/<?php  echo $row2["image"];?>">
</img><br>
<label for="t_name">Name: </label><?php echo $row2['t_name'];?><br> 

<label for="code_name">Code Name: </label><?php echo $row2['code_name'];?><br> 

<label for="email">E-mail: </label><?php echo $row2['email']; ?><br> 

<label for="room">Room No: </label><?php echo $row2['room']; ?><br> 

<label for="mobile">Mobile No: </label><?php echo $row2['mobile']; ?><br> 

<label for="designation">Designation: </label><?php echo $row2['designation']; ?><br> 

<label for="department">Department: </label><?php echo $row2['department']; ?><br> 
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
