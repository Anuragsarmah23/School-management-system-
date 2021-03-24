<?php
	//RADHEY
	$con=mysqli_connect('localhost','root','','sms');
	if(!$con){
		die("CONNECTION NOT FOUND".mysqli_error());
	}
	$name=$_POST["name"];
	$address=$_POST["address"];
	$gender=$_POST["gender"];
	$dob=$_POST["dob"];
	$doj=$_POST["doj"];
	$salary=$_POST["salary"];
	$designation=$_POST["designation"];
	$password=$_POST["password"];
	$cnfpassword=$_POST["cnfpassword"];
	$id=str_replace(' ','',$name).rand(100,999);
	if($password == $cnfpassword){
		$q="insert into staff values('$id','$name','$address','$gender','$dob','$doj','$salary','$designation','$password')";
		$q_run=mysqli_query($con,$q);
		if($q_run){
			echo '<script>alert("Staff added successfully");</script>';
			echo '<script>location.href="staff.php";</script>';
		}else{
			echo '<script>alert("Something went wrong..Please Try Again..");</script>';
			echo '<script>location.href="addStaff.php";</script>';
		}	
	}else{
		echo '<script>alert("Password did not matched with confirm password..");</script>';
		echo '<script>location.href="addStaff.php";</script>';
	}	
?>