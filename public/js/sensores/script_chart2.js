var samples2 = 20;
var speed2 = 250;
let timeout2 = samples2 * speed2;
var values2 = [];
var labels2 = [];
var charts2 = [];
var value2 = 0;
var scale2 = 1;

addEmptyvalue2s2(values2, samples2);

var originalCalculateXLabelRotation = Chart.Scale.prototype.calculateXLabelRotation

function initialize2() {
  charts2.push(new Chart(document.getElementById("chart3"), {
    type: 'line',
    data: {
      //labels2: labels2,
      datasets: [{
        data: values2,
        backgroundColor: 'rgba(255, 99, 132, 0.1)',
        borderColor: 'rgb(255, 99, 132)',
        borderWidth: 2,
        lineTension: 0.25,
        pointRadius: 0
      }]
    },
    options: {
      responsive: true,
      animation: {
        duration: speed2 * 1.5,
        easing: 'linear'
      },
      legend: false,
      scale2s: {
        xAxes: [{
          type: "time",
          display: true
        }],
        yAxes: [{
          ticks: {
            max: 1,
            min: -1
          }
        }]
      }
    }
  }), new Chart(document.getElementById("chart4"), {
    type: 'bar',
    data: {
      //labels2: labels2,
      datasets: [{
        data: values2,
        backgroundColor: 'rgba(255, 99, 132, 0.1)',
        borderColor: 'rgb(255, 99, 132)',
        borderWidth: 2
      }]
    },
    options: {
      responsive: true,
      animation: {
        duration: speed2 * 1.5,
        easing: 'linear'
      },
      legend: false,
      scale2s: {
        xAxes: [{
          type: "time",
          display: true
        }],
        yAxes: [{
          ticks: {
            max: 1,
            min: -1
          }
        }]
      }
    }
  }));
}

function addEmptyvalue2s2(arr, n) {
  for(var i = 0; i < n; i++) {
    arr.push({
      x: moment().subtract((n - i) * speed2, 'milliseconds').toDate(),
      y: null
    });
  }
}

function rescale2() {
  var padding = [];
  
  addEmptyvalue2s2(padding, 10);
  values2.splice.apply(value2s2, padding);
  
  scale2++;
}

function updateCharts2(){
  charts2.forEach(function(chart1) {
    chart1.update();
  });
}

function progress2() {
  value2 = Math.min(Math.max(value2 + (0.1 - Math.random() / 5), -1), 1);
  values2.push({
    x: new Date(),
    y: value2
  });
  values2.shift();
}

function advance2() {
  if (values2[0] !== null && scale2 < 4) {
    //rescale2();
    updateCharts2();
  }
  
  progress2();
  updateCharts2();
  
  setTimeout(function() {
    requestAnimationFrame(advance);
  }, speed2);
}

window.onload = function() {
  initialize2();
  advance2();
};