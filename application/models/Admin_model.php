<?php
class Admin_model extends CI_Model
{
	public function getUserLog($dateBegin,$dateEnd){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"dateBegin"=>$dateBegin,"dateEnd"=>$dateEnd);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'user/getUserLog',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}

	public function addNewHolding($data){
		$HoldingName = $_POST["HoldingName"];
		$HoldingAdress = $_POST["HoldingAdress"];
		$InvoiceAddress = $_POST["InvoiceAddress"];
		$TaxNo = $_POST["TaxNo"];
		$TaxAdministrationName = $_POST["TaxAdministrationName"];
		$InvoiceTelephone = $_POST["InvoiceTelephone"];
		$InvoiceMobile = $_POST["InvoiceMobile"];
		$InvoiceEmail = $_POST["InvoiceEmail"];
		$HoldingTelephone = $_POST["HoldingTelephone"];
		$HoldingMobile = $_POST["HoldingMobile"];
		$HoldingFax = $_POST["HoldingFax"];
		$HoldingEmail = $_POST["HoldingEmail"];
		$HoldingSign = $_POST["HoldingSign"];
		$CountryID = $_POST["CountryID"];
		$CityID = $_POST["CityID"];
		$CountyID = $_POST["CountyID"];
		$AreaID = $_POST["AreaID"];
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array(
			"accessToken" => $accessToken, 
			"userId" => $userId,
			"HoldingName" => $HoldingName,
			"HoldingAdress"=>$HoldingAdress,
			"InvoiceAddress"=>$InvoiceAddress,
			"TaxNo"=>$TaxNo,
			"TaxAdministrationName"=>$TaxAdministrationName,
			"InvoiceTelephone"=>$InvoiceTelephone,
			"InvoiceMobile"=>$InvoiceMobile,
			"InvoiceEmail"=>$InvoiceEmail,
			"HoldingTelephone"=>$HoldingTelephone,
			"HoldingMobile"=>$HoldingMobile,
			"HoldingFax"=>$HoldingFax,
			"HoldingEmail"=>$HoldingEmail,
			"HoldingSign"=>$HoldingSign,
			"CountryID"=>$CountryID,
			"CityID"=>$CityID,
			"CountyID"=>$CountyID,
			"AreaID"=>$AreaID);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'holding/addHolding',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function updateHolding($data){
		$HoldingID = $_POST["HoldingID"];
		$HoldingName = $_POST["HoldingName"];
		$HoldingAdress = $_POST["HoldingAdress"];
		$InvoiceAddress = $_POST["InvoiceAddress"];
		$TaxNo = $_POST["TaxNo"];
		$TaxAdministrationName = $_POST["TaxAdministrationName"];
		$InvoiceTelephone = $_POST["InvoiceTelephone"];
		$InvoiceMobile = $_POST["InvoiceMobile"];
		$InvoiceEmail = $_POST["InvoiceEmail"];
		$HoldingTelephone = $_POST["HoldingTelephone"];
		$HoldingMobile = $_POST["HoldingMobile"];
		$HoldingFax = $_POST["HoldingFax"];
		$HoldingEmail = $_POST["HoldingEmail"];
		$HoldingSign = $_POST["HoldingSign"];
		$CountryID = $_POST["CountryID"];
		$CityID = $_POST["CityID"];
		$CountyID = $_POST["CountyID"];
		$AreaID = $_POST["AreaID"];
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array(
			"accessToken" => $accessToken, 
			"userId" => $userId,
			"HoldingID"=>$HoldingID,
			"HoldingName" => $HoldingName,
			"HoldingAdress"=>$HoldingAdress,
			"InvoiceAddress"=>$InvoiceAddress,
			"TaxNo"=>$TaxNo,
			"TaxAdministrationName"=>$TaxAdministrationName,
			"InvoiceTelephone"=>$InvoiceTelephone,
			"InvoiceMobile"=>$InvoiceMobile,
			"InvoiceEmail"=>$InvoiceEmail,
			"HoldingTelephone"=>$HoldingTelephone,
			"HoldingMobile"=>$HoldingMobile,
			"HoldingFax"=>$HoldingFax,
			"HoldingEmail"=>$HoldingEmail,
			"HoldingSign"=>$HoldingSign,
			"CountryID"=>$CountryID,
			"CityID"=>$CityID,
			"CountyID"=>$CountyID,
			"AreaID"=>$AreaID);
		$data_string = json_encode($data);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'holding/updateHolding',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function deleteHoldingById($holdingId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"holdingId"=>$holdingId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'holding/deleteHolding',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function getUsers(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'user/getUserList',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}

	public function getUserById($userListId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"userListId"=>$userListId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'user/getUserList',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}

	public function addNewUser($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$user_email = $_POST["user_email"];
		$user_password = $_POST["user_password"];
		$HoldingID = $_POST["HoldingID"];
		$CompanyID = $_POST["CompanyID"];
		$phone = $_POST["phone"];
		$group_id = $_POST["group_id"];
		$address = $_POST["address"];
		$country_id = $_POST["country_id"];
		$city_id = $_POST["city_id"];
		$county_id = $_POST["county_id"];
		$postcode = $_POST["postcode"];
		$data = array(
			"accessToken" => $accessToken,
			"userId" => $userId,
			"first_name" => $first_name,
			"last_name" => $last_name,
			"user_email" => $user_email,
			"user_password" => $user_password,
			"HoldingID" => $HoldingID,
			"CompanyID" => $CompanyID,
			"phone" => $phone,
			"group_id" => $group_id,
			"address" => $address,
			"country_id" => $country_id,
			"city_id" => $city_id,
			"county_id" => $county_id,
			"postcode" => $postcode
			);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'user/addUser',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}

	public function updateUser($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$id = $_POST["id"];
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$user_email = $_POST["email"];
		$HoldingID = $_POST["HoldingID"];
		$CompanyID = $_POST["CompanyID"];
		$phone = $_POST["phone"];
		$group_id = $_POST["group_id"];
		$address = $_POST["address"];
		$country_id = $_POST["country_id"];
		$city_id = $_POST["city_id"];
		$county_id = $_POST["county_id"];
		$postcode = $_POST["postcode"];
		$data = array(
			"accessToken" => $accessToken,
			"userId" => $userId,
			"id"=>$id,
			"first_name" => $first_name,
			"last_name" => $last_name,
			"user_email" => $user_email,
			"HoldingID" => $HoldingID,
			"CompanyID" => $CompanyID,
			"phone" => $phone,
			"group_id" => $group_id,
			"address" => $address,
			"country_id" => $country_id,
			"city_id" => $city_id,
			"county_id" => $county_id,
			"postcode" => $postcode
			);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'user/updateUser',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}

	public function addNewCountry($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$BinaryCode = $_POST["BinaryCode"];
		$TripleCode = $_POST["TripleCode"];
		$CountryName = $_POST["CountryName"];
		$PhoneCode = $_POST["PhoneCode"];
		$data = array("accessToken" => $accessToken, "userId" => $userId,"BinaryCode"=>$BinaryCode,"TripleCode"=>$TripleCode,"CountryName"=>$CountryName,"PhoneCode"=>$PhoneCode);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'country/addCountry',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}

	public function updateCountry($data){
		$CountryID = $_POST["CountryID"];
		$BinaryCode = $_POST["BinaryCode"];
		$TripleCode = $_POST["TripleCode"];
		$CountryName = $_POST["CountryName"];
		$PhoneCode = $_POST["PhoneCode"];
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"CountryID"=>$CountryID,"BinaryCode"=>$BinaryCode,"TripleCode"=>$TripleCode,"CountryName"=>$CountryName,"PhoneCode"=>$PhoneCode);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'country/updateCountry',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}

	public function deleteCountry($countryId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"countryId"=>$countryId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'country/deleteCountry',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}

	public function addNewCity($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$CityName = $_POST["CityName"];
		$PlateNo = $_POST["PlateNo"];
		$PhoneCode = $_POST["PhoneCode"];
		$CountryID = $_POST["CountryID"];
		$data = array("accessToken" => $accessToken, "userId" => $userId,"CityName" => $CityName,"PlateNo"=>$PlateNo,"CountryID"=>$CountryID,"PhoneCode"=>$PhoneCode);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'city/addCity',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}

	public function updateCity($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$CityID = $_POST["CityID"];
		$CityName = $_POST["CityName"];
		$PlateNo = $_POST["PlateNo"];
		$PhoneCode = $_POST["PhoneCode"];
		$CountryID = $_POST["CountryID"];
		$data = array("accessToken" => $accessToken, "userId" => $userId,"CityID" => $CityID,"CityName" => $CityName,"PlateNo"=>$PlateNo,"CountryID"=>$CountryID,"PhoneCode"=>$PhoneCode);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'city/updateCity',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}

	public function deleteCity($cityId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"cityId"=>$cityId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'city/deleteCity',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}

	public function addNewCounty($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$CountyName = $_POST["CountyName"];
		$CityID = $_POST["CityID"];
		$data = array("accessToken" => $accessToken, "userId" => $userId,"CountyName" => $CountyName,"CityID"=>$CityID);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'county/addCounty',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}

	public function updateCounty($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$CountyID = $_POST["CountyID"];
		$CountyName = $_POST["CountyName"];
		$CityID = $_POST["CityID"];
		$data = array("accessToken" => $accessToken, "userId" => $userId,"CountyID" => $CountyID,"CountyName" => $CountyName,"CityID"=>$CityID);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'county/updateCounty',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function deleteCounty($countyId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"countyId"=>$countyId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'county/deleteCounty',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function addNewArea($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$AreaName = $_POST["AreaName"];
		$CountyID = $_POST["CountyID"];
		$data = array("accessToken" => $accessToken, "userId" => $userId,"AreaName" => $AreaName,"CountyID"=>$CountyID);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'area/addArea',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function updateArea($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$AreaID = $_POST["AreaID"];
		$AreaName = $_POST["AreaName"];
		$CountyID = $_POST["CountyID"];
		$data = array("accessToken" => $accessToken, "userId" => $userId,"AreaID" => $AreaID,"AreaName" => $AreaName,"CountyID"=>$CountyID);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'area/updateArea',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}

	public function deleteArea($areaId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"areaId"=>$areaId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'area/deleteArea',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}

	public function addNewAlcoholGroup($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$Code = $_POST["Code"];
		$Name = $_POST["Name"];
		$data = array("accessToken" => $accessToken, "userId" => $userId,"Code" => $Code,"Name"=>$Name);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'alcoholgroup/addAlcoholGroup',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}

	public function updateAlcoholGroup($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$AlcoholGroupID = $_POST["AlcoholGroupID"];
		$Code = $_POST["Code"];
		$Name = $_POST["Name"];
		$data = array("accessToken" => $accessToken, "userId" => $userId,"AlcoholGroupID" => $AlcoholGroupID,"Code" => $Code,"Name"=>$Name);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'alcoholgroup/updateAlcoholGroup',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function deleteAlcoholGroupById($alcoholGroupId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"alcoholGroupId"=>$alcoholGroupId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'alcoholgroup/deleteAlcoholGroup',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function addNewAlcoholType($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$Code = $_POST["Code"];
		$Name = $_POST["Name"];
		$AlcoholGroupID = $_POST["AlcoholGroupID"];
		$data = array("accessToken" => $accessToken, "userId" => $userId,"Code" => $Code,"Name"=>$Name,"AlcoholGroupID"=>$AlcoholGroupID);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'alcoholtype/addAlcoholType',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function updateAlcoholType($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$AlcoholTypeID = $_POST["AlcoholTypeID"];
		$Code = $_POST["Code"];
		$Name = $_POST["Name"];
		$AlcoholGroupID = $_POST["AlcoholGroupID"];
		$data = array("accessToken" => $accessToken, "userId" => $userId,"AlcoholTypeID" => $AlcoholTypeID,"AlcoholGroupID"=>$AlcoholGroupID,"Code" => $Code,"Name"=>$Name);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'alcoholtype/updateAlcoholType',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function deleteAlcoholTypeById($alcoholTypeId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"alcoholTypeId"=>$alcoholTypeId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'alcoholtype/deleteAlcoholType',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function addNewAlcoholBrand($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$Code = $_POST["Code"];
		$Name = $_POST["Name"];
		$AlcoholTypeID = $_POST["AlcoholTypeID"];
		$data = array("accessToken"=>$accessToken,"userId"=>$userId,"Code" => $Code,"Name"=>$Name,"AlcoholTypeID"=>$AlcoholTypeID);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'alcoholbrand/addAlcoholBrand',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function updateAlcoholBrand($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$AlcoholBrandID = $_POST["AlcoholBrandID"];
		$Code = $_POST["Code"];
		$Name = $_POST["Name"];
		$AlcoholTypeID = $_POST["AlcoholTypeID"];
		$data = array("accessToken"=>$accessToken,"userId"=>$userId,"AlcoholBrandID" => $AlcoholBrandID,"AlcoholTypeID"=>$AlcoholTypeID,"Code" => $Code,"Name"=>$Name);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'alcoholbrand/updateAlcoholBrand',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function deleteAlcoholBrandById($alcoholBrandId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"alcoholBrandId"=>$alcoholBrandId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'alcoholbrand/deleteAlcoholBrand',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function addNewCollector($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$notification_email = @$_POST["notification_email"];
		$eth_mac_address = @$_POST["eth_mac_address"];
		$wifi_mac_address = @$_POST["wifi_mac_address"];
		$Imei = $_POST["Imei"];
		$Latitude = @$_POST["Latitude"];
		$Longitude = @$_POST["Longitude"];
		$data = array(
			"accessToken" => $accessToken,
			"userId" => $userId,
			"notification_email" => $notification_email,
			"eth_mac_address"=>$eth_mac_address,
			"wifi_mac_address"=>$wifi_mac_address,
			"Imei"=>$Imei,
			"Latitude"=>$Latitude,
			"Longitude"=>$Longitude);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'collector/addCollector',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function updateCollector($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$imei = $_POST["imei"];
		$Latitude = $_POST["Latitude"];
		$Longitude = $_POST["Longitude"];
		$collector_id = $_POST["collector_id"];
		$data = array(
			"accessToken" => $accessToken,
			"userId" => $userId,
			"collector_id" => $collector_id,
			"imei"=>$imei,
			"Latitude"=>$Latitude,
			"Longitude"=>$Longitude);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'collector/updateCollector',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function deleteCollector($collectorId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"collectorId"=>$collectorId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'collector/deleteCollector',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function addNewCompany($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$CompanyName = $_POST["CompanyName"];
		$CompanyAdress = $_POST["CompanyAdress"];
		$InvoiceAddress = $_POST["InvoiceAddress"];
		$TaxNo = $_POST["TaxNo"];
		$TaxAdministrationName = $_POST["TaxAdministrationName"];
		$InvoiceTelephone = $_POST["InvoiceTelephone"];
		$InvoiceMobile = $_POST["InvoiceMobile"];
		$InvoiceEmail = $_POST["InvoiceEmail"];
		$CompanyTelephone = $_POST["CompanyTelephone"];
		$CompanyMobile = $_POST["CompanyMobile"];
		$CompanyFax = $_POST["CompanyFax"];
		$CompanyEmail = $_POST["CompanyEmail"];
		$CompanySign = $_POST["CompanySign"];
		$CountryID = $_POST["CountryID"];
		$CityID = $_POST["CityID"];
		$CountyID = $_POST["CountyID"];
		$AreaID = $_POST["AreaID"];
		$HoldingID = $_POST["HoldingID"];
		$CompanyTypeID = $_POST["CompanyTypeID"];
		$data = array(
			"accessToken"=>$accessToken,
			"userId"=>$userId,
			"CompanyName" => $CompanyName,
			"CompanyAdress"=>$CompanyAdress,
			"InvoiceAddress"=>$InvoiceAddress,
			"TaxNo"=>$TaxNo,
			"TaxAdministrationName"=>$TaxAdministrationName,
			"InvoiceTelephone"=>$InvoiceTelephone,
			"InvoiceMobile"=>$InvoiceMobile,
			"InvoiceEmail"=>$InvoiceEmail,
			"CompanyTelephone"=>$CompanyTelephone,
			"CompanyMobile"=>$CompanyMobile,
			"CompanyFax"=>$CompanyFax,
			"CompanyEmail"=>$CompanyEmail,
			"CompanySign"=>$CompanySign,
			"CountryID"=>$CountryID,
			"CityID"=>$CityID,
			"CountyID"=>$CountyID,
			"AreaID"=>$AreaID,
			"HoldingID"=>$HoldingID,
			"CompanyTypeID"=>$CompanyTypeID);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'company/addCompany',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function updateCompany($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$CompanyName = $_POST["CompanyName"];
		$CompanyAdress = $_POST["CompanyAdress"];
		$InvoiceAddress = $_POST["InvoiceAddress"];
		$TaxNo = $_POST["TaxNo"];
		$TaxAdministrationName = $_POST["TaxAdministrationName"];
		$InvoiceTelephone = $_POST["InvoiceTelephone"];
		$InvoiceMobile = $_POST["InvoiceMobile"];
		$InvoiceEmail = $_POST["InvoiceEmail"];
		$CompanyTelephone = $_POST["CompanyTelephone"];
		$CompanyMobile = $_POST["CompanyMobile"];
		$CompanyFax = $_POST["CompanyFax"];
		$CompanyEmail = $_POST["CompanyEmail"];
		$CompanySign = $_POST["CompanySign"];
		$CountryID = $_POST["CountryID"];
		$CityID = $_POST["CityID"];
		$CountyID = $_POST["CountyID"];
		$AreaID = $_POST["AreaID"];
		$HoldingID = $_POST["HoldingID"];
		$CompanyTypeID = $_POST["CompanyTypeID"];
		$CompanyID = $_POST["CompanyID"];
		$data = array(
			"accessToken"=>$accessToken,
			"userId"=>$userId,
			"CompanyID"=>$CompanyID,
			"CompanyName" => $CompanyName,
			"CompanyAdress"=>$CompanyAdress,
			"InvoiceAddress"=>$InvoiceAddress,
			"TaxNo"=>$TaxNo,
			"TaxAdministrationName"=>$TaxAdministrationName,
			"InvoiceTelephone"=>$InvoiceTelephone,
			"InvoiceMobile"=>$InvoiceMobile,
			"InvoiceEmail"=>$InvoiceEmail,
			"CompanyTelephone"=>$CompanyTelephone,
			"CompanyMobile"=>$CompanyMobile,
			"CompanyFax"=>$CompanyFax,
			"CompanyEmail"=>$CompanyEmail,
			"CompanySign"=>$CompanySign,
			"CountryID"=>$CountryID,
			"CityID"=>$CityID,
			"CountyID"=>$CountyID,
			"AreaID"=>$AreaID,
			"HoldingID"=>$HoldingID,
			"CompanyTypeID"=>$CompanyTypeID);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'company/updateCompany',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function deleteCompanyById($companyId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"companyId"=>$companyId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'company/deleteCompany',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function addNewBarGroup($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$Code = $_POST["Code"];
		$Name = $_POST["Name"];
		$data = array("accessToken" => $accessToken, "userId" => $userId,"Code" => $Code,"Name"=>$Name);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'bargroup/addBarGroup',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function updateBarGroup($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$Code = $_POST["Code"];
		$Name = $_POST["Name"];
		$BarGroupID = $_POST["BarGroupID"];
		$data = array("accessToken" => $accessToken, "userId" => $userId,"BarGroupID"=>$BarGroupID,"Code" => $Code,"Name"=>$Name);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'bargroup/updatebargroup',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function deleteBarGroupById($barGroupId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"barGroupId"=>$barGroupId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'bargroup/deleteBarGroup',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function addNewTechnicalService($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$ServiceName = $_POST["ServiceName"];
		$Adress = $_POST["Adress"];
		$InvoiceAddress = $_POST["InvoiceAddress"];
		$TaxNo = $_POST["TaxNo"];
		$TaxAdministrationName = $_POST["TaxAdministrationName"];
		$InvoiceTelephone = $_POST["InvoiceTelephone"];
		$InvoiceMobile = $_POST["InvoiceMobile"];
		$InvoiceEmail = $_POST["InvoiceEmail"];
		$CountryID = $_POST["CountryID"];
		$CityID = $_POST["CityID"];
		$CountyID = $_POST["CountyID"];
		$AreaID = $_POST["AreaID"];
		$data = array(
			"accessToken"=>$accessToken,
			"userId"=>$userId,
			"ServiceName" => $ServiceName,
			"Adress"=>$Adress,
			"InvoiceAddress"=>$InvoiceAddress,
			"TaxNo" => $TaxNo,
			"TaxAdministrationName"=>$TaxAdministrationName,
			"InvoiceTelephone"=>$InvoiceTelephone,
			"InvoiceMobile" => $InvoiceMobile,
			"InvoiceEmail"=>$InvoiceEmail,
			"CountryID"=>$CountryID,
			"CityID" => $CityID,
			"CountyID"=>$CountyID,
			"AreaID"=>$AreaID);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'technicalservice/addTechnicalService',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function updateTechnicalService($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$TechnicalServiceListID = $_POST["TechnicalServiceListID"];
		$ServiceName = $_POST["ServiceName"];
		$Adress = $_POST["Adress"];
		$InvoiceAddress = $_POST["InvoiceAddress"];
		$TaxNo = $_POST["TaxNo"];
		$TaxAdministrationName = $_POST["TaxAdministrationName"];
		$InvoiceTelephone = $_POST["InvoiceTelephone"];
		$InvoiceMobile = $_POST["InvoiceMobile"];
		$InvoiceEmail = $_POST["InvoiceEmail"];
		$CountryID = $_POST["CountryID"];
		$CityID = $_POST["CityID"];
		$CountyID = $_POST["CountyID"];
		$AreaID = $_POST["AreaID"];
		$data = array(
			"accessToken"=>$accessToken,
			"userId"=>$userId,
			"TechnicalServiceListID"=>$TechnicalServiceListID,
			"ServiceName" => $ServiceName,
			"Adress"=>$Adress,
			"InvoiceAddress"=>$InvoiceAddress,
			"TaxNo" => $TaxNo,
			"TaxAdministrationName"=>$TaxAdministrationName,
			"InvoiceTelephone"=>$InvoiceTelephone,
			"InvoiceMobile" => $InvoiceMobile,
			"InvoiceEmail"=>$InvoiceEmail,
			"CountryID"=>$CountryID,
			"CityID" => $CityID,
			"CountyID"=>$CountyID,
			"AreaID"=>$AreaID);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'technicalservice/updateTechnicalService',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function deleteTechnicalServiceById($technicalServiceID){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"TechnicalServiceListID"=>$technicalServiceID);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'technicalservice/deleteTechnicalService',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function addNewCompanyDailyGuest($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$Date = $_POST["Date"];
		$TotalGuest = $_POST["TotalGuest"];
		$CompanyID = $_POST["CompanyID"];
		$data = array(
			"accessToken"=>$accessToken,
			"userId"=>$userId,
			"Date" => $Date,
			"TotalGuest"=>$TotalGuest,
			"CompanyID"=>$CompanyID);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'totaldailyguest/addTotalDailyGuest',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function updateCompanyDailyGuest($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$TotalDailyGuestID = $_POST["TotalDailyGuestID"];
		$Date = $_POST["Date"];
		$TotalGuest = $_POST["TotalGuest"];
		$CompanyID = $_POST["CompanyID"];
		$data = array(
			"accessToken"=>$accessToken,
			"userId"=>$userId,
			"TotalDailyGuestID" => $TotalDailyGuestID,
			"Date" => $Date,
			"TotalGuest"=>$TotalGuest,
			"CompanyID"=>$CompanyID);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'totaldailyguest/updateTotalDailyGuest',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function updateCompanyBarGroup($data){
		$CompanyID = $_POST["CompanyID"];
		$BarGroupsArray = @$_POST["BarGroups"];
		if(is_array($BarGroupsArray)){
			$barGroups = implode(",",$BarGroupsArray);
		}else{
			$barGroups = $BarGroupsArray;
		}
		if(!$barGroups){
			$barGroups = "";
		}
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"CompanyID"=>$CompanyID,"barGroups"=>$barGroups);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'companybargroup/updateCompanyBarGroup',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function updateTechnicalServiceUser($data){
		$TechnicalServiceListID = $_POST["TechnicalServiceListID"];
		$UsersArray = @$_POST["technicalServiceUsers"];
		if(is_array($UsersArray)){
			$users = implode(",",$UsersArray);
		}else{
			$users = $UsersArray;
		}
		if(!$users){
			$users = "";
		}
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"TechnicalServiceListID"=>$TechnicalServiceListID,"UserIDs"=>$users);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'technicalservice/updateUsersTechnicalService',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function addNewTap($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$Name = @$_POST["Name"];
		$ID1 = $_POST["ID1"];
		$ID2 = @$_POST["ID2"];
		$ID3 = @$_POST["ID3"];
		$Version = @$_POST["Version"];
		$HoldingID = @$_POST["HoldingID"];
		$CompanyID = @$_POST["CompanyID"];
		$BarGroupID = @$_POST["BarGroupID"];
		$AlcoholGroupID = @$_POST["AlcoholGroupID"];
		$AlcoholTypeID = @$_POST["AlcoholTypeID"];
		$AlcoholBrandID = @$_POST["AlcoholBrandID"];
		$TapStatusID = @$_POST["TapStatusID"];
		$collector_id = @$_POST["collector_id"];
		$buttons = @$_POST["buttons"];
		$NetPrice = @$_POST["NetPrice"];
		$SalePrice = @$_POST["SalePrice"];
		$data = array(
			"accessToken"=>$accessToken,
			"userId"=>$userId,
			"Name" => $Name,
			"ID1"=>$ID1,
			"ID2"=>$ID2,
			"ID3" => $ID3,
			"Version"=>$Version,
			"HoldingID"=>$HoldingID,
			"CompanyID" => $CompanyID,
			"BarGroupID"=>$BarGroupID,
			"AlcoholGroupID"=>$AlcoholGroupID,
			"AlcoholTypeID" => $AlcoholTypeID,
			"AlcoholBrandID"=>$AlcoholBrandID,
			"TapStatusID"=>$TapStatusID,
			"collector_id"=>$collector_id,
			"buttons"=>$buttons,
			"NetPrice"=>$NetPrice,
			"SalePrice"=>$SalePrice);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'tap/addTap',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function updateTap($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$TapID = $_POST["TapID"];
		$Name = $_POST["Name"];
		$ID1 = $_POST["ID1"];
		$Version = $_POST["Version"];
		$HoldingID = $_POST["HoldingID"];
		$CompanyID = $_POST["CompanyID"];
		$BarGroupID = $_POST["BarGroupID"];
		$AlcoholGroupID = $_POST["AlcoholGroupID"];
		$AlcoholTypeID = $_POST["AlcoholTypeID"];
		$AlcoholBrandID = $_POST["AlcoholBrandID"];
		$TapStatusID = $_POST["TapStatusID"];
		$collector_id = $_POST["collector_id"];
		$buttons = $_POST["buttons"];
		$NetPrice = $_POST["NetPrice"];
		$SalePrice = $_POST["SalePrice"];
		$data = array(
			"accessToken"=>$accessToken,
			"userId"=>$userId,
			"TapID"=>$TapID,
			"Name" => $Name,
			"ID1"=>$ID1,
			"Version"=>$Version,
			"HoldingID"=>$HoldingID,
			"CompanyID" => $CompanyID,
			"BarGroupID"=>$BarGroupID,
			"AlcoholGroupID"=>$AlcoholGroupID,
			"AlcoholTypeID" => $AlcoholTypeID,
			"AlcoholBrandID"=>$AlcoholBrandID,
			"TapStatusID"=>$TapStatusID,
			"collector_id"=>$collector_id,
			"buttons"=>$buttons,
			"NetPrice"=>$NetPrice,
			"SalePrice"=>$SalePrice);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'tap/updateTap',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function changePassword($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$password = $_POST["password"];
		$password2 = $_POST["password2"];
		$changeUserId = $_POST["userId"];
		$data = array(
			"accessToken"=>$accessToken,
			"userId"=>$userId,
			"password" => $password,
			"password2" => $password2,
			"changeUserId"=>$changeUserId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'user/changePassword',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function tapWizard($data){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$HoldingID = $_POST["holding"];
		$CompanyID = $_POST["company"];
		$BarGroupID = $_POST["bargroup"];
		$AlcoholTypeID = $_POST["alcoholType"];
		$AlcoholBrandID = $_POST["alcoholBrand"];
		$collector_id = $_POST["collector_id"];
		$buttons = $_POST["buttons"];
		$NetPrice = $_POST["netPrice"];
		$SalePrice = $_POST["salePrice"];
		$data = array(
			"accessToken" => $accessToken, 
			"userId" => $userId,
			"HoldingID"=>$HoldingID,
			"CompanyID"=>$CompanyID,
			"BarGroupID"=>$BarGroupID,
			"AlcoholTypeID"=>$AlcoholTypeID,
			"AlcoholBrandID"=>$AlcoholBrandID,
			"collector_id"=>$collector_id,
			"buttons"=>$buttons,
			"NetPrice"=>$NetPrice,
			"SalePrice"=>$SalePrice);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'tap/tapWizard',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
}
?>