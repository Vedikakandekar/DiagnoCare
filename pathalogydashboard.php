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
echo $_SESSION['patho_emailid'];
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
    <p style="font-size: 40px; margin: 0;">Pathalogy Name</p>
    <p style="font-size: 25px">Address- Deeskbsnbgksbkgbsk</p>
    <p style="font-size: 25px">Email ID- Ved@kandu.com</p>
    <pre style="font-size: 25px">phone No- 3985499122969</pre>
    <p style="font-size: 25px">Provided Test-</p>
    <p style="font-size: 25px">Test 1</p>
    <p style="font-size: 25px">Test 2</p>
   </center>
</div>

</body>
</html>