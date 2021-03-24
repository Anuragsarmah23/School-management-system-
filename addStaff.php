<?php
	session_start();
	if(!isset($_SESSION["adminID"])){
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
				ADMIN
			</div>
			<ul class="sideList">
				<a href="dashAdmin.php">
					<li class="list-item"><i class="fa fa-laptop"></i><span style="font-size:16px;">Dashboard</span></li><br>
				</a>
				<a href="Staffs.php">
					<li class="list-item"><i class="fa fa-users"></i><span style="font-size:16px;">Staffs</span></li><br>
				</a>
				<a href="staff.php">
					<li class="list-item active"><i class="fa fa-user"></i><br><span style="font-size:16px;">Staff</span></li><br>
				</a>	
				<a href="fees.php">
					<li class="list-item"><i class="fa fa-money"></i><span style="font-size:16px;">Fees</span></li><br>
				</a>
			</ul>	
		</div>
		<div class="navbar">
			<div class="row navbarContent">
				<a class="nav-link" href="dashAdmin.php">Dashboard</a>
				<a class="nav-link" style="margin-left:52vw;" href="logout.php">Logout</a>
				<a class="nav-link" style="margin-left:1vw;" href="index.php">SMS</a>
			</div>
		</div>
		<div class="main">
			<div class="container-fluid bg-white p-4">
				<div class="card-header mb-3 bg-info text-light">
					<b>Staff Add Form</b>
				</div>
				<form method="post" class="stdReg" id="validateIt" action="addStaffParse.php">
				<div class="row">
					  <div class="form-group col-md-6">
						<label for="name" class="labelElements">Name</label>
						<input type="text" name="name" data-rule-required="true" data-msg-required="Please Enter Your Name" class="form-control" id="name" placeholder="Enter Name Of Staff">
					  </div>
					   <div class="form-group col-md-6">
					    <label class="labelElements" for="address">Address</label>
					    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address Of Staff" data-rule-required="true" data-msg-required="Please Enter Address">
					  </div>
				  </div>
				  <div class="row">
					  <div class="form-group col-md-6">
					    <label class="labelElements" for="dob">DOB</label>
					    <input type="date" name="dob" id="dob" max="2001-01-01" min="1981-01-01" value="1996-03-08" class="form-control" data-rule-required="true" data-msg-required="Please select the date of birth">
					  </div>
					  <div class="form-group col-md-6">
						<label for="gender" class="labelElements">Gender</label><br>
						<input type="radio" name="gender" id="gender" value="Male" checked><span class="labelElements mr-3"> Male</span>
						<input type="radio" name="gender" id="gender" value="Female"><span class="labelElements"> Female</span>
					  </div>	
				  </div> 
				  <div class="row">
					 <div class="form-group col-md-6">
					    <label class="labelElements" for="doj">DOJ</label>
					    <input type="date" name="doj" id="doj" max="2019-06-06" min="2001-01-01" value="2005-01-01" class="form-control" data-rule-required="true" data-msg-required="Please select the date of joining">
					  </div>
					  <div class="form-group col-md-6">
					    <label class="labelElements" for="salary">Salary(Rs.)</label>
					    <input type="number" name="salary" id="salary" class="form-control" placeholder="Enter Salary Of Staff" data-rule-required="true" data-msg-required="Please Enter Salary">
					  </div>
				  </div>
				  <div class="row">
					 <div class="form-group col-md-6">
					    <label class="labelElements" for="designation">Designation</label>
					    <input type="text" name="designation" id="designation" class="form-control" placeholder="Enter Designation Of Staff" data-rule-required="true" data-msg-required="Please Enter Designation">
					  </div>
				  </div>
				  <div class="row">
					 <div class="form-group col-md-6">
					    <label class="labelElements" for="password">Password</label>
					    <input type="password" name="password" id="password" class="form-control" placeholder="Set Password for Staff" data-rule-required="true" data-msg-required="Please Enter Password">
					  </div>
					  <div class="form-group col-md-6">
					    <label class="labelElements" for="cnfpassword">Confirm Password</label>
					    <input type="password" name="cnfpassword" id="cnfpassword"  class="form-control" placeholder="Confirm Password" data-rule-required="true" data-msg-required="Please Confirm Password">
					  </div>
				  </div>
					<button type="submit" class="btn btn-primary" style="width:100px;float:right;">ADD</button><br><br>
				</form>
			</div>
		</div>
		
		<div class="footer">
			&copyopyright 2019 SMS.All Rights Reserved. 
		</div>
	
	<script>
		$('#validateIt').validate();
	</script>
		
		
	</body>
</html>	