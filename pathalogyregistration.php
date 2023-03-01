<html>
    <head>
   <center>
            <h1>Pathalogy Registration</h1> 
           </center>
<link rel="stylesheet" href="css/pathalogyregistration.css">
    </head>
  
<body>
    <center>

<?php                              //pathology registration used for fetching data at user profile
include "db.php"; 

if(isset($_POST['submit']))
{		
  
$patho_name=$_POST['patho_name'];
$patho_emailid=$_POST['patho_emailid'];
$patho_password=$_POST['patho_password'];
$patho_phno=$_POST['patho_phno'];
$patho_addr=$_POST['patho_addr'];

    $con = mysqli_connect("localhost:3306","root","","odlms")or die("Connection lost");

    $insert = mysqli_query($con," INSERT INTO pathalogy_login( patho_name,patho_emailid,patho_password,patho_phno,patho_addr) VALUES ( '$patho_name','$patho_emailid','$patho_password','$patho_phno','$patho_addr')");

    if(!$insert)
    {
        echo mysqli_error($con);
    }
    else
    {
         echo "<script>alert('Pathology Registration Successful');window.location.href = 'pathalogylogin.html';</script>";
    }
}

mysqli_close($con); // Close connection
?>


<form method="POST">
    
    <form method="POST">
        <div class="textfield">
            <p><input type="text" name="patho_name" placeholder="Enter Pathalogy name" required></p>
            <p><input type="email" name="patho_emailid" placeholder="Enter Email " pattern="^[a-z0-9](\.?[a-z0-9]){2,}@g(oogle)?mail\.com$" title="Please enter valid email" required></p>
            <p><input type="password" name="patho_password" placeholder="Enter Passworrd"></p>
            <p><input type="text" name="patho_phno" placeholder="Phone Number" pattern="^[789]\d{9}$" title="Please enter valid Number" required></p>
            <p><input type="text" name="patho_addr" placeholder="Enter Address" ></p>
            <input type="submit" name="submit" value="Register">
            <button onclick="document.location='mainlogin.html'" class="button">Back</button>
        </div>
    
</form>
 
    </center>
</body>
</html>