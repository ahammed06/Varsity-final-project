<style>
.notification {
  color: white;
  text-decoration: none;
  padding: 10px 16px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.notification:hover {
  background-color: #A9A9A9;
}

.notification .badge {
  position: absolute;
  top: -8px;
  right: -8px;
  padding: 5px 10px;
  border-radius: 50%;
  background: red;
  color: white;
}
</style>

<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

if (isset($_SESSION['user1'])){$profile = $_SESSION['user1'];}

$sql15="SELECT s_name,year FROM semester";
	$result15 =$conn-> query($sql15);
if($result15-> num_rows > 0){
while ($row15 = $result15-> fetch_assoc()){
$s=$row15["s_name"];
$y=$row15["year"];
}}

$sql16= "select seen from stu_offer WHERE seen = '0' AND student_id='$profile' AND s_name='$s' AND year='$y' AND (status='accepted' OR status='rejected' OR status='dropped')";
$result16 =$conn-> query($sql16);
$count16=mysqli_num_rows($result16);
?>

<div class="header" id="myHeader">
  <img src="images/BUBT-LOGO-1_01.png" width="300" height="120">
  <ul><b>
  <li><a href="student_profile.php">My Profile</a></li>
  <li><a href="reg.php">Course Registration</a></li>
  
  <?php
  if($count16>0){
	  ?>
  <li><a href="reg_status.php" class="notification">
  <span>Registration Status</span>
  <span class="badge"><?php echo $count16; ?></span>
</a></li>
<?php
  }
  else{
	  ?>
  <li><a href="reg_status.php">Registration Status</a></li>
  <?php
  }
  ?>
  
  <li><a href="see_student_routine.php">Routine</a></li>
  <li><a href="stu_offered_courses.php">Offered Courses</a></li>
  <li><a href="stu_course_list.php">All Courses</a></li>
  <li><a href="stu_incharge.php">My Incharge</a></li>
  <?php
  $sql17= "select * from receipt
	   where student_id='$profile' AND semester='$s' AND year='$y'";
	$result17 = mysqli_query($conn, $sql17); 
	if($result17-> num_rows > 0){	
      ?>
	  <li><a href="Complete_Courses.php">Payment Info</a></li>
	  <?php
	  }
	?>
  
  <li><a href="change_password.php">Change Password</a></li>
  <li1><a href="logout.php">Logout</a></li1></b>
</ul>
</div>