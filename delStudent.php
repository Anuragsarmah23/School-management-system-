<?php
	$con=mysqli_connect("localhost","root","","sms");
	if(!$con)
		die("Error");
	$reg = $_GET["regno"];
	$q1="select * from student where regno='$reg'";
	$q1_run=mysqli_query($con,$q1);
	$row=mysqli_fetch_assoc($q1_run);
	$q="delete from fees where stdRegNo='$reg'";
	$q_run=mysqli_query($con,$q);
	$q2="delete from class where rollno='$row[rollno]'";
	$q2_run=mysqli_query($con,$q2);
	$q3="delete from student where regno='$reg'";
	$q3_run=mysqli_query($con,$q3);
	if($q_run && $q2_run && $q3_run){
		echo '<script>alert("Deleted succesfully");</script>';
		echo '<script>location.href="students.php"</script>';
	}else{
		echo '<script>alert("Something went wrong while deleting..");</script>';
		echo '<script>location.href="students.php"</script>';
	}
	