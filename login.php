<?php
$errors = array();
session_start();
$db = mysqli_connect('localhost', 'root', 'toor', 'AutismICare');
// $db = mysqli_connect('localhost', 'root', '', 'AIC');

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
  <link rel="stylesheet" href="css/main.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>

</head>

<body>

<!-- Start Top Nav Bar -->
<?php include 'navBar.php'; ?><br><br>
<!-- End Top Nav Bar -->

<!-- Start contents -->
  <div class="container-fluid mt-5" style="text-align:center">
    <div class="container shadow p-3">
      <form method="post">
        <!-- Start row -->
          <div class="col-sm-8" style="width:100%;margin:auto; display:block;">
              <h3>Join us</h3>
              <p>Become part of our community!</p>
            <a href="register.php" style="color:white;width:70%;" class="btn btn-primary">Sign up</a>
            <br>
            <hr>    
            <h3 class="mt-3" style="text-align:center">Sign in<br></h3> 
            <?php include('errors.php'); ?>                   
            <input style="border:1px #D3D3D3 solid;width:70%;" type="text" name="email" placeholder="Email Address" required><br>
            <input style="border:1px #D3D3D3 solid;width:70%;" type="password" name="password" placeholder="Password" required><br>
            <button style="width:70%;" type="submit" class="btn btn-success" name="login_user">Login</button><br>
            <a href="forgotpass.php" class="btn btn-dark" style="width:70%;">Forgot password</a>
          </div>
        <!-- End row -->          
      </form>
          <br>
    </div>
  </div>
<!-- End contents -->

</body>
</html>