window.onload = function() {
    google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);

    var resultat = document.getElementById("resultat");

    var req = resultat.innerHTML.split('/');

    reqLen = req.length;

    i = 0;

    var req2 = [];

    for(i;i<5;i++) {
      if(i<reqLen) {
        req2[i] = req[i].split('|');
      } else {
        req2[i] = " , ";
      }
    }

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Nom", "Nombre", { role: "style" } ],
        [req2[0][0], parseInt(req2[0][1]), "#FE2E2E"],
        [req2[1][0], parseInt(req2[1][1]), "#FE9A2E"],
        [req2[2][0], parseInt(req2[2][1]), "#F7FE2E"],
        [req2[3][0], parseInt(req2[3][1]), "#64FE2E"],
        [req2[4][0], parseInt(req2[4][1]), "#2EFEF7"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Top Game",
        bar: {groupWidth: "50%"},
        legend: { position: "none" }
      };

      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
}
