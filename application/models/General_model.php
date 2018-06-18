<?php
class General_model extends CI_Model
{
	public function getCompanyTypes(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'company/getCompanyTypelist',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
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
			return $response;
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
			return $response;
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
		return $response;
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
		return $response;
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
		return $response;
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
		return $response;
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
	public function getTotalCompanyCountByCountryId($countryId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"countryId"=>$countryId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'helper/getTotalCompanyByCountryId',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTotalCompanyCountByCityId($cityId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"cityId"=>$cityId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'helper/getTotalCompanyByCityId',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTotalCompanyCountByCountyId($countyId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"countyId"=>$countyId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'helper/getTotalCompanyByCountyId',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTotalCompanyCountByAreaId($areaId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"areaId"=>$areaId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'helper/getTotalCompanyByAreaId',
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
	public function getTotalTapCountByCountryId($countryId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"countryId"=>$countryId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'helper/getTotalTapByCountryId',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTotalTapCountByCityId($cityId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"cityId"=>$cityId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'helper/getTotalTapByCityId',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTotalTapCountByCountyId($countyId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"countyId"=>$countyId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'helper/getTotalTapByCountyId',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTotalTapCountByAreaId($areaId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"areaId"=>$areaId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'helper/getTotalTapByAreaId',
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

	public function getTotalActiveTapCountByCountryId($countryId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"countryId"=>$countryId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'helper/getTotalActiveTapByCountryId',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTotalActiveTapCountByCityId($cityId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"cityId"=>$cityId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'helper/getTotalActiveTapByCityId',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTotalActiveTapCountByCountyId($countyId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"countyId"=>$countyId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'helper/getTotalActiveTapByCountyId',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTotalActiveTapCountByAreaId($areaId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"areaId"=>$areaId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'helper/getTotalActiveTapByAreaId',
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
		return $response;
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
			return $response;
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
		return $response;
	}

	public function getCompanyByCountyId($countyId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"countyId"=>$countyId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'company/getCompanyByCounties',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}

	public function getCompanyByAreaId($areaId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"areaId"=>$areaId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'company/getCompanyByAreas',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
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
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'user/getUserGroupList',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
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
	public function getAlcoholBrandByAlcoholType($alcoholTypeId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"alcoholTypeId"=>$alcoholTypeId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'alcoholbrand/getAlcoholBrandByAlcoholType',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getCollectorById($collectorId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"collectorId"=>$collectorId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'collector/getCollectorList',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
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
			$data = array("accessToken" => $accessToken, "userId" => $userId,"dateBegin"=>$dateBegin,"dateEnd"=>$dateEnd,"tapId"=>$tapId);
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
	public function getDailyAverageConsumedAlcoholFilteredByDate($dateBegin,$dateEnd,$holdingId,$companyId,$barGroupId,$tapId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"dateBegin"=>$dateBegin,"dateEnd"=>$dateEnd);
		$endpoint = 'helper/getDailyAverageConsumedAlcoholFilteredByDate';
		if($holdingId > 0){
			$data = array("accessToken" => $accessToken, "userId" => $userId,"dateBegin"=>$dateBegin,"dateEnd"=>$dateEnd,"holdingId"=>$holdingId);
			$endpoint = 'helper/getDailyAverageConsumedAlcoholFilteredByDateByHoldingID';
		}
		if($companyId > 0){
			$data = array("accessToken" => $accessToken, "userId" => $userId,"dateBegin"=>$dateBegin,"dateEnd"=>$dateEnd,"companyId"=>$companyId);
			$endpoint = 'helper/getDailyAverageConsumedAlcoholFilteredByDateByCompanyID';
		}
		if($barGroupId > 0){
			$data = array("accessToken" => $accessToken, "userId" => $userId,"dateBegin"=>$dateBegin,"dateEnd"=>$dateEnd,"barGroupId"=>$barGroupId);
			$endpoint = 'helper/getDailyAverageConsumedAlcoholFilteredByDateByBarGroupID';
		}
		if($tapId > 0){
			$data = array("accessToken" => $accessToken, "userId" => $userId,"dateBegin"=>$dateBegin,"dateEnd"=>$dateEnd,"tapId"=>$tapId);
			$endpoint = 'helper/getDailyAverageConsumedAlcoholFilteredByDateByTapID';
		}
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.$endpoint,
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));

		return @$response->message;
	}
	public function getTechnicalServiceList(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'technicalservice/getTechnicalServiceList',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTechnicalServiceById($technicalServiceId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"technicalServiceListId"=>$technicalServiceId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'technicalservice/getTechnicalServiceList',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
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
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'totaldailyguest/getTotalDailyGuestlist',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTotalDailyGuestById($TotalDailyGuestID){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"TotalDailyGuestId"=>$TotalDailyGuestID);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'totaldailyguest/getTotalDailyGuestlist',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTaps(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'tap/getTap',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTapById($tapId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"tapId"=>$tapId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'tap/getTap',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTapByBarGroupId($barGroupId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"barGroupId"=>$barGroupId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'tap/getTapByBarGroupId',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response;
	}
	public function getTapStatuses(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'tap/getTapStatuses',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
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
	public function getTechnicalServiceUsersById($technicalServiceId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId,"technicalServiceListId"=>$technicalServiceId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'technicalservice/getUsersByTechnicalService',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTechnicalServiceUsers(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'technicalservice/getTechnicalServiceUsers',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTechnicalServiceForm(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array(
			"accessToken" => $accessToken, 
			"userId" => $userId,
			"technicalServiceFormID" => "null",
			"technicalServiceReportTypeID" => "null",
			"beginDate" => "null",
			"endDate" => "null",
			"declaredUserID" => "null",
			"receivedUserID" => "null",
			"completedUserID" => "null",
			"description" => "null",
			"technicalServicePriorityID" => "null",
			"technicalServiceStatusID" => "null",
			"companyID" => "null",
			"tapID" => "null"
			);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'technicalserviceform/getTechnicalServiceForm',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTechnicalServiceFormById($TechnicalServiceFormId){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array(
			"accessToken" => $accessToken, 
			"userId" => $userId,
			"technicalServiceFormID" => $TechnicalServiceFormId,
			"technicalServiceReportTypeID" => "null",
			"beginDate" => "null",
			"endDate" => "null",
			"declaredUserID" => "null",
			"receivedUserID" => "null",
			"completedUserID" => "null",
			"description" => "null",
			"technicalServicePriorityID" => "null",
			"technicalServiceStatusID" => "null",
			"companyID" => "null",
			"tapID" => "null"
			);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'technicalserviceform/getTechnicalServiceForm',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTechnicalServiceStatuses(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'technicalserviceform/getTechnicalServiceStatus',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTechnicalServicePriorities(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'technicalserviceform/getTechnicalServicePriority',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getTechnicalServiceReportTypes(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'technicalserviceform/getTechnicalServiceReportType',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getActiveTaps(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'tap/activeTaps',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
	public function getActiveCollectors(){
		$accessToken = $this->session->userdata("accessToken");
		$userId = $this->session->userdata("userId");
		$data = array("accessToken" => $accessToken, "userId" => $userId);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'collector/activeCollectors',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$response = json_decode(curl_exec($curl));
		return $response->message;
	}
}
?>