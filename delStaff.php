<?php
	$con=mysqli_connect("localhost","root","","sms");
	if(!$con)
		die("Error");
	$id = $_GET["id"];
	$q1="delete from staff where id='$id'";
	$q1_run=mysqli_query($con,$q1);
	if($q1_run){
		echo '<script>alert("Deleted succesfully");</script>';
		echo '<script>location.href="staff.php"</script>';
	}else{
		echo '<script>alert("Something went wrong while deleting..");</script>';
		echo '<script>location.href="staff.php"</script>';
	}
	