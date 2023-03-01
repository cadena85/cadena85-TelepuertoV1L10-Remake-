var ctxTemp = document.getElementById('tempChart').getContext('2d');
var chartTemp = chartContextTemp(ctxTemp);
var ctxhum = document.getElementById('humChart').getContext('2d');
var chartHum = chartContextHum(ctxhum);
var ctxaccel = document.getElementById('accelChart').getContext('2d');
var chartGiro = chartContextGiroscopio(ctxaccel);

var g_latitud;
var g_longitud;
var checked;

const temperatureDisplay = document.getElementById('temperature');
const humedadDisplay = document.getElementById('humedad');
const sensacionDisplay = document.getElementById('sensasion');
const gpsDisplay = document.getElementById("textgps");
const presionDisplay = document.getElementById("presion");
const aireDisplay = document.getElementById("aire");


var socket = io.connect('http://localhost:3000'); //connect to server
socket.on('temp', function(dato) { //As a temp data is received 

    //console.clear();
    //console.log(dato.temp);
    try {
<<<<<<< HEAD
    let sensor = JSON.parse((dato.temp));

    document.getElementById('date').innerHTML = dato.date; //update the date
    document.getElementById('time').innerHTML = dato.time; //update the date
    buildChart(chartTemp, dato, sensor.temperatura,15);    
    let temp = parseFloat(sensor.temperatura);
    let hume = parseFloat(sensor.humedad);
    let senc = parseFloat(sensor.sensation);
    
    temperatureDisplay.innerHTML = `${temp.toFixed(1)}°C`;
    humedadDisplay.innerHTML = `${hume}%`;
    sensacionDisplay.innerHTML = `${senc.toFixed(1)}°C`;

    buildChart(chartHum, dato, (sensor.altitude), 7);

    let displayGPS = "Latitud: "+sensor.latitud+"\n\n";
    displayGPS = displayGPS + "Longitud: "+sensor.longitud+"\n\n";
    displayGPS = displayGPS + "Altitud: "+sensor.altitud+" m\n\n";
    displayGPS = displayGPS + "Velocidad: "+sensor.speed+" m/s\n\n\t";
    displayGPS = displayGPS + "\n\n<br>"+ "#Satélites: "+sensor.sats+"\n\n";
    gpsDisplay.innerHTML = displayGPS;
    
    //addData(myPieChart, sensor.gx,sensor.gy, sensor.gz, dato);

    addData(chartGiro, dato, [sensor.gx, sensor.gy, sensor.gz],  1);
   
    g_latitud = sensor.latitud;
    g_longitud = sensor.longitud;

    //let varsDataSave = dato;
    if(!checked) {
        addNoOverwrite(dato.temp+"\n");

        $("#allData").animate({
        scrollTop:$("#allData")[0].scrollHeight - $("#allData").height()
        });
    }
    changeAX(sensor.ax);
    changeAY(sensor.ay);
    changeAZ(sensor.az);
    //Presion
    presionDisplay.innerHTML = (sensor.pressure/101300).toFixed(2) + " atm / " + sensor.pressure + " pa";


    //calidad del aire
    //aireDisplay.innerHTML = sensor.dustDensity;
=======
        let sensor = JSON.parse((dato.temp));
        document.getElementById('date').innerHTML = dato.date; //update the date
        document.getElementById('time').innerHTML = dato.time; //update the date
        buildChart(chartTemp, dato, sensor.temperatura,15);    
        let temp = parseFloat(sensor.temperatura);
        let hume = parseFloat(sensor.humedad);
        let senc = parseFloat(sensor.sensation);
        
        temperatureDisplay.innerHTML = `${temp.toFixed(1)}°C`;
        humedadDisplay.innerHTML = `${hume}%`;
        sensacionDisplay.innerHTML = `${senc.toFixed(1)}°C`;

        buildChart(chartHum, dato, (sensor.altitud_1), 7);
        //gps
        let displayGPS = "Latitud: "+sensor.latitud+"\n\n";
        displayGPS = displayGPS + "Longitud: "+sensor.longitud+"\n\n";
        displayGPS = displayGPS + "Altitud: "+sensor.altitud+" m\n\n";
        displayGPS = displayGPS + "Velocidad: "+sensor.velocidad+" m/s\n\n\t";
        displayGPS = displayGPS + "\n\n<br>"+ "#Satélites: "+sensor.satelites+"\n\n";
        gpsDisplay.innerHTML = displayGPS;
        
        //addData(myPieChart, sensor.gx,sensor.gy, sensor.gz, dato);

        addData(chartGiro, dato, [sensor.girox, sensor.giroy, sensor.giroz],  1);
       
        g_latitud = sensor.latitud;
        g_longitud = sensor.longitud;

        //let varsDataSave = dato;
        if(!checked) {
            addNoOverwrite(dato.temp+"\n");

            $("#allData").animate({
            scrollTop:$("#allData")[0].scrollHeight - $("#allData").height()
            });
        }
        changeAX(sensor.ax);
        changeAY(sensor.ay);
        changeAZ(sensor.az);
        //Presion
        presionDisplay.innerHTML = (sensor.pressure/101300).toFixed(2) + " atm / " + sensor.pressure + " pa";

        //calidad del aire
        //aireDisplay.innerHTML = sensor.dustDensity;
>>>>>>> 634bf858821683ccbbf9ac3cd1d725bfcc7e5a58
    } catch (e) {
        console.log("syntaxerror unexpected token in json");
        return false;
    }
});


