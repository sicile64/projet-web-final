google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'test');
      data.addColumn('number', 'test');
      data.addRows([
        ['1', 33],
        ['2', 26],
        ['3', 22],
      ]);

      var options = {
        title: 'Top 3 des jeux les plus vendue',
        sliceVisibilityThreshold: .2
      };

      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
