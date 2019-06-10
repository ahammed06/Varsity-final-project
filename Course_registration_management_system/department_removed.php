<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}

if(isset($_POST['update']))
{
    
   $hostname = "localhost";
   $username = "root";
   $password = "";
   $databaseName = "course_list";
   
   $connect = mysqli_connect($hostname, $username, $password, $databaseName);
   
   // get values form input text and number
   
   $dept_code = $_POST['dept_code'];
           
   // mysql query to Update data
   $query = "DELETE FROM department WHERE dept_code = '$dept_code'";
   $query1 = "DELETE FROM student WHERE deptartment = '$dept_code'";
   $query2 = "DELETE FROM teacher WHERE deptartment = '$dept_code'";
   $query3 = "DELETE FROM course WHERE deptartment = '$dept_code'";
   $query4 = "DELETE FROM incharge WHERE deptartment = '$dept_code'";
   $query5 = "DELETE FROM offer WHERE deptartment = '$dept_code'";
   
   $result = mysqli_query($connect, $query);
   $result1 = mysqli_query($connect, $query1);
   $result2 = mysqli_query($connect, $query2);
   $result3 = mysqli_query($connect, $query3);
   $result4 = mysqli_query($connect, $query4);
   $result5 = mysqli_query($connect, $query5);
   
if($result || $result1 || $result2 || $result3 || $result4 || $result5)
   {
       $m="Department Deleted!!!";
	   echo "<script type='text/javascript'>alert('$m');</script>";
	   header("refresh:1; url=remove_department.php");
   }else{
       $m= "Department Not deleted!!!";
	   echo "<script type='text/javascript'>alert('$m');</script>";
	   header("refresh:1; url=remove_department.php");
   }
   mysqli_close($connect);
}

?>