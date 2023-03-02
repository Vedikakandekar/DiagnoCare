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

<?php

$patho_id=$_SESSION['patho_id'];
//echo $patho_id;
$appointment_id = $_GET['appointment_id'];
include("db.php");

$con = mysqli_connect("localhost:3306","root","","odlms")or die("Connection lost");

$mysqli_result = mysqli_query($con,"update path_appointments set test_progress='Report is Ready' where appointment_id = $appointment_id");




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
    <h1 style="text-align: center">Upload Report</h1>

    <center>
        <form method="post"  enctype="multipart/form-data">
            <label for="file">Select a file to upload:</label>
            <input type="file" name="file" id="file"><br><br>
            <input type="submit" name="submit" value="Upload">


        </form>

    </center>

</div>

<?php
if(isset($_POST['submit'])){
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileType = $_FILES['file']['type'];
    $fileSize = $_FILES['file']['size'];

    // open the file in read mode
    $file = fopen($fileTmpName, 'r');
    $content = fread($file, $fileSize);
    $content = addslashes($content);
    fclose($file);

    // connect to the database
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'odlms';
    $conn = mysqli_connect($host, $user, $password, $database);


    $appointment_id = $_GET['appointment_id'];
    $patho_id=$_SESSION['patho_id'];

    $sql = "select * from path_appointments where appointment_id = $appointment_id";

    $mysqli_result = mysqli_query($conn,$sql);

    $numRows = mysqli_num_rows($mysqli_result);

    if(mysqli_num_rows($mysqli_result) > 0){
        while($row = mysqli_fetch_assoc($mysqli_result)){


            $test_id = $row['test_id'];

            $user_id = $row['user_id'];

            $patho_name = $row['patho_name'];
        }
    }
    else{
        echo "<script type='text/javascript'>alert('Something Went Wrong');location='pathalogylogin.html';</script>";


    }

    // insert file into database
    $query = "INSERT INTO files (name, type, size, content,appointment_id,user_id,patho_id,test_id) VALUES ('$fileName', '$fileType', '$fileSize', '$content',$appointment_id,$user_id,$patho_id,$test_id)";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "File uploaded successfully.";
    } else{
        echo "File upload failed.";
    }

    mysqli_close($conn);

}
?>


</body>
</html>



