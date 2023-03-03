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
            background-color: #cccccc;
            background-position:center;
            background-size:cover;
            text-decoration-style: wavy;
            background-repeat: no-repeat;
            width: auto;
            height:40%;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        th {
            border: 2px solid #dddddd;
            text-align: left;
            padding: 8px;
            border-color: black;
            width: max-content;
        }
        td{
            border: 2px solid #dddddd;
            text-align: left;
            padding: 10px;
            border-color: black;

        }

    </style>
</head>
<body>

<ul>

    <li><a href="userprofile.php">My Profile</a></li>

    <li><a  href="pathoselect.php">Pathalogy Labs</a></li>
    <li><a  href="appointmentdisplay.php">Appointments</a></li>
    <li><a href="userTestProgress.php">Test Progress</a></li>
    <li><a href="userReportHistory.php">Report History</a></li>

    <li><a href="./index.html" >Log Out</a></li>

</ul>

<div style="margin-left:30%;padding:1px 16px;height:1000px;">

    <center><h1><i> Test Progress </i></h1></center>



    <table border="1">
        <tr>

            <th>Appointment Date</th>

            <th>Pathalogy Name</th>

            <th>Test Name</th>

            <th>Test Progress</th>

        </tr>

        <tbody>

        <?php


        $con = mysqli_connect("localhost:3306","root","","odlms")or die("Connection lost");

        $userid = $_SESSION['user_id'];
        $result=mysqli_query($con,"select * from path_appointments where user_id='$userid' and( test_progress!='Report is Ready' OR test_progress IS NULL )"); //added when error occured



        ?>

        <tr>

            <table border="1">
                <?php foreach($result as $row){

                    ?>
                    </tr >

                    <td>
                        <?php  echo $row["date"];?>
                    </td>

                    <td>
                        <?php  echo $row["patho_name"];?>
                    </td>

                    <td>
                        <?php echo $row["test_name"]; ?>
                    </td>

                    <td>

                        <?php if ($row["test_progress"]==null) {
                        echo "N/A";
                    }else
                        {
                             echo $row["test_progress"];
                        }
                        ?>
                    </td>


                    </tr>
                    <?php

                }
                ?>




                </tbody>
            </table>






</div>

</body>
</html>

