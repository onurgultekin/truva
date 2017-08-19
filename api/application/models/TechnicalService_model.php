<?php 
class TechnicalService_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
        public function getTechnicalServicelist($parameters){
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
                        $availableParameters = array("accessToken","userId","technicalServiceListId");
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
                                $technicalServiceListId = @$parameters["technicalServiceListId"];
                                if(!$technicalServiceListId){
                                        $technicalServiceListId = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if($technicalServiceListId!="NULL" && !is_numeric($technicalServiceListId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"Technical Service List Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_TECHNICAL_SERVICE_LIST('".$accessToken."',".$userId.",".$technicalServiceListId.")");
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
        public function getUsersByTechnicalService($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","technicalServiceListId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","technicalServiceListId");
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
                                $technicalServiceListId = @$parameters["technicalServiceListId"];
                                if(!$technicalServiceListId){
                                        $technicalServiceListId = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($technicalServiceListId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"Technical Service List Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_USERS_BY_TECHNICAL_SERVICE_LIST('".$accessToken."',".$userId.",".$technicalServiceListId.")");
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
        public function getTechnicalServiceUsers($parameters){
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
                                $technicalServiceListId = @$parameters["technicalServiceListId"];
                                if(!$technicalServiceListId){
                                        $technicalServiceListId = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                {
                                        $query = $this->db->query("CALL GET_USERS_BY_ROLE_ID('".$accessToken."',".$userId.",3)");
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
        public function addTechnicalService($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","ServiceName","Adress","InvoiceAddress","TaxNo","TaxAdministrationName","InvoiceTelephone","InvoiceMobile","InvoiceEmail","CountryID","CityID","CountyID","AreaID"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","ServiceName","Adress","InvoiceAddress","TaxNo","TaxAdministrationName","InvoiceTelephone","InvoiceMobile","InvoiceEmail","CountryID","CityID","CountyID","AreaID");
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
                                $ServiceName = $parameters["ServiceName"];
                                $Adress = $parameters["Adress"];
                                $InvoiceAddress = $parameters["InvoiceAddress"];
                                $TaxNo = $parameters["TaxNo"];
                                $TaxAdministrationName = $parameters["TaxAdministrationName"];
                                $InvoiceTelephone = $parameters["InvoiceTelephone"];
                                $InvoiceMobile = $parameters["InvoiceMobile"];
                                $InvoiceEmail = $parameters["InvoiceEmail"];
                                $CountryID = $parameters["CountryID"];
                                $CityID = $parameters["CityID"];
                                $CountyID = $parameters["CountyID"];
                                $AreaID = $parameters["AreaID"];
                                
                                
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CountryID)){
                                        $response = $this->globalfunctions->returnMessage(1002,"Country Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CityID)){
                                        $response = $this->globalfunctions->returnMessage(1002,"City Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CountyID)){
                                        $response = $this->globalfunctions->returnMessage(1002,"County Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($AreaID)){
                                        $response = $this->globalfunctions->returnMessage(1002,"Area Id parametresi numeric olmalıdır.",true);
                                }else{

                                        $query = $this->db->query("CALL ADD_OR_UPDATE_TECHNICAL_SERVICE_LIST('".$accessToken."',".$userId.",NULL,'".$ServiceName."','".$Adress."','".$InvoiceAddress."','".$TaxNo."','".$TaxAdministrationName."','".$InvoiceTelephone."','".$InvoiceMobile."','".$InvoiceEmail."',".$CountryID.",".$CityID.",".$CountyID.",".$AreaID.")");

                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
        public function updateTechnicalService($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","TechnicalServiceListID","ServiceName","Adress","InvoiceAddress","TaxNo","TaxAdministrationName","InvoiceTelephone","InvoiceMobile","InvoiceEmail","CountryID","CityID","CountyID","AreaID"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","TechnicalServiceListID","ServiceName","Adress","InvoiceAddress","TaxNo","TaxAdministrationName","InvoiceTelephone","InvoiceMobile","InvoiceEmail","CountryID","CityID","CountyID","AreaID");
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
                                $TechnicalServiceListID = $parameters["TechnicalServiceListID"];
                                $ServiceName = $parameters["ServiceName"];
                                $Adress = $parameters["Adress"];
                                $InvoiceAddress = $parameters["InvoiceAddress"];
                                $TaxNo = $parameters["TaxNo"];
                                $TaxAdministrationName = $parameters["TaxAdministrationName"];
                                $InvoiceTelephone = $parameters["InvoiceTelephone"];
                                $InvoiceMobile = $parameters["InvoiceMobile"];
                                $InvoiceEmail = $parameters["InvoiceEmail"];
                                $CountryID = $parameters["CountryID"];
                                $CityID = $parameters["CityID"];
                                $CountyID = $parameters["CountyID"];
                                $AreaID = $parameters["AreaID"];
                                
                                
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CountryID)){
                                        $response = $this->globalfunctions->returnMessage(1002,"Country Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CityID)){
                                        $response = $this->globalfunctions->returnMessage(1002,"City Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CountyID)){
                                        $response = $this->globalfunctions->returnMessage(1002,"County Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($AreaID)){
                                        $response = $this->globalfunctions->returnMessage(1002,"Area Id parametresi numeric olmalıdır.",true);
                                }else{

                                        $query = $this->db->query("CALL ADD_OR_UPDATE_TECHNICAL_SERVICE_LIST('".$accessToken."',".$userId.",".$TechnicalServiceListID.",'".$ServiceName."','".$Adress."','".$InvoiceAddress."','".$TaxNo."','".$TaxAdministrationName."','".$InvoiceTelephone."','".$InvoiceMobile."','".$InvoiceEmail."',".$CountryID.",".$CityID.",".$CountyID.",".$AreaID.")");

                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
        public function deleteTechnicalService($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","TechnicalServiceListID"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","TechnicalServiceListID");
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
                                $TechnicalServiceListID = $parameters["TechnicalServiceListID"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($TechnicalServiceListID)){
                                        $response = $this->globalfunctions->returnMessage(1006,"Technical Service List Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL DELETE_TECHNICAL_SERVICE_LIST('".$accessToken."',".$userId.",".$TechnicalServiceListID.")");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
        public function updateUsersTechnicalService($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","UserIDs","TechnicalServiceListID"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","UserIDs","TechnicalServiceListID");
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
                                $UserIDs = $parameters["UserIDs"];
                                $TechnicalServiceListID = $parameters["TechnicalServiceListID"];
                                if(!is_numeric($TechnicalServiceListID)){
                                        $response = $this->globalfunctions->returnMessage(1009,"Technical Service List Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $userIDsArray = [];
                                        if($UserIDs != ""){
                                                $userIDsArray = explode(",",$UserIDs);
                                        }
                                        if(count($userIDsArray) > 0){
                                                foreach ($userIDsArray as $key => $user_id_item) {
                                                        $this->db->close();
                                                        $query = $this->db->query("CALL UPDATE_USER_FOR_TECHNICAL_SERVICE('".$accessToken."',".$userId.",".$user_id_item.",".$TechnicalServiceListID.")");
                                                }
                                        }
                                        
                                                $result = $query->row();
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        
                                }
                        }
                }
                return $response;
        }
       
}
?>