/*
*   Gokhan Gokce
*   Sample javascript file
*/

var SocketApp = function(){

    var msg = {command: "",type:"web",id:"",value: "",vtype:"",date: 0,to:""};
    var ws;

    // Websocket desteği için flash polyfill i yüklüyoruz (eski internet explorerlar için)
    WEB_SOCKET_SWF_LOCATION = "lib/WebSocketMain.swf";
    // debug modunu açıyoruz:
    WEB_SOCKET_DEBUG = true;


    var handleLoad = function(){
        ws = new WebSocket("ws://truwa.co:9876/");

        // Set event handlers.
        ws.onopen = function() {
            console.log("bağlandı");
            createCommand("rename","","","");
        };
        
        ws.onmessage = function(e) {
            // e.data contains received string.
            console.log("Mesaj: " + e.data);
        };
        
        ws.onclose = function() {
            console.log("Bağlantı kapandı!");
        };
        
        ws.onerror = function() {
            console.log("Hata Oluştu");
        };
    }

    var createCommand = function(command,value,vtype,to){
        var temp = JSON.parse(JSON.stringify(msg));
        temp.command= command;
        temp.value = value;
        temp.vtype = vtype;
        temp.date = Date.now();
        temp.to = to;

        ws.send(JSON.stringify(temp));
    }

    return{
        init:function(csrf){
            msg.id = csrf;
            handleLoad();
        },
        close:function(){
            ws.close();
        },
        reset:function(mac){
            createCommand("reset","","",mac);
        },
        disable:function(mac,status){ // status 1 veya 0
            createCommand("disable",status.toString(),"int",mac);
        },
        update:function(mac,version,url){
            var updatejson = {version:version,url:url}; //temel güncelleme 
            createCommand("update",JSON.stringify(updatejson),"string",mac);
        },
        speed:function(mac,speed){
            console.log(mac,speed);
            createCommand("speed",speed.toString(),"int",mac);
        },
        temperature:function(mac){
            createCommand("temperature","","int",mac);
        },
        image:function(mac,version,url){
            var imagejson = {version:version,url:url}; //temel güncelleme 
            createCommand("image",JSON.stringify(imagejson),"string",mac);
        },
        logo:function(mac,version,url){
            var imagejson = {version:version,url:url}; //temel güncelleme 
            createCommand("logo",JSON.stringify(imagejson),"string",mac);
        },
        language:function(mac,json){
            var lang = {type:"new",language:"en",gui:[{key:"",value:""},{key:"",value:""}]}; //Key value array şeklinde olacak. type "new" ise sıfırdan tüm dosyayı yazar. update ise ekleme yapar.  
            createCommand("language",JSON.stringify(lang),"string",mac);
        },
        errormsg:function(mac,json){
            var errorjson = {type:"new",language:"en",errors:[{key:"",value:""},{key:"",value:""}]}; //Key value array şeklinde olacak. type "new" ise sıfırdan tüm dosyayı yazar. update ise ekleme yapar.  
            createCommand("errormsg",JSON.stringify(errorjson),"string",mac);
        },
        config:function(){
            createCommand("config","","",mac); //backend de cihaza kendisiyle ilgili config dosyası gönderilecek
        },
    };
}();