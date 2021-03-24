<?php
	//RADHEY
	session_start();
	$con=mysqli_connect('localhost','root','','sms');
	if(!$con){
		die("CONNECTION NOT FOUND".mysqli_error());
	}
	$id=$_POST["id"];
	$name=$_POST["name"];
	$address=$_POST["address"];
	$dob=$_POST["dob"];
	$gender=$_POST["gender"];
	$doj=$_POST["doj"];
	$salary=$_POST["salary"];
	$designation=$_POST["designation"];
	$q="update staff set name='$name',address='$address',dob='$dob',gender='$gender',doj='$doj',salary='$salary',designation='$designation' where id='$id'";
	$q_run=mysqli_query($con,$q);
	if($q_run){
		echo '<script>alert("Updated Succesfully");</script>';
		if(isset($_SESSION["staffID"]))
			echo '<script>location.href="main.php";</script>';
		else
			echo '<script>location.href="staff.php";</script>';
	}else{
		echo '<script>alert("Something went wrong..Try Again..");</script>';
		if(isset($_SESSION["staffID"]))
			echo '<script>location.href="main.php";</script>';
		else	
			echo '<script>location.href="staff.php";</script>';
	}
		