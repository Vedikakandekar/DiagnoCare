<?php 
session_start();
if (!isset($_SESSION['patho_emailid'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: index.html');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['patho_emailid']);
  header("location: index.html");
}
?>
<html>
<head>
<link rel="stylesheet" href="css/pathalogydashboard.css">
</head>
<body>

<?php
$con = mysqli_connect("localhost:3306","root","","odlms")or die("Connection lost");

$patho_id=$_SESSION['patho_id'];
$res = mysqli_query($con,"select * from pathalogy_login where patho_id = $patho_id ");
foreach($res as $row){

?>

<div class="dashboard"><ul>
    
        <li><a href="pathalogyprofile.php">My Profile</a></li>
        <li><a href="testregistration.php">Register Tests</a></li>
        <li><a href="availabletest.php">Available Tests</a></li>
          <li><a href="pathAppointments.php">Appointments</a></li>
        <li><a href="statusUpdation.php">Update Test Status </a></li>
  
    <li><a href="index.html" >Log Out</a></li>
</ul>
</div>
<div class="main">
   <center style="margin-left: 25%">
    <p style="font-size: 50px; margin: 0;"><?php echo $row['patho_name'];?></p>

   </center>
    <pre style="font-size: 30px ; margin-left: 40%">Address - <?php echo $row['patho_addr'];?></pre>
    <pre style="font-size: 30px;margin-left: 40%">Email ID- <?php echo $row['patho_emailid'];?></pre>
    <pre style="font-size: 30px;margin-left: 40%">phone No- <?php echo $row['patho_phno'];?></pre>



    <?php

    }
    ?>
</div>

</body>
</html>