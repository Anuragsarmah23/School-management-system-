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
				<a href="students.php">
					<li class="list-item active"><i class="fa fa-users"></i><span style="font-size:16px;">Students</span></li><br>
				</a>
				<a href="staff.php">
					<li class="list-item"><i class="fa fa-user"></i><br><span style="font-size:16px;">Staff</span></li><br>
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
					<b>Student Add Form</b>
				</div>
				<form method="post" class="stdReg" id="validateIt" action="addStdParse.php">
				<div class="row">
					<div class="form-group col-md-6">
						<label for="rollno" class="labelElements">Roll No</label>
						<input type="number" name="rollno" min="1" max="30" data-rule-required="true" data-msg-required="Please Enter Roll No" class="form-control" id="rollno" placeholder="Enter Roll No Of Student">
					  </div>
					  <div class="form-group col-md-6">
						<label for="name" class="labelElements">Name</label>
						<input type="text" name="name" data-rule-required="true" data-msg-required="Please Enter Your Name" class="form-control" id="name" placeholder="Enter Name Of Student">
					  </div>
					  
				  </div>
				  <div class="row">
					 <div class="form-group col-md-6">
						<label for="fn" class="labelElements">Father's Name</label>
						<input type="text" name="fn" data-rule-required="true" data-msg-required="Please Enter Father's Name" class="form-control" id="fn" placeholder="Enter Father's Name">
					  </div>
					  <div class="form-group col-md-6">
						<label for="mn" class="labelElements">Mother's Name</label>
						<input type="text" name="mn" data-rule-required="true" data-msg-required="Please Enter Mother's Name" class="form-control" id="mname" placeholder="Enter Mother's Name">
					  </div>
				  
				  </div>
				  <div class="row">
					  <div class="form-group col-md-6">
					    <label class="labelElements" for="dob">DOB</label>
					    <input type="date" name="dob" id="dob" max="2012-01-01" min="2001-01-01" value="2005-01-01" class="form-control" data-rule-required="true" data-msg-required="Please select the date of birth">
					  </div>
					  <div class="form-group col-md-6">
						<label for="gender" class="labelElements">Gender</label><br>
						<input type="radio" name="gender" id="gender" value="Male" checked><span class="labelElements mr-3"> Male</span>
						<input type="radio" name="gender" id="gender" value="Female"><span class="labelElements"> Female</span>
					  </div>	
				  </div> 
				  <div class="row">
					  <div class="form-group col-md-6">
					    <label class="labelElements" for="address">Address</label>
					    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address Of Student" data-rule-required="true" data-msg-required="Please Enter Address">
					  </div>
					  <div class="form-group col-md-6">
						<label for="admissionYear" class="labelElements">Admission Year</label>
						<select name="admissionYear" id="admissionYear" class="form-control" required>
							<option value="">Select Year Of Admission</option>
							<option value="2019">2019</option>
							<option value="2018">2018</option>
							<option value="2017">2017</option>
							<option value="2016">2016</option>
							<option value="2015">2015</option>
						</select>
					  </div>	
				  </div>
				  <div class="row">
					  <div class="form-group col-md-6">
						<label for="class" class="labelElements">Class</label>
						<select name="class" id="class" class="form-control" required>
							<option value="">Select Class</option>
							<option value="Class 10">Class 10</option>
							<option value="Class 9">Class 9</option>
							<option value="Class 8">Class 8</option>
							<option value="Class 7">Class 7</option>
							<option value="Class 6">Class 6</option>
							<option value="Class 5">Class 5</option>
							<option value="Class 4">Class 4</option>
							<option value="Class 3">Class 3</option>
							<option value="Class 2">Class 2</option>
							<option value="Class 1">Class 1</option>
						</select>
					  </div>	
					  <div class="form-group col-md-6">
						<label for="section" class="labelElements">Section</label>
						<select name="section" id="section" class="form-control" required>
							<option value="">Select Section</option>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="C">C</option>
						</select>
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