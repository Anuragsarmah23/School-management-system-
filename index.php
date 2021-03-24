<html>
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width,initial-scale=1.0" name="viewport">
		<title>SMS</title>
		
		<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
		
		<link href="css/bootstrap.min.css" rel="stylesheet" >
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link href="css/animate.min.css" rel="stylesheet">
		<link href="css/style2.css" rel="stylesheet">
		
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-2.1.0.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.validate.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
		
	</head>
	<body>
		<nav class="navbar navbar-default text-dark" style="background:rgba(0,0,0,0.8);">
			<ul class="nav mr-auto">
				<li>
					<a class="navbar-brand text-light" href="index.php" style="font-size:22px;font-weight:900;">SMS</a>
				</li>
			</ul>
			<ul class="nav ml-auto">
				<li>
					<a class="navbar-brand text-light" href="#contact" style="font-size:16px;font-weight:400;"><i class="fa fa-phone"></i> CONTACT US</a>
				</li>
				<li>
					<a class="navbar-brand text-light" href="#about" style="font-size:16px;font-weight:400;"><i class="fa fa-question"></i> ABOUT US</a>
				</li>
				<li>
					<a class="navbar-brand text-light" href="login.php" style="font-size:16px;font-weight:400;">LOGIN</a>
				</li>
			</ul>
		</nav>
		<div class="main">
			<div class="mainOverlay">
				<center><div id="h1" style="text-transform:uppercase;font-weight:900;font-size:30px;">Welcome to School Management System</div>
				<br><a href="login.php" class="btn btn-primary" style="border-radius:20px;width:120px;">LOGIN</a>
				</center>
			</div>
		</div>
		<div id="about" style="background:#e1e2e3;padding:30px;height:90vh;">
			<div class="container">
				<div class="card bg-dark" style="height:70vh;">
					<div class="container">
						<div class="card-header text-light">
							<b>ABOUT US</b>
						</div>
						<div class="card-body text-light" style="padding-top:40px;padding-bottom:40px;padding-left:80px;padding-right:80px;font-size:16px;text-align:justify;">
							<div>
								<img src="img/sms.jpg">
							</div><br><br>
							<div>
								We welcome you to school management system. A website which deals with student personal details management along with fees details. Two users Admin and Staff are allowed to access students data. Only admin is allowed to perform operations such as edit..delete.. 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="contact" style="padding:40px;background:#f1f2f3;">
      <div class="container">

        <div class="section-header">
         <center> <h3>Contact Us</h3>
          <p>For any query contact us.</p></center>
        </div><br><br><br><br><br><br>

        <center> <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address text-info">
              <i class="fa fa-map-marker"></i>
              <h3>Address</h3>
              <address>pan Bazar, Ghy-781001</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone text-danger">
              <i class="fa fa-phone"></i>
              <h3>Phone Number</h3>
              <p><a href="#">+91 0000000000</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email text-success">
              <i class="fa fa-envelope"></i>
              <h3>Email</h3>
              <p><a href="#">sms@sms.com</a></p>
            </div>
          </div>

        </div></center> 

      </div>
    </div>
		<div class="footer">
			<center>&copy; Copyright <strong>SMS</strong>. All Rights Reserved</center>
		</div>
		
	</body>
</html>	