<?php 
session_start();
if (!isset($_SESSION['user2'])) {
    header('Location: teacher.php');
    exit();
}
else{
if (isset($_POST['next']))
{
$_SESSION['intake'] = $_POST['intake'];
$_SESSION['section'] = $_POST['section'];
$_SESSION['department'] = $_POST['department'];

header("refresh:0; url=teach_student_list.php");
}
else{
	header("refresh:0; url=teach_stu_incharge.php");
}}


//header('Cache-Control: max-age=900');
//else{
//echo 'You have successfully logged as '.$_SESSION['user2'];
//}
//header('Location: ' . $_SERVER["HTTP_REFERER"] );
//exit;
?>

