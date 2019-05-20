<?php include 'connectDB.php'; ?>

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
  <script type="text/javascript" src="js/sample_event.js"></script>

</head>

<body>
<!-- Top Nav bar -->
<?php include 'navBar.php'; ?><br>
<!-- Top Nav bar -->

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
        <img src="assets/img/d1.jpg" width="1100" height="500">
          <div class="carousel-caption" style="bottom:15%;text-shadow:#FF1493 1px 0 10px;">
              <h3 style="font-size:3vw;">Autism: Strengthening today<br> for a better tomorrow</h3>
          </div>
      </a>
      <a class="carousel-item" href="#event-section">
        <img src="assets/img/d2.jpg" width="1100" height="500">
          <div class="carousel-caption" style="top:50%;text-shadow:#228B22 1px 0 10px;">
              <h3 style="font-size:3vw;">Upcoming events: Register, Learn, Build a community</h3>  
            </div>
      </a>
      <a class="carousel-item" href="trackerMain.php">
        <img src="assets/img/d3.jpg" width="1100" height="500">
          <div class="carousel-caption text-right" style="top:10%;text-shadow:#00BFFF 1px 0 10px;">
            <h2 style="font-size:3vw;">Diary: <br>Improving <br>lives daily</h2>
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
<ul class="container mt-2 shadow p-3">
<h3>Register with us today to access <a href="login.php">Diary</a></h3>
  <p class="text-left">Diary offers parents the ability to track their child's mood and behaviour on a daily basis. Recognize the external factors that affect them while learning their mood patterns. A wide range of moods are provided as colorful and expressive emoticons and pictures, which can be  be rated as frequently as desired so that changes in mood state can be recorded as often as needed. 
The charts give a global assessment of their mood based on daily, weekly or even monthly inputs.</p>
  <ul style="list-style-type: none;">
    <li>
      <a class="btn btn-primary" href="login.php" style="background:#02789e;width:45%;height:20%"><i class="fa fa-plus"></i> Add record</a>
      <a class="btn btn-primary ml-2" href="login.php" style="background:#01a99c;width:45%;height:20%"><i class="fas fa-chart-line"></i> Charts</a>
    </li>
    <li>
      <a class="btn btn-primary" href="login.php" style="background:#e9b637;width:45%;height:20%"><i class="fas fa-list-ul"></i> List of records</a>
      <a class="btn btn-primary ml-2" href="login.php" style="background:#d31227;width:45%;height:20%"><i class="fab fa-hubspot"></i> Correlations</a>
    </li>    
  </ul>
</ul>

<div class="container mt-2 shadow p-3">
      <h4>Facts about Autism</h4>
        <div>
          <?php                       
              $sql = "SELECT * FROM Fact order by Fact_ID ASC limit 1";
              $result = $conn->query($sql);
              if ($result->num_rows > 0)
              {
                  // output data of each row
                  while($row = $result->fetch_assoc()) 
                  {
                      echo $row["F_desc"]. "<footer class='blockquote-footer'>" . $row["F_author"]. "</footer>" . "<a href='". $row["F_url"]. "'>Read on</a><br><br>";
                  }
              } else 
              {
                  echo "0 results";
              }
              $conn->close(); 
            ?>
            <a href='fact.php' class='btn btn-secondary' role='button'>More Facts</a><br><br>
        </div>
  </div><br>

<!--   Start call two events -->
    <div class="container shadow p-3">
      <div id="event-section">
          <h4>Upcoming Autism events</h4>
    <div class="text-center">
              <div id="events" class="d-flex justify-content-center flex-wrap"></div>
    <br><a href="event.php" class="btn btn-secondary text-center" role="button">More Events</a>
      </div></div>
    </div><br> 
<!--     End call two events -->

<!-- End Contents row 1-->

  <div class="container shadow p-3">
  <h4 class="mt-2">Registered Providers in Victoria</h4>
  <p>Retrieving data from <a href="https://www.ndis.gov.au/participants/working-providers/find-registered-provider">NDIS</a>, 
  there are over 1,700 registerd service providers that include assistance in Personal care, 
  Behaviour support and Development-Life skills. Click on the postcode to see further information 
  of a registered service provider near you.</p>
  
    <div class='tableauPlaceholder' id='viz1557485170874' style='position: relative'><noscript>
    <a href='#'><img alt=' ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Re&#47;RegisteredProvidersinVIC&#47;Dashboard&#47;1_rss.png' style='border: none' /></a>
    </noscript><object class='tableauViz'  style='display:none;'>
    <param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> 
    <param name='embed_code_version' value='3' /> <param name='site_root' value='' />
    <param name='name' value='RegisteredProvidersinVIC&#47;Dashboard' />
    <param name='tabs' value='no' /><param name='toolbar' value='yes' />
    <param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Re&#47;RegisteredProvidersinVIC&#47;Dashboard&#47;1.png' /> 
    <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' />
    <param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' />
    <param name='display_count' value='yes' /></object>
    </div>                
    <script type='text/javascript'>                    
      var divElement = document.getElementById('viz1557485170874');                    
      var vizElement = divElement.getElementsByTagName('object')[0];                    
      if ( divElement.offsetWidth > 800 ) 
        { vizElement.style.width='100%';vizElement.style.height=(divElement.offsetWidth*0.75)+'px';} 
      else if ( divElement.offsetWidth > 500 ) 
        { vizElement.style.minWidth='420px';vizElement.style.maxWidth='100%';vizElement.style.minHeight='587px';vizElement.style.maxHeight=(divElement.offsetWidth*0.75)+'px';} 
      else 
        { vizElement.style.width='100%';vizElement.style.height=(divElement.offsetWidth*1.77)+'px';}                     
      var scriptElement = document.createElement('script');                    
      scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                    
      vizElement.parentNode.insertBefore(scriptElement, vizElement);                
    </script>
  </div>

</body>
</html>