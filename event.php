<!DOCTYPE html>
<html>
<head>
  <title>Autism I Care </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main_v4.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>
  <script type="text/javascript" src="js/events.js"></script>
  <script type="text/javascript" src="js/to-top-to-btm.js"></script>
</head>

<body>

<!-- Start Top Nav Bar -->
<?php include 'navBar.php'; ?><br><br>
<!-- End Top Nav Bar -->

  <button onclick="topFunction()" id="topBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
  <button class="sticky btn btn-secondary" action="action" onclick="window.history.go(-1); return false;" id="backBtn" title="BACK">BACK</button>  
  <button onclick="bottomFunction()" id="bottomBtn" title="Go to bottom" style="background-color:red;"><i class="fas fa-arrow-down"></i></button>


<div class="container shadow mt-5 p-3 text-center">
<h4>Upcoming Events!</h4>
<div class="d-flex justify-content-center flex-wrap" id="events" style="overflow-x:auto;"></div>
</div>

</body>
</html>