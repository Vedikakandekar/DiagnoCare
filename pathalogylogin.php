<?php 
session_start();
include("db.php");


if(isset($_POST['sub']))
{
$patho_emailid = $_POST['patho_emailid'];
$patho_password = $_POST['patho_password'];

	$_SESSION["patho_emailid"] = $patho_emailid;

	$con = mysqli_connect("localhost:3306","root","","odlms")or die("Connection lost");


$res = mysqli_query($con,"select* from pathalogy_login where patho_emailid='$patho_emailid'and patho_password='$patho_password'");
$numRows = mysqli_num_rows($res);
if($numRows  == 1){
	
	$row=mysqli_fetch_assoc($res);
	$_SESSION['patho_emailid']= $row['patho_emailid'];
	$_SESSION['patho_id']= $row['patho_id'];

echo "You are login Successfully ";
header("location:pathalogydashboard.php");   
}
else
{
	echo "<script type='text/javascript'>alert('Invalid Username or Password');location='pathalogylogin.html';</script>";

}
}
?>


