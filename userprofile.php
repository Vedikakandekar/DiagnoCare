
<?php     //file to edit the employee details the href file of edit
	
  session_start();
  include('db.php');
  $emailid= $_SESSION["emailid"];

 
   
       //$row=mysqli_fetch_assoc($result);
       $getContent = mysqli_query($con,"SELECT * FROM user_login where emailid='$emailid'");
       $getContent = mysqli_fetch_assoc($getContent);
    
  ?>


  <!DOCTYPE html>
  <html>
  <head>
     <link rel="stylesheet" href="css/userprofile.css">
     
      <center>
          <div class="pathlogin"><p>Edit User Profile</p></div>
      </center>
      
      
      
  </head>
  <body>
      <center>
    
    <form method="POST" action="updateuser.php">

        <div class="textfield">
            <p>Username      <input type="text" name="Username" value="<?php echo $getContent['firstname']." ".$getContent['middlename']." ".$getContent['lastname']; ?>" name="username" readonly ></p>
            <p>Gender-       <input type="text" name="gender" value="<?php echo $getContent['gender']; ?>" name="gender" readonly></p>
            <p>Email ID      <input type="text" name="emailid" value="<?php echo $getContent['emailid']; ?>" name="emailid"></p>
            <p>Password      <input type="text" name="password" value="<?php echo $getContent['password']; ?>" name="password"></p>
            <p>Contact <input type="text" name="phno" value="<?php echo $getContent['phno']; ?>" name="phno"></p>
            <input type="submit" name="Update">
            <button onclick="document.location='mainlogin.html'" class="button">Back</button>
        </div>
      
    </form>
      <br>
      </center>
      </body>
  </html>