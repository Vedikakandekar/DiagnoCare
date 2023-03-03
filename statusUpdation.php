<?php
session_start();
include("db.php");

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
    <link rel="stylesheet" href="css/statusUpdation.css">
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

<div class="maindiv" style="margin-left:25%;padding:1px 16px;height:1000px;">
    <h1 style="text-align: center">Update Status</h1>
    <h5 style="margin-left: 50px">
        <?php echo $_SESSION['patho_emailid'];?>
    </h5>S

    <?php

    include("db.php");
    $con = mysqli_connect("localhost:3306","root","","odlms")or die("Connection lost");
    $emailid = $_SESSION['patho_emailid'];


    $mysqli_result = mysqli_query($con,"select * from pathalogy_login where patho_emailid='$emailid' ");
    $numRows = mysqli_num_rows($mysqli_result);

    if(mysqli_num_rows($mysqli_result) > 0){
        while($row = mysqli_fetch_assoc($mysqli_result)){
            $patho_id = $row["patho_id"];
        }
    }
    else{
        echo "<script type='text/javascript'>alert('Something Went Wrong');location='pathalogylogin.html';</script>";


    }

    $_SESSION['patho_id']=$patho_id;
    $res = mysqli_query($con,"select * from path_appointments where patho_id = $patho_id and test_progress!='Report is Ready' OR test_progress IS NULL");
    foreach($res as $row){
        ?>



        <table class="table">
            <tr >
                <th style="width: 30%">Client's Name : </th>
                <td><?php echo $row['clientFname'],"  ",$row['clientLname'] ?></td>
                <th>Current Status :</th>
                <td><?php if( $row['test_progress']==null){echo "N/A";}else{echo $row['test_progress'];}  ?></td>
            </tr>
            <tr style="height: 1px">
                <th>Test Name</th>
                <td><?php echo $row['test_name']  ?></td>
                <th>Addreess :</th>
                <td><?php echo $row['client_addr']   ?></td>
            </tr>
        </table>
        <a href="sampleCollected.php?appointment_id=<?=$row['appointment_id']?>" class="collection" style="margin-left: 200px"> Sample Collected </a>
        <a href="inProgress.php?appointment_id=<?=$row['appointment_id']?>" class="progress"> In Progress </a>
        <a href="uploadReport.php?appointment_id=<?=$row['appointment_id'] ?>" class="ready"> Report Is Ready </a>
        <hr style="margin: 30px ; ">

        <?php
    }


    ?>
</div>





</body>
</html>