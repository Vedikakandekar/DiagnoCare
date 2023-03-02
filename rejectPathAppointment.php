<?php

session_start();
$appointment_id = $_GET['appointment_id'];
$patho_id=$_SESSION['patho_id'];

include("db.php");
$con = mysqli_connect("localhost:3306","root","","odlms")or die("Connection lost");
echo $appointment_id;
$mysqli_result = mysqli_query($con,"update user_appointment set acceptance_status='no' where appointment_id = $appointment_id");
header('location: pathAppointments.php');
echo $mysqli_result;


?>