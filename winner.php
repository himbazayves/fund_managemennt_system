<!doctype html>
<html lang="en">

<head>
	<title>Women global fund</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
        <?php include 'admin_admin_navbar.php';?>
			
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
				<ul class="nav">


<li><a href="admin_dashboard.php" class=""><i class="lnr lnr-home"></i> <span>Home</span></a></li>
<li><a href="admin_fund.php" class=""> <span>Manage Fund</span></a></li>


<li>
    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>Account</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
    <div id="subPages" class="collapse ">
        <ul class="nav">
            
            <li><a href="index.php" class="">logout</a></li>
            
        </ul>
    </div>
</li>

</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
			<div class="container-fluid">
				
				
			
				<!-- END OVERVIEW -->
				
				<div class="row">
					<div class=" col-sm-12 col-lg-">
						<!-- RECENT PURCHASES -->
						
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">List of The succesfull applicants</h3>
								
								<div class="right">
									<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
									<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
								</div>
							</div>
							<div class="panel-body no-padding">

							<table class="table table-striped">
									<thead>
										<tr>
										<th>Applicant</th>

											<th>Application</th>
											<th>Fund</th>
											
											
											
										</tr>
									</thead>


		<?php
include 'db.php';


$fund_id = $_GET['fund_id'];

$SelSql = "SELECT * FROM `fund` WHERE fund_id = $fund_id";

$res = mysqli_query($conn, $SelSql);

$r = mysqli_fetch_assoc($res);


if($res){


$fund_id=$r['fund_id'];
$accepted="accepted";

$query1=mysqli_query($conn,"select * from fund, applicant, application where application.applicant_id=applicant.applicant_id  and application.fund_id=fund.fund_id and fund.fund_id=$fund_id ") or die("selecting error");



			while($row=mysqli_fetch_assoc($query1))
				{
			?>
            <?php if($row['status']=="accepted") : ?>

<tbody id="myTable">
										<tr>

										<td><p>First Name : <?php echo   $row['first_name'] ?> </p><br>
										<p>Last Name: <?php echo   $row['last_name'] ?></p><br> 
										<p>	E-mail : <?php echo   $row['email'] ?></p>

											
											</td>
											<td><p>Status : <?php echo   $row['status'] ?> </p><br>
											<p>Date : <?php echo   $row['sub_date'] ?> </p><br> 
											<p>	application ID : <?php echo   $row['application_id'] ?> </p><br> 
											<p>	<a href="uploads/<?php echo $row['attachment'] ?>" target="_blank">attachment</a></p>
											
											</td>
											<td>
											<p>Fund title:<?php echo  $row['title'] ?></p> <br>
											<p>	Fund status:<?php echo  $row['fund_status'] ?></p> <br>
											<p>	Fund ID:<?php echo  $row['fund_id'] ?></p> <br>


											
											</td>

											
											
											</tr>
									
										
										
										
									</tbody>



<?php endif ?>



<?php

}
 }
?>	

</table>


</div>
							
</div>
<!-- END RECENT PURCHASES -->
</div>
<!-- END OVERVIEW -->






</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/toastr/toastr.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
