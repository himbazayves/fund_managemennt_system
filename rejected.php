<?php

session_start();
?>
<!doctype html>
<html lang="en">

<head>
	<title>Women GLOBAL FUND</title>
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
                <?php include 'admin_sidebar.php';?>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">

			<div class="container-fluid">
			<input class="form-control border-primary" id="myInput" type="text" placeholder=" Search your order........."> 
			
					<!-- END OVERVIEW -->
					
					<div class="row">
						<div class=" col-sm-12 col-lg-">
                            <!-- RECENT PURCHASES -->
							
							<div class="panel">
								<div class="panel-heading">
                                    <h3 class="panel-title">All My  rejected Application</h3>
                                    
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">

                                <table class="table table-striped">
										<thead>
											<tr>
												<th>Application</th>
												<th>Fund</th>
												
												
											</tr>
										</thead>


			<?php
include 'db.php';


$applicant_id=$_SESSION['userId'];


$query1=mysqli_query($conn,"select * from application, applicant, fund where application.applicant_id=applicant.applicant_id and applicant.applicant_id=$applicant_id and application.fund_id=fund.fund_id") or die("selecting error");



                while($row=mysqli_fetch_assoc($query1))
                    {
                ?>
    <?php if ($row['status']=="rejected") : ?>

<tbody id="myTable">


<?php 
$now=  date("Y-m-d");
$date1=date_create($now);
$deadline=$row['deadline'] ;
$date2=date_create($deadline);




?>

  




											<tr>
												<td>applicant Id : <?php echo   $row['applicant_id'] ?><br>
												    
                                                    Date : <?php echo   $row['sub_date'] ?><br> 
                                                    application ID : <?php echo   $row['application_id'] ?><br>
                                                     
													<?php if ($row['status']=="accepted") : ?> 
	                                              
												  status: <span class="label label-success">accepted</span> <br>
												   
													<?php elseif ($row['status']=="rejected") : ?>
													status: <span class="label label-danger">rejected</span><br>
													<?php else  : ?>

													status:<span class="label label-warning">pending</span><br

													<?php endif ?>
                                                </td>
												<td>
												Fund ID:<?php echo  $row['fund_id'] ?> <br>
												
												Fund title:<?php echo  $row['title'] ?> <br>
                                                    
                                                   

													<?php if ($deadline>$now) : ?> 
	                                              
													status: <span class="label label-success">active</span> 
                                                     
	                                                  <?php else : ?>
													  status: <span class="label label-danger">closed</span>

													  <?php endif ?>


                                               
										
											
											
											
										</tbody>
  

<?php endif ?>




    <?php
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

	<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>

</html>
