<?php 
class AlcoholBrand_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
        
        public function getAlcoholBrandlist($parameters){
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
                        $availableParameters = array("accessToken","userId","AlcoholBrandId");
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
                                $AlcoholBrandId = @$parameters["AlcoholBrandId"];
                                if(!$AlcoholBrandId){
                                        $AlcoholBrandId = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if($AlcoholBrandId!="NULL" && !is_numeric($AlcoholBrandId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"AlcoholBrand Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_ALCOHOL_BRANDS('".$accessToken."',".$userId.",".$AlcoholBrandId.")");
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
        public function getAlcoholBrandByAlcoholType($parameters){
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
                                        $response = $this->globalfunctions->returnMessage(1006,"alcoholTypeId parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_ALCOHOL_BRANDS_BY_ALCOHOL_TYPE('".$accessToken."',".$userId.",".$alcoholTypeId.")");
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
                                                        $response["resultCode"] = 56;
                                                        $response["message"] = "Bu alkol tipine ait alkol markası bulunmamaktadır.";
                                                }
                                        }
                                }
                        }
                }
                return $response;
        }
        public function addAlcoholBrand($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","Code","Name","AlcoholTypeID"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","Code","Name","AlcoholTypeID");
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
                                $AlcoholTypeID = $parameters["AlcoholTypeID"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($AlcoholTypeID)){
                                        $response = $this->globalfunctions->returnMessage(1003,"AlcoholTypeID parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_ALCOHOL_BRAND('".$accessToken."',".$userId.",NULL,'".$Code."','".$Name."',".$AlcoholTypeID.")");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
        public function updateAlcoholBrand($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","AlcoholBrandID","Code","Name","AlcoholTypeID"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","AlcoholBrandID","Code","Name","AlcoholTypeID");
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
                                $AlcoholBrandID = $parameters["AlcoholBrandID"];
                                $Code = $parameters["Code"];
                                $Name = addslashes($parameters["Name"]);
                                $AlcoholTypeID = $parameters["AlcoholTypeID"];
                                if(!is_numeric($AlcoholBrandID)){
                                        $response = $this->globalfunctions->returnMessage(1009,"AlcoholBrand Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($AlcoholTypeID)){
                                        $response = $this->globalfunctions->returnMessage(10010,"AlcoholTypeID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_ALCOHOL_BRAND('".$accessToken."',".$userId.",".$AlcoholBrandID.",'".$Code."','".$Name."',".$AlcoholTypeID.")");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
        public function deleteAlcoholBrand($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","alcoholBrandId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","alcoholBrandId");
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
                                $alcoholBrandId = @$parameters["alcoholBrandId"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($alcoholBrandId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"AlcoholBrand Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL DELETE_ALCOHOL_BRAND('".$accessToken."',".$userId.",".$alcoholBrandId.")");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
}
?>