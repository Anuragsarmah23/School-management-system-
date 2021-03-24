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
					<li class="list-item active"><i class="fa fa-laptop"></i><span style="font-size:16px;">Dashboard</span></li><br>
				</a>
				<a href="students.php">
					<li class="list-item"><i class="fa fa-users"></i><span style="font-size:16px;">Students</span></li><br>
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
			<div class="chart-container">
				<canvas id="myChart" height="200" style="height:100% !important;"></canvas>
			</div>
			<?php
				//Radhe
				$con=mysqli_connect("localhost","root","","sms");
				if(!$con)
					die("Error");
				$q="select * from student";
				$q_run=mysqli_query($con,$q);
				$rows=mysqli_num_rows($q_run);
				$q1="select * from staff";
				$q1_run=mysqli_query($con,$q1);
				$rows1=mysqli_num_rows($q1_run);
				$q2="select * from fees where dues = 0";
				$q2_run=mysqli_query($con,$q2);
				$rows2=mysqli_num_rows($q2_run);
				$q3="select * from fees where paid != 0";
				$q3_run=mysqli_query($con,$q3);
				$rows3=mysqli_num_rows($q3_run);
			?>
			<div class="row pt-3">
				<div class="col-md-3">
					<div class="card py-4 px-5 hIconR1">
						<div class="row">
							<div class="hIcon">
								<i class="fa fa-money"></i>
							</div>
							<div class="hContent">
								<span style="font-size:11px;">Complete Fee Payments</span><br>
								<?php echo $rows2; ?> 
							</div>
						</div>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="card py-4 px-5 hIconR1">
						<div class="row">
							<div class="hIcon">
								<i class="fa fa-money"></i>
							</div>
							<div class="hContent">
								<span style="font-size:11px;">Partial Fee Payments</span><br>
								<?php echo $rows3; ?> 
							</div>
						</div>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="card py-4 px-5  hIconR2">
						<div class="row">
							<div class="hIcon">
								<i class="fa fa-users"></i>
							</div>
							<div class="hContent">
								<span style="font-size:16px;">Students</span><br>
								<?php echo $rows; ?> 
							</div>
						</div>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="card py-4 px-5 hIconR3">
						<div class="row">
							<div class="hIcon">
								<i class="fa fa-user"></i>
							</div>
							<div class="hContent">
								<span style="font-size:16px;">Staff</span><br>
								<?php echo $rows1; ?> 
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
		<div class="footer">
			&copyopyright 2019 SMS.All Rights Reserved. 
		</div>
		<script>
			var ctx = document.getElementById('myChart').getContext('2d');
			var student=<?php echo $rows; ?>;
			//var room="<?php //echo $rows2; ?>";
			var pfees=<?php echo $rows3; ?>;
			var cfees=<?php echo $rows2; ?>;
			var staff=<?php echo $rows1; ?>;
			var chart = new Chart(ctx, {
				// The type of chart we want to create
				type: 'bar',

				// The data for our dataset
				data: {
					labels: ['Students','Staff', 'Complete Fees','Partial Fees'],
					datasets: [{
						label: 'SMS',
						backgroundColor: 'rgba(255,255,255,0.1)',
						borderColor: '#fff',
						data: [student,staff,cfees,pfees],
					}]
					
				},
				maintainAspectRatio: false,
				// Configuration options go here
				options: {
					legend: {
							// This more specific font property overrides the global property
						labels: {	
							fontColor: 'white'
						}
					
					},
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true,
								fontColor: 'white',
                                stepSize: 1,
                                max: 10
							},
							gridLines: {
								tickMarkLength: 5, 
								color:'rgba(255,255,255,0.2)',
								borderDash:[2]
							},
						}],
					  xAxes: [{
							ticks: {
								fontColor: 'white'
							},
							gridLines: {
								tickMarkLength: 5, 
								color:'rgba(255,255,255,0.4)'
							},
						}],
					}
				}
			});
		</script>
		
	</body>
</html>	