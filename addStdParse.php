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
	$qR="select * from student where rollno='$rollno'";
	$qrR=mysqli_query($con,$qR);
	$rowsR=mysqli_num_rows($qrR);
	if($rowsR > 0){
		echo '<script>alert("Student already added with this roll number..");</script>';
		echo '<script>location.href="students.php";</script>';
	}else{
		$dob=$_POST["dob"];
		$gender=$_POST["gender"];
		$address=$_POST["address"];
		$aY=$_POST["admissionYear"];
		$class=$_POST["class"];
		$classW=str_replace(' ', '', $class);
		$sec=$_POST["section"];
		$qCS="select * from class where class='$class' and sec='$sec' and admittedYear='$aY'";
		$qCSR=mysqli_query($con,$qCS);
		$rowsCSR=mysqli_num_rows($qCSR);
		if($rowsCSR >= 10){
			echo '<script>alert("Section Full.. Add on another..");</script>';
			echo '<script>location.href="students.php";</script>';
		}else{
			$q1="select * from class where class='$class' and admittedYear='$aY'";
			$q1_run=mysqli_query($con,$q1);
			$rows1=mysqli_num_rows($q1_run);
			if($rows1 == 0)
				$no=1;
			else
				$no=$rows1+1;
			$regno=$classW.$aY.$no;
			if( ($class == "Class 1") || ($class == "Class 2") || ($class == "Class 3") || ($class == "Class 4") )
				$fees=10000;
			if( ($class == "Class 5") || ($class == "Class 6") || ($class == "Class 7") )
				$fees=20000;
			if( ($class == "Class 9") || ($class == "Class 10") )
				$fees=25000;
			$q="insert into student values('$regno','$name','$fn','$mn','$rollno','$dob','$gender','$address','$aY')";
			$q_run=mysqli_query($con,$q);
			if($q_run){
				$q2="insert into class(class,rollno,sec,admittedYear) values('$class','$rollno','$sec','$aY')";
				$q2_run=mysqli_query($con,$q2);
				$q3="insert into fees(stdRegNo,paid,dues) values('$regno',0,'$fees')";
				$q3_run=mysqli_query($con,$q3);
				if($q2_run && $q3_run){
					echo '<script>alert("Student added succesfully...");</script>';
					echo '<script>location.href="students.php";</script>';
				}else{
					echo '<script>alert("Something went wrong..Please Try Again..");</script>';
					echo '<script>location.href="addStd.php";</script>';
				}
			}else{
				echo '<script>alert("Something went wrong..Please Try Again..");</script>';
				echo '<script>location.href="addStd.php";</script>';
			}
		}
	}

?>