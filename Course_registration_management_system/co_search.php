<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
//else{
//echo 'You have successfully logged as '.$_SESSION['user'];
//}
	
if (isset($_POST['code']))
{
$_SESSION['course_code'] = $_POST['course_code'];

header("refresh:0; url=c_code_search.php");
}
elseif (isset($_POST['dep']))
{
$_SESSION['department'] = $_POST['department'];

header("refresh:0; url=c_department_search.php");
}
else{
	header("refresh:0; url=search_course.php");
}
?>