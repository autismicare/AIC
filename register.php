<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Autism I Care : Signup </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">  
  <link rel="stylesheet" href="css/signup.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>

</head>

<body>

<!-- Start Top Nav bar -->
<?php include 'navBar.php'; ?><br><br>
<!-- End Top Nav bar -->
  
<div class="container mt-5 shadow p-3">
  <h3 class="text-center">Register</h3><br>
    <form method="post" action="register.php">
    <div class="row">
        <div class="col-lg-6 col-md-12">
          <label>Email :</label>
          <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email Address" required>
        </div>
        <div class="col-lg-6 col-md-12">
          <label>Account Name :</label>
          <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username" required>
        </div>
        <div class="col-lg-6 col-md-12">
          <label>Password :</label>
          <input type="password" name="password_1" placeholder="Password" required>
        </div>
        <div class="col-lg-6 col-md-12">
          <label>Confirm password :</label>
          <input type="password" name="password_2" placeholder="Confirm Password" required>
        </div>        
        <div class="col-lg-6 col-md-12">
          <a>Security Question 1 : </a>
          <?php				
            $query = "select  * from Question where Question_ID < 6";
            $result = mysqli_query($db, $query);	
            echo "<select class='form-control col-lg-12 col-md-12' name='ques1'  id ='ques1' required>";
            while ($row = mysqli_fetch_array($result)) {
              echo "<option value='" . $row['Question_ID'] ."' >" . $row['Q_Desc']."</option>";
            }
            echo "</select>";
          ?>
          <input type="text" name="ans1" placeholder="Answer for question 1" required>
        </div>
        <div class="col-lg-6 col-md-12">
          <a>Security Question 2 : </a>
          <?php				
            $query = "select  * from Question where Question_ID > 6";
            $result = mysqli_query($db, $query);	
            echo "<select class='form-control col-lg-12 col-md-12' name='ques2'  id ='ques2' required>";
            while ($row = mysqli_fetch_array($result)) {
              echo "<option value='" . $row['Question_ID'] ."' >" . $row['Q_Desc']."</option>";
            }
            echo "</select>";
            ?>
          <input type="text" name="ans2" placeholder="Answer for question 2" required>
        </div>
        <div class="container text-center mt-2">
          <button type="submit" class="btn btn-primary col-lg-3 col-md-2" name="reg_user">Register</button>
          <a href="login.php" class="btn btn-secondary col-lg-3 col-md-2">Back</a>          
        </div>
        <?php include('errors.php'); ?>
        <!--<br><p style="text-align:center">Already a member? <a href="login.php">Sign in</a></p>-->
      </div>
    </form>
  </div>

</body>
</html>