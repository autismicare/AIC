<?php
// initializing variables
$name = "";
$age = "";
$gender = "";
session_start();
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', 'toor', 'AutismICare');
// $db = mysqli_connect('localhost', 'root', '', 'AIC');


if($_SESSION['username'] = true)
{
  echo "Welcome"." ".$_SESSION['username'];

  if (isset($_REQUEST['reg_child'])) {
    // receive all input values from the form
    $name = mysqli_real_escape_string($db, $_REQUEST['name']);
    $age = mysqli_real_escape_string($db, $_REQUEST['age']);
    $gender = mysqli_real_escape_string($db, $_REQUEST['gender']);
  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($name)) { array_push($errors, "Name is required"); }
    if (empty($age)) { array_push($errors, "Age is required"); }
    if (empty($gender)) { array_push($errors, "Gender is required"); }
    }
      $query = "INSERT INTO Child (C_name, C_age, C_sex) 
                  VALUES('$name', '$age', '$gender')";
      mysqli_query($db, $query);
      
  
}
else
{
  header('location:index.php');
}
// REGISTER USER

?>