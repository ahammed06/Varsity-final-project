<!--
in this file we write code for connection with database.
-->
<?php
$connection = mysqli_connect("localhost","root","","course_list");

if(!$connection)
{
	echo "Database connection failed...";
}
?>