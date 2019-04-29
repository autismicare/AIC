<?php include('checkuser.php') ?>

<?php  
$get = "SELECT distinct(date(Tracking_date)) as TrackingDate from MBTracker where User_ID = '$uid' and Tracking_date > DATE_ADD((select max(Tracking_date) from MBTracker where User_ID = '$uid'), INTERVAL -30 DAY) order by TrackingDate ";
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
    <title>Autism I Care : Home </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>
    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
    <script type="text/javascript" src="js/fusioncharts.charts.js"></script>
    <script type="text/javascript" src="js/monthly_chart.js"></script>
	<script type="text/javascript" src="js/mood_monthly_doughnut_chart.js"></script>
    <script type="text/javascript" src="js/behaviour_monthly_doughnut_chart.js"></script>
    <script type="text/javascript" src="js/factor_monthly_doughnut_chart.js"></script>
    <script>

      function myFunction(menu){
      var menu=document.getElementById("TD").value;
      }
    </script>
</head>

  <body>

  <!-- Start Top Nav Bar -->
  <nav class="navbar navbar-expand-md bg-success navbar-dark fixed-top">
    <a class="navbar-brand" href="indexs.php">AutismICare</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item ml-2">
          <a class="nav-link"><strong><?php echo "Welcome ". $username ."!" ?></strong></a>
        </li>  
        <li class="nav-item ml-2">
          <a class="nav-link" href="facts.php"><i class="fa fa-bullhorn"></i> Facts about Autism  </a>
        </li>
        <li class="nav-item ml-2">
          <a class="nav-link" href="events.php"><i class="fa fa-calendar"></i> Upcoming Autism Events  </a>
        </li>
        <li class="nav-item ml-2">
          <a class="nav-link" href="trackerMain.php"><i class="fa fa-book"></i> Mood & Behaviour Tracker  </a>
        </li> 
        <li class="nav-item ml-2">
          <a class="nav-link" href="childprofile.php"><i class="fas fa-baby"></i> Child Profile</a>
        </li> 
        <li class="nav-item ml-2">
          <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li> 
      </ul>
    </div>  
  </nav><br><br><br>
<!-- End Top Nav Bar -->

<!-- Start Chart menu -->
    <div class="d-flex justify-content-center">
    <a href="trackerMain.php" class="btn btn-info ml-2"> <i class="fas fa-arrow-alt-circle-left "></i> </a>
    <a href="show_chart.php" class="btn btn-info ml-2"> Daily Chart </a>
    <a href="weekly_show_chart.php" class="btn btn-info ml-2"> Weekly Chart </a>
    <a href="monthly_show_chart.php" class="btn btn-info ml-2"> Monthly Chart </a>
    </div>
<!-- End Chart menu -->

    <div id="chart-container" class="d-flex justify-content-center mt-4" style="width:100%">FusionCharts will render here</div>
	<div id="chart-container-mood" class="d-flex justify-content-center mt-4" style="width:100%">FusionCharts will render here</div>
    <div id="chart-container-behaviour" class="d-flex justify-content-center mt-4" style="width:100%">FusionCharts will render here</div>
    <div id="chart-container-factor" class="d-flex justify-content-center mt-4" style="width:100%">FusionCharts will render here</div>

<!-- Start Table menu -->    
    <div class="d-flex justify-content-center">
    <form method="post" action="monthly_show_chart.php">
      <select name="TD" id="TD" onchange="myFunction(this)">
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
      $query = "SELECT Tracker_ID, Tracking_date, Rating_ID, group_concat(distinct(M_name) separator ', ') as Mood_types,group_concat(distinct(W_name) separator ', ') as Weather,
      group_concat(distinct(B_name) separator ', ') as Behaviours, group_concat(distinct(F_name) separator ', ') as Factors
      from
      (select tr.Tracker_ID, tr.Tracking_date, m.M_name, b.B_name, f.F_name, w.W_name, tr.Rating_ID
      from Mood m, Behaviour b, Factor f, Weather w, Mood_set ms, Behaviour_set bs, Factor_set fs,
      (select * from MBTracker where User_ID = '$uid' and Tracking_date > DATE_ADD((select max(Tracking_date) from MBTracker where User_ID = '$uid'), INTERVAL -30 DAY)) as tr
      where tr.Tracker_ID = ms.Tracker_ID and tr.Tracker_ID = bs.Tracker_ID and tr.Tracker_ID = fs.Tracker_ID
      and 
      ms.Mood_ID = m.Mood_ID and bs.Behaviour_ID = b.Behaviour_ID and fs.Factor_ID = f.Factor_ID
      and tr.Weather_ID = w.Weather_ID) as result
      where date(Tracking_date) = date('$trd')
      group by
      Tracker_ID order by Tracking_date";
      $resulte = mysqli_query($db, $query);
      $rowe = mysqli_num_rows($resulte);
      ?>

<!-- Start Data Table -->    
    <div class="container">
      <h4>Data table</h4>
      <table class="table table-striped" id="td">
        <thead>
          <tr>
            <th>Date & Time</th>
            <th>Rate</th>
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
    <?php
    }
    ?>
<!-- End Data Table -->    

  </body>
</html>
