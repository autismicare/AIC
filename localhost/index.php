<?php include 'connectDB.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Autism I Care </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>
  <script type="text/javascript" src="js/firstEvent.js"></script>

</head>

<body>

<!-- Start Top Nav Bar -->
  <nav class="navbar navbar-expand-md bg-success navbar-dark fixed-top">
    <a class="navbar-brand" href="index.php">AutismICare</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item ml-2">
          <a class="nav-link" href="fact.php"><i class="fa fa-bullhorn"></i> Facts about Autism  </a>
        </li>
        <li class="nav-item ml-2">
          <a class="nav-link" href="event.php"><i class="fa fa-calendar"></i> Upcoming Autism Events  </a>
        </li>
        <li class="nav-item ml-2">
          <a class="nav-link" href="trackerMain.php"><i class="fa fa-book"></i> Mood & Behaviour Tracker  </a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i>   Signup / Sign-in  </a>       
        </li>    
      </ul>
    </div>  
  </nav>
<!-- End Top Nav Bar -->

<!-- Start Carousel -->
  <div id="carousel" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#carousel" data-slide-to="0" class="active"></li>
      <li data-target="#carousel" data-slide-to="1"></li>
      <li data-target="#carousel" data-slide-to="2"></li>
    </ul>
    
    <!-- The slideshow -->
    <div class="carousel-inner mt-5">
      <a class="carousel-item active" href="fact.php">
        <img src="assets/img/d1d.jpg" width="1100" height="500">
          <div class="carousel-caption">
              <strong>Autism: Strengthening today for a better tomorrow</strong>
          </div>
      </a>
      <a class="carousel-item" href="event.php">
        <img src="assets/img/d2d.jpg" width="1100" height="500">
          <div class="carousel-caption">
              <strong>Events: Register, Learn, Build a community</strong>  
            </div>
      </a>
      <a class="carousel-item" href="trackerMain.php">
        <img src="assets/img/d3d.jpg" width="1100" height="500">
          <div class="carousel-caption">
            <strong>Mood tracker:  Improving lives daily</strong>
          </div>
      </a>
    </div>
    <!-- End the slideshow -->
    
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#carousel" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#carousel" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
<!-- End Carousel -->

<!-- Start Contents row 1 -->
<div class="container mt-4">
  <div class="row">
    <div class="col-sm-6">
      <h4>Facts about Autism</h4>
        <div>
          <?php                       
              $sql = "SELECT * FROM Fact order by Fact_ID ASC limit 2";
              $result = $conn->query($sql);
              if ($result->num_rows > 0)
              {
                  // output data of each row
                  while($row = $result->fetch_assoc()) 
                  {
                      echo $row["F_desc"]. "<footer class='blockquote-footer'>" . $row["F_author"]. "</footer>" . "<a href='". $row["F_url"]. "'>Go to website</a><br><br>";
                  }
              } else 
              {
                  echo "0 results";
              }
              $conn->close(); 
            ?>
            <a href='fact.php' class='btn btn-secondary' role='button'>More Facts</a><br><br>
        </div>
    </div>
    <div class="col-sm-6">
      <h4>Upcoming Autism events</h4>
          <div id="events"></div>
    </div>
  </div>

</div>

<!-- End Contents row 1-->

  <div class="container mt-4">
    <div id="day"></div>
    <div id="date"></div>
  </div>

  <div class="container">
  <h4 class="mt-2">Registered Providers in Victoria</h4>
  <p>Retrieving data from <a href="https://www.ndis.gov.au/participants/working-providers/find-registered-provider">NDIS</a>, 
  there are over 1,700 registerd service providers that include assistance in Personal care, 
  Behaviour support and Development-Life skills. Click on the postcode to see further information 
  of a registered service provider near you.</p>
  
  <div class='tableauPlaceholder' id='viz1555134710541' style='position: relative'><noscript>
    <a href='#'>
    <img alt=' ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;VI&#47;VIC_HealthcareProvider&#47;Dashboard&#47;1_rss.png' style='border: none' /></a></noscript>
    <object class='tableauViz'  style='display:none;'>
    <param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> 
    <param name='embed_code_version' value='3' /> 
    <param name='site_root' value='' />
    <param name='name' value='VIC_HealthcareProvider&#47;Dashboard' />
    <param name='tabs' value='no' /><param name='toolbar' value='yes' />
    <param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;VI&#47;VIC_HealthcareProvider&#47;Dashboard&#47;1.png' /> <param name='animate_transition' value='yes' />
    <param name='display_static_image' value='yes' />
    <param name='display_spinner' value='yes' />
    <param name='display_overlay' value='yes' />
    <param name='display_count' value='yes' /></object>
  </div>                
    <script type='text/javascript'>                    
      var divElement = document.getElementById('viz1555134710541');                    
      var vizElement = divElement.getElementsByTagName('object')[0];                    
      if ( divElement.offsetWidth > 800 ) { 
        vizElement.style.minWidth='1080px';
        vizElement.style.maxWidth='100%';
        vizElement.style.minHeight='587px';
        vizElement.style.maxHeight=(divElement.offsetWidth*0.75)+'px';} 
      else if ( divElement.offsetWidth > 500 ) { 
        vizElement.style.minWidth='500px';
        vizElement.style.maxWidth='100%';
        vizElement.style.minHeight='587px';
        vizElement.style.maxHeight=(divElement.offsetWidth*0.75)+'px';} 
      else { 
        vizElement.style.minWidth='420px';
        vizElement.style.maxWidth='100%';
        vizElement.style.minHeight='587px';
        vizElement.style.maxHeight=(divElement.offsetWidth*1.77)+'px';}
      var scriptElement = document.createElement('script');                    
        scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';
        vizElement.parentNode.insertBefore(scriptElement, vizElement);                
    </script>
  </div>

</body>
</html>