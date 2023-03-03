<?php
session_start();
	include('db.php');
    $emailid= $_SESSION["emailid"];
	
	 $emailid = $_POST['emailid'];
    $password = $_POST['password'];
 $phno = $_POST['phno'];
 $addr = $_POST['addr'];
   
 if (!isset($_SESSION['emailid'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: index.html');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['emailid']);
    header("location: index.html");
}
	



 $update = mysqli_query($con," update user_login  set  emailid='$emailid', password='$password' , phno='$phno',addr='$addr' where phno='$phno' ");

    if(!$update)
    {
        echo mysqli_error($con);
    }
    else
    {
        echo "Records Updated  successfully of User.";
         header("location:userdashboard.php");
         
        
    }


mysqli_close($con); // Close connection
?>
