<?php
session_start();
include 'db.php';
if(isset($_POST['login']))
{
    if(isset($_POST['email']))
    {
        $email=$_POST['email'];
        $_SESSION['email'] = $email;
       
    }
    if(isset($_POST['password']))
    {
        $password=$_POST['password'];
    }
    $query=mysqli_query($conn,"select * from applicant where email='$email' and password='$password'") or die("selecting error");
    $count=mysqli_num_rows($query);
    $row=mysqli_fetch_assoc($query);
    $applicant_id=$row['applicant_id'];
    $_SESSION['userId']=$applicant_id;
    $first_name=$row['first_name'];
    $_SESSION['name']=$first_name;
    
   
    if($count==1)
    {
        if ($row["applicant_status"]== "active")
        {
            echo"<script>location.href='applicantdashboard.php';</script>";
        }
        else 
        {
            echo "<div class='alert alert-danger'>Sorry you seem to be blocked,You are not allowed to use this system,Please contact admin to activate you!</div>";
          
        }
      

        
    }
    
    
        elseif ($count!=1)
        {
        $query=mysqli_query($conn,"select * from admin where email='$email' and password='$password'") or die("selecting error");
        $s=mysqli_num_rows($query);
        $row=mysqli_fetch_assoc($query);
        
        if($s >0)
        {
            echo"<script>location.href='admin_dashboard.php';</script>";
    
        }
        
        
        }



      
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.php">Women grobal fund</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
       
      </ul>
      <form class="form-inline mt-2 mt-md-0">
      <a class="btn btn-warning  btn-sm" href="register.php" role="button">Sign up</a>
      
        <a  class="btn btn-outline-warning btn-sm" href="login.php" role="button">Login</a>
      </form>
    </div>
  </nav>
</header>
    <div class="main">
    <div style="background: black;border-radius:12px" class="container">
            <div class="signup-content">
                <div style="opacity:0.3"  class="signup-img">
                    <img src="images/signup-img.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form">
                        <h2 class="text-warning">applicant Login form</h2>
                        
                        <?php if(isset($_POST['login'])) :?>
                        <?php if ($count !=1 ): ?>

                        <?php if($s != 1): ?>

                        <div class='alert alert-danger'>incorrect password or email, Please try again</div>
                           
                      <?php endif ?>
                      <?php endif ?>
                      <?php endif ?>
                           
                        <div class="form-group">
                            <label  class="text-light" for="birth_date">E-mail :</label>
                            <input style="border-radius:12px" type="email" name="email" id="birth_date">
                        </div>
                        <div class="form-group">
                            <label  class="text-light" for="pincode">Password :</label>
                            <input style="border-radius:12px" type="password" name="password" id="pincode">
                        </div>
                       
                       
                        <div class="form-submit">
                            <input style="border-radius:12px;" type="submit" value="Reset All" class="submit" name="reset" id="reset" />
                            <input  style="background:orange;border-radius:12px" type="submit" value="login" class="submit" name="login" id="submit" /> 
                           
                        </div>

                        <a href="register.php"> Don't have an account? please Sign Up</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>