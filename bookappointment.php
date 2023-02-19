<?php
    session_start();
    if(isset($_GET['pathology']))
    {
    $pathname= $_GET['pathology'];
    $_SESSION['pathname'] = $pathname;
    $emailid= $_SESSION["emailid"];
    }
    
     $pathname = $_SESSION['pathname'];
  
    //  if (!isset($_SESSION['emailid'])) {
    //   $_SESSION['msg'] = "You must log in first";
    //   header('location: index.html');
    // }
  
    // if (isset($_GET['logout'])) {
    //   session_destroy();
    //   unset($_SESSION['emailid']);
    //   header("location: index.html");
    // }
    echo $emailid;

?>
<html>
  <head>
    <style>
      table { 
        width: 750px; 
        border-collapse: collapse; 
        margin:50px auto;
      }

      /* Zebra striping */
      tr:nth-of-type(odd) { 
        background: #eee; 
      }

      th { 
        background: #3498db; 
        color: white; 
        font-weight: bold; 
      }

      td, th { 
        padding: 10px; 
        border: 1px solid #ccc; 
        text-align: left; 
        font-size: 18px;
      }

      /* Dropdown list styles */
      .dropdown-list {
        width: 100%;
        padding: 10px;
        font-size: 18px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }

      button {
        display: block;
        margin: 0 auto;
        padding: 10px 20px;
        background-color: #009900;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        align :center;
      }
    </style>
  </head>
  <body>
   <!-- insertappointment.php -->
    <button onclick="document.location='pathoselect.php'" class="button">Back</button>
    <form method="get" action="confirmbooking.php">

            </form>
            </body>
            </html>
            
    
