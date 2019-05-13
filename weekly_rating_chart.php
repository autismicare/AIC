<?php
        include('checkuser.php');
        $uid = $row["User_ID"];     
    //the SQL query to be executed
    $query1 = "SELECT User_ID, round(avg(Rating_ID), 2) as Average_Rating, DATE(Tracking_date) as Tracking_Date from MBTracker where User_ID = '$uid' and Tracking_date > DATE_ADD((select max(Tracking_date) from MBTracker where User_ID = '$uid'), INTERVAL -7 DAY)
    group by DATE(Tracking_date) order by Tracking_date";
    //storing the result of the executed query
    $jsonArray1 = array();
    
    
    $result1 = mysqli_query($db, $query1);
    //initialize the array to store the processed data
    
    //check if there is any data returned by the SQL Query
    if ($result1->num_rows > 0) {
      //Converting the results into an associative array
      while($row1 = $result1->fetch_assoc()) {
        //append the above created object into the main array.
        array_push($jsonArray1, array("label"=>$row1['Tracking_Date'],"y"=>$row1['Average_Rating'],"color"=>"#e44a00"));
      }
    }
    
    
?>
