<?php
$servername = "localhost:3306";
$username = "root";
$password = "toor";
$dbname = "AutismICare";
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "AIC";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_set_charset($conn,"utf8");

?>