<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
//else{
//echo 'You have successfully logged as '.$_SESSION['user'];
//}
	
if (isset($_POST['id']))
{
$_SESSION['student_id'] = $_POST['student_id'];

header("refresh:0; url=s_id_search.php");
}
elseif (isset($_POST['sec']))
{
$_SESSION['intake'] = $_POST['intake'];
$_SESSION['section'] = $_POST['section'];
$_SESSION['department'] = $_POST['department'];

header("refresh:0; url=s_sec_search.php");
}
else{
	header("refresh:0; url=search_student.php");
}
?>