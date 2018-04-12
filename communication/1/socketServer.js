var socket = require( 'socket.io' );
var express = require( 'express' );
var http = require( 'http' );
var app = express();
var server = http.createServer( app );
var io = socket.listen( server );
io.sockets.on( 'connection', function( client ) {
	console.log("a user connected");
	client.on("error",function(data){
		console.log(data);
	})
})
server.listen( 8080 );