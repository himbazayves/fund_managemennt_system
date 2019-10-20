
<?php
session_start();
?>

<?php
if (isset($_POST['register']))
{
  include 'db.php';



$email=$_POST['email'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$telephone=$_POST['telephone'];
$gender=$_POST['gender'];
$province=$_POST['province'];
$district=$_POST['district'];
$id=$_POST['id'];
$password=$_POST['password'];
$repeat_password=$_POST['repeat_password'];

$category=$_POST['category'];

if($gender=="female"){
if ($password== $repeat_password)

{


$qry=$conn->query("INSERT INTO applicant (`applicant_id`, `email`, `first_name`, `last_name`, `telephone`, `gender`, `province`, `district`, `id`, `password`,`category`) 
VALUES (NULL, '$email', '$first_name', '$last_name', '$telephone', '$gender', '$province','$district', '$id', '$password','$category')");



    if($qry){
      echo "<div class='alert alert-success'>Registred sucessfull</div>";
      
    }

    
   
    
    




else
{

  
    echo "<div class='alert alert-danger'>Unable to Register , Please try again</div>";
}

 

}

else{
    echo "<div class='alert alert-danger'>Unable to Registe, password dosnt match</div>";

}


}


else {

    echo "<div class='alert alert-danger'>Unable to Register, Only women are allowed to apply</div>";

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
  <nav  class="navbar navbar-expand-md navbar-dark bg-dark fixed-top ">
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
      <a class="btn btn-warning btn-sm" href="register.php" role="button">Sign up</a>
      
        <a class="btn btn-outline-warning btn-sm" href="login.php" role="button">Login</a>
      </form>
    </div>
  </nav>
</header>
    <div class="main">
        <div style="background: black;border-radius:12px" class="container">
            <div class="signup-content">
                <div style="opacity:0.3" class="signup-img">
                    <img style="height:1050px; width:650px" src="images/signup-img.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form">
                        <h2 class="text-warning">Women Registration form</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label  class="text-light" for="name">First Name :</label>
                                <input style="border-radius:12px" type="text" name="first_name" id="name" required/>
                            </div>
                            <div class="form-group">
                                <label class="text-light" for="father_name">Last Name :</label>
                                <input style="border-radius:12px" type="text" name="last_name" id="father_name" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="text-light" for="address">TEL No :</label>
                            <input style="border-radius:12px" type="text" name="telephone" id="address" required/>
                        </div>
                        <div class="form-radio">
                            <label class="text-light" for="gender" class="radio-label">Gender :</label>
                            <div class="form-radio-item">
                                <input value="male" type="radio" name="gender" id="male" checked>
                                <label class="text-light" for="male">Male</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input value="female" type="radio" name="gender" id="female">
                                <label class="text-light" for="female">Female</label>
                                <span class="check"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="text-light" for="state">Province :</label>
                                <input style="border-radius:12px" type="text" name="province" id="address" required/>
                            </div>
                            <div class="form-group">
                                <label class="text-light" for="city">District :</label>
                                <input style="border-radius:12px" type="text" name="district" id="address" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-light" for="email">Category<span>(ikiciro cy'ubudehe) </span> :</label>
                            <input style="border-radius:12px" type="text" name="category" id="email" />
                        </div>

                        <div class="form-group">
                            <label class="text-light" for="email">National-ID :</label>
                            <input style="border-radius:12px" type="text" name="id" id="email" />
                        </div>
                        <div class="form-group">
                            <label class="text-light" for="email">Email-ID :</label>
                            <input style="border-radius:12px" type="email" name="email" id="email" />
                        </div>
                        <div class="form-group">
                            <label class="text-light" for="birth_date">Password :</label>
                            <input style="border-radius:12px" type="password" name="password" id="birth_date">
                        </div>
                        <div class="form-group">
                            <label class="text-light" for="pincode">Repeat password :</label>
                            <input style="border-radius:12px" type="password" name="repeat_password" id="pincode">
                        </div>
                        
                        
                        <div class="form-submit">
                            <input style="border-radius:12px; color:orange" type="submit" value="Reset All" class="submit" name="reset" id="reset" />
                            <input  style="background:orange;border-radius:12px" type="submit" value="Register" class="submit" name="register" id="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>