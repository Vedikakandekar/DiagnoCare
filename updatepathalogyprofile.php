<?php
session_start();
	include('db.php');
    $patho_emailid= $_SESSION["patho_emailid"];
	
	 $patho_name = $_POST['patho_name'];
    $patho_password = $_POST['patho_password'];
 $patho_phno = $_POST['patho_phno'];
 $patho_addr = $_POST['patho_addr'];
   
 
	



 $update = mysqli_query($con," update pathalogy_login  set  patho_name='$patho_name', patho_password='$patho_password' , patho_phno='$patho_phno',patho_addr='$patho_addr' where patho_emailid='$patho_emailid' ");

    if(!$update)
    {
        echo mysqli_error($con);
    }
    else
    {
        echo "Records Updated  successfully of User.";
         header("location:pathalogydashboard.php");
         
        
    }


mysqli_close($con); // Close connection
?>
