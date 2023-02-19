
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
      <style>
     input[type=text] {
    width: 23%;
    padding: 10px 20px;
    margin: 5px 0;
   border: 1px solid black; 
      font-family: cursive;
      font-size: 100%;
      font-size-adjust: auto;
  }
  input[type=submit] {
    width: 10%;
    padding: 12px 20px;
  border: 1px solid #555;
   background-color: black;
   color:white;
      
  }
             .button {
   width: 10%;
    padding: 12px 20px;
  border: 1px solid #555;
   background-color: black;
   color:white;
                 align-content: center;
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
    background-image: url("new.jpg");
    background-color: #cccccc;
          background-position:center;
          background-size:cover;
               width:100%;
          text-decoration-style: wavy;
          background-repeat: no-repeat;
          width:auto-inherit;
          height:40%;
  }
                 
             input[type=email] {
    width: 23%;
    padding: 10px 20px;
    margin: 5px 0;
   border: 1px solid black; 
  }
          
      </style>
      <br>
      <center><h1><i>Edit User profile</i></h1></center>
  </head>
  <body>
      <center>
    
    <form method="POST" action="updateuser.php">
    <b>Username: </b><input type="text" value="<?php echo $getContent['firstname']." ".$getContent['middlename']." ".$getContent['lastname']; ?>" name="username" readonly >
    <br>
          <br>
        <b>Gender: </b><input type="text" value="<?php echo $getContent['gender']; ?>" name="gender" readonly>
           <br>
          <br>
         <b> Email-Id: </b><input type="email" value="<?php echo $getContent['emailid']; ?>" name="emailid" >
           <br>
          <br>
         <b>Password:</b><input type="text" value="<?php echo $getContent['password']; ?>" name="password">
           <br>
          <br>
          <b>Contact Number: </b><input type="text" value="<?php echo $getContent['phno']; ?>" name="phno"  >
          <br>
          <br>
          
          <input type="submit"  name="Update">
          
      
    </form>
      <br>
      <button onclick="document.location='userdashboard.php'" class="button">Back</button>
      </center>
      </body>
  </html>