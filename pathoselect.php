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


@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

        table { 
                width: 100%; 
        }

        /* Force table to not be like tables anymore */
        table, thead, tbody, th, td, tr { 
                display: block; 
        }
        
        /* Hide table headers (but not display: none;, for accessibility) */
        thead tr { 
                position: absolute;
                top: -9999px;
                left: -9999px;
        }
        
        tr { border: 1px solid #ccc; }
        
        td { 
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee; 
                position: relative;
                padding-left: 50%; 
        }

        td:before { 
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 6px;
                left: 6px;
                width: 45%; 
                padding-right: 10px; 
                white-space: nowrap;
                /* Label the data */
                content: attr(data-column);

                color: #000;
                font-weight: bold;
        }

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
}
    </style>
  </head>
  <body>

  <button onclick="document.location='userdashboard.php'" class="button">Back</button>
  <form method="post" action="bookappointment.php">
    <table>
      <tr>
      <th><center>Pathology ID</center></th>
        <th><center>Pathology Name</center></th>
       
        <th></th>
      </tr>
      
	  <?php
        session_start();
        include("db.php");
      
		$emailid= $_SESSION["emailid"];
    if (!isset($_SESSION['emailid'])) {
      $_SESSION['msg'] = "You must log in first";
      header('location: index.html');
    }
  
    if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['emailid']);
      header("location: index.html");
    }


		echo $emailid;
 
     
        // Select all rows from the pathology_labs table
        $sql = "SELECT * FROM pathalogy_login";
        $result = $con->query($sql);

        // Loop through the rows and display the lab names and select buttons
        while ($row = mysqli_fetch_array($result)) {
			
          echo "<tr>";
          echo "<td>" . $row["patho_id"] . "</td>";
          echo "<td>" . $row["patho_name"] . "</td>";
  
        ?>
          <td><a href="bookappointment.php?pathology=<?=$row['patho_name']
          ?> " class="btn btn-info">Select</a></td>
        <?php 
          $_SESSION['pathname'] = $row["patho_name"];
          $_SESSION['pathid'] = $row["patho_id"];
      

          echo "</tr>";
    
      }
        

        $con->close();
       
        
      ?>
    </table>
  </body>
  

</html>


