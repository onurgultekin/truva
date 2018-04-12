var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "mcoban_mysqlusr",
  password: ";[U1&e_NN)8Z",
  database: "mcoban_Truva_Dbm"
});


con.connect(function(err) {
  if (err) throw err;
  con.query("SELECT * FROM collectorCommunicationSettings WHERE tapID=1 AND ButtonID=4", function (err, result, fields) {
    if (err) throw err;
   // console.log(result);
  });
});
var i=0;
var set_collector_offline_second=300;
var set_tap_offline_second=300;
var tap_counter=0;

function checkDB(arg) {
   // var dateTime = require('node-datetime');
   // var dt = dateTime.create();
   // var formatted = dt.format('Y-m-d H:M:S');
   // console.log(formatted);
  //  var now  = formatted;
    
var now = new Date();
var jsonDate = now.toJSON();
var hour=(now.getHours());
hour=hour+3;
var minute=(now.getMinutes());
var second=(now.getSeconds());

   con.query("SELECT * FROM collectorList WHERE collectorStatusID =1", function (err, result) {
    if (err) throw err;
    for (var last_data_datetime in result)
    {
        var string=JSON.stringify(result);
        var json =  JSON.parse(string);
        var device_time= (json[0].last_data_datetime);
        
        parseInt(device_time[11], 10);
        parseInt(device_time[12], 10);
        parseInt(device_time[14], 10);
        parseInt(device_time[15], 10);
        parseInt(device_time[17], 10);
        parseInt(device_time[18], 10);
        
        var device_hour=parseInt(device_time[11], 10)*10 + parseInt(device_time[12], 10);
        var device_minute=parseInt(device_time[14], 10)*10+parseInt(device_time[15], 10);
        var device_second=parseInt(device_time[17], 10)*10+parseInt(device_time[18], 10);
        device_second=device_second+set_collector_offline_second;
        device_minute=device_minute+device_second/60;
        device_second=device_second%60;
        device_hour=device_hour+device_minute/60;
        device_minute=device_minute%60;
        device_hour=device_hour%24;
        
        var result_imei=parseInt(json[0].imei,10);
        var _collector_id=parseInt(json[0].collector_id,10);
       // var result_imei=json[0].imei;
       
        
        device_hour=parseInt(device_hour, 10);
        device_minute=parseInt(device_minute, 10);
        device_second=parseInt(device_second, 10);
        
        
        if(device_hour <= hour && device_minute<=minute && device_second < second)
        {
            con.query("UPDATE collectorList SET collectorStatusID = 2 WHERE collector_id = '"+_collector_id+"'", function (err, result, fields) {
                if (err) throw err;});
                
            console.log(result);
            console.log(result.affectedRows + " record(s) updated");

        }
    }
    
    });
    
    
   con.query("SELECT * FROM collectorCommunicationSettings WHERE TapStatusID =1", function (err, result) {
    if (err) throw err;
    for (var Date_ in result)
    {
        var string=JSON.stringify(result);
        var json =  JSON.parse(string);
        var tap_time= (json[0].Date_);
        
        parseInt(tap_time[11], 10);
        parseInt(tap_time[12], 10);
        parseInt(tap_time[14], 10);
        parseInt(tap_time[15], 10);
        parseInt(tap_time[17], 10);
        parseInt(tap_time[18], 10);
        
        var tap_hour=parseInt(tap_time[11], 10)*10 + parseInt(tap_time[12], 10);
        var tap_minute=parseInt(tap_time[14], 10)*10+parseInt(tap_time[15], 10);
        var tap_second=parseInt(tap_time[17], 10)*10+parseInt(tap_time[18], 10);
        tap_second=tap_second+set_tap_offline_second;
        tap_minute=tap_minute+tap_second/60;
        tap_second=tap_second%60;
        tap_hour=tap_hour+tap_minute/60;
        tap_minute=tap_minute%60;
        tap_hour=tap_hour%24;
        
        var result_imei=parseInt(json[0].imei,10);
        var _tap_id=parseInt(json[0].tapID,10);
       // var result_imei=json[0].imei;
       
        
        tap_hour=parseInt(tap_hour, 10);
        tap_minute=parseInt(tap_minute, 10);
        tap_second=parseInt(tap_second, 10);
        
        console.log(tap_hour);
        console.log(tap_minute);
        console.log(tap_second);
        
        if(tap_hour <= hour && tap_minute<=minute && tap_second < second)
        {
            con.query("UPDATE tap SET TapStatusID = 2 WHERE TapID = '"+_tap_id+"'", function (err, result, fields) {
                if (err) throw err;});
            console.log(result);
            console.log(result.affectedRows + " record(s) updated");
            
            con.query("UPDATE collectorCommunicationSettings SET TapStatusID = 2 WHERE tapID = '"+_tap_id+"'", function (err, result, fields) {
                if (err) throw err;});
            console.log(result);
            console.log(result.affectedRows + " record(s) updated");

        }
    }
    
    
    
    console.log(now);
    
    
  });
}   

setInterval(checkDB, 5000);