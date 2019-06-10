<?php
session_start();
session_destroy();
session_unset();
$_SESSION = array();
header("location: teacher.php");
?>