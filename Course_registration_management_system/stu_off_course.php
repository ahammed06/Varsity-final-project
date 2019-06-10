<?php
session_start();
if (!isset($_SESSION['user1'])) {
    header('Location: student.php');
    exit();
}

else{
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
if (isset($_SESSION['user1'])){
	
	$id = $_SESSION['user1'];
	$sql2= "select student_id,intake,section,department from student WHERE `student_id` = $id";
$result2 = $conn-> query($sql2);	}

if (isset($_POST['next']))
{
$_SESSION['semester'] = $_POST['semester'];
$_SESSION['year'] = $_POST['year'];
$_SESSION['intake'] = $_POST['intake'];
$_SESSION['section'] = $_POST['section'];
$_SESSION['department'] = $_POST['department'];

header("refresh:0; url=Offered_courses.php");
}
else{
	header("refresh:0; url=stu_offered_courses.php");
}}

?>