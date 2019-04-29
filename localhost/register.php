<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Autism I Care : Signup </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">  
  <link rel="stylesheet" href="css/signup.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>

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
        <li class="nav-item">
          <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i>   Signup / Sign-in  </a>
        </li>    
      </ul>
    </div>  
  </nav><br>
<!-- End Top Nav Bar -->
  
  <div class="container mt-5">
      <h3 class="mt-2" style="text-align:center">Register<br></h3>
    <form method="post" action="register.php">
        <div class="input-group">
          <label>Name :</label>
          <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username" required>
        </div>
        <div class="input-group">
          <label>Email :</label>
          <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email Address" required>
        </div>
        <div class="input-group">
          <label>Password :</label>
          <input type="password" name="password_1" placeholder="Password" required>
        </div>
        <div class="input-group">
          <label>Confirm password :</label>
          <input type="password" name="password_2" placeholder="Confirm Password" required>
        </div>
        <div class="input-group">
          <button type="submit" class="btn btn-primary" name="reg_user">Register</button>
        </div>
        <?php include('errors.php'); ?>
        <a href="login.php" class="btn btn-secondary">Back to sign in</a>
        <!--<br><p style="text-align:center">Already a member? <a href="login.php">Sign in</a></p>-->
    </form>
  </div>

</body>
</html>