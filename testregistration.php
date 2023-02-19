<html>
    <head>
   <center>
            <h1><i>Enter Test Details</i></h1> 
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
 
<b>Pathalogy ID: </b><input type="text" value="<?php echo $getContent['patho_id']; ?>" name="patho_id"  readonly>
           <br>
          <br>
   
<b>Pathalogy Name: </b><input type="text" value="<?php echo $getContent['patho_name']; ?>" name="patho_name" readonly >
           <br>
          <br>
         <b>Test Name : </b><input type="text" name="test_name" >
  <br/>
        <b> Test Cost : </b><input type="text" name="test_cost" >
  <br/>

      <b> Test Instructions : </b><textarea rows="4" cols="50" name="test_instructions" >Enter Instructions of Test ...</textarea>

 <br>

  <input type="submit" name="submit" value="Add test">

  
    
</form>
 <button onclick="document.location='pathalogydashboard.php'" class="button">Back</button>
    </center>
</body>
</html>