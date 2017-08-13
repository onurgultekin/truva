<?php
class Admin_model extends CI_Model
{
	public function getUserLog($dateBegin,$dateEnd){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'user/userLog/'.$dateBegin.'/'.$dateEnd);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}

	public function addNewHolding($data){
		$token = $this->session->userdata("token");
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
		$data = array(
			"postData" => array(
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
				"AreaID"=>$AreaID));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'holding/addHolding');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function updateHolding($data){
		$token = $this->session->userdata("token");
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
		$data = array(
			"HoldingID"=>$HoldingID,
			"postData" => array(
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
				"AreaID"=>$AreaID));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'holding/updateHolding');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function deleteHoldingById($holdingId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'holding/deleteHolding/'.$holdingId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function getUsers(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'user/getUsers');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}

	public function getUserById($userId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'user/getUsers/'.$userId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}

	public function addNewUser($data){
		$token = $this->session->userdata("token");
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
			"postData" => array(
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
				));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'user/adduser');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}

	public function updateUser($data){
		$token = $this->session->userdata("token");
		$UserID = $_POST["id"];
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$user_email = $_POST["email"];
		$user_password = $_POST["password"];
		$CompanyID = $_POST["CompanyID"];
		$phone = $_POST["phone"];
		$group_id = $_POST["group_id"];
		$address = $_POST["address"];
		$country_id = $_POST["country_id"];
		$city_id = $_POST["city_id"];
		$county_id = $_POST["county_id"];
		$postcode = $_POST["postcode"];
		$data = array(
			"UserID"=>$UserID,
			"postData" => array(
				"first_name" => $first_name,
				"last_name" => $last_name,
				"user_email" => $user_email,
				"user_password" => $user_password,
				"CompanyID" => $CompanyID,
				"phone" => $phone,
				"group_id" => $group_id,
				"address" => $address,
				"country_id" => $country_id,
				"city_id" => $city_id,
				"county_id" => $county_id,
				"postcode" => $postcode
				));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'user/addUser');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}

	public function addNewCountry($data){
		$BinaryCode = $_POST["BinaryCode"];
		$TripleCode = $_POST["TripleCode"];
		$CountryName = $_POST["CountryName"];
		$PhoneCode = $_POST["PhoneCode"];
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
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
		$token = $this->session->userdata("token");
		$CityName = $_POST["CityName"];
		$PlateNo = $_POST["PlateNo"];
		$PhoneCode = $_POST["PhoneCode"];
		$CountryID = $_POST["CountryID"];
		$data = array("postData" => array("CityName" => $CityName,"PlateNo"=>$PlateNo,"CountryID"=>$CountryID,"PhoneCode"=>$PhoneCode));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'city/addCity');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}

	public function updateCity($data){
		$token = $this->session->userdata("token");
		$CityID = $_POST["CityID"];
		$CityName = $_POST["CityName"];
		$PlateNo = $_POST["PlateNo"];
		$PhoneCode = $_POST["PhoneCode"];
		$CountryID = $_POST["CountryID"];
		$data = array("CityID" => $CityID,"postData" => array("CityName" => $CityName,"PlateNo"=>$PlateNo,"CountryID"=>$CountryID,"PhoneCode"=>$PhoneCode));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'city/updateCity');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}

	public function deleteCity($cityId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'city/deleteCity/'.$cityId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}

	public function addNewCounty($data){
		$token = $this->session->userdata("token");
		$CountyName = $_POST["CountyName"];
		$CityID = $_POST["CityID"];
		$data = array("postData" => array("CountyName" => $CountyName,"CityID"=>$CityID));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'county/addCounty');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}

	public function updateCounty($data){
		$token = $this->session->userdata("token");
		$CountyID = $_POST["CountyID"];
		$CountyName = $_POST["CountyName"];
		$CityID = $_POST["CityID"];
		$data = array("CountyID" => $CountyID,"postData" => array("CountyName" => $CountyName,"CityID"=>$CityID));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'county/updateCounty');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function deleteCounty($countyId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'county/deleteCounty/'.$countyId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function addNewArea($data){
		$token = $this->session->userdata("token");
		$AreaName = $_POST["AreaName"];
		$CountyID = $_POST["CountyID"];
		$data = array("postData" => array("AreaName" => $AreaName,"CountyID"=>$CountyID));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'area/addArea');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function updateArea($data){
		$token = $this->session->userdata("token");
		$AreaID = $_POST["AreaID"];
		$AreaName = $_POST["AreaName"];
		$CountyID = $_POST["CountyID"];
		$data = array("AreaID" => $AreaID,"postData" => array("AreaName" => $AreaName,"CountyID"=>$CountyID));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'area/updateArea');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}

	public function deleteArea($areaId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'area/deleteArea/'.$areaId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}

	public function addNewAlcoholGroup($data){
		$token = $this->session->userdata("token");
		$Code = $_POST["Code"];
		$Name = $_POST["Name"];
		$data = array("postData" => array("Code" => $Code,"Name"=>$Name));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'alcoholgroup/addAlcoholGroup');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}

	public function updateAlcoholGroup($data){
		$token = $this->session->userdata("token");
		$AlcoholGroupID = $_POST["AlcoholGroupID"];
		$Code = $_POST["Code"];
		$Name = $_POST["Name"];
		$data = array("AlcoholGroupID" => $AlcoholGroupID,"postData" => array("Code" => $Code,"Name"=>$Name));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'alcoholgroup/updateAlcoholGroup');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function deleteAlcoholGroupById($alcoholGroupId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'alcoholgroup/deleteAlcoholGroup/'.$alcoholGroupId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function addNewAlcoholType($data){
		$token = $this->session->userdata("token");
		$Code = $_POST["Code"];
		$Name = $_POST["Name"];
		$AlcoholGroupID = $_POST["AlcoholGroupID"];
		$data = array("postData" => array("Code" => $Code,"Name"=>$Name,"AlcoholGroupID"=>$AlcoholGroupID));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'alcoholtype/addAlcoholType');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function updateAlcoholType($data){
		$token = $this->session->userdata("token");
		$AlcoholTypeID = $_POST["AlcoholTypeID"];
		$Code = $_POST["Code"];
		$Name = $_POST["Name"];
		$AlcoholGroupID = $_POST["AlcoholGroupID"];
		$data = array("AlcoholTypeID" => $AlcoholTypeID,"postData" => array("AlcoholGroupID"=>$AlcoholGroupID,"Code" => $Code,"Name"=>$Name));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'alcoholtype/updateAlcoholType');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function deleteAlcoholTypeById($alcoholTypeId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'alcoholtype/deleteAlcoholType/'.$alcoholTypeId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function addNewAlcoholBrand($data){
		$token = $this->session->userdata("token");
		$Code = $_POST["Code"];
		$Name = $_POST["Name"];
		$AlcoholTypeID = $_POST["AlcoholTypeID"];
		$data = array("postData" => array("Code" => $Code,"Name"=>$Name,"AlcoholTypeID"=>$AlcoholTypeID));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'alcoholbrand/addAlcoholBrand');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function updateAlcoholBrand($data){
		$token = $this->session->userdata("token");
		$AlcoholBrandID = $_POST["AlcoholBrandID"];
		$Code = $_POST["Code"];
		$Name = $_POST["Name"];
		$AlcoholTypeID = $_POST["AlcoholTypeID"];
		$data = array("AlcoholBrandID" => $AlcoholBrandID,"postData" => array("AlcoholTypeID"=>$AlcoholTypeID,"Code" => $Code,"Name"=>$Name));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'alcoholbrand/updateAlcoholBrand');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function deleteAlcoholBrandById($alcoholBrandId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'alcoholbrand/deleteAlcoholBrand/'.$alcoholBrandId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function addNewCollector($data){
		$token = $this->session->userdata("token");
		$notification_email = $_POST["notification_email"];
		$eth_mac_address = $_POST["eth_mac_address"];
		$wifi_mac_address = $_POST["wifi_mac_address"];
		$Barcode = $_POST["Barcode"];
		$Latitude = $_POST["Latitude"];
		$Longitude = $_POST["Longitude"];
		$data = array(
			"postData" => array(
				"notification_email" => $notification_email,
				"eth_mac_address"=>$eth_mac_address,
				"wifi_mac_address"=>$wifi_mac_address,
				"Barcode"=>$Barcode,
				"Latitude"=>$Latitude,
				"Longitude"=>$Longitude));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'collector/addCollector');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function updateCollector($data){
		$token = $this->session->userdata("token");
		$notification_email = $_POST["notification_email"];
		$eth_mac_address = $_POST["eth_mac_address"];
		$wifi_mac_address = $_POST["wifi_mac_address"];
		$Barcode = $_POST["Barcode"];
		$Latitude = $_POST["Latitude"];
		$Longitude = $_POST["Longitude"];
		$collector_id = $_POST["collector_id"];
		$data = array(
			"collector_id" => $collector_id,
			"postData" => array(
				"notification_email" => $notification_email,
				"eth_mac_address"=>$eth_mac_address,
				"wifi_mac_address"=>$wifi_mac_address,
				"Barcode"=>$Barcode,
				"Latitude"=>$Latitude,
				"Longitude"=>$Longitude));
		$data_string = json_encode($data);
		echo $data_string;
		$ch = curl_init(API_ENDPOINT.'collector/updateCollector');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function addNewCompany($data){
		$token = $this->session->userdata("token");
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
			"postData" => array(
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
				"CompanyTypeID"=>$CompanyTypeID));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'company/addCompany');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function updateCompany($data){
		$token = $this->session->userdata("token");
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
			"CompanyID"=>$CompanyID,
			"postData" => array(
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
				"CompanyTypeID"=>$CompanyTypeID));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'company/updateCompany');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function deleteCompanyById($companyId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'company/deleteCompany/'.$companyId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function addNewBarGroup($data){
		$token = $this->session->userdata("token");
		$Code = $_POST["Code"];
		$Name = $_POST["Name"];
		$data = array("postData" => array("Code" => $Code,"Name"=>$Name));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'bargroup/addBarGroup');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function updateBarGroup($data){
		$token = $this->session->userdata("token");
		$Code = $_POST["Code"];
		$Name = $_POST["Name"];
		$BarGroupID = $_POST["BarGroupID"];
		$data = array("BarGroupID"=>$BarGroupID,"postData" => array("Code" => $Code,"Name"=>$Name));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'bargroup/updatebargroup');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function deleteBarGroupById($barGroupId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'bargroup/deleteBarGroup/'.$barGroupId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function addNewTechnicalService($data){
		$token = $this->session->userdata("token");
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
			"postData" => 
			array(
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
				"AreaID"=>$AreaID));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'technicalservice/addTechnicalServiceList');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function deleteTechnicalServiceById($technicalServiceID){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'technicalservice/deleteTechnicalServiceList/'.$technicalServiceID);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function addNewCompanyDailyGuest($data){
		$token = $this->session->userdata("token");
		$Date = $_POST["Date"];
		$TotalGuest = $_POST["TotalGuest"];
		$CompanyID = $_POST["CompanyID"];
		$data = array(
			"postData" => 
			array(
				"Date" => $Date,
				"TotalGuest"=>$TotalGuest,
				"CompanyID"=>$CompanyID));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'totaldailyguest/addTotalDailyGuest');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
	public function updateCompanyDailyGuest($data){
		$token = $this->session->userdata("token");
		$TotalDailyGuestID = $_POST["TotalDailyGuestID"];
		$Date = $_POST["Date"];
		$TotalGuest = $_POST["TotalGuest"];
		$CompanyID = $_POST["CompanyID"];
		$data = array(
			"TotalDailyGuestID" => $TotalDailyGuestID,
			"postData" => array(
				"Date" => $Date,
				"TotalGuest"=>$TotalGuest,
				"CompanyID"=>$CompanyID));
		$data_string = json_encode($data);
		$ch = curl_init(API_ENDPOINT.'totaldailyguest/updateTotalDailyGuest');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response;
	}
}
?>