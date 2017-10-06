<?php 
class TotalDailyGuest_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
        
        public function getTotalDailyGuestlist($parameters){
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
                        $availableParameters = array("accessToken","userId","TotalDailyGuestId");
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
                                $TotalDailyGuestId = @$parameters["TotalDailyGuestId"];
                                if(!$TotalDailyGuestId){
                                        $TotalDailyGuestId = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if($TotalDailyGuestId!="NULL" && !is_numeric($TotalDailyGuestId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"TotalDailyGuest Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_TOTAL_DAILY_GUESTS('".$accessToken."',".$userId.",".$TotalDailyGuestId.")");
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
        public function addTotalDailyGuest($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","Date","TotalGuest","CompanyID"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","Date","TotalGuest","CompanyID");
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
                                $Date = $parameters["Date"];
                                $TotalGuest = addslashes($parameters["TotalGuest"]);
                                $CompanyID = $parameters["CompanyID"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!preg_match('/(\d{4})-(\d{2})-(\d{2})/',$Date)){
                                        $response = $this->globalfunctions->returnMessage(10011,"Date parametresi YYYY-MM-DD formatında olmalıdır.",true); 
                                }else
                                if(!is_numeric($CompanyID)){
                                        $response = $this->globalfunctions->returnMessage(1003,"CompanyID parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_TOTAL_DAILY_GUEST('".$accessToken."',".$userId.",NULL,'".$Date."',".$TotalGuest.",".$CompanyID.")");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
        public function updateTotalDailyGuest($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","TotalDailyGuestID","Date","TotalGuest","CompanyID"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","TotalDailyGuestID","Date","TotalGuest","CompanyID");
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
                                $TotalDailyGuestID = $parameters["TotalDailyGuestID"];
                                $Date = $parameters["Date"];
                                $TotalGuest = addslashes($parameters["TotalGuest"]);
                                $CompanyID = $parameters["CompanyID"];
                                if(!is_numeric($TotalDailyGuestID)){
                                        $response = $this->globalfunctions->returnMessage(1009,"TotalDailyGuest Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CompanyID)){
                                        $response = $this->globalfunctions->returnMessage(10010,"CompanyID parametresi numeric olmalıdır.",true);
                                }else
                                if(!preg_match('/(\d{4})-(\d{2})-(\d{2})/',$Date)){
                                        $response = $this->globalfunctions->returnMessage(10011,"Date parametresi YYYY-MM-DD formatında olmalıdır.",true); 
                                }else
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_TOTAL_DAILY_GUEST('".$accessToken."',".$userId.",".$TotalDailyGuestID.",'".$Date."',".$TotalGuest.",".$CompanyID.")");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
        public function deleteTotalDailyGuest($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","TotalDailyGuestId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","TotalDailyGuestId");
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
                                $TotalDailyGuestId = @$parameters["TotalDailyGuestId"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($TotalDailyGuestId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"TotalDailyGuest Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL DELETE_TOTAL_DAILY_GUEST('".$accessToken."',".$userId.",".$TotalDailyGuestId.")");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
}
?>