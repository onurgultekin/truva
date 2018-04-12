var net = require('net');
console.log('Hello');
var HOST = '';
var PORT = 6661;
var mysql = require('mysql');

var connection = mysql.createConnection({
    host: "198.38.82.92",
    user: "sametcft_metu",
    password: "e3r4t5",
    database: "sametcft_metu"
   });

   connection.connect(function(err){
    if(err){
      console.log('Database connection error');
    }else{
      console.log('Database connection successful');
    }
  });
// Create a server instance, and chain the listen function to it
// The function passed to net.createServer() becomes the event handler for the 'connection' event
// The sock object the callback function receives UNIQUE for each connection
net.createServer(function(sock) {
    
    // We have a connection - a socket object is assigned to the connection automatically
    console.log('CONNECTED: ' + sock.remoteAddress +':'+ sock.remotePort);
    
    // Add a 'data' event handler to this instance of socket
    sock.on('data', function(data) {
        var i=0;
        console.log( sock.remoteAddress +' '+ sock.remotePort);
        console.log('DATA ' + sock.remoteAddress + ': ' + data);
        // Write the data back to the socket, the client will receive it as data from the server
        sock.write('You said "' + data[0]+ data[1]+ data[2]+ data[3]+ data[4]+ data [5]+ '"');
        for (i=0;i<10;i++)
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
        
        sock.write('after check _' + data[0]+ data[1]+ data[2]+ data[3]+ data[4]+ data [5]+ '"');
        var heat =0;
        if(data[1]=='38')
        {
            heat=data[0];
            sock.write('heat='+heat);
        }
        else if(data[2]=='38')
        {
            heat=10*data[0]+data[1];
            sock.write('heat='+heat);
        }
        else if(data[3]=='38')
        {
            heat=100*data[0]+10*data[1]+data[2];
            sock.write('heat='+ heat);
        }
            
        var record= {  t:(heat)};

        connection.query('INSERT INTO demo SET ?', record, function(err,res){
        console.log('Last record insert id:', res.insertId);
        });
            
    });
    
    // Add a 'close' event handler to this instance of socket
    sock.on('close', function(data) {
        console.log('CLOSED: ' + sock.remoteAddress +' '+ sock.remotePort);
    });
    
}).listen(PORT, HOST);

console.log('Server listening on ' + HOST +':'+ PORT);
