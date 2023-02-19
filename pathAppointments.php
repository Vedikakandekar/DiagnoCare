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

    <link rel="stylesheet" href="css/pathAppoinments.css">

</head>

<body>


<ul>

    <li><a href="pathalogyprofile.php">My Profile</a></li>
    <li><a href="testregistration.php">Register Tests</a></li>
    <li><a href="availabletest.php">Available Tests</a></li>
    <li><a href="pathAppointments.php">Appointments</a></li>
    <li><a href="#">Test Result Updation</a></li>

    <li><a href="index.html" >Log Out</a></li>
</ul>
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
    <h1 style="text-align: center">Appointments</h1>
    <table class="table">
        <tr >
            <th style="width: 30%">Company</th>
            <td>Contact</td>
        </tr>
        <tr style="height: 1px">
            <th>Address</th>
            <td>Maria Anders</td>
        </tr>
        <tr>
            <th>Test Name</th>
            <td>Maria Anders</td>
        </tr>
    </table>
    <a href="#" class="accept" style="margin-left: 400px">ACCEPT <span class="fa fa-check"></span></a>
    <a href="#" class="deny">DENY <span class="fa fa-close"></span></a>
    <hr style="margin: 30px">
</div>










</body>
</html>

