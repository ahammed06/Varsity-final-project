<?php
 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}

$con=mysqli_connect('127.0.0.1','root','');
if(!$con)
{
	echo 'Not connected to server!!!';
}
if(!mysqli_select_db($con,'course_list'))
{
	echo 'Database not selected!!!';
}

$sql4= "select DISTINCT s_name,year from semester";
$result4 =$con-> query($sql4);
if($result4-> num_rows > 0){
while ($row4 = $result4-> fetch_assoc()){
$semester=$row4["s_name"];
$year=$row4["year"];
}}

$code_name=$_POST['code_name'];
$intake=$_POST['intake'];
$section=$_POST['section'];
$department=$_POST['department'];

$valid=0;
if(!preg_match('/^[0-9]+$/', $intake)) // mobile is valid
    {
      $valid = 0;
      echo 'Intake invalid !';
      echo $intake;
      // your other code here
    }
	elseif(!preg_match('/^[0-9]+$/', $section)) // mobile is valid
    {
      $valid = 0;
      echo 'Section invalid !';
      // your other code here
    }
	elseif(!preg_match('/^[0-9]+$/', $year)) 
    {
      $valid = 0;
      echo 'Year invalid !';
      // your other code here
    }
    else // mobile is not valid
    {
		$valid = 1;
    }


$sql="insert into incharge VALUES('','$semester','$year','$code_name','$intake','$section','$department')";


if($valid==1){
if(!mysqli_query($con,$sql))
{
 $msg = "Insertion Failed!!!";
echo "<script type='text/javascript'>alert('$msg');</script>";
}
else
{
	$message = "Successfully Inserted!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
}
header("refresh:1; url=add_incharge.php");
}
else{
	$msg = "Insertion Failed!!!";
echo "<script type='text/javascript'>alert('$msg');</script>";
header("refresh:1; url=add_incharge.php");
}

?>
