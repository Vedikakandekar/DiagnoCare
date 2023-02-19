<?php //delete record from student details admin
	session_start();
    include('db.php');
    $patho_emailid= $_SESSION["patho_emailid"];
    $patho_id= $_SESSION["patho_id"];
    $test_id=$_GET['test_id'];
   echo $patho_emailid;
   echo $patho_id;

 
	$res = mysqli_query($con ,"delete from test_details where test_id='$test_id'");
	header('location: availabletest.php');
?>