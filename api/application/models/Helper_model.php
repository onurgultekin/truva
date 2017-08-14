<?php 
class Helper_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
        
        public function getLastTapData($parameters){
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
                                        $query = $this->db->query("CALL GET_LAST_TAP_DATA('".$accessToken."',".$userId.")");
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
        public function getLeftSideMenu($parameters){
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
                                        $query = $this->db->query("CALL GET_LEFT_SIDE_MENU('".$accessToken."',".$userId.")");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $result = $query->result_array();
                                                foreach($result as $key => &$item) {
                                                    $items[$item['MenuID']] = &$item;
                                                    $items[$item['MenuID']]['children'] = array();
                                                }
                                                foreach($result as $key => &$item){
                                                    if($item['ParentId'] && isset($items[$item['ParentId']]))
                                                        $items [$item['ParentId']]['children'][] = &$item;
                                                }
                                                $i = 0;

                                                foreach($result as $key => &$item) {
                                                    if($item['ParentId'] && isset($items[$item['ParentId']])) unset($result[$key]); }
                                                        foreach ($result as $row) { $data[$i++] = $row; 
                                                }
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $response["message"] = $data;
                                        }
                                }
                        }
                }
                return $response;
        }
        public function getTotalCompany($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","holdingId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","holdingId");
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
                                $holdingId = $parameters["holdingId"];
                                if(!$holdingId){
                                        $holdingId = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if($holdingId!="NULL" && !is_numeric($holdingId)){
                                        $response = $this->globalfunctions->returnMessage(1003,"holdingId parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_TOTAL_COMPANY('".$accessToken."',".$userId.",".$holdingId.")");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $response["message"] = $result->total;
                                        }
                                }
                        }
                }
                return $response;
        }
        public function getTotalTap($parameters){
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
                                        $query = $this->db->query("CALL GET_TOTAL_TAP('".$accessToken."',".$userId.")");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $response["message"] = $result->total;
                                        }
                                }
                        }
                }
                return $response;
        }
        public function getTotalActiveTap($parameters){
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
                                        $query = $this->db->query("CALL GET_TOTAL_ACTIVE_TAP('".$accessToken."',".$userId.")");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $response["message"] = $result->total;
                                        }
                                }
                        }
                }
                return $response;
        }
        public function getTotalActiveTapByHoldingID($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","holdingId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","holdingId");
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
                                $holdingId = $parameters["holdingId"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($holdingId)){
                                        $response = $this->globalfunctions->returnMessage(1003,"holdingId parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_TOTAL_ACTIVE_TAP_BY_HOLDING_ID('".$accessToken."',".$userId.",".$holdingId.")");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $response["message"] = $result->total;
                                        }
                                }
                        }
                }
                return $response;
        }
        public function getTotalActiveTapByCompanyID($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","companyId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","companyId");
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
                                $companyId = $parameters["companyId"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($companyId)){
                                        $response = $this->globalfunctions->returnMessage(1003,"companyId parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_TOTAL_ACTIVE_TAP_BY_COMPANY_ID('".$accessToken."',".$userId.",".$companyId.")");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $response["message"] = $result->total;
                                        }
                                }
                        }
                }
                return $response;
        }
        public function getTotalActiveTapByBarGroupID($parameters){
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
                                        $response = $this->globalfunctions->returnMessage(1003,"barGroupId parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_TOTAL_ACTIVE_TAP_BY_BAR_GROUP_ID('".$accessToken."',".$userId.",".$barGroupId.")");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $response["message"] = $result->total;
                                        }
                                }
                        }
                }
                return $response;
        }
        public function getActiveTapByTapID($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","tapId"); 
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
                                $tapId = $parameters["tapId"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($tapId)){
                                        $response = $this->globalfunctions->returnMessage(1003,"tapId parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_TOTAL_ACTIVE_TAP_BY_TAP_ID('".$accessToken."',".$userId.",".$tapId.")");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $response["message"] = $result->total;
                                        }
                                }
                        }
                }
                return $response;
        }
        public function getAlcoholTypePercentage($parameters){
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
                                        $query = $this->db->query("CALL GET_ALCOHOL_TYPE_PERCENTAGE('".$accessToken."',".$userId.")");
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
        public function getTotalBarGroupByHoldingID($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","holdingId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","holdingId");
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
                                $holdingId = $parameters["holdingId"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($holdingId)){
                                        $response = $this->globalfunctions->returnMessage(1003,"holdingId parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_TOTAL_BAR_GROUP_BY_HOLDING_ID('".$accessToken."',".$userId.",".$holdingId.")");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $response["message"] = $result->total;
                                        }
                                }
                        }
                }
                return $response;
        }
        public function getTotalBarGroupByCompanyID($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","companyId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","companyId");
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
                                $companyId = $parameters["companyId"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($companyId)){
                                        $response = $this->globalfunctions->returnMessage(1003,"companyId parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_TOTAL_BAR_GROUP_BY_COMPANY_ID('".$accessToken."',".$userId.",".$companyId.")");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $response["message"] = $result->total;
                                        }
                                }
                        }
                }
                return $response;
        }
        public function getTotalBarGroupByBarGroupID($parameters){
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
                                        $response = $this->globalfunctions->returnMessage(1003,"barGroupId parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_TOTAL_BAR_GROUP_BY_BAR_GROUP_ID('".$accessToken."',".$userId.",".$barGroupId.")");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $response["message"] = $result->total;
                                        }
                                }
                        }
                }
                return $response;
        }
        public function getTotalBarGroupByTapID($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","tapId"); 
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
                                $tapId = $parameters["tapId"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($tapId)){
                                        $response = $this->globalfunctions->returnMessage(1003,"tapId parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_TOTAL_BAR_GROUP_BY_TAP_ID('".$accessToken."',".$userId.",".$tapId.")");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $response["message"] = $result->total;
                                        }
                                }
                        }
                }
                return $response;
        }
        public function getTotalDailyCostForDailyByHoldingID($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","holdingId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","holdingId");
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
                                $holdingId = $parameters["holdingId"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($holdingId)){
                                        $response = $this->globalfunctions->returnMessage(1003,"holdingId parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_TOTAL_DAILY_COST_BY_HOLDING_ID('".$accessToken."',".$userId.",".$holdingId.")");
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
        public function getTotalDailyCostForDailyByCompanyID($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","companyId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","companyId");
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
                                $companyId = $parameters["companyId"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($companyId)){
                                        $response = $this->globalfunctions->returnMessage(1003,"companyId parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_TOTAL_DAILY_COST_BY_COMPANY_ID('".$accessToken."',".$userId.",".$companyId.")");
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
        public function getDailyConsumedAlcoholFilteredByDate($parameters){
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
                                $dateBegin = $parameters["dateBegin"];
                                $dateEnd = $parameters["dateEnd"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $this->load->model("AlcoholType_model");
                                        $params["accessToken"] = $accessToken;
                                        $params["userId"] = $userId;
                                        $alcoholTypeList = $this->AlcoholType_model->getAlcoholTypelist($params);
                                        $this->db->close();
                                        $alcoholTypes = $alcoholTypeList["message"];
                                        $query = $this->db->query("CALL GET_TOTAL_DAILY_CONSUMED_ALCOHOL_BY_DATE('".$accessToken."',".$userId.",'".$dateBegin."','".$dateEnd."',NULL,NULL)");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $dateBegin = strtotime($dateBegin);
                                                $dateEnd = strtotime($dateEnd);
                                                $dateDiff = $dateEnd - $dateBegin + 86400;
                                                $dateDiff = floor( $dateDiff / (60 * 60 * 24) );
                                                $dateIndex = $dateBegin;
                                                $dateResultArray = array();
                                                $result = array();
                                                for ($i = 0; $i < $dateDiff; $i++) {
                                                        $dateResultArray[$i] = date("Y-m-d", $dateIndex);
                                                        foreach($alcoholTypes as $key => $row) {
                                                            $result[$row->Name][$i] = 0;
                                                        }
                                                        $dateIndex += (60 * 60 * 24);
                                                }
                                                foreach($query->result() as $row) {
                                                        $dateDiff = strtotime($row->Date) - $dateBegin;
                                                        $dateDiff = floor( $dateDiff / (60 * 60 * 24));
                                                        $result[$row->Name][$dateDiff] = (float)$row->ConsumedAlcohol;
                                                }
                                                $i = 0;
                                                foreach($alcoholTypes as $row) {
                                                        $dataResult["graphData"][$i]["name"] = $row->Name;
                                                        $dataResult["graphData"][$i++]["data"] = $result[$row->Name];
                                                }
                                                $dataResult["dates"] = $dateResultArray;
                                                $response["message"] = $dataResult;
                                        }
                                }
                        }
                }
                return $response;
        }
        public function getDailyConsumedAlcoholFilteredByDateByHoldingID($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","dateBegin","dateEnd","holdingId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","dateBegin","dateEnd","holdingId");
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
                                $holdingId = $parameters["holdingId"];
                                $dateBegin = $parameters["dateBegin"];
                                $dateEnd = $parameters["dateEnd"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($holdingId)){
                                        $response = $this->globalfunctions->returnMessage(1003,"holdingId parametresi numeric olmalıdır.",true);
                                }else{
                                        $this->load->model("AlcoholType_model");
                                        $params["accessToken"] = $accessToken;
                                        $params["userId"] = $userId;
                                        $alcoholTypeList = $this->AlcoholType_model->getAlcoholTypelist($params);
                                        $this->db->close();
                                        $alcoholTypes = $alcoholTypeList["message"];
                                        $query = $this->db->query("CALL GET_TOTAL_DAILY_CONSUMED_ALCOHOL_BY_DATE('".$accessToken."',".$userId.",'".$dateBegin."','".$dateEnd."',".$holdingId.",'HoldingID')");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $dateBegin = strtotime($dateBegin);
                                                $dateEnd = strtotime($dateEnd);
                                                $dateDiff = $dateEnd - $dateBegin + 86400;
                                                $dateDiff = floor( $dateDiff / (60 * 60 * 24) );
                                                $dateIndex = $dateBegin;
                                                $dateResultArray = array();
                                                $result = array();
                                                for ($i = 0; $i < $dateDiff; $i++) {
                                                        $dateResultArray[$i] = date("Y-m-d", $dateIndex);
                                                        foreach($alcoholTypes as $key => $row) {
                                                            $result[$row->Name][$i] = 0;
                                                        }
                                                        $dateIndex += (60 * 60 * 24);
                                                }
                                                foreach($query->result() as $row) {
                                                        $dateDiff = strtotime($row->Date) - $dateBegin;
                                                        $dateDiff = floor( $dateDiff / (60 * 60 * 24));
                                                        $result[$row->Name][$dateDiff] = (float)$row->ConsumedAlcohol;
                                                }
                                                $i = 0;
                                                foreach($alcoholTypes as $row) {
                                                        $dataResult["graphData"][$i]["name"] = $row->Name;
                                                        $dataResult["graphData"][$i++]["data"] = $result[$row->Name];
                                                }
                                                $dataResult["dates"] = $dateResultArray;
                                                $response["message"] = $dataResult;
                                        }
                                }
                        }
                }
                return $response;
        }
        public function getDailyConsumedAlcoholFilteredByDateByCompanyID($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","dateBegin","dateEnd","companyId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","dateBegin","dateEnd","companyId");
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
                                $companyId = $parameters["companyId"];
                                $dateBegin = $parameters["dateBegin"];
                                $dateEnd = $parameters["dateEnd"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($companyId)){
                                        $response = $this->globalfunctions->returnMessage(1003,"companyId parametresi numeric olmalıdır.",true);
                                }else{
                                        $this->load->model("AlcoholType_model");
                                        $params["accessToken"] = $accessToken;
                                        $params["userId"] = $userId;
                                        $alcoholTypeList = $this->AlcoholType_model->getAlcoholTypelist($params);
                                        $this->db->close();
                                        $alcoholTypes = $alcoholTypeList["message"];
                                        $query = $this->db->query("CALL GET_TOTAL_DAILY_CONSUMED_ALCOHOL_BY_DATE('".$accessToken."',".$userId.",'".$dateBegin."','".$dateEnd."',".$companyId.",'CompanyID')");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $dateBegin = strtotime($dateBegin);
                                                $dateEnd = strtotime($dateEnd);
                                                $dateDiff = $dateEnd - $dateBegin + 86400;
                                                $dateDiff = floor( $dateDiff / (60 * 60 * 24) );
                                                $dateIndex = $dateBegin;
                                                $dateResultArray = array();
                                                $result = array();
                                                for ($i = 0; $i < $dateDiff; $i++) {
                                                        $dateResultArray[$i] = date("Y-m-d", $dateIndex);
                                                        foreach($alcoholTypes as $key => $row) {
                                                            $result[$row->Name][$i] = 0;
                                                        }
                                                        $dateIndex += (60 * 60 * 24);
                                                }
                                                foreach($query->result() as $row) {
                                                        $dateDiff = strtotime($row->Date) - $dateBegin;
                                                        $dateDiff = floor( $dateDiff / (60 * 60 * 24));
                                                        $result[$row->Name][$dateDiff] = (float)$row->ConsumedAlcohol;
                                                }
                                                $i = 0;
                                                foreach($alcoholTypes as $row) {
                                                        $dataResult["graphData"][$i]["name"] = $row->Name;
                                                        $dataResult["graphData"][$i++]["data"] = $result[$row->Name];
                                                }
                                                $dataResult["dates"] = $dateResultArray;
                                                $response["message"] = $dataResult;
                                        }
                                }
                        }
                }
                return $response;
        }
        public function getDailyConsumedAlcoholFilteredByDateByBarGroupID($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","dateBegin","dateEnd","barGroupId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","dateBegin","dateEnd","barGroupId");
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
                                $dateBegin = $parameters["dateBegin"];
                                $dateEnd = $parameters["dateEnd"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($barGroupId)){
                                        $response = $this->globalfunctions->returnMessage(1003,"barGroupId parametresi numeric olmalıdır.",true);
                                }else{
                                        $this->load->model("AlcoholType_model");
                                        $params["accessToken"] = $accessToken;
                                        $params["userId"] = $userId;
                                        $alcoholTypeList = $this->AlcoholType_model->getAlcoholTypelist($params);
                                        $this->db->close();
                                        $alcoholTypes = $alcoholTypeList["message"];
                                        $query = $this->db->query("CALL GET_TOTAL_DAILY_CONSUMED_ALCOHOL_BY_DATE('".$accessToken."',".$userId.",'".$dateBegin."','".$dateEnd."',".$barGroupId.",'BarGroupID')");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $dateBegin = strtotime($dateBegin);
                                                $dateEnd = strtotime($dateEnd);
                                                $dateDiff = $dateEnd - $dateBegin + 86400;
                                                $dateDiff = floor( $dateDiff / (60 * 60 * 24) );
                                                $dateIndex = $dateBegin;
                                                $dateResultArray = array();
                                                $result = array();
                                                for ($i = 0; $i < $dateDiff; $i++) {
                                                        $dateResultArray[$i] = date("Y-m-d", $dateIndex);
                                                        foreach($alcoholTypes as $key => $row) {
                                                            $result[$row->Name][$i] = 0;
                                                        }
                                                        $dateIndex += (60 * 60 * 24);
                                                }
                                                foreach($query->result() as $row) {
                                                        $dateDiff = strtotime($row->Date) - $dateBegin;
                                                        $dateDiff = floor( $dateDiff / (60 * 60 * 24));
                                                        $result[$row->Name][$dateDiff] = (float)$row->ConsumedAlcohol;
                                                }
                                                $i = 0;
                                                foreach($alcoholTypes as $row) {
                                                        $dataResult["graphData"][$i]["name"] = $row->Name;
                                                        $dataResult["graphData"][$i++]["data"] = $result[$row->Name];
                                                }
                                                $dataResult["dates"] = $dateResultArray;
                                                $response["message"] = $dataResult;
                                        }
                                }
                        }
                }
                return $response;
        }
        public function getDailyConsumedAlcoholFilteredByDateByTapID($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","dateBegin","dateEnd","tapId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","dateBegin","dateEnd","tapId");
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
                                $tapId = $parameters["tapId"];
                                $dateBegin = $parameters["dateBegin"];
                                $dateEnd = $parameters["dateEnd"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($tapId)){
                                        $response = $this->globalfunctions->returnMessage(1003,"tapId parametresi numeric olmalıdır.",true);
                                }else{
                                        $this->load->model("AlcoholType_model");
                                        $params["accessToken"] = $accessToken;
                                        $params["userId"] = $userId;
                                        $alcoholTypeList = $this->AlcoholType_model->getAlcoholTypelist($params);
                                        $this->db->close();
                                        $alcoholTypes = $alcoholTypeList["message"];
                                        $query = $this->db->query("CALL GET_TOTAL_DAILY_CONSUMED_ALCOHOL_BY_DATE('".$accessToken."',".$userId.",'".$dateBegin."','".$dateEnd."',".$tapId.",'TapID')");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $dateBegin = strtotime($dateBegin);
                                                $dateEnd = strtotime($dateEnd);
                                                $dateDiff = $dateEnd - $dateBegin + 86400;
                                                $dateDiff = floor( $dateDiff / (60 * 60 * 24) );
                                                $dateIndex = $dateBegin;
                                                $dateResultArray = array();
                                                $result = array();
                                                for ($i = 0; $i < $dateDiff; $i++) {
                                                        $dateResultArray[$i] = date("Y-m-d", $dateIndex);
                                                        foreach($alcoholTypes as $key => $row) {
                                                            $result[$row->Name][$i] = 0;
                                                        }
                                                        $dateIndex += (60 * 60 * 24);
                                                }
                                                foreach($query->result() as $row) {
                                                        $dateDiff = strtotime($row->Date) - $dateBegin;
                                                        $dateDiff = floor( $dateDiff / (60 * 60 * 24));
                                                        $result[$row->Name][$dateDiff] = (float)$row->ConsumedAlcohol;
                                                }
                                                $i = 0;
                                                foreach($alcoholTypes as $row) {
                                                        $dataResult["graphData"][$i]["name"] = $row->Name;
                                                        $dataResult["graphData"][$i++]["data"] = $result[$row->Name];
                                                }
                                                $dataResult["dates"] = $dateResultArray;
                                                $response["message"] = $dataResult;
                                        }
                                }
                        }
                }
                return $response;
        }
}
?>