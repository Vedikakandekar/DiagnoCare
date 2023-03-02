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


if (isset($_POST['submit'])) {
    echo "Download Var Set ";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "odlms";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $test_id = $_GET['test_id'];
    $sql = "SELECT content FROM files WHERE test_id=$test_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    file_put_contents('C:/wamp64/www/DiagnoCare/downloadedReport/report', $row['content']);

    ?>
    <script>
        alert("<?php echo "File downloaded to C:/wamp64/www/DiagnoCare/downloadedReport" ?>");

    </script>

    <?php


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
    </style>
</head>
<body>

<ul>

    <li><a href="userprofile.php">My Profile</a></li>

    <li><a  href="pathoselect.php">Pathalogy Labs</a></li>
    <li><a  href="appointmentdisplay.php">Appointments</a></li>
    <li><a href="userTestProgress.php">Test Progress</a></li>
    <li><a href="">Report History</a></li>

    <li><a href="./index.html" >Log Out</a></li>

</ul>

<div style="margin-left:30%;padding:1px 16px;height:1000px;">


    <h1>Download Report</h1>
    <form method="POST"  enctype="multipart/form-data">

        <input type="submit" name="submit" value="Download">
        <button onclick="document.location='userTestProgress.php'" class="button">Back</button>

    </form>
</div>

</body>
</html>

