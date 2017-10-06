<?php 
class AlcoholType_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
        
        public function getAlcoholTypelist($parameters){
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
                        $availableParameters = array("accessToken","userId","AlcoholTypeId");
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
                                $AlcoholTypeId = @$parameters["AlcoholTypeId"];
                                if(!$AlcoholTypeId){
                                        $AlcoholTypeId = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if($AlcoholTypeId!="NULL" && !is_numeric($AlcoholTypeId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"AlcoholType Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_ALCOHOL_TYPES('".$accessToken."',".$userId.",".$AlcoholTypeId.")");
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
        public function getAlcoholTypeByAlcoholGroup($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","alcoholGroupId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","alcoholGroupId");
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
                                $alcoholGroupId = @$parameters["alcoholGroupId"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($alcoholGroupId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"alcoholGroupId parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_ALCOHOL_TYPES_BY_ALCOHOL_GROUP('".$accessToken."',".$userId.",".$alcoholGroupId.")");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                if($query->num_rows() > 0){
                                                        $response["result"] = true;
                                                        $response["resultCode"] = 0;
                                                        $response["message"] = $query->result();
                                                }else{
                                                        $response["result"] = false;
                                                        $response["resultCode"] = 50;
                                                        $response["message"] = "Bu alkol grubuna ait alkol tipi bulunmamaktadır.";
                                                }
                                        }
                                }
                        }
                }
                return $response;
        }
        public function addAlcoholType($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","Code","Name","AlcoholGroupID"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","Code","Name","AlcoholGroupID");
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
                                $Code = $parameters["Code"];
                                $Name = addslashes($parameters["Name"]);
                                $AlcoholGroupID = $parameters["AlcoholGroupID"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($AlcoholGroupID)){
                                        $response = $this->globalfunctions->returnMessage(1003,"AlcoholGroupID parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_ALCOHOL_TYPE('".$accessToken."',".$userId.",NULL,'".$Code."','".$Name."',".$AlcoholGroupID.")");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
        public function updateAlcoholType($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","AlcoholTypeID","Code","Name","AlcoholGroupID"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","AlcoholTypeID","Code","Name","AlcoholGroupID");
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
                                $AlcoholTypeID = $parameters["AlcoholTypeID"];
                                $Code = $parameters["Code"];
                                $Name = addslashes($parameters["Name"]);
                                $AlcoholGroupID = $parameters["AlcoholGroupID"];
                                if(!is_numeric($AlcoholTypeID)){
                                        $response = $this->globalfunctions->returnMessage(1009,"AlcoholType Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($AlcoholGroupID)){
                                        $response = $this->globalfunctions->returnMessage(10010,"AlcoholGroupID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_ALCOHOL_TYPE('".$accessToken."',".$userId.",".$AlcoholTypeID.",'".$Code."','".$Name."',".$AlcoholGroupID.")");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
        public function deleteAlcoholType($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","alcoholTypeId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","alcoholTypeId");
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
                                $alcoholTypeId = @$parameters["alcoholTypeId"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($alcoholTypeId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"AlcoholType Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL DELETE_ALCOHOL_TYPE('".$accessToken."',".$userId.",".$alcoholTypeId.")");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
}
?>