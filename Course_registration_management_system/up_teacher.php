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
include "style11.php";
?>
</head>

<body>
<?php
include "admin_header.php";
?>

<div class="bg-img">
<br><br><Br>
<form action="up_process.php" method="POST" class="container">
<h3 align="center">SEARCH TEACHER</h3>
<fieldset>
<label for="code_name">Code Name</label>
<input type="text" placeholder="Enter Code Name" name="code_name" required>


<button type="submit" class="btn" name="next1">Search</button>
</fieldset>
</form>
<br> 
</div>

<div class="footer">
  <ul><b>
  <li2><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li2>
</ul>
</div>

</body>
</html> 
