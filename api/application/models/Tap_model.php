<?php 
class Tap_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
        
        public function getTap($parameters){
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
                        $availableParameters = array("accessToken","userId","tapId");
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
                                $tapId = @$parameters["tapId"];
                                if(!$tapId){
                                        $tapId = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if($tapId!="NULL" && !is_numeric($tapId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"tapId parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_TAPS('".$accessToken."',".$userId.",".$tapId.")");
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
        public function getTapByBarGroupId($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","barGroupId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","barGroupId");
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
                                $barGroupId = $parameters["barGroupId"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($barGroupId)){
                                        $response = $this->globalfunctions->returnMessage(1007,"barGroupId parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_TAP_BY_BAR_GROUP_ID('".$accessToken."',".$userId.",".$barGroupId.")");
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
        public function addTap($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","BinaryCode","TripleCode","CountryName","PhoneCode"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","BinaryCode","TripleCode","CountryName","PhoneCode");
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
                                $BinaryCode = addslashes($parameters["BinaryCode"]);
                                $TripleCode = addslashes($parameters["TripleCode"]);
                                $CountryName = addslashes($parameters["CountryName"]);
                                $PhoneCode = addslashes($parameters["PhoneCode"]);
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(strlen($BinaryCode) > 2){
                                        $response = $this->globalfunctions->returnMessage(69,"Binary code parametresi 2 karakterden uzun olamaz.",true);
                                }else
                                if(strlen($TripleCode) > 3){
                                        $response = $this->globalfunctions->returnMessage(70,"Triple code parametresi 3 karakterden uzun olamaz.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_TAPS('".$accessToken."',".$userId.",NULL,'".$BinaryCode."','".$TripleCode."','".$CountryName."','".$PhoneCode."')");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
        public function updateTap($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","CountryID","BinaryCode","TripleCode","CountryName","PhoneCode"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","CountryID","BinaryCode","TripleCode","CountryName","PhoneCode");
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
                                $CountryID = $parameters["CountryID"];
                                $BinaryCode = addslashes($parameters["BinaryCode"]);
                                $TripleCode = addslashes($parameters["TripleCode"]);
                                $CountryName = addslashes($parameters["CountryName"]);
                                $PhoneCode = addslashes($parameters["PhoneCode"]);
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(strlen($BinaryCode) > 2){
                                        $response = $this->globalfunctions->returnMessage(69,"Binary code parametresi 2 karakterden uzun olamaz.",true);
                                }else
                                if(strlen($TripleCode) > 3){
                                        $response = $this->globalfunctions->returnMessage(70,"Triple code parametresi 3 karakterden uzun olamaz.",true);
                                }else
                                if(!is_numeric($CountryID)){
                                        $response = $this->globalfunctions->returnMessage(1003,"CountryID parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_TAPS('".$accessToken."',".$userId.",".$CountryID.",'".$BinaryCode."','".$TripleCode."','".$CountryName."','".$PhoneCode."')");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
        public function deleteTap($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","countryId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","countryId");
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
                                $countryId = $parameters["countryId"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($countryId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"countryId parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL DELETE_TAP('".$accessToken."',".$userId.",".$countryId.")");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
}
?>