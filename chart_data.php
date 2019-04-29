<?php 
session_start();
$errors = array(); 
$db = mysqli_connect('localhost', 'root', 'toor', 'AutismICare');

$email = $_SESSION['email'];
$user_check_query = "SELECT * FROM User WHERE U_email='$email' ";
$result = mysqli_query($db, $user_check_query);
$row = mysqli_fetch_array($result);
?>
<?php
    $uid = $row["User_ID"];     
    //the SQL query to be executed
    $query = "SELECT Rating_ID, concat(hour(Tracking_date),':',minute(Tracking_date)) as Tracking_Time from MBTracker where User_ID = '$uid' and to_days(Tracking_date) = (select to_days(max(Tracking_date)) from MBTracker where User_ID = '$uid') order by Tracking_date";
    //storing the result of the executed query
    $result = mysqli_query($db, $query);
    //initialize the array to store the processed data
    $jsonArray = array();
    //check if there is any data returned by the SQL Query
    if ($result->num_rows > 0) {
      //Converting the results into an associative array
      while($row = $result->fetch_assoc()) {
        $jsonArrayItem = array();
        $jsonArrayItem['label'] = $row['Tracking_Time'];
        $jsonArrayItem['value'] = $row['Rating_ID'];
        //append the above created object into the main array.
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