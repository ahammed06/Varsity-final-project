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
$semester = $_SESSION['semester'];
$year = $_SESSION['year'];
$intake = $_SESSION['intake'];
$section = $_SESSION['section'];
$department = $_SESSION['department'];
$course_code=$_SESSION['course_code'];
$day1=$_POST['day1'];
$day2=$_POST['day2'];
$day3=$_POST['day3'];
$time1=$_POST['time1'];
$time2=$_POST['time2'];
$time3=$_POST['time3'];

$v=0;
$u=0;
$w=0;
$x=0;
$y=0;
$z=0;
$a=0;
$b=0;
$c=0;
$d=0;
	
	if(empty($day1)){
		if(!empty($time1)){
		$m= "Day1 Is Empty ...";
		echo "<script type='text/javascript'>alert('$m');</script>";
		$a=1;
		}
	}
	if(empty($day2)){
		if(!empty($time2)){
		$m= "Day2 Is Empty ...";
		echo "<script type='text/javascript'>alert('$m');</script>";
		$b=1;
		}
	}
	if(empty($day3)){
		if(!empty($time3)){
		$m= "Day3 Is Empty ...";
		echo "<script type='text/javascript'>alert('$m');</script>";
		$c=1;
		}
	}
		
	if(empty($day1)){
	if(empty($time1)){
	if(empty($day1)){
	if(empty($time1)){
	if(empty($day1)){
	if(empty($time1)){
		$d=1;
	}}}}}}

$sql3= "select course_code, day1, time1, day2, time2, day3, time3 from offer
	   where semester='$semester' AND year='$year' AND section='$section' AND intake='$intake' AND department='$department' AND NOT course_code='$course_code'";
		$result3 =$con-> query($sql3);
		if($result3->num_rows>0){
while ($row3 = $result3-> fetch_assoc()){
	
if(!empty($day1)){
$v=1;
	if(!empty($time1)){
		$v=0;
		
		if($day1.$time1==$row3['day1'].$row3['time1'])
	{
		$m= "Scedule $day1 $time1 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$x=1;
	break;
	}
	elseif($day1.$time1==$row3['day2'].$row3['time2'])
	{
		$m= "Scedule $day1 $time1 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$x=1;
	break;
	}
	elseif($day1.$time1==$row3['day3'].$row3['time3'])
	{
		$m= "Scedule $day1 $time1 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$x=1;
	break;
	}
	else{
	$x=0;
	}
}
}


if(!empty($day2)){
$u=1;
	if(!empty($time2)){
		$u=0;
		
		if($day2.$time2==$row3['day1'].$row3['time1'])
	{
		$m= "Scedule $day2 $time2 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$y=1;
	break;
	}
	elseif($day2.$time2==$row3['day2'].$row3['time2'])
	{
		$m= "Scedule $day2 $time2 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$y=1;
	break;
	}
	elseif($day2.$time2==$row3['day3'].$row3['time3'])
	{
		$m= "Scedule $day2 $time2 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$y=1;
	break;
	}
	else{
	$y=0;
	}
}
}


if(!empty($day3)){
$w=1;
	if(!empty($time3)){
		$w=0;
		
		if($day2.$time2==$row3['day1'].$row3['time1'])
	{
		$m= "Scedule $day2 $time2 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$z=1;
	break;
	}
	elseif($day2.$time2==$row3['day2'].$row3['time2'])
	{
		$m= "Scedule $day2 $time2 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$z=1;
	break;
	}
	elseif($day2.$time2==$row3['day3'].$row3['time3'])
	{
		$m= "Scedule $day2 $time2 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$z=1;
	break;
	}
	else{
	$z=0;
	}
}
}

		}}

if($d==1){
	$m= "No Schedule Entered ...";
		echo "<script type='text/javascript'>alert('$m');</script>";
header("refresh:1; url=up_routi.php");
}
	
if($v==1){
	$message = "Time 1 is empty!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=up_routi.php");
}

if($u==1){
	$message = "Time 2 is empty!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=up_routi.php");
}

if($w==1){
	$message = "Time 3 is empty!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=up_routi.php");
}

if($u==0 && $v==0 && $w==0 && $x==0 && $y==0 && $z==0 && $a==0 && $b==0 && $c==0 && $d==0)
{
$sql="UPDATE offer SET day1='$day1' , time1='$time1' , day2='$day2' , time2='$time2' , day3='$day3' , time3='$time3' WHERE semester='$semester' AND year='$year' AND intake='$intake' AND section='$section' AND department='$department' AND course_code='$course_code'";

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
header("refresh:1; url=up_routi.php");
}

else
{
	$message = "Failed!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:1; url=up_routi.php");
}


?>
