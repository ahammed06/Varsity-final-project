<?php
session_start();
if (!isset($_SESSION['user2'])) {
    header('Location: teacher.php');
    exit();
}
//else{
//echo 'You have successfully logged as '.$_SESSION['user2'];
//}

if (isset($_SESSION['user2'])){$update_id = $_SESSION['user2'];}

$con=mysqli_connect('127.0.0.1','root','');
if(!$con)
{
	echo 'Not connected to server!!!';
}
if(!mysqli_select_db($con,'course_list'))
{
	echo 'Database not selected!!!';
}
if(isset($_GET['update'])){
	$id = $_GET['update'];

$sql1="SELECT s_name,year FROM semester";
	$result1 =$con-> query($sql1);
if($result1-> num_rows > 0){
while ($row1 = $result1-> fetch_assoc()){
$s_name=$row1["s_name"];
$year=$row1["year"];
}}

$sql2="SELECT * FROM receipt WHERE student_id='$id' AND semester='$s_name' AND year='$year'";
	$result2 =$con-> query($sql2);
if($result2-> num_rows > 0){
	$row = $result2-> fetch_assoc();
	$receipt=$row['receipt_no'];
	header("refresh:0; url=confirm_course_upd.php?update=$id&receipt=$receipt");
}
else{
	$message = "Not Registered!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
	header("refresh:0; url=stu_prof.php?id=$id");
}

}

else{
	$message = "Error!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
	header("refresh:0; url=stu_prof.php?id=$id");
}
?>
