<?php 
class TechnicalServiceForm_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
        public function getTechnicalServiceForm($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","technicalServiceFormID","technicalServiceReportTypeID","beginDate","endDate","declaredUserID","receivedUserID","completedUserID","description","technicalServicePriorityID","technicalServiceStatusID","companyID","tapID"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","technicalServiceFormID","technicalServiceReportTypeID","beginDate","endDate","declaredUserID","receivedUserID","completedUserID","description","technicalServicePriorityID","technicalServiceStatusID","companyID","tapID");
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
                                $technicalServiceFormID = $parameters["technicalServiceFormID"];
                                $technicalServiceReportTypeID = $parameters["technicalServiceReportTypeID"];
                                $beginDate = $parameters["beginDate"];
                                $endDate = $parameters["endDate"];
                                $declaredUserID = $parameters["declaredUserID"];
                                $receivedUserID = $parameters["receivedUserID"];
                                $completedUserID = $parameters["completedUserID"];
                                $description = $parameters["description"];
                                $technicalServicePriorityID = $parameters["technicalServicePriorityID"];
                                $technicalServiceStatusID = $parameters["technicalServiceStatusID"];
                                $companyID = $parameters["companyID"];
                                $tapID = $parameters["tapID"];

                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_TECHNICAL_SERVICE_FORM('".$accessToken."',".$userId.",".$technicalServiceFormID.",".$technicalServiceReportTypeID.",".$beginDate.",".$endDate.",".$declaredUserID.",".$receivedUserID.",".$completedUserID.",".$description.",".$technicalServicePriorityID.",".$companyID.",".$tapID.")");
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
        public function addTechnicalServiceForm($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","technicalServiceReportTypeID","beginDate","endDate","declaredUserID","receivedUserID","completedUserID","description","technicalServicePriorityID","technicalServiceStatusID","companyID","tapID"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","technicalServiceReportTypeID","beginDate","endDate","declaredUserID","receivedUserID","completedUserID","description","technicalServicePriorityID","technicalServiceStatusID","companyID","tapID");
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
                                
                                $technicalServiceReportTypeID = $parameters["technicalServiceReportTypeID"];
                                $beginDate = $parameters["beginDate"];
                                $endDate = $parameters["endDate"];
                                $declaredUserID = $parameters["declaredUserID"];
                                $receivedUserID = $parameters["receivedUserID"];
                                $completedUserID = $parameters["completedUserID"];
                                $description = $parameters["description"];
                                $technicalServicePriorityID = $parameters["technicalServicePriorityID"];
                                $technicalServiceStatusID = $parameters["technicalServiceStatusID"];
                                $companyID = $parameters["companyID"];
                                $tapID = $parameters["tapID"];
                                
                                
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else{

                                        $query = $this->db->query("CALL ADD_OR_UPDATE_TECHNICAL_SERVICE_FORM('".$accessToken."',".$userId.",null,".$technicalServiceReportTypeID.",".$beginDate.",".$endDate.",".$declaredUserID.",".$receivedUserID.",".$completedUserID.",'".$description."',".$technicalServicePriorityID.",".$technicalServiceStatusID.",".$companyID.",".$tapID.")");

                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
        public function updateTechnicalServiceForm($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","technicalServiceFormID","technicalServiceReportTypeID","beginDate","endDate","declaredUserID","receivedUserID","completedUserID","description","technicalServicePriorityID","technicalServiceStatusID","companyID","tapID"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","technicalServiceFormID","technicalServiceReportTypeID","beginDate","endDate","declaredUserID","receivedUserID","completedUserID","description","technicalServicePriorityID","technicalServiceStatusID","companyID","tapID");
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
                                $technicalServiceFormID = $parameters["technicalServiceFormID"];
                                $technicalServiceReportTypeID = $parameters["technicalServiceReportTypeID"];
                                $beginDate = $parameters["beginDate"];
                                $endDate = $parameters["endDate"];
                                $declaredUserID = $parameters["declaredUserID"];
                                $receivedUserID = $parameters["receivedUserID"];
                                $completedUserID = $parameters["completedUserID"];
                                $description = $parameters["description"];
                                $technicalServicePriorityID = $parameters["technicalServicePriorityID"];
                                $technicalServiceStatusID = $parameters["technicalServiceStatusID"];
                                $companyID = $parameters["companyID"];
                                $tapID = $parameters["tapID"];
                                
                                
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else{

                                        $query = $this->db->query("CALL ADD_OR_UPDATE_TECHNICAL_SERVICE_FORM('".$accessToken."',".$userId.",".$technicalServiceFormID.",".$technicalServiceReportTypeID.",".$beginDate.",".$endDate.",".$declaredUserID.",".$receivedUserID.",".$completedUserID.",'".$description."',".$technicalServicePriorityID.",".$technicalServiceStatusID.",".$companyID.",".$tapID.")");

                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }                                
                        }
                }
                return $response;
        }

        public function getTechnicalServiceStatus($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","technicalServiceStatusId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","technicalServiceStatusId");
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
                                $technicalServiceStatusId = @$parameters["technicalServiceStatusId"];
                                if(!$technicalServiceStatusId){
                                        $technicalServiceStatusId = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if($technicalServiceStatusId!="NULL" && !is_numeric($technicalServiceStatusId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"Technical Service Status Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_TECHNICAL_SERVICE_STATUS('".$accessToken."',".$userId.",".$technicalServiceStatusId.")");
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
        public function getTechnicalServiceReportType($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","technicalServiceReportTypeId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","technicalServiceReportTypeId");
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
                                $technicalServiceReportTypeId = @$parameters["technicalServiceReportTypeId"];
                                if(!$technicalServiceReportTypeId){
                                        $technicalServiceReportTypeId = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if($technicalServiceReportTypeId!="NULL" && !is_numeric($technicalServiceReportTypeId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"Technical Service Report Type Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_TECHNICAL_SERVICE_REPORT_TYPE('".$accessToken."',".$userId.",".$technicalServiceReportTypeId.")");
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
        public function getTechnicalServicePriority($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","technicalServicePriorityId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","technicalServicePriorityId");
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
                                $technicalServicePriorityId = @$parameters["technicalServicePriorityId"];
                                if(!$technicalServicePriorityId){
                                        $technicalServicePriorityId = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if($technicalServicePriorityId!="NULL" && !is_numeric($technicalServicePriorityId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"technical Service Priority Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_TECHNICAL_SERVICE_PRIORITY('".$accessToken."',".$userId.",".$technicalServicePriorityId.")");
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


}
?>