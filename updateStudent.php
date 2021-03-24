<?php
	//RADHEY
	$con=mysqli_connect('localhost','root','','sms');
	if(!$con){
		die("CONNECTION NOT FOUND".mysqli_error());
	}
	$name=$_POST["name"];
	$fn=$_POST["fn"];
	$mn=$_POST["mn"];
	$rollno=$_POST["rollno"];
	$dob=$_POST["dob"];
	$gender=$_POST["gender"];
	$address=$_POST["address"];
	$aY=$_POST["admissionYear"];
	$q="update student set name='$name',fname='$fn',mname='$mn',dob='$dob',gender='$gender',address='$address',admissionYear='$aY' where rollno='$rollno'";
	$q_run=mysqli_query($con,$q);
	if($q_run){
		echo '<script>alert("Updated Succesfully");</script>';
		echo '<script>location.href="students.php";</script>';
	}else{
		echo '<script>alert("Something went wrong..Try Again..");</script>';
		echo '<script>location.href="students.php";</script>';
	}
		