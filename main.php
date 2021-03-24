<?php
	session_start();
	if(!isset($_SESSION["staffID"])){
		header("location:index.php");
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width,initial-scale=1.0" name="viewport">
		<title>SMS</title>
		
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
		
		<link href="css/bootstrap.min.css" rel="stylesheet" >
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link href="css/animate.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-2.1.0.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.validate.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
		
	</head>
	
	<body>
		<div class="sidebar">
			<div class="sidebarBrand">
				STAFF
			</div>
			<ul class="sideList">
				<a href="main.php">
					<li class="list-item active"><i class="fa fa-laptop"></i><span style="font-size:16px;">Dashboard</span></li><br>
				</a>
				<a href="students.php">
					<li class="list-item"><i class="fa fa-users"></i><span style="font-size:16px;">Students</span></li><br>
				</a>
				<a href="staffDetails.php">
					<li class="list-item"><i class="fa fa-user"></i><br><span style="font-size:16px;">Staff</span></li><br>
				</a>	
			</ul>	
		</div>
		<div class="navbar">
			<div class="row navbarContent">
				<a class="nav-link" href="main.php">Dashboard</a>
				<a class="nav-link" style="margin-left:52vw;" href="logout.php">Logout</a>
				<a class="nav-link" style="margin-left:1vw;" href="index.php">SMS</a>
			</div>
		</div>
		<div class="main">
			<div class="card-header">
				ENTER STAFF DETAILS
			</div>
			<?php
				$id=$_SESSION["staffID"];
				$con=mysqli_connect('localhost','root','','sms');
				if(!$con){
					die("CONNECTION NOT FOUND".mysqli_error());
				}
				$q="select * from staff where id='$id'";
				$q_run=mysqli_query($con,$q);
				$row1=mysqli_fetch_assoc($q_run);
			?>
			<div class="bg-white p-4" style="min-height:92vh;">
				<form method="post" action="updateStaff.php" id="validateIt" class="stdReg">
					<div class="row">
						<div class="col-md-6 form-group">
							<label class="labelT" for="id">ID(disabled)</label>
							<input type="text" name="id" id="id" readonly class="form-control" value="<?php echo $row1["id"]; ?>">
							<div class="validation"></div>
						</div>
						<div class="col-md-6 form-group">
							<label class="labelT" for="name">FULL NAME</label>
							<input type="text" name="name" id="name" class="form-control" placeholder="Enter Full Name" data-rule-required="true" data-msg-required="Please enter the name" value="<?php echo $row1["name"]; ?>">
							<div class="validation"></div>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-6 form-group">
							<label class="labelT" for="gender">Gender</label>
							<select name="gender" class="form-control">
								<option value="<?php echo  $row1["gender"]; ?>"><?php echo  $row1["gender"]; ?></option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
							<div class="validation"></div>
						</div>
						<div class="col-md-6 form-group">
							<label class="labelT" for="designation">DESIGNATION</label>
							<input type="text" name="designation" id="designation" class="form-control" placeholder="Enter Designation" data-rule-required="true" data-msg-required="Please enter the designation" value="<?php echo $row1["designation"]; ?>">
							<div class="validation"></div>
						</div>
					</div>	
					<div class="row">	
						<div class="col-md-6 form-group">
							<label class="labelT" for="salary">Salary(Rs.)</label>
							<input type="text" name="salary" id="salary" class="form-control" placeholder="Enter Salary" data-rule-required="true" data-msg-required="Please enter the salary" data-rule-numbersonly="true" data-msg-numbersonly="Salary should not contain any alphabet" value="<?php echo $row1["salary"]; ?>">
							<div class="validation"></div>
						</div>
						<div class="col-md-6 form-group">
							<label class="labelT" for="address">ADDRESS</label>
							<input type="text" name="address" id="address" class="form-control" placeholder="Enter address" data-rule-required="true" data-msg-required="Please enter the address" value="<?php echo $row1["address"]; ?>">
							<div class="validation"></div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6 form-group">
							<label class="labelT" for="dob">DOB</label>
							<input type="date" name="dob" id="dob" max="2001-04-31" min="1990-01-01" value="2000-04-01" class="form-control" data-rule-required="true" data-msg-required="Please select the date of birth" value="<?php echo $row1["dob"]; ?>">
						</div>
						<div class="col-md-6 form-group">
							<label class="labelT" for="doj">DOJ</label>
							<input type="date" name="doj" id="doj" max="2019-01-01" min="1960-01-01" value="2010-04-01" class="form-control" data-rule-required="true" data-msg-required="Please select the date of joining" value="<?php echo $row1["doj"]; ?>">
						</div>
					</div>
						<button type="submit" class="btn btn-primary pull-right p-3" style="width:20%;">Update Details</button>
					<div id="cnfmsg">Success</div>
					<!--<div id="emailmsg">Email already exist</div>-->
					<div id="errormsg">Something went wrong...Please try again</div> 
				</form>
			</div> 
		</div>
		<div class="footer">
			&copyopyright 2019 SMS.All Rights Reserved. 
		</div>
		
		
	</body>
</html>	