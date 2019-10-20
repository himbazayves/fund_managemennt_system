<?php
session_start();
?>

<?php
if (isset($_POST['register']))
{
  include 'db.php';

$now=date("Y-m-d");

$title=$_POST['title'];
$description=$_POST['description'];
$deadline=$_POST['deadline'];

$date1=date_create($now);
$date2=date_create($deadline);


if ($date2 > $date1)

{


$qry=$conn->query("INSERT INTO fund (`fund_id`, `publish_date`, `title`, `description`, `deadline`) 
VALUES (NULL, '$now', '$title', '$description', '$deadline')");



    if($qry){

		echo "<script>alert('Fund created sucessfull ')</script>";
		echo"<script>location.href='admin_fund.php';</script>";
	
      
    }

    
   
    
    




else
{

	echo "<script>alert('Fund failed to be created please try again ')</script>";
	
	
}

 

}

else{
	echo "<script>alert('Fund not created please check your deadline  ')</script>";

}


}




?>




<!doctype html>
<html lang="en">

<head>
	<title>Wome Global Fund</title>
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
			<ul class="nav">
			
<?php include 'menu.php' ?>



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
            <form action="#"   class="form-horizontal col-md-6 col-md-offset-3" method="POST">

<h2>New Fund</h2>
<div class="form-group">
    
    <div class="col-sm-10">
	<label> Fund Title</label>
<input type="text" id="defaultLoginFormEmail" class="form-control "   name="title" required>
</div>
</div>
  
  <div class="form-group">
    
    <div class="col-sm-10">
	<label> Fund Description</label>
	<textarea placeholder="Describe  here..."  name="description" class="form-control">
	</textarea>


        </div>
        </div>


  <div class="form-group">
    
    <div class="col-sm-10">
    <label> Fund Deadline</label>
        <input type="date"  class="form-control"  name="deadline" required>
        </div>
        </div>



    <div class="col-sm-10">
       
        <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" name="register" value="create">




        </div>
        </div>

            
</form>
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
