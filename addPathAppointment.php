<?php
session_start();
$appointment_id = $_GET['appointment_id'];
$patho_id=$_SESSION['patho_id'];
echo $patho_id;
include("db.php");
$con = mysqli_connect("localhost:3306","root","","odlms")or die("Connection lost");
echo $appointment_id;
$mysqli_result = mysqli_query($con,"update user_appointment set acceptance_status='yes' where appointment_id = $appointment_id");

$mysqli_result = mysqli_query($con,"select * from user_appointment where appointment_id = $appointment_id");

$numRows = mysqli_num_rows($mysqli_result);

if(mysqli_num_rows($mysqli_result) > 0){
    while($row = mysqli_fetch_assoc($mysqli_result)){

        $clientFname = $row['firstname'];
        $clientLname = $row['lastname'];
        $test_id = $row['test_id'];
        $client_addr = $row['address'];
        $test_name = $row['test_name'];
        $user_id = $row['user_id'];
        $usermail = $row['emailid'];
        $patho_name = $row['patho_name'];
    }
}
else{
    echo "<script type='text/javascript'>alert('Something Went Wrong');location='pathalogylogin.html';</script>";


}


$sql = "insert into path_appointments(clientFname,clientLname,test_id,patho_id,patho_name,client_addr,test_name,date,time,user_id,usermail)values ('$clientFname','$clientLname',$test_id,$patho_id,'$patho_name','$client_addr','$test_name',curdate(),curtime(),$user_id,'$usermail')";
$res = mysqli_query($con,$sql);
header('location: pathAppointments.php');
?>
