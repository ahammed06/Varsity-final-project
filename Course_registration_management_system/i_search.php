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
$_SESSION['code_name'] = $_POST['code_name'];

header("refresh:0; url=i_teacher_search.php");
}
elseif (isset($_POST['next1']))
{
$_SESSION['department'] = $_POST['department'];
$_SESSION['intake'] = $_POST['intake'];
$_SESSION['section'] = $_POST['section'];

header("refresh:0; url=i_intake_search.php");
}
elseif (isset($_POST['next2']))
{
$_SESSION['semester'] = $_POST['semester'];
$_SESSION['year'] = $_POST['year'];

header("refresh:0; url=i_semester_search.php");
}
else{
	header("refresh:0; url=search_incharge.php");
}
?>