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

<?php include('as.php') ?>

<body>

<!-- Top Nav bar -->
<?php include 'navBar_login.php'; ?><br><br>
<!-- Top Nav bar -->


    <?php
    
    $query = "SELECT  * from Child where User_ID = '$uid'";
    $result = mysqli_query($db, $query);
    $rows = mysqli_num_rows($result);
     
    $query_2 = "SELECT * from User where User_ID = '$uid'";
    $result_2 = mysqli_query($db, $query_2);
    $rows_2 = mysqli_num_rows($result_2);

    ?>

  <div class="row mt-5 text-center">

    <div class="col-md-11 col-lg-5 container shadow p-3 mt-2 mb-4">
    
      <h3>Personal Profile</h3><br>
      <img src="./assets/img/user.png" style="width:120px;height:120px;"><br><br>
      
      <?php 
      // fetching data from database of the registered username
        for ($i=1;$i<=$rows_2;$i++)
            {
                $row =  mysqli_fetch_array($result_2);
                echo '<strong>Account Name : </strong>'.$row["U_name"].'<br>';
                echo '<strong>Registered Email : </strong>'.$row["U_email"].'<br>';
            }
      ?> 
    
    </div>

    <div class="col-md-11 col-lg-5 container shadow p-3 mt-2 mb-4">
    
      <h3>Child Profile</h3>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
              <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Sex</th>   
                <th></th>                     
              </tr>
          </thead>
          <tbody>
            <?php
            // fetching data from database of the Child's Profile
            for ($i=1;$i<=$rows;$i++)
            {
                $row1 =  mysqli_fetch_array($result);

            ?>
            
            <tr>
            <td  class="align-middle"><?php echo $row1["C_name"] ?></td>
            <td  class="align-middle"><?php echo $row1["C_age"] ?></td>
            <td  class="align-middle"><?php echo $row1["C_sex"] ?></td>
            <td  class="align-middle">
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#childModal" >Edit</button>             
            </td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>      

    </div>

    <!-- Start Edit Modal -->
  <div class="modal fade" id="childModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Please re-enter Child's information</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      
        <div class="modal-body">
        <form method="post" action="childprofile.php">
          <label for="Child_name">Child Name : </label><input type="text" class="form-control"  name="Child_name" required>
          <label for="Child_age">Child Age : </label>
          <br>
          <select name="Child_age" class="form-control" required>
            <option value="" selected>Select Age</option>
            <option value="1" >1</option>
            <option value="2" >2</option>
            <option value="3" >3</option>
            <option value="4" >4</option>
            <option value="5" >5</option>
            <option value="6" >6</option>
            <option value="7" >7</option>
            <option value="8" >8</option>
            <option value="9" >9</option>
            <option value="10" >10</option>
            <option value="11" >11</option>
            <option value="12" >12</option>
            <option value="13" >13</option>
            <option value="14" >14</option>
            <option value="15" >15</option>
            <option value="16" >16</option>
            <option value="17" >17</option>
            <option value="18" >18</option>
            <option value="19" >19</option>
	    <option value="20" >20</option>
            <option value="21" >21</option>
            <option value="22" >22</option>
            <option value="23" >23</option>
            <option value="24" >24</option>
            <option value="25" >25</option>
            <option value="26" >26</option>
            <option value="27" >27</option>
            <option value="28" >28</option>
            <option value="29" >29</option>
            <option value="30" >30</option>

          </select>
          <br>
          <label for="Child_sex">Child Sex : </label>
          <br>
          <select name="Child_sex" class="form-control"  required>
            <option value="" selected>Select Gender</option>
            <option value="Male" >Male</option>
            <option value="Female" >Female</option>
          </select> 
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input class="btn btn-primary" type="submit" value="Save" name ="new_child"/>
          </form>
          
        </div>
      </div>
      
    </div>
  </div>
  <!-- End Factor Modal -->

  <?php

  // Updating data to database of the Child's Profile
  session_start();
  $valuecn = "";
  $valueca = "";
  $valuecs = "";
  $db = mysqli_connect('localhost', 'root', 'toor', 'AutismICare');
  if (isset($_REQUEST['new_child'])) {
  $c_id = $row1['Child_ID'];
  $valuecn=mysqli_real_escape_string($db,$_REQUEST['Child_name']);
  $valueca=mysqli_real_escape_string($db,$_REQUEST['Child_age']);
  $valuecs=mysqli_real_escape_string($db,$_REQUEST['Child_sex']);

  $queryc = "UPDATE Child SET C_name = '$valuecn', C_age = '$valueca', C_sex ='$valuecs'  WHERE Child_ID = '$c_id'";

  mysqli_query($db,$queryc);
  
  echo "<meta http-equiv='refresh' content='0'>";
  }
  

?>

  <div class='container-fluid text-left'>
    <a class="btn btn-secondary mt-5 ml-2" action="action" onclick="window.history.go(-1); return false;" href="">Back</a>    
    </div>

