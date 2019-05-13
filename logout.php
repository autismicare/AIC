<?php   
include('checkuser.php');
session_start(); //to ensure you are using same session
$query = "DROP view demo$uid";
$result = mysqli_query($db,$query);
$file1=$uid;
$file2='a'.$uid;
$file3='b'.$uid;
unlink($file1);
unlink($file2);
unlink($file3);
session_destroy(); //destroy the session
header("location:./login.php"); 
exit();
?>