<?php 
include('as.php');
?>
<?php
  
  $query = "CREATE view demo$uid AS SELECT f.F_name, f.F_icon, m.M_name, m.M_icon, b.B_name, b.B_icon, f.Tracker_ID, m.W_name, m.W_icon from 
  (select m.M_name, m.M_icon, t.Tracker_ID, w.W_name, w.W_icon from Mood m, Mood_set ms, Weather w, 
  (select * from MBTracker where User_ID = '$uid') as t where m.Mood_ID = ms.Mood_ID and ms.Tracker_ID = t.Tracker_ID and t.Weather_ID = w.Weather_ID
  union 
  select m.CM_name, m.CM_icon, t.Tracker_ID, w.W_name, w.W_icon from CMood m, CMood_set ms,Weather w, 
  (select * from MBTracker where User_ID = '$uid') as t where m.CMood_ID = ms.CMood_ID and ms.Tracker_ID = t.Tracker_ID and t.Weather_ID = w.Weather_ID)
  as m,
  (select f.F_name, f.F_icon, t.Tracker_ID from Factor f, Factor_set fs, 
  (select * from MBTracker where User_ID = '$uid') as t where f.Factor_ID = fs.Factor_ID and fs.Tracker_ID = t.Tracker_ID
  union 
  select f.CF_name, f.CF_icon, t.Tracker_ID from CFactor f, CFactor_set fs, 
  (select * from MBTracker where User_ID = '$uid') as t where f.CFactor_ID = fs.CFactor_ID and fs.Tracker_ID = t.Tracker_ID)
  as f,
  (select b.B_name, b.B_icon, t.Tracker_ID from Behaviour b, Behaviour_set bs, 
  (select * from MBTracker where User_ID = '$uid') as t where b.Behaviour_ID = bs.Behaviour_ID and bs.Tracker_ID = t.Tracker_ID
  union 
  select b.CB_name, b.CB_icon, t.Tracker_ID from CBehaviour b, CBehaviour_set bs, 
  (select * from MBTracker where User_ID = '$uid') as t where b.CBehaviour_ID = bs.CBehaviour_ID and bs.Tracker_ID = t.Tracker_ID)
  as b
  where m.Tracker_ID = f.Tracker_ID and f.Tracker_ID = b.Tracker_ID;
  ";
  $result1 = mysqli_query($db,$query);
    
    $query1 = "SELECT B_name, count(distinct(Tracker_ID)) as frequency from demo$uid group by B_name order by frequency desc";
    
    $results = mysqli_query($db,$query1);
    
    //initialize the array to store the processed data
    $jsonArray = array();
    //check if there is any data returned by the SQL Query
    if ($results->num_rows > 0) {
      //Converting the results into an associative array
      while($row = $results->fetch_assoc()) {
        $jsonArrayItem = array();
        $jsonArrayItem['label'] = $row['B_name'];
        $jsonArrayItem['value'] = $row['frequency'];
        
        //append the above created object into the main array.
        array_push($jsonArray, $jsonArrayItem);
      }
    }
    $fp = fopen('b'.$uid, 'w');
      fwrite($fp, json_encode($jsonArray));
      fclose($fp);
  
?>

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
    <script src="js/ej2.min.js" type="text/javascript"></script> 
    <script src="js/tree.js" type="text/javascript"></script>
 
   
</head>

<body>

<!-- Start Top Nav Bar -->
  <?php include ('navBar_login.php'); ?><br><br>
<!-- End Top Nav Bar -->

  <button class="sticky btn btn-secondary" action="action" onclick="window.history.go(-1); return false;" id="backBtn" title="BACK">BACK</button>  

<!-- Load d3.js -->
<script src="https://d3js.org/d3.v4.js"></script>

<!-- Load d3-cloud -->
<script src="https://cdn.jsdelivr.net/gh/holtzy/D3-graph-gallery@master/LIB/d3.layout.cloud.js"></script>

<!-- Create a div where the graph will take place -->
<br>
<div class="container shadow p-3">
  <div class="row">
  <div class="col-lg-12">
      <form class="form-inline d-flex justify-content-center" method='post' action='trees.php'>
      
        <label for="tree">Select one behaviour to see triggers: &nbsp;</label>
        <input class="form-control m-2" type='text' id="tree" style="background-color:#f2f2f2; border:2px solid green;" required name = "tree"/>
        <input class="col-lg-2 col-md-3 col-sm-4 m-2" type='submit' value='Click Me' name='json'/><br>

      </form> 
  </div>     
      <div id="view_graph" style="overflow-x:scroll;" align="center" ></div>
      
      </div>     
    </div>
<script>

d3.json("<?php echo 'b'.$uid ?>", function(data) {
    console.log(data);
window.addEventListener('resize', function() {
  console.log("The window was resized!");
});

// set the dimensions and margins of the graph
//var color = d3.scale.ordinal().range(["#66c2a5","#fc8d62","#8da0cb","#e78ac3","#a6d854"]);

var margin = {top: 10, right: 10, bottom: 10, left: 10},
    width = 1000 - margin.left - margin.right,
    height = 500 - margin.top - margin.bottom;

// append the svg object to the body of the page
var svg = d3.select("#view_graph").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform",
          "translate(" + margin.left + "," + margin.top + ")");

// Constructs a new cloud layout instance. It run an algorythm to find the position of words that suits your requirements
// Wordcloud features that are different from one word to the other must be here
var layout = d3.layout.cloud()
  .size([width, height])
  .words(data.map(function(d) { return {text: d.label, size:(d.value)*6}; }))
  .padding(15)        //space between words
  .rotate(function() { return 0;})// ~~(Math.random() * 2) * 90; })
  .fontSize(function(d) { return d.size; })      // font sizeof words
  .on("end", draw);
layout.start();


// This function takes the output of 'layout' above and draw the words
// Wordcloud features that are THE SAME from one word to the other can be here
function draw(words) {
  svg
    .append("g")
      .attr("transform", "translate(" + layout.size()[0] / 2 + "," + layout.size()[1] / 2 + ")")
      .selectAll("text")
        .data(words)
      .enter().append("text")
        .style("font-size", function(d) { 
          if(d.size<=20)
          {
            return d.size*1.5;
          }
          else 
          {
            return d.size;
          }
           })
        .style("fill", "#69b3a2")
        .attr("text-anchor", "middle")
        .style("font-family", "sans-serif")
        .style("font-weight","lightest")
        .attr("transform", function(d) {
          return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
        })
        .text(function(d) { return d.text; })
        .on("click", function (d,i){
            var test = d.text;
            document.getElementById("tree").value = test;
          })
        .on("mouseover",function()
        {
          tooltip.style("display",null);
        })
        
        .on("mouseout",function()
        {
          tooltip.style("display","none");
        })

        .on("mousemove",function(d)
        {
          var xPos = d3.mouse(this)[0] + 300;
          var yPos = d3.mouse(this)[1] + 160;
          tooltip.attr("transform","translate("+xPos+","+yPos+")");
          tooltip.select("text").text(d.text +" : "+ (d.size/6));
        });

        var tooltip = svg.append("g")
        .attr("class",tooltip)
        .style("display","none");

        tooltip.append("text")
        .attr("x", 15)
        .attr("dy","1.2em")
        .style("font-size","1.25em")
        .attr("font-weight","bold");
}
    
});
</script>

            

</body>
</html>
