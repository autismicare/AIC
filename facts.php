<?php include('checkuser.php') ?>

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
  <script type="text/javascript" src="js/to-top-to-btm.js"></script>
</head>

<body>

<!-- Top Nav bar -->
<?php include 'navBar_login.php'; ?><br><br>

  <button onclick="topFunction()" id="topBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
  <button class="sticky btn btn-secondary" action="action" onclick="window.history.go(-1); return false;" id="backBtn" title="BACK">BACK</button>  
  <button onclick="bottomFunction()" id="bottomBtn" title="Go to bottom" style="background-color:red;"><i class="fas fa-arrow-down"></i></button>


<!-- Start contents -->
<div class="container mt-5 shadow p-3">
  <h3 class="text-center"> Autism Facts </h3> 
    <?php
    $data_per_page = 3;
    $select = "SELECT F_desc, F_author, F_url FROM Fact";  
    $select_run = mysqli_query($db, $select);
    $records = mysqli_num_rows($select_run);
    echo "<br>";
    $no_of_page = ceil($records / $data_per_page);
    if(!isset($_GET['page'])){
        $page = 1;
    }else{
        $page = $_GET['page'];
    }
    $page_limit_data = ($page - 1) * $data_per_page;
    $select = "SELECT * FROM Fact LIMIT " . $page_limit_data . ',' . $data_per_page ;
    $select_run = mysqli_query($db, $select);
    while ($row_select = mysqli_fetch_array($select_run)){
        echo "<blockquote class='blockquote'>" . $row_select["F_desc"]. "<footer class='blockquote-footer'>" . $row_select["F_author"]. "</footer>" . "</blockquote><a href='". $row_select["F_url"]. "' class='read-more btn btn-primary' role='button'>Read on</a><br><hr>";
    }
    echo '<div class="d-flex justify-content-center"><ul class="pagination">';
    for($page=1; $page<= $no_of_page; $page++){ 
      echo "<a class='page-link' href='facts.php?page=$page'> $page </a></li>" ; 
    }
    echo '</ul></div>';

?>

</div>
<!-- End contents -->
  <button onclick="topFunction()" id="myBtn" title="Go to top">Go to top</button>

</body>
</html>