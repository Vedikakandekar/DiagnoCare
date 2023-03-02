<?php
session_start();
$patho_id=$_SESSION['patho_id'];
//echo $patho_id;
$appointment_id = $_GET['appointment_id'];
include("db.php");

$con = mysqli_connect("localhost:3306","root","","odlms")or die("Connection lost");

$mysqli_result = mysqli_query($con,"update path_appointments set test_progress='in progress' where appointment_id = $appointment_id");

header('location: statusUpdation.php');

?>
