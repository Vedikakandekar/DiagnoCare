<html>
    <head>
   <center>
            <h1><i>Pathalogy Registration</i></h1> 
           </center>
        
    <style> 
input[type=text] {
  width: 25%;
  padding: 10px 20px;
  margin: 5px 0;
 border: 1px solid black; 
}
input[type=submit] {
  width: 10%;
  padding: 12px 20px;
border: 1px solid #555;
 background-color:black;
 color:white;
    
}
     .button {
width: 10%;
  padding: 12px 20px;
border: 1px solid #555;
 background-color: black;
 color:white;
    
}
           input[type=password] {
  width: 25%;
  padding: 10px 20px;
  margin: 5px 0;
 border: 1px solid black; 
}
        
           input[type=email] {
  width: 25%;
  padding: 10px 20px;
  margin: 5px 0;
 border: 1px solid black; 
}
         body  {
  background-image: url("aal3.jpg");
  background-color: #cccccc;
        background-position:center;
        background-size:cover;
        text-decoration-style: wavy;
        background-repeat: no-repeat;
        width:auto-inherit;
        height:40%;
}
 
  
</style>
    
    
 
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
   
   
<b>Enter Pathalogy Name : </b><input type="text" name="patho_name" >
  <br/>
         <b>Enter E-mail ID : </b><input type="text" name="patho_emailid" >
  <br/>
        <b> Enter Contact Number : </b><input type="text" name="patho_phno" >
  <br/>
      <b>Enter Address : </b><input type="text" name="patho_addr" >
  <br/>
         <b>Enter Password: </b><input type="password" name="patho_password" >
  <br/>

  <input type="submit" name="submit" value="Add User">
  
    
</form>
 <button onclick="document.location='mainlogin.html'" class="button">Back</button>
    </center>
</body>
</html>