<?php
	session_start();
    include('db.php');
    $patho_emailid= $_SESSION["patho_emailid"];
    $patho_id= $_SESSION["patho_id"];
    
    if(isset($_GET['test_id'])){
        $test_id=$_GET['test_id'];
    }
   echo $patho_emailid;
  // echo $patho_id;

	
 
	 $test_name = $_POST['test_name'];
    $test_cost = $_POST['test_cost'];
     $test_instructions = $_POST['test_instructions'];
 
	



     $update = mysqli_query($con,"UPDATE test_details SET test_name='$test_name', test_cost='$test_cost', test_instructions='$test_instructions' WHERE test_id='$test_id'");


    if(!$update)
    {
        echo mysqli_error($con);
    }
    else
    {
        echo "Test Records Updated  successfully.";
          header("location:availabletest.php");
        
    }


mysqli_close($con); // Close connection
?>