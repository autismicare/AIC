<?php 
session_start();
$errors = array(); 
//$db = mysqli_connect('localhost', 'root', 'toor', 'AutismICare');
$db = mysqli_connect('localhost', 'root', '', 'AIC');

$email = $_SESSION['email'];
$user_check_query = "SELECT * FROM User WHERE U_email='$email' ";
$result = mysqli_query($db, $user_check_query);
$row = mysqli_fetch_array($result);
?>
<?php
    $uid = $row["User_ID"];     
    //the SQL query to be executed
    $query ="SELECT User_ID, round(avg(Rating_ID), 2) as Average_Rating, DATE(Tracking_date) as Tracking_Date from MBTracker where User_ID = '$uid' and Tracking_date > DATE_ADD((select max(Tracking_date) from MBTracker where User_ID = '$uid'), INTERVAL -7 DAY)
    group by DATE(Tracking_date) order by Tracking_date";
    //storing the result of the executed query
    $result = mysqli_query($db, $query);
    //initialize the array to store the processed data
    $jsonArray = array();
    //check if there is any data returned by the SQL Query
    if ($result->num_rows > 0) {
      //Converting the results into an associative array
      while($row = $result->fetch_assoc()) {
        $jsonArrayItem = array();
        $jsonArrayItem['label'] = $row['Tracking_Date'];
        $jsonArrayItem['value'] = $row['Average_Rating'];
        array_push($jsonArray, $jsonArrayItem);
      }
    }
    //Closing the connection to DB
    //set the response content type as JSON
    header('Content-type: application/json');
    //output the return value of json encode using the echo function.
    echo  json_encode ($jsonArray);
    //file_put_contents('myfile.json', $json_data);
?>
