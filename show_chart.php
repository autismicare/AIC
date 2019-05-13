<!-- Show chart works -->
<?php 
include('as.php');
include('daily_mbf_chart.php');
include('daily_rating_chart.php');

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
      window.onload = function () {
      
      var charts = new CanvasJS.Chart("chart-container", {
        backgroundColor: "#00000000",
        animationEnabled: true,
        exportEnabled: true,
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        title:{
            text: "Daily Rating Chart"
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
       title: "RATING ",
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
              text: "Daily Frequency Chart"
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
       title: "FREQUENCY",
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
      
      var indexLabels = [];
        addIndexLabels(chart);

        function addIndexLabels(chart){
        for(var i = 0; i < chart.data[0].dataPoints.length; i++){
            indexLabels.push(document.createElement("p"));
            indexLabels[i].setAttribute("id", "indexlabel");
            
            indexLabels[i].innerHTML = "<img height=25% width=25% src="+chart.data[0].dataPoints[i].icon+">";
            
            document.getElementById("chart-containers").appendChild(indexLabels[i]);
        }
        positionIndexLabels(chart);
        }

        function positionIndexLabels(chart){
                for(var i = 0; i < indexLabels.length; i++){
                        indexLabels[i].style.top = chart.axisY[0].convertValueToPixel(chart.data[0].dataPoints[i].y) - (indexLabels[i].clientHeight / 2) + 620 + "px";
                indexLabels[i].style.left = chart.axisX[0].convertValueToPixel(chart.data[0].dataPoints[i].x) - 10 + "px";
            }
        }

        window.onresize = function(event) {
            positionIndexLabels(chart)
        }



      }
      </script>
      <style>
        #indexlabel {
            position: absolute;
        }            
      </style>

</head>

<body>
<!-- Top Nav bar -->
<?php include 'navBar_login.php'; ?>
<!-- Top Nav bar -->

<!-- Start Chart menu -->
<?php include 'navBar_chart.php'; ?>
<!-- End Chart menu -->

<?php
    //the SQL query to be executed
    $query ="SELECT (date_format(Tracking_date,'%d-%b-%Y')) as TD,Tracker_ID, Rating_ID, 
        group_concat(distinct(M_name) separator ', ') as Mood_types,
        group_concat(distinct(W_name) separator ', ') as Weather,
        group_concat(distinct(B_name) separator ', ') as Behaviours, 
        group_concat(distinct(F_name) separator ', ') as Factors , 
  date_format(Tracking_date, '%H:%i') as Tracking_Time
from
        ((select tr.Tracker_ID, tr.Tracking_date, m.M_name, b.B_name, f.F_name, w.W_name, tr.Rating_ID 
        from (select * from MBTracker where User_ID = '$uid' and to_days(Tracking_date) = (select max(to_days(Tracking_date)) from MBTracker where User_ID = '$uid')) as tr
        left outer join  Mood_set ms on tr.Tracker_ID = ms.Tracker_ID left outer join Behaviour_set bs on tr.Tracker_ID = bs.Tracker_ID 
        left outer join Factor_set fs on tr.Tracker_ID = fs.Tracker_ID left outer join Mood m on ms.Mood_ID = m.Mood_ID left outer join Behaviour b on bs.Behaviour_ID = b.Behaviour_ID
        left outer join Factor f on fs.Factor_ID = f.Factor_ID left outer join Weather w on tr.Weather_ID = w.Weather_ID) 
         Union
        (select tr.Tracker_ID, tr.Tracking_date, m.CM_name, b.CB_name, f.CF_name, w.W_name, tr.Rating_ID 
        from (select * from MBTracker where User_ID = '$uid' and to_days(Tracking_date) = (select max(to_days(Tracking_date)) from MBTracker where User_ID = '$uid')) as tr
        left outer join CMood_set as ms on tr.Tracker_ID = ms.Tracker_ID 
        left outer join CBehaviour_set as bs on tr.Tracker_ID = bs.Tracker_ID 
        left outer join CFactor_set as fs on tr.Tracker_ID = fs.Tracker_ID 
        left outer join CMood m on ms.CMood_ID = m.CMood_ID left outer join CBehaviour b on bs.CBehaviour_ID = b.CBehaviour_ID
        left outer join CFactor f on fs.CFactor_ID = f.CFactor_ID left outer join Weather w on tr.Weather_ID = w.Weather_ID)) 
        as result
group by Tracker_ID, Rating_ID,(date_format(Tracking_date,'%d-%b-%Y')),date_format(Tracking_date, '%H:%i')
order by Tracking_Time";
    $resulte = mysqli_query($db, $query);
    $rowe = mysqli_num_rows($resulte);
    $resultd = mysqli_query($db, $query);
    $rows = mysqli_fetch_array($resultd);
    $rowtd = $rows['TD'];
    ?>
    <div class="d-flex justify-content-center mt-2">
    <h4>Date : <?php echo $rowtd;?></h4>
    </div>
  
    <div id="chart-container" style="height: 370px; width: 100%;" class="mt-2"></div><br>
    <div id="chart-containers" style="height: 370px; width: 100%;" class="mt-5"></div><br>
  <div class="container text-center" style="background-color:transparent;box-shadow:none;">
    <label><strong style="color:#CACAEA"><i class="fas fa-square ml-2"></i> MOOD</strong></label>
    <label><strong style="color:#83B4B3"><i class="fas fa-square ml-2"></i> BEHAVIOUR</strong></label>
    <label><strong style="color:#EE4266"><i class="fas fa-square ml-2"></i> FACTOR</strong></label>
    </div>
    
<!-- Start Data Table -->    
    <div class="container shadow p-3 mt-4">
      <div style="overflow-x:auto;">
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th>Time</th>
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
            <td><?php echo $row1["Tracking_Time"] ?></td>
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
<!-- End Data Table -->    

  </body>
</html>