$('#toggle-one').change(function() {
    let element = document.getElementById("console-event");
      //$('#console-event').html('Toggle: ' + $(this).prop('checked'));
      if ($(this).prop('checked')){
        element.classList.remove("text-success");
        element.classList.add("text-secondary");
        $('#save').prop('disabled', false);
        $('#clear').prop('disabled', false);
      }else{
        element.classList.remove("text-secondary");
        element.classList.add("text-success");
        $('#save').prop('disabled', true);
        $('#clear').prop('disabled', true);        
      }       
     checked = $(this).prop('checked');
});

$("#rastrear").click(function(){
  let urlbeg="https://www.google.com/maps/embed/v1/place?q=";
  let urlend='&'+"key=AIzaSyCqZT4REonD4ozPjGUZ8hhAb-AStDRm5gs&zoom=19&maptype=satellite";
  
  let lat=g_latitud;
  let lng=g_longitud;
  
  //let lat=19.504179;
  //let lng=-99.144627;
  
  $("iframe").attr("src", urlbeg+lat+","+lng+urlend );
  /*roadmap displays the default road map view. This is the default map type.
    satellite displays Google Earth satellite images.*/
});

function removeData(chart) {
    chart.data.labels.pop();
    chart.data.datasets.forEach((dataset) => {
        dataset.data.pop();
    });
    chart.update();
}

function addData(chart, dato, variable, longitud){
    let i=0;
    if(chart.data.labels.length != longitud) { //If we have less than 15 data points in the graph
        chart.data.labels.push(dato.time);  //Add time in x-asix
        chart.data.datasets.forEach((dataset) => {            
            dataset.data.push(variable[i]); //Add temp in y-axis
            i++;
        });
        i=0;
    }
    else { //If there are already 15 data points in the graph.
        chart.data.labels.shift(); //Remove first time data
        chart.data.labels.push(dato.time); //Insert latest time data
        chart.data.datasets.forEach((dataset) => {
            dataset.data.shift(); //Remove first temp data
           dataset.data.push(variable[i]); //Add temp in y-axis
           i++;
        });
    }
    chart.update(); //Update the graph.
}

function buildChart(chart, dato, variable, longitud){
    if(chart.data.labels.length != longitud) { //If we have less than 15 data points in the graph
        chart.data.labels.push(dato.time);  //Add time in x-asix
        chart.data.datasets.forEach((dataset) => {
            dataset.data.push(variable); //Add temp in y-axis
        });
    }
    else { //If there are already 15 data points in the graph.
        chart.data.labels.shift(); //Remove first time data
        chart.data.labels.push(dato.time); //Insert latest time data
        chart.data.datasets.forEach((dataset) => {
            dataset.data.shift(); //Remove first temp data
            dataset.data.push(variable); //Insert latest temp data
        });
    }
    chart.update(); //Update the graph.
}

function addNoOverwrite(variables){
    let data = $('#allData').text();
    data += variables + '\n';
    $('#allData').text( data );
}