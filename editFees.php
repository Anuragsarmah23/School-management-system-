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
					<li class="list-item"><i class="fa fa-users"></i><span style="font-size:16px;">Students</span></li><br>
				</a>
				<a href="staff.php">
					<li class="list-item"><i class="fa fa-user"></i><br><span style="font-size:16px;">Staff</span></li><br>
				</a>	
				<a href="fees.php">
					<li class="list-item active"><i class="fa fa-money"></i><span style="font-size:16px;">Fees</span></li><br>
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
					<b>Student Edit Form</b>
				</div>
				<?php 
					$id = $_GET["id"]; 
					$con=mysqli_connect("localhost","root","","sms");
					if(!$con)
						die("Error");
					$q="select * from fees where id='$id'";
					$q_run=mysqli_query($con,$q);
					$row=mysqli_fetch_assoc($q_run);
					$q1="select * from student where regno='$row[stdRegNo]'";
					$q1_run=mysqli_query($con,$q1);
					$row1=mysqli_fetch_assoc($q1_run);
					$q2="select * from class where rollno='$row1[rollno]'";
					$q2_run=mysqli_query($con,$q2);
					$row2=mysqli_fetch_assoc($q2_run);
				?>
				<form method="post" class="stdReg" id="validateIt" action="updateFees.php">
				<input type="hidden" value="<?php echo $id; ?>" name="id">
				<div class="row">
					<div class="form-group col-md-6">
						<label for="regno" class="labelElements">Registration Number</label>
						<input style="cursor:no-drop;" value="<?php echo $row1["regno"]; ?>" type="text" name="regno"  readonly  class="form-control" id="regno">
					  </div>
					  <div class="form-group col-md-6">
						<label for="name" class="labelElements">Name</label>
						<input style="cursor:no-drop;" type="text" name="name" readonly value="<?php echo $row1["name"]; ?>" class="form-control" id="name">
					  </div>
					  
				  </div>
				  <div class="row">
					 <div class="form-group col-md-6">
						<label for="class" class="labelElements">Class</label>
						<input type="text" name="class" readonly style="cursor:no-drop;" value="<?php echo $row2["class"]; ?>" class="form-control" id="class">
					  </div>
					  <div class="form-group col-md-6">
						<label for="dues" class="labelElements">Dues(Rs.)</label>
						<input type="text" name="dues" readonly style="cursor:no-drop;" value="<?php echo $row["dues"]; ?>" data-rule-required="true" class="form-control" id="dues">
					  </div>
				  
				  </div>
				  <div class="row">
					  <div class="form-group col-md-6">
					    <label class="labelElements" for="paid">Paid(Rs.)</label>
					    <input type="number" name="paid" id="paid" readonly style="cursor:no-drop;" value="<?php echo $row["paid"]; ?>" class="form-control">
					  </div>
					  <div class="form-group col-md-6">
					    <label class="labelElements" for="pay">Pay(Rs.)</label>
					    <input type="number" name="pay" id="pay" max="<?php echo $row["dues"]; ?>" class="form-control" required>
					  </div>	
				  </div> 
			
					<button type="submit" class="btn btn-primary" style="width:100px;float:right;">Update</button><br><br>
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