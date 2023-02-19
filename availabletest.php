
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

</head>
</style>
    

<body>
    <center><h1><i>Available Tests</i></h1></center>

	
	<div>
		<table border="1">
			<tr>
      <th>Test ID</th>
				 <th>Test Name</th>
    <th>Test Cost</th>
    <th>Test Instructions</th>
                <th>Edit/Delete</th>
            </tr>	
    
			<tbody>
				<?php
					include('db.php');
                    session_start();
                    
                    if (!isset($_SESSION['emailid'])) {
                      $_SESSION['msg'] = "You must log in first";
                      header('location: index.html');
                    }
                  
                    if (isset($_GET['logout'])) {
                      session_destroy();
                      unset($_SESSION['emailid']);
                      header("location: index.html");
                    }

                    $patho_emailid= $_SESSION["patho_emailid"];
                    $patho_id= $_SESSION["patho_id"];
  
                    echo $patho_emailid;
                      echo $patho_id;
                $query=mysqli_query($con,"select * from test_details where patho_id='$patho_id' "); //added when error occured
					
					while($row=mysqli_fetch_array($query)){ 
						?>  
						<tr>
            
            <td><?php echo $row['test_id']; ?></td>
							<td><?php echo $row['test_name']; ?></td>
							<td><?php echo $row['test_cost']; ?></td>
                <td><?php echo $row['test_instructions']; ?></td>
                
							<td>
              
								<a href="edittest.php?test_id=<?=$row['test_id']; ?>">Edit</a>
								<a href="deletetest.php?test_id=<?=$row['test_id']; ?>">Delete</a>
							</td>
						</tr>
           
						<?php
            
					}
				?>
			</tbody>
		</table>

    </div>
    <button onclick="document.location='pathalogydashboard.php'" class="button">Back</button>
    </body>
    </head>
</html>
