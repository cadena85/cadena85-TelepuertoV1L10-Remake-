function chartContextHum(ctx){
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
    labels: [],
    datasets: [{
        label: "GY-80",
        borderColor: "orange",
        data: [],
        fill: false,
        pointStyle: 'circle',
        backgroundColor: '#cc6600',
        pointRadius: 0, 
        borderWidth:2,   
    }]
    },
    // Configuration options go here
        options: {
              responsive: true,
              scales: {
                  yAxes: [{                                  
                       ticks: {
                          stepSize:20.5,
                      }

                  }],

xAxes: [{
                ticks: {
        autoSkip: true,
        maxTicksLimit: 7
    }
            }]


              }
        }    
    });
    return  chart;
}
