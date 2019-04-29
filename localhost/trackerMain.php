<?php include('checkuser.php') ?>

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

</head>

<body style='background:linear-gradient(to right,#fce4ed,#ffe8cc)'>

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

<!-- Start Contents row 1 
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-6">
      <a href="#" class="btn btn-info btn-lg" role="button">Add new record</a>
    </div>
    <div class="col-sm-6">
      <a href="#" class="btn btn-info btn-lg" role="button">Charts</a>      
    </div>
  </div>
</div>
<div class="container mt-4">
  <div class="row">
    <div class="col-sm-6">
      <a href="#" class="btn btn-info btn-lg" role="button">List of records</a>            
    </div>
    <div class="col-sm-6">
      <a href="#" class="btn btn-info btn-lg" role="button">Statistics</a>            
    </div>
  </div>
</div> --End Contents row 2-->


<ul class="container">
<h2>Mood & Behaviour Tracker</h2>
  <p>Mood and Behaviour Tracker offers parents the ability to track their child's mood and behaviour on a daily basis. Recognize the external factors that affect them while learning their mood patterns. A wide range of moods are provided as colorful and expressive emoticons and pictures, which can be  be rated as frequently as desired so that changes in mood state can be recorded as often as needed. 
The charts give a global assessment of their mood based on daily, weekly or even monthly inputs.</p>
</ul>
<ul class="blocks-names mt-5">

<li class="blocks__name mx-5 btn" style="opacity: 1;background:#F2994A;size:50%;color:white;" onclick="location.href='newrecord.php';">
  <h4><i class="fa fa-plus"></i> Add new record</h4></li>
<li class="blocks__name mx-5 btn" style="opacity: 1;background:#869EFF;size:50%;color:white" onclick="location.href='show_chart.php';">
  <h4><i class="fas fa-chart-line"></i> Charts</h4></li>
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
<li class="blocks__name mr-2" style="opacity: 1;background:#97FCE1;">
  <i class="fas fa-chart-pie"></i> Statistics</li>
</ul>-->


</body>
</html>