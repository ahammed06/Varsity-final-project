<?php
session_start();
if (!isset($_SESSION['user1'])) {
    header('Location: student.php');
    exit();
}

header('Cache-Control: max-age=900');

$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
if (isset($_SESSION['user1'])){$id = $_SESSION['user1'];
	$sql2= "select student_id,intake,section,department from student WHERE `student_id` = $id";
$result2 = $conn-> query($sql2);
$row2 = $result2-> fetch_assoc();
$department=$row2["department"];	
}

$sql4= "select DISTINCT s_name,year from semester";
$result4 =$conn-> query($sql4);
if($result4-> num_rows > 0){
while ($row4 = $result4-> fetch_assoc()){
$semester=$row4["s_name"];
$year=$row4["year"];
}}

if(isset($_POST["submit"]))
{
	
	$sum1=0;
	$credit_hour1=0;
	
	$sql8= "select stu_offer.course_code, course.credit from stu_offer,course
	   where stu_offer.course_code=course.course_code AND stu_offer.student_id='$id' AND stu_offer.s_name='$semester' AND stu_offer.year='$year' AND (status='accepted' OR status='pending')";
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
	$string="";
	$string1="";
	$u=1;
	
	foreach($_POST["add"] as $values){
		$values = explode(" ", $values);
		$course_code = $values[0];
		$day1 = $values[1];
        $day2 = $values[2];
        $day3 = $values[3];
        $time1 = $values[4];
        $time2 = $values[5];
        $time3 = $values[6];
		$inta = $values[7];
        $secti = $values[8];
		
		$sql9= "select course_code, day1, time1, day2, time2, day3, time3 from stu_offer
	   where student_id='$id' AND s_name='$semester' AND year='$year' AND (status='accepted' OR status='pending')";
		$result9 =$conn-> query($sql9);
		if($result9->num_rows>0){
while ($row9 = $result9-> fetch_assoc()){
	if(!empty($day1)){
	if(!empty($time1)){
	if($day1.$time1==$row9['day1'].$row9['time1'])
	{
		$m= "Scedule $day1 $time1 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$u=0;
	break;
	}
	elseif($day1.$time1==$row9['day2'].$row9['time2'])
	{
		$m= "Scedule $day1 $time1 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$u=0;
	break;
	}
	elseif($day1.$time1==$row9['day3'].$row9['time3'])
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
	if($day2.$time2==$row9['day1'].$row9['time1'])
	{
		$m= "Scedule $day2 $time2 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$u=0;
	break;
	}
	elseif($day2.$time2==$row9['day2'].$row9['time2'])
	{
		$m= "Scedule $day2 $time2 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$u=0;
	break;
	}
	elseif($day2.$time2==$row9['day3'].$row9['time3'])
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
	if($day3.$time3==$row9['day1'].$row9['time1'])
	{
		$m= "Scedule $day3 $time3 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$u=0;
	break;
	}
	elseif($day3.$time3==$row9['day2'].$row9['time2'])
	{
		$m= "Scedule $day3 $time3 Already Booked ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$u=0;
	break;
	}
	elseif($day3.$time3==$row9['day3'].$row9['time3'])
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
		
		$sql5= "select course_code, credit from course
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
	
	$sql6= "select course_code from stu_offer
	   where course_code='$course_code' AND intake='$inta' AND section='$secti' AND s_name='$semester' AND year='$year' AND department='$department' AND (status='accepted' OR status='pending')";
$result6 =$conn-> query($sql6);
$count=mysqli_num_rows($result6);

$sql7= "select student_id,course_code from stu_offer
	   where student_id='$id' AND course_code='$course_code' AND s_name='$semester' AND year='$year' AND (status='accepted' OR status='pending')";
$result7 =$conn-> query($sql7);
$count3=mysqli_num_rows($result7);

if($count+1>40){
	$m= "Intake $inta, Section $secti Full for Course $course_code ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$v=0;
	break;
}
elseif($count3>0){
	$m= "Already Requested For Course $course_code ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$v=0;
	break;
}
elseif($total>15){
	$m= "Credit Limit Exceeded ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$v=0;
	break;
}
elseif($total_credit_hour>24){
	$m= "Credit Hour Exceeded ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$v=0;
	break;
}
else{
	$v=1;
}

$string .="$course_code ";
$string1 .="$day1"."$time1"." "."$day2"."$time2"." "."$day3"."$time3 ";
	}
	
	$string1 = strtolower($string1);
	$words1 = explode(" ", $string1);
for($i = 0; $i < count($words1); $i++) {  
    $count4 = 1;  
	if(strlen($words1[$i])>5){
    for($j = $i+1; $j < count($words1); $j++) {  
        if($words1[$i] == $words1[$j]) {  
            $count4++;  
            //Set words[j] to 0 to avoid printing visited word  
            $words1[$j] = "0";  
        }  
    }  }
      
    //Displays the duplicate word if count is greater than 1  
    if($count4 > 1 && $words1[$i] != "0"){  
		$msg="$words1[$i] Duplicate Scedule!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		$z=0;
		break;
    }  
	else{
		$z=1;
	}
}  	

	$string = strtolower($string);
	$words = explode(" ", $string);
for($i = 0; $i < count($words); $i++) {  
    $count2 = 1;  
    for($j = $i+1; $j < count($words); $j++) {  
        if($words[$i] == $words[$j]) {  
            $count2++;  
            //Set words[j] to 0 to avoid printing visited word  
            $words[$j] = "0";  
        }  
    }  
      
    //Displays the duplicate word if count is greater than 1  
    if($count2 > 1 && $words[$i] != "0"){  
		$msg="$words[$i] Duplicate Course!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		$w=0;
		break;
    }  
	else{
		$w=1;
	}
}  	
	
	if($v==1 && $u==1 && $w==1 && $z==1){
		
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
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">

</head>
<body>
<?php
include "stu_header.php";
?>
<div class="bg-img">
<hr>

<h1 align="center"><u><B>Course Registration</b></u></h1>

<form method="post">
<table style="float:center; width:100%; padding-left:440px">
	<tr>
	<th>Course code</th>
	<th>Intake</th>
	<th>Section</th>
	<th>Schedule 1</th>
	<th>Schedule 2</th>
	<th>Schedule 3</th>
	<th>Add</th>
	</tr>
	
<?php
	foreach($_POST["add"] as $values){
		$values = explode(" ", $values);
		$course_code = $values[0];
		$day1 = $values[1];
        $day2 = $values[2];
        $day3 = $values[3];
        $time1 = $values[4];
        $time2 = $values[5];
        $time3 = $values[6];
		$inta = $values[7];
        $secti = $values[8];
		
		echo "<tr>
		<td>".$course_code."</td>
		<td>".$inta."</td>
		<td>".$secti."</td>
		<td>".$day1." ".$time1."</td>
		<td>".$day2." ".$time2."</td>
		<td>".$day3." ".$time3."</td>";
		
		?>
<td><input type="checkbox" name="add[]" value="<?php echo $course_code; ?> <?php echo $day1; ?> <?php echo $day2; ?> <?php echo $day3; ?> <?php echo $time1; ?> <?php echo $time2; ?> <?php echo $time3; ?> <?php echo $inta; ?> <?php echo $secti; ?>" checked></td>
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
	$msg="Failed!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:1; url=see_previous.php");
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
	foreach($_POST["add"] as $values){
		$values = explode(" ", $values);
		$course_code = $values[0];
		$day1 = $values[1];
        $day2 = $values[2];
        $day3 = $values[3];
        $time1 = $values[4];
        $time2 = $values[5];
        $time3 = $values[6];
		$inta = $values[7];
        $secti = $values[8];
		
	$sql7= "select student_id,course_code from stu_offer
	   where student_id='$id' AND course_code='$course_code' AND s_name='$semester' AND year='$year' AND (status='accepted' OR status='pending')";
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
	}
if($a==1){
	foreach($_POST["add"] as $values){
		$values = explode(" ", $values);
		$course_code = $values[0];
		$day1 = $values[1];
        $day2 = $values[2];
        $day3 = $values[3];
        $time1 = $values[4];
        $time2 = $values[5];
        $time3 = $values[6];
		$inta = $values[7];
        $secti = $values[8];
		
	$sql1="INSERT INTO stu_offer(student_id,s_name,year,intake,section,department,course_code,day1,day2,day3,time1,time2,time3)
	       VALUES ('$id','$semester','$year','$inta','$secti','$department','$course_code','$day1','$day2','$day3','$time1','$time2','$time3')";
		   $result1 =$conn-> query($sql1) or die(mysql_error());
		   $valid=1;
	}
		   if ($result1 === TRUE) {
        $msg="Successfully Submitted!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:1; url=reg_status.php");
		
} else {
	$msg="Failed!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:1; url=see_previous.php");
    //echo "Error: " . $sql4 . "<br>" . $conn->error;
}}
else {
	$msg="Failed!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:1; url=reg_status.php");
    //echo "Error: " . $sql4 . "<br>" . $conn->error;
}}
else {
	$msg="Empty!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:1; url=see_previous.php");
    //echo "Error: " . $sql4 . "<br>" . $conn->error;
}}
	
$conn->close();
?> 