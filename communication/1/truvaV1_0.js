//import { Socket } from 'net';


var net = require('net');
console.log('Hello');
var HOST = '';
var PORT = 6061;

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

var imei="";
var TapID_1=0;
var TapID_2=0;
var TapID_3=0;
var ButtonID=0;
var GMT=0;
var lat="";
var long="";
var date_;
var YMD;
var hour;
var MS;


var HoldingID;
var CompanyID;
var BarGroupID;
var collector_id;


var tapId;
var TapName;
var AlcoholGroupID;
var AlcoholTypeID;
var AlcoholTypeName;
var AlcoholBrandID;
var NetPrice;
var SalePrice;
var ButtonID;
var buttonName;
var buttonClReal;
var buttonClShown;



var tapId8;
var TapName8;
var AlcoholGroupID8;
var AlcoholTypeID8;
var AlcoholTypeName8;
var AlcoholBrandID8;
var NetPrice8;
var SalePrice8;
var ButtonID8_1;
var buttonName8_1;
var buttonClReal8_1;
var buttonClShown8_1;
var ButtonID8_2;
var buttonName8_2;
var buttonClReal8_2;
var buttonClShown8_2;
var ButtonID8_3;
var buttonName8_3;
var buttonClReal8_3;
var buttonClShown8_3;
var ButtonID8_4;
var buttonName8_4;
var buttonClReal8_4;
var buttonClShown8_4;


var tapId7;
var TapName7;
var AlcoholGroupID7;
var AlcoholTypeID7;
var AlcoholTypeName7;
var AlcoholBrandID7;
var NetPrice7;
var SalePrice7;
var ButtonID7_1;
var buttonName7_1;
var buttonClReal7_1;
var buttonClShown7_1;
var ButtonID7_2;
var buttonName7_2;
var buttonClReal7_2;
var buttonClShown7_2;
var ButtonID7_3;
var buttonName7_3;
var buttonClReal7_3;
var buttonClShown7_3;
var ButtonID7_4;
var buttonName7_4;
var buttonClReal7_4;
var buttonClShown7_4;


var tapId6;
var TapName6;
var AlcoholGroupID6;
var AlcoholTypeID6;
var AlcoholTypeName6;
var AlcoholBrandID6;
var NetPrice6;
var SalePrice6;
var ButtonID6_1;
var buttonName6_1;
var buttonClReal6_1;
var buttonClShown6_1;
var ButtonID6_2;
var buttonName6_2;
var buttonClReal6_2;
var buttonClShown6_2;
var ButtonID6_3;
var buttonName6_3;
var buttonClReal6_3;
var buttonClShown6_3;
var ButtonID6_4;
var buttonName6_4;
var buttonClReal6_4;
var buttonClShown6_4;


var tapId5;
var TapName5;
var AlcoholGroupID5;
var AlcoholTypeID5;
var AlcoholTypeName5;
var AlcoholBrandID5;
var NetPrice5;
var SalePrice5;
var ButtonID5_1;
var buttonName5_1;
var buttonClReal5_1;
var buttonClShown5_1;
var ButtonID5_2;
var buttonName5_2;
var buttonClReal5_2;
var buttonClShown5_2;
var ButtonID5_3;
var buttonName5_3;
var buttonClReal5_3;
var buttonClShown5_3;
var ButtonID5_4;
var buttonName5_4;
var buttonClReal5_4;
var buttonClShown5_4;


var tapId4;
var TapName4;
var AlcoholGroupID4;
var AlcoholTypeID4;
var AlcoholTypeName4;
var AlcoholBrandID4;
var NetPrice4;
var SalePrice4;
var ButtonID4_1;
var buttonName4_1;
var buttonClReal4_1;
var buttonClShown4_1;
var ButtonID4_2;
var buttonName4_2;
var buttonClReal4_2;
var buttonClShown4_2;
var ButtonID4_3;
var buttonName4_3;
var buttonClReal4_3;
var buttonClShown4_3;
var ButtonID4_4;
var buttonName4_4;
var buttonClReal4_4;
var buttonClShown4_4;


var tapId3;
var TapName3;
var AlcoholGroupID3;
var AlcoholTypeID3;
var AlcoholTypeName3;
var AlcoholBrandID3;
var NetPrice3;
var SalePrice3;
var ButtonID3_1;
var buttonName3_1;
var buttonClReal3_1;
var buttonClShown3_1;
var ButtonID3_2;
var buttonName3_2;
var buttonClReal3_2;
var buttonClShown3_2;
var ButtonID3_3;
var buttonName3_3;
var buttonClReal3_3;
var buttonClShown3_3;
var ButtonID3_4;
var buttonName3_4;
var buttonClReal3_4;
var buttonClShown3_4;


var tapId2;
var TapName2;
var AlcoholGroupID2;
var AlcoholTypeID2;
var AlcoholTypeName2;
var AlcoholBrandID2;
var NetPrice2;
var SalePrice2;
var ButtonID2_1;
var buttonName2_1;
var buttonClReal2_1;
var buttonClShown2_1;
var ButtonID2_2;
var buttonName2_2;
var buttonClReal2_2;
var buttonClShown2_2;
var ButtonID2_3;
var buttonName2_3;
var buttonClReal2_3;
var buttonClShown2_3;
var ButtonID2_4;
var buttonName2_4;
var buttonClReal2_4;
var buttonClShown2_4;


var tapId1;
var TapName1;
var AlcoholGroupID1;
var AlcoholTypeID1;
var AlcoholTypeName1;
var AlcoholBrandID1;
var NetPrice1;
var SalePrice1;
var ButtonID1_1;
var buttonName1_1;
var buttonClReal1_1;
var buttonClShown1_1;
var ButtonID1_2;
var buttonName1_2;
var buttonClReal1_2;
var buttonClShown1_2;
var ButtonID1_3;
var buttonName1_3;
var buttonClReal1_3;
var buttonClShown1_3;
var ButtonID1_4;
var buttonName1_4;
var buttonClReal1_4;
var buttonClShown1_4;

var numOfTaps=0;

var ID;
var ID_1;
var ID_2;
var ID_3;
var ID_4;
var ID_5;
var ID_6;
var ID_7;
var ID_8;

var AlcoholTypeName_char_1=0;
var AlcoholTypeName_char_2=0;
var AlcoholTypeName_char_3=0;
var AlcoholTypeName_char_4=0;
var AlcoholTypeName_char_5=0;
var AlcoholTypeName_char_6=0;
var AlcoholTypeName_char_7=0;
var AlcoholTypeName_char_8=0;
var AlcoholTypeName_char_9=0;
var AlcoholTypeName_char_10=0;
var AlcoholTypeName_char_11=0;
var AlcoholTypeName_char_12=0;
var AlcoholTypeName_char_13=0;
var AlcoholTypeName_char_14=0;
var AlcoholTypeName_char_15=0;
var AlcoholTypeName_char_16=0;
var AlcoholTypeName_char_17=0;
var AlcoholTypeName_char_18=0;
var AlcoholTypeName_char_19=0;
var AlcoholTypeName_char_20=0;
var AlcoholTypeName_char_21=0;
var AlcoholTypeName_char_22=0;
var AlcoholTypeName_char_23=0;
var AlcoholTypeName_char_24=0;

var j=0;
var ip="0.0.0.0";


imei="868324020153933";
function getDateTime_() {

    var date = new Date();

    var hour = date.getHours();
    hour=hour+GMT;
    hour = (hour < 10 ? "0" : "") + hour;

    var min  = date.getMinutes();
    min = (min < 10 ? "0" : "") + min;

    var sec  = date.getSeconds();
    sec = (sec < 10 ? "0" : "") + sec;

    var year = date.getFullYear();

    var month = date.getMonth() + 1;
    month = (month < 10 ? "0" : "") + month;

    var day  = date.getDate();
    day = (day < 10 ? "0" : "") + day;

    return year + "-" + month + "-" + day + " " + hour + ":" + min + ":" + sec;

}

/*var TCPgelendata;

var W3CWebSocket = require('websocket').w3cwebsocket;

 
var client = new W3CWebSocket('ws://localhost:6061/', 'echo-protocol');

console.log("-------------------------------");

console.log(client);

console.log("-------------------------------");
 
client.onerror = function() {
    console.log('Connection Error');
};
 
client.onopen = function() {
    console.log('WebSocket Client Connected');
 
    function sendNumber() {
        if (client.readyState === client.OPEN) {
            var number = Math.round(Math.random() * 0xFFFFFF);
            client.send(TCPgelendata);
            client.send(number.toString());
            setTimeout(sendNumber, 1000);
        }
    }
    sendNumber();
};
 
client.onclose = function() {
    console.log('echo-protocol Client Closed');
};
 
client.onmessage = function(e) {
    if (typeof e.data === 'string') {
        console.log("Received: '" + e.data + "'");
    }
};
*/


