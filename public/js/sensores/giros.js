  var barChartData = {
      labels: [],
      datasets: [{
        label: 'Gx',
        backgroundColor: "#228B22",
        borderColor: "#ADFF2F",
        borderWidth: 1,
        data: []
      }, {
        label: 'Gy',
        backgroundColor: "#B22222",
        borderColor: "#d46",
        borderWidth: 1,
        data: []
      },
      {
        label: 'Gz',
        backgroundColor: "#003090",
        borderColor: "#44A7FF",
        borderWidth: 1,
        data: []
      }
      ]

    };
function chartContextGiroscopio(ctxTemp){
  var color = Chart.helpers.color;
  var chartTemp = new Chart(ctxTemp, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: barChartData,
    // Configuration options go here
        options: {
              responsive: true,  
                
        }

    });
    return   chartTemp;
}
