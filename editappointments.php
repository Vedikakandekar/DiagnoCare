
<?php     //file to edit the room details the href file of edit
	 session_start();
     include('db.php');
 
     $appointment_id=$_GET['appointment_id'];
     $emailid= $_SESSION["emailid"];
    


	$query = mysqli_query($con, "select * from user_appointment where appointment_id='$appointment_id'");
if ($query && mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_array($query);
} else {
    echo 'No results found';
}
    
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/testregistration.css">
    <style>
    input[type=submit] {
  width: 10%;
  padding: 12px 20px;
border: 1px solid #555;
 background-color: black;
 color:white;
    
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
             text-align: center;
}
    input[type=text] {
  width: 25%;
  padding: 10px 20px;
  margin: 5px 0;
 border: 1px solid black; 
    font-family: cursive;
    font-size: 100%;
    font-size-adjust: auto;
}
              
    </style>
    <center><h1><i>Edit Appointment Details</i></h1></center>
</head>
<body>
    <center>
    

	<form method="POST" action="updateappointmentdetails.php?appointment_id=<?php echo $appointment_id; ?>"> 
		<b> Test Name: </b><input type="text" value="<?php echo $row['test_name']; ?>" name="test_name"  readonly>
        <br>
        <br>
        
        <b> Test Cost: </b><input type="text" value="<?php echo $row['test_cost']; ?>" name="test_cost" readonly>
        <br>
        <br>
        <b> Pathalogy Name: </b><input type="text" value="<?php echo $row['patho_name']; ?>" name="patho_name" readonly>
        <br>
        <br>
        <b>Change Date: </b><input type="Date" value="<?php echo $row['date']; ?>" name="date">
        <br>
        <br>
        <b> Change Time</b>
        <input type="time" id="appt" value="<?php echo $row['time']; ?>" name="appt" min="09:00" max="18:00" required>
            <small> Hours 9am to 6pm</small></td>
            <br>
            <br>
            
        <button type="submit"  name="submit">Submit</button>
        </form>
    </center>
	
</body>
</html>

