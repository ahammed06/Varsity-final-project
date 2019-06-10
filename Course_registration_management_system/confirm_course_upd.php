<?php
session_start();
if (!isset($_SESSION['user2'])) {
    header('Location: teacher.php');
    exit();
}

header('Cache-Control: max-age=900');

$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
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
include "teach_header.php";
?>
<div class="bg-img">
<hr>

<h1 align="center"><u><B>Add Course</b></u></h1>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
if(isset($_GET['update'])){
	
	$id = $_GET['update'];
	$sql2= "select student_id,intake,section,department from student WHERE `student_id` = $id";
$result2 = $conn-> query($sql2);	

$row2 = $result2-> fetch_assoc();
$stu_id=$row2['student_id'];
$int=$row2['intake'];
$section=$row2['section'];
$department=$row2['department'];
}
$sql4= "select DISTINCT s_name,year from semester";
$result4 =$conn-> query($sql4);
if($result4-> num_rows > 0){
while ($row4 = $result4-> fetch_assoc()){
$semester=$row4["s_name"];
$year=$row4["year"];
?>
<h2 align="center"><u><B><?php echo strtoupper($row4['s_name'])?> <?php echo $row4['year']?></b></u></h2>

<?php
$sql2= "select DISTINCT department from offer WHERE semester='$semester' AND year='$year' ORDER BY department ASC,year DESC,semester DESC,intake DESC,section ASC";
$result2 =$conn-> query($sql2);
if($result2-> num_rows > 0){
while ($row2 = $result2-> fetch_assoc()){
$department=$row2["department"];
?>

<?php
$sql5= "select DISTINCT intake from offer WHERE intake>='$int' AND semester='$semester' AND year='$year' AND department='$department' ORDER BY department ASC,year DESC,semester DESC,intake ASC,section ASC";
$result5 =$conn-> query($sql5);
if($result5-> num_rows > 0){
while ($row5 = $result5-> fetch_assoc()){
$intake=$row5["intake"];
?>

<h4 align="center" style="font-size:18px;"><u><B>Intake <?php echo $row5['intake']; ?></b></u></h4>

<?php
$sql3= "select DISTINCT section from offer WHERE intake>='$intake' AND semester='$semester' AND year='$year' AND department='$department' AND intake='$intake' ORDER BY department ASC,year DESC,semester DESC,intake DESC,section ASC";
$result3 =$conn-> query($sql3);
if($result3-> num_rows > 0){
while ($row3 = $result3-> fetch_assoc()){
$section=$row3["section"];
?>
<h4 align="center" style="font-size:18px;"><u><B>Section <?php echo $row3['section']; ?></b></u></h4>

<p align="center"><u><B><a href="see_teacher_routine.php?semester=<?php echo $semester; ?>&year=<?php echo $year; ?>&section=<?php echo $section; ?>&intake=<?php echo $intake; ?>&department=<?php echo $department; ?>" class="btn btn-danger">See Current Routine</a></b></u></p>
<br>

<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$sql= "select offer.semester, offer.year,offer.intake,offer.section,offer.department,offer.course_code,offer.day1,offer.day2,offer.day3,offer.time1,offer.time2,offer.time3, 
	   course.course_title,course.pre_req,course.credit from course,offer 
	   where offer.course_code=course.course_code AND offer.department='$department' AND offer.intake='$intake' 
	   AND offer.semester='$semester' AND offer.year='$year' AND offer.section='$section' AND course.department=offer.department
	   ORDER BY department ASC,year DESC,semester DESC,intake DESC,section ASC,course_code ASC";
$result =$conn-> query($sql);
if($result->num_rows>0){
?>
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
	<th>ADD</th>
	</tr>
	
<?php 
	while($row=$result->fetch_assoc()){
		echo "<tr>
		<td>".$row["course_code"]."</td>
		<td>".$row["course_title"]."</td>
		<td>".$row["pre_req"]."</td>
		<td>".$row["credit"]."</td>
		<td>".$row["day1"]." ".$row["time1"]."</td>
		<td>".$row["day2"]." ".$row["time2"]."</td>
		<td>".$row["day3"]." ".$row["time3"]."</td>";
?>
<td><input type="checkbox" name="add[]" value="<?php echo $row["course_code"]; ?> <?php echo $row["day1"]; ?> <?php echo $row["day2"]; ?> <?php echo $row["day3"]; ?> <?php echo $row["time1"]; ?> <?php echo $row["time2"]; ?> <?php echo $row["time3"]; ?> <?php echo $row["intake"]; ?> <?php echo $row["section"]; ?>" ></td>
<?php
"</tr>";	}
	echo "</table>";

}}}}}}}

else{
	echo "0 result";
}}}
?>
<br>
<input type="submit" value="Submit" name="submit" class="button">

<?php
if(isset($_POST["submit"]))
{
	/*
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
	
	$sum=0;
	$credit_hour=0;
	*/
	
	$string="";
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
		
		/*
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
	
	
	$total=$sum+$sum1;
	$total_credit_hour=$credit_hour+$credit_hour1;
	
	$sql6= "select course_code from stu_offer
	   where course_code='$course_code' AND intake='$inta' AND section='$secti' AND s_name='$semester' AND year='$year' AND department='$department' AND (status='accepted' OR status='pending')";
$result6 =$conn-> query($sql6);
$count=mysqli_num_rows($result6);

*/

$sql7= "select student_id,course_code from stu_offer
	   where student_id='$id' AND course_code='$course_code' AND s_name='$semester' AND year='$year' AND (status='accepted' OR status='pending')";
$result7 =$conn-> query($sql7);
$count3=mysqli_num_rows($result7);

/*
if($count+1>40){
	$m= "Intake $inta, Section $secti Full for Course $course_code ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$v=0;
	break;
}
else*/if($count3>0){
	$m= "Already Requested For Course $course_code ...";
	echo "<script type='text/javascript'>alert('$m');</script>";
	$v=0;
	break;
}
/*
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
*/
else{
	$v=1;
}

$string .="$course_code ";

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
	
	if($v==1 /*&& $u==1 */&& $w==1){
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
		
	$sql4="INSERT INTO stu_offer(student_id,s_name,year,intake,section,department,course_code,day1,day2,day3,time1,time2,time3,status)
	       VALUES ('$id','$semester','$year','$inta','$secti','$department','$course_code','$day1','$day2','$day3','$time1','$time2','$time3','accepted')";
		   $result4 =$conn-> query($sql4) or die(mysql_error());
		   $valid=1;
	}	  
	if ($result4 === TRUE) {
        $msg="Successfully Submitted!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		
} else {
	$msg="Failed!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
    //echo "Error: " . $sql4 . "<br>" . $conn->error;
	}}
	else {
	$msg="Failed!!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
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
$conn->close();
?> 
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