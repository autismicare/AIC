<!DOCTYPE html>
<html>
<head>
  <title>Autism I Care </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/checkbox2.css">
  <link rel="stylesheet" href="css/main_v4.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>
  <script type="text/javascript" src="js/dateTime.js"></script>
  <script type="text/javascript" src="js/to-top-to-btm.js"></script>
  <script type="text/javascript">
    $(function(){
    
    var m=0;


    var requiredCheckboxes = $(':checkbox[name="mood[]"],:checkbox[name="cmood[]"] ');

    requiredCheckboxes.change(function(){

        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
            m=m+1;
        }
        else
        {
            requiredCheckboxes.attr('required', 'required');
        }
    });

    
    var requiredCheckboxesf = $(':checkbox[name="factor[]"],:checkbox[name="cfactor[]"] ');

    requiredCheckboxesf.change(function(){

        if(requiredCheckboxesf.is(':checked')) {
            requiredCheckboxesf.removeAttr('required');
        }

        else {
            requiredCheckboxesf.attr('required', 'required');
        }
    });

    
    var requiredCheckboxesb = $(':checkbox[name="behaviour[]"],:checkbox[name="cbehaviour[]"] ');

    requiredCheckboxesb.change(function(){

        if(requiredCheckboxesb.is(':checked')) {
            requiredCheckboxesb.removeAttr('required');
        }

        else {
            requiredCheckboxesb.attr('required', 'required');
        }
    });

});
    
  </script>
<?php include('as.php') ?>

<?php
if(isset($_REQUEST['new_mood'])){
  $uid = $row['User_ID']; 
  $valuenm=$_REQUEST['Mood_name'];
  $valueim=$_REQUEST['Mood_icon'];
  $querynm = "INSERT INTO CMood (CM_name,User_ID,CM_icon) VALUES('$valuenm','$uid','$valueim')";
  mysqli_query($db,$querynm);
}

if(isset($_REQUEST['new_behaviour'])){
  $uid = $row['User_ID']; 
  $valuenb=$_REQUEST['Behaviour_name'];
  $valueib=$_REQUEST['Behaviour_icon'];
  $querynb = "INSERT INTO CBehaviour (CB_name,User_ID,CB_icon) VALUES('$valuenb','$uid','$valueib')";
  mysqli_query($db,$querynb);
}

if(isset($_REQUEST['new_factor'])){
  $uid = $row['User_ID']; 
  $valuenf=$_REQUEST['Factor_name'];
  $valueif=$_REQUEST['Factor_icon'];
  $querynf = "INSERT INTO CFactor (CF_name,User_ID,CF_icon) VALUES('$valuenf','$uid','$valueif')";
  mysqli_query($db,$querynf);
}

if (isset($_REQUEST['chart'])) {
  $errors = array(); 
  $valuedt = $_REQUEST['datetime'];
  $valuem = $_REQUEST['mood'];
  $valueb = $_REQUEST['behaviour'];
  $valuef = $_REQUEST['factor'];
  $valuecm = $_REQUEST['cmood'];
  $valuecb = $_REQUEST['cbehaviour'];
  $valuecf = $_REQUEST['cfactor'];
  $uid = $row['User_ID']; 
  $valuer = $_REQUEST['rate'];
  $valuew = $_REQUEST['weather'];
  $valuen = $_REQUEST['note'];
  
  $query = "INSERT INTO MBTracker (User_ID, Weather_ID, Rating_ID,Tracking_date,notes)VALUES('$uid', '$valuew[0]', '$valuer[0]','$valuedt','$valuen')";
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
  
  for($i=0; $i<(count($valuecm));$i++)
  {
  $querycmood = "INSERT INTO CMood_set (CMood_ID, Tracker_ID)VALUES('$valuecm[$i]','$tirow')";
  mysqli_query($db, $querycmood); 
  }

  for($i=0; $i<(count($valueb));$i++)
  {
  $querybehave = "INSERT INTO Behaviour_set (Behaviour_ID, Tracker_ID)VALUES('$valueb[$i]','$tirow')";
  mysqli_query($db, $querybehave); 
  }
  
  for($i=0; $i<(count($valuecb));$i++)
  {
  $querycbehave = "INSERT INTO CBehaviour_set (CBehaviour_ID, Tracker_ID)VALUES('$valuecb[$i]','$tirow')";
  mysqli_query($db, $querycbehave); 
  }
  

  for($i=0; $i<(count($valuef));$i++)
  {
  $queryfactor = "INSERT INTO Factor_set (Factor_ID, Tracker_ID)VALUES('$valuef[$i]','$tirow')";
  mysqli_query($db, $queryfactor); 
  }
  
  for($i=0; $i<(count($valuecf));$i++)
  {
  $querycfactor = "INSERT INTO CFactor_set (CFactor_ID, Tracker_ID)VALUES('$valuecf[$i]','$tirow')";
  mysqli_query($db, $querycfactor); 
  }
  
  ?>
  <script>
    alert("Your record is Saved");
  </script>
  <?php
}

