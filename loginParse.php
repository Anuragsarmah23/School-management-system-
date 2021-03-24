<?php
	session_start();
	$con=mysqli_connect('localhost','root','','sms');
	if(!$con)
 			die("CONNECTION NOT FOUND".mysqli_error());
		$id=mysqli_real_escape_string($con,$_POST['id']);
		$pass=mysqli_real_escape_string($con,$_POST['pass']);
		$q="select * from staff WHERE id='$id' AND password='$pass'";
		$q1="select * from admin where id='$id' AND password='$pass'";
		$q_run=mysqli_query($con,$q);
		if(mysqli_num_rows($q_run)>0){
			$_SESSION['staffID']=$id;
			echo '<script>alert("Succesfully logged in");</script>';
			echo '<script>location.href="main.php";</script>';
		}
		else{
			$q1_run=mysqli_query($con,$q1);
			if(mysqli_num_rows($q1_run)>0){
				$_SESSION['adminID']=$id;
				echo '<script>alert("Succesfully logged in AS ADMIN");</script>';
				echo '<script>location.href="dashAdmin.php";</script>';
			}
			else{
				$q2="select * from staff WHERE id='$id'";
				$q2_run=mysqli_query($con,$q2);
				if(mysqli_num_rows($q2_run)>0){
					echo '<script>alert("Invalid password");</script>';
					echo '<script>location.href="login.php";</script>';
				}
				else{
					echo '<script>alert("Invalid ID");</script>';
					echo '<script>location.href="login.php";</script>';
				}	
			}	
		}	
		echo json_encode($datamsg);
?>  