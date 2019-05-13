<?php
        include('checkuser.php');
        $uid = $row["User_ID"];     
    //the SQL query to be executed
    $query1 = "SELECT m.M_name as Mood_type, count(m.M_name) as Mood_count , m.M_icon as Mood_icon
	from Mood m, Mood_set ms,
	(select * from MBTracker where User_ID = 25 and  to_days(Tracking_date) = (select max(to_days(Tracking_date)) from MBTracker where User_ID = 25)) as tr
	where tr.Tracker_ID = ms.Tracker_ID and ms.Mood_ID = m.Mood_ID
  group by m.M_name,m.M_icon";

$jsonArray = array();
    
    
$result1 = mysqli_query($db, $query1);
//initialize the array to store the processed data

//check if there is any data returned by the SQL Query
if ($result1->num_rows > 0) {
  //Converting the results into an associative array
  while($row1 = $result1->fetch_assoc()) {
    //append the above created object into the main array.
    array_push($jsonArray, array("label"=>$row1['Mood_type'],"y"=>$row1['Mood_count'],"icon"=>$row1['Mood_icon'],"color"=>"#CACAEA"));
  }
}


  ?>