?>
</head>
<body>
<!-- Start Top Nav Bar -->
<?php include 'navBar_login.php'; ?><br><br><br>
<!-- End Top Nav Bar -->


  <button onclick="topFunction()" id="topBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
  <button class="sticky btn btn-secondary" action="action" onclick="window.history.go(-1); return false;" id="backBtn" title="BACK">BACK</button>  
  <button onclick="bottomFunction()" id="bottomBtn" title="Go to bottom" style="background-color:red;"><i class="fas fa-arrow-down"></i></button>


  <form method="post"  style="text-align: center;">      

  <div class="row mt-2">
    <div class="col-md-11 col-lg-5 container shadow p-3 mt-2 mb-4">

      <strong style="font-size:22px;">Choose date/time : </strong><br>
      <input type="datetime-local" id="myDatetimeField" name="datetime" style="background-color:#f2f2f2" /><br />   
          
      <hr>

      <strong style="font-size:22px;">How would you rate your child's day? </strong><br>    
      <?php       
      $query = "SELECT * FROM Rating";
            $result = mysqli_query($db, $query);
            $rows = mysqli_num_rows($result);
            while ($row = mysqli_fetch_array($result)) {
            echo '<label class="block" ><input type="radio" name="rate" value="'.$row['Rating_ID'].'" required="required"><img src="'.$row['R_icon'].'" style="width:40%;height:40%"><div class="checkmark" >'.$row['Rating_Desc'].'</div></label> ';
            //without the Rating desc
      }
      ?>
    </div>
  
    <div class="col-md-11 col-lg-5 container shadow p-3 mt-2 mb-4">    
    <!-- <div class="col-md-12 col-lg-6"> -->
    <strong style="font-size:22px;">Mood (can be multiple) :</strong><br>
        <?php
        $query = "SELECT  * FROM Mood";
                $result = mysqli_query($db, $query);        
                $rows = mysqli_num_rows($result);
                while ($row = mysqli_fetch_array($result)) {
                //echo '<label class="block"><input type="checkbox" name="mood[]" value="'.$row['Mood_ID'].'"><span class="checkmark"></span> '.$row['M_name'].' <img src="'.$row['M_icon'].'" style="width:20%;height:20%"></label> &nbsp;&nbsp;&nbsp;&nbsp;';
                echo '<label class="block"><input type="checkbox" id = "m" name="mood[]" value="'.$row['Mood_ID'].'" required="required"><img src="'.$row['M_icon'].'" style="width:40%;height:40%"><div class="checkmark">'.$row['M_name'].'</div></label> &nbsp;&nbsp;';
        }
        ?>

        <?php
        $queryc = "SELECT  * FROM CMood where User_ID='$uid'";
                $resultc = mysqli_query($db, $queryc);        
                $rowsc = mysqli_num_rows($resultc);
                while ($rowc = mysqli_fetch_array($resultc)) {
                //echo '<label class="block"><input type="checkbox" name="mood[]" value="'.$row['Mood_ID'].'"><span class="checkmark"></span> '.$row['M_name'].' <img src="'.$row['M_icon'].'" style="width:20%;height:20%"></label> &nbsp;&nbsp;&nbsp;&nbsp;';
                echo '<label class="block"><input type="checkbox" name="cmood[]" value="'.$rowc['CMood_ID'].'" required="required"><img src="'.$rowc['CM_icon'].'" style="width:35%;height:100%"><div class="checkmark">'.$rowc['CM_name'].'</div></label> &nbsp;&nbsp;';
        }
        ?>
        <br>
        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Add custom mood"> 
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#moodModal">Add Mood</button>
        </span>


      </div>
    </div>

  <div class="row">    
    <div class="col-md-11 col-lg-5 container shadow p-3 mt-2 mb-4">

      <strong style="font-size:22px;">Behaviour (can be multiple) :</strong><br>
        <?php
        $query = "SELECT  * FROM Behaviour";
        $result = mysqli_query($db, $query);
        $rows = mysqli_num_rows($result);
                while ($row = mysqli_fetch_array($result)) {
              echo '<label class="block"><input type="checkbox" name="behaviour[]" value="'.$row['Behaviour_ID'].'" required="required"><img class="ml-2" src="'.$row['B_icon'].'" style="width:40%;height:40%"><div class="checkmark">'.$row['B_name'].'</div></label> &nbsp;&nbsp;';        
        }
        ?>
        <br>
        <?php
        $queryc = "SELECT  * FROM CBehaviour where User_ID='$uid'";
                $resultc = mysqli_query($db, $queryc);        
                $rowsc = mysqli_num_rows($resultc);
                while ($rowc = mysqli_fetch_array($resultc)) {
                echo '<label class="block"><input type="checkbox" name="cbehaviour[]" value="'.$rowc['CBehaviour_ID'].'" required="required"><img src="'.$rowc['CB_icon'].'" style="width:35%;height:40%"><div class="checkmark">'.$rowc['CB_name'].'</div></label> &nbsp;&nbsp;';
        }
      ?>
      <br>     

        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Add custom behaviour"> 
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#behaviourModal">Add Behaviour</button>
        </span>         

    </div>

    <div class="col-md-11 col-lg-5 container shadow p-3 mt-2 mb-4">
      <strong style="font-size:22px;">Factor (can be multiple) :</strong><br>

        <?php
        $query = "SELECT  * FROM Factor";
                $result = mysqli_query($db, $query);        
                $rows = mysqli_num_rows($result);
                while ($row = mysqli_fetch_array($result)) {
              echo '<label class="block"><input type="checkbox" name="factor[]" value="'.$row['Factor_ID'].'" required="required"><img src="'.$row['F_icon'].'" style="width:40%;height:40%"><div class="checkmark">'.$row['F_name'].'</div></label> &nbsp;&nbsp;';
        }
        ?>
        <br>
        <?php
        $queryc = "SELECT  * FROM CFactor where User_ID='$uid'";
                $resultc = mysqli_query($db, $queryc);        
                $rowsc = mysqli_num_rows($resultc);
                while ($rowc = mysqli_fetch_array($resultc)) {
                echo '<label class="block"><input type="checkbox" name="cfactor[]" value="'.$rowc['CFactor_ID'].'" required="required"><img src="'.$rowc['CF_icon'].'" style="width:35%;height:40%"><div class="checkmark">'.$rowc['CF_name'].'</div></label> &nbsp;&nbsp;';
        }
        
        ?>
        <br> 
        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Add custom factor">        
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#factorModal">Add Factor</button>
        </span>

      </div>

    </div>

    <div class="row">    
      
      <div class="col-md-11 col-lg-5 container shadow p-3 mt-2 mb-4">    
    
        <strong style="font-size:22px;">Weather :</strong><br>
          <?php
          $query = "SELECT  * FROM Weather";
          $result = mysqli_query($db, $query);
          $rows = mysqli_num_rows($result);
                  while ($row = mysqli_fetch_array($result)) {
                  echo '<label class="block"><input type="radio" name="weather" value="'.$row['Weather_ID'].'" required="required"><img src="'.$row['W_icon'].'" style="width:40%;height:40%"><div class="checkmark">'.$row['W_name'].'</div></label> &nbsp;&nbsp;';       
          }
          ?>
      </div>

      <div class="col-md-11 col-lg-5 container shadow p-3 mt-2 mb-4">          
        <!-- Start Note -->
        <div class="form-group d-flex justify-content-center">
        <strong class="mr-2" style="font-size:22px;">Note : </strong><br>
          <textarea class="form-control" rows="4" id="note" name="note" placeholder="Add text here.." style="width:80%"></textarea>
        </div> 
        <!-- End Note -->      
      </div>
      
    </div>

        <br>
        <input class="btn btn-primary" type="submit" value="SAVE"  name ="chart">

    </form>
    <!-- End Form -->

