<?php 
include('as.php');
include('monthly_mbf_chart.php');
include('monthly_rating_chart.php');

?>

<?php 
$get = "SELECT distinct(date(Tracking_date)) as TrackingDate from MBTracker where User_ID = '$uid' and Tracking_date > DATE_ADD((select max(Tracking_date) from MBTracker where User_ID = '$uid'), INTERVAL -30 DAY) order by TrackingDate";
$resultg = mysqli_query($db, $get);
$option = '';
 while($rowg = mysqli_fetch_assoc($resultg))
{
  $option .= '<option value = "'.$rowg['TrackingDate'].'">'.$rowg['TrackingDate'].'</option>';
}
?>

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
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>

      function myFunction(menu){
      var menu=document.getElementById("TD").value;
      }
    </script>
  
    <script>
      window.onload = function () {
      
      var charts = new CanvasJS.Chart("chart-container", {
          backgroundColor: "#00000000",
          animationEnabled: true,
          exportEnabled: true,
          theme: "light2", // "light1", "light2", "dark1", "dark2"
          title:{
              text: "Monthly Rating Chart"
          },
          axisX: {
              title: "TIME",
              lineColor: "#000000",
              tickColor: "#000000",
              labelFontColor: "#000000",
              titleFontColor: "#000000",
              lineThickness: 2
          },
          axisY:
     {
       title: "AVERAGE RATING",
       lineColor: "#000000",
       tickColor: "#000000",
       labelFontColor: "#000000",
       titleFontColor: "#000000",
       lineThickness: 2
    },
          data: [{
              type: "line", //change type to bar, line, area, pie, etc  
              dataPoints: <?php echo json_encode($jsonArray1, JSON_NUMERIC_CHECK); ?>
          }]
      });
      charts.render();
      
      
      
      var chart = new CanvasJS.Chart("chart-containers", {
          backgroundColor: "#00000000",        
          animationEnabled: true,
          exportEnabled: true,
          theme: "light2", // "light1", "light2", "dark1", "dark2"
          title:{
              text: "Monthly Frequency Chart"
          },
          axisX: {
              // title: "Mood Behaviour and Factor Types",
              lineColor: "#000000",
              tickColor: "#000000",
              labelFontColor: "#000000",
              titleFontColor: "#000000",
              lineThickness: 2
          },
          axisY:
     {
       title: "FREQUENCY ",
       lineColor: "#000000",
       tickColor: "#000000",
       labelFontColor: "#000000",
       titleFontColor: "#000000",
       lineThickness: 2
    },
          data: [{
              type: "column", //change type to bar, line, area, pie, etc  
              dataPoints: <?php echo json_encode($jsonArray, JSON_NUMERIC_CHECK); ?>
          }]
      });
      chart.render();
      
      }
      </script>

  
</head>

<body>

<!-- Top Nav bar -->
<?php include 'navBar_login.php'; ?>
<!-- Top Nav bar -->

<!-- Start Chart menu -->
<?php include 'navBar_chart.php'; ?>
<!-- End Chart menu -->

  <div id="chart-container" style="height: 370px; width: 100%;"></div>
    <div id="chart-containers" style="height: 370px; width: 100%;"></div>
  <div class="container text-center" style="background-color:transparent;box-shadow:none;">
    <label><strong style="color:#CACAEA"><i class="fas fa-square ml-2"></i> MOOD</strong></label>
    <label><strong style="color:#83B4B3"><i class="fas fa-square ml-2"></i> BEHAVIOUR</strong></label>
    <label><strong style="color:#EE4266"><i class="fas fa-square ml-2"></i> FACTOR</strong></label>
  </div>
  
    
  <div class="container text-center d-flex justify-content-center mt-4" style="background-color:transparent;box-shadow:none;">
