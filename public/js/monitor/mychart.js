google.charts.load('current', {'packages':['gauge']});
google.charts.setOnLoadCallback(drawGauge);
var gaugeOptions = {min: -256, max: 270, yellowFrom: 200, yellowTo: 230,
redFrom: 230, redTo: 270, minorTicks: 5};
var gauge;
function drawGauge() {
gaugeData = new google.visualization.DataTable();
gaugeData.addColumn('number', 'aX');
gaugeData.addColumn('number', 'aY');
gaugeData.addColumn('number', 'aZ');
gaugeData.addRows(3);
gaugeData.setCell(0, 0, 0);
gaugeData.setCell(0, 1, 0);
gaugeData.setCell(0, 2, 0);
gauge = new google.visualization.Gauge(document.getElementById('gauge_div'));
gauge.draw(gaugeData, gaugeOptions);
}
function changeAX(dir) {
gaugeData.setValue(0, 0,  dir);
gauge.draw(gaugeData, gaugeOptions);
}
function changeAY(dir) {
gaugeData.setValue(0, 1,  dir);
gauge.draw(gaugeData, gaugeOptions);
}
function changeAZ(dir) {
gaugeData.setValue(0, 2,  dir);
gauge.draw(gaugeData, gaugeOptions);
}