<!--   <div class="col">        
        <a class="btn btn-secondary" href="trackerMain.php">BACK</a>
  </div> -->

  <!-- Start Mood Modal -->
  <div class="modal fade" id="moodModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
	  <h5 class="modal-title">Please select an icon for custom mood:</h5>
          
	 <button type="button" class="close" data-dismiss="modal">&times;</button>
	 
        </div>

        <div class="modal-body">
           <form method=post>

	  <label for="Mood_name">Mood Name:</label>

          <input type="text" class="form-control" id="Mood_name" name="Mood_name" required>
                 <?php       
          $query = "SELECT * FROM CMood_icons";
                $result = mysqli_query($db, $query);
                $rows = mysqli_num_rows($result);
                while ($row = mysqli_fetch_array($result)) {
                echo '<label class="block_custom"><input type="radio" name="Mood_icon" value="'.$row['CM_icon'].'" required ><img class="checkmark" src="'.$row['CM_icon'].'"  style="width:10%;height:10%;"></label> &nbsp;';                                       
                //without the Rating desc
          }
          ?>               
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input class="btn btn-primary" type="submit" value="Save" name ="new_mood">
          </form>
        </div>
      </div>
      
    </div>
  </div>
  <!-- End Mood Modal -->

  <!-- Start Behaviour Modal -->
  <div class="modal fade" id="behaviourModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Please select an icon for custom behaviour</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
        <form method=post>
          <label for="Behaviour_name">Behaviour Name:</label>
          <input type="text" class="form-control" id="Behaviour_name" name="Behaviour_name" required>
          <?php       
          $query = "SELECT * FROM CBehaviour_icons";
                $result = mysqli_query($db, $query);
                $rows = mysqli_num_rows($result);
                while ($row = mysqli_fetch_array($result)) {
                  echo '<label class="block_custom"><input type="radio" name="Behaviour_icon" value="'.$row['CB_icon'].'" required ><img class="checkmark" src="'.$row['CB_icon'].'"  style="width:15%;height:10%;"></label> &nbsp;';                                       
          }
          ?>                  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input class="btn btn-primary" type="submit" value="Save" name ="new_behaviour">
          </form>
        </div>
      </div>
      
    </div>
  </div>
  <!-- End Behaviour Modal -->

  <!-- Start Factor Modal -->
  <div class="modal fade" id="factorModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Please select an icon for custom factor</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      
        <div class="modal-body">
        <form method=post>
          <label for="Factor_name">Factor Name:</label>
          <input type="text" class="form-control" id="Factor_name" name="Factor_name" required>
          <?php       
          $query = "SELECT * FROM CFactor_icons";
                $result = mysqli_query($db, $query);
                $rows = mysqli_num_rows($result);
                while ($row = mysqli_fetch_array($result)) {
                  echo '<label class="block_custom"><input type="radio" name="Factor_icon" value="'.$row['CF_icon'].'" required ><img class="checkmark" src="'.$row['CF_icon'].'"  style="width:15%;height:10%;"></label> &nbsp;';                                       
          }
          ?>               
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input class="btn btn-primary" type="submit" value="Save" name ="new_factor">
          </form>
        </div>
      </div>
      
    </div>
  </div>
  <!-- End Factor Modal -->

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
