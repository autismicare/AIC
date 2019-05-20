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

</head>

<body>

<!-- Top Nav bar -->
<?php include 'navBar_login.php'; ?><br><br>
<!-- Top Nav bar -->

<ul class="container mt-5 shadow p-3 text-center">
<h3>Diary</h3>
  <p class="text-left">Diary offers parents the ability to track their child's mood and behaviour on a daily basis. Recognize the external factors that affect them while learning their mood patterns. A wide range of moods are provided as colorful and expressive emoticons and pictures, which can be  be rated as frequently as desired so that changes in mood state can be recorded as often as needed. 
The charts give a global assessment of their mood based on daily, weekly or even monthly inputs.</p>
<!--   <ul class="mt-5">
  <li class="btn" style="opacity: 1;background:#F2994A;size:50%;color:white;" onclick="location.href='newrecord.php';">
    <h4><i class="fa fa-plus"></i> Add new record</h4></li>
  <li class="btn" style="opacity: 1;background:#869EFF;size:50%;color:white" onclick="location.href='show_chart.php';">
    <h4><i class="fas fa-chart-line"></i> Charts</h4></li>
  </ul> -->
  <ul style="list-style-type: none;">
    <li>
      <a class="btn btn-primary" href="newrecord.php" style="background:#02789e;width:45%;height:20%"><i class="fa fa-plus"></i> Add record</a>
      <a class="btn btn-primary ml-2" href="show_chart.php" style="background:#01a99c;width:45%;height:20%"><i class="fas fa-chart-line"></i> Charts</a>
    </li>
    <li>
      <a class="btn btn-primary" href="listRecord.php" style="background:#e9b637;width:45%;height:20%"><i class="fas fa-book"></i> List of records</a>
      <a class="btn btn-primary ml-2" href="statistic.php" style="background:#d31227;width:45%;height:20%"><i class="fas fa-chart-pie"></i> Correlations</a>
    </li>    
  </ul>
</ul>

<!--<ul class="blocks-names mt-5">
<li class="blocks__name ml-2 btn" style="opacity: 1;background:#F2994A;" onclick="location.href='newrecord.php';">
  <i class="fa fa-plus"></i> Add new record</li>
<li class="blocks__name mr-2 btn" style="opacity: 1;background:#869EFF;">
  <i class="fas fa-chart-line"></i> Charts</li>
</ul>
<ul class="blocks-names">
<li class="blocks__name ml-2" style="opacity: 1;background:#FC40B1;">
  <i class="fas fa-book"></i> List of records</li>
<li class="blocks__name mr-2" style="opacity: 1;background:#5eecc6;">
  <i class="fas fa-chart-pie"></i> Statistics</li>
</ul>-->


</body>
</html>