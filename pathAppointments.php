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

    <link rel="stylesheet" href="css/pathAppoinments.css">

    <style>


        body  {

            background-color: #cccccc;
            background-position:center;
            background-size:cover;
            text-decoration-style: wavy;
            background-repeat: no-repeat;
            max-height:60%;
            max-width:200%;

        }
    </style>

</head>

<body>

<?php echo "Patho_ID is : ",$_SESSION['patho_id'] ?>
<ul>

    <li><a href="pathalogyprofile.php">My Profile</a></li>
    <li><a href="testregistration.php">Register Tests</a></li>
    <li><a href="availabletest.php">Available Tests</a></li>
    <li><a href="pathAppointments.php">Appointments</a></li>
    <li><a href="statusUpdation.php">Test Result Updation</a></li>

    <li><a href="index.html" >Log Out</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
    <h1 style="text-align: center">Appointments</h1>

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

    $res = mysqli_query($con,"select * from user_appointment where patho_id =$patho_id and acceptance_status IS NULL");
    foreach($res as $row){


        ?>
        <table class="table">
            <tr >
                <th style="width: 30%">Client Name </th>
                <td><?php echo  $row['firstname'],"  ",$row['lastname'] ?></td>
            </tr>
            <tr style="height: 1px">
                <th>Address</th>
                <td><?php echo $row['address'] ?></td>
            </tr>
            <tr>
                <th>Test Name</th>
                <td><?php echo $row['test_name'] ?></td>
            </tr>
        </table>
        <a href="addPathAppointment.php?appointment_id=<?=$row['appointment_id']?>" class="accept" style="margin-left: 400px">ACCEPT <span class="fa fa-check"></span></a>
        <a href="RejectPathAppointment.php?appointment_id=<?=$row['appointment_id']?>" class="deny">DENY <span class="fa fa-close"></span></a>
        <hr style="margin: 30px">


        <?php
    }


    ?>

</div>
</body>
</html>






