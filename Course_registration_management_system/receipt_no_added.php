<?php 
session_start();
if (!isset($_SESSION['user1'])) {
    header('Location: student.php');
    exit();
}

$con=mysqli_connect('127.0.0.1','root','');
if(!$con)
{
	echo 'Not connected to server!!!';
}
if(!mysqli_select_db($con,'course_list'))
{
	echo 'Database not selected!!!';
}

$sql= "SELECT s_name, year from semester";
$result = $con-> query($sql);
if($result-> num_rows > 0){
while ($row = $result-> fetch_assoc()){
$semester=$row['s_name'];
$year=$row['year'];
}
}

$student_id=$_SESSION['user1'];
$receipt_no=$_POST['receipt_no'];

$sql="insert into receipt VALUES('$student_id','$semester','$year','$receipt_no')";
//check duplicate 
$check_id="select student_id from receipt where student_id='$student_id' AND semester='$semester' AND year='$year'";
$student_id=mysqli_query($con,$check_id);
$count1=mysqli_num_rows($student_id);
if(!mysqli_query($con,$sql))
{
 $msg = "Insertion Failed!!!";
echo "<script type='text/javascript'>alert('$msg');</script>";
header("refresh:1; url=receipt_no.php");
}

elseif($count1>0){
	$m= "<h3>Duplicate Student ID ...</h3>";
	echo "<script type='text/javascript'>alert('$m');</script>";
	header("refresh:1; url=receipt_no.php");
}

else
{
	$message = "Successfully Inserted!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=course_registration.php");
}
?>

