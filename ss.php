<?php
  session_start();
  $errors = array(); 
  $email = "";
  $password_1 = "";
  $password_2 = "";
  $db = mysqli_connect('localhost', 'root', 'toor', 'AutismICare');
  if (isset($_REQUEST['new_pass'])) {
    $email = mysqli_real_escape_string($db, $_REQUEST['email']);
    $password_1 = mysqli_real_escape_string($db, $_REQUEST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_REQUEST['password_2']);

    if ($password_1 != $password_2) {
      array_push($errors, "The two passwords do not match");
      }

    if (strlen(trim($password_1)) < 6) {
        array_push($errors, "Password should be at least 6 characters!");
      }
    if (count($errors) == 0) {  
      $password = md5($password_1);
      $query = "UPDATE User set U_password='$password' where U_email='$email'";
      mysqli_query($db, $query);
      $_SESSION['email'] = $email;
      //$_SESSION['success'] = "You are now logged in";
      header('location: login.php');   
    }
  }
?>