<?php
session_start();
if(session_destroy()) {
	  session_unset();
	  ob_start();
      header("Location: student.php");
	  include 'student.php';
exit();
   }
?>