<?php

    session_start();
    include('db.php');
    $patho_emailid= $_SESSION["patho_emailid"];
    $patho_id= $_SESSION["patho_id"];
    $appointment_id=$_GET['appointment_id'];
    $emailid= $_SESSION["emailid"];
   
    
    $date = $_POST['date'];
    $appt= $_POST['appt'];
    
   




    $update = mysqli_query($con,"update user_appointment set time='$appt', date='$date' where appointment_id='$appointment_id'");


    if(!$update)
    {
        echo mysqli_error($con);
    }
    else
    {
        echo "Date/Time Successfully Updated for the respective appointment";
         header("location:appointmentdisplay.php");
         
        
    }


mysqli_close($con); // Close connection
?>
