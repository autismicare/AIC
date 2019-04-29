$(function() {
    $.ajax({
      url: "factor_daily_data.php",
      type: "GET",
      success: function(data) {
        chartData = data;
        var chartProperties = {
            caption: "Factor Frequency",
			subCaption: "Daily",
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
          id: "chart-4",
          renderAt: "chart-container-factor",
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