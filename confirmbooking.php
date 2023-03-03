<?php
session_start();
include("db.php");
if (isset($_GET['pathology'])) {
    $pathname = $_GET['pathology'];
    $_SESSION['pathname'] = $pathname;

}


$pathname = $_SESSION['pathname'];


if (!isset($_SESSION['emailid'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: index.html');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['emailid']);
    header("location: index.html");
}

// Check if form is submitted
if (isset($_GET['available_tests']) && isset($_GET['appointment_date']) && isset($_GET['appt'])) {
    $available_tests = urldecode($_GET['available_tests']);
    $appointment_date = $_GET['appointment_date'];
    $appt = $_GET['appt'];
    $emailid = $_SESSION['emailid'];

//fetch the test details from test tabble
    $test_id_query = "SELECT test_id,test_cost FROM test_details WHERE test_name='$available_tests'";

    $test_id_result = mysqli_query($con,$test_id_query);
    foreach ($test_id_result as $row) {
        $test_id = $row["test_id"];
        $test_cost = $row['test_cost'];
    }

    $mysqli = new mysqli();
    $mysqli->connect(localhost, root, "", 'odlms');
    $sql = "select * from pathalogy_login where patho_name='$pathname'";
    $path_id = $mysqli->query("select patho_id from pathalogy_login where patho_name='$pathname'")->fetch_object()->patho_id;


echo $path_id;
    // $test_id = $test_id_result->fetch_assoc()['test_id'];
    // $test_cost=$test_id_result->fetch_assoc()['test_cost'];

    //Get user Detatils
    $getContent = mysqli_query($con, "SELECT * FROM user_login where emailid='$emailid'");
    $getContent = mysqli_fetch_assoc($getContent);



    $path_name = $_SESSION["pathname"];
    $fisrtname = $getContent["firstname"];
    $lastname = $getContent["lastname"];
    $user_id = $getContent["user_id"];

    $addr = $_GET['addr'];

// Insert the appointment details into the appointment table
// echo $path_id,$path_name,$fisrtname,$lastname,$user_id;

// mysqli_query($con, "INSERT INTO user_appointment (test_id, date,time,patho_id,patho_name,user_id,firstname,lastname, emailid) VALUES ('$test_id', '$appointment_date ','$appt:00', ,'$path_id','$path_name','$user_id','$fisrtname','$lastname','$emailid')");
    $sql = "INSERT INTO user_appointment (test_id,test_name,test_cost, date,time,patho_id,patho_name,user_id,firstname,lastname, emailid,address,payment_status) VALUES ('$test_id','$available_tests','$test_cost', '$appointment_date ','$appt:00',$path_id ,'$path_name',$user_id ,'$fisrtname','$lastname','$emailid','$addr','paid')";
// if($sql==TRUE){
//   $con->query($sql);
// }


    if ($con->query($sql) === TRUE) {
        header("Location: confirmbooking.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

$pathname = $_SESSION["pathname"];
$emailid = $_SESSION["emailid"];

?>

<?php
// // session_start();

// include("db.php");

// if(isset($_GET['available_tests']))
// {
// $available_test= $_GET['available_tests'];
// $string= preg_replace('/[^A-Za-z0-9 ]/', ' ', $available_test);
// $_SESSION['available_tests'] = $string;


// }

// if(isset($_GET['appointment_date']))
// {
// $appointment_dat= $_GET['appointment_date'];
// $_SESSION['appointment_date'] = $appointment_dat;

// }
// if(isset($_GET['appt']))
// {
// $app= $_GET['appt'];
// $_SESSION['appt'] = $app;


// }

// $available_tests = $_SESSION['available_tests'];

// $sql = " SELECT `test_cost` FROM `test_details` WHERE `test_name`='$available_tests'";
// $result = $con->query($sql);

// foreach($result as $row) {

//     $_SESSION['test_cost'] = $row['test_cost'];

//  }
//  $test_cost = $_SESSION['test_cost'];


// $appointment_date = $_SESSION['appointment_date'];
// $appt = $_SESSION['appt'];


//var_dump($_SESSION);


// $pathname=$_SESSION["pathname"];
// $emailid=$_SESSION["emailid"];
?>


<html>
<head>
    <style>
        table {
            width: 750px;
            border-collapse: collapse;
            margin: 50px auto;
        }

        /* Zebra striping */
        tr:nth-of-type(odd) {
            background: #eee;
        }

        th {
            background: #3498db;
            color: white;
            font-weight: bold;
        }

        td, th {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 18px;
        }


        @media only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px) {

            table {
                width: 100%;
            }

            /* Force table to not be like tables anymore */
            table, thead, tbody, th, td, tr {
                display: block;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
            }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td:before {
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 6px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                /* Label the data */
                content: attr(data-column);

                color: #000;
                font-weight: bold;
            }

        }

        button {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #009900;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }


    </style>
</head>
<body>
<?php

include("db.php");


// Fetch appointment details
$sql = "SELECT * FROM user_appointment where emailid='$emailid'";
$result = $con->query($sql);

$getContent = mysqli_query($con, "SELECT * FROM user_login where emailid='$emailid'");
$getContent = mysqli_fetch_assoc($getContent);


if ($result->num_rows > 0) {


    foreach ($result as $row) {
        $appointment_id = $row["appointment_id"];
        $patient_name = $row["firstname"];
        $testname = $row["test_name"];
        $testcost = $row["test_cost"];
        $payment_status = "paid";
        $addr = $row["address"];
//        $payment_status = $row["payment_status"];

    }


} else {
    echo "No appointment found";
}
$con->close();
?>


<h1>Appointment Details</h1>
<table>
    <tr>
        <th>Appointment ID</th>
        <th>Appointment Date</th>
        <th>Appointment Time</th>
        <th>Patient Name</th>
        <th>Test Name</th>
        <th>Test Cost</th>
         <th>Address</th>
        <th>Payment Status</th>
    </tr>
    <tr>
        <?php foreach ($result

        as $row){

        ?>
    <tr>
        <td>
            <?php echo $row["appointment_id"]; ?>
        </td>
        <td>
            <?php echo $row["date"]; ?>
        </td>
        <td>
            <?php echo $row["time"]; ?>
        </td>
        <td>
            <?php echo $row["firstname"]; ?>
        </td>
        <td>
            <?php echo $row["test_name"]; ?>
        </td>
        <td>
            <?php echo $row["test_cost"]; ?>
        </td>
        <td>
            <?php echo $row["payment_status"];
//<?php //echo $row["payment_status"]; ?>
        </td>
        <td>
            <?php echo $row["address"];?>
        </td>
    </tr>
    <?php

    } ?>

    <!-- <td>< ?php echo $payment_status; ?></td> -->
    </tr>
</table>
<br>
<h2>Payment Options</h2>
<form method="POST" action="userpayment.php">
    <input type="radio" name="payment_option_online" value="online" require> Online<br>
    <br>
    <input type="submit" value="Submit">
    <div id="paypal-button-container"></div>
</form>
<br>
<button onclick="document.location='pathoselect.php'" class="button">Back</button>
<h2>Test Instructions</h2>
<ul>
    <li>Complete Blood Count: Fast for 8 hours before the test.</li>
    <li>Blood Culture: Do not eat or drink anything for 2 hours before the test.</li>
    <li>Lipid Profile: Fast for 9-12 hours before the test.</li>
    <li>Thyroid Function Test: Fast for 8 hours before the test and avoid multivitamins and other supplements for 24
        hours before the test.
    </li>
    <li>Fasting Blood Sugar (FBS): Fast for 8 hours before the test.</li>
    <li>HbA1C: No special preparation is required.</li>
    <li>Stool Culture: Collect a fresh stool sample and deliver it to the laboratory within an hour.</li>
    <li>Urine Culture: Collect a fresh urine sample and deliver it to the laboratory</li>
    <li>PSA (Prostate-Specific Antigen): Do not ejaculate for at least 2 days before the test.</li>

</ul>
</body>
</html>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th, td {
        padding: 5px;
        text-align: left;
    }
</style>
