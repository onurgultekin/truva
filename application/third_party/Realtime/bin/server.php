<?php
	require __DIR__ . "/../vendor/autoload.php";
	use TruwaApp\TruwaServer;
	use Ratchet\Server\IoServer;
	use Ratchet\Http\HttpServer;
	use Ratchet\WebSocket\WsServer;
	$server = IoServer::factory(new HttpServer(new WsServer(new TruwaServer)), 9876);
	$server->run();
?>