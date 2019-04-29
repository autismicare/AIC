<!--new record works!-->
<!DOCTYPE html>
<html>
<head>
  <title>Autism I Care : Home </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">  
  <link rel="stylesheet" href="css/tracker.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>
  <script type="text/javascript" src="js/dateTime.js"></script>
  
<?php include('checkuser.php') ?>
<?php

if (isset($_REQUEST['chart'])) {
	$valuedt = $_REQUEST['datetime'];
	$valuem = $_REQUEST['mood'];
  $valueb = $_REQUEST['behaviour'];
  $valuef = $_REQUEST['factor'];
  $uid = $row['User_ID']; 
  $valuer = $_REQUEST['rate'];
	$valuew = $_REQUEST['weather'];
	echo "$valuedt";
  $query = "INSERT INTO MBTracker (User_ID, Weather_ID, Rating_ID,Tracking_date)VALUES('$uid', '$valuew[0]', '$valuer[0]','$valuedt')";
  mysqli_query($db, $query); 
  $queryuid = "SELECT MAX(Tracker_ID) as tid from MBTracker where User_ID = '$uid'";
  $tid=mysqli_query($db, $queryuid);
  $tidrow = mysqli_fetch_array($tid);
  $tirow = $tidrow['tid'];
  
  for($i=0; $i<(count($valuem));$i++)
  {
	$querymood = "INSERT INTO Mood_set (Mood_ID, Tracker_ID)VALUES('$valuem[$i]','$tirow')";
	mysqli_query($db, $querymood); 
  }
  
  for($i=0; $i<(count($valueb));$i++)
  {
	$querybehave = "INSERT INTO Behaviour_set (Behaviour_ID, Tracker_ID)VALUES('$valueb[$i]','$tirow')";
	mysqli_query($db, $querybehave); 
  }
  
  for($i=0; $i<(count($valuef));$i++)
  {
	$queryfactor = "INSERT INTO Factor_set (Factor_ID, Tracker_ID)VALUES('$valuef[$i]','$tirow')";
	mysqli_query($db, $queryfactor); 
  }
  echo "<body style='background:linear-gradient(to right,#fce4ed,#ffe8cc)'>
		<div class='alert alert-success alert-dismissible mt-5'>
	  		<button type='button' class='close' data-dismiss='alert'>&times;</button>
	  		<h2><strong>Success!</strong> the record is saved.</h2>
	  	</div></body>";
  header( "refresh:2; url=trackerMain.php" ); 
  die(); 
}

?>

<body style="background:linear-gradient(to right,#fce4ed,#ffe8cc)">
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
  	<div class="container-fluid ml-2">
				<form method="post">				
				<label for="record-time" class="mt-2"><strong>Choose Date/time : </strong></label>
				<input type="datetime-local" id="myDatetimeField" name="datetime" /><br>	
	</div>
	<!-- Start Contents row 1 -->
	<!--<div class="d-flex justify-content-center ml-2">-->
	<div class="container-fluid ml-2">
		<div class="row">
			<div class ="col">
			<div class ="container-fluid">

			</div>				
				<strong>How would you rate your child's day? </strong><br>			
				<?php				
				$query = "select  * from Rating";
				$result = mysqli_query($db, $query);	
				echo "<select name='rate[]'  id ='rate'  size='4' required>";
				while ($row = mysqli_fetch_array($result)) {
					echo "<option class='list-group-item list-group-item-action d-flex align-items-center'";
					echo "value='" . $row['Rating_ID'] ."' style='width:300px;background:url(" . $row['R_icon'] 
					. ") no-repeat 100% 50%;background-size:26%'>" . $row['Rating_Desc']."</option>";
				}
				echo "</select>";
				?>
			</div>
			<div class ="col">			
				<strong>Mood : </strong><br>
				<?php
				$query = "select  * from Mood";
				$result = mysqli_query($db, $query);
				echo "<select name='mood[]'  id ='mood' multiple required >";
				while ($row = mysqli_fetch_array($result)) {
					echo "<option class='list-group-item list-group-item-action d-flex align-items-center'";
					echo "value='" . $row['Mood_ID'] ."' style='width:300px;background:url(" . $row['M_icon'] 
					. ") no-repeat 100% 50%;background-size:26%'>" . $row['M_name']."</option>";
				}
				echo "</select>";
				?>
			</div>
		</div>
		<div class="row">
			<div class ="col">				
				<br><strong>Behaviour : </strong><br>				
				<?php
				$query = "select  * from Behaviour";
				$result = mysqli_query($db, $query);
				echo "<select name='behaviour[]'  id ='behaviour' multiple required >";
				while ($row = mysqli_fetch_array($result)) {			
					echo "<option class='list-group-item list-group-item-action d-flex align-items-center'";
					echo "value='" . $row['Behaviour_ID'] ."' style='width:300px;background:url(" . $row['B_icon'] 
					. ") no-repeat 100% 50%;background-size:25%'>" . $row['B_name']."</option>";
				}
				echo "</select>";
				?>
			</div>
			<div class ="col">				
				<br><strong>Factor : </strong><br>				
				<?php
				$query = "select  * from Factor";
				$result = mysqli_query($db, $query);
				echo "<select name='factor[]'  id ='factor' multiple required>";
				while ($row = mysqli_fetch_array($result)) {
					echo "<option class='list-group-item list-group-item-action d-flex align-items-center'";
					echo "value='" . $row['Factor_ID'] ."' style='width:300px;background:url(" . $row['F_icon'] 
					. ") no-repeat 100% 50%;background-size:25%'>" . $row['F_name']."</option>";
				}				
				echo "</select>";
				?>
			</div>
		</div>
		<div class="row">
			<div class ="col">	
				<br><strong>Weather : </strong><br>				
				<?php
				$query = "select  * from Weather";
				$result = mysqli_query($db, $query);
				echo "<select name='weather[]'  id ='weather' size='4' required>";
				while ($row = mysqli_fetch_array($result)) {
					echo "<option class='list-group-item list-group-item-action d-flex align-items-center'";
					echo "value='" . $row['Weather_ID'] ."' style='width:300px;background:url(" . $row['W_icon'] 
					. ") no-repeat 100% 50%;background-size:25%'>" . $row['W_name']."</option>";
				}					
				echo "</select>";
				?><br><br>
			</div>
			<div class="col mt-5">				
				<br><br><br><br>
				<a class="btn btn-secondary" href="trackerMain.php">BACK</a>
				<input class="btn btn-primary" type="submit" value="SAVE" name ="chart">
				</form>
			</div>
		</div>   
		</div>	
 
    
</div>
<script>
$('option').mousedown(function(e) {
    e.preventDefault();
    var originalScrollTop = $(this).parent().scrollTop();
    console.log(originalScrollTop);
    $(this).prop('selected', $(this).prop('selected') ? false : true);
    var self = this;
    $(this).parent().focus();
    setTimeout(function() {
        $(self).parent().scrollTop(originalScrollTop);
    }, 0);
    
    return false;
});

</script>

</body>
</html>
