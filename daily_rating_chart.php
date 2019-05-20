<?php
        include('checkuser.php');
        $uid = $row["User_ID"];     
    //the SQL query to be executed 
    $query1 = "SELECT User_ID, Rating_ID ,date_format(Tracking_date, '%H:%i') as Tracking_Time from MBTracker where User_ID = '$uid' 
    and to_days(Tracking_date) = (select max(to_days(Tracking_date)) from MBTracker where User_ID = '$uid') order by Tracking_Time";
    //storing the result of the executed query
    $jsonArray1 = array();
    
    
    $result1 = mysqli_query($db, $query1);
    //initialize the array to store the processed data
    
    //check if there is any data returned by the SQL Query
    if ($result1->num_rows > 0) {
      //Converting the results into an associative array
      while($row1 = $result1->fetch_assoc()) {
        //append the above created object into the main array.
        array_push($jsonArray1, array("label"=>$row1['Tracking_Time'],"y"=>$row1['Rating_ID'],"color"=>"#e44a00"));
      }
    }
    
    
?>
