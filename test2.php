<!-- Show chart works -->
<?php 
include('as.php');
include('test1.php');

?>

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
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  
  <script>
      window.onload = function () {
      
      var chart = new CanvasJS.Chart("chart-containers", {
          backgroundColor: "#00000000",        
          animationEnabled: true,
          exportEnabled: true,
          theme: "light2", // "light1", "light2", "dark1", "dark2"
          title:{
              text: "Daily Frequency Chart"
          },
          axisX: {
              // title: "Mood Behaviour and Factor Types",
              lineColor: "#000000",
              tickColor: "#000000",
              labelFontColor: "#000000",
              titleFontColor: "#000000",
              lineThickness: 2
          },
          axisY:
     {
       title: "FREQUENCY",
       lineColor: "#000000",
       tickColor: "#000000",
       labelFontColor: "#000000",
       titleFontColor: "#000000",
       lineThickness: 2
    },
          data: [{
              type: "column", //change type to bar, line, area, pie, etc  
              dataPoints: <?php echo json_encode($jsonArray, JSON_NUMERIC_CHECK); ?>
          }]
      });
      chart.render();

      var indexLabels = [];
        addIndexLabels(chart);

        function addIndexLabels(chart){
        for(var i = 0; i < chart.data[0].dataPoints.length; i++){
            indexLabels.push(document.createElement("p"));
            indexLabels[i].setAttribute("id", "indexlabel");
            
            indexLabels[i].innerHTML = "<img height=40% width=40% src="+chart.data[0].dataPoints[i].icon+">";
            
            document.getElementById("chart-containers").appendChild(indexLabels[i]);
        }
        positionIndexLabels(chart);
        }

        function positionIndexLabels(chart){
                for(var i = 0; i < indexLabels.length; i++){
                        indexLabels[i].style.top = chart.axisY[0].convertValueToPixel(chart.data[0].dataPoints[i].y) - (indexLabels[i].clientHeight / 2) +800 +"px";
                indexLabels[i].style.left = chart.axisX[0].convertValueToPixel(chart.data[0].dataPoints[i].x) + "px";
            }
        }

        window.onresize = function(event) {
            positionIndexLabels(chart)
        }

      }
      </script>
      <style>
        #indexlabel {
            color: red;
            position: absolute;
            font-size: 16px;
            }
      </style>
</head>

<body>
    <div id="chart-containers" style="height: 370px; width: 100%;" class="mt-5"></div><br>
    
  </body>
</html>
