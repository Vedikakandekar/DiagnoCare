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


<form method="POST">
   
   
<b>Enter First Name : </b><input type="text" name="firstname" >
  <br/>
         <b>Enter Middle Name: </b><input type="text" name="middlename" >
  <br/>
        <b> Enter Last Name : </b><input type="text" name="lastname" >
  <br/>
      <b>Enter Gender : </b><input type="text" name="gender" >
  <br/>
  
        <b>Enter Email-Id : </b><input type="email" name="emailid" >
  <br/>
         <b>Enter Password: </b><input type="password" name="password" >
  <br/>
  <b>Enter Contact No: </b><input type="text" name="phno" >
  <br/>
    
  <input type="submit" name="submit" value="Add User">
  
    
</form>
 <button onclick="document.location='mainlogin.html'" class="button">Back</button>
    </center>
</body>
</html>