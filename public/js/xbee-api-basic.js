var util = require('util');
var SerialPort = require('serialport');
var xbee_api = require('xbee-api');

var C = xbee_api.constants;

var xbeeAPI = new xbee_api.XBeeAPI({
    api_mode: 1
});

var serialport = new SerialPort("COM6", {
    
    parser: xbeeAPI.rawParser()
});

serialport.on("open", function () {
    var frame_obj = {
        type: 0x10, 
        id: 0x01, 
        destination64: "0013A200407A25A7",
        broadcastRadius: 0x00,
        options: 0x00, 
        data: "Hello world" 
    };

    serialport.write(xbeeAPI.buildFrame(frame_obj));
    console.log('Sent to serial port.');

   setTimeout(function() {
         // this doesn't work if the receiving xbee sends back something 
          serialport.write(xbeeAPI.buildFrame(frame_obj));},  5000)
});

serialport.on('data', function (data) {
    console.log('data received: ' + data);
});


// All frames parsed by the XBee will be emitted here
xbeeAPI.on("frame_object", function (frame) {
    console.log(">>", frame);
});
