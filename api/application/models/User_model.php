<?php 
class User_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
        
        public function getUserList($parameters){
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
                        $availableParameters = array("accessToken","userId","userListId");
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
                                $userListId = @$parameters["userListId"];
                                if(!$userListId){
                                        $userListId = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if($userListId!="NULL" && !is_numeric($userListId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"userListId parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_USERS('".$accessToken."',".$userId.",".$userListId.")");
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

        public function getUserLog($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","dateBegin","dateEnd"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","dateBegin","dateEnd");
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
                                $dateBegin = @$parameters["dateBegin"];
                                $dateEnd = @$parameters["dateEnd"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_USER_LOG('".$accessToken."',".$userId.",'".$dateBegin."','".$dateEnd."')");
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
        public function getUserGroupList($parameters){
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
                        $availableParameters = array("accessToken","userId");
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
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_USER_GROUPS('".$accessToken."',".$userId.")");
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
        public function addUser($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","first_name","last_name","user_email","user_password","CompanyID","phone","group_id","address","country_id","city_id","county_id","postcode"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","first_name","last_name","user_email","user_password","HoldingID","CompanyID","phone","group_id","address","country_id","city_id","county_id","postcode");
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
                                $first_name = addslashes($parameters["first_name"]);
                                $last_name = addslashes($parameters["last_name"]);
                                $user_email = addslashes($parameters["user_email"]);
                                $user_password = addslashes($parameters["user_password"]);
                                $HoldingID = @$parameters["HoldingID"];
                                $CompanyID = $parameters["CompanyID"];
                                $phone = $parameters["phone"];
                                $group_id = $parameters["group_id"];
                                $address = $parameters["address"];
                                $country_id = $parameters["country_id"];
                                $city_id = $parameters["city_id"];
                                $county_id = $parameters["county_id"];
                                $postcode = $parameters["postcode"];
                                if(!$HoldingID){
                                        $HoldingID = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if($HoldingID!="NULL" && !is_numeric($HoldingID)){
                                        $response = $this->globalfunctions->returnMessage(1003,"HoldingID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CompanyID)){
                                        $response = $this->globalfunctions->returnMessage(1004,"CompanyID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($group_id)){
                                        $response = $this->globalfunctions->returnMessage(1005,"group_id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($country_id)){
                                        $response = $this->globalfunctions->returnMessage(1006,"country_id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($city_id)){
                                        $response = $this->globalfunctions->returnMessage(1007,"city_id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($county_id)){
                                        $response = $this->globalfunctions->returnMessage(1008,"county_id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_USER('".$accessToken."',".$userId.",NULL,'".$this->input->ip_address()."','".$first_name."','".$last_name."','".$user_email."','".$user_password."',".$HoldingID.",".$CompanyID.",'".$phone."',".$group_id.",'".$address."',".$country_id.",".$city_id.",".$county_id.",'".$postcode."')");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,$result->isError);
                                }
                        }
                }
                return $response;
        }
        public function updateUser($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","id","first_name","last_name","user_email","CompanyID","phone","group_id","address","country_id","city_id","county_id","postcode"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","id","first_name","last_name","user_email","HoldingID","CompanyID","phone","group_id","address","country_id","city_id","county_id","postcode");
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
                                $id = $parameters["id"];
                                $first_name = addslashes($parameters["first_name"]);
                                $last_name = addslashes($parameters["last_name"]);
                                $user_email = addslashes($parameters["user_email"]);
                                $HoldingID = @$parameters["HoldingID"];
                                $CompanyID = $parameters["CompanyID"];
                                $phone = $parameters["phone"];
                                $group_id = $parameters["group_id"];
                                $address = $parameters["address"];
                                $country_id = $parameters["country_id"];
                                $city_id = $parameters["city_id"];
                                $county_id = $parameters["county_id"];
                                $postcode = $parameters["postcode"];
                                if(!$HoldingID){
                                        $HoldingID = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($id)){
                                        $response = $this->globalfunctions->returnMessage(1009,"id parametresi numeric olmalıdır.",true);
                                }else
                                if($HoldingID!="NULL" && !is_numeric($HoldingID)){
                                        $response = $this->globalfunctions->returnMessage(1003,"HoldingID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CompanyID)){
                                        $response = $this->globalfunctions->returnMessage(1004,"CompanyID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($group_id)){
                                        $response = $this->globalfunctions->returnMessage(1005,"group_id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($country_id)){
                                        $response = $this->globalfunctions->returnMessage(1006,"country_id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($city_id)){
                                        $response = $this->globalfunctions->returnMessage(1007,"city_id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($county_id)){
                                        $response = $this->globalfunctions->returnMessage(1008,"county_id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_USER('".$accessToken."',".$userId.",".$id.",'".$this->input->ip_address()."','".$first_name."','".$last_name."','".$user_email."','NULL',".$HoldingID.",".$CompanyID.",'".$phone."',".$group_id.",'".$address."',".$country_id.",".$city_id.",".$county_id.",'".$postcode."')");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,$result->isError);
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