<?php 
class Collector_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
        
        public function getCollectorList($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","collectorId");
                        foreach ($parameters as $key => $parameter) {
                                if(!in_array($key,$availableParameters)){
                                        $i++;
                                }
                        }
                        if($i>0){
                                $response = $this->globalfunctions->returnMessage(1001,"Geçersiz istek. Bilinmeyen parametre girdiniz.",true);
                        }else{
                                $accessToken = $parameters["accessToken"];
                                $userId = $parameters["userId"];
                                $collectorId = @$parameters["collectorId"];
                                if(!$collectorId){
                                        $collectorId = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if($collectorId!="NULL" && !is_numeric($collectorId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"collectorId parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_COLLECTORS('".$accessToken."',".$userId.",".$collectorId.")");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $response["message"] = $query->result();
                                        }
                                }
                        }
                }
                return $response;
        }
        public function addCollector($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","notification_email","eth_mac_address","wifi_mac_address","Barcode","Latitude","Longitude");
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","notification_email","eth_mac_address","wifi_mac_address","Barcode","Latitude","Longitude");
                        foreach ($parameters as $key => $parameter) {
                                if(!in_array($key,$availableParameters)){
                                        $i++;
                                }
                        }
                        if($i>0){
                                $response = $this->globalfunctions->returnMessage(1001,"Geçersiz istek. Bilinmeyen parametre girdiniz.",true);
                        }else{
                                $accessToken = $parameters["accessToken"];
                                $userId = $parameters["userId"];
                                $notification_email = $parameters["notification_email"];
                                $eth_mac_address = $parameters["eth_mac_address"];
                                $wifi_mac_address = $parameters["wifi_mac_address"];
                                $Barcode = $parameters["Barcode"];
                                $Latitude = $parameters["Latitude"];
                                $Longitude = $parameters["Longitude"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_COLLECTORS('".$accessToken."',".$userId.",NULL,'".$notification_email."','".$eth_mac_address."','".$wifi_mac_address."','".$Barcode."','".$Latitude."','".$Longitude."')");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $collectorID = $result->collector_id;
                                                $device_key = $this->createDeviceKey($collectorID, $eth_mac_address.$wifi_mac_address);
                                                $this->db->close();
                                                $auth_key = $this->createAuthenticationKey($device_key, $notification_email);
                                                $query = $this->db->query("CALL CREATE_COLLECTOR_AUTHENTICATION('".$accessToken."',".$userId.",".$collectorID.",'".$device_key."','".$auth_key."','".$eth_mac_address."','".$wifi_mac_address."')");
                                                $result = $query->row();
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }
                                }
                        }
                }
                return $response;
        }
        public function createDeviceKey($collectorID, $mac) {
                $_mac_array = str_replace(":", "", $mac);
                $deviceKey = "hotel".($collectorID % 10).$_mac_array;
                return $deviceKey;
        }
        public function createAuthenticationKey($key, $email) {
                $options = [
                    'cost' => 11,
                    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
                ];
                $_str = $key.$email;
                return @password_hash($_str, PASSWORD_BCRYPT, $options);
        }
}
?>