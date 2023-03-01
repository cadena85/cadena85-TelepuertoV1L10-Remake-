function chartContextTemp(ctxTemp){
  var chartTemp = new Chart(ctxTemp, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
    labels: [],
    datasets: [{
        label: "Temperatura",
        borderColor: "#3498DB",
        data: [],
        //fill: false,
        pointStyle: 'circle',
        //backgroundColor: '#3498DB',
        pointRadius: 7,
        pointHoverRadius: 7,        
    }]
    },
    // Configuration options go here
        options: {
              responsive: true,
              scales: {
                  yAxes: [{                                  
                       ticks: {
                          stepSize:0.5,
                      }

                  }]
              }
        }    
    });
    return   chartTemp;
}
