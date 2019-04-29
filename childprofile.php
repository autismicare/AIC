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

<?php include('checkuser.php') ?>

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

    <?php
    $id = $row["User_ID"];
    $query = "SELECT  C_name, C_age, C_sex from Child where User_ID = '$id'";
    $result = mysqli_query($db, $query);
    $rows = mysqli_num_rows($result);
    ?>

    <div class="box">
      <div class="container table-responsive" style="width:75%;">
        <h4>Child Information</h4>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Age</th>
              <th>Sex</th>            
            </tr>
          </thead>
          <tbody>
            <?php
            for ($i=1;$i<=$rows;$i++)
            {
                $row1 =  mysqli_fetch_array($result);

            ?>
            <tr>
            <td><?php echo $row1["C_name"] ?></td>
            <td><?php echo $row1["C_age"] ?></td>
            <td><?php echo $row1["C_sex"] ?></td>
            </tr>
            <?php
            }
            ?>
            </table>
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-sm-4">
    <a class="btn btn-secondary" href="indexs.php">Back</a>
    </div>
