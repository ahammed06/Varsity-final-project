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
include "style6.php";
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
if (isset($_SESSION['user2'])){$update_id = $_SESSION['user2'];}
$sql= "select t_name,code_name,gender,email,mobile,room,designation,department,image from teacher WHERE id = '$update_id'";
$result = $conn-> query($sql);
?>
</head>

<body>
<div class="header" id="myHeader">
  <img src="images/BUBT-LOGO-1_01.png" width="300" height="120">
  <ul><b>
  <li><a href="t_my_profile.php">My Profile</a></li>
  <li><a href="confirm_course.php">Course Confirmation</a></li>
  <li><a href="accept_course.php">Accepted Course Request</a></li>
  <li><a href="teach_student_list.php">Incharged Student List</a></li>
  <li><a href="teach_off_course.php">Offered Course List</a></li>
  <li1><a href="logout2.php">Logout</a></li1></b>
</ul>

</div>
<hr>

<div class="bg-img">
<div>
<?php
while ($row = $result-> fetch_assoc()){

        ?>
<form action="teacher_profile_updated.php" method="POST" class="container" enctype="multipart/form-data">
<h3 align="center">UPDATE TEACHER INFORMATION</h3>
<fieldset>
<label for="t_name">Name</label>
<input type="text" value="<?php echo $row['t_name']; ?>" name="t_name" required>

<label for="email">E-mail</label>
<input type="email" value="<?php echo $row['email']; ?>" name="email" required>

<label for="mobile">Mobile No.</label>
<input type="tel" value="<?php echo $row['mobile']; ?>" name="mobile" pattern="[0-9]{11}" required>


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
