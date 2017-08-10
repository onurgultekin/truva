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
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'country/getCountry');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getCountryById($countryId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'country/getCountry/'.$countryId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getCitiesByCountryId($countryId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'city/getCityListByCountry/'.$countryId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getCities(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'city/getCity');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getCityById($cityId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'city/getCity/'.$cityId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getDistrictsByCityId($cityId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'county/getCountyListByCity/'.$cityId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}

	public function getDistricts(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'county/getCounty');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}

	public function getDistrictsById($countyId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'county/getCounty/'.$countyId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getAreasByDistrictId($districtId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'area/getAreaListByCounty/'.$districtId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getAreas(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'area/getArea');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getAreaById($areaId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'area/getArea/'.$areaId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getHoldings(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'holding/getHoldinglist');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getHoldingById($holdingId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'holding/getHoldinglist/'.$holdingId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getHoldingByCountryId($countryId){
		if($countryId != 0){
			$token = $this->session->userdata("token");
			$ch = curl_init(API_ENDPOINT.'holding/getHoldingByCountry/'.$countryId);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'token:'.$token.'',
			    'ipaddress:'.$this->input->ip_address().'',
			    'identity:'.$this->session->userdata("identity").'')
			);
			$response = json_decode(curl_exec($ch));
			return $response->message;
		}else{
			return $this->getHoldings();
		}
	}
	public function getHoldingByCityId($cityId){
		if($cityId!=0){
			$token = $this->session->userdata("token");
			$ch = curl_init(API_ENDPOINT.'holding/getHoldingByCity/'.$cityId);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'token:'.$token.'',
			    'ipaddress:'.$this->input->ip_address().'',
			    'identity:'.$this->session->userdata("identity").'')
			);
			$response = json_decode(curl_exec($ch));
			return $response->message;
		}else{
			return $this->getHoldings();
		}
	}
	public function getHoldingByCountyId($countyId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'holding/getHoldingByCounties/'.$countyId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getHoldingByAreaId($areaId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'holding/getHoldingByAreas/'.$areaId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	
	public function getCompanyByHoldingId($holdingId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'company/getCompanyByHolding/'.$holdingId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getBarsByCompanyId($companyId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'bargroup/getBarGrouplistByCompany/'.$companyId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getLeftSideMenu(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'helper/getLeftSideMenu');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getTotalCompanyCount(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'helper/getTotalCompany');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getTotalTapCount(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'helper/getTotalTap');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getTotalActiveTapCount(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'helper/getTotalActiveTap');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	
	public function getCollectorList(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'collector/getCollectorList');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}
	public function getCompanies(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'company/getCompanylist');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}

	public function getCompanyById($companyId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'company/getCompanylist/'.$companyId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}

	public function getCompanyByCountryId($countryId){
		if($countryId != 0){
			$token = $this->session->userdata("token");
			$ch = curl_init(API_ENDPOINT.'company/getCompanyByCountry/'.$countryId);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'token:'.$token.'',
			    'ipaddress:'.$this->input->ip_address().'',
			    'identity:'.$this->session->userdata("identity").'')
			);
			$response = json_decode(curl_exec($ch));
			return $response->message;
		}else{
			return $this->getCompanies();
		}
	}

	public function getCompanyByCityId($cityId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'company/getCompanyByCity/'.$cityId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}

	public function getAlcoholTypePercentage(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'helper/getalcoholtypepercentage');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
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
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'helper/getLastTapData');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}

	public function getAlcoholGrouplist(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'alcoholgroup/getAlcoholGrouplist');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}

	public function getAlcoholGroupById($alcoholGroupId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'alcoholgroup/getAlcoholGrouplist/'.$alcoholGroupId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}

	public function getAlcoholTypelist(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'alcoholtype/getAlcoholTypelist');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}

	public function getAlcoholTypeById($alcoholTypeId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'alcoholtype/getAlcoholTypelist/'.$alcoholTypeId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}

	public function getAlcoholBrandlist(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'alcoholbrand/getAlcoholBrandlist');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
		return $response->message;
	}

	public function getAlcoholBrandById($alcoholBrandId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'alcoholbrand/getAlcoholBrandlist/'.$alcoholBrandId);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'token:'.$token.'',
		    'ipaddress:'.$this->input->ip_address().'',
		    'identity:'.$this->session->userdata("identity").'')
		);
		$response = json_decode(curl_exec($ch));
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
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'bargroup/getBarGrouplist');
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
	public function getBarGroupById($barGroupId){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'bargroup/getBarGrouplist/'.$barGroupId);
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
	public function getDailyConsumedAlcoholFilteredByDate($dateBegin,$dateEnd){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'helper/getDailyConsumedAlcoholFilteredByDate/'.$dateBegin."/".$dateEnd);
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
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'bargroup/getBarGroupCompanylistByCompany');
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
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'bargroup/getBarGroupCompanyDetail/'.$companyId);
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
}
?>