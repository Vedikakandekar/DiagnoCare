
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
  <!DOCTYPE html>
  <html>
  <head>
     <link rel="stylesheet" href="css/pathalogyprofile.css">
      
      <center><h1>Edit Pathalogy profile</h1></center>
      
  </head>
  <body>
      <center>
    
    <form method="POST" action="updatepathalogyprofile.php">
        
        <div class="textfield">
            <p>Name:      <input type="text" name="patho_name" value="<?php echo $getContent['patho_name']; ?>" name="patho_name"></p>
            <p>Email ID      <input type="text" name="patho_emailid" value="<?php echo $getContent['patho_emailid']; ?>" name="patho_emailid" readonly></p>
            <p>Password      <input type="text" name="patho_password" value="<?php echo $getContent['patho_password']; ?>" name="patho_password"></p>
            <p>Contact <input type="text" name="patho_phno" value="<?php echo $getContent['patho_phno']; ?>" name="patho_phno" pattern="^[789]\d{9}$"></p>
            <p>Address: <input type="text" name="patho_addr" value="<?php echo $getContent['patho_addr']; ?>" name="patho_addr"></p>
            <br>
            <input type="submit" name="Update">
            <button onclick="document.location='pathalogydashboard.php'" class="button">Back</button>
        </div>
        
    </form>
      <br>
      </center>
      </body>
  </html>