<?php
  session_start();
  $db = mysqli_connect('localhost', 'root', 'toor', 'AutismICare');
  $email    = "";
  if (isset($_REQUEST['check_user'])) {
  $email = mysqli_real_escape_string($db, $_REQUEST['email']);
  $query = "SELECT * FROM User WHERE U_email='$email' LIMIT 1";
  $results = mysqli_query($db, $query);
  if (mysqli_num_rows($results) == true) {
    
    }
  else {
      header('location: forgotpass.php');
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
      <form method="post" action="sq.php">
        <!-- Start row -->
          <div class="col-sm-8" style="width:100%;margin:auto; display:block;">
            <h3 class="mt-3" style="text-align:center">Forgot Password<br></h3> 
            <?php include('errors.php'); ?>                   
            <input style="border:1px #D3D3D3 solid;width:70%;" type="text" name="email" placeholder="Email Address" required><br>
            <button style="width:70%;" type="submit" class="btn btn-success" name="check_user">Submit</button><br>
            <a class="btn btn-secondary" href="indexs.php">Back</a>
          </div>
        <!-- End row -->          
      </form>
          <br>
    </div>
  </div>
<!-- End contents -->

</body>
</html>