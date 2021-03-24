<?php
	session_start();
	if(!isset($_SESSION["adminID"])){
		if(!isset($_SESSION["staffID"])) 
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
		
		<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.bootstrap4.min.css" rel="stylesheet">

		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
		<script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
		
	</head>
	
	<body>
		<div class="sidebar">
			<div class="sidebarBrand">
			<?php if(isset($_SESSION["adminID"])){ ?>
				ADMIN
			<?php }else{
				echo 'STAFF';
			} ?>
			</div>
			<ul class="sideList">
			<?php if(isset($_SESSION["adminID"])){ ?>
				<a href="dashAdmin.php">
					<li class="list-item"><i class="fa fa-laptop"></i><span style="font-size:16px;">Dashboard</span></li><br>
				</a>
			<?php }else{?>
				<a href="main.php">
					<li class="list-item"><i class="fa fa-laptop"></i><span style="font-size:16px;">Dashboard</span></li><br>
				</a>
			<?php } ?>	
				<a href="students.php">
					<li class="list-item active"><i class="fa fa-users"></i><span style="font-size:16px;">Students</span></li><br>
				</a>
				<a href="staff.php">
					<li class="list-item"><i class="fa fa-user"></i><br><span style="font-size:16px;">Staff</span></li><br>
				</a>	
			<?php if(isset($_SESSION["adminID"])){ ?>	
				<a href="fees.php">
					<li class="list-item"><i class="fa fa-money"></i><span style="font-size:16px;">Fees</span></li><br>
				</a>
			<?php  } ?>	
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
            <div class="container-fluid">
                <div class="row">
                    <div class="card" style="min-height:82vh;padding:20px;width:100%;">
						<div class="row card-header mx-2" style="font-size:16px;color:#a912df;">
							<b>STUDENT LIST</b>
							<?php if(isset($_SESSION["adminID"])){ ?>
							<a href="addStd.php" class="ml-auto"><i class="fa fa-plus"></i> ADD STUDENT</a>
							<?php } ?>
						</div><hr>
						<?php
							//Radhe
							$con=mysqli_connect("localhost","root","","sms");
							if(!$con)
								die("Error");
							$q="select * from student";
							$q_run=mysqli_query($con,$q);
							$rows=mysqli_num_rows($q_run);
							if($rows > 0){
						?>
						<table id="studentList" class="table table-striped table-bordered bg-white" style="width:100%">
						
							<thead>
								<tr>	
									<th>Registration No</th>
									<th>Name</th>
									<th>Father's Name</th>
									<th>Mother's Name</th>
									<th>Roll No</th>
									<th>DOB</th>
									<th>Gender</th>
									<th>Address</th>
									<th>Admission Year</th>
									<th>Class</th>
									<th>Sec</th>
									<?php if(isset($_SESSION["adminID"])){ ?>
									<th>EDIT</th>
									<th>DEL</th>
									<?php } ?>
								</tr>
							</thead>
							<tbody>
							<?php
								while($row=mysqli_fetch_assoc($q_run)){
									$q1="select * from class where rollno='$row[rollno]'";
									$q1_run=mysqli_query($con,$q1);
									$row1=mysqli_fetch_assoc($q1_run);
									
							?>
								<tr>
									<td><?php echo $row["regno"]; ?></td>
									<td><?php echo $row["name"]; ?></td>
									<td><?php echo $row["fname"]; ?></td>
									<td><?php echo $row["mname"]; ?></td>
									<td><?php echo $row["rollno"]; ?></td>
									<td><?php echo $row["dob"]; ?></td>
									<td><?php echo $row["gender"]; ?></td>
									<td><?php echo $row["address"]; ?></td>
									<td><?php echo $row["admissionYear"]; ?></td>
									<td><?php echo $row1["class"]; ?></td>
									<td><?php echo $row1["sec"]; ?></td>
									<?php if(isset($_SESSION['adminID'])){ ?>
									<td><a href="editStudent.php?regno=<?php echo $row['regno']; ?>"><i class="fa fa-edit editI"></i></a></td>
									<td><a href="delStudent.php?regno=<?php echo $row['regno']; ?>"><i class="fa fa-trash delI"></i></a></td>
									<?php }?>
								</tr>	
							<?php
								}
							?>	
							</tbody>
							
						</table>
								<?php
									}else{
										echo "<b>No records to display</b>";
									}
								?>	
					</div>
                </div>
            </div>
        </div>
		<div class="footer">
			&copyopyright 2019 SMS.All Rights Reserved. 
		</div>
		<script>
			$(document).ready(function() {
				$('#studentList').DataTable({
					scrollX:true,
					fixedColumns:   true,
				});
			} );
		</script>
		
	</body>
</html>	