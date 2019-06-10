<?php
if(isset($_POST['submit']))	
{
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}

$delete_id = $_GET['profile'];

    $id=($_POST['student_id']);
	$old_password=($_POST['old_password']);
	$new_password=($_POST['new_password']);
	$repeat_password=($_POST['repeat_password']);
	
$sql= "select password from student WHERE `student_id` = $id";
$result = $conn-> query($sql);	
$row = $result-> fetch_assoc();

$password=$row['password'];

if($old_password==$password){
	if($new_password==$repeat_password)
	{
		$sql3="update student set password='$new_password' where student_id='$id'";
	        $result3 =$conn-> query($sql3);	
			$msg = ("Successfully Updated!!!");
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header("refresh:1; url=change_password.php?profile=$delete_id");
}
	}
	else
{
	$message = "Update Failed!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}

/*$password=filter_input(INPUT_POST, 'password');
//$department=filter_input(INPUT_POST, 'department');

if(isset($_GET['submit'])){		
		if(!empty($password)){
		if(preg_match('/^(?=.*\d)[0-9A-Za-z!@#$%]$/', $password))				
			 {
      $valid = 1;

      // your other code here
    }
    else // password is not valid
    {
		$valid = 0;
      echo 'Password invalid !';
    }
if(!empty($password)){
							$host="localhost";
							$dbusername="root";
							$dbpassword="";
							$dbname="course_list";
					    $con=new mysqli ($host, $dbusername, $dbpassword, $dbname);
						if(mysqli_connect_error()){
							die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
						}
	$delete_id = $_GET['submit'];
	$sql = "UPDATE `student` SET password='$password' WHERE `student_id` = $delete_id";
							
//check duplicate
$check_password="select password from student where password='$password'";
$ps=mysqli_query($con,$check_password);
$count2=mysqli_num_rows($ps);
if($count2>1){
	$m= "<h3>Duplicate Password ...</h3>";
	echo "<script type='text/javascript'>alert('$m');</script>";
}
if ($valid == 1) {
if($con->query($sql))
{
$msg = ("Successfully Updated!!!");
echo "<script type='text/javascript'>alert('$msg');</script>";
header("refresh:1; url=change_password.php?profile=$delete_id");
}
else
{
	$message = "Update Failed!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}
else
{
	$message = "Update Failed!!!";
echo "<script type='text/javascript'>alert('$message');</script>";
}
header("refresh:1; url=change_password.php?profile=$delete_id");
$con->close();
}}}*/
?>
