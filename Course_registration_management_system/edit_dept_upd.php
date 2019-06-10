<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
if (!isset($_SESSION['dept_code'])) {
    header('Location: edit_deptartment.php');
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
include "style2.php";
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$update_id = $_SESSION['dept_code'];
$sql= "select full_name,dept_code from department WHERE dept_code = '$update_id'";
$result = $conn-> query($sql);
?>
</head>

<body>
<?php
include "admin_header.php";
?>

<div class="bg-img">
<br><br>
<div>
<?php
while ($row = $result-> fetch_assoc()){

        ?>
<form action="department_updated.php" method="POST" class="container">
<h3 align="center">UPDATE DEPARTMENT INFORMATION</h3>
<fieldset>

<label for="dept_code">Department Code</label>
<input type="text" value="<?php echo $row['dept_code']; ?>" name="dept_code" required>

<label for="full_name">Department Title</label>
<input type="text" value="<?php echo $row['full_name']; ?>" name="full_name" required>

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
