<?php 
class City_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }        
        public function getCityListByCountry($parameters){
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
                                if(is_array($countryId)){
                                        $countryId = join($countryId,",");
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_CITY_BY_COUNTRY_ID('".$accessToken."',".$userId.",'".$countryId."')");
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
        public function getCity($parameters){
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
                        $availableParameters = array("accessToken","userId","cityId");
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
                                $cityId = @$parameters["cityId"];
                                if(!$cityId){
                                        $cityId = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if($cityId!="NULL" && !is_numeric($cityId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"Company Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_CITIES('".$accessToken."',".$userId.",".$cityId.")");
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
        public function addCity($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","CountryID","CityName","PlateNo","PhoneCode"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","CountryID","CityName","PlateNo","PhoneCode");
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
                                $CountryID = addslashes($parameters["CountryID"]);
                                $CityName = addslashes($parameters["CityName"]);
                                $PlateNo = addslashes($parameters["PlateNo"]);
                                $PhoneCode = addslashes($parameters["PhoneCode"]);
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CountryID)){
                                        $response = $this->globalfunctions->returnMessage(1003,"Country Id parametresi numeric olmalıdır.",true);
                                }else
                                if(strlen($PlateNo) > 2){
                                        $response = $this->globalfunctions->returnMessage(69,"Plate no parametresi 2 karakterden uzun olamaz.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_CITIES('".$accessToken."',".$userId.",NULL,".$CountryID.",'".$CityName."','".$PlateNo."','".$PhoneCode."')");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
        public function updateCity($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","CityID","CountryID","CityName","PlateNo","PhoneCode"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","CityID","CountryID","CityName","PlateNo","PhoneCode");
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
                                $CityID = $parameters["CityID"];
                                $CountryID = addslashes($parameters["CountryID"]);
                                $CityName = addslashes($parameters["CityName"]);
                                $PlateNo = addslashes($parameters["PlateNo"]);
                                $PhoneCode = addslashes($parameters["PhoneCode"]);
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(strlen($PlateNo) > 2){
                                        $response = $this->globalfunctions->returnMessage(69,"Plate no parametresi 2 karakterden uzun olamaz.",true);
                                }else
                                if(!is_numeric($CountryID)){
                                        $response = $this->globalfunctions->returnMessage(1003,"CountryID parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_CITIES('".$accessToken."',".$userId.",".$CityID.",".$CountryID.",'".$CityName."','".$PlateNo."','".$PhoneCode."')");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
        public function deleteCity($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","cityId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","cityId");
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
                                $cityId = $parameters["cityId"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($cityId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"cityId parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL DELETE_CITY('".$accessToken."',".$userId.",".$cityId.")");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }

}
?>