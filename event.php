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
  <script type="text/javascript" src="js/events.js"></script>
  <script type="text/javascript" src="js/back-top.js"></script>
</head>

<body>

<!-- Start Top Nav Bar -->
<?php include 'navBar.php'; ?><br><br>
<!-- End Top Nav Bar -->
  <button class="btn btn-secondary" onclick="location.href='index.php';" id="backBtn" title="BACK">BACK</button>


<div class="container shadow mt-5 p-3 text-center">
<h4>Upcoming Events!</h4>
<div class="d-flex justify-content-center flex-wrap" id="events" style="overflow-x:auto;"></div>
</div>

  <button onclick="topFunction()" id="myBtn" title="Go to top">Go to top</button>

</body>
</html>