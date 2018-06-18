<?php
namespace TruwaApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class TruwaServer implements MessageComponentInterface {
    protected $clients;  //Web kullanıcıları
	protected $mobileClients; //Android tabletler
	
    public function __construct() {
        $this->clients = new \SplObjectStorage();
        $this->mobileClients = new \SplObjectStorage();
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
        
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

	
		$command = json_decode($msg);
	
		if($command != ""){
		
			$this->parseCommand($from,$command);
		}
		
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
		if($this->clients->contains($conn)){
			$this->clients->detach($conn);
		}

		if($this->mobileClients->contains($conn)){
			$this->mobileClients->detach($conn);
		}

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
    
    
    //Command parser
    private function parseCommand(ConnectionInterface $from, $command){
		
		if($command->command == "rename"){
			$this->setClientId($from,$command);
			

		}else if($command->command == "config"){
			$this->sendConfiguration($from,$command);

		}else if($command->command == "image"){
			
			//açılış ekranı resmi için  istediğiniz versiyonu setleyebilirsiniz örneğin:
			$value = "{version:1.1,url:'http://truwa.com/image11.svg'}";
			$command->value = $value;
			$this->sendtoMobile($command);
			

		}else if($command->command == "logo"){

			//logo için de istediğiniz versiyonu setleyebilirsiniz örneğin:
			$value = "{version:1.1,url:'http://truwa.com/logo11.svg'}";
			$command->value = $value;
			$this->sendtoMobile($command);
			

		}else if($command->command == "update"){
			//eğer update ise istediğiniz versiyonu setleyebilirsiniz örneğin
			$value = "{version:1.1,url:'http://truwa.com/app/app11.apk'}";
			$command->value = $value;
			$this->sendtoMobile($command);
			
		}else if($command->command == "reply"){
			$this->sendtoWeb($command);
		}else{
			$this->sendtoMobile($command);
		}
	
	}
    
    
    
    //mobile functions
    
    private function sendConfiguration($command){
		//check from id with token
		//read configuration from db 
		
		$config = "config as php array or object";
		$command->value = $config;
		$command->vtype="string";
		
		$this->sendtoMobile($command);
	}




    
    //Helper 
    
   private function setClientId(ConnectionInterface $from, $command){
		$from->resourceId = $command->id;
			
		if($command->type == "mobile"){
			$this->clients->detach($from);
			$this->mobileClients->attach($from);
			
			$from->send("{command: 'rename',type:'mobile',id:'".$command->id."',value: 'ok',vtype:'string',date: ".$command->date.",to:''}");
		}else if($command->type == "web"){
			//do nothing
			$from->send("{command: 'rename',type:'web',id:'".$command->id."',value: 'ok',vtype:'string',date: ".$command->date.",to:''}");
		}else{
			$this->clients->detach($from);
		}
	}


    //Tüm tabletlere mesaj göndermek için
    
    private function sendtoMobile($command){
		$to = json_decode($command->to);
		$commandString = json_encode($command);

		if($to == "all"){
			foreach ($this->mobileClients as $client) {
				$client->send($commandString);
			}
		}else if(is_array($command->to) ){
			foreach ($this->mobileClients as $client) {
				if(in_array($client->resourceId,$to)){
					$client->send($commandString);
				}
			}
		}else if($to !== ""){
			foreach ($this->mobileClients as $client) {
				if($client->resourceId === $to){
					$client->send($commandString);
				}
			}
			
		}
	}
	
	
	private function sendtoWeb($command){
		$to = json_decode($command->to);
		$commandString = json_encode($command);

		foreach ($this->clients as $client) {
			if($client->resourceId === $to){
				$client->send($commandString);
			}
		}
		return $commandString;
	}
}
