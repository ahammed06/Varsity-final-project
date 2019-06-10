<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
//else{
//echo 'You have successfully logged as '.$_SESSION['user'];
//}
	
if (isset($_POST['next']))
{
$_SESSION['semester'] = $_POST['semester'];
$_SESSION['year'] = $_POST['year'];

header("refresh:0; url=o_semester_search.php");
}
elseif (isset($_POST['next1']))
{
$_SESSION['department'] = $_POST['department'];
$_SESSION['intake'] = $_POST['intake'];
$_SESSION['section'] = $_POST['section'];

header("refresh:0; url=o_intake_search.php");
}
elseif (isset($_POST['next2']))
{
$_SESSION['course_code'] = $_POST['course_code'];

header("refresh:0; url=o_code_search.php");
}
else{
	header("refresh:0; url=search_offered_course.php");
}
?>