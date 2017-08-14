<?php
class General_model extends CI_Model
{
	public function getCompanyTypes(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'company/getCompanyTypelist');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getCountries(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'country/getCountry',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getCountryById($countryId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"countryId"=>$countryId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'country/getCountry',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getCitiesByCountryId($countryId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"countryId"=>$countryId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'city/getCityListByCountry',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getCities(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'city/getCity',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getCityById($cityId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"cityId"=>$cityId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'city/getCity',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getDistrictsByCityId($cityId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"cityId"=>$cityId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'county/getCountyListByCity',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}

	public function getDistricts(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'county/getCounty',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}

	public function getDistrictsById($countyId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"countyId"=>$countyId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'county/getCounty',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getAreasByDistrictId($districtId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"countyId"=>$districtId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'area/getAreaListByCounty',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getAreas(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'area/getArea',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getAreaById($areaId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"areaId"=>$areaId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'area/getArea',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getHoldings(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'holding/getHoldinglist',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getHoldingById($holdingId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"holdingId"=>$holdingId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'holding/getHoldinglist',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getHoldingByCountryId($countryId){
		if($countryId != 0){
			$accessToken = $this->session->userdata("accessToken");
			$userId = $this->session->userdata("userId");
			$data = array("accessToken" => $accessToken, "userId" => $userId,"countryId"=>$countryId);
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => NEW_API_ENDPOINT.'holding/getHoldingByCountry',
			CURLOPT_POSTFIELDS => http_build_query($data)
			));
			$response = json_decode(curl_exec($curl));
			return $response->message;
		}else{
			return $this->getHoldings();
		}
	}
	public function getHoldingByCityId($cityId){
		if($cityId!=0){
			$accessToken = $this->session->userdata("accessToken");
			$userId = $this->session->userdata("userId");
			$data = array("accessToken" => $accessToken, "userId" => $userId,"cityId"=>$cityId);
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => NEW_API_ENDPOINT.'holding/getHoldingByCity',
			CURLOPT_POSTFIELDS => http_build_query($data)
			));
			$response = json_decode(curl_exec($curl));
			return $response->message;
		}else{
			return $this->getHoldings();
		}
	}
	public function getHoldingByCountyId($countyId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"countyId"=>$countyId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'holding/getHoldingByCounties',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getHoldingByAreaId($areaId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"areaId"=>$areaId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'holding/getHoldingByAreas',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	
	public function getCompanyByHoldingId($holdingId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"holdingId"=>$holdingId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'company/getCompanyByHolding',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getBarsByCompanyId($companyId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"companyId"=>$companyId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'bargroup/getBarGrouplistByCompany',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getLeftSideMenu(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'helper/getLeftSideMenu',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTotalCompanyCount(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"holdingId"=>"");
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'helper/getTotalCompany',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTotalTapCount(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'helper/getTotalTap',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTotalActiveTapCount(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'helper/getTotalActiveTap',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	
	public function getCollectorList(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'collector/getCollectorList',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getCompanies(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'company/getCompanylist',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}

	public function getCompanyById($companyId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"companyId"=>$companyId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'company/getCompanylist',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}

	public function getCompanyByCountryId($countryId){
		if($countryId != 0){
			$accessToken = $this->session->userdata("accessToken");
			$userId = $this->session->userdata("userId");
			$data = array("accessToken" => $accessToken, "userId" => $userId,"countryId"=>$countryId);
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => NEW_API_ENDPOINT.'company/getCompanyByCountry',
			CURLOPT_POSTFIELDS => http_build_query($data)
			));
			$response = json_decode(curl_exec($curl));
			return $response->message;
		}else{
			return $this->getCompanies();
		}
	}

	public function getCompanyByCityId($cityId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"cityId"=>$cityId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'company/getCompanyByCity',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}

	public function getAlcoholTypePercentage(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'helper/getalcoholtypepercentage',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}

	public function getUserGroups(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'user/getUserGroupList');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}

	public function getLastTapData(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'helper/getLastTapData',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}

	public function getAlcoholGrouplist(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'alcoholgroup/getAlcoholGrouplist',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}

	public function getAlcoholGroupById($alcoholGroupId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"alcoholGroupId"=>$alcoholGroupId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'alcoholgroup/getAlcoholGrouplist',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}

	public function getAlcoholTypelist(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'alcoholtype/getAlcoholTypelist',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}

	public function getAlcoholTypeById($alcoholTypeId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"AlcoholTypeId"=>$alcoholTypeId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'alcoholtype/getAlcoholTypelist',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}

	public function getAlcoholBrandlist(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'alcoholbrand/getAlcoholBrandlist',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}

	public function getAlcoholBrandById($alcoholBrandId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"AlcoholBrandId"=>$alcoholBrandId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'alcoholbrand/getAlcoholBrandlist',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getCollectorById($collectorId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'collector/getCollectorList/'.$collectorId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getBarGroups(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'bargroup/getBarGrouplist',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getBarGroupById($barGroupId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"BarGroupId"=>$barGroupId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'bargroup/getBarGrouplist',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getDailyConsumedAlcoholFilteredByDate($dateBegin,$dateEnd,$holdingId,$companyId,$barGroupId,$tapId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"dateBegin"=>$dateBegin,"dateEnd"=>$dateEnd);
		$endpoint = 'helper/getDailyConsumedAlcoholFilteredByDate';
		if($holdingId > 0){
			$data = array("accessToken" => $accessToken, "userId" => $userId,"dateBegin"=>$dateBegin,"dateEnd"=>$dateEnd,"holdingId"=>$holdingId);
			$endpoint = 'helper/getDailyConsumedAlcoholFilteredByDateByHoldingID';
		}
		if($companyId > 0){
			$data = array("accessToken" => $accessToken, "userId" => $userId,"dateBegin"=>$dateBegin,"dateEnd"=>$dateEnd,"companyId"=>$companyId);
			$endpoint = 'helper/getDailyConsumedAlcoholFilteredByDateByCompanyID';
		}
		if($barGroupId > 0){
			$data = array("accessToken" => $accessToken, "userId" => $userId,"dateBegin"=>$dateBegin,"dateEnd"=>$dateEnd,"barGroupId"=>$barGroupId);
			$endpoint = 'helper/getDailyConsumedAlcoholFilteredByDateByBarGroupID';
		}
		if($tapId > 0){
			$data = array("accessToken" => $accessToken, "userId" => $userId,"dateBegin"=>$dateBegin,"dateEnd"=>$dateEnd,"holdingId"=>$tapId);
			$endpoint = 'helper/getDailyConsumedAlcoholFilteredByDateByTapID';
		}
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.$endpoint,
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTechnicalServiceList(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'technicalservice/getTechnicalServiceList');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getTechnicalServiceById($technicalServiceId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'technicalservice/getTechnicalServiceList/'.$technicalServiceId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getCompanyBarGroups(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'companybargroup/getCompanyBarGrouplist',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTotalDailyGuests(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'totaldailyguest/getTotalDailyGuestlist');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getTotalDailyGuestById($TotalDailyGuestID){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'totaldailyguest/getTotalDailyGuestlist/'.$TotalDailyGuestID);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getTaps(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'tap/getTap');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'Content-Type: application/json',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getCompanyBarGroupByCompanyId($companyId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"CompanyID"=>$companyId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'companybargroup/getCompanyBarGrouplist',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
}
?>