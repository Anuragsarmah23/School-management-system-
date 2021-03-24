<?php
	//RADHEY
	$con=mysqli_connect('localhost','root','','sms');
	if(!$con){
		die("CONNECTION NOT FOUND".mysqli_error());
	}
	$id=$_POST["id"];
	$dues=$_POST["dues"];
	$paid=$_POST["paid"];
	$pay=$_POST["pay"];
	$tpaid=$paid+$pay;
	$duesN=$dues-$pay;
	$q="update fees set paid='$tpaid',dues='$duesN' where id='$id'";
	$q_run=mysqli_query($con,$q);
	if($q_run){
		echo '<script>alert("Updated Succesfully");</script>';
		echo '<script>location.href="fees.php";</script>';
	}else{
		echo '<script>alert("Something went wrong..Try Again..");</script>';
		echo '<script>location.href="fees.php";</script>';
	}
		