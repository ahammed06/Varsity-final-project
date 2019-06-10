<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}
else{
if (isset($_POST['next']))
{
$_SESSION['department'] = $_POST['department'];

header("refresh:0; url=course_searched.php");
}
else{
	header("refresh:0; url=course_search.php");
}}


//header('Cache-Control: max-age=900');
//else{
//echo 'You have successfully logged as '.$_SESSION['user'];
//}
//header('Location: ' . $_SERVER["HTTP_REFERER"] );
//exit;
?>

