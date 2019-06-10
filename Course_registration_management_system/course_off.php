<?php
 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
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

$sql4= "select DISTINCT s_name,year from semester";
$result4 =$con-> query($sql4);
if($result4-> num_rows > 0){
while ($row4 = $result4-> fetch_assoc()){
$semester=$row4["s_name"];
$year=$row4["year"];
}}

$_SESSION['semester']=$semester;
$_SESSION['year']=$year;
$_SESSION['intake']=$_POST['intake'];
$_SESSION['section']=$_POST['section'];
$_SESSION['department']=$_POST['department'];

header("refresh:0; url=cou_off.php");

?>

