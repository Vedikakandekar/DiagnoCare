<html>
    <head>
        <link rel="stylesheet" href="css/testregistration.css">
   <center>
            <h1>Enter Test Details</h1> 
           </center>
        
    <style> 

</style>
    
    
 
    </head>
 


        
<body>




<?php     //file to edit the employee details the href file of edit
	
  session_start();
  include('db.php');
  $patho_emailid= $_SESSION["patho_emailid"];
  $patho_id= $_SESSION["patho_id"];
  
 echo $patho_emailid;
 echo $patho_id;
   
       //$row=mysqli_fetch_assoc($result);
       $getContent = mysqli_query($con,"SELECT * FROM pathalogy_login where patho_emailid='$patho_emailid'");
       $getContent = mysqli_fetch_assoc($getContent);
   
    
  ?>

<?php                             
include "db.php"; 

if(isset($_POST['submit']))
{	
 
    $patho_id=$_POST['patho_id'];
$patho_name=$_POST['patho_name'];
$test_name=$_POST['test_name'];
$test_cost=$_POST['test_cost'];
$test_instructions=$_POST['test_instructions'];

    
    
    $insert = mysqli_query($con," INSERT INTO test_details( patho_id,patho_name,test_name,test_cost,test_instructions) VALUES ( '$patho_id','$patho_name','$test_name','$test_cost','$test_instructions')");

    if(!$insert)
    {
        echo mysqli_error($con);
    }
    else
    {
         echo "<script>alert('Test Registration Successful');window.location.href = 'pathalogydashboard.php';</script>";
    }
}

mysqli_close($con); // Close connection
?>


<form method="POST">
    
<center>
    <div class="textfield">
        <p>Test Name <input type="text" name="test_name"></p>
        <p>Test Cost <input type="text" name="test_cost" ></p>
            
        <p style="margin-right: 30px">Test  Instructions :<textarea rows="4" cols="45" name="test_instructions" >Enter Instructions of Test ...</textarea></p>
        <br>    
        <input type="submit" name="submit" value="Add test">
            <button onclick="document.location='pathalogydashboard.php'" class="button">Back</button>
    </div>
</center>
</form>
 
    </center>
</body>
</html>