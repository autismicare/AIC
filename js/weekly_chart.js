$(function() {
    $.ajax({
      url: "weekly_chart_data.php",
      type: "GET",
      success: function(data) {
        chartData = data;
        var chartProperties = {
          caption: "Mood and Behaviour Tracker",
          subCaption: "Weekly",
          xAxisName: "Date",
          yAxisName: "Average Ratings",
          rotatevalues: "1",
          theme: "fusion"
        };
        apiChart = new FusionCharts({
          type: "line",
          id: "chart-1",
          renderAt: "chart-container",
          width: "800",
          height: "350",
          dataFormat: "json",
          dataSource: {
            chart: chartProperties,
            data: chartData
            }
          });
          apiChart.render();
        }
      });
    });