<!-- Start Table menu -->    
    <form method="post" action="monthly_show_chart.php">

        <select class="form-control mb-2" name="TD" id="TD" onchange="myFunction(this)" style="width:200px;">
          <option selected value="">Select Date</option>
          <?php echo $option; ?>
        </select>
        <button type="submit" class="btn btn-dark" name="td"> Show Details </button>

    </form>
  </div>
<!-- End Table menu -->
   
    <?php
    $trd = "";
    if (isset($_REQUEST['td'])) {
      $trd = $_REQUEST['TD'];
      $query = "SELECT Tracker_ID, Tracking_date, Rating_ID, 
        group_concat(distinct(M_name) separator ', ') as Mood_types,
        group_concat(distinct(W_name) separator ', ') as Weather,
        group_concat(distinct(B_name) separator ', ') as Behaviours, 
        group_concat(distinct(F_name) separator ', ') as Factors
from
  ((select tr.Tracker_ID, tr.Tracking_date, m.M_name, b.B_name, f.F_name, w.W_name, tr.Rating_ID 
        from (select * from MBTracker where User_ID = '$uid' and date(Tracking_date) = date('$trd')) as tr
        left outer join  Mood_set ms on tr.Tracker_ID = ms.Tracker_ID left outer join Behaviour_set bs on tr.Tracker_ID = bs.Tracker_ID 
        left outer join Factor_set fs on tr.Tracker_ID = fs.Tracker_ID left outer join Mood m on ms.Mood_ID = m.Mood_ID left outer join Behaviour b on bs.Behaviour_ID = b.Behaviour_ID
        left outer join Factor f on fs.Factor_ID = f.Factor_ID left outer join Weather w on tr.Weather_ID = w.Weather_ID) 
         Union
        (select tr.Tracker_ID, tr.Tracking_date, m.CM_name, b.CB_name, f.CF_name, w.W_name, tr.Rating_ID 
        from (select * from MBTracker where User_ID = '$uid' and date(Tracking_date) = date('$trd')) as tr
        left outer join CMood_set as ms on tr.Tracker_ID = ms.Tracker_ID 
        left outer join CBehaviour_set as bs on tr.Tracker_ID = bs.Tracker_ID 
        left outer join CFactor_set as fs on tr.Tracker_ID = fs.Tracker_ID 
        left outer join CMood m on ms.CMood_ID = m.CMood_ID left outer join CBehaviour b on bs.CBehaviour_ID = b.CBehaviour_ID
        left outer join CFactor f on fs.CFactor_ID = f.CFactor_ID left outer join Weather w on tr.Weather_ID = w.Weather_ID))
                as result
group by Tracker_ID, Tracking_date, Rating_ID
order by Tracking_date";
      $resulte = mysqli_query($db, $query);
      $rowe = mysqli_num_rows($resulte);
      ?>
 
<!-- Start Data Table -->    
    <div class="container shadow p-3 mt-2">
      <div style="overflow-x:auto;">
      <table class="table table-striped" id="td">
        <thead class="thead-dark">
          <tr>
            <th>Date & Time</th>
            <th>Rating</th>
            <th>Mood</th>
            <th>Behaviour</th>
            <th>Factor</th>
            <th>Weather</th>            
          </tr>
        </thead>
        <tbody>     
      <?php
      for ($i=1;$i<=$rowe;$i++)
      {
          $row1 =  mysqli_fetch_array($resulte);

      ?>
      <tr>
      <td><?php echo $row1["Tracking_date"] ?></td>
      <td><?php echo $row1["Rating_ID"] ?></td>
      <td><?php echo $row1["Mood_types"] ?></td>
      <td><?php echo $row1["Behaviours"] ?></td>
      <td><?php echo $row1["Factors"] ?></td>
      <td><?php echo $row1["Weather"] ?></td>      
      </tr>
      
      <?php
      }
      ?>
      </tbody>
      </table>
      </div>
      </div>
    <?php
    }
    ?>
<!-- End Data Table -->    


  </body>
</html>
