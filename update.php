<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$fname = $_POST['Fname'];
	$lname = $_POST['Lname'];
    $dob = $_POST['dob'];    
    $age = $_POST['age'];
    $sex=$_POST['sex'];
	 $designation=$_POST['designation'];
	  $salary=$_POST['salary'];
	  $address=$_POST['address'];
	   $contactno=$_POST['contactno'];
	require_once('db_Connect.php');
 
//	$sql = "INSERT INTO `register`(name,password,email,phoneno) VALUES ('$name','$password','$email','$phoneno')";
 $sql="update`staff` set `Fname`='$fname', `Lname`='$Lname', `dob`='$dob', `age`='$age', `sex`='$sex', `designation`='$designation', `salary`='$salary', `address`='$address', `contactno`='$contactno' WHERE `id`='$id'";
	
	if(mysqli_query($conn,$sql)){
		echo "Success";
	}
 
	mysqli_close($conn);
	}else{
		echo "Error";
 }
?>