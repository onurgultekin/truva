<?php 
class Holding_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
        public function getHoldingByCountry($parameters){
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
                                        $response = $this->globalfunctions->returnMessage(1003,"Country Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_HOLDING_BY_COUNTRY_ID('".$accessToken."',".$userId.",".$countryId.")");
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
        public function getHoldingByCity($parameters){
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
                                        $response = $this->globalfunctions->returnMessage(1004,"City Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_HOLDING_BY_CITY_ID('".$accessToken."',".$userId.",".$cityId.")");
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
        public function getHoldingByCounties($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","countyId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","countyId");
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
                                $countyId = $parameters["countyId"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($countyId)){
                                        $response = $this->globalfunctions->returnMessage(1005,"County Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_HOLDING_BY_COUNTY_ID('".$accessToken."',".$userId.",".$countyId.")");
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
        public function getHoldingByAreas($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","areaId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","areaId");
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
                                $areaId = $parameters["areaId"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($areaId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"Area Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_HOLDING_BY_AREA_ID('".$accessToken."',".$userId.",".$areaId.")");
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
        
        public function getHoldinglist($parameters){
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
                                $holdingId = @$parameters["holdingId"];
                                if(!$holdingId){
                                        $holdingId = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if($holdingId!="NULL" && !is_numeric($holdingId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"Holding Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_HOLDINGS('".$accessToken."',".$userId.",".$holdingId.")");
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
        public function addHolding($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","HoldingName","HoldingAdress","InvoiceAddress","TaxNo","TaxAdministrationName","InvoiceTelephone","InvoiceMobile","InvoiceEmail","HoldingTelephone","HoldingMobile","HoldingFax","HoldingEmail","HoldingSign","CountryID","CityID","CountyID","AreaID"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","HoldingName","HoldingAdress","InvoiceAddress","TaxNo","TaxAdministrationName","InvoiceTelephone","InvoiceMobile","InvoiceEmail","HoldingTelephone","HoldingMobile","HoldingFax","HoldingEmail","HoldingSign","CountryID","CityID","CountyID","AreaID");
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
                                $HoldingName = $parameters["HoldingName"];
                                $HoldingAdress = $parameters["HoldingAdress"];
                                $InvoiceAddress = $parameters["InvoiceAddress"];
                                $TaxNo = $parameters["TaxNo"];
                                $TaxAdministrationName = $parameters["TaxAdministrationName"];
                                $InvoiceTelephone = $parameters["InvoiceTelephone"];
                                $InvoiceMobile = $parameters["InvoiceMobile"];
                                $InvoiceEmail = $parameters["InvoiceEmail"];
                                $HoldingTelephone = $parameters["HoldingTelephone"];
                                $HoldingMobile = $parameters["HoldingMobile"];
                                $HoldingFax = $parameters["HoldingFax"];
                                $HoldingEmail = $parameters["HoldingEmail"];
                                $HoldingSign = $parameters["HoldingSign"];
                                $CountryID = $parameters["CountryID"];
                                $CityID = $parameters["CityID"];
                                $CountyID = $parameters["CountyID"];
                                $AreaID = $parameters["AreaID"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CountryID)){
                                        $response = $this->globalfunctions->returnMessage(1003,"Country Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CityID)){
                                        $response = $this->globalfunctions->returnMessage(1004,"City Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CountyID)){
                                        $response = $this->globalfunctions->returnMessage(1005,"County Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($AreaID)){
                                        $response = $this->globalfunctions->returnMessage(1006,"Area Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!filter_var($InvoiceEmail, FILTER_VALIDATE_EMAIL)){
                                        $response = $this->globalfunctions->returnMessage(1007,"Fatura mail adresi uygun formatta değil.",true);
                                }else
                                if(!filter_var($HoldingEmail, FILTER_VALIDATE_EMAIL)){
                                        $response = $this->globalfunctions->returnMessage(1008,"Holding mail adresi uygun formatta değil.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_HOLDING('".$accessToken."',".$userId.",NULL,'".$HoldingName."','".$HoldingAdress."','".$InvoiceAddress."','".$TaxNo."','".$TaxAdministrationName."','".$InvoiceTelephone."','".$InvoiceMobile."','".$InvoiceEmail."','".$HoldingTelephone."','".$HoldingMobile."','".$HoldingFax."','".$HoldingEmail."','".$HoldingSign."',".$CountryID.",".$CityID.",".$CountyID.",".$AreaID.")");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
        public function updateHolding($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","HoldingID","HoldingName","HoldingAdress","InvoiceAddress","TaxNo","TaxAdministrationName","InvoiceTelephone","InvoiceMobile","InvoiceEmail","HoldingTelephone","HoldingMobile","HoldingFax","HoldingEmail","HoldingSign","CountryID","CityID","CountyID","AreaID"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","HoldingID","HoldingName","HoldingAdress","InvoiceAddress","TaxNo","TaxAdministrationName","InvoiceTelephone","InvoiceMobile","InvoiceEmail","HoldingTelephone","HoldingMobile","HoldingFax","HoldingEmail","HoldingSign","CountryID","CityID","CountyID","AreaID");
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
                                $HoldingName = $parameters["HoldingName"];
                                $HoldingAdress = $parameters["HoldingAdress"];
                                $InvoiceAddress = $parameters["InvoiceAddress"];
                                $TaxNo = $parameters["TaxNo"];
                                $TaxAdministrationName = $parameters["TaxAdministrationName"];
                                $InvoiceTelephone = $parameters["InvoiceTelephone"];
                                $InvoiceMobile = $parameters["InvoiceMobile"];
                                $InvoiceEmail = $parameters["InvoiceEmail"];
                                $HoldingTelephone = $parameters["HoldingTelephone"];
                                $HoldingMobile = $parameters["HoldingMobile"];
                                $HoldingFax = $parameters["HoldingFax"];
                                $HoldingEmail = $parameters["HoldingEmail"];
                                $HoldingSign = $parameters["HoldingSign"];
                                $CountryID = $parameters["CountryID"];
                                $CityID = $parameters["CityID"];
                                $CountyID = $parameters["CountyID"];
                                $AreaID = $parameters["AreaID"];
                                if(!is_numeric($HoldingID)){
                                        $response = $this->globalfunctions->returnMessage(1009,"Holding Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CountryID)){
                                        $response = $this->globalfunctions->returnMessage(1003,"Country Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CityID)){
                                        $response = $this->globalfunctions->returnMessage(1004,"City Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CountyID)){
                                        $response = $this->globalfunctions->returnMessage(1005,"County Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($AreaID)){
                                        $response = $this->globalfunctions->returnMessage(1006,"Area Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!filter_var($InvoiceEmail, FILTER_VALIDATE_EMAIL)){
                                        $response = $this->globalfunctions->returnMessage(1007,"Fatura mail adresi uygun formatta değil.",true);
                                }else
                                if(!filter_var($HoldingEmail, FILTER_VALIDATE_EMAIL)){
                                        $response = $this->globalfunctions->returnMessage(1008,"Holding mail adresi uygun formatta değil.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_HOLDING('".$accessToken."',".$userId.",".$HoldingID.",'".$HoldingName."','".$HoldingAdress."','".$InvoiceAddress."','".$TaxNo."','".$TaxAdministrationName."','".$InvoiceTelephone."','".$InvoiceMobile."','".$InvoiceEmail."','".$HoldingTelephone."','".$HoldingMobile."','".$HoldingFax."','".$HoldingEmail."','".$HoldingSign."',".$CountryID.",".$CityID.",".$CountyID.",".$AreaID.")");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
        public function deleteHolding($parameters){
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
                                        $response = $this->globalfunctions->returnMessage(1006,"Holding Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL DELETE_HOLDING('".$accessToken."',".$userId.",".$holdingId.")");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
}
?>