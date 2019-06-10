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
$_SESSION['code_name'] = $_POST['code_name'];

header("refresh:0; url=t_code_search.php");
}
elseif (isset($_POST['dep']))
{
$_SESSION['department'] = $_POST['department'];

header("refresh:0; url=t_department_search.php");
}
elseif (isset($_POST['des']))
{
$_SESSION['designation'] = $_POST['designation'];

header("refresh:0; url=t_designation_search.php");
}
else{
	header("refresh:0; url=search_teacher.php");
}
?>