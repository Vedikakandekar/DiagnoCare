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
<div class="header">
<ul>

    <li><a href="pathalogyprofile.php">My Profile</a></li>
    <li><a href="testregistration.php">Register Tests</a></li>
    <li><a href="availabletest.php">Available Tests</a></li>
    <li><a href="pathAppointments.php">Appointments</a></li>
    <li><a href="#">Test Result Updation</a></li>

    <li><a href="index.html" >Log Out</a></li>
</ul>
</div>

<div class="appointments" >
    <p>
        <h1>Appointments
        </h1>
    </p>

    <table>
        <tr>
        <th>Column One </th>
        <th>Column Two </th>
        </tr>

        <tr>
            <td>hello 1 </td>
            <td>hello 2 </td>
        </tr>

    </table>


    </div>






</body>
</html>

