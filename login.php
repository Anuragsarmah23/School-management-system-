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
	<body style="background:url(img/4.jpg);background-repeat:no-repeat;background-size:100% 100%;height: 100%; width:100%;">
		<div class="modal fade text-light" id="login">
			<div class="modal-dialog">
				<div class="modal-content bg-dark">
					<div class="modal-header">
						<h4 class="modal-title">SMS LOGIN</h4>
						<button type="button" class="close closeBtn text-light" data-dismiss="modal">&times;</button>
					</div>
					<form method="POST" action="loginParse.php" id="loginForm">
						<div class="modal-body">
							<div class="form-group row">
								<label for="id" class="col-md-4 col-form-label text-md-right">USER ID</label>

								<div class="col-md-8" style="color:red;">
									<input type="text" class="form-control" id="id" name="id" placeholder="Enter User ID" data-rule-required="true" data-msg-required="Please enter your ID" autofocus>	
								</div>
							</div>
							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">PASSWORD</label>

								<div class="col-md-8" style="color:red;">
									<input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Password" data-rule-required="true" data-msg-required="Please enter your password">	
								</div>
							</div>
						</div>    
						<div class="modal-footer justify-content-center">
							<button type="submit" class="btn btn-primary btnw100">Login</button>
							<button type="button" class="btn btn-danger btnw100" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div> 
	
			<script>
			$('#loginForm').validate();
			$("#login").on("hidden.bs.modal", function () {
				location.href = "index.php";
			});
			$(window).on('load',function(){
				$('#login').modal('show');
			});
		</script>
	</body>
</html>	