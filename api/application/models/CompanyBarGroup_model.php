<?php 
class CompanyBarGroup_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
        
        public function getCompanyBarGrouplist($parameters){
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
                        $availableParameters = array("accessToken","userId","CompanyID");
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
                                $CompanyID = @$parameters["CompanyID"];
                                if(!$CompanyID){
                                        $CompanyID = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if($CompanyID!="NULL" && !is_numeric($CompanyID)){
                                        $response = $this->globalfunctions->returnMessage(1006,"CompanyID parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_COMPANY_BAR_GROUPS('".$accessToken."',".$userId.",".$CompanyID.")");
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
        public function updateCompanyBarGroup($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","CompanyID","barGroups"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","CompanyID","barGroups");
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
                                $CompanyID = $parameters["CompanyID"];
                                $barGroups = $parameters["barGroups"];
                                if(!is_numeric($CompanyID)){
                                        $response = $this->globalfunctions->returnMessage(1009,"CompanyID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $this->db->query("delete from barGroupToCompany where CompanyID = $CompanyID");
                                        $barGroupsArray = [];
                                        if($barGroups != ""){
                                                $barGroupsArray = explode(",",$barGroups);
                                        }
                                        if(count($barGroupsArray) > 0){
                                                foreach ($barGroupsArray as $key => $barGroup) {
                                                        $this->db->close();
                                                        $query = $this->db->query("CALL ADD_COMPANY_BAR_GROUP('".$accessToken."',".$userId.",".$CompanyID.",".$barGroup.")");
                                                }
                                        }
                                        if($barGroups != ""){
                                                $result = $query->row();
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $response = $this->globalfunctions->returnMessage(10001,"Şirkete ait tüm bar grupları kaldırıldı.",0);
                                        }
                                }
                        }
                }
                return $response;
        }
}
?>