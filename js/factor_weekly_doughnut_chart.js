$(function() {
    $.ajax({
      url: "factor_weekly_data.php",
      type: "GET",
      success: function(data) {
        chartData = data;
        var chartProperties = {
            caption: "Factor Frequency",
			      subCaption: "Weekly",
            bgColor: "#ffffff",
            showLegend: "1",
            startingAngle: "310",
            centerLabel: "$value",
            centerLabelBold: "1",
            showTooltip: "0",
            decimals: "0",
            theme: "fusion"      
        };
        apiChart = new FusionCharts({
          type: "doughnut2d",
          id: "chart-4",
          renderAt: "chart-container-factor",
          width: "1500",
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