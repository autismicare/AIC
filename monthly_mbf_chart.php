<?php
        include('checkuser.php');
        $uid = $row["User_ID"];     
    //the SQL query to be executed
    $query1 = "SELECT m.M_name as Mood_type, count(m.M_name) as Mood_count 
	from Mood m, Mood_set ms,
	(select * from MBTracker where User_ID = '$uid' and Tracking_date > DATE_ADD((select max(Tracking_date) from MBTracker where User_ID = '$uid'), INTERVAL -30 DAY)) as tr
	where tr.Tracker_ID = ms.Tracker_ID and ms.Mood_ID = m.Mood_ID
  group by m.M_name";
    
    $query4 = "SELECT m.CM_name as Mood_type, count(m.CM_name) as Mood_count 
    from (select * from CMood where User_ID = '$uid') m, CMood_set ms,
    (select * from MBTracker where User_ID = '$uid' and Tracking_date > DATE_ADD((select max(Tracking_date) from MBTracker where User_ID = '$uid'), INTERVAL -30 DAY)) as tr
    where tr.Tracker_ID = ms.Tracker_ID and ms.CMood_ID = m.CMood_ID
    group by m.CM_name";
    
  
  $query2 = "SELECT f.F_name as Factor_name, count(f.F_name) as Factor_count 
	from Factor f, Factor_set fs,
	(select * from MBTracker where User_ID = '$uid' and Tracking_date > DATE_ADD((select max(Tracking_date) from MBTracker where User_ID = '$uid'), INTERVAL -30 DAY)) as tr
	where tr.Tracker_ID = fs.Tracker_ID and fs.Factor_ID = f.Factor_ID 
  group by f_name";
  
  $query5 = "SELECT f.CF_name as Factor_name, count(f.CF_name) as Factor_count 
	from (select * from CFactor where User_ID = '$uid') f, CFactor_set fs,
	(select * from MBTracker where User_ID = '$uid' and Tracking_date > DATE_ADD((select max(Tracking_date) from MBTracker where User_ID = '$uid'), INTERVAL -30 DAY)) as tr
	where tr.Tracker_ID = fs.Tracker_ID and fs.CFactor_ID = f.CFactor_ID 
  group by Cf_name";
  

  $query3 = "SELECT b.B_name as Behaviour_name, count(b.B_name) as Behaviour_count 
	from Behaviour b, Behaviour_set bs,
	(select * from MBTracker where User_ID = '$uid' and Tracking_date > DATE_ADD((select max(Tracking_date) from MBTracker where User_ID = '$uid'), INTERVAL -30 DAY)) as tr
	where tr.Tracker_ID = bs.Tracker_ID and 
	bs.Behaviour_ID = b.Behaviour_ID
  group by b.B_name";
  
  $query6 = "SELECT b.CB_name as Behaviour_name, count(b.CB_name) as Behaviour_count 
	from (select * from CBehaviour where User_ID = '$uid') b, CBehaviour_set bs,
	(select * from MBTracker where User_ID = '$uid' and Tracking_date > DATE_ADD((select max(Tracking_date) from MBTracker where User_ID = '$uid'), INTERVAL -30 DAY)) as tr
	where tr.Tracker_ID = bs.Tracker_ID and 
	bs.CBehaviour_ID = b.CBehaviour_ID
	group by b.CB_name";
    //storing the result of the executed query
    $jsonArray = array();
    
    
    $result1 = mysqli_query($db, $query1);
    //initialize the array to store the processed data
    
    //check if there is any data returned by the SQL Query
    if ($result1->num_rows > 0) {
      //Converting the results into an associative array
      while($row1 = $result1->fetch_assoc()) {
        //append the above created object into the main array.
        array_push($jsonArray, array("label"=>$row1['Mood_type'],"y"=>$row1['Mood_count'],"color"=>"#CACAEA"));
      }
    }	
    
    $result4 = mysqli_query($db, $query4);
    //initialize the array to store the processed data
    
    //check if there is any data returned by the SQL Query
    if ($result4->num_rows > 0) {
      //Converting the results into an associative array
      while($row4 = $result4->fetch_assoc()) {
        //append the above created object into the main array.
        array_push($jsonArray, array("label"=>$row4['Mood_type'],"y"=>$row4['Mood_count'],"color"=>"#CACAEA"));
      }
    }
    

    

    $result2 = mysqli_query($db, $query3);
    //initialize the array to store the processed data
    
    //check if there is any data returned by the SQL Query
    if ($result2->num_rows > 0) {
      //Converting the results into an associative array
      while($row2 = $result2->fetch_assoc()) {
        array_push($jsonArray, array("label"=>$row2['Behaviour_name'],"y"=>$row2['Behaviour_count'],"color"=>"#83B4B3"));
      }
    }

    

    $result5 = mysqli_query($db, $query6);
    //initialize the array to store the processed data
    
    //check if there is any data returned by the SQL Query
    if ($result5->num_rows > 0) {
      //Converting the results into an associative array
      while($row5 = $result5->fetch_assoc()) {
        array_push($jsonArray, array("label"=>$row5['Behaviour_name'],"y"=>$row5['Behaviour_count'],"color"=>"#83B4B3"));
      }
    }
    


    $result3 = mysqli_query($db, $query2);
    //initialize the array to store the processed data
    
    //check if there is any data returned by the SQL Query
    if ($result3->num_rows > 0) {
      //Converting the results into an associative array
      while($row3 = $result3->fetch_assoc()) {
        array_push($jsonArray, array("label"=>$row3['Factor_name'],"y"=>$row3['Factor_count'],"color"=>"#EE4266"));
      }
    }
    
    
    $result6 = mysqli_query($db, $query5);
    //initialize the array to store the processed data
    
    //check if there is any data returned by the SQL Query
    if ($result6->num_rows > 0) {
      //Converting the results into an associative array
      while($row6 = $result6->fetch_assoc()) {
        array_push($jsonArray, array("label"=>$row6['Factor_name'],"y"=>$row6['Factor_count'],"color"=>"#EE4266"));
      }
    }
    
    
    
    
?>
