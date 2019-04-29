<?php 
session_start();
$errors = array(); 
//$db = mysqli_connect('localhost', 'root', 'toor', 'AutismICare');
$db = mysqli_connect('localhost', 'root', '', 'AIC');

$email = $_SESSION['email'];
$user_check_query = "SELECT * FROM User WHERE U_email='$email' ";
$result = mysqli_query($db, $user_check_query);
$row = mysqli_fetch_array($result);
$username = $row["U_name"];
$uid = $row["User_ID"];
if($username == true)
{
    //echo "Welcome"." ".$username;
}

else
{
    header('location:logout.php');
}
?>