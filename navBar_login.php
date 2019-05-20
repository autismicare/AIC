<?php
echo 
  '<nav class="navbar navbar-expand-md bg-success navbar-dark fixed-top shadow p-3">
    <a class="navbar-brand" href="indexs.php">AutismICare</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item ml-2">
          <a class="nav-link" href="childprofile.php"><strong>Welcome, '. $username .' </strong></a>
        </li> 
        <li class="nav-item ml-2">
          <a class="nav-link" href="facts.php"><i class="fa fa-bullhorn"></i> Facts </a>
        </li>
        <li class="nav-item ml-2">
          <a class="nav-link" href="events.php"><i class="fa fa-calendar"></i> Upcoming Events </a>
        </li>
        <li class="nav-item ml-2">
          <a class="nav-link" href="newrecord.php"><i class="fas fa-plus"></i> Add New Record  </a>
        </li>
        <li class="nav-item ml-2">
          <a class="nav-link" href="show_chart.php"><i class="fas fa-chart-line"></i> Charts  </a>
        </li>
        <li class="nav-item ml-2">
          <a class="nav-link" href="listRecord.php"><i class="fas fa-list-ul"></i> List of Records  </a>
        </li>
        <li class="nav-item ml-2">
          <a class="nav-link" href="statistic.php"><i class="fab fa-hubspot"></i> Correlation  </a>
        </li> 
        <li class="nav-item ml-2">
          <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li> 
      </ul>
    </div>  
  </nav>'
?>