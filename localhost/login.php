<?php
$errors = array();
session_start();
//$db = mysqli_connect('localhost', 'root', 'toor', 'AutismICare');
$db = mysqli_connect('localhost', 'root', '', 'AIC');

if (isset($_REQUEST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_REQUEST['email']);
  $password = mysqli_real_escape_string($db, $_REQUEST['password']);
  $password = md5($password);
  $query = "SELECT * FROM User WHERE U_email='$email' AND U_password='$password'";
  $results = mysqli_query($db, $query);
  if (mysqli_num_rows($results) == true) {
      $_SESSION['email'] = $email;
      
      header('location: indexs.php');
    }else {
      array_push($errors, "Invalid email or password");
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Autism I Care </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>
  <link rel="stylesheet" href="css/signup.css">  

</head>

<body>

<!-- Start Top Nav Bar -->
  <nav class="navbar navbar-expand-md bg-success navbar-dark fixed-top">
    <a class="navbar-brand" href="index.php">AutismICare</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item ml-2">
          <a class="nav-link" href="fact.php"><i class="fa fa-bullhorn"></i> Facts about Autism  </a>
        </li>
        <li class="nav-item ml-2">
          <a class="nav-link" href="event.php"><i class="fa fa-calendar"></i> Upcoming Autism Events  </a>
        </li>  
        <li class="nav-item ml-2">
          <a class="nav-link" href="trackerMain.php"><i class="fa fa-book"></i> Mood & Behaviour Tracker  </a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i>   Signup / Sign-in  </a>       
        </li>    
      </ul>
    </div>  
  </nav>
<!-- End Top Nav Bar -->

<!-- Start contents -->
  <div class="container-fluid mt-5" style="text-align:center">
    <br><h2>Join us</h2>
    <p>Become part of our community!</p>
    <div class="container">
      <form method="post">
        <h3 class="mt-3" style="text-align:center">Sign in<br></h3>
        <!-- Start row -->
          <div class="col-sm-8" style="width:100%;margin:auto; display:block;">
            <div class="mx-2">
            <?php include('errors.php'); ?>            
            <input type="text" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn btn-success" name="login_user">Login</button>
            <a href="register.php" style="color:white" class="btn btn-secondary">Sign up</a>
            </div>
          </div>
        <!-- End row -->          
      </form>
          <!--<div class="col-sm-8" style="width:100%;margin:auto; display:block;">
            <a href="register.php" style="color:white" class="btn btn-secondary">Sign up</a>
          </div>-->
          <br>
    </div>
  </div>
<!-- End contents -->

</body>
</html>