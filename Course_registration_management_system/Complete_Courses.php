<?php
session_start();
if (!isset($_SESSION['user1'])) {
    header('Location: student.php');
    exit();
}
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
if (isset($_SESSION['user1'])){$id = $_SESSION['user1'];
	$sql7= "select * from student WHERE student_id = $id";
$result7 = $conn-> query($sql7);
//echo $id;
}

$sql4= "select DISTINCT s_name,year from semester";
$result4 =$conn-> query($sql4);
if($result4-> num_rows > 0){
while ($row4 = $result4-> fetch_assoc()){
$semester=$row4["s_name"];
$year=$row4["year"];
}}

function fetch_data()  
 {  
      $output = '';
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}	  
      if (isset($_SESSION['user1'])){$id = $_SESSION['user1'];
	$sql7= "select * from student WHERE student_id = $id";
$result7 = $conn-> query($sql7);
$row7 = $result7-> fetch_assoc();
$department=$row7["department"];	
//echo $id;
}

$sql4= "select DISTINCT s_name,year from semester";
$result4 =$conn-> query($sql4);
if($result4-> num_rows > 0){
while ($row4 = $result4-> fetch_assoc()){
$semester=$row4["s_name"];
$year=$row4["year"];
}}

$total=0;
$sql= "select stu_offer.course_code,stu_offer.intake,stu_offer.section, course.credit from stu_offer,course
	   where stu_offer.course_code=course.course_code AND stu_offer.student_id='$id' AND stu_offer.department=course.department AND stu_offer.s_name='$semester' AND stu_offer.year='$year' AND status='accepted'";
	$result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {

		$payment=$row["credit"]*1440;
		
      $total+=$payment;
      }
  
      $sql= "select stu_offer.course_code,stu_offer.intake,stu_offer.section, course.credit from stu_offer,course
	   where stu_offer.course_code=course.course_code AND stu_offer.student_id='$id' AND stu_offer.department=course.department AND stu_offer.s_name='$semester' AND stu_offer.year='$year' AND status='accepted'";
	$result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {

		$payment=$row["credit"]*1440;
		
      $output .= '<tr>  
                          <td>'.$row["course_code"].'</td>  
                          <td>'.$row["credit"].'</td>  
                          <td>'.$row["intake"].'</td>  
                          <td>'.$row["section"].'</td>  
                          <td>'.$payment.'-/tk</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
 }
 
 if(isset($_POST["create_pdf"]))  
 {  

$total=0;
$sql= "select stu_offer.course_code,stu_offer.intake,stu_offer.section, course.credit from stu_offer,course
	   where stu_offer.course_code=course.course_code AND stu_offer.student_id='$id' AND stu_offer.department=course.department AND stu_offer.s_name='$semester' AND stu_offer.year='$year' AND status='accepted'";
	$result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {

		$payment=$row["credit"]*1440;
		
      $total+=$payment;
      }
	  
	  $sql1= "select * from student
	   where student_id='$id'";
	$result1 = mysqli_query($conn, $sql1);  
      while($row1 = mysqli_fetch_array($result1))  
      {

		$name=$row1["name"];
		$int=$row1["intake"];
		$sec=$row1["section"];
      }
	  
	  $sql2= "select * from receipt
	   where student_id='$id' AND semester='$semester' AND year='$year'";
	$result2 = mysqli_query($conn, $sql2);  
      while($row2 = mysqli_fetch_array($result2))  
      {

		$receipt=$row2["receipt_no"];
      }
	  
	  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$rcpt = substr( str_shuffle( $chars ), 0, 14 );
	  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Payment Info");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h1 align="center"><img src="images/BUBT-LOGO-1_01.png" width="120" height="50"></h1>
	  <font size="6" align="right">'.$rcpt.'</font>
	  <h1 align="center"><u>Payment Info</u></h1>
      
      <p>NAME : '.strtoupper($name).'</p>  
      <p>ID : '.$id.'</p>
      <p>INTAKE : '.$int.'</p>
      <p>SECTION : '.$sec.'</p>  
      <p>RECEIPT NO : '.$receipt.'</p>  
      <h1 align="center">'.strtoupper($semester).' '.$year.'</h1><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>
<th bgcolor=#99ffb9>Course Code</th>
<th bgcolor=#99ffb9>Course Credit</th>
<th bgcolor=#99ffb9>Intake</th>
<th bgcolor=#99ffb9>Section</th>
<th bgcolor=#99ffb9>Payment</th>

</tr>
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $content .= '<div style="text-align:right">Total = '.$total.'-/tk</div>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('Payment info.pdf', 'I');  
 }  
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUBT Course Registration</title>
<link rel="icon" href="images/BUBT-Logo.png" type="logo/png" sizes="16x16">

</head>

<body>
<?php
include "style19.php";
include "stu_header.php";
?>
<div class="bg-img">
<hr>
<h1 align="center"><u><B>COURSE LIST</b></u></h1>
<h2 align="center"><B><?php echo strtoupper($semester); ?> <?php echo $year; ?></b></h2>
<?php
$conn= mysqli_connect("localhost", "root", "", "course_list");
if($conn-> connect_error){
die("connection failed".$conn-> connect_error);
}
?>
<table style="float:center; width:100%; padding-left:440px;">
<tr>
<th bgcolor=#99ffb9>Course Code</th>
<th bgcolor=#99ffb9>Course Credit</th>
<th bgcolor=#99ffb9>Intake</th>
<th bgcolor=#99ffb9>Section</th>
<th bgcolor=#99ffb9>Payment</th>

</tr>
<?php  
                     echo fetch_data();  
					 
					 $total=0;
$sql= "select stu_offer.course_code,stu_offer.intake,stu_offer.section, course.credit from stu_offer,course
	   where stu_offer.course_code=course.course_code AND stu_offer.student_id='$id' AND stu_offer.department=course.department AND stu_offer.s_name='$semester' AND stu_offer.year='$year' AND status='accepted'";
	$result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {

		$payment=$row["credit"]*1440;
		
      $total+=$payment;
      }
	  
                     ?>  
					 <tr>  
                          <td class="no-border"> </td>  
                          <td class="no-border"> </td>  
                          <td class="no-border"> </td>  
                          <td class="no-border"> </td>  
                          <td class="no-border">Total : <?php echo $total; ?>-/tk</td>  
                     </tr> 
</table>
<br />  
                     <form method="post">  
<div style="text-align:center">
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
</div>
                     </form>
<br><br><br><br>
<?php
$conn-> close();
?>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</div>
<div class="footer">
  <ul><b>
  <li3><a>Bangladesh University of Business and Technology, Rupnagar R/A, Mirpur-2, Dhaka-1216, Phone: 01967169189. 2018 &#169; All Right Reserved, BUBT</a></li3>
</ul>
</div>
</body>
</html>