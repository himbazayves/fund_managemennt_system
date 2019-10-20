

<?php
session_start();
include 'db.php';
$applicant_id = $_GET['applicant_id'];

$query1=mysqli_query($conn,"select * from applicant  WHERE applicant_id=$applicant_id  ") or die("selecting error");
$row=mysqli_fetch_assoc($query1);
if (isset($_POST['block'])){
    // Include config file
    $applicant_id = $_GET['applicant_id'];
    
	$status="blocked";  

$qry=$conn->query("UPDATE  `women_grobal`.`applicant` SET applicant_status='$status' WHERE applicant_id=$applicant_id ");

	

//$qry=$conn->query("INSERT INTO `human_ressource`.`employee` (`id`, `email`, `fname`, `lname`, `phone`, `gender`, `position`, `username`, `password`) 
//VALUES (NULL, '$email', '$fname', '$lname', '$phone', '$gender', '$position', '$username', '$password')");


if($qry)
{   echo "<script>alert('applicant blocked ')</script>";
	echo"<script>location.href='applicant.php';</script>";

}
else
{
	echo "<script>alert('fail to block try again')</script>";
	
}
}






if (isset($_POST['activate'])){
    // Include config file
    $applicant_id = $_GET['applicant_id'];
    
	$status="active";  

$qry=$conn->query("UPDATE  `women_grobal`.`applicant` SET applicant_status='$status' WHERE applicant_id=$applicant_id ");

	

//$qry=$conn->query("INSERT INTO `human_ressource`.`employee` (`id`, `email`, `fname`, `lname`, `phone`, `gender`, `position`, `username`, `password`) 
//VALUES (NULL, '$email', '$fname', '$lname', '$phone', '$gender', '$position', '$username', '$password')");


if($qry)
{   echo "<script>alert('applicant activated ')</script>";
	echo"<script>location.href='applicant.php';</script>";

}
else
{
	echo "<script>alert('fail to activate try again')</script>";
	
}
}





?>





<!doctype html>
<html lang="en">

<head>
	<title>Notifications | Klorofil - Free Bootstrap Dashboard Template</title>
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
        <?php include 'admin_navbar.php';?>
			
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
								<h3 class="panel-title">Response</h3>
								
								<div class="right">
									<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
									<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
								</div>
							</div>
							<div class="panel-body no-padding">

                            <?php if($row['applicant_status']=="active")  : ?>

                            <form  method="post">

<h5> are You sure You want to block this user?</h5>
<div class="form-group">

<input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

</div>
<div class="form-group">

<a href="applicant.php"  type="submit" class="btn btn-success">No</a>
<button name="block" type="submit" class="btn btn-danger">Yes</button>

</div>
</form>

<?php else  : ?>

<form  method="post">

<h5> are You sure You want to activate this user?</h5>
<div class="form-group">

<input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

</div>
<div class="form-group">

<a href="applicant.php"  type="submit" class="btn btn-success">No</a>
<button name="activate" type="submit" class="btn btn-danger">Yes</button>

</div>
</form>




<?php endif ?>




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
