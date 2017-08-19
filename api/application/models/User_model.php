<?php 
class User_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
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
        public function getTapStatuses($parameters){
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
                                        $query = $this->db->query("CALL GET_TAP_STATUSES('".$accessToken."',".$userId.")");
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
                $mandatoryParameters = array("accessToken","userId","Name","ID1","ID2","ID3","Version","HoldingID","CompanyID","BarGroupID","AlcoholGroupID","AlcoholTypeID","AlcoholBrandID","collector_id","TapStatusID"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","Name","ID1","ID2","ID3","Version","HoldingID","CompanyID","BarGroupID","AlcoholGroupID","AlcoholTypeID","AlcoholBrandID","collector_id","TapStatusID");
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
                                $Name = addslashes($parameters["Name"]);
                                $ID1 = addslashes($parameters["ID1"]);
                                $ID2 = addslashes($parameters["ID2"]);
                                $ID3 = addslashes($parameters["ID3"]);
                                $Version = addslashes($parameters["Version"]);
                                $HoldingID = $parameters["HoldingID"];
                                $CompanyID = $parameters["CompanyID"];
                                $BarGroupID = $parameters["BarGroupID"];
                                $AlcoholGroupID = $parameters["AlcoholGroupID"];
                                $AlcoholTypeID = $parameters["AlcoholTypeID"];
                                $AlcoholBrandID = $parameters["AlcoholBrandID"];
                                $collector_id = $parameters["collector_id"];
                                $TapStatusID = $parameters["TapStatusID"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($HoldingID)){
                                        $response = $this->globalfunctions->returnMessage(1003,"HoldingID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CompanyID)){
                                        $response = $this->globalfunctions->returnMessage(1004,"CompanyID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($BarGroupID)){
                                        $response = $this->globalfunctions->returnMessage(1005,"BarGroupID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($AlcoholGroupID)){
                                        $response = $this->globalfunctions->returnMessage(1006,"AlcoholGroupID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($AlcoholTypeID)){
                                        $response = $this->globalfunctions->returnMessage(1007,"AlcoholTypeID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($AlcoholBrandID)){
                                        $response = $this->globalfunctions->returnMessage(1008,"AlcoholBrandID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($collector_id)){
                                        $response = $this->globalfunctions->returnMessage(1009,"collector_id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($TapStatusID)){
                                        $response = $this->globalfunctions->returnMessage(10010,"TapStatusID parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_TAPS('".$accessToken."',".$userId.",NULL,'".$Name."','".$ID1."','".$ID2."','".$ID3."','".$Version."',".$HoldingID.",".$CompanyID.",".$BarGroupID.",".$AlcoholGroupID.",".$AlcoholTypeID.",".$AlcoholBrandID.",".$collector_id.",".$TapStatusID.")");
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
                $mandatoryParameters = array("accessToken","userId","TapID","Name","ID1","ID2","ID3","Version","HoldingID","CompanyID","BarGroupID","AlcoholGroupID","AlcoholTypeID","AlcoholBrandID","collector_id","TapStatusID"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","TapID","Name","ID1","ID2","ID3","Version","HoldingID","CompanyID","BarGroupID","AlcoholGroupID","AlcoholTypeID","AlcoholBrandID","collector_id","TapStatusID");
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
                                $TapID = $parameters["TapID"];
                                $Name = addslashes($parameters["Name"]);
                                $ID1 = addslashes($parameters["ID1"]);
                                $ID2 = addslashes($parameters["ID2"]);
                                $ID3 = addslashes($parameters["ID3"]);
                                $Version = addslashes($parameters["Version"]);
                                $HoldingID = $parameters["HoldingID"];
                                $CompanyID = $parameters["CompanyID"];
                                $BarGroupID = $parameters["BarGroupID"];
                                $AlcoholGroupID = $parameters["AlcoholGroupID"];
                                $AlcoholTypeID = $parameters["AlcoholTypeID"];
                                $AlcoholBrandID = $parameters["AlcoholBrandID"];
                                $collector_id = $parameters["collector_id"];
                                $TapStatusID = $parameters["TapStatusID"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($TapID)){
                                        $response = $this->globalfunctions->returnMessage(10011,"TapID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($HoldingID)){
                                        $response = $this->globalfunctions->returnMessage(1003,"HoldingID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CompanyID)){
                                        $response = $this->globalfunctions->returnMessage(1004,"CompanyID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($BarGroupID)){
                                        $response = $this->globalfunctions->returnMessage(1005,"BarGroupID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($AlcoholGroupID)){
                                        $response = $this->globalfunctions->returnMessage(1006,"AlcoholGroupID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($AlcoholTypeID)){
                                        $response = $this->globalfunctions->returnMessage(1007,"AlcoholTypeID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($AlcoholBrandID)){
                                        $response = $this->globalfunctions->returnMessage(1008,"AlcoholBrandID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($collector_id)){
                                        $response = $this->globalfunctions->returnMessage(1009,"collector_id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($TapStatusID)){
                                        $response = $this->globalfunctions->returnMessage(10010,"TapStatusID parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_TAPS('".$accessToken."',".$userId.",".$TapID.",'".$Name."','".$ID1."','".$ID2."','".$ID3."','".$Version."',".$HoldingID.",".$CompanyID.",".$BarGroupID.",".$AlcoholGroupID.",".$AlcoholTypeID.",".$AlcoholBrandID.",".$collector_id.",".$TapStatusID.")");
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