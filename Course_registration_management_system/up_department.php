<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
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
include "style5.php";
?>
</head>
<STYLE></STYLE>
<body>
<?php
include "admin_header.php";
?>

<div class="body">
<br><br><br><br><br><br>
<h2>Update Department Information</h2>
<div class="menu">
<div class="btn"><a href="add_department.php">Add Department</a></div>
<div class="btn"><a href="remove_department.php">Remove Department</a></div>
<div class="btn"><a href="edit_department.php">Edit Department</a></div>
</div>
</div>
<div class="footer">
  <ul><b>
  <li2><c>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</c></li2>
</ul>
</div>
</body>
</html>
