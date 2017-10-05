<?php 
class Company_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
        public function getCompanyByCountry($parameters){
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
                                $countryId = join($countryId,",");
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_COMPANY_BY_COUNTRY_ID('".$accessToken."',".$userId.",'".$countryId."')");
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
        public function getCompanyByCity($parameters){
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
                                $cityId = join($cityId,",");
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_COMPANY_BY_CITY_ID('".$accessToken."',".$userId.",'".$cityId."')");
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
        public function getCompanyByCounties($parameters){
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
                                $countyId = join($countyId,",");
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_COMPANY_BY_COUNTY_ID('".$accessToken."',".$userId.",'".$countyId."')");
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
        public function getCompanyByAreas($parameters){
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
                                $areaId = join($areaId,",");
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_COMPANY_BY_AREA_ID('".$accessToken."',".$userId.",'".$areaId."')");
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
        public function getCompanyByHolding($parameters){
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
                                $holdingId = join($holdingId,",");
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_COMPANY_BY_HOLDING_ID('".$accessToken."',".$userId.",'".$holdingId."')");
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
                                                        $response["resultCode"] = 17;
                                                        $response["message"] = "Bu holding'e ait şirket bulunmamaktadır.";
                                                }
                                        }
                                }
                        }
                }
                return $response;
        }
        public function getCompanylist($parameters){
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
                                $companyId = @$parameters["companyId"];
                                if(!$companyId){
                                        $companyId = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if($companyId!="NULL" && !is_numeric($companyId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"Company Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_COMPANIES('".$accessToken."',".$userId.",".$companyId.")");
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
        public function getCompanyTypelist($parameters){
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
                        $availableParameters = array("accessToken","userId","companyType");
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
                                $companyType = @$parameters["companyType"];
                                if(!$companyType){
                                        $companyType = "NULL";
                                }
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if($companyType!="NULL" && !is_numeric($companyType)){
                                        $response = $this->globalfunctions->returnMessage(1006,"companyType parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_COMPANY_TYPES('".$accessToken."',".$userId.",".$companyType.")");
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
        public function addCompany($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","CompanyName","CompanyAdress","InvoiceAddress","TaxNo","TaxAdministrationName","InvoiceTelephone","InvoiceMobile","InvoiceEmail","CompanyTelephone","CompanyMobile","CompanyFax","CompanyEmail","CompanySign","CountryID","CityID","CountyID","AreaID","HoldingID","CompanyTypeID"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","CompanyName","CompanyAdress","InvoiceAddress","TaxNo","TaxAdministrationName","InvoiceTelephone","InvoiceMobile","InvoiceEmail","CompanyTelephone","CompanyMobile","CompanyFax","CompanyEmail","CompanySign","CountryID","CityID","CountyID","AreaID","HoldingID","CompanyTypeID");
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
                                $CompanyName = $parameters["CompanyName"];
                                $CompanyAdress = $parameters["CompanyAdress"];
                                $InvoiceAddress = $parameters["InvoiceAddress"];
                                $TaxNo = $parameters["TaxNo"];
                                $TaxAdministrationName = $parameters["TaxAdministrationName"];
                                $InvoiceTelephone = $parameters["InvoiceTelephone"];
                                $InvoiceMobile = $parameters["InvoiceMobile"];
                                $InvoiceEmail = $parameters["InvoiceEmail"];
                                $CompanyTelephone = $parameters["CompanyTelephone"];
                                $CompanyMobile = $parameters["CompanyMobile"];
                                $CompanyFax = $parameters["CompanyFax"];
                                $CompanyEmail = $parameters["CompanyEmail"];
                                $CompanySign = $parameters["CompanySign"];
                                $CountryID = $parameters["CountryID"];
                                $CityID = $parameters["CityID"];
                                $CountyID = $parameters["CountyID"];
                                $AreaID = $parameters["AreaID"];
                                $HoldingID = $parameters["HoldingID"];
                                $CompanyTypeID = $parameters["CompanyTypeID"];
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
                                if(!is_numeric($HoldingID)){
                                        $response = $this->globalfunctions->returnMessage(1009,"Holding Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CompanyTypeID)){
                                        $response = $this->globalfunctions->returnMessage(1010,"Company Type Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!filter_var($InvoiceEmail, FILTER_VALIDATE_EMAIL)){
                                        $response = $this->globalfunctions->returnMessage(1007,"Fatura mail adresi uygun formatta değil.",true);
                                }else
                                if(!filter_var($CompanyEmail, FILTER_VALIDATE_EMAIL)){
                                        $response = $this->globalfunctions->returnMessage(1008,"Company mail adresi uygun formatta değil.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_COMPANY('".$accessToken."',".$userId.",NULL,'".$CompanyName."','".$CompanyAdress."','".$InvoiceAddress."','".$TaxNo."','".$TaxAdministrationName."','".$InvoiceTelephone."','".$InvoiceMobile."','".$InvoiceEmail."','".$CompanyTelephone."','".$CompanyMobile."','".$CompanyFax."','".$CompanyEmail."','".$CompanySign."',".$CountryID.",".$CityID.",".$CountyID.",".$AreaID.",".$HoldingID.",".$CompanyTypeID.")");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
        public function updateCompany($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId","CompanyID","CompanyName","CompanyAdress","InvoiceAddress","TaxNo","TaxAdministrationName","InvoiceTelephone","InvoiceMobile","InvoiceEmail","CompanyTelephone","CompanyMobile","CompanyFax","CompanyEmail","CompanySign","CountryID","CityID","CountyID","AreaID","HoldingID","CompanyTypeID"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId","CompanyID","CompanyName","CompanyAdress","InvoiceAddress","TaxNo","TaxAdministrationName","InvoiceTelephone","InvoiceMobile","InvoiceEmail","CompanyTelephone","CompanyMobile","CompanyFax","CompanyEmail","CompanySign","CountryID","CityID","CountyID","AreaID","HoldingID","CompanyTypeID");
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
                                $CompanyName = $parameters["CompanyName"];
                                $CompanyAdress = $parameters["CompanyAdress"];
                                $InvoiceAddress = $parameters["InvoiceAddress"];
                                $TaxNo = $parameters["TaxNo"];
                                $TaxAdministrationName = $parameters["TaxAdministrationName"];
                                $InvoiceTelephone = $parameters["InvoiceTelephone"];
                                $InvoiceMobile = $parameters["InvoiceMobile"];
                                $InvoiceEmail = $parameters["InvoiceEmail"];
                                $CompanyTelephone = $parameters["CompanyTelephone"];
                                $CompanyMobile = $parameters["CompanyMobile"];
                                $CompanyFax = $parameters["CompanyFax"];
                                $CompanyEmail = $parameters["CompanyEmail"];
                                $CompanySign = $parameters["CompanySign"];
                                $CountryID = $parameters["CountryID"];
                                $CityID = $parameters["CityID"];
                                $CountyID = $parameters["CountyID"];
                                $AreaID = $parameters["AreaID"];
                                $HoldingID = $parameters["HoldingID"];
                                $CompanyTypeID = $parameters["CompanyTypeID"];
                                if(!is_numeric($CompanyID)){
                                        $response = $this->globalfunctions->returnMessage(1009,"Company Id parametresi numeric olmalıdır.",true);
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
                                if(!is_numeric($HoldingID)){
                                        $response = $this->globalfunctions->returnMessage(1009,"Holding Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($CompanyTypeID)){
                                        $response = $this->globalfunctions->returnMessage(1010,"Company Type Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!filter_var($InvoiceEmail, FILTER_VALIDATE_EMAIL)){
                                        $response = $this->globalfunctions->returnMessage(1007,"Fatura mail adresi uygun formatta değil.",true);
                                }else
                                if(!filter_var($CompanyEmail, FILTER_VALIDATE_EMAIL)){
                                        $response = $this->globalfunctions->returnMessage(1008,"Company mail adresi uygun formatta değil.",true);
                                }else{
                                        $query = $this->db->query("CALL ADD_OR_UPDATE_COMPANY('".$accessToken."',".$userId.",".$CompanyID.",'".$CompanyName."','".$CompanyAdress."','".$InvoiceAddress."','".$TaxNo."','".$TaxAdministrationName."','".$InvoiceTelephone."','".$InvoiceMobile."','".$InvoiceEmail."','".$CompanyTelephone."','".$CompanyMobile."','".$CompanyFax."','".$CompanyEmail."','".$CompanySign."',".$CountryID.",".$CityID.",".$CountyID.",".$AreaID.",".$HoldingID.",".$CompanyTypeID.")");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
        public function deleteCompany($parameters){
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
                                $companyId = @$parameters["companyId"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else
                                if(!is_numeric($companyId)){
                                        $response = $this->globalfunctions->returnMessage(1006,"Company Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL DELETE_COMPANY('".$accessToken."',".$userId.",".$companyId.")");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                }
                        }
                }
                return $response;
        }
}
?>