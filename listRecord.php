<?php include('as.php') ?>

<!DOCTYPE html>
<html>
<head>
  <title>Autism I Care </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>

<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('./assets/img/search.png');
  background-position: 5px 5px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>
</head>
<body>

<!-- Top Nav bar -->
<?php include 'navBar_login.php'; ?><br><br>
<!-- Top Nav bar -->
  <!-- <div class="container mt-5 shadow p-3"> -->

  <div class="container mt-5 shadow p-3">
      <div class="text-right"><a class="btn btn-secondary" href="trackerMain.php">Back</a></div>
      <h3 class="text-center">List of Records</h3>


    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for YYYY-MM-DD" title="Type in a date..">

    <?php
    //$query = "SELECT (date_format(Tracking_date,'%Y-%m-%d %H:%i')) as Tracking_time, Tracker_ID, Rating_ID, notes, 
    
    $query = "SELECT (date_format(Tracking_date,'%Y-%m-%d %H:%i')) as Tracking_time, Tracker_ID, Rating_ID, notes, 
        
        group_concat(distinct(M_name) separator ', ') as Mood_types,
        group_concat(distinct(W_name) separator ', ') as Weather,
        group_concat(distinct(B_name) separator ', ') as Behaviours, 
        group_concat(distinct(F_name) separator ', ') as Factors
        from
                ((select tr.Tracker_ID, tr.Tracking_date, tr.notes, m.M_name, b.B_name, f.F_name, w.W_name, tr.Rating_ID 
                from (select * from MBTracker where User_ID = '$uid') as tr
                left outer join  Mood_set ms on tr.Tracker_ID = ms.Tracker_ID left outer join Behaviour_set bs on tr.Tracker_ID = bs.Tracker_ID 
                left outer join Factor_set fs on tr.Tracker_ID = fs.Tracker_ID left outer join Mood m on ms.Mood_ID = m.Mood_ID 
                left outer join Behaviour b on bs.Behaviour_ID = b.Behaviour_ID
                left outer join Factor f on fs.Factor_ID = f.Factor_ID left outer join Weather w on tr.Weather_ID = w.Weather_ID) 
                 Union
                (select tr.Tracker_ID, tr.Tracking_date, tr.notes,  m.CM_name, b.CB_name, f.CF_name, w.W_name, tr.Rating_ID 
                from (select * from MBTracker where User_ID = '$uid') as tr
                left outer join CMood_set as ms on tr.Tracker_ID = ms.Tracker_ID 
                left outer join CBehaviour_set as bs on tr.Tracker_ID = bs.Tracker_ID 
                left outer join CFactor_set as fs on tr.Tracker_ID = fs.Tracker_ID 
                left outer join CMood m on ms.CMood_ID = m.CMood_ID left outer join CBehaviour b on bs.CBehaviour_ID = b.CBehaviour_ID
                left outer join CFactor f on fs.CFactor_ID = f.CFactor_ID left outer join Weather w on tr.Weather_ID = w.Weather_ID)) 
                as result
        group by Tracker_ID, Rating_ID, Tracking_time, notes
        -- group by Tracker_ID, Rating_ID, date_format(Tracking_date,'%Y-%m-%d %H:%i'), notes
        order by Tracking_time desc";
    // $Tracking_time = date('h:i A', strtotime($Tracking_time));
    $resulte = mysqli_query($db, $query);
    //$rowe = mysqli_num_rows($resulte);

    // $no_of_page = ceil($rowe / $data_per_page);
    // if(!isset($_GET['page'])){
    //     $page = 1;
    // }else{
    //     $page = $_GET['page'];
    // }
    // $page_limit_data = ($page - 1) * $data_per_page;
    // $query     = $query." LIMIT $page_limit_data,$data_per_page";
    // $resulte = mysqli_query($db, $query);
    ?>

  <ul id="myUL">
    <?php

    while ($row1 = mysqli_fetch_array($resulte)){
      echo '<li><a>'.$row1["Tracking_time"].'</a><br>';      
      echo '<strong>Rating : </strong>'.$row1["Rating_ID"].'<br>';
      echo '<strong>Mood : </strong>'.$row1["Mood_types"].'<br>';
      echo '<strong>Behaviour : </strong>'.$row1["Behaviours"].'<br>';
      echo '<strong>Factor : </strong>'.$row1["Factors"].'<br>';
      echo '<strong>Weather : </strong>'.$row1["Weather"].'<br>';
      if(empty($row1["notes"])){
      echo ' ';
      }
      else{
        echo '<strong>Notes : </strong>'.$row1["notes"].'<br>';
      }
      
      echo '<form method="post"><input type="hidden"  name = "delete" value="'.$row1["Tracker_ID"].'"/>';
      echo '<input type="submit" name = "deletes"  value="Delete" style="background-color:#dc3545;" /> </form>'; 
      echo '<hr>';
      echo '</li>';
    }
    if(isset($_REQUEST['deletes']))
    {
      $delete = mysqli_real_escape_string($db, $_REQUEST['delete']);
      $query1= "DELETE from CMood_set where Tracker_ID='$delete'";
      $result1 = mysqli_query($db, $query1);
      $query2= "DELETE from CBehaviour_set where Tracker_ID='$delete'";
      $result2 = mysqli_query($db, $query2);
      $query3= "DELETE from CFactor_set where Tracker_ID='$delete'";
      $result3 = mysqli_query($db, $query3);
      $query4= "DELETE from Mood_set where Tracker_ID='$delete'";
      $result4 = mysqli_query($db, $query4);
      $query5= "DELETE from Behaviour_set where Tracker_ID='$delete'";
      $result5 = mysqli_query($db, $query5);
      $query6= "DELETE from Factor_set where Tracker_ID='$delete'";
      $result6 = mysqli_query($db, $query6);
      $query7= "DELETE from MBTracker where Tracker_ID='$delete'";
      $result7 = mysqli_query($db, $query7);

      echo "<meta http-equiv='refresh' content='0'>";
    }
   
    ?>


</ul>
</div>

<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>

</body>
</html>