var ConnectionLogJson;
var string;
var json ;
function update_collectorCommunicationSettings() {
    i=0;
    con.query("SELECT * FROM connectionLog WHERE imei ='"+imei+"'", function (err, result) {
        if (err) throw err;
        for (var ConnectionLogJson in result)
        {
            var string=JSON.stringify(result);
            var json =  JSON.parse(string);
            var ConnectionLogJson= (json[0].ConnectionLogJson);
            
            
            var string=ConnectionLogJson;
            var json =  JSON.parse(string);
            HoldingID=json.HoldingID;
            CompanyID=json.CompanyID;
            BarGroupID=json.BarGroupID;
            collector_id=json.collector_id;
            var taps=json.taps;
            numOfTaps=0;
            for (i=0;i<8;i++)
            {
                if(taps[i]!=null)
                {
                    numOfTaps=numOfTaps+1;
                }
            }
            i=0;
            for (i=0;i<numOfTaps;i++)
            {
                tapIdValue=json.taps[i].tapId;
                TapName=json.taps[i].TapName;
                AlcoholGroupID=json.taps[i].AlcoholGroupID;
                AlcoholTypeID=json.taps[i].AlcoholTypeID;
                AlcoholTypeName=json.taps[i].AlcoholTypeName;
                AlcoholBrandID=json.taps[i].AlcoholBrandID;
                NetPrice=json.taps[i].NetPrice;
                SalePrice=json.taps[i].SalePrice;
                ButtonID_1=json.taps[i].buttons[0].ButtonID;
                buttonName_1=json.taps[i].buttons[0].buttonName;
                buttonClReal_1=json.taps[i].buttons[0].buttonClReal;
                buttonClShown_1=json.taps[i].buttons[0].buttonClShown;
                ButtonID_2=json.taps[i].buttons[1].ButtonID;
                buttonName_2=json.taps[i].buttons[1].buttonName;
                buttonClReal_2=json.taps[i].buttons[1].buttonClReal;
                buttonClShown_2=json.taps[i].buttons[1].buttonClShown;
                ButtonID_3=json.taps[i].buttons[2].ButtonID;
                buttonName_3=json.taps[i].buttons[2].buttonName;
                buttonClReal_3=json.taps[i].buttons[2].buttonClReal;
                buttonClShown_3=json.taps[i].buttons[2].buttonClShown;
                ButtonID_4=json.taps[i].buttons[3].ButtonID;
                buttonName_4=json.taps[i].buttons[3].buttonName;
                buttonClReal_4=json.taps[i].buttons[3].buttonClReal;
                buttonClShown_4=json.taps[i].buttons[3].buttonClShown;
                
                
                tapIdValue=JSON.stringify(tapIdValue);
                tapIdValue=JSON.parse(tapIdValue);

                NetPrice=JSON.stringify(NetPrice);
                NetPrice=JSON.parse(NetPrice);
                SalePrice=JSON.stringify(SalePrice);
                SalePrice=JSON.parse(SalePrice);
                buttonClReal_1=JSON.stringify(buttonClReal_1);
                buttonClReal_1=JSON.parse(buttonClReal_1);
                buttonClShown_1=JSON.stringify(buttonClShown_1);
                buttonClShown_1=JSON.parse(buttonClShown_1);
                buttonClReal_2=JSON.stringify(buttonClReal_2);
                buttonClReal_2=JSON.parse(buttonClReal_2);
                buttonClShown_2=JSON.stringify(buttonClShown_2);
                buttonClShown_2=JSON.parse(buttonClShown_2);
                buttonClReal_3=JSON.stringify(buttonClReal_3);
                buttonClReal_3=JSON.parse(buttonClReal_3);
                buttonClShown_3=JSON.stringify(buttonClShown_3);
                buttonClShown_3=JSON.parse(buttonClShown_3);
                buttonClReal_4=JSON.stringify(buttonClReal_4);
                buttonClReal_4=JSON.parse(buttonClReal_4);
                buttonClShown_4=JSON.stringify(buttonClShown_4);
                buttonClShown_4=JSON.parse(buttonClShown_4);

                NetPrice=NetPrice.replace(",",".");
                SalePrice=SalePrice.replace(",",".");
                buttonClReal_1=buttonClReal_1.replace(",",".");
                buttonClShown_1=buttonClShown_1.replace(",",".");
                buttonClReal_2=buttonClReal_2.replace(",",".");
                buttonClShown_2=buttonClShown_2.replace(",",".");
                buttonClReal_3=buttonClReal_3.replace(",",".");
                buttonClShown_3=buttonClShown_3.replace(",",".");
                buttonClReal_4=buttonClReal_4.replace(",",".");
                buttonClShown_4=buttonClShown_4.replace(",",".");
                if(i==7)
                {
                    tapId8=tapIdValue;
                    TapName8=TapName;
                    AlcoholGroupID8=AlcoholGroupID;
                    AlcoholTypeID8=AlcoholTypeID;
                    AlcoholTypeName8=AlcoholTypeName;
                    AlcoholBrandID8=AlcoholBrandID;
                    NetPrice8=NetPrice;
                    SalePrice8=SalePrice;
                    ButtonID8_1=ButtonID_1;
                    buttonName8_1=buttonName_1;
                    buttonClReal8_1=buttonClReal_1;
                    buttonClShown8_1=buttonClShown_1;
                    ButtonID8_2=ButtonID_2;
                    buttonName8_2=buttonName_2;
                    buttonClReal8_2=buttonClReal_2;
                    buttonClShown8_2=buttonClShown_2;
                    ButtonID8_3=ButtonID_3;
                    buttonName8_3=buttonName_3;
                    buttonClReal8_3=buttonClReal_3;
                    buttonClShown8_3=buttonClShown_3;
                    ButtonID8_4=ButtonID_4;
                    buttonName8_4=buttonName_4;
                    buttonClReal8_4=buttonClReal_4;
                    buttonClShown8_4=buttonClShown_4;
                    
                    con.query("SELECT * FROM tap WHERE TapID ='"+tapId8+"'", function (err, result) {
                        if (err) throw err;
                        for (var ID1 in result)
                        {
                            var string_=JSON.stringify(result);
                            var json_ =  JSON.parse(string_);
                            var ID1= (json_[0].ID1);
                            console.log("ID8 "+ID1);
                            ID_8=ID1;
                        }
                    });
                }
                else if(i==6)
                {
                    tapId7=tapIdValue;
                    TapName7=TapName;
                    AlcoholGroupID7=AlcoholGroupID;
                    AlcoholTypeID7=AlcoholTypeID;
                    AlcoholTypeName7=AlcoholTypeName;
                    AlcoholBrandID7=AlcoholBrandID;
                    NetPrice7=NetPrice;
                    SalePrice7=SalePrice;
                    ButtonID7_1=ButtonID_1;
                    buttonName7_1=buttonName_1;
                    buttonClReal7_1=buttonClReal_1;
                    buttonClShown7_1=buttonClShown_1;
                    ButtonID7_2=ButtonID_2;
                    buttonName7_2=buttonName_2;
                    buttonClReal7_2=buttonClReal_2;
                    buttonClShown7_2=buttonClShown_2;
                    ButtonID7_3=ButtonID_3;
                    buttonName7_3=buttonName_3;
                    buttonClReal7_3=buttonClReal_3;
                    buttonClShown7_3=buttonClShown_3;
                    ButtonID7_4=ButtonID_4;
                    buttonName7_4=buttonName_4;
                    buttonClReal7_4=buttonClReal_4;
                    buttonClShown7_4=buttonClShown_4;
                    
                    con.query("SELECT * FROM tap WHERE TapID ='"+tapId7+"'", function (err, result) {
                        if (err) throw err;
                        for (var ID1 in result)
                        {
                            var string_=JSON.stringify(result);
                            var json_ =  JSON.parse(string_);
                            var ID1= (json_[0].ID1);
                            console.log("ID7 "+ID1);
                            ID_7=ID1;
                        }
                    });
                }
                else if(i==5)
                {
                    tapId6=tapIdValue;
                    TapName6=TapName;
                    AlcoholGroupID6=AlcoholGroupID;
                    AlcoholTypeID6=AlcoholTypeID;
                    AlcoholTypeName6=AlcoholTypeName;
                    AlcoholBrandID6=AlcoholBrandID;
                    NetPrice6=NetPrice;
                    SalePrice6=SalePrice;
                    ButtonID6_1=ButtonID_1;
                    buttonName6_1=buttonName_1;
                    buttonClReal6_1=buttonClReal_1;
                    buttonClShown6_1=buttonClShown_1;
                    ButtonID6_2=ButtonID_2;
                    buttonName6_2=buttonName_2;
                    buttonClReal6_2=buttonClReal_2;
                    buttonClShown6_2=buttonClShown_2;
                    ButtonID6_3=ButtonID_3;
                    buttonName6_3=buttonName_3;
                    buttonClReal6_3=buttonClReal_3;
                    buttonClShown6_3=buttonClShown_3;
                    ButtonID6_4=ButtonID_4;
                    buttonName6_4=buttonName_4;
                    buttonClReal6_4=buttonClReal_4;
                    buttonClShown6_4=buttonClShown_4;
                    
                    con.query("SELECT * FROM tap WHERE TapID ='"+tapId6+"'", function (err, result) {
                        if (err) throw err;
                        for (var ID1 in result)
                        {
                            var string_=JSON.stringify(result);
                            var json_ =  JSON.parse(string_);
                            var ID1= (json_[0].ID1);
                            console.log("ID6 "+ID1);
                            ID_6=ID1;
                        }
                    });
                }
                else if(i==4)
                {
                    tapId5=tapIdValue;
                    TapName5=TapName;
                    AlcoholGroupID5=AlcoholGroupID;
                    AlcoholTypeID5=AlcoholTypeID;
                    AlcoholTypeName5=AlcoholTypeName;
                    AlcoholBrandID5=AlcoholBrandID;
                    NetPrice5=NetPrice;
                    SalePrice5=SalePrice;
                    ButtonID5_1=ButtonID_1;
                    buttonName5_1=buttonName_1;
                    buttonClReal5_1=buttonClReal_1;
                    buttonClShown5_1=buttonClShown_1;
                    ButtonID5_2=ButtonID_2;
                    buttonName5_2=buttonName_2;
                    buttonClReal5_2=buttonClReal_2;
                    buttonClShown5_2=buttonClShown_2;
                    ButtonID5_3=ButtonID_3;
                    buttonName5_3=buttonName_3;
                    buttonClReal5_3=buttonClReal_3;
                    buttonClShown5_3=buttonClShown_3;
                    ButtonID5_4=ButtonID_4;
                    buttonName5_4=buttonName_4;
                    buttonClReal5_4=buttonClReal_4;
                    buttonClShown5_4=buttonClShown_4;
                    
                    con.query("SELECT * FROM tap WHERE TapID ='"+tapId5+"'", function (err, result) {
                        if (err) throw err;
                        for (var ID1 in result)
                        {
                            var string_=JSON.stringify(result);
                            var json_ =  JSON.parse(string_);
                            var ID1= (json_[0].ID1);
                            console.log("ID5 "+ID1);
                            ID_5=ID1;
                        }
                    });
                }
                else if(i==3)
                {
                    tapId4=tapIdValue;
                    TapName4=TapName;
                    AlcoholGroupID4=AlcoholGroupID;
                    AlcoholTypeID4=AlcoholTypeID;
                    AlcoholTypeName4=AlcoholTypeName;
                    AlcoholBrandID4=AlcoholBrandID;
                    NetPrice4=NetPrice;
                    SalePrice4=SalePrice;
                    ButtonID4_1=ButtonID_1;
                    buttonName4_1=buttonName_1;
                    buttonClReal4_1=buttonClReal_1;
                    buttonClShown4_1=buttonClShown_1;
                    ButtonID4_2=ButtonID_2;
                    buttonName4_2=buttonName_2;
                    buttonClReal4_2=buttonClReal_2;
                    buttonClShown4_2=buttonClShown_2;
                    ButtonID4_3=ButtonID_3;
                    buttonName4_3=buttonName_3;
                    buttonClReal4_3=buttonClReal_3;
                    buttonClShown4_3=buttonClShown_3;
                    ButtonID4_4=ButtonID_4;
                    buttonName4_4=buttonName_4;
                    buttonClReal4_4=buttonClReal_4;
                    buttonClShown4_4=buttonClShown_4;
                    
                    con.query("SELECT * FROM tap WHERE TapID ='"+tapId4+"'", function (err, result) {
                        if (err) throw err;
                        for (var ID1 in result)
                        {
                            var string_=JSON.stringify(result);
                            var json_ =  JSON.parse(string_);
                            var ID1= (json_[0].ID1);
                            console.log("ID4 "+ID1);
                            ID_4=ID1;
                        }
                    });
                }
                else if(i==2)
                {
                    tapId3=tapIdValue;
                    TapName3=TapName;
                    AlcoholGroupID3=AlcoholGroupID;
                    AlcoholTypeID3=AlcoholTypeID;
                    AlcoholTypeName3=AlcoholTypeName;
                    AlcoholBrandID3=AlcoholBrandID;
                    NetPrice3=NetPrice;
                    SalePrice3=SalePrice;
                    ButtonID3_1=ButtonID_1;
                    buttonName3_1=buttonName_1;
                    buttonClReal3_1=buttonClReal_1;
                    buttonClShown3_1=buttonClShown_1;
                    ButtonID3_2=ButtonID_2;
                    buttonName3_2=buttonName_2;
                    buttonClReal3_2=buttonClReal_2;
                    buttonClShown3_2=buttonClShown_2;
                    ButtonID3_3=ButtonID_3;
                    buttonName3_3=buttonName_3;
                    buttonClReal3_3=buttonClReal_3;
                    buttonClShown3_3=buttonClShown_3;
                    ButtonID3_4=ButtonID_4;
                    buttonName3_4=buttonName_4;
                    buttonClReal3_4=buttonClReal_4;
                    buttonClShown3_4=buttonClShown_4;
                    
                    con.query("SELECT * FROM tap WHERE TapID ='"+tapId3+"'", function (err, result) {
                        if (err) throw err;
                        for (var ID1 in result)
                        {
                            var string_=JSON.stringify(result);
                            var json_ =  JSON.parse(string_);
                            var ID1= (json_[0].ID1);
                            console.log("ID3 "+ID1);
                            ID_3=ID1;
                        }
                    });
                }
                else if(i==1)
                {
                    tapId2=tapIdValue;
                    TapName2=TapName;
                    AlcoholGroupID2=AlcoholGroupID;
                    AlcoholTypeID2=AlcoholTypeID;
                    AlcoholTypeName2=AlcoholTypeName;
                    AlcoholBrandID2=AlcoholBrandID;
                    NetPrice2=NetPrice;
                    SalePrice2=SalePrice;
                    ButtonID2_1=ButtonID_1;
                    buttonName2_1=buttonName_1;
                    buttonClReal2_1=buttonClReal_1;
                    buttonClShown2_1=buttonClShown_1;
                    ButtonID2_2=ButtonID_2;
                    buttonName2_2=buttonName_2;
                    buttonClReal2_2=buttonClReal_2;
                    buttonClShown2_2=buttonClShown_2;
                    ButtonID2_3=ButtonID_3;
                    buttonName2_3=buttonName_3;
                    buttonClReal2_3=buttonClReal_3;
                    buttonClShown2_3=buttonClShown_3;
                    ButtonID2_4=ButtonID_4;
                    buttonName2_4=buttonName_4;
                    buttonClReal2_4=buttonClReal_4;
                    buttonClShown2_4=buttonClShown_4;
                    
                    con.query("SELECT * FROM tap WHERE TapID ='"+tapId2+"'", function (err, result) {
                        if (err) throw err;
                        for (var ID1 in result)
                        {
                            var string_=JSON.stringify(result);
                            var json_ =  JSON.parse(string_);
                            var ID1= (json_[0].ID1);
                            ID_2=ID1;
                        }
                    });
                }
                else if(i==0)
                {
                    tapId1=tapIdValue;
                    TapName1=TapName;
                    AlcoholGroupID1=AlcoholGroupID;
                    AlcoholTypeID1=AlcoholTypeID;
                    AlcoholTypeName1=AlcoholTypeName;
                    AlcoholBrandID1=AlcoholBrandID;
                    NetPrice1=NetPrice;
                    SalePrice1=SalePrice;
                    ButtonID1_1=ButtonID_1;
                    buttonName1_1=buttonName_1;
                    buttonClReal1_1=buttonClReal_1;
                    buttonClShown1_1=buttonClShown_1;
                    ButtonID1_2=ButtonID_2;
                    buttonName1_2=buttonName_2;
                    buttonClReal1_2=buttonClReal_2;
                    buttonClShown1_2=buttonClShown_2;
                    ButtonID1_3=ButtonID_3;
                    buttonName1_3=buttonName_3;
                    buttonClReal1_3=buttonClReal_3;
                    buttonClShown1_3=buttonClShown_3;
                    ButtonID1_4=ButtonID_4;
                    buttonName1_4=buttonName_4;
                    buttonClReal1_4=buttonClReal_4;
                    buttonClShown1_4=buttonClShown_4;
                    
                    con.query("SELECT * FROM tap WHERE TapID ='"+tapId1+"'", function (err, result) {
                        if (err) throw err;
                        for (var ID1 in result)
                        {
                            var string_=JSON.stringify(result);
                            var json_ =  JSON.parse(string_);
                            var ID1= (json_[0].ID1);
                            ID_1=ID1;
                        }
                    });
                }
            }
            
        }
    });

    if(numOfTaps>7)
    {
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId8+"'AND ButtonID='"+ButtonID8_1+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId8+"','','','','','','','','"+ButtonID8_1+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId8+"'AND ButtonID='"+ButtonID8_2+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId8+"','','','','','','','','"+ButtonID8_2+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId8+"'AND ButtonID='"+ButtonID8_3+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId8+"','','','','','','','','"+ButtonID8_3+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId8+"'AND ButtonID='"+ButtonID8_4+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId8+"','','','','','','','','"+ButtonID8_4+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
       
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_8 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName8 + "', AlcoholGroupID= '"+ AlcoholGroupID8 +  "', AlcoholTypeID= '"+ AlcoholTypeID8 +   "', AlcoholBrandID= '"+  AlcoholBrandID8 +   "', ButtonName= '"+ buttonName8_1 +   "', ButtonClReal= '"+ buttonClReal8_1 +  "',ButtonClShown= '"+buttonClShown8_1 + "',NetPrice= '"+NetPrice8 + "',SalePrice= '"+SalePrice8 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId8+"'AND ButtonID='"+ButtonID8_1+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_8 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName8 + "', AlcoholGroupID= '"+ AlcoholGroupID8 +  "', AlcoholTypeID= '"+  AlcoholTypeID8 +   "', AlcoholBrandID= '"+  AlcoholBrandID8 +   "', ButtonName= '"+ buttonName8_2 +   "', ButtonClReal= '"+ buttonClReal8_2 +  "',ButtonClShown= '"+buttonClShown8_2 + "',NetPrice= '"+NetPrice8 + "',SalePrice= '"+SalePrice8 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId8+"'AND ButtonID='"+ButtonID8_2+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_8 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName8 + "', AlcoholGroupID= '"+  AlcoholGroupID8 +  "', AlcoholTypeID= '"+  AlcoholTypeID8 +   "', AlcoholBrandID= '"+  AlcoholBrandID8 +   "', ButtonName= '"+ buttonName8_3 +   "', ButtonClReal= '"+ buttonClReal8_3 +  "',ButtonClShown= '"+buttonClShown8_3 + "',NetPrice= '"+NetPrice8 + "',SalePrice= '"+SalePrice8 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId8+"'AND ButtonID='"+ButtonID8_3+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_8 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName8 + "', AlcoholGroupID= '"+  AlcoholGroupID8 +  "', AlcoholTypeID= '"+  AlcoholTypeID8 +   "', AlcoholBrandID= '"+  AlcoholBrandID8 +   "', ButtonName= '"+ buttonName8_4 +   "', ButtonClReal= '"+ buttonClReal8_4 +  "',ButtonClShown= '"+buttonClShown8_4 + "',NetPrice= '"+NetPrice8 + "',SalePrice= '"+SalePrice8 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId8+"'AND ButtonID='"+ButtonID8_4+"'", function (err, result, fields) {
        if (err) throw err;});
        
    }
    if(numOfTaps>6)
    {
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId7+"'AND ButtonID='"+ButtonID7_1+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId7+"','','','','','','','','"+ButtonID7_1+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId7+"'AND ButtonID='"+ButtonID7_2+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId7+"','','','','','','','','"+ButtonID7_2+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId7+"'AND ButtonID='"+ButtonID7_3+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId7+"','','','','','','','','"+ButtonID7_3+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId7+"'AND ButtonID='"+ButtonID7_4+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId7+"','','','','','','','','"+ButtonID7_4+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_7 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName7 + "', AlcoholGroupID= '"+ AlcoholGroupID7 +  "', AlcoholTypeID= '"+ AlcoholTypeID7 +   "', AlcoholBrandID= '"+  AlcoholBrandID7 +   "', ButtonName= '"+ buttonName7_1 +   "', ButtonClReal= '"+ buttonClReal7_1 +  "',ButtonClShown= '"+buttonClShown7_1 + "',NetPrice= '"+NetPrice7 + "',SalePrice= '"+SalePrice7 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId7+"'AND ButtonID='"+ButtonID7_1+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_7 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName7 + "', AlcoholGroupID= '"+ AlcoholGroupID7 +  "', AlcoholTypeID= '"+  AlcoholTypeID7 +   "', AlcoholBrandID= '"+  AlcoholBrandID7 +   "', ButtonName= '"+ buttonName7_2 +   "', ButtonClReal= '"+ buttonClReal7_2 +  "',ButtonClShown= '"+buttonClShown7_2 + "',NetPrice= '"+NetPrice7 + "',SalePrice= '"+SalePrice7 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId7+"'AND ButtonID='"+ButtonID7_2+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_7 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName7 + "', AlcoholGroupID= '"+  AlcoholGroupID7 +  "', AlcoholTypeID= '"+  AlcoholTypeID7 +   "', AlcoholBrandID= '"+  AlcoholBrandID7 +   "', ButtonName= '"+ buttonName7_3 +   "', ButtonClReal= '"+ buttonClReal7_3 +  "',ButtonClShown= '"+buttonClShown7_3 + "',NetPrice= '"+NetPrice7 + "',SalePrice= '"+SalePrice7 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId7+"'AND ButtonID='"+ButtonID7_3+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_7 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName7 + "', AlcoholGroupID= '"+  AlcoholGroupID7 +  "', AlcoholTypeID= '"+  AlcoholTypeID7 +   "', AlcoholBrandID= '"+  AlcoholBrandID7 +   "', ButtonName= '"+ buttonName7_4 +   "', ButtonClReal= '"+ buttonClReal7_4 +  "',ButtonClShown= '"+buttonClShown7_4 + "',NetPrice= '"+NetPrice7 + "',SalePrice= '"+SalePrice7 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId7+"'AND ButtonID='"+ButtonID7_4+"'", function (err, result, fields) {
        if (err) throw err;});
        
    }
    if(numOfTaps>5)
    {
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId6+"'AND ButtonID='"+ButtonID6_1+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId6+"','','','','','','','','"+ButtonID6_1+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId6+"'AND ButtonID='"+ButtonID6_2+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId6+"','','','','','','','','"+ButtonID6_2+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId6+"'AND ButtonID='"+ButtonID6_3+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId6+"','','','','','','','','"+ButtonID6_3+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId6+"'AND ButtonID='"+ButtonID6_4+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId6+"','','','','','','','','"+ButtonID6_4+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_6 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName6 + "', AlcoholGroupID= '"+ AlcoholGroupID6 +  "', AlcoholTypeID= '"+ AlcoholTypeID6 +   "', AlcoholBrandID= '"+  AlcoholBrandID6 +   "', ButtonName= '"+ buttonName6_1 +   "', ButtonClReal= '"+ buttonClReal6_1 +  "',ButtonClShown= '"+buttonClShown6_1 + "',NetPrice= '"+NetPrice6 + "',SalePrice= '"+SalePrice6 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId6+"'AND ButtonID='"+ButtonID6_1+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_6 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName6 + "', AlcoholGroupID= '"+ AlcoholGroupID6 +  "', AlcoholTypeID= '"+  AlcoholTypeID6 +   "', AlcoholBrandID= '"+  AlcoholBrandID6 +   "', ButtonName= '"+ buttonName6_2 +   "', ButtonClReal= '"+ buttonClReal6_2 +  "',ButtonClShown= '"+buttonClShown6_2 + "',NetPrice= '"+NetPrice6 + "',SalePrice= '"+SalePrice6 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId6+"'AND ButtonID='"+ButtonID6_2+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_6 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName6 + "', AlcoholGroupID= '"+  AlcoholGroupID6 +  "', AlcoholTypeID= '"+  AlcoholTypeID6 +   "', AlcoholBrandID= '"+  AlcoholBrandID6 +   "', ButtonName= '"+ buttonName6_3 +   "', ButtonClReal= '"+ buttonClReal6_3 +  "',ButtonClShown= '"+buttonClShown6_3 + "',NetPrice= '"+NetPrice6 + "',SalePrice= '"+SalePrice6 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId6+"'AND ButtonID='"+ButtonID6_3+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_6 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName6 + "', AlcoholGroupID= '"+  AlcoholGroupID6 +  "', AlcoholTypeID= '"+  AlcoholTypeID6 +   "', AlcoholBrandID= '"+  AlcoholBrandID6 +   "', ButtonName= '"+ buttonName6_4 +   "', ButtonClReal= '"+ buttonClReal6_4 +  "',ButtonClShown= '"+buttonClShown6_4 + "',NetPrice= '"+NetPrice6 + "',SalePrice= '"+SalePrice6 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId6+"'AND ButtonID='"+ButtonID6_4+"'", function (err, result, fields) {
        if (err) throw err;});
        
    }
    if(numOfTaps>4)
    {
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId5+"'AND ButtonID='"+ButtonID5_1+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId5+"','','','','','','','','"+ButtonID5_1+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId5+"'AND ButtonID='"+ButtonID5_2+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId5+"','','','','','','','','"+ButtonID5_2+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId5+"'AND ButtonID='"+ButtonID5_3+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId5+"','','','','','','','','"+ButtonID5_3+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId5+"'AND ButtonID='"+ButtonID5_4+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId5+"','','','','','','','','"+ButtonID5_4+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_5 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName5 + "', AlcoholGroupID= '"+ AlcoholGroupID5 +  "', AlcoholTypeID= '"+ AlcoholTypeID5 +   "', AlcoholBrandID= '"+  AlcoholBrandID5 +   "', ButtonName= '"+ buttonName5_1 +   "', ButtonClReal= '"+ buttonClReal5_1 +  "',ButtonClShown= '"+buttonClShown5_1 + "',NetPrice= '"+NetPrice5 + "',SalePrice= '"+SalePrice5 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId5+"'AND ButtonID='"+ButtonID5_1+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_5 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName5 + "', AlcoholGroupID= '"+ AlcoholGroupID5 +  "', AlcoholTypeID= '"+  AlcoholTypeID5 +   "', AlcoholBrandID= '"+  AlcoholBrandID5 +   "', ButtonName= '"+ buttonName5_2 +   "', ButtonClReal= '"+ buttonClReal5_2 +  "',ButtonClShown= '"+buttonClShown5_2 + "',NetPrice= '"+NetPrice5 + "',SalePrice= '"+SalePrice5 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId5+"'AND ButtonID='"+ButtonID5_2+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_5 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName5 + "', AlcoholGroupID= '"+  AlcoholGroupID5 +  "', AlcoholTypeID= '"+  AlcoholTypeID5 +   "', AlcoholBrandID= '"+  AlcoholBrandID5 +   "', ButtonName= '"+ buttonName5_3 +   "', ButtonClReal= '"+ buttonClReal5_3 +  "',ButtonClShown= '"+buttonClShown5_3 + "',NetPrice= '"+NetPrice5 + "',SalePrice= '"+SalePrice5 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId5+"'AND ButtonID='"+ButtonID5_3+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_5 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName5 + "', AlcoholGroupID= '"+  AlcoholGroupID5 +  "', AlcoholTypeID= '"+  AlcoholTypeID5 +   "', AlcoholBrandID= '"+  AlcoholBrandID5 +   "', ButtonName= '"+ buttonName5_4 +   "', ButtonClReal= '"+ buttonClReal5_4 +  "',ButtonClShown= '"+buttonClShown5_4 + "',NetPrice= '"+NetPrice5 + "',SalePrice= '"+SalePrice5 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId5+"'AND ButtonID='"+ButtonID5_4+"'", function (err, result, fields) {
        if (err) throw err;});
        
    }
    if(numOfTaps>3)
    {
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId4+"'AND ButtonID='"+ButtonID4_1+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId4+"','','','','','','','','"+ButtonID4_1+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId4+"'AND ButtonID='"+ButtonID4_2+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId4+"','','','','','','','','"+ButtonID4_2+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId4+"'AND ButtonID='"+ButtonID4_3+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId4+"','','','','','','','','"+ButtonID4_3+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId4+"'AND ButtonID='"+ButtonID4_4+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId4+"','','','','','','','','"+ButtonID4_4+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_4 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName4 + "', AlcoholGroupID= '"+ AlcoholGroupID4 +  "', AlcoholTypeID= '"+ AlcoholTypeID4 +   "', AlcoholBrandID= '"+  AlcoholBrandID4 +   "', ButtonName= '"+ buttonName4_1 +   "', ButtonClReal= '"+ buttonClReal4_1 +  "',ButtonClShown= '"+buttonClShown4_1 + "',NetPrice= '"+NetPrice4 + "',SalePrice= '"+SalePrice4 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId4+"'AND ButtonID='"+ButtonID4_1+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_4 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName4 + "', AlcoholGroupID= '"+ AlcoholGroupID4 +  "', AlcoholTypeID= '"+  AlcoholTypeID4 +   "', AlcoholBrandID= '"+  AlcoholBrandID4 +   "', ButtonName= '"+ buttonName4_2 +   "', ButtonClReal= '"+ buttonClReal4_2 +  "',ButtonClShown= '"+buttonClShown4_2 + "',NetPrice= '"+NetPrice4 + "',SalePrice= '"+SalePrice4 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId4+"'AND ButtonID='"+ButtonID4_2+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_4 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName4 + "', AlcoholGroupID= '"+  AlcoholGroupID4 +  "', AlcoholTypeID= '"+  AlcoholTypeID4 +   "', AlcoholBrandID= '"+  AlcoholBrandID4 +   "', ButtonName= '"+ buttonName4_3 +   "', ButtonClReal= '"+ buttonClReal4_3 +  "',ButtonClShown= '"+buttonClShown4_3 + "',NetPrice= '"+NetPrice4 + "',SalePrice= '"+SalePrice4 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId4+"'AND ButtonID='"+ButtonID4_3+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_4 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName4 + "', AlcoholGroupID= '"+  AlcoholGroupID4 +  "', AlcoholTypeID= '"+  AlcoholTypeID4 +   "', AlcoholBrandID= '"+  AlcoholBrandID4 +   "', ButtonName= '"+ buttonName4_4 +   "', ButtonClReal= '"+ buttonClReal4_4 +  "',ButtonClShown= '"+buttonClShown4_4 + "',NetPrice= '"+NetPrice4 + "',SalePrice= '"+SalePrice4 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId4+"'AND ButtonID='"+ButtonID4_4+"'", function (err, result, fields) {
        if (err) throw err;});
        
    }
    if(numOfTaps>2)
    {
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId3+"'AND ButtonID='"+ButtonID3_1+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId3+"','','','','','','','','"+ButtonID3_1+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId3+"'AND ButtonID='"+ButtonID3_2+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId3+"','','','','','','','','"+ButtonID3_2+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId3+"'AND ButtonID='"+ButtonID3_3+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId3+"','','','','','','','','"+ButtonID3_3+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId3+"'AND ButtonID='"+ButtonID3_4+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId3+"','','','','','','','','"+ButtonID3_4+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_3 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName3 + "', AlcoholGroupID= '"+ AlcoholGroupID3 +  "', AlcoholTypeID= '"+ AlcoholTypeID3 +   "', AlcoholBrandID= '"+  AlcoholBrandID3 +   "', ButtonName= '"+ buttonName3_1 +   "', ButtonClReal= '"+ buttonClReal3_1 +  "',ButtonClShown= '"+buttonClShown3_1 + "',NetPrice= '"+NetPrice3 + "',SalePrice= '"+SalePrice3 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId3+"'AND ButtonID='"+ButtonID3_1+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_3 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName3 + "', AlcoholGroupID= '"+ AlcoholGroupID3 +  "', AlcoholTypeID= '"+  AlcoholTypeID3 +   "', AlcoholBrandID= '"+  AlcoholBrandID3 +   "', ButtonName= '"+ buttonName3_2 +   "', ButtonClReal= '"+ buttonClReal3_2 +  "',ButtonClShown= '"+buttonClShown3_2 + "',NetPrice= '"+NetPrice3 + "',SalePrice= '"+SalePrice3 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId3+"'AND ButtonID='"+ButtonID3_2+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_3 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName3 + "', AlcoholGroupID= '"+  AlcoholGroupID3 +  "', AlcoholTypeID= '"+  AlcoholTypeID3 +   "', AlcoholBrandID= '"+  AlcoholBrandID3 +   "', ButtonName= '"+ buttonName3_3 +   "', ButtonClReal= '"+ buttonClReal3_3 +  "',ButtonClShown= '"+buttonClShown3_3 + "',NetPrice= '"+NetPrice3 + "',SalePrice= '"+SalePrice3 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId3+"'AND ButtonID='"+ButtonID3_3+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_3 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName3 + "', AlcoholGroupID= '"+  AlcoholGroupID3 +  "', AlcoholTypeID= '"+  AlcoholTypeID3 +   "', AlcoholBrandID= '"+  AlcoholBrandID3 +   "', ButtonName= '"+ buttonName3_4 +   "', ButtonClReal= '"+ buttonClReal3_4 +  "',ButtonClShown= '"+buttonClShown3_4 + "',NetPrice= '"+NetPrice3 + "',SalePrice= '"+SalePrice3 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId3+"'AND ButtonID='"+ButtonID3_4+"'", function (err, result, fields) {
        if (err) throw err;});
        
    }
    if(numOfTaps>1)
    { 
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId2+"'AND ButtonID='"+ButtonID2_1+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId2+"','','','','','','','','"+ButtonID2_1+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId2+"'AND ButtonID='"+ButtonID2_2+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId2+"','','','','','','','','"+ButtonID2_2+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId2+"'AND ButtonID='"+ButtonID2_3+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId2+"','','','','','','','','"+ButtonID2_3+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId2+"'AND ButtonID='"+ButtonID2_4+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId2+"','','','','','','','','"+ButtonID2_4+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_2 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName2 + "', AlcoholGroupID= '"+ AlcoholGroupID2 +  "', AlcoholTypeID= '"+ AlcoholTypeID2 +   "', AlcoholBrandID= '"+  AlcoholBrandID2 +   "', ButtonName= '"+ buttonName2_1 +   "', ButtonClReal= '"+ buttonClReal2_1 +  "',ButtonClShown= '"+buttonClShown2_1 + "',NetPrice= '"+NetPrice2 + "',SalePrice= '"+SalePrice2 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId2+"'AND ButtonID='"+ButtonID2_1+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_2 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName2 + "', AlcoholGroupID= '"+ AlcoholGroupID2 +  "', AlcoholTypeID= '"+  AlcoholTypeID2 +   "', AlcoholBrandID= '"+  AlcoholBrandID2 +   "', ButtonName= '"+ buttonName2_2 +   "', ButtonClReal= '"+ buttonClReal2_2 +  "',ButtonClShown= '"+buttonClShown2_2 + "',NetPrice= '"+NetPrice2 + "',SalePrice= '"+SalePrice2 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId2+"'AND ButtonID='"+ButtonID2_2+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_2 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName2 + "', AlcoholGroupID= '"+  AlcoholGroupID2 +  "', AlcoholTypeID= '"+  AlcoholTypeID2 +   "', AlcoholBrandID= '"+  AlcoholBrandID2 +   "', ButtonName= '"+ buttonName2_3 +   "', ButtonClReal= '"+ buttonClReal2_3 +  "',ButtonClShown= '"+buttonClShown2_3 + "',NetPrice= '"+NetPrice2 + "',SalePrice= '"+SalePrice2 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId2+"'AND ButtonID='"+ButtonID2_3+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_2 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName2 + "', AlcoholGroupID= '"+  AlcoholGroupID2 +  "', AlcoholTypeID= '"+  AlcoholTypeID2 +   "', AlcoholBrandID= '"+  AlcoholBrandID2 +   "', ButtonName= '"+ buttonName2_4 +   "', ButtonClReal= '"+ buttonClReal2_4 +  "',ButtonClShown= '"+buttonClShown2_4 + "',NetPrice= '"+NetPrice2 + "',SalePrice= '"+SalePrice2 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId2+"'AND ButtonID='"+ButtonID2_4+"'", function (err, result, fields) {
        if (err) throw err;});
        
    }
    if(numOfTaps>0)
    {
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId1+"'AND ButtonID='"+ButtonID1_1+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId1+"','','','','','','','','"+ButtonID1_1+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId1+"'AND ButtonID='"+ButtonID1_2+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId1+"','','','','','','','','"+ButtonID1_2+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId1+"'AND ButtonID='"+ButtonID1_3+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId1+"','','','','','','','','"+ButtonID1_3+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE tapID = '"+tapId1+"'AND ButtonID='"+ButtonID1_4+"'", function (err, result_, fields) {
            if (err) throw err;
            if(result_=="")
            {
                con.query("INSERT INTO collectorCommunicationSettings (data,ID1,imei,collectorID,tapHexID,tapID,HoldingID,CompanyID,BarGroupID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,TapStatusID,Date_,ip) VALUES  ('','','','','','"+tapId1+"','','','','','','','','"+ButtonID1_4+"','','','','','','','','')", function (err, result, fields) {
                    if (err) throw err;});
            }
        });
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_1 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName1 + "', AlcoholGroupID= '"+ AlcoholGroupID1 +  "', AlcoholTypeID= '"+ AlcoholTypeID1 +   "', AlcoholBrandID= '"+  AlcoholBrandID1 +   "', ButtonName= '"+ buttonName1_1 +   "', ButtonClReal= '"+ buttonClReal1_1 +  "',ButtonClShown= '"+buttonClShown1_1 + "',NetPrice= '"+NetPrice1 + "',SalePrice= '"+SalePrice1 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId1+"'AND ButtonID='"+ButtonID1_1+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_1 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName1 + "', AlcoholGroupID= '"+ AlcoholGroupID1 +  "', AlcoholTypeID= '"+  AlcoholTypeID1 +   "', AlcoholBrandID= '"+  AlcoholBrandID1 +   "', ButtonName= '"+ buttonName1_2 +   "', ButtonClReal= '"+ buttonClReal1_2 +  "',ButtonClShown= '"+buttonClShown1_2 + "',NetPrice= '"+NetPrice1 + "',SalePrice= '"+SalePrice1 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId1+"'AND ButtonID='"+ButtonID1_2+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_1 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName1 + "', AlcoholGroupID= '"+  AlcoholGroupID1 +  "', AlcoholTypeID= '"+  AlcoholTypeID1 +   "', AlcoholBrandID= '"+  AlcoholBrandID1 +   "', ButtonName= '"+ buttonName1_3 +   "', ButtonClReal= '"+ buttonClReal1_3 +  "',ButtonClShown= '"+buttonClShown1_3 + "',NetPrice= '"+NetPrice1 + "',SalePrice= '"+SalePrice1 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId1+"'AND ButtonID='"+ButtonID1_3+"'", function (err, result, fields) {
        if (err) throw err;});
        con.query("UPDATE collectorCommunicationSettings SET imei= '"+imei + "', ID1= '"+ ID_1 +   "', HoldingID= '"+ HoldingID +  "', CompanyID= '"+ CompanyID +  "', BarGroupID= '"+ BarGroupID +  "', TapName= '"+ TapName1 + "', AlcoholGroupID= '"+  AlcoholGroupID1 +  "', AlcoholTypeID= '"+  AlcoholTypeID1 +   "', AlcoholBrandID= '"+  AlcoholBrandID1 +   "', ButtonName= '"+ buttonName1_4 +   "', ButtonClReal= '"+ buttonClReal1_4 +  "',ButtonClShown= '"+buttonClShown1_4 + "',NetPrice= '"+NetPrice1 + "',SalePrice= '"+SalePrice1 + "',ip= '"+ip + "', collectorID= '"+collector_id + "' WHERE tapID = '"+tapId1+"'AND ButtonID='"+ButtonID1_4+"'", function (err, result, fields) {
        if (err) throw err;});
        
    }
}
// Create a server instance, and chain the listen function to it
// The function passed to net.createServer() becomes the event handler for the 'connection' event
// The sock object the callback function receives UNIQUE for each connection
net.createServer(function(sock) {
    console.log('client connected');
    ip = sock.remoteAddress;
    console.log("Server ip: " + ip);
    // We have a connection - a socket object is assigned to the connection automatically
    console.log('CONNECTED: ' + sock.remoteAddress +':'+ sock.remotePort);
    // Add a 'data' event handler to this instance of socket
    sock.on('data', function(data) {
        console.log("here now");
        TCPgelendata=data;
        i=0;
        console.log( sock.remoteAddress +' '+ sock.remotePort);
        console.log('DATA ' + sock.remoteAddress + ': ' + data);
        //sock.send('onur',{data:data});
        console.log("Gelen data: "+data);
        // ilk iki byte ascii den stringe çevirme
        for (i=0;i<2;i++)
        {
            if(data[i]=='48')
            {
                data[i]='0';
            }
            else if(data[i]=='49')
            {
                data[i]='1';
            }
            else if(data[i]=='50')
            {
                data[i]='2';
            }
            else if(data[i]=='51')
            {
                data[i]='3';
            }
            else if(data[i]=='52')
            {
                data[i]='4';
            }
            else if(data[i]=='53')
            {
                data[i]='5';
            }
            else if(data[i]=='54')
            {
                data[i]='6';
            }
            else if(data[i]=='55')
            {
                data[i]='7';
            }
            else if(data[i]=='56')
            {
                data[i]='8';
            }
            else if(data[i]=='57')
            {
                data[i]='9';
            }
        }
        
        if(data[0]=='0' && data[1]=='1' && data[2]=='61' && data[18]=='47'  && data[28]=='47'  && data[38]=='47'   && data[40]=='38' )
        {
            
            for (i=3;i<40;i++)
            {
                if(data[i]=='48')
                {
                    data[i]='0';
                }
                else if(data[i]=='49')
                {
                    data[i]='1';
                }
                else if(data[i]=='50')
                {
                    data[i]='2';
                }
                else if(data[i]=='51')
                {
                    data[i]='3';
                }
                else if(data[i]=='52')
                {
                    data[i]='4';
                }
                else if(data[i]=='53')
                {
                    data[i]='5';
                }
                else if(data[i]=='54')
                {
                    data[i]='6';
                }
                else if(data[i]=='55')
                {
                    data[i]='7';
                }
                else if(data[i]=='56')
                {
                    data[i]='8';
                }
                else if(data[i]=='57')
                {
                    data[i]='9';
                }
                else if(data[i]=='46')
                {
                    data[i]='.';
                }
            }
            imei="";
            imei=100000000000000*data[3]+10000000000000*data[4]+1000000000000*data[5];
            imei=imei+100000000000*data[6]+10000000000*data[7]+1000000000*data[8];
            imei=imei+100000000*data[9]+ 10000000*data[10]+1000000*data[11];
            imei=imei+100000*data[12]+10000*data[13]+1000*data[14];
            imei=imei+100*data[15]+10*data[16]+data[17];
            
            lat=10*data[19]+data[20];
            lat=lat+data[22]/10+data[23]/100+data[24]/1000;
            lat=lat+data[25]/10000+data[26]/100000+data[27]/1000000;

            long=10*data[29]+data[30];
            long=long+data[32]/10+data[33]/100+data[34]/1000;
            long=long+data[35]/10000+data[36]/100000+data[37]/1000000;
            
            GMT=data[39];

            date_=getDateTime_();
            update_collectorCommunicationSettings();
            update_collectorCommunicationSettings();
            sock.write('01='+numOfTaps+'&');
            
            console.log("Collector Online!");
            console.log('imei= ' + imei+' lat= ' + lat+' long= ' + long +" date="+date_ );
            
            con.query("UPDATE collectorList SET last_data_datetime = '"+date_ + "', Latitude= '"+ lat +   "', Longitude= '"+ long +  "', collectorStatusID= '"+ 1 +"' WHERE imei = '"+imei+"'", function (err, result, fields) {
                if (err) throw err;});
            con.query("UPDATE collectorCommunicationSettings SET ip = '"+sock.remoteAddress + "' WHERE imei = '"+imei+"'", function (err, result, fields) {
                if (err) throw err;});
            
        }
        else if(data[0]=='0' && data[1]=='2' && data[2]=='61' && data[18]=='47' && data[20]=='38' )
        {
            
            for (i=3;i<20;i++)
            {
                if(data[i]=='48')
                {
                    data[i]='0';
                }
                else if(data[i]=='49')
                {
                    data[i]='1';
                }
                else if(data[i]=='50')
                {
                    data[i]='2';
                }
                else if(data[i]=='51')
                {
                    data[i]='3';
                }
                else if(data[i]=='52')
                {
                    data[i]='4';
                }
                else if(data[i]=='53')
                {
                    data[i]='5';
                }
                else if(data[i]=='54')
                {
                    data[i]='6';
                }
                else if(data[i]=='55')
                {
                    data[i]='7';
                }
                else if(data[i]=='56')
                {
                    data[i]='8';
                }
                else if(data[i]=='57')
                {
                    data[i]='9';
                }
            }
            imei="";
            var j=0;
            imei=100000000000000*data[3]+10000000000000*data[4]+1000000000000*data[5];
            imei=imei+100000000000*data[6]+10000000000*data[7]+1000000000*data[8];
            imei=imei+100000000*data[9]+ 10000000*data[10]+1000000*data[11];
            imei=imei+100000*data[12]+10000*data[13]+1000*data[14];
            imei=imei+100*data[15]+10*data[16]+data[17];
            
            GMT=data[19];
            date_=getDateTime_();

            console.log('collector PING = ' + imei);
            update_collectorCommunicationSettings();
            update_collectorCommunicationSettings();

            con.query("UPDATE collectorList SET last_data_datetime = '"+date_ + "', collectorStatusID= '"+ 1 +"' WHERE imei = '"+imei+"'", function (err, result, fields) {
                if (err) throw err;});
            con.query("UPDATE collectorCommunicationSettings SET ip = '"+sock.remoteAddress + "' WHERE imei = '"+imei+"'", function (err, result, fields) {
                if (err) throw err;});

            switch(numOfTaps)
            {
                case 0:
                    sock.write("02="+170+","+187+","+"0,0,0,"+"0,0,0,"+"0,0,0,"+"0,0,0,"+"0,0,0,"+"0,0,0,"+"0,0,0,"+"0,0,0&");
                break;
                case 1:
                    ID_1=parseInt(ID_1, 10);
                    var ID_1_HEX=ID_1.toString(16);
                    var ID1_1=ID_1_HEX[0]+ID_1_HEX[1];
                    var ID1_1=parseInt(ID1_1, 16);
                    var ID1_2=ID_1_HEX[2]+ID_1_HEX[3];
                    var ID1_2=parseInt(ID1_2, 16);
                    var ID1_3=ID_1_HEX[4]+ID_1_HEX[5];
                    var ID1_3=parseInt(ID1_3, 16);
                    sock.write("02="+170+","+187+","+ID1_1+","+ID1_2+","+ID1_3+","+"0,0,0,"+"0,0,0,"+"0,0,0,"+"0,0,0,"+"0,0,0,"+"0,0,0,"+"0,0,0&");
                break;
                case 2:
                    ID_1=parseInt(ID_1, 10);
                    var ID_1_HEX=ID_1.toString(16);
                    var ID1_1=ID_1_HEX[0]+ID_1_HEX[1];
                    var ID1_1=parseInt(ID1_1, 16);
                    var ID1_2=ID_1_HEX[2]+ID_1_HEX[3];
                    var ID1_2=parseInt(ID1_2, 16);
                    var ID1_3=ID_1_HEX[4]+ID_1_HEX[5];
                    var ID1_3=parseInt(ID1_3, 16);
                    
                    ID_2=parseInt(ID_2, 10);
                    var ID_2_HEX=ID_2.toString(16);
                    var ID2_1=ID_2_HEX[0]+ID_2_HEX[1];
                    var ID2_1=parseInt(ID2_1, 16);
                    var ID2_2=ID_2_HEX[2]+ID_2_HEX[3];
                    var ID2_2=parseInt(ID2_2, 16);
                    var ID2_3=ID_2_HEX[4]+ID_2_HEX[5];
                    var ID2_3=parseInt(ID2_3, 16);
                    sock.write("02="+170+","+187+","+ID1_1+","+ID1_2+","+ID1_3+","+ID2_1+","+ID2_2+","+ID2_3+","+"0,0,0,"+"0,0,0,"+"0,0,0,"+"0,0,0,"+"0,0,0,"+"0,0,0&");
                break;
                case 3:
                    ID_1=parseInt(ID_1, 10);
                    var ID_1_HEX=ID_1.toString(16);
                    var ID1_1=ID_1_HEX[0]+ID_1_HEX[1];
                    var ID1_1=parseInt(ID1_1, 16);
                    var ID1_2=ID_1_HEX[2]+ID_1_HEX[3];
                    var ID1_2=parseInt(ID1_2, 16);
                    var ID1_3=ID_1_HEX[4]+ID_1_HEX[5];
                    var ID1_3=parseInt(ID1_3, 16);
                    
                    ID_2=parseInt(ID_2, 10);
                    var ID_2_HEX=ID_2.toString(16);
                    var ID2_1=ID_2_HEX[0]+ID_2_HEX[1];
                    var ID2_1=parseInt(ID2_1, 16);
                    var ID2_2=ID_2_HEX[2]+ID_2_HEX[3];
                    var ID2_2=parseInt(ID2_2, 16);
                    var ID2_3=ID_2_HEX[4]+ID_2_HEX[5];
                    var ID2_3=parseInt(ID2_3, 16);

                    ID_3=parseInt(ID_3, 10);
                    var ID_3_HEX=ID_3.toString(16);
                    var ID3_1=ID_3_HEX[0]+ID_3_HEX[1];
                    var ID3_1=parseInt(ID3_1, 16);
                    var ID3_2=ID_3_HEX[2]+ID_3_HEX[3];
                    var ID3_2=parseInt(ID3_2, 16);
                    var ID3_3=ID_3_HEX[4]+ID_3_HEX[5];
                    var ID3_3=parseInt(ID3_3, 16);
                    sock.write("02="+170+","+187+","+ID1_1+","+ID1_2+","+ID1_3+","+ID2_1+","+ID2_2+","+ID2_3+","+ID3_1+","+ID3_2+","+ID3_3+","+"0,0,0,"+"0,0,0,"+"0,0,0,"+"0,0,0,"+"0,0,0&");
                break;
                case 4:
                    ID_1=parseInt(ID_1, 10);
                    var ID_1_HEX=ID_1.toString(16);
                    var ID1_1=ID_1_HEX[0]+ID_1_HEX[1];
                    var ID1_1=parseInt(ID1_1, 16);
                    var ID1_2=ID_1_HEX[2]+ID_1_HEX[3];
                    var ID1_2=parseInt(ID1_2, 16);
                    var ID1_3=ID_1_HEX[4]+ID_1_HEX[5];
                    var ID1_3=parseInt(ID1_3, 16);
                    
                    ID_2=parseInt(ID_2, 10);
                    var ID_2_HEX=ID_2.toString(16);
                    var ID2_1=ID_2_HEX[0]+ID_2_HEX[1];
                    var ID2_1=parseInt(ID2_1, 16);
                    var ID2_2=ID_2_HEX[2]+ID_2_HEX[3];
                    var ID2_2=parseInt(ID2_2, 16);
                    var ID2_3=ID_2_HEX[4]+ID_2_HEX[5];
                    var ID2_3=parseInt(ID2_3, 16);

                    ID_3=parseInt(ID_3, 10);
                    var ID_3_HEX=ID_3.toString(16);
                    var ID3_1=ID_3_HEX[0]+ID_3_HEX[1];
                    var ID3_1=parseInt(ID3_1, 16);
                    var ID3_2=ID_3_HEX[2]+ID_3_HEX[3];
                    var ID3_2=parseInt(ID3_2, 16);
                    var ID3_3=ID_3_HEX[4]+ID_3_HEX[5];
                    var ID3_3=parseInt(ID3_3, 16);

                    ID_4=parseInt(ID_4, 10);
                    var ID_4_HEX=ID_4.toString(16);
                    var ID4_1=ID_4_HEX[0]+ID_4_HEX[1];
                    var ID4_1=parseInt(ID4_1, 16);
                    var ID4_2=ID_4_HEX[2]+ID_4_HEX[3];
                    var ID4_2=parseInt(ID4_2, 16);
                    var ID4_3=ID_4_HEX[4]+ID_4_HEX[5];
                    var ID4_3=parseInt(ID4_3, 16);
                    sock.write("02="+170+","+187+","+ID1_1+","+ID1_2+","+ID1_3+","+ID2_1+","+ID2_2+","+ID2_3+","+ID3_1+","+ID3_2+","+ID3_3+","+ID4_1+","+ID4_2+","+ID4_3+","+"0,0,0,"+"0,0,0,"+"0,0,0,"+"0,0,0&");
                break;
                case 5:
                    ID_1=parseInt(ID_1, 10);
                    var ID_1_HEX=ID_1.toString(16);
                    var ID1_1=ID_1_HEX[0]+ID_1_HEX[1];
                    var ID1_1=parseInt(ID1_1, 16);
                    var ID1_2=ID_1_HEX[2]+ID_1_HEX[3];
                    var ID1_2=parseInt(ID1_2, 16);
                    var ID1_3=ID_1_HEX[4]+ID_1_HEX[5];
                    var ID1_3=parseInt(ID1_3, 16);
                    
                    ID_2=parseInt(ID_2, 10);
                    var ID_2_HEX=ID_2.toString(16);
                    var ID2_1=ID_2_HEX[0]+ID_2_HEX[1];
                    var ID2_1=parseInt(ID2_1, 16);
                    var ID2_2=ID_2_HEX[2]+ID_2_HEX[3];
                    var ID2_2=parseInt(ID2_2, 16);
                    var ID2_3=ID_2_HEX[4]+ID_2_HEX[5];
                    var ID2_3=parseInt(ID2_3, 16);

                    ID_3=parseInt(ID_3, 10);
                    var ID_3_HEX=ID_3.toString(16);
                    var ID3_1=ID_3_HEX[0]+ID_3_HEX[1];
                    var ID3_1=parseInt(ID3_1, 16);
                    var ID3_2=ID_3_HEX[2]+ID_3_HEX[3];
                    var ID3_2=parseInt(ID3_2, 16);
                    var ID3_3=ID_3_HEX[4]+ID_3_HEX[5];
                    var ID3_3=parseInt(ID3_3, 16);

                    ID_4=parseInt(ID_4, 10);
                    var ID_4_HEX=ID_4.toString(16);
                    var ID4_1=ID_4_HEX[0]+ID_4_HEX[1];
                    var ID4_1=parseInt(ID4_1, 16);
                    var ID4_2=ID_4_HEX[2]+ID_4_HEX[3];
                    var ID4_2=parseInt(ID4_2, 16);
                    var ID4_3=ID_4_HEX[4]+ID_4_HEX[5];
                    var ID4_3=parseInt(ID4_3, 16);

                    ID_5=parseInt(ID_5, 10);
                    var ID_5_HEX=ID_5.toString(16);
                    var ID5_1=ID_5_HEX[0]+ID_5_HEX[1];
                    var ID5_1=parseInt(ID5_1, 16);
                    var ID5_2=ID_5_HEX[2]+ID_5_HEX[3];
                    var ID5_2=parseInt(ID5_2, 16);
                    var ID5_3=ID_5_HEX[4]+ID_5_HEX[5];
                    var ID5_3=parseInt(ID5_3, 16);
                    sock.write("02="+170+","+187+","+ID1_1+","+ID1_2+","+ID1_3+","+ID2_1+","+ID2_2+","+ID2_3+","+ID3_1+","+ID3_2+","+ID3_3+","+ID4_1+","+ID4_2+","+ID4_3+","+ID5_1+","+ID5_2+","+ID5_3+","+"0,0,0,"+"0,0,0,"+"0,0,0&");
                break;
                case 6:
                    ID_1=parseInt(ID_1, 10);
                    var ID_1_HEX=ID_1.toString(16);
                    var ID1_1=ID_1_HEX[0]+ID_1_HEX[1];
                    var ID1_1=parseInt(ID1_1, 16);
                    var ID1_2=ID_1_HEX[2]+ID_1_HEX[3];
                    var ID1_2=parseInt(ID1_2, 16);
                    var ID1_3=ID_1_HEX[4]+ID_1_HEX[5];
                    var ID1_3=parseInt(ID1_3, 16);
                    
                    ID_2=parseInt(ID_2, 10);
                    var ID_2_HEX=ID_2.toString(16);
                    var ID2_1=ID_2_HEX[0]+ID_2_HEX[1];
                    var ID2_1=parseInt(ID2_1, 16);
                    var ID2_2=ID_2_HEX[2]+ID_2_HEX[3];
                    var ID2_2=parseInt(ID2_2, 16);
                    var ID2_3=ID_2_HEX[4]+ID_2_HEX[5];
                    var ID2_3=parseInt(ID2_3, 16);

                    ID_3=parseInt(ID_3, 10);
                    var ID_3_HEX=ID_3.toString(16);
                    var ID3_1=ID_3_HEX[0]+ID_3_HEX[1];
                    var ID3_1=parseInt(ID3_1, 16);
                    var ID3_2=ID_3_HEX[2]+ID_3_HEX[3];
                    var ID3_2=parseInt(ID3_2, 16);
                    var ID3_3=ID_3_HEX[4]+ID_3_HEX[5];
                    var ID3_3=parseInt(ID3_3, 16);

                    ID_4=parseInt(ID_4, 10);
                    var ID_4_HEX=ID_4.toString(16);
                    var ID4_1=ID_4_HEX[0]+ID_4_HEX[1];
                    var ID4_1=parseInt(ID4_1, 16);
                    var ID4_2=ID_4_HEX[2]+ID_4_HEX[3];
                    var ID4_2=parseInt(ID4_2, 16);
                    var ID4_3=ID_4_HEX[4]+ID_4_HEX[5];
                    var ID4_3=parseInt(ID4_3, 16);

                    ID_5=parseInt(ID_5, 10);
                    var ID_5_HEX=ID_5.toString(16);
                    var ID5_1=ID_5_HEX[0]+ID_5_HEX[1];
                    var ID5_1=parseInt(ID5_1, 16);
                    var ID5_2=ID_5_HEX[2]+ID_5_HEX[3];
                    var ID5_2=parseInt(ID5_2, 16);
                    var ID5_3=ID_5_HEX[4]+ID_5_HEX[5];
                    var ID5_3=parseInt(ID5_3, 16);

                    ID_6=parseInt(ID_6, 10);
                    var ID_6_HEX=ID_6.toString(16);
                    var ID6_1=ID_6_HEX[0]+ID_6_HEX[1];
                    var ID6_1=parseInt(ID6_1, 16);
                    var ID6_2=ID_6_HEX[2]+ID_6_HEX[3];
                    var ID6_2=parseInt(ID6_2, 16);
                    var ID6_3=ID_6_HEX[4]+ID_6_HEX[5];
                    var ID6_3=parseInt(ID6_3, 16);
                    sock.write("02="+170+","+187+","+ID1_1+","+ID1_2+","+ID1_3+","+ID2_1+","+ID2_2+","+ID2_3+","+ID3_1+","+ID3_2+","+ID3_3+","+ID4_1+","+ID4_2+","+ID4_3+","+ID5_1+","+ID5_2+","+ID5_3+","+ID6_1+","+ID6_2+","+ID6_3+","+"0,0,0,"+"0,0,0&");
                break;
                case 7:
                    ID_1=parseInt(ID_1, 10);
                    var ID_1_HEX=ID_1.toString(16);
                    var ID1_1=ID_1_HEX[0]+ID_1_HEX[1];
                    var ID1_1=parseInt(ID1_1, 16);
                    var ID1_2=ID_1_HEX[2]+ID_1_HEX[3];
                    var ID1_2=parseInt(ID1_2, 16);
                    var ID1_3=ID_1_HEX[4]+ID_1_HEX[5];
                    var ID1_3=parseInt(ID1_3, 16);
                    
                    ID_2=parseInt(ID_2, 10);
                    var ID_2_HEX=ID_2.toString(16);
                    var ID2_1=ID_2_HEX[0]+ID_2_HEX[1];
                    var ID2_1=parseInt(ID2_1, 16);
                    var ID2_2=ID_2_HEX[2]+ID_2_HEX[3];
                    var ID2_2=parseInt(ID2_2, 16);
                    var ID2_3=ID_2_HEX[4]+ID_2_HEX[5];
                    var ID2_3=parseInt(ID2_3, 16);

                    ID_3=parseInt(ID_3, 10);
                    var ID_3_HEX=ID_3.toString(16);
                    var ID3_1=ID_3_HEX[0]+ID_3_HEX[1];
                    var ID3_1=parseInt(ID3_1, 16);
                    var ID3_2=ID_3_HEX[2]+ID_3_HEX[3];
                    var ID3_2=parseInt(ID3_2, 16);
                    var ID3_3=ID_3_HEX[4]+ID_3_HEX[5];
                    var ID3_3=parseInt(ID3_3, 16);

                    ID_4=parseInt(ID_4, 10);
                    var ID_4_HEX=ID_4.toString(16);
                    var ID4_1=ID_4_HEX[0]+ID_4_HEX[1];
                    var ID4_1=parseInt(ID4_1, 16);
                    var ID4_2=ID_4_HEX[2]+ID_4_HEX[3];
                    var ID4_2=parseInt(ID4_2, 16);
                    var ID4_3=ID_4_HEX[4]+ID_4_HEX[5];
                    var ID4_3=parseInt(ID4_3, 16);

                    ID_5=parseInt(ID_5, 10);
                    var ID_5_HEX=ID_5.toString(16);
                    var ID5_1=ID_5_HEX[0]+ID_5_HEX[1];
                    var ID5_1=parseInt(ID5_1, 16);
                    var ID5_2=ID_5_HEX[2]+ID_5_HEX[3];
                    var ID5_2=parseInt(ID5_2, 16);
                    var ID5_3=ID_5_HEX[4]+ID_5_HEX[5];
                    var ID5_3=parseInt(ID5_3, 16);

                    ID_6=parseInt(ID_6, 10);
                    var ID_6_HEX=ID_6.toString(16);
                    var ID6_1=ID_6_HEX[0]+ID_6_HEX[1];
                    var ID6_1=parseInt(ID6_1, 16);
                    var ID6_2=ID_6_HEX[2]+ID_6_HEX[3];
                    var ID6_2=parseInt(ID6_2, 16);
                    var ID6_3=ID_6_HEX[4]+ID_6_HEX[5];
                    var ID6_3=parseInt(ID6_3, 16);

                    ID_7=parseInt(ID_7, 10);
                    var ID_7_HEX=ID_7.toString(16);
                    var ID7_1=ID_7_HEX[0]+ID_7_HEX[1];
                    var ID7_1=parseInt(ID7_1, 16);
                    var ID7_2=ID_7_HEX[2]+ID_7_HEX[3];
                    var ID7_2=parseInt(ID7_2, 16);
                    var ID7_3=ID_7_HEX[4]+ID_7_HEX[5];
                    var ID7_3=parseInt(ID7_3, 16);
                    sock.write("02="+170+","+187+","+ID1_1+","+ID1_2+","+ID1_3+","+ID2_1+","+ID2_2+","+ID2_3+","+ID3_1+","+ID3_2+","+ID3_3+","+ID4_1+","+ID4_2+","+ID4_3+","+ID5_1+","+ID5_2+","+ID5_3+","+ID6_1+","+ID6_2+","+ID6_3+","+ID7_1+","+ID7_2+","+ID7_3+","+"0,0,0&");
                break;
                case 8:
                    ID_1=parseInt(ID_1, 10);
                    var ID_1_HEX=ID_1.toString(16);
                    var ID1_1=ID_1_HEX[0]+ID_1_HEX[1];
                    var ID1_1=parseInt(ID1_1, 16);
                    var ID1_2=ID_1_HEX[2]+ID_1_HEX[3];
                    var ID1_2=parseInt(ID1_2, 16);
                    var ID1_3=ID_1_HEX[4]+ID_1_HEX[5];
                    var ID1_3=parseInt(ID1_3, 16);
                    
                    ID_2=parseInt(ID_2, 10);
                    var ID_2_HEX=ID_2.toString(16);
                    var ID2_1=ID_2_HEX[0]+ID_2_HEX[1];
                    var ID2_1=parseInt(ID2_1, 16);
                    var ID2_2=ID_2_HEX[2]+ID_2_HEX[3];
                    var ID2_2=parseInt(ID2_2, 16);
                    var ID2_3=ID_2_HEX[4]+ID_2_HEX[5];
                    var ID2_3=parseInt(ID2_3, 16);

                    ID_3=parseInt(ID_3, 10);
                    var ID_3_HEX=ID_3.toString(16);
                    var ID3_1=ID_3_HEX[0]+ID_3_HEX[1];
                    var ID3_1=parseInt(ID3_1, 16);
                    var ID3_2=ID_3_HEX[2]+ID_3_HEX[3];
                    var ID3_2=parseInt(ID3_2, 16);
                    var ID3_3=ID_3_HEX[4]+ID_3_HEX[5];
                    var ID3_3=parseInt(ID3_3, 16);

                    ID_4=parseInt(ID_4, 10);
                    var ID_4_HEX=ID_4.toString(16);
                    var ID4_1=ID_4_HEX[0]+ID_4_HEX[1];
                    var ID4_1=parseInt(ID4_1, 16);
                    var ID4_2=ID_4_HEX[2]+ID_4_HEX[3];
                    var ID4_2=parseInt(ID4_2, 16);
                    var ID4_3=ID_4_HEX[4]+ID_4_HEX[5];
                    var ID4_3=parseInt(ID4_3, 16);

                    ID_5=parseInt(ID_5, 10);
                    var ID_5_HEX=ID_5.toString(16);
                    var ID5_1=ID_5_HEX[0]+ID_5_HEX[1];
                    var ID5_1=parseInt(ID5_1, 16);
                    var ID5_2=ID_5_HEX[2]+ID_5_HEX[3];
                    var ID5_2=parseInt(ID5_2, 16);
                    var ID5_3=ID_5_HEX[4]+ID_5_HEX[5];
                    var ID5_3=parseInt(ID5_3, 16);

                    ID_6=parseInt(ID_6, 10);
                    var ID_6_HEX=ID_6.toString(16);
                    var ID6_1=ID_6_HEX[0]+ID_6_HEX[1];
                    var ID6_1=parseInt(ID6_1, 16);
                    var ID6_2=ID_6_HEX[2]+ID_6_HEX[3];
                    var ID6_2=parseInt(ID6_2, 16);
                    var ID6_3=ID_6_HEX[4]+ID_6_HEX[5];
                    var ID6_3=parseInt(ID6_3, 16);

                    ID_7=parseInt(ID_7, 10);
                    var ID_7_HEX=ID_7.toString(16);
                    var ID7_1=ID_7_HEX[0]+ID_7_HEX[1];
                    var ID7_1=parseInt(ID7_1, 16);
                    var ID7_2=ID_7_HEX[2]+ID_7_HEX[3];
                    var ID7_2=parseInt(ID7_2, 16);
                    var ID7_3=ID_7_HEX[4]+ID_7_HEX[5];
                    var ID7_3=parseInt(ID7_3, 16);

                    ID_8=parseInt(ID_8, 10);
                    var ID_8_HEX=ID_8.toString(16);
                    var ID8_1=ID_8_HEX[0]+ID_8_HEX[1];
                    var ID8_1=parseInt(ID8_1, 16);
                    var ID8_2=ID_8_HEX[2]+ID_8_HEX[3];
                    var ID8_2=parseInt(ID8_2, 16);
                    var ID8_3=ID_8_HEX[4]+ID_8_HEX[5];
                    var ID8_3=parseInt(ID8_3, 16);
                    sock.write("02="+170+","+187+","+ID1_1+","+ID1_2+","+ID1_3+","+ID2_1+","+ID2_2+","+ID2_3+","+ID3_1+","+ID3_2+","+ID3_3+","+ID4_1+","+ID4_2+","+ID4_3+","+ID5_1+","+ID5_2+","+ID5_3+","+ID6_1+","+ID6_2+","+ID6_3+","+ID7_1+","+ID7_2+","+ID7_3+","+ID8_1+","+ID8_2+","+ID8_3+"&");
                break;
            }

        }
        // collector internete ağlı iken tap da tek bir butona basıldı mesajı
        // örnek mesajlar:
        //      03=868324020153933/26/27/153/1/3&
        //      03=868324020153933/26/27/153/2/3&
        //      03=868324020153933/26/27/153/3/3&
        //      03=868324020153933/26/27/153/4/3&
        // collector internete ağlı iken tap PING atıyor mesajı
        //      03=868324020153933/26/27/153/0/3&

        else if(data[0]=='0' && data[1]=='3' && data[2]=='61' && data[18]=='47' )
        {
            
            for (i=3;i<18;i++)
            {
                if(data[i]=='48')
                {
                    data[i]='0';
                }
                else if(data[i]=='49')
                {
                    data[i]='1';
                }
                else if(data[i]=='50')
                {
                    data[i]='2';
                }
                else if(data[i]=='51')
                {
                    data[i]='3';
                }
                else if(data[i]=='52')
                {
                    data[i]='4';
                }
                else if(data[i]=='53')
                {
                    data[i]='5';
                }
                else if(data[i]=='54')
                {
                    data[i]='6';
                }
                else if(data[i]=='55')
                {
                    data[i]='7';
                }
                else if(data[i]=='56')
                {
                    data[i]='8';
                }
                else if(data[i]=='57')
                {
                    data[i]='9';
                }
            }
            imei="";
            imei=100000000000000*data[3]+10000000000000*data[4]+1000000000000*data[5];
            imei=imei+100000000000*data[6]+10000000000*data[7]+1000000000*data[8];
            imei=imei+100000000*data[9]+ 10000000*data[10]+1000000*data[11];
            imei=imei+100000*data[12]+10000*data[13]+1000*data[14];
            imei=imei+100*data[15]+10*data[16]+data[17];
            console.log('imei= ' + imei);
            update_collectorCommunicationSettings();
            update_collectorCommunicationSettings();

            TapID_1=0;
            TapID_2=0;
            TapID_3=0;
            ButtonID=0;
            GMT=0;

            if(data[21]=='47' && data[24]=='47' && data[27]=='47' && data[29]=='47' && data[31]=='38')
            {
                for (i=19;i<31;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=10*data[19]+data[20];
                TapID_2=10*data[22]+data[23];
                TapID_3=10*data[25]+data[26];
                ButtonID=data[28];
                GMT=data[30];
            }
            else if(data[21]=='47' && data[24]=='47' && data[28]=='47' && data[30]=='47' && data[32]=='38')
            {
                for (i=19;i<32;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=10*data[19]+data[20];
                TapID_2=10*data[22]+data[23];
                TapID_3=100*data[25]+10*data[26]+data[27];
                ButtonID=data[29];
                GMT=data[31];
            }
            else if(data[21]=='47' && data[25]=='47' && data[28]=='47' && data[30]=='47' && data[32]=='38')
            {
                for (i=19;i<32;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=10*data[19]+data[20];
                TapID_2=100*data[22]+10*data[23]+data[24];
                TapID_3=10*data[26]+data[27];
                ButtonID=data[29];
                GMT=data[31];
            }
            else if(data[22]=='47' && data[25]=='47' && data[28]=='47' && data[30]=='47' && data[32]=='38')
            {
                for (i=19;i<32;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=100*data[19]+10*data[20]+data[21];
                TapID_2=10*data[23]+data[24];
                TapID_3=10*data[26]+data[27];
                ButtonID=data[29];
                GMT=data[31];
            }
            else if(data[22]=='47' && data[26]=='47' && data[29]=='47' && data[31]=='47' && data[33]=='38')
            {
                for (i=19;i<33;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=100*data[19]+10*data[20]+data[21];
                TapID_2=100*data[23]+10*data[24]+data[25];
                TapID_3=10*data[27]+data[28];
                ButtonID=data[30];
                GMT=data[32];
            }
            else if(data[22]=='47' && data[25]=='47' && data[29]=='47' && data[31]=='47' && data[33]=='38')
            {
                for (i=19;i<33;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=100*data[19]+10*data[20]+data[21];
                TapID_2=10*data[23]+data[24];
                TapID_3=100*data[26]+10*data[27]+data[28];
                ButtonID=data[30];
                GMT=data[32];
            }
            else if(data[21]=='47' && data[25]=='47' && data[29]=='47' && data[31]=='47' && data[33]=='38')
            {
                for (i=19;i<33;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=10*data[19]+data[20];
                TapID_2=100*data[22]+10*data[23]+data[24];
                TapID_3=100*data[26]+10*data[27]+data[28];
                ButtonID=data[30];
                GMT=data[32];
            }
            else if(data[22]=='47' && data[26]=='47' && data[30]=='47' && data[32]=='47' && data[34]=='38')
            {
                for (i=19;i<34;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=100*data[19]+10*data[20]+data[21];
                TapID_2=100*data[23]+10*data[24]+data[25];
                TapID_3=100*data[27]+10*data[28]+data[29];
                ButtonID=data[31];
                GMT=data[33];
            }

            
            else if(data[21]=='47' && data[24]=='47' && data[27]=='47' && data[29]=='47' && data[32]=='38')
            {
                for (i=19;i<32;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=10*data[19]+data[20];
                TapID_2=10*data[22]+data[23];
                TapID_3=10*data[25]+data[26];
                ButtonID=data[28];
                GMT=10*data[30]+data[31];
            }
            else if(data[21]=='47' && data[24]=='47' && data[28]=='47' && data[30]=='47' && data[33]=='38')
            {
                for (i=19;i<33;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=10*data[19]+data[20];
                TapID_2=10*data[22]+data[23];
                TapID_3=100*data[25]+10*data[26]+data[27];
                ButtonID=data[29];
                GMT=10*data[31]+data[32];
            }
            else if(data[21]=='47' && data[25]=='47' && data[28]=='47' && data[30]=='47' && data[33]=='38')
            {
                for (i=19;i<33;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=10*data[19]+data[20];
                TapID_2=100*data[22]+10*data[23]+data[24];
                TapID_3=10*data[26]+data[27];
                ButtonID=data[29];
                GMT=10*data[31]+data[32];
            }
            else if(data[22]=='47' && data[25]=='47' && data[28]=='47' && data[30]=='47' && data[33]=='38')
            {
                for (i=19;i<33;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=100*data[19]+10*data[20]+data[21];
                TapID_2=10*data[23]+data[24];
                TapID_3=10*data[26]+data[27];
                ButtonID=data[29];
                GMT=10*data[31]+data[32];
            }
            else if(data[22]=='47' && data[26]=='47' && data[29]=='47' && data[31]=='47' && data[34]=='38')
            {
                for (i=19;i<34;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=100*data[19]+10*data[20]+data[21];
                TapID_2=100*data[23]+10*data[24]+data[25];
                TapID_3=10*data[27]+data[28];
                ButtonID=data[30];
                GMT=10*data[32]+data[33];
            }
            else if(data[22]=='47' && data[25]=='47' && data[29]=='47' && data[31]=='47' && data[34]=='38')
            {
                for (i=19;i<34;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=100*data[19]+10*data[20]+data[21];
                TapID_2=10*data[23]+data[24];
                TapID_3=100*data[26]+10*data[27]+data[28];
                ButtonID=data[30];
                GMT=10*data[32]+data[33];
            }
            else if(data[21]=='47' && data[25]=='47' && data[29]=='47' && data[31]=='47' && data[34]=='38')
            {
                for (i=19;i<34;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=10*data[19]+data[20];
                TapID_2=100*data[22]+10*data[23]+data[24];
                TapID_3=100*data[26]+10*data[27]+data[28];
                ButtonID=data[30];
                GMT=10*data[32]+data[33];
            }
            else if(data[22]=='47' && data[26]=='47' && data[30]=='47' && data[32]=='47' && data[35]=='38')
            {
                for (i=19;i<35;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=100*data[19]+10*data[20]+data[21];
                TapID_2=100*data[23]+10*data[24]+data[25];
                TapID_3=100*data[27]+10*data[28]+data[29];
                ButtonID=data[31];
                GMT=10*data[33]+data[34];
            }
            var HexTapID_1=TapID_1.toString(16);
            var HexTapID_2=TapID_2.toString(16);
            var HexTapID_3=TapID_3.toString(16);    
            var HexTapID_=HexTapID_1+","+HexTapID_2+","+HexTapID_3;
            var HexTapID=HexTapID_1+HexTapID_2+HexTapID_3;
            var TapHexID=parseInt(HexTapID, 16);
            date_=getDateTime_();
            console.log('TapHexID: ' + TapHexID + ' ButtonID: ' + ButtonID +" date="+date_);
            if(ButtonID!=0)
            {
                con.query("SELECT * FROM  collectorCommunicationSettings WHERE ID1 = '"+TapHexID+"'AND ButtonID='"+ButtonID+"'", function (err, result_, fields) {
                    if (err) throw err;
                    for (var HoldingID in result_)
                    {
                        console.log("for loopda");
                        var string=JSON.stringify(result_);
                        var json =  JSON.parse(string);
                        HoldingID=json[0].HoldingID;
                        CompanyID=json[0].CompanyID;
                        BarGroupID=json[0].BarGroupID;
                        tapId=json[0].tapID;
                        TapName=json[0].TapName;
                        AlcoholGroupID=json[0].AlcoholGroupID;
                        AlcoholTypeID=json[0].AlcoholTypeID;
                        AlcoholBrandID=json[0].AlcoholBrandID;
                        ButtonID=json[0].ButtonID;
                        buttonName=json[0].ButtonName;
                        buttonClReal=json[0].ButtonClReal;
                        buttonClShown=json[0].ButtonClShown;
                        NetPrice=json[0].NetPrice;
                        SalePrice=json[0].SalePrice;
                        console.log("HoldingID"+HoldingID);
                        console.log("CompanyID"+CompanyID);
                        console.log("BarGroupID"+BarGroupID);
                        console.log("tapId"+tapId);
                        console.log("TapName"+TapName);
                        
                        HoldingID=JSON.stringify(HoldingID);
                        HoldingID=JSON.parse(HoldingID);
                        CompanyID=JSON.stringify(CompanyID);
                        CompanyID=JSON.parse(CompanyID);
                        BarGroupID=JSON.stringify(BarGroupID);
                        BarGroupID=JSON.parse(BarGroupID);
                        tapId=JSON.stringify(tapId);
                        tapId=JSON.parse(tapId);
                        TapName=JSON.stringify(TapName);
                        TapName=JSON.parse(TapName);
                        AlcoholGroupID=JSON.stringify(AlcoholGroupID);
                        AlcoholGroupID=JSON.parse(AlcoholGroupID);
                        AlcoholTypeID=JSON.stringify(AlcoholTypeID);
                        AlcoholTypeID=JSON.parse(AlcoholTypeID);
                        AlcoholBrandID=JSON.stringify(AlcoholBrandID);
                        AlcoholBrandID=JSON.parse(AlcoholBrandID);
                        ButtonID=JSON.stringify(ButtonID);
                        ButtonID=JSON.parse(ButtonID);
                        buttonName=JSON.stringify(buttonName);
                        buttonName=JSON.parse(buttonName);
                        buttonClReal=JSON.stringify(buttonClReal);
                        buttonClReal=JSON.parse(buttonClReal);
                        buttonClShown=JSON.stringify(buttonClShown);
                        buttonClShown=JSON.parse(buttonClShown);
                        NetPrice=JSON.stringify(json[0].NetPrice);
                        NetPrice=JSON.parse(NetPrice);
                        SalePrice=JSON.stringify(json[0].SalePrice);
                        SalePrice=JSON.parse(SalePrice);
                        NetPrice=NetPrice.toString();
                        SalePrice=SalePrice.toString();
                        buttonClReal=buttonClReal.toString();
                        buttonClShown=buttonClShown.toString();
                        NetPrice=NetPrice.replace(",",".");
                        SalePrice=SalePrice.replace(",",".");
                        buttonClReal=buttonClReal.replace(",",".");
                        buttonClShown=buttonClShown.replace(",",".");

                        con.query("INSERT INTO tapData (TapDataID,HoldingID,CompanyID,BarGroupID,TapID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,Date) VALUES ('','"+HoldingID+"','"+CompanyID+"','"+BarGroupID+"','"+tapId+"','"+TapName+"','"+AlcoholGroupID+"','"+AlcoholTypeID+"','"+AlcoholBrandID+"','"+ButtonID+"','"+buttonName+"','"+buttonClReal+"','"+buttonClShown+"','"+NetPrice+"','"+SalePrice+"','"+date_+"')", function (err_, result, fields) {
                            if (err_) throw err_;});
                            
                    }    
                });
            }
            con.query("UPDATE collectorCommunicationSettings SET TapStatusID = 1 , tapHexID='"+HexTapID_+"',Date_ = '"+date_+"' WHERE ID1 = '"+TapHexID+"'", function (err, result, fields) {if (err) throw err;});
            
            con.query("UPDATE tap SET TapStatusID = 1 WHERE ID1 = '"+TapHexID+"'", function (err, result, fields) {
                if (err) throw err;});

            date_=getDateTime_();
            con.query("UPDATE collectorList SET last_data_datetime = '"+date_ + "', collectorStatusID= '"+ 1 +"' WHERE imei = '"+imei+"'", function (err, result, fields) {
                if (err) throw err;});
            con.query("UPDATE collectorCommunicationSettings SET ip = '"+sock.remoteAddress + "' WHERE imei = '"+imei+"'", function (err, result, fields) {
                if (err) throw err;});
        }
        // collector internete ağlı değil iken tap da  tek bir  butona basıldı mesajı
        // örnek mesajlar:
        //      04=868324020153933/26/27/153/1/3/YMD/H/MS&
        
        else if(data[0]=='0' && data[1]=='4' && data[2]=='61' && data[18]=='47' )
        {
            
            for (i=3;i<18;i++)
            {
                if(data[i]=='48')
                {
                    data[i]='0';
                }
                else if(data[i]=='49')
                {
                    data[i]='1';
                }
                else if(data[i]=='50')
                {
                    data[i]='2';
                }
                else if(data[i]=='51')
                {
                    data[i]='3';
                }
                else if(data[i]=='52')
                {
                    data[i]='4';
                }
                else if(data[i]=='53')
                {
                    data[i]='5';
                }
                else if(data[i]=='54')
                {
                    data[i]='6';
                }
                else if(data[i]=='55')
                {
                    data[i]='7';
                }
                else if(data[i]=='56')
                {
                    data[i]='8';
                }
                else if(data[i]=='57')
                {
                    data[i]='9';
                }
            }
            imei="";
            imei=100000000000000*data[3]+10000000000000*data[4]+1000000000000*data[5];
            imei=imei+100000000000*data[6]+10000000000*data[7]+1000000000*data[8];
            imei=imei+100000000*data[9]+ 10000000*data[10]+1000000*data[11];
            imei=imei+100000*data[12]+10000*data[13]+1000*data[14];
            imei=imei+100*data[15]+10*data[16]+data[17];
            console.log('imei= ' + imei);
            update_collectorCommunicationSettings();
            update_collectorCommunicationSettings();
            TapID_1=0;
            TapID_2=0;
            TapID_3=0;
            ButtonID=0;
            GMT=0;
            if(data[21]=='47' && data[24]=='47' && data[27]=='47' && data[29]=='47' && data[31]=='47')
            {
                for (i=19;i<31;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=10*data[19]+data[20];
                TapID_2=10*data[22]+data[23];
                TapID_3=10*data[25]+data[26];
                ButtonID=data[28];
                GMT=data[30];
            }
            else if(data[21]=='47' && data[24]=='47' && data[28]=='47' && data[30]=='47' && data[32]=='47')
            {
                for (i=19;i<32;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=10*data[19]+data[20];
                TapID_2=10*data[22]+data[23];
                TapID_3=100*data[25]+10*data[26]+data[27];
                ButtonID=data[29];
                GMT=data[31];
            }
            else if(data[21]=='47' && data[25]=='47' && data[28]=='47' && data[30]=='47' && data[32]=='47')
            {
                for (i=19;i<32;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=10*data[19]+data[20];
                TapID_2=100*data[22]+10*data[23]+data[24];
                TapID_3=10*data[26]+data[27];
                ButtonID=data[29];
                GMT=data[31];
            }
            else if(data[22]=='47' && data[25]=='47' && data[28]=='47' && data[30]=='47' && data[32]=='47')
            {
                for (i=19;i<32;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=100*data[19]+10*data[20]+data[21];
                TapID_2=10*data[23]+data[24];
                TapID_3=10*data[26]+data[27];
                ButtonID=data[29];
                GMT=data[31];
            }
            else if(data[22]=='47' && data[26]=='47' && data[29]=='47' && data[31]=='47' && data[33]=='47')
            {
                for (i=19;i<33;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=100*data[19]+10*data[20]+data[21];
                TapID_2=100*data[23]+10*data[24]+data[25];
                TapID_3=10*data[27]+data[28];
                ButtonID=data[30];
                GMT=data[32];
            }
            else if(data[22]=='47' && data[25]=='47' && data[29]=='47' && data[31]=='47' && data[33]=='47')
            {
                for (i=19;i<33;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=100*data[19]+10*data[20]+data[21];
                TapID_2=10*data[23]+data[24];
                TapID_3=100*data[26]+10*data[27]+data[28];
                ButtonID=data[30];
                GMT=data[32];
            }
            else if(data[21]=='47' && data[25]=='47' && data[29]=='47' && data[31]=='47' && data[33]=='47')
            {
                for (i=19;i<33;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=10*data[19]+data[20];
                TapID_2=100*data[22]+10*data[23]+data[24];
                TapID_3=100*data[26]+10*data[27]+data[28];
                ButtonID=data[30];
                GMT=data[32];
            }
            else if(data[22]=='47' && data[26]=='47' && data[30]=='47' && data[32]=='47' && data[34]=='47')
            {
                for (i=19;i<34;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=100*data[19]+10*data[20]+data[21];
                TapID_2=100*data[23]+10*data[24]+data[25];
                TapID_3=100*data[27]+10*data[28]+data[29];
                ButtonID=data[31];
                GMT=data[33];
            }

            else if(data[21]=='47' && data[24]=='47' && data[27]=='47' && data[29]=='47' && data[32]=='47')
            {
                for (i=19;i<32;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=10*data[19]+data[20];
                TapID_2=10*data[22]+data[23];
                TapID_3=10*data[25]+data[26];
                ButtonID=data[28];
                GMT=10*data[30]+data[31];
            }
            else if(data[21]=='47' && data[24]=='47' && data[28]=='47' && data[30]=='47' && data[33]=='47')
            {
                for (i=19;i<33;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=10*data[19]+data[20];
                TapID_2=10*data[22]+data[23];
                TapID_3=100*data[25]+10*data[26]+data[27];
                ButtonID=data[29];
                GMT=10*data[31]+data[32];
            }
            else if(data[21]=='47' && data[25]=='47' && data[28]=='47' && data[30]=='47' && data[33]=='47')
            {
                for (i=19;i<33;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=10*data[19]+data[20];
                TapID_2=100*data[22]+10*data[23]+data[24];
                TapID_3=10*data[26]+data[27];
                ButtonID=data[29];
                GMT=10*data[31]+data[32];
            }
            else if(data[22]=='47' && data[25]=='47' && data[28]=='47' && data[30]=='47' && data[33]=='47')
            {
                for (i=19;i<33;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=100*data[19]+10*data[20]+data[21];
                TapID_2=10*data[23]+data[24];
                TapID_3=10*data[26]+data[27];
                ButtonID=data[29];
                GMT=10*data[31]+data[32];
            }
            else if(data[22]=='47' && data[26]=='47' && data[29]=='47' && data[31]=='47' && data[34]=='47')
            {
                for (i=19;i<34;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=100*data[19]+10*data[20]+data[21];
                TapID_2=100*data[23]+10*data[24]+data[25];
                TapID_3=10*data[27]+data[28];
                ButtonID=data[30];
                GMT=10*data[32]+data[33];
            }
            else if(data[22]=='47' && data[25]=='47' && data[29]=='47' && data[31]=='47' && data[34]=='47')
            {
                for (i=19;i<34;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=100*data[19]+10*data[20]+data[21];
                TapID_2=10*data[23]+data[24];
                TapID_3=100*data[26]+10*data[27]+data[28];
                ButtonID=data[30];
                GMT=10*data[32]+data[33];
            }
            else if(data[21]=='47' && data[25]=='47' && data[29]=='47' && data[31]=='47' && data[34]=='47')
            {
                for (i=19;i<34;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=10*data[19]+data[20];
                TapID_2=100*data[22]+10*data[23]+data[24];
                TapID_3=100*data[26]+10*data[27]+data[28];
                ButtonID=data[30];
                GMT=10*data[32]+data[33];
            }
            else if(data[22]=='47' && data[26]=='47' && data[30]=='47' && data[32]=='47' && data[35]=='47')
            {
                for (i=19;i<35;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                TapID_1=100*data[19]+10*data[20]+data[21];
                TapID_2=100*data[23]+10*data[24]+data[25];
                TapID_3=100*data[27]+10*data[28]+data[29];
                ButtonID=data[31];
                GMT=10*data[33]+data[34];
            }

            if(data[31]=='47' && data[42]=='47' & data[51]=='38' )
            {

                for (i=31;i<51;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                YMD=data[32]+data[33]+data[34]+data[35]+"-"+data[37]+data[38]+"-"+data[40]+data[41];
                hour=data[43]*10+data[44];
                hour=hour+GMT-3;
                hour = (hour < 10 ? "0" : "") + hour;
                MS=":"+data[46]+data[47]+":"+data[49]+data[50];
                date_=YMD+" "+hour+MS;
            }
            else if(data[32]=='47' && data[43]=='47' & data[52]=='38' )
            {

                for (i=31;i<52;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                
                YMD=data[33]+data[34]+data[35]+data[36]+"-"+data[38]+data[39]+"-"+data[41]+data[42];
                hour=data[44]*10+data[45];
                hour=hour+GMT-3;
                hour = (hour < 10 ? "0" : "") + hour;
                MS=":"+data[47]+data[48]+":"+data[50]+data[51];
                date_=YMD+" "+hour+MS;
            }
            else if(data[33]=='47' && data[44]=='47' & data[53]=='38' )
            {

                for (i=31;i<53;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                
                YMD=data[34]+data[35]+data[36]+data[37]+"-"+data[39]+data[40]+"-"+data[42]+data[43];
                hour=data[45]*10+data[46];
                hour=hour+GMT-3;
                hour = (hour < 10 ? "0" : "") + hour;
                MS=":"+data[48]+data[49]+":"+data[51]+data[52];
                date_=YMD+" "+hour+MS;
            }
            else if(data[34]=='47' && data[45]=='47' & data[54]=='38' )
            {

                for (i=31;i<54;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                YMD=data[35]+data[36]+data[37]+data[38]+"-"+data[40]+data[41]+"-"+data[43]+data[44];
                hour=data[46]*10+data[47];
                hour=hour+GMT-3;
                hour = (hour < 10 ? "0" : "") + hour;
                MS=":"+data[49]+data[50]+":"+data[52]+data[53];
                date_=YMD+" "+hour+MS;
            }
            else if(data[35]=='47' && data[46]=='47' & data[55]=='38' )
            {
                for (i=31;i<55;i++)
                {
                    if(data[i]=='48')
                    {
                        data[i]='0';
                    }
                    else if(data[i]=='49')
                    {
                        data[i]='1';
                    }
                    else if(data[i]=='50')
                    {
                        data[i]='2';
                    }
                    else if(data[i]=='51')
                    {
                        data[i]='3';
                    }
                    else if(data[i]=='52')
                    {
                        data[i]='4';
                    }
                    else if(data[i]=='53')
                    {
                        data[i]='5';
                    }
                    else if(data[i]=='54')
                    {
                        data[i]='6';
                    }
                    else if(data[i]=='55')
                    {
                        data[i]='7';
                    }
                    else if(data[i]=='56')
                    {
                        data[i]='8';
                    }
                    else if(data[i]=='57')
                    {
                        data[i]='9';
                    }
                }
                YMD=data[36]+data[37]+data[38]+data[39]+"-"+data[41]+data[42]+"-"+data[44]+data[45];
                hour=data[47]*10+data[48];
                hour=hour+GMT-3;
                hour = (hour < 10 ? "0" : "") + hour;
                MS=":"+data[50]+data[51]+":"+data[53]+data[54];
                date_=YMD+" "+hour+MS;

            }
            
            var HexTapID_1=TapID_1.toString(16);
            var HexTapID_2=TapID_2.toString(16);
            var HexTapID_3=TapID_3.toString(16);    
            var HexTapID_=HexTapID_1+","+HexTapID_2+","+HexTapID_3;
            var HexTapID=HexTapID_1+HexTapID_2+HexTapID_3;
            var TapHexID=parseInt(HexTapID, 16);

            


            console.log('TapHexID: ' + TapHexID + ' ButtonID: ' + ButtonID +" date="+date_);
            if(ButtonID!=0)
            {
                con.query("SELECT * FROM  collectorCommunicationSettings WHERE ID1 = '"+TapHexID+"'AND ButtonID='"+ButtonID+"'", function (err, result_, fields) {
                    if (err) throw err;
                    for (var HoldingID in result_)
                    {
                        var string=JSON.stringify(result_);
                        var json =  JSON.parse(string);
                        HoldingID=json[0].HoldingID;
                        CompanyID=json[0].CompanyID;
                        BarGroupID=json[0].BarGroupID;
                        tapId=json[0].tapID;
                        TapName=json[0].TapName;
                        AlcoholGroupID=json[0].AlcoholGroupID;
                        AlcoholTypeID=json[0].AlcoholTypeID;
                        AlcoholBrandID=json[0].AlcoholBrandID;
                        ButtonID=json[0].ButtonID;
                        buttonName=json[0].ButtonName;
                        buttonClReal=json[0].ButtonClReal;
                        buttonClShown=json[0].ButtonClShown;
                        NetPrice=json[0].NetPrice;
                        SalePrice=json[0].SalePrice;
                        
                        HoldingID=JSON.stringify(HoldingID);
                        HoldingID=JSON.parse(HoldingID);
                        CompanyID=JSON.stringify(CompanyID);
                        CompanyID=JSON.parse(CompanyID);
                        BarGroupID=JSON.stringify(BarGroupID);
                        BarGroupID=JSON.parse(BarGroupID);
                        tapId=JSON.stringify(tapId);
                        tapId=JSON.parse(tapId);
                        TapName=JSON.stringify(TapName);
                        TapName=JSON.parse(TapName);
                        AlcoholGroupID=JSON.stringify(AlcoholGroupID);
                        AlcoholGroupID=JSON.parse(AlcoholGroupID);
                        AlcoholTypeID=JSON.stringify(AlcoholTypeID);
                        AlcoholTypeID=JSON.parse(AlcoholTypeID);
                        AlcoholBrandID=JSON.stringify(AlcoholBrandID);
                        AlcoholBrandID=JSON.parse(AlcoholBrandID);
                        ButtonID=JSON.stringify(ButtonID);
                        ButtonID=JSON.parse(ButtonID);
                        buttonName=JSON.stringify(buttonName);
                        buttonName=JSON.parse(buttonName);
                        buttonClReal=JSON.stringify(buttonClReal);
                        buttonClReal=JSON.parse(buttonClReal);
                        buttonClShown=JSON.stringify(buttonClShown);
                        buttonClShown=JSON.parse(buttonClShown);
                        NetPrice=JSON.stringify(json[0].NetPrice);
                        NetPrice=JSON.parse(NetPrice);
                        SalePrice=JSON.stringify(json[0].SalePrice);
                        SalePrice=JSON.parse(SalePrice);
                        NetPrice=NetPrice.toString();
                        SalePrice=SalePrice.toString();
                        buttonClReal=buttonClReal.toString();
                        buttonClShown=buttonClShown.toString();
                        NetPrice=NetPrice.replace(",",".");
                        SalePrice=SalePrice.replace(",",".");
                        buttonClReal=buttonClReal.replace(",",".");
                        buttonClShown=buttonClShown.replace(",",".");

                        con.query("INSERT INTO tapData (TapDataID,HoldingID,CompanyID,BarGroupID,TapID,TapName,AlcoholGroupID,AlcoholTypeID,AlcoholBrandID,ButtonID,ButtonName,ButtonClReal,ButtonClShown,NetPrice,SalePrice,Date) VALUES ('','"+HoldingID+"','"+CompanyID+"','"+BarGroupID+"','"+tapId+"','"+TapName+"','"+AlcoholGroupID+"','"+AlcoholTypeID+"','"+AlcoholBrandID+"','"+ButtonID+"','"+buttonName+"','"+buttonClReal+"','"+buttonClShown+"','"+NetPrice+"','"+SalePrice+"','"+date_+"')", function (err_, result, fields) {
                            if (err_) throw err_;});
                            
                    }    
                });
            }
            con.query("UPDATE collectorCommunicationSettings SET TapStatusID = 1 , tapHexID='"+HexTapID_+"',Date_ = '"+date_+"' WHERE ID1 = '"+TapHexID+"'", function (err, result, fields) {if (err) throw err;});
            
            con.query("UPDATE tap SET TapStatusID = 1 WHERE ID1 = '"+TapHexID+"'", function (err, result, fields) {
                if (err) throw err;});

            date_=getDateTime_();
            con.query("UPDATE collectorList SET last_data_datetime = '"+date_ + "', collectorStatusID= '"+ 1 +"' WHERE imei = '"+imei+"'", function (err, result, fields) {
                if (err) throw err;});
            con.query("UPDATE collectorCommunicationSettings SET ip = '"+sock.remoteAddress + "' WHERE imei = '"+imei+"'", function (err, result, fields) {
                if (err) throw err;});
        }
        // tap daki alcohol brand name geri döndürür
        else if(data[0]=='0' && data[1]=='5' && data[2]=='61' && data[18]=='47' && data[20]=='47'  && data[22]=='38' )
        {
            
            for (i=3;i<22;i++)
            {
                if(data[i]=='48')
                {
                    data[i]='0';
                }
                else if(data[i]=='49')
                {
                    data[i]='1';
                }
                else if(data[i]=='50')
                {
                    data[i]='2';
                }
                else if(data[i]=='51')
                {
                    data[i]='3';
                }
                else if(data[i]=='52')
                {
                    data[i]='4';
                }
                else if(data[i]=='53')
                {
                    data[i]='5';
                }
                else if(data[i]=='54')
                {
                    data[i]='6';
                }
                else if(data[i]=='55')
                {
                    data[i]='7';
                }
                else if(data[i]=='56')
                {
                    data[i]='8';
                }
                else if(data[i]=='57')
                {
                    data[i]='9';
                }
            }
            imei="";
            var j=0;
            imei=100000000000000*data[3]+10000000000000*data[4]+1000000000000*data[5];
            imei=imei+100000000000*data[6]+10000000000*data[7]+1000000000*data[8];
            imei=imei+100000000*data[9]+ 10000000*data[10]+1000000*data[11];
            imei=imei+100000*data[12]+10000*data[13]+1000*data[14];
            imei=imei+100*data[15]+10*data[16]+data[17];
            
            GMT=data[19];
            date_=getDateTime_();

            console.log('collector PING = ' + imei);
            update_collectorCommunicationSettings();
            update_collectorCommunicationSettings();
            console.log('numOfTaps = ' + numOfTaps);

            con.query("UPDATE collectorList SET last_data_datetime = '"+date_ + "', collectorStatusID= '"+ 1 +"' WHERE imei = '"+imei+"'", function (err, result, fields) {
                if (err) throw err;});
            con.query("UPDATE collectorCommunicationSettings SET ip = '"+sock.remoteAddress + "' WHERE imei = '"+imei+"'", function (err, result, fields) {
                if (err) throw err;});
                
            if(data[21]==1 && numOfTaps>0)
            {
                var AlcoholTypeName1lenght=0;
                var AlcoholTypeName1ascii="";
                var AlcoholTypeName1_= JSON.stringify(AlcoholTypeName1);
                AlcoholTypeName1 =  JSON.parse(AlcoholTypeName1_);
                
                for(i=0;i<30;i++)
                {
                    if(AlcoholTypeName1[i]!=undefined)
                    {
                        AlcoholTypeName1lenght++;
                    }
                }
                
                AlcoholTypeName_char_1=0;
                AlcoholTypeName_char_2=0;
                AlcoholTypeName_char_3=0;
                AlcoholTypeName_char_4=0;
                AlcoholTypeName_char_5=0;
                AlcoholTypeName_char_6=0;
                AlcoholTypeName_char_7=0;
                AlcoholTypeName_char_8=0;
                AlcoholTypeName_char_9=0;
                AlcoholTypeName_char_10=0;
                AlcoholTypeName_char_11=0;
                AlcoholTypeName_char_12=0;
                AlcoholTypeName_char_13=0;
                AlcoholTypeName_char_14=0;
                AlcoholTypeName_char_15=0;
                AlcoholTypeName_char_16=0;
                AlcoholTypeName_char_17=0;
                AlcoholTypeName_char_18=0;
                AlcoholTypeName_char_19=0;
                AlcoholTypeName_char_20=0;
                AlcoholTypeName_char_21=0;
                AlcoholTypeName_char_22=0;
                AlcoholTypeName_char_23=0;
                AlcoholTypeName_char_24=0;

                for(i=0;i<AlcoholTypeName1lenght;i++)
                {
                    console.log("AlcoholTypeName1lenght"+AlcoholTypeName1lenght+"i="+i+" "+ AlcoholTypeName1[i]);
                    switch(i)
                    {
                        case 0:
                            AlcoholTypeName_char_1=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 1:
                            AlcoholTypeName_char_2=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 2:
                            AlcoholTypeName_char_3=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 3:
                            AlcoholTypeName_char_4=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 4:
                            AlcoholTypeName_char_5=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 5:
                            AlcoholTypeName_char_6=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 6:
                            AlcoholTypeName_char_7=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 7:
                            AlcoholTypeName_char_8=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 8:
                            AlcoholTypeName_char_9=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 9:
                            AlcoholTypeName_char_10=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 10:
                            AlcoholTypeName_char_11=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 11:
                            AlcoholTypeName_char_12=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 12:
                            AlcoholTypeName_char_13=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 13:
                            AlcoholTypeName_char_14=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 14:
                            AlcoholTypeName_char_15=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 15:
                            AlcoholTypeName_char_16=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 16:
                            AlcoholTypeName_char_17=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 17:
                            AlcoholTypeName_char_18=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 18:
                            AlcoholTypeName_char_19=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 19:
                            AlcoholTypeName_char_20=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 20:
                            AlcoholTypeName_char_21=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 21:
                            AlcoholTypeName_char_22=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 22:
                            AlcoholTypeName_char_23=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                        case 23:
                            AlcoholTypeName_char_24=AlcoholTypeName1[i].charCodeAt(0);
                        break;
                    }
                }
                ID_1=parseInt(ID_1, 10);
                var ID_1_HEX=ID_1.toString(16);
                var ID1_1=ID_1_HEX[0]+ID_1_HEX[1];
                var ID1_1=parseInt(ID1_1, 16);
                var ID1_2=ID_1_HEX[2]+ID_1_HEX[3];
                var ID1_2=parseInt(ID1_2, 16);
                var ID1_3=ID_1_HEX[4]+ID_1_HEX[5];
                var ID1_3=parseInt(ID1_3, 16);
                var DataLength=AlcoholTypeName1lenght+8;
                
                switch(AlcoholTypeName1lenght)
                {
                    case 1:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+checksum+",&");
                    break;
                    case 2:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+checksum+",&");
                    break;
                    case 3:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+checksum+",&");
                    break;
                    case 4:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+checksum+",&");
                    break;
                    case 5:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+checksum+",&");
                    break;
                    case 6:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+checksum+",&");
                    break;
                    case 7:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+checksum+",&");
                    break;
                    case 8:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+checksum+",&");
                    break;
                    case 9:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+checksum+",&");
                    break;
                    case 10:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+checksum+",&");
                    break;
                    case 11:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+checksum+",&");
                    break;
                    case 12:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+checksum+",&");
                    break;
                    case 13:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+checksum+",&");
                    break;
                    case 14:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+checksum+",&");
                    break;
                    case 15:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+checksum+",&");
                    break;
                    case 16:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+checksum+",&");
                    break;
                    case 17:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+checksum+",&");
                    break;
                    case 18:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+checksum+",&");
                    break;
                    case 19:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+checksum+",&");
                    break;
                    case 20:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+checksum+",&");
                    break;
                    case 21:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+checksum+",&");
                    break;
                    case 22:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+checksum+",&");
                    break;
                    case 23:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22+AlcoholTypeName_char_23;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+AlcoholTypeName_char_23+","+checksum+",&");
                    break;
                    case 24:
                        var checksum= 255+254+246+ID1_1+ID1_2+ID1_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22+AlcoholTypeName_char_23+AlcoholTypeName_char_24;
                        checksum=checksum%256;
                        sock.write('11=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+AlcoholTypeName_char_23+","+AlcoholTypeName_char_24+","+checksum+",&");
                    break;
                }
            }
            else if(data[21]==2 && numOfTaps>1)
            {
                var AlcoholTypeName2lenght=0;
                var AlcoholTypeName2ascii="";
                
                var AlcoholTypeName2_= JSON.stringify(AlcoholTypeName2);
                AlcoholTypeName2 =  JSON.parse(AlcoholTypeName2_);
                
                for(i=0;i<30;i++)
                {
                    if(AlcoholTypeName2[i]!=undefined)
                    {
                        AlcoholTypeName2lenght++;
                    }
                }
                
                AlcoholTypeName_char_1=0;
                AlcoholTypeName_char_2=0;
                AlcoholTypeName_char_3=0;
                AlcoholTypeName_char_4=0;
                AlcoholTypeName_char_5=0;
                AlcoholTypeName_char_6=0;
                AlcoholTypeName_char_7=0;
                AlcoholTypeName_char_8=0;
                AlcoholTypeName_char_9=0;
                AlcoholTypeName_char_10=0;
                AlcoholTypeName_char_11=0;
                AlcoholTypeName_char_12=0;
                AlcoholTypeName_char_13=0;
                AlcoholTypeName_char_14=0;
                AlcoholTypeName_char_15=0;
                AlcoholTypeName_char_16=0;
                AlcoholTypeName_char_17=0;
                AlcoholTypeName_char_18=0;
                AlcoholTypeName_char_19=0;
                AlcoholTypeName_char_20=0;
                AlcoholTypeName_char_21=0;
                AlcoholTypeName_char_22=0;
                AlcoholTypeName_char_23=0;
                AlcoholTypeName_char_24=0;

                for(i=0;i<AlcoholTypeName2lenght;i++)
                {
                    console.log("AlcoholTypeName2lenght"+AlcoholTypeName2lenght+"i="+i+" "+ AlcoholTypeName2[i]);
                    switch(i)
                    {
                        case 0:
                            AlcoholTypeName_char_1=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 1:
                            AlcoholTypeName_char_2=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 2:
                            AlcoholTypeName_char_3=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 3:
                            AlcoholTypeName_char_4=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 4:
                            AlcoholTypeName_char_5=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 5:
                            AlcoholTypeName_char_6=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 6:
                            AlcoholTypeName_char_7=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 7:
                            AlcoholTypeName_char_8=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 8:
                            AlcoholTypeName_char_9=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 9:
                            AlcoholTypeName_char_10=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 10:
                            AlcoholTypeName_char_11=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 11:
                            AlcoholTypeName_char_12=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 12:
                            AlcoholTypeName_char_13=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 13:
                            AlcoholTypeName_char_14=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 14:
                            AlcoholTypeName_char_15=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 15:
                            AlcoholTypeName_char_16=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 16:
                            AlcoholTypeName_char_17=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 17:
                            AlcoholTypeName_char_18=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 18:
                            AlcoholTypeName_char_19=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 19:
                            AlcoholTypeName_char_20=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 20:
                            AlcoholTypeName_char_21=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 21:
                            AlcoholTypeName_char_22=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 22:
                            AlcoholTypeName_char_23=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                        case 23:
                            AlcoholTypeName_char_24=AlcoholTypeName2[i].charCodeAt(0);
                        break;
                    }
                }
                ID_2=parseInt(ID_2, 10);
                var ID_2_HEX=ID_2.toString(16);
                var ID2_1=ID_2_HEX[0]+ID_2_HEX[1];
                var ID2_1=parseInt(ID2_1, 16);
                var ID2_2=ID_2_HEX[2]+ID_2_HEX[3];
                var ID2_2=parseInt(ID2_2, 16);
                var ID2_3=ID_2_HEX[4]+ID_2_HEX[5];
                var ID2_3=parseInt(ID2_3, 16);
                var DataLength=AlcoholTypeName2lenght+8;
                
                switch(AlcoholTypeName2lenght)
                {
                    case 1:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+checksum+",&");
                    break;
                    case 2:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+checksum+",&");
                    break;
                    case 3:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+checksum+",&");
                    break;
                    case 4:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+checksum+",&");
                    break;
                    case 5:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+checksum+",&");
                    break;
                    case 6:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+checksum+",&");
                    break;
                    case 7:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+checksum+",&");
                    break;
                    case 8:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+checksum+",&");
                    break;
                    case 9:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+checksum+",&");
                    break;
                    case 10:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+checksum+",&");
                    break;
                    case 11:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+checksum+",&");
                    break;
                    case 12:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+checksum+",&");
                    break;
                    case 13:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+checksum+",&");
                    break;
                    case 14:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+checksum+",&");
                    break;
                    case 15:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+checksum+",&");
                    break;
                    case 16:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+checksum+",&");
                    break;
                    case 17:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+checksum+",&");
                    break;
                    case 18:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+checksum+",&");
                    break;
                    case 19:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+checksum+",&");
                    break;
                    case 20:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+checksum+",&");
                    break;
                    case 21:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+checksum+",&");
                    break;
                    case 22:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+checksum+",&");
                    break;
                    case 23:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22+AlcoholTypeName_char_23;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+AlcoholTypeName_char_23+","+checksum+",&");
                    break;
                    case 24:
                        var checksum= 255+254+246+ID2_1+ID2_2+ID2_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22+AlcoholTypeName_char_23+AlcoholTypeName_char_24;
                        checksum=checksum%256;
                        sock.write('21=' + 255+","+254+","+ID2_1+","+ID2_2+","+ID2_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+AlcoholTypeName_char_23+","+AlcoholTypeName_char_24+","+checksum+",&");
                    break;
                }
            }
            else if(data[21]==3 && numOfTaps>2)
            {
                var AlcoholTypeName3lenght=0;
                var AlcoholTypeName3ascii="";
                
                var AlcoholTypeName3_= JSON.stringify(AlcoholTypeName3);
                AlcoholTypeName3 =  JSON.parse(AlcoholTypeName3_);
                
                for(i=0;i<30;i++)
                {
                    if(AlcoholTypeName3[i]!=undefined)
                    {
                        AlcoholTypeName3lenght++;
                    }
                }
                
                AlcoholTypeName_char_1=0;
                AlcoholTypeName_char_2=0;
                AlcoholTypeName_char_3=0;
                AlcoholTypeName_char_4=0;
                AlcoholTypeName_char_5=0;
                AlcoholTypeName_char_6=0;
                AlcoholTypeName_char_7=0;
                AlcoholTypeName_char_8=0;
                AlcoholTypeName_char_9=0;
                AlcoholTypeName_char_10=0;
                AlcoholTypeName_char_11=0;
                AlcoholTypeName_char_12=0;
                AlcoholTypeName_char_13=0;
                AlcoholTypeName_char_14=0;
                AlcoholTypeName_char_15=0;
                AlcoholTypeName_char_16=0;
                AlcoholTypeName_char_17=0;
                AlcoholTypeName_char_18=0;
                AlcoholTypeName_char_19=0;
                AlcoholTypeName_char_20=0;
                AlcoholTypeName_char_21=0;
                AlcoholTypeName_char_22=0;
                AlcoholTypeName_char_23=0;
                AlcoholTypeName_char_24=0;

                for(i=0;i<AlcoholTypeName3lenght;i++)
                {
                    console.log("AlcoholTypeName3lenght"+AlcoholTypeName3lenght+"i="+i+" "+ AlcoholTypeName3[i]);
                    switch(i)
                    {
                        case 0:
                            AlcoholTypeName_char_1=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 1:
                            AlcoholTypeName_char_2=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 2:
                            AlcoholTypeName_char_3=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 3:
                            AlcoholTypeName_char_4=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 4:
                            AlcoholTypeName_char_5=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 5:
                            AlcoholTypeName_char_6=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 6:
                            AlcoholTypeName_char_7=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 7:
                            AlcoholTypeName_char_8=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 8:
                            AlcoholTypeName_char_9=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 9:
                            AlcoholTypeName_char_10=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 10:
                            AlcoholTypeName_char_11=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 11:
                            AlcoholTypeName_char_12=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 12:
                            AlcoholTypeName_char_13=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 13:
                            AlcoholTypeName_char_14=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 14:
                            AlcoholTypeName_char_15=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 15:
                            AlcoholTypeName_char_16=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 16:
                            AlcoholTypeName_char_17=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 17:
                            AlcoholTypeName_char_18=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 18:
                            AlcoholTypeName_char_19=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 19:
                            AlcoholTypeName_char_20=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 20:
                            AlcoholTypeName_char_21=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 21:
                            AlcoholTypeName_char_22=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 22:
                            AlcoholTypeName_char_23=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                        case 23:
                            AlcoholTypeName_char_24=AlcoholTypeName3[i].charCodeAt(0);
                        break;
                    }
                }
                ID_3=parseInt(ID_3, 10);
                var ID_3_HEX=ID_3.toString(16);
                var ID3_1=ID_3_HEX[0]+ID_3_HEX[1];
                var ID3_1=parseInt(ID3_1, 16);
                var ID3_2=ID_3_HEX[2]+ID_3_HEX[3];
                var ID3_2=parseInt(ID3_2, 16);
                var ID3_3=ID_3_HEX[4]+ID_3_HEX[5];
                var ID3_3=parseInt(ID3_3, 16);
                var DataLength=AlcoholTypeName3lenght+8;
                
                switch(AlcoholTypeName3lenght)
                {
                    case 1:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+checksum+",&");
                    break;
                    case 2:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+checksum+",&");
                    break;
                    case 3:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+checksum+",&");
                    break;
                    case 4:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+checksum+",&");
                    break;
                    case 5:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+checksum+",&");
                    break;
                    case 6:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+checksum+",&");
                    break;
                    case 7:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+checksum+",&");
                    break;
                    case 8:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+checksum+",&");
                    break;
                    case 9:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+checksum+",&");
                    break;
                    case 10:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+checksum+",&");
                    break;
                    case 11:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+checksum+",&");
                    break;
                    case 12:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+checksum+",&");
                    break;
                    case 13:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+checksum+",&");
                    break;
                    case 14:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+checksum+",&");
                    break;
                    case 15:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+checksum+",&");
                    break;
                    case 16:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+checksum+",&");
                    break;
                    case 17:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+checksum+",&");
                    break;
                    case 18:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+checksum+",&");
                    break;
                    case 19:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+checksum+",&");
                    break;
                    case 20:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+checksum+",&");
                    break;
                    case 21:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+checksum+",&");
                    break;
                    case 22:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+checksum+",&");
                    break;
                    case 23:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22+AlcoholTypeName_char_23;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+AlcoholTypeName_char_23+","+checksum+",&");
                    break;
                    case 24:
                        var checksum= 255+254+246+ID3_1+ID3_2+ID3_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22+AlcoholTypeName_char_23+AlcoholTypeName_char_24;
                        checksum=checksum%256;
                        sock.write('31=' + 255+","+254+","+ID3_1+","+ID3_2+","+ID3_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+AlcoholTypeName_char_23+","+AlcoholTypeName_char_24+","+checksum+",&");
                    break;
                }
            }
            else if(data[21]==4 && numOfTaps>3)
            {
                var AlcoholTypeName4lenght=0;
                var AlcoholTypeName4ascii="";
                
                var AlcoholTypeName4_= JSON.stringify(AlcoholTypeName4);
                AlcoholTypeName4 =  JSON.parse(AlcoholTypeName4_);
                
                for(i=0;i<30;i++)
                {
                    if(AlcoholTypeName4[i]!=undefined)
                    {
                        AlcoholTypeName4lenght++;
                    }
                }
                
                AlcoholTypeName_char_1=0;
                AlcoholTypeName_char_2=0;
                AlcoholTypeName_char_3=0;
                AlcoholTypeName_char_4=0;
                AlcoholTypeName_char_5=0;
                AlcoholTypeName_char_6=0;
                AlcoholTypeName_char_7=0;
                AlcoholTypeName_char_8=0;
                AlcoholTypeName_char_9=0;
                AlcoholTypeName_char_10=0;
                AlcoholTypeName_char_11=0;
                AlcoholTypeName_char_12=0;
                AlcoholTypeName_char_13=0;
                AlcoholTypeName_char_14=0;
                AlcoholTypeName_char_15=0;
                AlcoholTypeName_char_16=0;
                AlcoholTypeName_char_17=0;
                AlcoholTypeName_char_18=0;
                AlcoholTypeName_char_19=0;
                AlcoholTypeName_char_20=0;
                AlcoholTypeName_char_21=0;
                AlcoholTypeName_char_22=0;
                AlcoholTypeName_char_23=0;
                AlcoholTypeName_char_24=0;

                for(i=0;i<AlcoholTypeName4lenght;i++)
                {
                    console.log("AlcoholTypeName4lenght"+AlcoholTypeName4lenght+"i="+i+" "+ AlcoholTypeName4[i]);
                    switch(i)
                    {
                        case 0:
                            AlcoholTypeName_char_1=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 1:
                            AlcoholTypeName_char_2=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 2:
                            AlcoholTypeName_char_3=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 3:
                            AlcoholTypeName_char_4=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 4:
                            AlcoholTypeName_char_5=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 5:
                            AlcoholTypeName_char_6=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 6:
                            AlcoholTypeName_char_7=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 7:
                            AlcoholTypeName_char_8=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 8:
                            AlcoholTypeName_char_9=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 9:
                            AlcoholTypeName_char_10=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 10:
                            AlcoholTypeName_char_11=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 11:
                            AlcoholTypeName_char_12=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 12:
                            AlcoholTypeName_char_13=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 13:
                            AlcoholTypeName_char_14=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 14:
                            AlcoholTypeName_char_15=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 15:
                            AlcoholTypeName_char_16=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 16:
                            AlcoholTypeName_char_17=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 17:
                            AlcoholTypeName_char_18=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 18:
                            AlcoholTypeName_char_19=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 19:
                            AlcoholTypeName_char_20=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 20:
                            AlcoholTypeName_char_21=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 21:
                            AlcoholTypeName_char_22=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 22:
                            AlcoholTypeName_char_23=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                        case 23:
                            AlcoholTypeName_char_24=AlcoholTypeName4[i].charCodeAt(0);
                        break;
                    }
                }
                ID_4=parseInt(ID_4, 10);
                var ID_4_HEX=ID_4.toString(16);
                var ID4_1=ID_4_HEX[0]+ID_4_HEX[1];
                var ID4_1=parseInt(ID4_1, 16);
                var ID4_2=ID_4_HEX[2]+ID_4_HEX[3];
                var ID4_2=parseInt(ID4_2, 16);
                var ID4_3=ID_4_HEX[4]+ID_4_HEX[5];
                var ID4_3=parseInt(ID4_3, 16);
                var DataLength=AlcoholTypeName4lenght+8;
                
                switch(AlcoholTypeName4lenght)
                {
                    case 1:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+checksum+",&");
                    break;
                    case 2:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+checksum+",&");
                    break;
                    case 3:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+checksum+",&");
                    break;
                    case 4:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+checksum+",&");
                    break;
                    case 5:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+checksum+",&");
                    break;
                    case 6:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+checksum+",&");
                    break;
                    case 7:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+checksum+",&");
                    break;
                    case 8:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+checksum+",&");
                    break;
                    case 9:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+checksum+",&");
                    break;
                    case 10:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+checksum+",&");
                    break;
                    case 11:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+checksum+",&");
                    break;
                    case 12:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+checksum+",&");
                    break;
                    case 13:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+checksum+",&");
                    break;
                    case 14:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+checksum+",&");
                    break;
                    case 15:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+checksum+",&");
                    break;
                    case 16:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+checksum+",&");
                    break;
                    case 17:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+checksum+",&");
                    break;
                    case 18:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+checksum+",&");
                    break;
                    case 19:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+checksum+",&");
                    break;
                    case 20:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+checksum+",&");
                    break;
                    case 21:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+checksum+",&");
                    break;
                    case 22:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+checksum+",&");
                    break;
                    case 23:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22+AlcoholTypeName_char_23;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+AlcoholTypeName_char_23+","+checksum+",&");
                    break;
                    case 24:
                        var checksum= 255+254+246+ID4_1+ID4_2+ID4_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22+AlcoholTypeName_char_23+AlcoholTypeName_char_24;
                        checksum=checksum%256;
                        sock.write('41=' + 255+","+254+","+ID4_1+","+ID4_2+","+ID4_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+AlcoholTypeName_char_23+","+AlcoholTypeName_char_24+","+checksum+",&");
                    break;
                }
            }
            else if(data[21]==5 && numOfTaps>4)
            {
                var AlcoholTypeName5lenght=0;
                var AlcoholTypeName5ascii="";
                
                var AlcoholTypeName5_= JSON.stringify(AlcoholTypeName5);
                AlcoholTypeName5 =  JSON.parse(AlcoholTypeName5_);
                
                for(i=0;i<30;i++)
                {
                    if(AlcoholTypeName5[i]!=undefined)
                    {
                        AlcoholTypeName5lenght++;
                    }
                }
                
                AlcoholTypeName_char_1=0;
                AlcoholTypeName_char_2=0;
                AlcoholTypeName_char_3=0;
                AlcoholTypeName_char_4=0;
                AlcoholTypeName_char_5=0;
                AlcoholTypeName_char_6=0;
                AlcoholTypeName_char_7=0;
                AlcoholTypeName_char_8=0;
                AlcoholTypeName_char_9=0;
                AlcoholTypeName_char_10=0;
                AlcoholTypeName_char_11=0;
                AlcoholTypeName_char_12=0;
                AlcoholTypeName_char_13=0;
                AlcoholTypeName_char_14=0;
                AlcoholTypeName_char_15=0;
                AlcoholTypeName_char_16=0;
                AlcoholTypeName_char_17=0;
                AlcoholTypeName_char_18=0;
                AlcoholTypeName_char_19=0;
                AlcoholTypeName_char_20=0;
                AlcoholTypeName_char_21=0;
                AlcoholTypeName_char_22=0;
                AlcoholTypeName_char_23=0;
                AlcoholTypeName_char_24=0;

                for(i=0;i<AlcoholTypeName5lenght;i++)
                {
                    console.log("AlcoholTypeName5lenght"+AlcoholTypeName5lenght+"i="+i+" "+ AlcoholTypeName5[i]);
                    switch(i)
                    {
                        case 0:
                            AlcoholTypeName_char_1=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 1:
                            AlcoholTypeName_char_2=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 2:
                            AlcoholTypeName_char_3=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 3:
                            AlcoholTypeName_char_4=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 4:
                            AlcoholTypeName_char_5=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 5:
                            AlcoholTypeName_char_6=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 6:
                            AlcoholTypeName_char_7=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 7:
                            AlcoholTypeName_char_8=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 8:
                            AlcoholTypeName_char_9=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 9:
                            AlcoholTypeName_char_10=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 10:
                            AlcoholTypeName_char_11=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 11:
                            AlcoholTypeName_char_12=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 12:
                            AlcoholTypeName_char_13=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 13:
                            AlcoholTypeName_char_14=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 14:
                            AlcoholTypeName_char_15=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 15:
                            AlcoholTypeName_char_16=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 16:
                            AlcoholTypeName_char_17=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 17:
                            AlcoholTypeName_char_18=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 18:
                            AlcoholTypeName_char_19=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 19:
                            AlcoholTypeName_char_20=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 20:
                            AlcoholTypeName_char_21=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 21:
                            AlcoholTypeName_char_22=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 22:
                            AlcoholTypeName_char_23=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                        case 23:
                            AlcoholTypeName_char_24=AlcoholTypeName5[i].charCodeAt(0);
                        break;
                    }
                }
                ID_5=parseInt(ID_5, 10);
                var ID_5_HEX=ID_5.toString(16);
                var ID5_1=ID_5_HEX[0]+ID_5_HEX[1];
                var ID5_1=parseInt(ID5_1, 16);
                var ID5_2=ID_5_HEX[2]+ID_5_HEX[3];
                var ID5_2=parseInt(ID5_2, 16);
                var ID5_3=ID_5_HEX[4]+ID_5_HEX[5];
                var ID5_3=parseInt(ID5_3, 16);
                var DataLength=AlcoholTypeName5lenght+8;
                
                switch(AlcoholTypeName5lenght)
                {
                    case 1:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+checksum+",&");
                    break;
                    case 2:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+checksum+",&");
                    break;
                    case 3:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+checksum+",&");
                    break;
                    case 4:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+checksum+",&");
                    break;
                    case 5:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+checksum+",&");
                    break;
                    case 6:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+checksum+",&");
                    break;
                    case 7:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+checksum+",&");
                    break;
                    case 8:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+checksum+",&");
                    break;
                    case 9:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+checksum+",&");
                    break;
                    case 10:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+checksum+",&");
                    break;
                    case 11:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+checksum+",&");
                    break;
                    case 12:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+checksum+",&");
                    break;
                    case 13:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+checksum+",&");
                    break;
                    case 14:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+checksum+",&");
                    break;
                    case 15:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+checksum+",&");
                    break;
                    case 16:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+checksum+",&");
                    break;
                    case 17:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+checksum+",&");
                    break;
                    case 18:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+checksum+",&");
                    break;
                    case 19:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+checksum+",&");
                    break;
                    case 20:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+checksum+",&");
                    break;
                    case 21:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+checksum+",&");
                    break;
                    case 22:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+checksum+",&");
                    break;
                    case 23:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22+AlcoholTypeName_char_23;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+AlcoholTypeName_char_23+","+checksum+",&");
                    break;
                    case 24:
                        var checksum= 255+254+246+ID5_1+ID5_2+ID5_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22+AlcoholTypeName_char_23+AlcoholTypeName_char_24;
                        checksum=checksum%256;
                        sock.write('51=' + 255+","+254+","+ID5_1+","+ID5_2+","+ID5_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+AlcoholTypeName_char_23+","+AlcoholTypeName_char_24+","+checksum+",&");
                    break;
                }
            }
            else if(data[21]==6 && numOfTaps>5)
            {
                var AlcoholTypeName6lenght=0;
                var AlcoholTypeName6ascii="";
                
                var AlcoholTypeName6_= JSON.stringify(AlcoholTypeName6);
                AlcoholTypeName6 =  JSON.parse(AlcoholTypeName6_);
                
                for(i=0;i<30;i++)
                {
                    if(AlcoholTypeName6[i]!=undefined)
                    {
                        AlcoholTypeName6lenght++;
                    }
                }
                
                AlcoholTypeName_char_1=0;
                AlcoholTypeName_char_2=0;
                AlcoholTypeName_char_3=0;
                AlcoholTypeName_char_4=0;
                AlcoholTypeName_char_5=0;
                AlcoholTypeName_char_6=0;
                AlcoholTypeName_char_7=0;
                AlcoholTypeName_char_8=0;
                AlcoholTypeName_char_9=0;
                AlcoholTypeName_char_10=0;
                AlcoholTypeName_char_11=0;
                AlcoholTypeName_char_12=0;
                AlcoholTypeName_char_13=0;
                AlcoholTypeName_char_14=0;
                AlcoholTypeName_char_15=0;
                AlcoholTypeName_char_16=0;
                AlcoholTypeName_char_17=0;
                AlcoholTypeName_char_18=0;
                AlcoholTypeName_char_19=0;
                AlcoholTypeName_char_20=0;
                AlcoholTypeName_char_21=0;
                AlcoholTypeName_char_22=0;
                AlcoholTypeName_char_23=0;
                AlcoholTypeName_char_24=0;

                for(i=0;i<AlcoholTypeName6lenght;i++)
                {
                    console.log("AlcoholTypeName6lenght"+AlcoholTypeName6lenght+"i="+i+" "+ AlcoholTypeName6[i]);
                    switch(i)
                    {
                        case 0:
                            AlcoholTypeName_char_1=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 1:
                            AlcoholTypeName_char_2=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 2:
                            AlcoholTypeName_char_3=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 3:
                            AlcoholTypeName_char_4=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 4:
                            AlcoholTypeName_char_5=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 5:
                            AlcoholTypeName_char_6=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 6:
                            AlcoholTypeName_char_7=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 7:
                            AlcoholTypeName_char_8=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 8:
                            AlcoholTypeName_char_9=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 9:
                            AlcoholTypeName_char_10=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 10:
                            AlcoholTypeName_char_11=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 11:
                            AlcoholTypeName_char_12=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 12:
                            AlcoholTypeName_char_13=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 13:
                            AlcoholTypeName_char_14=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 14:
                            AlcoholTypeName_char_15=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 15:
                            AlcoholTypeName_char_16=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 16:
                            AlcoholTypeName_char_17=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 17:
                            AlcoholTypeName_char_18=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 18:
                            AlcoholTypeName_char_19=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 19:
                            AlcoholTypeName_char_20=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 20:
                            AlcoholTypeName_char_21=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 21:
                            AlcoholTypeName_char_22=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 22:
                            AlcoholTypeName_char_23=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                        case 23:
                            AlcoholTypeName_char_24=AlcoholTypeName6[i].charCodeAt(0);
                        break;
                    }
                }
                ID_6=parseInt(ID_6, 10);
                var ID_6_HEX=ID_6.toString(16);
                var ID6_1=ID_6_HEX[0]+ID_6_HEX[1];
                var ID6_1=parseInt(ID6_1, 16);
                var ID6_2=ID_6_HEX[2]+ID_6_HEX[3];
                var ID6_2=parseInt(ID6_2, 16);
                var ID6_3=ID_6_HEX[4]+ID_6_HEX[5];
                var ID6_3=parseInt(ID6_3, 16);
                var DataLength=AlcoholTypeName6lenght+8;
                
                switch(AlcoholTypeName6lenght)
                {
                    case 1:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+checksum+",&");
                    break;
                    case 2:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+checksum+",&");
                    break;
                    case 3:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+checksum+",&");
                    break;
                    case 4:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+checksum+",&");
                    break;
                    case 5:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+checksum+",&");
                    break;
                    case 6:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+checksum+",&");
                    break;
                    case 7:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+checksum+",&");
                    break;
                    case 8:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+checksum+",&");
                    break;
                    case 9:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+checksum+",&");
                    break;
                    case 10:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+checksum+",&");
                    break;
                    case 11:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+checksum+",&");
                    break;
                    case 12:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+checksum+",&");
                    break;
                    case 13:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+checksum+",&");
                    break;
                    case 14:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+checksum+",&");
                    break;
                    case 15:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+checksum+",&");
                    break;
                    case 16:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+checksum+",&");
                    break;
                    case 17:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+checksum+",&");
                    break;
                    case 18:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+checksum+",&");
                    break;
                    case 19:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+checksum+",&");
                    break;
                    case 20:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+checksum+",&");
                    break;
                    case 21:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+checksum+",&");
                    break;
                    case 22:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+checksum+",&");
                    break;
                    case 23:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22+AlcoholTypeName_char_23;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+AlcoholTypeName_char_23+","+checksum+",&");
                    break;
                    case 24:
                        var checksum= 255+254+246+ID6_1+ID6_2+ID6_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22+AlcoholTypeName_char_23+AlcoholTypeName_char_24;
                        checksum=checksum%256;
                        sock.write('61=' + 255+","+254+","+ID6_1+","+ID6_2+","+ID6_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+AlcoholTypeName_char_23+","+AlcoholTypeName_char_24+","+checksum+",&");
                    break;
                }
            }
            else if(data[21]==7 && numOfTaps>6)
            {
                var AlcoholTypeName7lenght=0;
                var AlcoholTypeName7ascii="";
                
                var AlcoholTypeName7_= JSON.stringify(AlcoholTypeName7);
                AlcoholTypeName7 =  JSON.parse(AlcoholTypeName7_);
                
                for(i=0;i<30;i++)
                {
                    if(AlcoholTypeName7[i]!=undefined)
                    {
                        AlcoholTypeName7lenght++;
                    }
                }
                
                AlcoholTypeName_char_1=0;
                AlcoholTypeName_char_2=0;
                AlcoholTypeName_char_3=0;
                AlcoholTypeName_char_4=0;
                AlcoholTypeName_char_5=0;
                AlcoholTypeName_char_6=0;
                AlcoholTypeName_char_7=0;
                AlcoholTypeName_char_8=0;
                AlcoholTypeName_char_9=0;
                AlcoholTypeName_char_10=0;
                AlcoholTypeName_char_11=0;
                AlcoholTypeName_char_12=0;
                AlcoholTypeName_char_13=0;
                AlcoholTypeName_char_14=0;
                AlcoholTypeName_char_15=0;
                AlcoholTypeName_char_16=0;
                AlcoholTypeName_char_17=0;
                AlcoholTypeName_char_18=0;
                AlcoholTypeName_char_19=0;
                AlcoholTypeName_char_20=0;
                AlcoholTypeName_char_21=0;
                AlcoholTypeName_char_22=0;
                AlcoholTypeName_char_23=0;
                AlcoholTypeName_char_24=0;

                for(i=0;i<AlcoholTypeName7lenght;i++)
                {
                    console.log("AlcoholTypeName7lenght"+AlcoholTypeName7lenght+"i="+i+" "+ AlcoholTypeName7[i]);
                    switch(i)
                    {
                        case 0:
                            AlcoholTypeName_char_1=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 1:
                            AlcoholTypeName_char_2=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 2:
                            AlcoholTypeName_char_3=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 3:
                            AlcoholTypeName_char_4=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 4:
                            AlcoholTypeName_char_5=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 5:
                            AlcoholTypeName_char_6=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 6:
                            AlcoholTypeName_char_7=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 7:
                            AlcoholTypeName_char_8=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 8:
                            AlcoholTypeName_char_9=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 9:
                            AlcoholTypeName_char_10=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 10:
                            AlcoholTypeName_char_11=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 11:
                            AlcoholTypeName_char_12=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 12:
                            AlcoholTypeName_char_13=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 13:
                            AlcoholTypeName_char_14=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 14:
                            AlcoholTypeName_char_15=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 15:
                            AlcoholTypeName_char_16=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 16:
                            AlcoholTypeName_char_17=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 17:
                            AlcoholTypeName_char_18=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 18:
                            AlcoholTypeName_char_19=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 19:
                            AlcoholTypeName_char_20=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 20:
                            AlcoholTypeName_char_21=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 21:
                            AlcoholTypeName_char_22=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 22:
                            AlcoholTypeName_char_23=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                        case 23:
                            AlcoholTypeName_char_24=AlcoholTypeName7[i].charCodeAt(0);
                        break;
                    }
                }
                ID_7=parseInt(ID_7, 10);
                var ID_7_HEX=ID_7.toString(16);
                var ID7_1=ID_7_HEX[0]+ID_7_HEX[1];
                var ID7_1=parseInt(ID7_1, 16);
                var ID7_2=ID_7_HEX[2]+ID_7_HEX[3];
                var ID7_2=parseInt(ID7_2, 16);
                var ID7_3=ID_7_HEX[4]+ID_7_HEX[5];
                var ID7_3=parseInt(ID7_3, 16);
                var DataLength=AlcoholTypeName7lenght+8;
                
                switch(AlcoholTypeName7lenght)
                {
                    case 1:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+checksum+",&");
                    break;
                    case 2:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+checksum+",&");
                    break;
                    case 3:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+checksum+",&");
                    break;
                    case 4:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+checksum+",&");
                    break;
                    case 5:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+checksum+",&");
                    break;
                    case 6:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+checksum+",&");
                    break;
                    case 7:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+checksum+",&");
                    break;
                    case 8:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+checksum+",&");
                    break;
                    case 9:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+checksum+",&");
                    break;
                    case 10:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+checksum+",&");
                    break;
                    case 11:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+checksum+",&");
                    break;
                    case 12:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+checksum+",&");
                    break;
                    case 13:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+checksum+",&");
                    break;
                    case 14:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+checksum+",&");
                    break;
                    case 15:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+checksum+",&");
                    break;
                    case 16:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+checksum+",&");
                    break;
                    case 17:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+checksum+",&");
                    break;
                    case 18:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+checksum+",&");
                    break;
                    case 19:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+checksum+",&");
                    break;
                    case 20:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+checksum+",&");
                    break;
                    case 21:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+checksum+",&");
                    break;
                    case 22:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+checksum+",&");
                    break;
                    case 23:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22+AlcoholTypeName_char_23;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+AlcoholTypeName_char_23+","+checksum+",&");
                    break;
                    case 24:
                        var checksum= 255+254+246+ID7_1+ID7_2+ID7_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22+AlcoholTypeName_char_23+AlcoholTypeName_char_24;
                        checksum=checksum%256;
                        sock.write('71=' + 255+","+254+","+ID7_1+","+ID7_2+","+ID7_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+AlcoholTypeName_char_23+","+AlcoholTypeName_char_24+","+checksum+",&");
                    break;
                }
            }
            else if(data[21]==8 && numOfTaps>7)
            {
                var AlcoholTypeName8lenght=0;
                var AlcoholTypeName8ascii="";
                
                var AlcoholTypeName8_= JSON.stringify(AlcoholTypeName8);
                AlcoholTypeName8 =  JSON.parse(AlcoholTypeName8_);
                
                for(i=0;i<30;i++)
                {
                    if(AlcoholTypeName8[i]!=undefined)
                    {
                        AlcoholTypeName8lenght++;
                    }
                }
                
                AlcoholTypeName_char_1=0;
                AlcoholTypeName_char_2=0;
                AlcoholTypeName_char_3=0;
                AlcoholTypeName_char_4=0;
                AlcoholTypeName_char_5=0;
                AlcoholTypeName_char_6=0;
                AlcoholTypeName_char_7=0;
                AlcoholTypeName_char_8=0;
                AlcoholTypeName_char_9=0;
                AlcoholTypeName_char_10=0;
                AlcoholTypeName_char_11=0;
                AlcoholTypeName_char_12=0;
                AlcoholTypeName_char_13=0;
                AlcoholTypeName_char_14=0;
                AlcoholTypeName_char_15=0;
                AlcoholTypeName_char_16=0;
                AlcoholTypeName_char_17=0;
                AlcoholTypeName_char_18=0;
                AlcoholTypeName_char_19=0;
                AlcoholTypeName_char_20=0;
                AlcoholTypeName_char_21=0;
                AlcoholTypeName_char_22=0;
                AlcoholTypeName_char_23=0;
                AlcoholTypeName_char_24=0;

                for(i=0;i<AlcoholTypeName8lenght;i++)
                {
                    console.log("AlcoholTypeName8lenght"+AlcoholTypeName8lenght+"i="+i+" "+ AlcoholTypeName8[i]);
                    switch(i)
                    {
                        case 0:
                            AlcoholTypeName_char_1=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 1:
                            AlcoholTypeName_char_2=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 2:
                            AlcoholTypeName_char_3=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 3:
                            AlcoholTypeName_char_4=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 4:
                            AlcoholTypeName_char_5=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 5:
                            AlcoholTypeName_char_6=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 6:
                            AlcoholTypeName_char_7=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 7:
                            AlcoholTypeName_char_8=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 8:
                            AlcoholTypeName_char_9=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 9:
                            AlcoholTypeName_char_10=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 10:
                            AlcoholTypeName_char_11=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 11:
                            AlcoholTypeName_char_12=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 12:
                            AlcoholTypeName_char_13=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 13:
                            AlcoholTypeName_char_14=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 14:
                            AlcoholTypeName_char_15=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 15:
                            AlcoholTypeName_char_16=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 16:
                            AlcoholTypeName_char_17=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 17:
                            AlcoholTypeName_char_18=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 18:
                            AlcoholTypeName_char_19=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 19:
                            AlcoholTypeName_char_20=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 20:
                            AlcoholTypeName_char_21=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 21:
                            AlcoholTypeName_char_22=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 22:
                            AlcoholTypeName_char_23=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                        case 23:
                            AlcoholTypeName_char_24=AlcoholTypeName8[i].charCodeAt(0);
                        break;
                    }
                }
                ID_8=parseInt(ID_8, 10);
                var ID_8_HEX=ID_8.toString(16);
                var ID8_1=ID_8_HEX[0]+ID_8_HEX[1];
                var ID8_1=parseInt(ID8_1, 16);
                var ID8_2=ID_8_HEX[2]+ID_8_HEX[3];
                var ID8_2=parseInt(ID8_2, 16);
                var ID8_3=ID_8_HEX[4]+ID_8_HEX[5];
                var ID8_3=parseInt(ID8_3, 16);
                var DataLength=AlcoholTypeName8lenght+8;
                
                switch(AlcoholTypeName8lenght)
                {
                    case 1:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+checksum+",&");
                    break;
                    case 2:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+checksum+",&");
                    break;
                    case 3:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+checksum+",&");
                    break;
                    case 4:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+checksum+",&");
                    break;
                    case 5:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+checksum+",&");
                    break;
                    case 6:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+checksum+",&");
                    break;
                    case 7:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+checksum+",&");
                    break;
                    case 8:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+checksum+",&");
                    break;
                    case 9:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+checksum+",&");
                    break;
                    case 10:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+checksum+",&");
                    break;
                    case 11:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+checksum+",&");
                    break;
                    case 12:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+checksum+",&");
                    break;
                    case 13:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+checksum+",&");
                    break;
                    case 14:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+checksum+",&");
                    break;
                    case 15:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+checksum+",&");
                    break;
                    case 16:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+checksum+",&");
                    break;
                    case 17:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+checksum+",&");
                    break;
                    case 18:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+checksum+",&");
                    break;
                    case 19:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+checksum+",&");
                    break;
                    case 20:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+checksum+",&");
                    break;
                    case 21:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+checksum+",&");
                    break;
                    case 22:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+checksum+",&");
                    break;
                    case 23:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22+AlcoholTypeName_char_23;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+AlcoholTypeName_char_23+","+checksum+",&");
                    break;
                    case 24:
                        var checksum= 255+254+246+ID8_1+ID8_2+ID8_3+DataLength+AlcoholTypeName_char_1+AlcoholTypeName_char_2+AlcoholTypeName_char_3+AlcoholTypeName_char_4+AlcoholTypeName_char_5+AlcoholTypeName_char_6+AlcoholTypeName_char_7+AlcoholTypeName_char_8+AlcoholTypeName_char_9+AlcoholTypeName_char_10+AlcoholTypeName_char_11+AlcoholTypeName_char_12+AlcoholTypeName_char_13+AlcoholTypeName_char_14+AlcoholTypeName_char_15+AlcoholTypeName_char_16+AlcoholTypeName_char_17+AlcoholTypeName_char_18+AlcoholTypeName_char_19+AlcoholTypeName_char_20+AlcoholTypeName_char_21+AlcoholTypeName_char_22+AlcoholTypeName_char_23+AlcoholTypeName_char_24;
                        checksum=checksum%256;
                        sock.write('81=' + 255+","+254+","+ID8_1+","+ID8_2+","+ID8_3+","+DataLength+","+246+","+AlcoholTypeName_char_1+","+AlcoholTypeName_char_2+","+AlcoholTypeName_char_3+","+AlcoholTypeName_char_4+","+AlcoholTypeName_char_5+","+AlcoholTypeName_char_6+","+AlcoholTypeName_char_7+","+AlcoholTypeName_char_8+","+AlcoholTypeName_char_9+","+AlcoholTypeName_char_10+","+AlcoholTypeName_char_11+","+AlcoholTypeName_char_12+","+AlcoholTypeName_char_13+","+AlcoholTypeName_char_14+","+AlcoholTypeName_char_15+","+AlcoholTypeName_char_16+","+AlcoholTypeName_char_17+","+AlcoholTypeName_char_18+","+AlcoholTypeName_char_19+","+AlcoholTypeName_char_20+","+AlcoholTypeName_char_21+","+AlcoholTypeName_char_22+","+AlcoholTypeName_char_23+","+AlcoholTypeName_char_24+","+checksum+",&");
                    break;
                }
            }
            else
            {
                sock.write("ERROR");
            }
        }
        // tap daki button cl geri döndürür
        else if(data[0]=='0' && data[1]=='6' && data[2]=='61' && data[18]=='47' && data[20]=='47'  && data[22]=='38' )
        {
            
            for (i=3;i<22;i++)
            {
                if(data[i]=='48')
                {
                    data[i]='0';
                }
                else if(data[i]=='49')
                {
                    data[i]='1';
                }
                else if(data[i]=='50')
                {
                    data[i]='2';
                }
                else if(data[i]=='51')
                {
                    data[i]='3';
                }
                else if(data[i]=='52')
                {
                    data[i]='4';
                }
                else if(data[i]=='53')
                {
                    data[i]='5';
                }
                else if(data[i]=='54')
                {
                    data[i]='6';
                }
                else if(data[i]=='55')
                {
                    data[i]='7';
                }
                else if(data[i]=='56')
                {
                    data[i]='8';
                }
                else if(data[i]=='57')
                {
                    data[i]='9';
                }
            }
            imei="";
            var j=0;
            imei=100000000000000*data[3]+10000000000000*data[4]+1000000000000*data[5];
            imei=imei+100000000000*data[6]+10000000000*data[7]+1000000000*data[8];
            imei=imei+100000000*data[9]+ 10000000*data[10]+1000000*data[11];
            imei=imei+100000*data[12]+10000*data[13]+1000*data[14];
            imei=imei+100*data[15]+10*data[16]+data[17];
            
            GMT=data[19];
            date_=getDateTime_();

            console.log('collector PING = ' + imei);
            update_collectorCommunicationSettings();
            update_collectorCommunicationSettings();

            con.query("UPDATE collectorList SET last_data_datetime = '"+date_ + "', collectorStatusID= '"+ 1 +"' WHERE imei = '"+imei+"'", function (err, result, fields) {
                if (err) throw err;});
            con.query("UPDATE collectorCommunicationSettings SET ip = '"+sock.remoteAddress + "' WHERE imei = '"+imei+"'", function (err, result, fields) {
                if (err) throw err;});
                
            if(data[21]==1 && numOfTaps>0)
            {
                buttonClReal1_1=parseFloat(buttonClReal1_1);
                buttonClReal1_2=parseFloat(buttonClReal1_2);
                buttonClReal1_3=parseFloat(buttonClReal1_3);
                buttonClReal1_4=parseFloat(buttonClReal1_4);
                
                buttonClShown1_1=parseFloat(buttonClShown1_1);
                buttonClShown1_2=parseFloat(buttonClShown1_2);
                buttonClShown1_3=parseFloat(buttonClShown1_3);
                buttonClShown1_4=parseFloat(buttonClShown1_4);

                buttonClReal1_1=buttonClReal1_1*10;
                buttonClReal1_2=buttonClReal1_2*10;
                buttonClReal1_3=buttonClReal1_3*10;
                buttonClReal1_4=buttonClReal1_4*10;
                buttonClShown1_1=buttonClShown1_1*10;
                buttonClShown1_2=buttonClShown1_2*10;
                buttonClShown1_3=buttonClShown1_3*10;
                buttonClShown1_4=buttonClShown1_4*10;
                
                ID_1=parseInt(ID_1, 10);
                var ID_1_HEX=ID_1.toString(16);
                var ID1_1=ID_1_HEX[0]+ID_1_HEX[1];
                var ID1_1=parseInt(ID1_1, 16);
                var ID1_2=ID_1_HEX[2]+ID_1_HEX[3];
                var ID1_2=parseInt(ID1_2, 16);
                var ID1_3=ID_1_HEX[4]+ID_1_HEX[5];
                var ID1_3=parseInt(ID1_3, 16);
                var DataLength=16;
                var checksum= 255+254+242+ID1_1+ID1_2+ID1_3+DataLength+buttonClReal1_1+buttonClShown1_1+buttonClReal1_2+buttonClShown1_2+buttonClReal1_3+buttonClShown1_3+buttonClReal1_4+buttonClShown1_4;
                checksum=checksum%256;
                sock.write('12=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+242+","+buttonClReal1_1+","+buttonClShown1_1+","+buttonClReal1_2+","+buttonClShown1_2+","+buttonClReal1_3+","+buttonClShown1_3+","+buttonClReal1_4+","+buttonClShown1_4+","+checksum+",&");
            }
            if(data[21]==2 && numOfTaps>1)
            {
                buttonClReal2_1=parseFloat(buttonClReal2_1);
                buttonClReal2_2=parseFloat(buttonClReal2_2);
                buttonClReal2_3=parseFloat(buttonClReal2_3);
                buttonClReal2_4=parseFloat(buttonClReal2_4);
                
                buttonClShown2_1=parseFloat(buttonClShown2_1);
                buttonClShown2_2=parseFloat(buttonClShown2_2);
                buttonClShown2_3=parseFloat(buttonClShown2_3);
                buttonClShown2_4=parseFloat(buttonClShown2_4);

                buttonClReal2_1=buttonClReal2_1*10;
                buttonClReal2_2=buttonClReal2_2*10;
                buttonClReal2_3=buttonClReal2_3*10;
                buttonClReal2_4=buttonClReal2_4*10;
                buttonClShown2_1=buttonClShown2_1*10;
                buttonClShown2_2=buttonClShown2_2*10;
                buttonClShown2_3=buttonClShown2_3*10;
                buttonClShown2_4=buttonClShown2_4*10;
                
                ID_1=parseInt(ID_1, 10);
                var ID_1_HEX=ID_1.toString(16);
                var ID1_1=ID_1_HEX[0]+ID_1_HEX[1];
                var ID1_1=parseInt(ID1_1, 16);
                var ID1_2=ID_1_HEX[2]+ID_1_HEX[3];
                var ID1_2=parseInt(ID1_2, 16);
                var ID1_3=ID_1_HEX[4]+ID_1_HEX[5];
                var ID1_3=parseInt(ID1_3, 16);
                var DataLength=16;
                var checksum= 255+254+242+ID1_1+ID1_2+ID1_3+DataLength+buttonClReal2_1+buttonClShown2_1+buttonClReal2_2+buttonClShown2_2+buttonClReal2_3+buttonClShown2_3+buttonClReal2_4+buttonClShown2_4;
                checksum=checksum%256;
                sock.write('12=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+242+","+buttonClReal2_1+","+buttonClShown2_1+","+buttonClReal2_2+","+buttonClShown2_2+","+buttonClReal2_3+","+buttonClShown2_3+","+buttonClReal2_4+","+buttonClShown2_4+","+checksum+",&");
            }
            if(data[21]==3 && numOfTaps>2)
            {
                buttonClReal3_1=parseFloat(buttonClReal3_1);
                buttonClReal3_2=parseFloat(buttonClReal3_2);
                buttonClReal3_3=parseFloat(buttonClReal3_3);
                buttonClReal3_4=parseFloat(buttonClReal3_4);
                
                buttonClShown3_1=parseFloat(buttonClShown3_1);
                buttonClShown3_2=parseFloat(buttonClShown3_2);
                buttonClShown3_3=parseFloat(buttonClShown3_3);
                buttonClShown3_4=parseFloat(buttonClShown3_4);

                buttonClReal3_1=buttonClReal3_1*10;
                buttonClReal3_2=buttonClReal3_2*10;
                buttonClReal3_3=buttonClReal3_3*10;
                buttonClReal3_4=buttonClReal3_4*10;
                buttonClShown3_1=buttonClShown3_1*10;
                buttonClShown3_2=buttonClShown3_2*10;
                buttonClShown3_3=buttonClShown3_3*10;
                buttonClShown3_4=buttonClShown3_4*10;
                
                ID_1=parseInt(ID_1, 10);
                var ID_1_HEX=ID_1.toString(16);
                var ID1_1=ID_1_HEX[0]+ID_1_HEX[1];
                var ID1_1=parseInt(ID1_1, 16);
                var ID1_2=ID_1_HEX[2]+ID_1_HEX[3];
                var ID1_2=parseInt(ID1_2, 16);
                var ID1_3=ID_1_HEX[4]+ID_1_HEX[5];
                var ID1_3=parseInt(ID1_3, 16);
                var DataLength=16;
                var checksum= 255+254+242+ID1_1+ID1_2+ID1_3+DataLength+buttonClReal3_1+buttonClShown3_1+buttonClReal3_2+buttonClShown3_2+buttonClReal3_3+buttonClShown3_3+buttonClReal3_4+buttonClShown3_4;
                checksum=checksum%256;
                sock.write('12=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+242+","+buttonClReal3_1+","+buttonClShown3_1+","+buttonClReal3_2+","+buttonClShown3_2+","+buttonClReal3_3+","+buttonClShown3_3+","+buttonClReal3_4+","+buttonClShown3_4+","+checksum+",&");
            }
            if(data[21]==4 && numOfTaps>3)
            {
                buttonClReal4_1=parseFloat(buttonClReal4_1);
                buttonClReal4_2=parseFloat(buttonClReal4_2);
                buttonClReal4_3=parseFloat(buttonClReal4_3);
                buttonClReal4_4=parseFloat(buttonClReal4_4);
                
                buttonClShown4_1=parseFloat(buttonClShown4_1);
                buttonClShown4_2=parseFloat(buttonClShown4_2);
                buttonClShown4_3=parseFloat(buttonClShown4_3);
                buttonClShown4_4=parseFloat(buttonClShown4_4);

                buttonClReal4_1=buttonClReal4_1*10;
                buttonClReal4_2=buttonClReal4_2*10;
                buttonClReal4_3=buttonClReal4_3*10;
                buttonClReal4_4=buttonClReal4_4*10;
                buttonClShown4_1=buttonClShown4_1*10;
                buttonClShown4_2=buttonClShown4_2*10;
                buttonClShown4_3=buttonClShown4_3*10;
                buttonClShown4_4=buttonClShown4_4*10;
                
                ID_1=parseInt(ID_1, 10);
                var ID_1_HEX=ID_1.toString(16);
                var ID1_1=ID_1_HEX[0]+ID_1_HEX[1];
                var ID1_1=parseInt(ID1_1, 16);
                var ID1_2=ID_1_HEX[2]+ID_1_HEX[3];
                var ID1_2=parseInt(ID1_2, 16);
                var ID1_3=ID_1_HEX[4]+ID_1_HEX[5];
                var ID1_3=parseInt(ID1_3, 16);
                var DataLength=16;
                var checksum= 255+254+242+ID1_1+ID1_2+ID1_3+DataLength+buttonClReal4_1+buttonClShown4_1+buttonClReal4_2+buttonClShown4_2+buttonClReal4_3+buttonClShown4_3+buttonClReal4_4+buttonClShown4_4;
                checksum=checksum%256;
                sock.write('12=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+242+","+buttonClReal4_1+","+buttonClShown4_1+","+buttonClReal4_2+","+buttonClShown4_2+","+buttonClReal4_3+","+buttonClShown4_3+","+buttonClReal4_4+","+buttonClShown4_4+","+checksum+",&");
            }
            if(data[21]==5 && numOfTaps>4)
            {
                buttonClReal5_1=parseFloat(buttonClReal5_1);
                buttonClReal5_2=parseFloat(buttonClReal5_2);
                buttonClReal5_3=parseFloat(buttonClReal5_3);
                buttonClReal5_4=parseFloat(buttonClReal5_4);
                
                buttonClShown5_1=parseFloat(buttonClShown5_1);
                buttonClShown5_2=parseFloat(buttonClShown5_2);
                buttonClShown5_3=parseFloat(buttonClShown5_3);
                buttonClShown5_4=parseFloat(buttonClShown5_4);

                buttonClReal5_1=buttonClReal5_1*10;
                buttonClReal5_2=buttonClReal5_2*10;
                buttonClReal5_3=buttonClReal5_3*10;
                buttonClReal5_4=buttonClReal5_4*10;
                buttonClShown5_1=buttonClShown5_1*10;
                buttonClShown5_2=buttonClShown5_2*10;
                buttonClShown5_3=buttonClShown5_3*10;
                buttonClShown5_4=buttonClShown5_4*10;
                
                ID_1=parseInt(ID_1, 10);
                var ID_1_HEX=ID_1.toString(16);
                var ID1_1=ID_1_HEX[0]+ID_1_HEX[1];
                var ID1_1=parseInt(ID1_1, 16);
                var ID1_2=ID_1_HEX[2]+ID_1_HEX[3];
                var ID1_2=parseInt(ID1_2, 16);
                var ID1_3=ID_1_HEX[4]+ID_1_HEX[5];
                var ID1_3=parseInt(ID1_3, 16);
                var DataLength=16;
                var checksum= 255+254+242+ID1_1+ID1_2+ID1_3+DataLength+buttonClReal5_1+buttonClShown5_1+buttonClReal5_2+buttonClShown5_2+buttonClReal5_3+buttonClShown5_3+buttonClReal5_4+buttonClShown5_4;
                checksum=checksum%256;
                sock.write('12=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+242+","+buttonClReal5_1+","+buttonClShown5_1+","+buttonClReal5_2+","+buttonClShown5_2+","+buttonClReal5_3+","+buttonClShown5_3+","+buttonClReal5_4+","+buttonClShown5_4+","+checksum+",&");
            }
            if(data[21]==6 && numOfTaps>5)
            {
                buttonClReal6_1=parseFloat(buttonClReal6_1);
                buttonClReal6_2=parseFloat(buttonClReal6_2);
                buttonClReal6_3=parseFloat(buttonClReal6_3);
                buttonClReal6_4=parseFloat(buttonClReal6_4);
                
                buttonClShown6_1=parseFloat(buttonClShown6_1);
                buttonClShown6_2=parseFloat(buttonClShown6_2);
                buttonClShown6_3=parseFloat(buttonClShown6_3);
                buttonClShown6_4=parseFloat(buttonClShown6_4);

                buttonClReal6_1=buttonClReal6_1*10;
                buttonClReal6_2=buttonClReal6_2*10;
                buttonClReal6_3=buttonClReal6_3*10;
                buttonClReal6_4=buttonClReal6_4*10;
                buttonClShown6_1=buttonClShown6_1*10;
                buttonClShown6_2=buttonClShown6_2*10;
                buttonClShown6_3=buttonClShown6_3*10;
                buttonClShown6_4=buttonClShown6_4*10;
                
                ID_1=parseInt(ID_1, 10);
                var ID_1_HEX=ID_1.toString(16);
                var ID1_1=ID_1_HEX[0]+ID_1_HEX[1];
                var ID1_1=parseInt(ID1_1, 16);
                var ID1_2=ID_1_HEX[2]+ID_1_HEX[3];
                var ID1_2=parseInt(ID1_2, 16);
                var ID1_3=ID_1_HEX[4]+ID_1_HEX[5];
                var ID1_3=parseInt(ID1_3, 16);
                var DataLength=16;
                var checksum= 255+254+242+ID1_1+ID1_2+ID1_3+DataLength+buttonClReal6_1+buttonClShown6_1+buttonClReal6_2+buttonClShown6_2+buttonClReal6_3+buttonClShown6_3+buttonClReal6_4+buttonClShown6_4;
                checksum=checksum%256;
                sock.write('12=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+242+","+buttonClReal6_1+","+buttonClShown6_1+","+buttonClReal6_2+","+buttonClShown6_2+","+buttonClReal6_3+","+buttonClShown6_3+","+buttonClReal6_4+","+buttonClShown6_4+","+checksum+",&");
            }
            if(data[21]==7 && numOfTaps>6)
            {
                buttonClReal7_1=parseFloat(buttonClReal7_1);
                buttonClReal7_2=parseFloat(buttonClReal7_2);
                buttonClReal7_3=parseFloat(buttonClReal7_3);
                buttonClReal7_4=parseFloat(buttonClReal7_4);
                
                buttonClShown7_1=parseFloat(buttonClShown7_1);
                buttonClShown7_2=parseFloat(buttonClShown7_2);
                buttonClShown7_3=parseFloat(buttonClShown7_3);
                buttonClShown7_4=parseFloat(buttonClShown7_4);

                buttonClReal7_1=buttonClReal7_1*10;
                buttonClReal7_2=buttonClReal7_2*10;
                buttonClReal7_3=buttonClReal7_3*10;
                buttonClReal7_4=buttonClReal7_4*10;
                buttonClShown7_1=buttonClShown7_1*10;
                buttonClShown7_2=buttonClShown7_2*10;
                buttonClShown7_3=buttonClShown7_3*10;
                buttonClShown7_4=buttonClShown7_4*10;
                
                ID_1=parseInt(ID_1, 10);
                var ID_1_HEX=ID_1.toString(16);
                var ID1_1=ID_1_HEX[0]+ID_1_HEX[1];
                var ID1_1=parseInt(ID1_1, 16);
                var ID1_2=ID_1_HEX[2]+ID_1_HEX[3];
                var ID1_2=parseInt(ID1_2, 16);
                var ID1_3=ID_1_HEX[4]+ID_1_HEX[5];
                var ID1_3=parseInt(ID1_3, 16);
                var DataLength=16;
                var checksum= 255+254+242+ID1_1+ID1_2+ID1_3+DataLength+buttonClReal7_1+buttonClShown7_1+buttonClReal7_2+buttonClShown7_2+buttonClReal7_3+buttonClShown7_3+buttonClReal7_4+buttonClShown7_4;
                checksum=checksum%256;
                sock.write('12=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+242+","+buttonClReal7_1+","+buttonClShown7_1+","+buttonClReal7_2+","+buttonClShown7_2+","+buttonClReal7_3+","+buttonClShown7_3+","+buttonClReal7_4+","+buttonClShown7_4+","+checksum+",&");
            }
            if(data[21]==8 && numOfTaps>7)
            {
                buttonClReal8_1=parseFloat(buttonClReal8_1);
                buttonClReal8_2=parseFloat(buttonClReal8_2);
                buttonClReal8_3=parseFloat(buttonClReal8_3);
                buttonClReal8_4=parseFloat(buttonClReal8_4);
                
                buttonClShown8_1=parseFloat(buttonClShown8_1);
                buttonClShown8_2=parseFloat(buttonClShown8_2);
                buttonClShown8_3=parseFloat(buttonClShown8_3);
                buttonClShown8_4=parseFloat(buttonClShown8_4);

                buttonClReal8_1=buttonClReal8_1*10;
                buttonClReal8_2=buttonClReal8_2*10;
                buttonClReal8_3=buttonClReal8_3*10;
                buttonClReal8_4=buttonClReal8_4*10;
                buttonClShown8_1=buttonClShown8_1*10;
                buttonClShown8_2=buttonClShown8_2*10;
                buttonClShown8_3=buttonClShown8_3*10;
                buttonClShown8_4=buttonClShown8_4*10;
                
                ID_1=parseInt(ID_1, 10);
                var ID_1_HEX=ID_1.toString(16);
                var ID1_1=ID_1_HEX[0]+ID_1_HEX[1];
                var ID1_1=parseInt(ID1_1, 16);
                var ID1_2=ID_1_HEX[2]+ID_1_HEX[3];
                var ID1_2=parseInt(ID1_2, 16);
                var ID1_3=ID_1_HEX[4]+ID_1_HEX[5];
                var ID1_3=parseInt(ID1_3, 16);
                var DataLength=16;
                var checksum= 255+254+242+ID1_1+ID1_2+ID1_3+DataLength+buttonClReal8_1+buttonClShown8_1+buttonClReal8_2+buttonClShown8_2+buttonClReal8_3+buttonClShown8_3+buttonClReal8_4+buttonClShown8_4;
                checksum=checksum%256;
                sock.write('12=' + 255+","+254+","+ID1_1+","+ID1_2+","+ID1_3+","+DataLength+","+242+","+buttonClReal8_1+","+buttonClShown8_1+","+buttonClReal8_2+","+buttonClShown8_2+","+buttonClReal8_3+","+buttonClShown8_3+","+buttonClReal8_4+","+buttonClShown8_4+","+checksum+",&");
            }
            
            else
            {
                sock.write("ERROR");
            }
        }
        
        else 
        {
            sock.write("ERROR");
        }
    });
    
    // Add a 'close' event handler to this instance of socket
    sock.on('close', function(data) {
        imei="";
        console.log('CLOSED: ' + sock.remoteAddress +' '+ sock.remotePort);
        con.query("SELECT * FROM  collectorCommunicationSettings WHERE ip = '"+sock.remoteAddress+"'", function (err, result_, fields) {
            if (err) throw err;
            for (var imei in result_)
            {
                var string=JSON.stringify(result_);
                var json =  JSON.parse(string);
                imei= (json[0].imei);
                collectorID= (json[0].collectorID);
                console.log('imei: ' + imei+"offline");
                console.log('collectorID: ' + collectorID+"offline");
                 con.query("UPDATE collectorList SET collectorStatusID = 2 WHERE imei = '"+imei+"'", function (err, result, fields) {if (err) throw err;});
                 con.query("UPDATE tap SET TapStatusID = 2 WHERE collector_id = '"+collectorID+"'", function (err, result, fields) {if (err) throw err;});
                 con.query("UPDATE collectorCommunicationSettings SET TapStatusID = 2 WHERE collectorID = '"+collectorID+"'", function (err, result, fields) {if (err) throw err;});
            }    
        });

    });
    sock.on('error', function(exception) {
      console.log('SOCKET ERROR');
      sock.destroy();
    });
}).listen(PORT, HOST);

//console.log(net);

console.log('Server listening on ' + HOST +':'+ PORT);



function stringToHex(str) {

     let bufStr = Buffer.from(str, 'utf8');
  
     bufStr.toString('hex');
  
     }



function checkDB(arg) {
    
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
         tap_hour=parseInt(tap_hour, 10);
         tap_minute=parseInt(tap_minute, 10);
         tap_second=parseInt(tap_second, 10);
         
         if(tap_hour <= hour && tap_minute<=minute && tap_second < second)
         {
             con.query("UPDATE tap SET TapStatusID = 2 WHERE TapID = '"+_tap_id+"'", function (err, result, fields) {
                 if (err) throw err;});
             console.log(result.affectedRows + " record(s) updated");
             
             con.query("UPDATE collectorCommunicationSettings SET TapStatusID = 2 WHERE tapID = '"+_tap_id+"'", function (err, result, fields) {
                 if (err) throw err;});
             console.log(result.affectedRows + " record(s) updated");
 
         }
     }
     
     //console.log(now);
   });
 }   
 

 setInterval(checkDB, 3000);




