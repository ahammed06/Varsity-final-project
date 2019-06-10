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
if (isset($_SESSION['user2'])){$profile = $_SESSION['user2'];}
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
$sql11="SELECT s_name,year FROM semester";
	$result11 =$conn-> query($sql11);
if($result11-> num_rows > 0){
while ($row11 = $result11-> fetch_assoc()){
$s=$row11["s_name"];
$y=$row11["year"];
}}

$sql12= "select code_name from teacher WHERE id = '$profile'";
$result12 =$conn-> query($sql12);
if($result12-> num_rows > 0){
while ($row12 = $result12-> fetch_assoc()){
$code_name=$row12["code_name"];

$sql13= "select code_name,semester,year,section,intake,department from incharge WHERE code_name = '$code_name' AND year='$y' AND semester='$s'";
$result13 =$conn-> query($sql13);
if($result13-> num_rows > 0){
while ($row13 = $result13-> fetch_assoc()){
$sem=$row13["semester"];
$yea=$row13["year"];
$sec=$row13["section"];
$int=$row13["intake"];
$dep=$row13["department"];

$sql14= "select DISTINCT stu_offer.student_id, stu_offer.status from stu_offer,student WHERE stu_offer.student_id=student.student_id AND stu_offer.s_name='$sem' AND student.section='$sec'
	   AND stu_offer.year='$yea' AND stu_offer.department='$dep' AND student.intake='$int' AND stu_offer.status='pending'";
$result14 =$conn-> query($sql14);
$count11=mysqli_num_rows($result14);
}}}}
?>



<div class="header" id="myHeader">
  <img src="images/BUBT-LOGO-1_01.png" width="300" height="120">
  <ul><b>
  <li><a href="t_my_profile.php">My Profile</a></li>
  
  <?php
  if($count11>0){
	  ?>
  <li><a href="confirm_course.php" class="notification">
  <span>Course Confirmation</span>
  <span class="badge"><?php echo $count11; ?></span>
</a></li>
<?php
  }else{
	  ?>
  <li><a href="confirm_course.php">Course Confirmation</a></li>
  <?php
  }
  ?>
  
  <li><a href="accept_course.php">Accepted Course Request</a></li>
  <li><a href="teach_stu_incharge.php">Incharged Student List</a></li>
  <li><a href="teach_off_course.php">Offered Course List</a></li>
  <li1><a href="logout2.php">Logout</a></li1></b>
</ul>
</div>