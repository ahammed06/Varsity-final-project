<?php
 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}

if (!isset($_SESSION['semester'])) {
    header('Location: course_offer.php');
    exit();
}

$department=$_SESSION['department'];

?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">
<?php 
include "style15.php";
?>
</head>
<body>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">

</head>
<body>
<?php
include "admin_header.php";
?>
<div class="bg-img">
<hr>

<h1 align="center"><u><B>Course Registration</b></u></h1>

<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

$department=$_SESSION['department']; 

$sql= "select department,course_code,course_title,pre_req,credit from course
	   where department='$department' ORDER BY course_code ASC";
$result =$conn-> query($sql);
if($result->num_rows>0){
?>
<form action="co_of.php" method="post">
<table style="float:center; width:100%; padding-left:440px">
	<tr>
	
	<th>ADD</th>
	<th>Course code</th>
	<th>Course title</th>
	<th>Pre-Requisite</th>
	<th>Credit</th>
	</tr>
	
<?php 
	while($row=$result->fetch_assoc()){
		echo "<tr>";
		?>
		<td><input type="checkbox" name="add[]" value="<?php echo $row["course_code"]; ?>"></td>
		<?php
		echo "<td>".$row["course_code"]."</td>
		<td>".$row["course_title"]."</td>
		<td>".$row["pre_req"]."</td>
		<td>".$row["credit"]."</td>";
		?>

<?php
"</tr>";	}
	echo "</table>";

}

else{
	echo "0 result";
}
?>
<br>
<input type="submit" value="Submit" name="submit" class="button">

<?php

$conn->close();
?> 
</form>
<br>
<!--<div class="bottom">
<marquee direction="left">*** You can Submit only one time ***</marquee>
</div>-->
<br><br><br><br><br><br><br><br><br>
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</div>

</body>
</html>