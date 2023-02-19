<?php 
session_start();

if (!isset($_SESSION['emailid'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: index.html');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['emailid']);
  header("location: index.html");
}

?>
<html>
<head>
<style>
body {
  margin: 0;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 30%;
  background-color: #000;
  position: fixed;
  height: 100%;
  overflow: auto;
    color: white;
   
}

li a {
  display: block;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
}

li a.active {
  background-color: #6eb572;
  color: white;
}

li a:hover:not(.active) {
  background-color: #a35555;
  color: white;
}
     body  {
  background-image: url("employeehome.jpg");
  background-color: #cccccc;
        background-position:center;
        background-size:cover;
        text-decoration-style: wavy;
        background-repeat: no-repeat;
     width: auto;
        height:40%;
}
</style>
</head>
<body>

<ul>
  
        <li><a href="userprofile.php">My Profile</a></li>
  
  <li><a  href="pathoselect.php">Pathalogy Labs</a></li>
  <li><a  href="appointmentdisplay.php">Appointments</a></li>
  <li><a href="">Test Progress</a></li>
  <li><a href="">Report History</a></li>
  
    <li><a href="./index.html" >Log Out</a></li>

</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  
</div>

</body>
</html>