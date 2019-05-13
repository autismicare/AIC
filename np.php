<?php
  session_start();
  $ans1 = "";
  $ans2 = "";
  $email = "";
  $db = mysqli_connect('localhost', 'root', 'toor', 'AutismICare');
  if (isset($_REQUEST['check_ans'])) {
    $email = mysqli_real_escape_string($db, $_REQUEST['email']);
    $ans1 = mysqli_real_escape_string($db, $_REQUEST['ans1']);
    $ans2 = mysqli_real_escape_string($db, $_REQUEST['ans2']);
    $ans3 = md5($ans1);
    $ans4 = md5($ans2);
    $query = "SELECT * FROM User WHERE U_email='$email' and Q1_answer = '$ans3' and Q2_answer = '$ans4'";
    $results = mysqli_query($db, $query);
    if(mysqli_num_rows($results) == true) {
      
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
      <form method="post" action="ss.php">
        <!-- Start row -->
          <div class="col-sm-8" style="width:100%;margin:auto; display:block;">
            <h3 class="mt-3" style="text-align:center">Set New Password<br></h3> 
            <br>
            <?php include('errors.php'); ?>                   
            <label>New Password :</label>
            <input type="password" name="password_1" placeholder="Password" required>
            <br>
            <label>Confirm New Password :</label>
            <input type="password" name="password_2" placeholder="Confirm Password" required>
            <input style="border:1px #D3D3D3 solid;width:70%;" type="hidden" name="email" value=<?php echo $email ?>><br>
            <button style="width:70%;" type="submit" class="btn btn-success" name="new_pass">Submit</button><br>
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

       