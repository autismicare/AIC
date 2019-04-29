$(function() {
    $.ajax({
      url: "behaviour_monthly_data.php",
      type: "GET",
      success: function(data) {
        chartData = data;
        var chartProperties = {
            caption: "Behaviour Frequency",
			subCaption: "Monthly",
            bgColor: "#ffffff",
            startingAngle: "310",
            showLegend: "1",
            centerLabel: "$value",
            centerLabelBold: "1",
            showTooltip: "0",
            decimals: "0",
            theme: "fusion"      
        };
        apiChart = new FusionCharts({
          type: "doughnut2d",
          id: "chart-3",
          renderAt: "chart-container-behaviour",
          width: "1200",
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