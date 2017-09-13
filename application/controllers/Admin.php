<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata("token")){
			redirect(base_url());
		}
	}

	public function getUserLogByDate()
	{
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$dateBegin = $this->input->post("dateBegin");
		$dateEnd = $this->input->post("dateEnd");
		if(!$dateBegin){
			$dateBegin = date("Y-m-d", strtotime("-1 day"));
		}
		if(!$dateEnd){
			$dateEnd = date("Y-m-d");
		}
		$userlogs = $this->admin_model->getUserLog($dateBegin,$dateEnd);
		echo json_encode($userlogs);
	}
	public function addNewHolding(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$addHolding = $this->admin_model->addNewHolding($data);
		echo json_encode($addHolding);
	}

	public function updateHolding(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$updateHolding = $this->admin_model->updateHolding($data);
		echo json_encode($updateHolding);
	}

	public function deleteHolding(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$HoldingID = $this->input->post("HoldingID");
		$deleteHolding = $this->admin_model->deleteHoldingById($HoldingID);
		echo json_encode($deleteHolding);
	}

	public function getUsers()
	{
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$users = $this->admin_model->getUsers();
		echo json_encode($users);
	}
	public function getUserById()
	{
		$formFields= [
		[
		"name"=>"Adı",
		"id"=>"first_name",
		"type"=>"text"
		],
		[
		"name"=>"Soyadı",
		"id"=>"last_name",
		"type"=>"text"
		],
		[
		"name"=>"E-posta adresi",
		"id"=>"email",
		"type"=>"email"
		],
		[
		"name"=>"Holding seçin",
		"id"=>"HoldingID",
		"type"=>"select",
		"disabled"=>"",
		"class"=>"holdingsinmodal"
		],
		[
		"name"=>"Şirket seçin",
		"id"=>"CompanyID",
		"type"=>"select",
		"disabled"=>"",
		"class"=>"companiesinmodal"
		],
		[
		"name"=>"Telefon",
		"id"=>"phone",
		"type"=>"text"
		],
		[
		"name"=>"Grup seçin",
		"id"=>"group_id",
		"type"=>"select",
		"disabled"=>"",
		"class"=>"groupsinmodal"
		],
		[
		"name"=>"Adres",
		"id"=>"address",
		"type"=>"text"
		],
		[
		"name"=>"Ülke seçin",
		"id"=>"country_id",
		"type"=>"select",
		"disabled"=>"",
		"class"=>"countriesinmodal"
		],
		[
		"name"=>"Şehir seçin",
		"id"=>"city_id",
		"type"=>"select",
		"disabled"=>"",
		"class"=>"citiesinmodal",
		],
		[
		"name"=>"İlçe seçin",
		"id"=>"county_id",
		"type"=>"select",
		"disabled"=>"",
		"class"=>"districtsinmodal",
		],
		[
		"name"=>"Posta Kodu",
		"id"=>"postcode",
		"type"=>"text"
		],
		[
		"name"=>"ID",
		"id"=>"id",
		"type"=>"hidden"
		]
		];
		$this->load->model("general_model");
		$this->load->model("admin_model");
		$userId = $this->input->post("userId");
		$user = $this->admin_model->getUserById($userId);
		$countries = $this->general_model->getCountries();
		$cities = $this->general_model->getCitiesByCountryId($user[0]->country_id);
		$counties = $this->general_model->getDistrictsByCityId($user[0]->city_id);
		$userGroups = $this->general_model->getUserGroups();
		$companies = $this->general_model->getCompanies();
		$holdings = $this->general_model->getHoldings();
		$i=0;
		echo '<div class="row">';
		foreach ($formFields as $key => $field) {
			$i++;
			$message = "Bu alan zorunludur";
			if($field["type"] == "email"){
				$message = "Lütfen geçerli bir mail adresi giriniz.";
			}
			if($i%2==1 && $i!=1){
				echo '</div><div class="row">';
			}
			if($field["type"]!="select"){
				$class = "";
				if($field["type"] == "hidden"){
					$class ="unvisible";
				}
				echo '<div class="col-sm-6">
				<div class="form-group form-group-default required '.$class.' ">
					<label>'.$field["name"].':</label>
					<div class="controls">
						<input type="'.$field["type"].'" class="form-control" name="'.$field["id"].'" id="'.$field["id"].'" required data-msg="'.$message.'" value="'.@$user[0]->{$field["id"]}.'">
					</div>
				</div>
			</div>';
			}else{
				if($field["id"] == "country_id"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($countries as $key => $country) {
							$selected = '';
							if($country->CountryID == $user[0]->country_id){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$country->CountryID.'>'.$country->CountryName.'</option>';
						}
						echo '</select>
					</div></div>';
				}else
				if($field["id"] == "city_id"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($cities as $key => $city) {
							$selected = '';
							if($city->CityID == $user[0]->city_id){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$city->CityID.'>'.$city->CityName.'</option>';
						}
						echo '</select>
					</div></div>';
				}else
				if($field["id"] == "county_id"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($counties as $key => $county) {
							$selected = '';
							if($county->CountyID == $user[0]->county_id){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$county->CountyID.'>'.$county->CountyName.'</option>';
						}
						echo '</select>
					</div></div>';
				}else
				if($field["id"] == "group_id"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($userGroups as $key => $userGroup) {
							$selected = '';
							if($userGroup->id == $user[0]->group_id){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$userGroup->id.'>'.$userGroup->description.'</option>';
						}
						echo '</select>
					</div></div>';
				}else
				if($field["id"] == "CompanyID"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($companies as $key => $company) {
							$selected = '';
							if($company->CompanyID == $user[0]->CompanyID){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$company->CompanyID.'>'.$company->CompanyName.'</option>';
						}
						echo '</select>
					</div></div>';
				}else
				if($field["id"] == "HoldingID"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].'" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($holdings as $key => $holding) {
							$selected = '';
							if($holding->HoldingID == $user[0]->HoldingID){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$holding->HoldingID.'>'.$holding->HoldingName.'</option>';
						}
						echo '</select>
					</div></div>';
				}else
				{
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" '.$field["disabled"].' data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>
					</select>
				</div></div>';
				}
			}
		}
	}

	public function addNewUser(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$addUser = $this->admin_model->addNewUser($data);
		echo json_encode($addUser);
	}

	public function updateUser(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$updateUser = $this->admin_model->updateUser($data);
		echo json_encode($updateUser);
	}

	public function addNewCountry(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$addNewCountry = $this->admin_model->addNewCountry($data);
		echo json_encode($addNewCountry);
	}

	public function updateCountry(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$updateCountry = $this->admin_model->updateCountry($data);
		echo json_encode($updateCountry);
	}

	public function deleteCountry(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$CountryID = $this->input->post("CountryID");
		$deleteCountry = $this->admin_model->deleteCountry($CountryID);
		echo json_encode($deleteCountry);
	}

	public function addNewCity(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$addNewCity = $this->admin_model->addNewCity($data);
		echo json_encode($addNewCity);
	}

	public function updateCity(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$updateCity = $this->admin_model->updateCity($data);
		echo json_encode($updateCity);
	}

	public function deleteCity(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$CityID = $this->input->post("CityID");
		$deleteCity = $this->admin_model->deleteCity($CityID);
		echo json_encode($deleteCity);
	}

	public function addNewCounty(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$addNewCounty = $this->admin_model->addNewCounty($data);
		echo json_encode($addNewCounty);
	}
	public function updateCounty(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$updateCounty = $this->admin_model->updateCounty($data);
		echo json_encode($updateCounty);
	}
	public function deleteCounty(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$CountyID = $this->input->post("CountyID");
		$deleteCounty = $this->admin_model->deleteCounty($CountyID);
		echo json_encode($deleteCounty);
	}
	public function addNewArea(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$addNewArea = $this->admin_model->addNewArea($data);
		echo json_encode($addNewArea);
	}
	public function updateArea(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$updateArea = $this->admin_model->updateArea($data);
		echo json_encode($updateArea);
	}
	public function deleteArea(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$AreaID = $this->input->post("AreaID");
		$deleteArea = $this->admin_model->deleteArea($AreaID);
		echo json_encode($deleteArea);
	}
	public function addNewAlcoholGroup(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$addNewAlcoholGroup = $this->admin_model->addNewAlcoholGroup($data);
		echo json_encode($addNewAlcoholGroup);
	}
	public function updateAlcoholGroup(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$updateAlcoholGroup = $this->admin_model->updateAlcoholGroup($data);
		echo json_encode($updateAlcoholGroup);
	}
	public function deleteAlcoholGroup(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$AlcoholGroupID = $this->input->post("AlcoholGroupID");
		$deleteAlcoholGroup = $this->admin_model->deleteAlcoholGroupById($AlcoholGroupID);
		echo json_encode($deleteAlcoholGroup);
	}
	public function addNewAlcoholType(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$addNewAlcoholType = $this->admin_model->addNewAlcoholType($data);
		echo json_encode($addNewAlcoholType);
	}
	public function updateAlcoholType(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$updateAlcoholType = $this->admin_model->updateAlcoholType($data);
		echo json_encode($updateAlcoholType);
	}
	public function deleteAlcoholType(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$AlcoholTypeID = $this->input->post("AlcoholTypeID");
		$deleteAlcoholType = $this->admin_model->deleteAlcoholTypeById($AlcoholTypeID);
		echo json_encode($deleteAlcoholType);
	}
	public function addNewAlcoholBrand(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$addNewAlcoholBrand = $this->admin_model->addNewAlcoholBrand($data);
		echo json_encode($addNewAlcoholBrand);
	}
	public function updateAlcoholBrand(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$updateAlcoholBrand = $this->admin_model->updateAlcoholBrand($data);
		echo json_encode($updateAlcoholBrand);
	}
	public function deleteAlcoholBrand(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$AlcoholBrandID = $this->input->post("AlcoholBrandID");
		$deleteAlcoholBrand = $this->admin_model->deleteAlcoholBrandById($AlcoholBrandID);
		echo json_encode($deleteAlcoholBrand);
	}
	public function addNewCollector(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$addNewCollector = $this->admin_model->addNewCollector($data);
		echo json_encode($addNewCollector);
	}
	public function updateCollector(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$updateCollector = $this->admin_model->updateCollector($data);
		echo json_encode($updateCollector);
	}
	public function deleteCollector(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$collectorId = $this->input->post("CollectorID");
		$deleteCollector = $this->admin_model->deleteCollector($collectorId);
		echo json_encode($deleteCollector);
	}
	public function addNewCompany(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$addNewCompany = $this->admin_model->addNewCompany($data);
		echo json_encode($addNewCompany);
	}
	public function updateCompany(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$updateCompany = $this->admin_model->updateCompany($data);
		echo json_encode($updateCompany);
	}
	public function deleteCompany(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$CompanyID = $this->input->post("CompanyID");
		$deleteCompany = $this->admin_model->deleteCompanyById($CompanyID);
		echo json_encode($deleteCompany);
	}
	public function addNewBarGroup(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$addNewBarGroup = $this->admin_model->addNewBarGroup($data);
		echo json_encode($addNewBarGroup);
	}
	public function deleteBarGroup(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$barGroupID = $this->input->post("BarGroupID");
		$deleteBarGroup = $this->admin_model->deleteBarGroupById($barGroupID);
		echo json_encode($deleteBarGroup);
	}
	public function updateBarGroup(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$updateBarGroup = $this->admin_model->updateBarGroup($data);
		echo json_encode($updateBarGroup);
	}
	public function addNewTechnicalService(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$addNewTechnicalService = $this->admin_model->addNewTechnicalService($data);
		echo json_encode($addNewTechnicalService);
	}
	public function updateTechnicalService(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$updateTechnicalService = $this->admin_model->updateTechnicalService($data);
		echo json_encode($updateTechnicalService);
	}
	public function deleteTechnicalService(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$technicalServiceID = $this->input->post("TechnicalServiceID");
		$deleteTechnicalService = $this->admin_model->deleteTechnicalServiceById($technicalServiceID);
		echo json_encode($deleteTechnicalService);
	}
	public function addNewCompanyDailyGuest(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$addNewCompanyDailyGuest = $this->admin_model->addNewCompanyDailyGuest($data);
		echo json_encode($addNewCompanyDailyGuest);
	}
	public function updateCompanyDailyGuest(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$updateCompanyDailyGuest = $this->admin_model->updateCompanyDailyGuest($data);
		echo json_encode($updateCompanyDailyGuest);
	}
	public function updateCompanyBarGroup(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$updateCompanyBarGroup = $this->admin_model->updateCompanyBarGroup($data);
		echo json_encode($updateCompanyBarGroup);
	}
	public function updateTechnicalServiceUser(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$updateTechnicalServiceUser = $this->admin_model->updateTechnicalServiceUser($data);
		echo json_encode($updateTechnicalServiceUser);
	}
	public function addNewTap(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$addNewTap = $this->admin_model->addNewTap($data);
		echo json_encode($addNewTap);
	}
	public function updateTap(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$updateTap = $this->admin_model->updateTap($data);
		echo json_encode($updateTap);
	}
	public function changePassword(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$changePassword = $this->admin_model->changePassword($data);
		echo json_encode($changePassword);
	}
	public function tapWizard(){
		header("Content-type:application/json");
		$this->load->model("admin_model");
		$data = $this->input->post();
		$tapWizard = $this->admin_model->tapWizard($data);
		echo json_encode($tapWizard);
	}
}
