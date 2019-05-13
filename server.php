<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$ques1    = "";
$ans1 = "";
$ques2    = "";
$ans2 = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', 'toor', 'AutismICare');
mysqli_set_charset($db,"utf8");
// $db = mysqli_connect('localhost', 'root', '', 'AIC');


// REGISTER USER
if (isset($_REQUEST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_REQUEST['username']);
  $email = mysqli_real_escape_string($db, $_REQUEST['email']);
  $password_1 = mysqli_real_escape_string($db, $_REQUEST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_REQUEST['password_2']);
  $ques1 = mysqli_real_escape_string($db, $_REQUEST['ques1']);
  $ans1 = mysqli_real_escape_string($db, $_REQUEST['ans1']);
  $ques2 = mysqli_real_escape_string($db, $_REQUEST['ques2']);
  $ans2 = mysqli_real_escape_string($db, $_REQUEST['ans2']);
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($ques1)) { array_push($errors, "Question 1 is required"); }
  if (empty($ans1)) { array_push($errors, "Answer 1 is required"); }
  if (empty($ques2)) { array_push($errors, "Question 2 is required"); }
  if (empty($ans2)) { array_push($errors, "Answer 2 is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }
  if (strlen(trim($password_1)) < 6) {
	  array_push($errors, "Password should be at least 6 characters!");
  }
  
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM User WHERE  U_email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_array($result);
  
  if ($user) { // if user exists
    if ($user['U_email'] == $email) {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database
    $ans1 = md5($ans1);//encrypt the password before saving in the database
    $ans2 = md5($ans2);//encrypt the password before saving in the database
    
    $query = "INSERT INTO User (U_name, U_email, U_password,Q1_ID ,Q1_answer ,Q2_ID ,Q2_answer ) 
          VALUES('$username', '$email', '$password', '$ques1' , '$ans1' , '$ques2' , '$ans2')";
    mysqli_query($db, $query);
    $_SESSION['email'] = $email;
    //$_SESSION['success'] = "You are now logged in";
    header('location: registerchild.php');    
  }
}
?>
