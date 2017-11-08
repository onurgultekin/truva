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
                $mandatoryParameters = array("accessToken","userId","ID1"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","Name","ID1","ID2","ID3","Version","HoldingID","CompanyID","BarGroupID","AlcoholGroupID","AlcoholTypeID","AlcoholBrandID","collector_id","TapStatusID","buttons","NetPrice","SalePrice");
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
                                $Name = @addslashes($parameters["Name"]);
                                $ID1 = addslashes($parameters["ID1"]);
                                $ID2 = @addslashes($parameters["ID2"]);
                                $ID3 = @addslashes($parameters["ID3"]);
                                $Version = @addslashes($parameters["Version"]);
                                $HoldingID = @$parameters["HoldingID"];
                                $CompanyID = @$parameters["CompanyID"];
                                $BarGroupID = @$parameters["BarGroupID"];
                                $AlcoholGroupID = @$parameters["AlcoholGroupID"];
                                $AlcoholTypeID = @$parameters["AlcoholTypeID"];
                                $AlcoholBrandID = @$parameters["AlcoholBrandID"];
                                $collector_id = @$parameters["collector_id"];
                                $TapStatusID = @$parameters["TapStatusID"];
                                $buttons = @$parameters["buttons"];
                                $NetPrice = @$parameters["NetPrice"];
                                $SalePrice = @$parameters["SalePrice"];
                                if(!$HoldingID){
                                        $HoldingID = "NULL";
                                }
                                if(!$CompanyID){
                                        $CompanyID = "NULL";
                                }
                                if(!$BarGroupID){
                                        $BarGroupID = "NULL";
                                }
                                if(!$AlcoholGroupID){
                                        $AlcoholGroupID = "NULL";
                                }
                                if(!$AlcoholTypeID){
                                        $AlcoholTypeID = "NULL";
                                }
                                if(!$AlcoholBrandID){
                                        $AlcoholBrandID = "NULL";
                                }
                                if(!$collector_id){
                                        $collector_id = "NULL";
                                }
                                if(!$TapStatusID){
                                        $TapStatusID = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if($HoldingID != "NULL" && !is_numeric($HoldingID)){
                                        $response = $this->globalfunctions->returnMessage(1003,"HoldingID parametresi numeric olmalıdır.",true);
                                }else
                                if($CompanyID  != "NULL" && !is_numeric($CompanyID)){
                                        $response = $this->globalfunctions->returnMessage(1004,"CompanyID parametresi numeric olmalıdır.",true);
                                }else
                                if($BarGroupID  != "NULL" && !is_numeric($BarGroupID)){
                                        $response = $this->globalfunctions->returnMessage(1005,"BarGroupID parametresi numeric olmalıdır.",true);
                                }else
                                if($AlcoholGroupID  != "NULL" && !is_numeric($AlcoholGroupID)){
                                        $response = $this->globalfunctions->returnMessage(1006,"AlcoholGroupID parametresi numeric olmalıdır.",true);
                                }else
                                if($AlcoholTypeID  != "NULL" && !is_numeric($AlcoholTypeID)){
                                        $response = $this->globalfunctions->returnMessage(1007,"AlcoholTypeID parametresi numeric olmalıdır.",true);
                                }else
                                if($AlcoholBrandID  != "NULL" && !is_numeric($AlcoholBrandID)){
                                        $response = $this->globalfunctions->returnMessage(1008,"AlcoholBrandID parametresi numeric olmalıdır.",true);
                                }else
                                if($collector_id  != "NULL" && !is_numeric($collector_id)){
                                        $response = $this->globalfunctions->returnMessage(1009,"collector_id parametresi numeric olmalıdır.",true);
                                }else
                                if($TapStatusID  != "NULL" && !is_numeric($TapStatusID)){
                                        $response = $this->globalfunctions->returnMessage(10010,"TapStatusID parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_TAPS('".$accessToken."',".$userId.",NULL,'".$Name."','".$ID1."','".$ID2."','".$ID3."','".$Version."',".$HoldingID.",".$CompanyID.",".$BarGroupID.",".$AlcoholGroupID.",".$AlcoholTypeID.",".$AlcoholBrandID.",".$collector_id.",".$TapStatusID.")");
                                        $result = $query->row();
                                        if($result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $tapId = $result->tapId;
                                                if(is_array($buttons)){
                                                        foreach ($buttons as $key => $button) {
                                                                $this->db->close();
                                                                $query = $this->db->query("CALL ADD_BUTTON_TO_TAP('".$accessToken."',".$userId.",".$tapId.",".($key+1).",'".$button["buttonName"]."','".$button["buttonClReal"]."','".$button["buttonClShown"]."','".$NetPrice."','".$SalePrice."')");
                                                        }
                                                }
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $response["message"] = "Musluk başarıyla eklendi.";
                                        }
                                }
                        }
                }
                return $response;
        }
        public function updateTap($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","TapID","Name","ID1","ID2","ID3","Version","HoldingID","CompanyID","BarGroupID","AlcoholGroupID","AlcoholTypeID","AlcoholBrandID","collector_id","TapStatusID","buttons","NetPrice","SalePrice"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","TapID","Name","ID1","ID2","ID3","Version","HoldingID","CompanyID","BarGroupID","AlcoholGroupID","AlcoholTypeID","AlcoholBrandID","collector_id","TapStatusID","buttons","NetPrice","SalePrice");
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
                                $buttons = $parameters["buttons"];
                                $NetPrice = $parameters["NetPrice"];
                                $SalePrice = $parameters["SalePrice"];
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
                                        if($result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $this->db->close();
                                                $query = $this->db->query("delete from tapButtonsPrice where TapID = $TapID");
                                                foreach ($buttons as $key => $button) {
                                                        $this->db->close();
                                                        $query = $this->db->query("CALL ADD_BUTTON_TO_TAP('".$accessToken."',".$userId.",".$TapID.",".($key+1).",'".$button["buttonName"]."','".$button["buttonClReal"]."','".$button["buttonClShown"]."','".$NetPrice."','".$SalePrice."')");
                                                }
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $response["message"] = "Musluk başarıyla güncellendi.";
                                        }
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
        public function tapWizard($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","HoldingID","CompanyID","BarGroupID","AlcoholTypeID","AlcoholBrandID","collector_id","buttons","NetPrice","SalePrice"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","HoldingID","CompanyID","BarGroupID","AlcoholTypeID","AlcoholBrandID","collector_id","buttons","NetPrice","SalePrice");
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
                                $HoldingID = $parameters["HoldingID"];
                                $CompanyID = $parameters["CompanyID"];
                                $BarGroupID = $parameters["BarGroupID"];
                                $AlcoholTypeID = $parameters["AlcoholTypeID"];
                                $AlcoholBrandID = $parameters["AlcoholBrandID"];
                                $collector_id = $parameters["collector_id"];
                                $buttons = $parameters["buttons"];
                                $NetPrice = $parameters["NetPrice"];
                                $SalePrice = $parameters["SalePrice"];
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
                                if(!is_numeric($AlcoholTypeID)){
                                        $response = $this->globalfunctions->returnMessage(1007,"AlcoholTypeID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($AlcoholBrandID)){
                                        $response = $this->globalfunctions->returnMessage(1008,"AlcoholBrandID parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($collector_id)){
                                        $response = $this->globalfunctions->returnMessage(1009,"collector_id parametresi numeric olmalıdır.",true);
                                }else{
                                        foreach ($buttons as $key => $button) {
                                                $tapId = $button["tapId"];
                                                $tapButtons = $button["buttons"];
                                                $query = $this->db->query("CALL TAP_WIZARD('".$accessToken."',".$userId.",".$tapId.",".$HoldingID.",".$CompanyID.",".$BarGroupID.",".$AlcoholTypeID.",".$AlcoholBrandID.",".$collector_id.")");
                                                $result = $query->row();
                                                if($result->isError == 1){
                                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                                }else{
                                                        $this->db->close();
                                                        $this->db->query("delete from tapButtonsPrice where TapID = $tapId");
                                                        foreach ($tapButtons as $key => $tapButton) {
                                                                $this->db->close();
                                                                $query = $this->db->query("CALL ADD_BUTTON_TO_TAP('".$accessToken."',".$userId.",".$tapId.",".($key+1).",'".$tapButton["buttonName"]."','".$tapButton["buttonClReal"]."','".$tapButton["buttonClShown"]."','".$NetPrice."','".$SalePrice."')");
                                                        }       
                                                }
                                        }
                                        $this->db->close();
                                        $this->db->query("insert into connectionLog(CreateDate,ConnectionLogJson) values (NOW(),'".json_encode($parameters)."')");
                                        $response["result"] = true;
                                        $response["resultCode"] = 0;
                                        $response["message"] = "Musluk başarıyla eklendi.";
                                        }
                                }
                        }
                return $response;
        }
        public function activeTaps($parameters){
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
                                        $query = $this->db->query("CALL GET_ACTIVE_TAPS('".$accessToken."',".$userId.")");
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