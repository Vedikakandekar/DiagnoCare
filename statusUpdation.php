<?php
session_start();
include("db.php");

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
    <link rel="stylesheet" href="css/pathlogin.css">
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

        <li><a href="pathalogyprofile.php">My Profile</a></li>
        <li><a href="testregistration.php">Register Tests</a></li>
        <li><a href="availabletest.php">Available Tests</a></li>
          <li><a href="pathAppointments.php">Appointments</a></li>
        <li><a href="statusUpdation.php">Update Test Status </a></li>

    <li><a href="index.html" >Log Out</a></li>

</ul>

<div style="margin-left:50%;padding:1px 16px;height:1000px;">

    <div class="button-container">
        <button class="button">Button 1</button>
        <button class="button">Button 2</button>
        <button class="button">Button 3</button>
    </div>


</div>

</body>
</html>