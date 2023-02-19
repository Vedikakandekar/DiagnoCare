
<?php     //file to edit the room details the href file of edit
	 session_start();
     include('db.php');
     $patho_emailid= $_SESSION["patho_emailid"];
     $patho_id= $_SESSION["patho_id"];
     $test_id=$_GET['test_id'];

    echo $patho_emailid;
    echo $patho_id;

	$query=mysqli_query($con,"select * from test_details where test_id='$test_id'");
	$row=mysqli_fetch_array($query);

    
?>
<!DOCTYPE html>
<html>
<head>
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
    <center><h1><i>Edit Test Details</i></h1></center>
</head>
<body>
    <center>
    
	
	<form method="POST" action="updatetestdetails.php?test_id=<?php echo $test_id; ?>">  //got error in this testid & path id
		<b>Edit Test Name: </b><input type="text" value="<?php echo $row['test_name']; ?>" name="test_name">
        <br>
        <br>
        
        <b>Edit Test Cost: </b><input type="text" value="<?php echo $row['test_cost']; ?>" name="test_cost">
        <br>
        <br>
       <b> Edit Test Instructions: </b><input type="text" value="<?php echo $row['test_instructions']; ?>" name="test_instructions">
        <br>
        <br>
        <input type="submit"  name="submit">
        </form>
    </center>
	
</body>
</html>