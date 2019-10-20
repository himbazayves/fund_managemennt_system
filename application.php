<?php

session_start();
?>



<?php
include 'db.php';

$fund_id = $_GET['fund_id'];

$applicant_id=$_SESSION['userId'];

$query=mysqli_query($conn,"select * from application where application.applicant_id=$applicant_id  and application.fund_id=$fund_id") or die("selecting error");



$c=mysqli_num_rows($query);


$SelSql = "SELECT * FROM `fund` WHERE fund_id = $fund_id";

$res = mysqli_query($conn, $SelSql);

$row = mysqli_fetch_assoc($res);


if ($c>0)

{

	echo "<script>alert(' you arleady applied to this fund')</script>";
}




else{














if(isset($_POST['submit']))

{

	


	if ($c>0){
		echo "<script>alert(' not submitted ,cause you arleady applied to this fund')</script>";

	}



	else {
	$filename = $_FILES['attachment']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
	$extension = pathinfo($filename, PATHINFO_EXTENSION);
	
	$file = $_FILES['attachment']['tmp_name'];
	$size = $_FILES['attachment']['size'];

	if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['attachment']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
			$now=date("Y-m-d");
			$fund_id=$_POST['fund_id'];
			 $applicant_id=$_POST['applicant_id'];
		   
		   
		   
		   $qry = "INSERT INTO `women_grobal`.`application` (`application_id`, `applicant_id`,`fund_id`, `sub_date`,`attachment`) VALUES (NULL,' $applicant_id','$fund_id','$now','$filename')";
		   
		   
		   $res1 = mysqli_query($conn, $qry);
		   
            
		} 
		else {
            echo "<script>alert('submittion not submitted try again')</script>";
        }
    }
	
	}




    

#$UpdateSql = "UPDATE `employee` SET fname='$fname', lname='$lname',  email='$email',gender='$gender', password='$password' position='$position', username='$username',  department='$department',phone='$phone',      WHERE id=.$id";


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

!-- WRAPPER -->
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

	
		<!-- header -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">

            <form action="#"   class="form-horizontal col-md-6 col-md-offset-3"  enctype="multipart/form-data" method="POST">
			 <?php if ($c>0) : ?> 
                    <?php echo " <div class='alert alert-danger'>you already applied to this fund </div>" ;?> 
                  
            <?php  endif; ?>


			<?php if (isset($_POST['submit'])) : ?> 
			<?php if ($c <= 0):   ?> 

			<?php if ($res1) : ?> 
                    <?php echo " <div class='alert alert-success'>application subtitted </div>" ;?> 
            <?php else : ?>  
			<?php echo " <div class='alert alert-danger'>not subtitted,try again </div>" ;?> 
			<?php  endif; ?> 
            <?php  endif; ?>
			<?php  endif; ?>
<h2>Application Form</h2>

<div class="form-group">

    
    <div class="col-sm-10">
	
<input type="hidden" value="<?php echo  $_SESSION['userId'] ?>" id="defaultLoginFormEmail" class="form-control "   name="applicant_id" required>
</div>
</div>


<div class="form-group">

    
    <div class="col-sm-10">
	
<input type="hidden" value="<?php echo $row['fund_id'] ?>" id="defaultLoginFormEmail" class="form-control "   name="fund_id" required>
</div>
</div>
<div class="form-group">

    
    <div class="col-sm-10">
	<label> Attachment</label>

	<?php if ($c>0) : ?> 
	<input type="file" id="defaultLoginFormEmail" class="form-control "   name="attachment" readonly required>

	<?php else : ?> 
<input type="file" id="defaultLoginFormEmail" class="form-control "   name="attachment" required>
<?php endif;?>

</div>
</div>
  
  



    <div class="col-sm-10">

	<?php if ($c>0) : ?> 
	<input type="submit" class="btn btn-primary disabled col-md-2 col-md-offset-10"  value="submit" disabled>
	<?php else : ?>   

	<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" name="submit" value="submit">

    <?php  endif; ?>
       
       




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
