<?php include('checkuser.php') ?>
<?php
// initializing variables
$name = "";
$age = "";
$gender = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', 'toor', 'AutismICare');
// $db = mysqli_connect('localhost', 'root', '', 'AIC');
$id= $row["User_ID"];
?>
<?php
 
if (isset($_REQUEST['reg_child'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_REQUEST['name']);
  $age = mysqli_real_escape_string($db, $_REQUEST['age']);
  $gender = mysqli_real_escape_string($db, $_REQUEST['gender']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($age)) { array_push($errors, "Age is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  
  $query = "INSERT INTO Child (C_name, C_age, C_sex,User_ID) 
                VALUES('$name', '$age', '$gender','$id')";
  mysqli_query($db, $query);
  header('location:trackerMain.php');  
  
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Autism I Care : Fill in child information </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css"> 
  <link rel="stylesheet" href="css/signup.css">   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>

</head>

<body>

<!-- Start Top Nav Bar -->
  <nav class="navbar navbar-expand-md bg-success navbar-dark fixed-top">
    <a class="navbar-brand">AutismICare</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link"> Child Registration </a>
        </li>  
      </ul>
    </div>  
  </nav>
<!-- End Top Nav Bar -->

  <div class="container mt-5">
    <h3 class="mt-2" style="text-align:center">Child Profile<br></h3>
    <form method="post">
      <?php include('errors.php'); ?>
      <div class="input-group mt-2">
        <label>Child's Name :</label>
        <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Name" required>
      </div>
      <div class="input-group mt-2">
        <label>Child's Age :</label>
        <br>
          <select name="age" class="form-control" required>
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
          </select>
          <br>
      </div>
      <div class="input-group mt-2">
        <label>Sex :  <br/></label>
          <select name="gender" class="form-control">
            <option value = "">Select Gender</option>
            <option value = "Male">Male</option>
            <option value = "Female">Female</option>
          </select>
      </div>
      <div class="input-group mt-2">
        <button type="submit" class="btn btn-primary" name="reg_child">Save</button>
      </div>
    </form>
  </div>

</body>
</html>
