<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Easiest Way to Add Input Masks to Your Forms</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/userregistration.css">
</head>


        
<body>


<?php                              //user registration used for fetching data at user profile
include "db.php"; 

if(isset($_POST['submit']))
{		
  
$firstname=$_POST['firstname'];
$middlename=$_POST['middlename'];
$lastname=$_POST['lastname'];
$gender=$_POST['gender'];
$phno=$_POST['phno'];
$emailid=$_POST['emailid'];
    $password=$_POST['password'];
    
    $insert = mysqli_query($con," INSERT INTO user_login( firstname,middlename,lastname,gender,emailid,password,phno) VALUES ( '$firstname','$middlename','$lastname','$gender','$emailid','$password','$phno')");

    if(!$insert)
    {
        echo mysqli_error($con);
    }
    else
    {
         echo "<script>alert('User Registration Successful');window.location.href = 'userlogin.html';</script>";
    }
}

mysqli_close($con); // Close connection
?>




<div class="registration-form">

    <form method="POST">
        <div class="form-icon">
            <span><i class="icon icon-user"></i></span>
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="First Name" name="firstname" placeholder="First Name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="middlename" name="middlename" placeholder="Middle name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="lastname" name="lastname" placeholder="Last Name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="gender" name="gender" placeholder="Gender">
        </div>
        <div class="form-group">
            <input type="email" class="form-control item" id="email" name="emailid" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control item" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <input type="number" class="form-control item" name="phno" id="Phone Number" placeholder="Phone Number">
        </div>

        <div class="form-group">
            <button type="button" name="submit"  class="btn btn-block create-account">Create Account</button>
        </div>

        <div class="form-group">
            <button type="button" onclick="document.location='mainlogin.html'" class="btn btn-block create-account" >Back</button>
        </div>
    </form>

</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="js/script.js "></script>
</body>
</body>
</html>




