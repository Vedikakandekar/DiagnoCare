<html>
    <head>
   <center>
       <div class="pathlogin"><p>User Login</p></div>
           </center>
  
    <link rel="stylesheet" href="css/userregistration.css">
    </head>
    
<body>
    <center>

<?php                              //user registration used for fetching data at user profile
include "db.php"; 

if(isset($_POST['submit']))
{		
  
$firstname=$_POST['firstname'];
$middlename=$_POST['middlename'];
$lastname=$_POST['lastname'];
$addr=$_POST['addr'];
$phno=$_POST['phno'];
$emailid=$_POST['emailid'];
    $password=$_POST['password'];
    
    $insert = mysqli_query($con," INSERT INTO user_login( firstname,middlename,lastname,emailid,password,phno,addr) VALUES ( '$firstname','$middlename','$lastname','$emailid','$password','$phno','$addr')");

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
        <form method="POST">
            <div class="textfield">
                <p><input type="text" name="firstname" placeholder="Enter First Name" required></p>
                <p><input type="text" name="middlename" placeholder="Enter Middle Name" required></p>
                <p><input type="text" name="lastname" placeholder="Enter Last Name" required></p>
                <p><input type="email" name="emailid" placeholder="Enter Email " pattern="^[a-z0-9](\.?[a-z0-9]){2,}@g(oogle)?mail\.com$" title="Please enter valid email" required></p>
                <p><input type="password" name="password" placeholder="Enter Passworrd"></p>
                <p><input type="text" name="phno" placeholder="Phone Number" pattern="^[789]\d{9}$" title="Please enter valid Number" required></p>
                <p><input type="text" name="addr" placeholder="Enter Address" ></p>
                <input type="submit" name="submit" value="Add User">
                <button onclick="document.location='mainlogin.html'" class="button">Back</button>
            </div>

        </form>
</body>
</html>
