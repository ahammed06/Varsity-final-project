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
<br>
<div>
<form action="i_search.php" method="POST" class="container">
<h3 align="center">SEARCH INTAKE INCHARGE</h3>
<fieldset>
<label for="semester">Semester</label>
<select class="form-control" id="catagory" name="semester">
<option value="fall">Fall</option>
<option value="spring">Spring</option>
<option value="summer">Summer</option>
</select>

<label for="year">Year</label>
<input type="number" placeholder="Enter Year" name="year" min="2000" required>

<button type="search" name="next2" class="btn" value="search">Search</button>
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
