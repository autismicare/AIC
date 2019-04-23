<!DOCTYPE html>
<html>
<head>
  <title>Autism I Care </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <li class="nav-item">
          <a class="nav-link" href="fact.php"><i class="fa fa-bullhorn"></i>   Facts about Autism  </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="event.php"><i class="fa fa-calendar"></i>   Upcoming Autism Events  </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php"><i class="fa fa-sign-in"></i>   Signup / Sign-in  </a>
        </li>    
      </ul>
    </div>  
  </nav>
<!-- End Top Nav Bar -->

<!-- Start contents -->
  <div class="container-fluid mt-5">
    <br><h2>Join us</h2>
    <p>Become part of our community!</p>
    <div class="container mx-2">
      <form action="/action_page.php">
        <h3 style="text-align:center">Login with Social Media or Manually<br></h3>
        <!-- Start row -->
        <div class="row">
          <div class="vl">
            <span class="vl-innertext">or</span>
          </div>
          <div class="col-sm-6">
          <div class="mx-2">
            <a href="#" class="fb btn">
              <i class="fa fa-facebook fa-fw"></i> Login with Facebook
            </a>
          </div>
          </div>
          <div class="col-sm-6">
            <div class="hide-md-lg text-center">
              Or sign in manually:
            </div>
            <div class="mx-2">
            <input type="text" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
            </div>
          </div>
        </div>
        <!-- End row -->          
      </form>
    </div>

    <div class="bottom-container">
      <div class="row">
        <div class="col">
          <a href="#" style="color:white" class="btn">Sign up</a>
        </div>
        <div class="col">
          <a href="#" style="color:white" class="btn">Forgot password?</a>
        </div>
      </div>
    </div>
  </div>
<!-- End contents -->

</body>
</html>