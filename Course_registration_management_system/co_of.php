<?php
 
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: admin.php');
    exit();
}

if (!isset($_SESSION['semester'])) {
    header('Location: course_offer.php');
    exit();
}


$semester = $_SESSION['semester'];
$year = $_SESSION['year'];
$intake = $_SESSION['intake'];
$section = $_SESSION['section'];
$department = $_SESSION['department'];

header('Cache-Control: max-age=900');

$department=$_SESSION['department'];

$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

if(isset($_POST["submit"]))
{
	

	$sum1=0;
	$credit_hour1=0;
	
	$sql8= "select offer.course_code, course.credit from offer,course
	   where offer.course_code=course.course_code AND offer.intake='$intake' AND offer.section='$section' AND offer.department='$department' AND offer.semester='$semester' AND offer.year='$year'";
$result8 =$conn-> query($sql8);
if($result8->num_rows>0){
while ($row8 = $result8-> fetch_assoc()){
$sum1+=$row8["credit"];
if($row8["credit"]<2)
{
	$hour1=$row8["credit"]*2;
}
else{
	$hour1=$row8["credit"];
}
$credit_hour1+=$hour1;

	}}
	else{
		$credit_hour1=0;
	}
	
	$sum=0;
	$credit_hour=0;
	foreach($_POST["add"] as $values){
		$values = explode(":", $values);
		$course_code = $values[0];
		
		$sql5= "select DISTINCT course_code, credit from course
	   where course_code='$course_code'";
$result5 =$conn-> query($sql5);
if($result5->num_rows>0){
while ($row5 = $result5-> fetch_assoc()){
$sum+=$row5["credit"];
if($row5["credit"]<2)
{
	$hour=$row5["credit"]*2;
}
else{
	$hour=$row5["credit"];
}
$credit_hour+=$hour;

	}}
	
	else{
		$credit_hour=0;
	}
	
	
	$total=$sum+$sum1;
	$total_credit_hour=$credit_hour+$credit_hour1;
	

$sql7= "select course_code from offer
	   where course_code='$course_code' AND intake='$intake' AND section='$section' AND department='$department' AND semester='$semester' AND year='$year'";
$result7 =$conn-> query($sql7);
$count3=mysqli_num_rows($result7);

if($count3>0){
	$m= "Already Requested For Course $course_code ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$v=0;
	break;
}
elseif($total>15){
	$m= "<h3>Credit Limit Exceeded ...</h3>";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$v=0;
	break;
}
elseif($total_credit_hour>24){
	$m= "<h3>Credit Hour Exceeded ...</h3>";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$v=0;
	break;
}
else{
	$v=1;
}
	}  	
	
	if($v==1){
		
		?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">

<?php 
include "style15.php";
?>
</head>
<body>
<?php
include "admin_header.php";
echo "$total";
?>
<div class="bg-img">
<hr>

<h1 align="center"><u><B>Confirm Course Offer</b></u></h1>

<form method="post">
<table style="float:center; width:100%; padding-left:440px">
	<tr>
	<th>Course code</th>
	<th>Course title</th>
	<th>Pre-Requisite</th>
	<th>Credit</th>
	<th>Schedule 1</th>
	<th>Schedule 2</th>
	<th>Schedule 3</th>
	<th>Add</th>
	</tr>
	
<?php
	foreach($_POST["add"] as $values){
		$values = explode(":", $values);
		$course_code = $values[0];
		
		$sql= "select course_code,course_title,pre_req,credit from course
	   where department='$department' AND course_code='$course_code' ORDER BY course_code ASC";
		$result =$conn-> query($sql);
		$row=$result->fetch_assoc();
		
		echo "<tr>
		<td>".$course_code."</td>
		<td>".$row["course_title"]."</td>
		<td>".$row["pre_req"]."</td>
		<td>".$row["credit"]."</td>";
		$sql1= "SELECT DISTINCT day from routine ORDER BY id ASC";

?>
<td><select class="form-control" id="catagory" name="day1<?php echo $row["course_code"]; ?>">';
<option value="">---Select Day---</option>
<?php

$result1 = $conn-> query($sql1);
if($result1-> num_rows > 0){
while ($row1 = $result1-> fetch_assoc()){
echo '<option value="'.$row1['day'].'">'.$row1['day'].'</option>';
}
echo '</select>';
}
else{
echo "0 result";}

$sql2= "SELECT DISTINCT time from routine ORDER BY id ASC";

?>
<select class="form-control" id="catagory" name="time1<?php echo $row["course_code"]; ?>">';
<option value="">---Select Time---</option>
<?php

$result2 = $conn-> query($sql2);
if($result2-> num_rows > 0){
while ($row2 = $result2-> fetch_assoc()){
echo '<option value="'.$row2['time'].'">'.$row2['time'].'</option>';
}
echo '</select></td>';
}
else{
echo "0 result";}

?>
<td><select class="form-control" id="catagory" name="day2<?php echo $row["course_code"]; ?>">';
<option value="">---Select Day---</option>
<?php

$result1 = $conn-> query($sql1);
if($result1-> num_rows > 0){
while ($row1 = $result1-> fetch_assoc()){
echo '<option value="'.$row1['day'].'">'.$row1['day'].'</option>';
}
echo '</select>';
}
else{
echo "0 result";}

?>
<select class="form-control" id="catagory" name="time2<?php echo $row["course_code"]; ?>">';
<option value="">---Select Time---</option>
<?php

$result2 = $conn-> query($sql2);
if($result2-> num_rows > 0){
while ($row2 = $result2-> fetch_assoc()){
echo '<option value="'.$row2['time'].'">'.$row2['time'].'</option>';
}
echo '</select></td>';
}
else{
echo "0 result";}

?>
<td><select class="form-control" id="catagory" name="day3<?php echo $row["course_code"]; ?>">';
<option value="">---Select Day---</option>
<?php

$result1 = $conn-> query($sql1);
if($result1-> num_rows > 0){
while ($row1 = $result1-> fetch_assoc()){
echo '<option value="'.$row1['day'].'">'.$row1['day'].'</option>';
}
echo '</select>';
}
else{
echo "0 result";}

?>
<select class="form-control" id="catagory" name="time3<?php echo $row["course_code"]; ?>">';
<option value="">---Select Time---</option>
<?php

$result2 = $conn-> query($sql2);
if($result2-> num_rows > 0){
while ($row2 = $result2-> fetch_assoc()){
echo '<option value="'.$row2['time'].'">'.$row2['time'].'</option>';
}
echo '</select></td>';
}
else{
echo "0 result";}
		
		
?>
<td><input type="checkbox" name="add[]" value="<?php echo $course_code; ?>" checked></td>
<?php
echo "</tr>";
		
	}
	echo "</table>";
	?>
<br>
<input type="submit" value="confirm" name="confirm" class="button">
</form>
<br>
<!--<div class="bottom">
<marquee direction="left">*** You can Submit only one time ***</marquee>
</div>-->
<br><br><br><br><br><br><br><br><br>
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</div>

</body>
</html>
<?php

	}
	else {
	$msg="Failed!!! $total";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:1; url=cou_off.php");
    //echo "Error: " . $sql4 . "<br>" . $conn->error;
	}


//check duplicate
/*$check="select course_code from stu_offer where student_id='$id'";
$result =$conn-> query($check);
while($row=$result->fetch_assoc()){
$code=$row['course_code'];
}	
$ps=mysqli_query($conn,$check);
$count=mysqli_num_rows($ps);
if($course_code==$code){
	$valid=0;
	$m= "Duplicate Submissions...";
	echo "<script type='text/javascript'>alert('$m');</script>";
}*/

}

