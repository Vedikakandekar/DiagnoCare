<?php //delete record from student details admin
	session_start();
    include('db.php');
    $patho_emailid= $_SESSION["patho_emailid"];
    $patho_id= $_SESSION["patho_id"];
    $appointment_id=$_GET['appointment_id'];
    $emailid= $_SESSION["emailid"];
   echo $patho_emailid;
   echo $patho_id;
   echo $emailid;

 
	mysqli_query($con,"delete from user_appointment where appointment_id='$appointment_id'");
	header('location: appointmentdisplay.php');
?>