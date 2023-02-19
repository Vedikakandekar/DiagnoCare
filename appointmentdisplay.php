
<html>
<head>
    
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 2px solid #dddddd;
  text-align: left;
  padding: 8px;
border-color: black;
    }
    
     .button {
  background-color: black; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
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
    <center><h1><i>Booked Appointment Details</i></h1></center>

	
	<div>
		<table border="1">
        <th>Appointment ID</th>
      <th>Appointment Date</th>
      <th>Appointment Time</th>
      <th>Pathalogy Name</th>
      <th>Patient Name</th>
      <th>Test Name</th>
      <th>Test Cost</th>
            <th>Payment Status</th>
            <th>Cancel/Edit</th>
        </table>
    
			<tbody>
				<?php
					include('db.php');
                    session_start();
                    
                    $emailid= $_SESSION["emailid"];

                        echo $emailid;
                 $result=mysqli_query($con,"select * from user_appointment where emailid='$emailid' "); //added when error occured
              
					
                        
						?>  
						<tr>

                        <table border="1">
                        <?php foreach($result as $row){
    
    ?>
    <tr >
    <td>
  

      <?php  echo $row["appointment_id"];?>
    </td>
    <td>
      <?php  echo $row["date"];?>
    </td>
    <td>
      <?php  echo $row["time"];?>
    </td>
    <td>
      <?php  echo $row["patho_name"];?>
    </td>
     <td>
      <?php echo $row["firstname"]." ".$row["lastname"]; ?>
    </td>
    <td>
      <?php echo $row["test_name"]; ?>
    </td>
    <td>
      <?php echo $row["test_cost"]; ?>
    </td>
    <td>
      <?php echo $row["payment_status"]; ?>
    </td>

<td>
<a href="cancelappointment.php?appointment_id=<?=$row['appointment_id']; ?>">Cancel</a>
<a href="editappointments.php?appointment_id=<?=$row['appointment_id']; ?>">Edit</a>
							</td>
						</tr>
    <?php

    }?>
              
								
           
						<?php
            
					
				?>
			</tbody>
		</table>

    </div>
    <button onclick="document.location='userdashboard.php'" class="button">Back</button>
    </body>
    </head>
</html>
