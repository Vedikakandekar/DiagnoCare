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
      .payme {
          color: black;
          background: #6d8494;
          padding: 5px 5px;
          box-shadow: 0 4px 0 0 #59a6c7;
          margin-top: 100px;
      }
      .payme:hover {
          background: rgb(134, 192, 189);
          box-shadow: 0 4px 0 0 #7fada2;
      }
    </style>
  </head>
  <body>
   <!-- insertappointment.php -->
    <button onclick="document.location='pathoselect.php'" class="button">Back</button>
    <form method="get" action="confirmbooking.php">
      <table>
        <tr>
          <th><center>Book Appointment</center></th>
          <th></th>
        </tr>
        <tr>
          <td>Pathology Lab:</td>
          <td><?php   echo $pathname; ?></td>
        </tr>
        <tr>
          <td>Available Tests:</td>
          <td>
            <select class="dropdown-list" name="available_tests">
              <?php
  
                include("db.php");

                // Select all tests available in the selected pathology lab
                $sql = "SELECT * FROM test_details WHERE patho_name='$pathname'";
                $result = $con->query($sql);
                
               

                foreach($result as $row) {
                 
                 echo '<option value='.urlencode($row['test_name']).'>'.$row['test_name'].'</option>';
                
              }
              
             
              $con->close();
               
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Appointment Date:</td>
          <td><input type="date" name="appointment_date" required></td>
        </tr>
       <tr>
        <td>Appointment Time:</td>
          <td><label for="appt">:</label>
            <input type="time" id="appt" name="appt" min="09:00" max="18:00" required>
            <small> Hours 9am to 6pm</small></td>

        </tr>

          <tr>
              <td> Address :</td>
              <td><label for="addr">:</label>
              <input type="text" id="addr" name="addr" required>
              </td>
          </tr>
      <tr>
             <td><b>Test Cost:</b>
                 <td><input type="text" value="<?php echo $row['test_cost'] ?>" name="test_cost"/>
              <a href="#"  class="payme" style="margin-left: 10px " > Pay </a>

          </td>

        </tr>
        
        <tr>
          <td></td>
          <td><button type="submit" >Book Appointment</button></td>
        </tr>
   
      </table>
            </form>
            </body>
            </html>
            
    
