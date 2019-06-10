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
include "style16.php";
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
if (isset($_SESSION['user1'])){$update_id = $_SESSION['user1'];}
$sql2= "select student_id,name,email,mobile,department,image from student WHERE student_id = '$update_id'";
$result2 = $conn-> query($sql2);
?>
</head>

<body>
<?php
include "stu_header.php";
?>
<hr>

<div class="bg-img">
<div>

<form action="receipt_no_added.php" method="POST" class="container">
<h3 align="center">Submit Receipt No.</h3>
<fieldset>
<label for="student_id">Student ID : <?php echo $update_id ?></label>
<br>
<br>

<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$sql= "SELECT s_name, year from semester";
$result = $conn-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
$s_name=$row['s_name'];
$year=$row['year'];
}
}
else{
echo "0 result";}
?>

<label for="semester">Current Semester : <?php echo $s_name ?> <?php echo $year ?></label>
<br>
<br>

<label for="receipt_no">Enter Receipt No.</label>
<input type="text" placeholder="Enter Receipt No." name="receipt_no" required>

<button type="submit" class="btn" value="submit">Submit</button>
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