if(isset($_POST["confirm"]))
{
if(isset($_POST["add"])){
	$a=1;
	$string="";
	foreach($_REQUEST["add"] as $values){
		
		$values = explode(" ", $values);
		$course_code = $values[0];
		$day1=$_POST['day1'.$course_code];
		$day2=$_POST['day2'.$course_code];
		$day3=$_POST['day3'.$course_code];
		$time1=$_POST['time1'.$course_code];
		$time2=$_POST['time2'.$course_code];
		$time3=$_POST['time3'.$course_code];
		
		$sql3= "select course_code, day1, time1, day2, time2, day3, time3 from offer
	   where semester='$semester' AND year='$year' AND section='$section' AND intake='$intake' AND department='$department'";
		$result3 =$conn-> query($sql3);
		if($result3->num_rows>0){
while ($row3 = $result3-> fetch_assoc()){
	if(!empty($day1)){
	if(!empty($time1)){
	if($day1.$time1==$row3['day1'].$row3['time1'])
	{
		$m= "Scedule $day1 $time1 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$u=0;
	break;
	}
	elseif($day1.$time1==$row3['day2'].$row3['time2'])
	{
		$m= "Scedule $day1 $time1 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$u=0;
	break;
	}
	elseif($day1.$time1==$row3['day3'].$row3['time3'])
	{
		$m= "Scedule $day1 $time1 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$u=0;
	break;
	}
	else{
	$u=1;
	}}}
	if(!empty($day2)){
	if(!empty($time2)){
	if($day2.$time2==$row3['day1'].$row3['time1'])
	{
		$m= "Scedule $day2 $time2 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$u=0;
	break;
	}
	elseif($day2.$time2==$row3['day2'].$row3['time2'])
	{
		$m= "Scedule $day2 $time2 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$u=0;
	break;
	}
	elseif($day2.$time2==$row3['day3'].$row3['time3'])
	{
		$m= "Scedule $day2 $time2 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$u=0;
	break;
	}
	else{
	$u=1;
	}}}
	if(!empty($day3)){
	if(!empty($time3)){
	if($day3.$time3==$row3['day1'].$row3['time1'])
	{
		$m= "Scedule $day3 $time3 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$u=0;
	break;
	}
	elseif($day3.$time3==$row3['day2'].$row3['time2'])
	{
		$m= "Scedule $day3 $time3 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$u=0;
	break;
	}
	elseif($day3.$time3==$row3['day3'].$row3['time3'])
	{
		$m= "Scedule $day3 $time3 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$u=0;
	break;
	}
	else{
	$u=1;
	}}}
	if(empty($day3) && empty($day2) && empty($day1) && empty($time3) && empty($time2) && empty($time1)){
		$u=1;
	}
		}}
		else{
			$u=1;
		}
		
	$sql7= "select course_code from offer
	   where course_code='$course_code' AND semester='$semester' AND year='$year' AND intake='$intake' AND section='$section' AND department='$department'";
$result7 =$conn-> query($sql7);
$count3=mysqli_num_rows($result7);

	if($count3>0){
	$m= "Already Requested For Course $course_code ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$a=0;
	break;
	}
	else{
		$a=1;
	}
	
$string .="$day1"."$time1"." "."$day2"."$time2"." "."$day3"."$time3 ";
	}
	
	$string = strtolower($string);
	$words = explode(" ", $string);
for($i = 0; $i < count($words); $i++) {  
    $count2 = 1;  
	if(strlen($words[$i])>5){
    for($j = $i+1; $j < count($words); $j++) {  
        if($words[$i] == $words[$j]) {  
            $count2++;  
            //Set words[j] to 0 to avoid printing visited word  
            $words[$j] = "0";  
        }  
    }  }
      
    //Displays the duplicate word if count is greater than 1  
    if($count2 > 1 && $words[$i] != "0"){  
		$msg="$words[$i] Duplicate Scedule!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		$w=0;
		break;
    }  
	else{
		$w=1;
	}
}
	
if($a==1 && $u==1 && $w==1){
	foreach($_REQUEST["add"] as $values){
		
		$values = explode(" ", $values);
		$course_code = $values[0];
		$day1=$_POST['day1'.$course_code];
		$day2=$_POST['day2'.$course_code];
		$day3=$_POST['day3'.$course_code];
		$time1=$_POST['time1'.$course_code];
		$time2=$_POST['time2'.$course_code];
		$time3=$_POST['time3'.$course_code];
		
	$sql1="INSERT INTO offer(semester,year,intake,section,department,course_code,day1,time1,day2,time2,day3,time3)
	       VALUES ('$semester','$year','$intake','$section','$department','$course_code','$day1','$time1','$day2','$time2','$day3','$time3')";
		   $result1 =$conn-> query($sql1) or die(mysql_error());
	}
		   if ($result1 === TRUE) {
        $msg="Successfully Submitted!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:1; url=course_offer.php");
		
} else {
	$msg="Failed!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:1; url=cou_off.php");
    //echo "Error: " . $sql4 . "<br>" . $conn->error;
}}
else {
	$msg="Failed!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:1; url=course_offer.php");
    //echo "Error: " . $sql4 . "<br>" . $conn->error;
}}
else {
	$msg="Empty!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:1; url=co_of.php");
    //echo "Error: " . $sql4 . "<br>" . $conn->error;
}}

$conn->close();
?>