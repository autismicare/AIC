$(function() {
    $.ajax({
      url: "factor_monthly_data.php",
      type: "GET",
      success: function(data) {
        chartData = data;
        var chartProperties = {
            caption: "Factor Frequency",
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
          id: "chart-4",
          renderAt: "chart-container-factor",
          width: "1200",
          height: "370",
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