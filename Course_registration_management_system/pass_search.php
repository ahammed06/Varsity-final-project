<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
//else{
//echo 'You have successfully logged as '.$_SESSION['user'];
//}
	
if (isset($_POST['s_search']))
{
$_SESSION['student_id'] = $_POST['student_id'];

header("refresh:0; url=student_search.php");
}
elseif (isset($_POST['t_search']))
{
$_SESSION['code_name'] = $_POST['code_name'];

header("refresh:0; url=teacher_search.php");
}
else{
	header("refresh:0; url=search_incharge.php");
}
?>