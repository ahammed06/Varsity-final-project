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
$_SESSION['student_id'] = $_POST['student_id'];

header("refresh:0; url=up_stu.php");
}
elseif (isset($_POST['next1']))
{
$_SESSION['code_name'] = $_POST['code_name'];

header("refresh:0; url=up_teach.php");
}
elseif (isset($_POST['next2']))
{
$_SESSION['course_code'] = $_POST['course_code'];
$_SESSION['department'] = $_POST['department'];

header("refresh:0; url=up_cou.php");
}
elseif (isset($_POST['next3']))
{
$_SESSION['dept_code'] = $_POST['dept_code'];

header("refresh:0; url=edit_dept.php");
}
elseif (isset($_POST['next4']))
{
$_SESSION['semester'] = $_POST['semester'];
$_SESSION['year'] = $_POST['year'];
$_SESSION['intake'] = $_POST['intake'];
$_SESSION['section'] = $_POST['section'];
$_SESSION['department'] = $_POST['department'];

header("refresh:0; url=up_off.php");
}
elseif (isset($_POST['next5']))
{
$_SESSION['semester'] = $_POST['semester'];
$_SESSION['year'] = $_POST['year'];
$_SESSION['intake'] = $_POST['intake'];
$_SESSION['section'] = $_POST['section'];
$_SESSION['department'] = $_POST['department'];

header("refresh:0; url=up_inch.php");
}
else{
	header("refresh:0; url=update.php");
}
?>