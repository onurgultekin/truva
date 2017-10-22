<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata("token")){
			redirect(base_url());
		}
	}
	public function getCitiesByCountryId(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$countryId = $this->input->post("countryId");
		$cities = $this->general_model->getCitiesByCountryId($countryId);
		echo json_encode($cities);
	}
	public function getDistrictsByCityId(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$countryId = $this->input->post("cityId");
		$districts = $this->general_model->getDistrictsByCityId($countryId);
		echo json_encode($districts);
	}
	public function getAreasByDistrictId(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$districtId = $this->input->post("districtId");
		$areas = $this->general_model->getAreasByDistrictId($districtId);
		echo json_encode($areas);
	}
	public function getCompanyByHoldingId(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$holdingId = $this->input->post("holdingId");
		$companies = $this->general_model->getCompanyByHoldingId($holdingId);
		echo json_encode($companies);
	}
	public function getBarsByCompanyId(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$companyId = $this->input->post("companyId");
		$bars = $this->general_model->getBarsByCompanyId($companyId);
		echo json_encode($bars);
	}
	
	public function getHoldingById()
	{
		$formFields= [
	          [
	            "name"=>"Holding Adı",
	            "id"=>"HoldingName",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Holding Adresi",
	            "id"=>"HoldingAdress",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Fatura Adresi",
	            "id"=>"InvoiceAddress",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Vergi numarası",
	            "id"=>"TaxNo",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Vergi dairesi",
	            "id"=>"TaxAdministrationName",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Fatura Telefon",
	            "id"=>"InvoiceTelephone",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Fatura Mobil Telefon",
	            "id"=>"InvoiceMobile",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Fatura E-mail",
	            "id"=>"InvoiceEmail",
	            "type"=>"email"
	          ],
	          [
	            "name"=>"Holding Telefon",
	            "id"=>"HoldingTelephone",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Holding Mobil Telefon",
	            "id"=>"HoldingMobile",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Holding Fax",
	            "id"=>"HoldingFax",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Holding e-mail",
	            "id"=>"HoldingEmail",
	            "type"=>"email"
	          ],
	          [
	            "name"=>"Holding Tabela Adı",
	            "id"=>"HoldingSign",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Ülke seçin",
	            "id"=>"CountryID",
	            "type"=>"select",
	            "disabled"=>"",
	            "class"=>"countriesinmodal"
	          ],
	          [
	            "name"=>"Şehir seçin",
	            "id"=>"CityID",
	            "type"=>"select",
	            "disabled"=>"",
	            "class"=>"citiesinmodal",
	          ],
	          [
	            "name"=>"İlçe seçin",
	            "id"=>"CountyID",
	            "type"=>"select",
	            "disabled"=>"",
	            "class"=>"districtsinmodal",
	          ],
	          [
	            "name"=>"Semt seçin",
	            "id"=>"AreaID",
	            "type"=>"select",
	            "disabled"=>"",
	            "class"=>"areasinmodal",
	          ],
	          [
	            "name"=>"Holding ID",
	            "id"=>"HoldingID",
	            "type"=>"hidden"
	          ]
	          ];
		$this->load->model("general_model");
		$holdingId = $this->input->post("holdingId");
		$holding = $this->general_model->getHoldingById($holdingId);
		$countries = $this->general_model->getCountries();
		$cities = $this->general_model->getCitiesByCountryId($holding[0]->CountryID);
		$counties = $this->general_model->getDistrictsByCityId($holding[0]->CityID);
		$areas = $this->general_model->getAreasByDistrictId($holding[0]->CountyID);
		$companies = $this->general_model->getCompanyByHoldingId($holding[0]->HoldingID);
		$i=0;
		echo '<div class="row">';
		foreach ($formFields as $key => $field) {
			$i++;
			$message = "Bu alan zorunludur";
			if($field["type"] == "email"){
				$message = "Lütfen geçerli bir mail adresi giriniz.";
			}
			$class = "";
			if($field["type"] == "hidden"){
				$class ="unvisible";
			}
			if($i%2==1 && $i!=1){
				echo '</div><div class="row">';
			}
			if($field["type"]!="select"){
				echo '<div class="col-sm-6">
				<div class="form-group form-group-default required '.$class.' ">
					<label>'.$field["name"].':</label>
					<div class="controls">
						<input type="'.$field["type"].'" class="form-control" name="'.$field["id"].'" id="'.$field["id"].'" required data-msg="'.$message.'" value="'.$holding[0]->{$field["id"]}.'">
					</div>
				</div>
			</div>';
			}else{
				if($field["id"] == "CountryID"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($countries as $key => $country) {
							$selected = '';
							if($country->CountryID == $holding[0]->CountryID){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$country->CountryID.'>'.$country->CountryName.'</option>';
						}
						echo '</select>
					</div></div>';
				}else
				if($field["id"] == "CityID"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($cities as $key => $city) {
							$selected = '';
							if($city->CityID == $holding[0]->CityID){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$city->CityID.'>'.$city->CityName.'</option>';
						}
						echo '</select>
					</div></div>';
				}else
				if($field["id"] == "CountyID"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($counties as $key => $county) {
							$selected = '';
							if($county->CountyID == $holding[0]->CountyID){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$county->CountyID.'>'.$county->CountyName.'</option>';
						}
						echo '</select>
					</div></div>';
				}else
				if($field["id"] == "AreaID"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($areas as $key => $area) {
							$selected = '';
							if($area->AreaID == $holding[0]->AreaID){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$area->AreaID.'>'.$area->AreaName.'</option>';
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

	public function getHoldingByCountryId(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$countryId = $this->input->post("countryId");
		$holdings = $this->general_model->getHoldingByCountryId($countryId);
		echo json_encode($holdings);
	}

	public function getHoldingByCityId()
	{
		header("Content-type:application/json");
		$this->load->model("general_model");
		$cityId = $this->input->post("cityId");
		$holdings = $this->general_model->getHoldingByCityId($cityId);
		echo json_encode($holdings);
	}

	public function getHoldingByCountyId(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$countyId = $this->input->post("countyId");
		$holdings = $this->general_model->getHoldingByCountyId($countyId);
		echo json_encode($holdings);
	}

	public function getHoldingByAreaId(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$areaId = $this->input->post("areaId");
		$holdings = $this->general_model->getHoldingByAreaId($areaId);
		echo json_encode($holdings);
	}

	public function getHoldings(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$holdings = $this->general_model->getHoldings();
		echo json_encode($holdings);
	}

	public function getCompanyById()
	{
		$formFields= [
	          [
	            "name"=>"Şirket Adı",
	            "id"=>"CompanyName",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Şirket Adresi",
	            "id"=>"CompanyAdress",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Fatura Adresi",
	            "id"=>"InvoiceAddress",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Vergi numarası",
	            "id"=>"TaxNo",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Vergi dairesi",
	            "id"=>"TaxAdministrationName",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Fatura Telefon",
	            "id"=>"InvoiceTelephone",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Fatura Mobil Telefon",
	            "id"=>"InvoiceMobile",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Fatura E-mail",
	            "id"=>"InvoiceEmail",
	            "type"=>"email"
	          ],
	          [
	            "name"=>"Şirket Telefon",
	            "id"=>"CompanyTelephone",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Şirket Mobil Telefon",
	            "id"=>"CompanyMobile",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Şirket Fax",
	            "id"=>"CompanyFax",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Şirket e-mail",
	            "id"=>"CompanyEmail",
	            "type"=>"email"
	          ],
	          [
	            "name"=>"Şirket Tabela Adı",
	            "id"=>"CompanySign",
	            "type"=>"text"
	          ],
	          [
	            "name"=>"Ülke seçin",
	            "id"=>"CountryID",
	            "type"=>"select",
	            "disabled"=>"",
	            "class"=>"countriesinmodal"
	          ],
	          [
	            "name"=>"Şehir seçin",
	            "id"=>"CityID",
	            "type"=>"select",
	            "disabled"=>"",
	            "class"=>"citiesinmodal"
	          ],
	          [
	            "name"=>"İlçe seçin",
	            "id"=>"CountyID",
	            "type"=>"select",
	            "disabled"=>"",
	            "class"=>"districtsinmodal"
	          ],
	          [
	            "name"=>"Semt seçin",
	            "id"=>"AreaID",
	            "type"=>"select",
	            "disabled"=>"",
	            "class"=>"areasinmodal"
	          ],
	          [
	            "name"=>"Holding",
	            "id"=>"HoldingID",
	            "type"=>"select",
	            "disabled"=>"",
	            "class"=>"holdingsinmodal"
	          ],
	          [
	            "name"=>"Şirket Tipi",
	            "id"=>"CompanyTypeID",
	            "type"=>"select",
	            "disabled"=>"",
	            "class"=>"companytypeinmodal"
	          ],
	          [
	            "name"=>"id",
	            "id"=>"CompanyID",
	            "type"=>"hidden"
	          ]
	          ];
	          	$this->load->model("general_model");
		$companyId = $this->input->post("companyId");
		$company = $this->general_model->getCompanyById($companyId);
		$countries = $this->general_model->getCountries();
		$cities = $this->general_model->getCitiesByCountryId($company[0]->CountryID);
		$counties = $this->general_model->getDistrictsByCityId($company[0]->CityID);
		$areas = $this->general_model->getAreasByDistrictId($company[0]->CountyID);
		$holdings = $this->general_model->getHoldings();
		$companyTypes = $this->general_model->getCompanyTypes();
		$i=0;
		echo '<div class="row">';
		foreach ($formFields as $key => $field) {
			$i++;
			$message = "Bu alan zorunludur";
			if($field["type"] == "email"){
				$message = "Lütfen geçerli bir mail adresi giriniz.";
			}
			$class = "";
			if($field["type"] == "hidden"){
				$class ="unvisible";
			}
			if($i%2==1 && $i!=1){
				echo '</div><div class="row">';
			}
			if($field["type"]!="select"){
				echo '<div class="col-sm-6">
				<div class="form-group form-group-default required '.$class.' ">
					<label>'.$field["name"].':</label>
					<div class="controls">
						<input type="'.$field["type"].'" class="form-control" name="'.$field["id"].'" id="'.$field["id"].'" required data-msg="'.$message.'" value="'.@$company[0]->{$field["id"]}.'">
					</div>
				</div>
			</div>';
			}else{
				if($field["id"] == "CountryID"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($countries as $key => $country) {
							$selected = '';
							if($country->CountryID == $company[0]->CountryID){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$country->CountryID.'>'.$country->CountryName.'</option>';
						}
						echo '</select>
					</div></div>';
				}else
				if($field["id"] == "CityID"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($cities as $key => $city) {
							$selected = '';
							if($city->CityID == $company[0]->CityID){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$city->CityID.'>'.$city->CityName.'</option>';
						}
						echo '</select>
					</div></div>';
				}else
				if($field["id"] == "CountyID"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($counties as $key => $county) {
							$selected = '';
							if($county->CountyID == $company[0]->CountyID){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$county->CountyID.'>'.$county->CountyName.'</option>';
						}
						echo '</select>
					</div></div>';
				}else
				if($field["id"] == "AreaID"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($areas as $key => $area) {
							$selected = '';
							if($area->AreaID == $company[0]->AreaID){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$area->AreaID.'>'.$area->AreaName.'</option>';
						}
						echo '</select>
					</div></div>';
				}else
				if($field["id"] == "HoldingID"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($holdings as $key => $holding) {
							$selected = '';
							if($holding->HoldingID == $company[0]->HoldingID){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$holding->HoldingID.'>'.$holding->HoldingName.'</option>';
						}
						echo '</select>
					</div></div>';
				}else
				if($field["id"] == "CompanyTypeID"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($companyTypes as $key => $companyType) {
							$selected = '';
							if($companyType->Name == $company[0]->CompanyType){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$companyType->CompanyTypeID.'>'.$companyType->Name.'</option>';
						}
						echo '</select>
					</div></div>';
				}else{
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

	public function getCompanyByCountryId()
	{
		header("Content-type:application/json");
		$this->load->model("general_model");
		$countryId = $this->input->post("countryId");
		$holding = $this->general_model->getCompanyByCountryId($countryId);
		echo json_encode($holding);
	}

	public function getCompanyByCityId()
	{
		header("Content-type:application/json");
		$this->load->model("general_model");
		$cityId = $this->input->post("cityId");
		$holding = $this->general_model->getCompanyByCityId($cityId);
		echo json_encode($holding);
	}

	public function getCompanyByCountyId()
	{
		header("Content-type:application/json");
		$this->load->model("general_model");
		$countyId = $this->input->post("countyId");
		$holding = $this->general_model->getCompanyByCountyId($countyId);
		echo json_encode($holding);
	}

	public function getCompanyByAreaId()
	{
		header("Content-type:application/json");
		$this->load->model("general_model");
		$areaId = $this->input->post("areaId");
		$holding = $this->general_model->getCompanyByAreaId($areaId);
		echo json_encode($holding);
	}

	public function getCompanies(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$companies = $this->general_model->getCompanies();
		echo json_encode($companies);
	}

	public function getCountryById(){
		$formFields= [
		[
		"name"=>"Country Id",
		"id"=>"CountryID",
		"type"=>"hidden"
		],
		[
		"name"=>"Binary Code",
		"id"=>"BinaryCode",
		"type"=>"text"
		],
		[
		"name"=>"Triple Code",
		"id"=>"TripleCode",
		"type"=>"text"
		],
		[
		"name"=>"Ülke Adı",
		"id"=>"CountryName",
		"type"=>"text"
		],
		[
		"name"=>"Telefon Kodu",
		"id"=>"PhoneCode",
		"type"=>"text"
		]
		];
		$this->load->model("general_model");
		$countryId = $this->input->post("countryId");
		$country = $this->general_model->getCountryById($countryId);
		foreach ($formFields as $key => $field) {
			$message = "Bu alan zorunludur";
			if($field["type"] == "email"){
				$message = "Lütfen geçerli bir mail adresi giriniz.";
			}
			if($field["type"]!="select"){
				$class = "";
				if($field["type"] == "hidden"){
					$class ="unvisible";
				}
				echo '<div class="row"><div class="col-sm-12">
				<div class="form-group form-group-default '.$class.' required">
					<label>'.$field["name"].':</label>
					<div class="controls">
						<input type="'.$field["type"].'" class="form-control" name="'.$field["id"].'" id="'.$field["id"].'" required data-msg="'.$message.'" value="'.$country[0]->{$field["id"]}.'">
					</div>
				</div>
			</div></div>';
			}
		}
	}

	public function getCityById(){
		$formFields= [
			[
		            "name"=>"Id",
		            "id"=>"CityID",
		            "type"=>"hidden"
		          	],
		          	[
		            "name"=>"Şehir Adı",
		            "id"=>"CityName",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Plaka",
		            "id"=>"PlateNo",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Telefon Kodu",
		            "id"=>"PhoneCode",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Ülke seçin",
		            "id"=>"CountryID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>""
		          	]
	          	];
		$this->load->model("general_model");
		$cityId = $this->input->post("cityId");
		$city = $this->general_model->getCityById($cityId);
		$countries = $this->general_model->getCountries();
		foreach ($formFields as $key => $field) {
			$message = "Bu alan zorunludur";
			if($field["type"] == "email"){
				$message = "Lütfen geçerli bir mail adresi giriniz.";
			}
			if($field["type"]!="select"){
				$class = "";
				if($field["type"] == "hidden"){
					$class ="unvisible";
				}
				echo '<div class="row"><div class="col-sm-12">
				<div class="form-group form-group-default '.$class.' required">
					<label>'.$field["name"].':</label>
					<div class="controls">
						<input type="'.$field["type"].'" class="form-control" name="'.$field["id"].'" id="'.$field["id"].'" required data-msg="'.$message.'" value="'.$city[0]->{$field["id"]}.'">
					</div>
				</div>
			</div></div>';
			}else{
				echo '<div class="form-group form-group-default form-group-default-select2 required">
		                        <label class="">'.$field["name"].'</label>
		                          <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Şehir seçin" data-init-plugin="select2">
		                          <option value="0">Lütfen seçin</option>';
		                            foreach ($countries as $key => $country) {
		                            	$selected = '';
					if($country->CountryID == $city[0]->CountryID){
						$selected = 'selected = "selected"';
					}
		                              echo '<option '.$selected.' value='.$country->CountryID.'>'.$country->CountryName.'</option>';
		                            }
		                          echo '</select>
		                        </div>';
			}
		}
	}

	public function getCountyById(){
		$formFields= [
			[
		            "name"=>"Id",
		            "id"=>"CountyID",
		            "type"=>"hidden"
		          	],
		          	[
		            "name"=>"İlçe Adı",
		            "id"=>"CountyName",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Şehir seçin",
		            "id"=>"CityID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>""
		          	]
	          	];
		$this->load->model("general_model");
		$countyId = $this->input->post("countyId");
		$county = $this->general_model->getDistrictsById($countyId);
		$cities = $this->general_model->getCities();
		foreach ($formFields as $key => $field) {
			$message = "Bu alan zorunludur";
			if($field["type"] == "email"){
				$message = "Lütfen geçerli bir mail adresi giriniz.";
			}
			if($field["type"]!="select"){
				$class = "";
				if($field["type"] == "hidden"){
					$class ="unvisible";
				}
				echo '<div class="row"><div class="col-sm-12">
				<div class="form-group form-group-default '.$class.' required">
					<label>'.$field["name"].':</label>
					<div class="controls">
						<input type="'.$field["type"].'" class="form-control" name="'.$field["id"].'" id="'.$field["id"].'" required data-msg="'.$message.'" value="'.$county[0]->{$field["id"]}.'">
					</div>
				</div>
			</div></div>';
			}else{
				echo '<div class="form-group form-group-default form-group-default-select2 required">
		                        <label class="">'.$field["name"].'</label>
		                          <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Şehir seçin" data-init-plugin="select2">
		                          <option value="0">Lütfen seçin</option>';
		                            foreach ($cities as $key => $city) {
		                            	$selected = '';
					if($city->CityID == $county[0]->CityID){
						$selected = 'selected = "selected"';
					}
		                              echo '<option '.$selected.' value='.$city->CityID.'>'.$city->CityName.'</option>';
		                            }
		                          echo '</select>
		                        </div>';
			}
		}
	}

	public function getAreaById(){
		$formFields= [
			[
		            "name"=>"Id",
		            "id"=>"AreaID",
		            "type"=>"hidden"
		          	],
		          	[
		            "name"=>"Semt Adı",
		            "id"=>"AreaName",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"İlçe seçin",
		            "id"=>"CountyID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>""
		          	]
	          	];
		$this->load->model("general_model");
		$areaId = $this->input->post("areaId");
		$counties = $this->general_model->getDistricts();
		$area = $this->general_model->getAreaById($areaId);
		foreach ($formFields as $key => $field) {
			$message = "Bu alan zorunludur";
			if($field["type"] == "email"){
				$message = "Lütfen geçerli bir mail adresi giriniz.";
			}
			if($field["type"]!="select"){
				$class = "";
				if($field["type"] == "hidden"){
					$class ="unvisible";
				}
				echo '<div class="row"><div class="col-sm-12">
				<div class="form-group form-group-default '.$class.' required">
					<label>'.$field["name"].':</label>
					<div class="controls">
						<input type="'.$field["type"].'" class="form-control" name="'.$field["id"].'" id="'.$field["id"].'" required data-msg="'.$message.'" value="'.$area[0]->{$field["id"]}.'">
					</div>
				</div>
			</div></div>';
			}else{
				echo '<div class="form-group form-group-default form-group-default-select2 required">
		                        <label class="">'.$field["name"].'</label>
		                          <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Şehir seçin" data-init-plugin="select2">
		                          <option value="0">Lütfen seçin</option>';
		                            foreach ($counties as $key => $county) {
		                            	$selected = '';
					if($county->CountyID == $area[0]->CountyID){
						$selected = 'selected = "selected"';
					}
		                              echo '<option '.$selected.' value='.$county->CountyID.'>'.$county->CountyName.'</option>';
		                            }
		                          echo '</select>
		                        </div>';
			}
		}
	}

	public function getAlcoholGroups(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$alcoholGroups = $this->general_model->getAlcoholGrouplist();
		echo json_encode($alcoholGroups);
	}
	public function getAlcoholGroupById(){
		$formFields= [
		[
		            "name"=>"Kod",
		            "id"=>"Code",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Adı",
		            "id"=>"Name",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Id",
		            "id"=>"AlcoholGroupID",
		            "type"=>"hidden"
		          	]
		];
		$this->load->model("general_model");
		$alcoholGroupId = $this->input->post("alcoholGroupId");
		$alcoholGroup = $this->general_model->getAlcoholGroupById($alcoholGroupId);
		foreach ($formFields as $key => $field) {
			$message = "Bu alan zorunludur";
			if($field["type"] == "email"){
				$message = "Lütfen geçerli bir mail adresi giriniz.";
			}
			if($field["type"]!="select"){
				$class = "";
				if($field["type"] == "hidden"){
					$class ="unvisible";
				}
				echo '<div class="row"><div class="col-sm-12">
				<div class="form-group form-group-default '.$class.' required">
					<label>'.$field["name"].':</label>
					<div class="controls">
						<input type="'.$field["type"].'" class="form-control" name="'.$field["id"].'" id="'.$field["id"].'" required data-msg="'.$message.'" value="'.$alcoholGroup[0]->{$field["id"]}.'">
					</div>
				</div>
			</div></div>';
			}
		}
	}
	public function getAlcoholTypeById(){
		$formFields= [
		[
		            "name"=>"Kod",
		            "id"=>"Code",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Adı",
		            "id"=>"Name",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Alkol Grubu seçin",
		            "id"=>"AlcoholGroupID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>""
		          	],
		          	[
		            "name"=>"Id",
		            "id"=>"AlcoholTypeID",
		            "type"=>"hidden"
		          	]
		];
		$this->load->model("general_model");
		$alcoholTypeId = $this->input->post("alcoholTypeId");
		$alcoholType = $this->general_model->getAlcoholTypeById($alcoholTypeId);
		$alcoholGroups = $this->general_model->getAlcoholGrouplist();
		foreach ($formFields as $key => $field) {
			$message = "Bu alan zorunludur";
			if($field["type"] == "email"){
				$message = "Lütfen geçerli bir mail adresi giriniz.";
			}
			if($field["type"]!="select"){
				$class = "";
				if($field["type"] == "hidden"){
					$class ="unvisible";
				}
				echo '<div class="row"><div class="col-sm-12">
				<div class="form-group form-group-default '.$class.' required">
					<label>'.$field["name"].':</label>
					<div class="controls">
						<input type="'.$field["type"].'" class="form-control" name="'.$field["id"].'" id="'.$field["id"].'" required data-msg="'.$message.'" value="'.$alcoholType[0]->{$field["id"]}.'">
					</div>
				</div>
			</div></div>';
			}else{
				echo '<div class="form-group form-group-default form-group-default-select2 required">
		                        <label class="">'.$field["name"].'</label>
		                          <select class="full-width '.$field["class"].' '.$field["disabled"].'" name="'.$field["id"].'" id="'.$field["id"].'" data-placeholder="Alkol grubu seçin" data-init-plugin="select2">
		                          <option value="0">Lütfen seçin</option>';
		                            foreach ($alcoholGroups as $key => $alcoholGroup) {
		                            	$selected = '';
					if($alcoholGroup->AlcoholGroupID == $alcoholType[0]->AlcoholGroupID){
						$selected = 'selected = "selected"';
					}
		                              echo '<option '.$selected.' value='.$alcoholGroup->AlcoholGroupID.'>'.$alcoholGroup->Name.'</option>';
		                            }
		                          echo '</select>
		                        </div>';
			}
		}
	}
	public function getAlcoholTypes(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$alcoholTypes = $this->general_model->getAlcoholTypelist();
		echo json_encode($alcoholTypes);
	}
	public function getAlcoholBrandById(){
		$formFields= [
		[
		            "name"=>"Kod",
		            "id"=>"Code",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Adı",
		            "id"=>"Name",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Alkol Tipi seçin",
		            "id"=>"AlcoholTypeID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>""
		          	],
		          	[
		            "name"=>"Id",
		            "id"=>"AlcoholBrandID",
		            "type"=>"hidden"
		          	]
		];
		$this->load->model("general_model");
		$alcoholBrandId = $this->input->post("alcoholBrandId");
		$alcoholBrand = $this->general_model->getAlcoholBrandById($alcoholBrandId);
		$alcoholTypes = $this->general_model->getAlcoholTypelist();
		foreach ($formFields as $key => $field) {
			$message = "Bu alan zorunludur";
			if($field["type"] == "email"){
				$message = "Lütfen geçerli bir mail adresi giriniz.";
			}
			if($field["type"]!="select"){
				$class = "";
				if($field["type"] == "hidden"){
					$class ="unvisible";
				}
				echo '<div class="row"><div class="col-sm-12">
				<div class="form-group form-group-default '.$class.' required">
					<label>'.$field["name"].':</label>
					<div class="controls">
						<input type="'.$field["type"].'" class="form-control" name="'.$field["id"].'" id="'.$field["id"].'" required data-msg="'.$message.'" value="'.$alcoholBrand[0]->{$field["id"]}.'">
					</div>
				</div>
			</div></div>';
			}else{
				echo '<div class="form-group form-group-default form-group-default-select2 required">
		                        <label class="">'.$field["name"].'</label>
		                          <select class="full-width '.$field["class"].' '.$field["disabled"].'" name="'.$field["id"].'" id="'.$field["id"].'" data-placeholder="Alkol grubu seçin" data-init-plugin="select2">
		                          <option value="0">Lütfen seçin</option>';
		                            foreach ($alcoholTypes as $key => $alcoholType) {
		                            	$selected = '';
					if($alcoholType->AlcoholTypeID == $alcoholBrand[0]->AlcoholTypeID){
						$selected = 'selected = "selected"';
					}
		                              echo '<option '.$selected.' value='.$alcoholType->AlcoholTypeID.'>'.$alcoholType->Name.'</option>';
		                            }
		                          echo '</select>
		                        </div>';
			}
		}
	}
	public function getAlcoholBrands(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$alcoholBrands = $this->general_model->getAlcoholBrandlist();
		echo json_encode($alcoholBrands);
	}
	public function getAlcoholBrandByAlcoholType(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$alcoholType = $this->input->post("alcoholType");
		$alcoholBrands = $this->general_model->getAlcoholBrandByAlcoholType($alcoholType);
		echo json_encode($alcoholBrands);
	}
	public function getCollectorList(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$collectors= $this->general_model->getCollectorList();
		echo json_encode($collectors);
	}
	public function getCollectorById(){
		$formFields= [
		[
	            "name"=>"Bildirim maili",
	            "id"=>"notification_email",
	            "type"=>"text"
	          	],
	          	[
	            "name"=>"Ethernet MAC Adresi",
	            "id"=>"eth_mac_address",
	            "type"=>"text"
	          	],
	          	[
	            "name"=>"Wifi MAC Adresi",
	            "id"=>"wifi_mac_address",
	            "type"=>"text"
	          	],
	          	[
	            "name"=>"Barcode",
	            "id"=>"Barcode",
	            "type"=>"text"
	          	],
	          	[
	            "name"=>"Latitude",
	            "id"=>"Latitude",
	            "type"=>"text"
	          	],
	          	[
	            "name"=>"Longitude",
	            "id"=>"Longitude",
	            "type"=>"text"
	          	],
	          	[
	            "name"=>"id",
	            "id"=>"collector_id",
	            "type"=>"hidden"
	          	]
		];
		$this->load->model("general_model");
		$collectorId = $this->input->post("CollectorId");
		$collector = $this->general_model->getCollectorById($collectorId);
		foreach ($formFields as $key => $field) {
			$message = "Bu alan zorunludur";
			if($field["type"] == "email"){
				$message = "Lütfen geçerli bir mail adresi giriniz.";
			}
			if($field["type"]!="select"){
				$class = "";
				if($field["type"] == "hidden"){
					$class ="unvisible";
				}
				echo '<div class="row"><div class="col-sm-12">
				<div class="form-group form-group-default '.$class.' required">
					<label>'.$field["name"].':</label>
					<div class="controls">
						<input type="'.$field["type"].'" class="form-control" name="'.$field["id"].'" id="'.$field["id"].'" required data-msg="'.$message.'" value="'.@$collector[0]->{$field["id"]}.'">
					</div>
				</div>
			</div></div>';
			}
		}
	}
	public function getBarGroupById(){
		$formFields= [
		[
	            "name"=>"Kod",
	            "id"=>"Code",
	            "type"=>"text"
	          	],
	          	[
	            "name"=>"Adı",
	            "id"=>"Name",
	            "type"=>"text"
	          	],
	          	[
	            "name"=>"Id",
	            "id"=>"BarGroupID",
	            "type"=>"hidden"
	          	]
		];
		$this->load->model("general_model");
		$BarGroupID = $this->input->post("BarGroupId");
		$barGroup = $this->general_model->getBarGroupById($BarGroupID);
		foreach ($formFields as $key => $field) {
			$message = "Bu alan zorunludur";
			if($field["type"] == "email"){
				$message = "Lütfen geçerli bir mail adresi giriniz.";
			}
			if($field["type"]!="select"){
				$class = "";
				if($field["type"] == "hidden"){
					$class ="unvisible";
				}
				echo '<div class="row"><div class="col-sm-12">
				<div class="form-group form-group-default '.$class.' required">
					<label>'.$field["name"].':</label>
					<div class="controls">
						<input type="'.$field["type"].'" class="form-control" name="'.$field["id"].'" id="'.$field["id"].'" required data-msg="'.$message.'" value="'.$barGroup[0]->{$field["id"]}.'">
					</div>
				</div>
			</div></div>';
			}else{
				echo '<div class="form-group form-group-default form-group-default-select2 required">
		                        <label class="">'.$field["name"].'</label>
		                          <select class="full-width '.$field["class"].' '.$field["disabled"].'" name="'.$field["id"].'" id="'.$field["id"].'" data-placeholder="Alkol grubu seçin" data-init-plugin="select2">
		                          <option value="0">Lütfen seçin</option>';
		                            foreach ($companies as $key => $company) {
		                            	$selected = '';
					if($company->CompanyID == $barGroup[0]->CompanyID){
						$selected = 'selected = "selected"';
					}
		                              echo '<option '.$selected.' value='.$company->CompanyID.'>'.$company->CompanyName.'</option>';
		                            }
		                          echo '</select>
		                        </div>';
			}
		}
	}
	public function getBarGroups(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$getBarGroups = $this->general_model->getBarGroups();
		echo json_encode($getBarGroups);
	}
	public function getCountries(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$countries = $this->general_model->getCountries();
		echo json_encode($countries);
	}
	public function getCities(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$cities = $this->general_model->getCities();
		echo json_encode($cities);
	}
	public function getCounties(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$counties = $this->general_model->getDistricts();
		echo json_encode($counties);
	}
	public function getAreas(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$areas = $this->general_model->getAreas();
		echo json_encode($areas);
	}
	public function getConsumptionByDate(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$dateBegin = $this->input->post("dateBegin");
		$dateEnd = $this->input->post("dateEnd");
		if(!$dateBegin){
			$dateBegin = date("Y-m-d", strtotime("-1 week"));
		}
		if(!$dateEnd){
			$dateEnd = date("Y-m-d");
		}
		$holdingId = @$this->input->post("holdingId");
		$companyId = @$this->input->post("companyId");
		$barGroupId = @$this->input->post("barGroupId");
		$tapId = @$this->input->post("tapId");
		$data["consumed"] = $this->general_model->getDailyConsumedAlcoholFilteredByDate($dateBegin,$dateEnd,$holdingId,$companyId,$barGroupId,$tapId);
		$data["average"] = $this->general_model->getDailyAverageConsumedAlcoholFilteredByDate($dateBegin,$dateEnd,$holdingId,$companyId,$barGroupId,$tapId);
		echo json_encode($data);
	}
	public function getDashboardDataForStatistics(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$countryId = $this->input->post("countryId");
		$cityId = $this->input->post("cityId");
		$countyId = @$this->input->post("countyId");
		$areaId = @$this->input->post("areaId");
		$data["companyCount"] = $this->general_model->getTotalCompanyCountByCountryId($countryId);
		$data["tapCount"] = $this->general_model->getTotalTapCountByCountryId($countryId);
		$data["activeTapCount"] = $this->general_model->getTotalActiveTapCountByCountryId($countryId);
		if(isset($cityId)){
			$data["companyCount"] = $this->general_model->getTotalCompanyCountByCityId($cityId);
			$data["tapCount"] = $this->general_model->getTotalTapCountByCityId($cityId);
			$data["activeTapCount"] = $this->general_model->getTotalActiveTapCountByCityId($cityId);
		}
		if(isset($countyId)){
			$data["companyCount"] = $this->general_model->getTotalCompanyCountByCountyId($countyId);
			$data["tapCount"] = $this->general_model->getTotalTapCountByCountyId($countyId);
			$data["activeTapCount"] = $this->general_model->getTotalActiveTapCountByCountyId($countyId);
		}
		if(isset($areaId)){
			$data["companyCount"] = $this->general_model->getTotalCompanyCountByAreaId($areaId);
			$data["tapCount"] = $this->general_model->getTotalTapCountByAreaId($areaId);
			$data["activeTapCount"] = $this->general_model->getTotalActiveTapCountByAreaId($areaId);
		}
		echo json_encode($data);
	}
	public function getTechnicalServiceById(){
		$formFields= [
		[
		"name"=>"Servis Adı",
		"id"=>"ServiceName",
		"type"=>"text"
		],
		[
		"name"=>"Adres",
		"id"=>"Adress",
		"type"=>"text"
		],
		[
		"name"=>"Fatura Adresi",
		"id"=>"InvoiceAddress",
		"type"=>"text"
		],
		[
		"name"=>"Vergi numarası",
		"id"=>"TaxNo",
		"type"=>"text"
		],
		[
		"name"=>"Vergi dairesi",
		"id"=>"TaxAdministrationName",
		"type"=>"text"
		],
		[
		"name"=>"Fatura Telefon",
		"id"=>"InvoiceTelephone",
		"type"=>"text"
		],
		[
		"name"=>"Fatura Mobil Telefon",
		"id"=>"InvoiceMobile",
		"type"=>"text"
		],
		[
		"name"=>"Fatura E-mail",
		"id"=>"InvoiceEmail",
		"type"=>"email"
		],
		[
		"name"=>"Ülke seçin",
		"id"=>"CountryID",
		"type"=>"select",
		"disabled"=>"",
		"class"=>"countriesinmodal"
		],
		[
		"name"=>"Şehir seçin",
		"id"=>"CityID",
		"type"=>"select",
		"disabled"=>"disabled",
		"class"=>"citiesinmodal",
		],
		[
		"name"=>"İlçe seçin",
		"id"=>"CountyID",
		"type"=>"select",
		"disabled"=>"disabled",
		"class"=>"districtsinmodal",
		],
		[
		"name"=>"Semt seçin",
		"id"=>"AreaID",
		"type"=>"select",
		"disabled"=>"disabled",
		"class"=>"areasinmodal",
		],
	          	[
	            "name"=>"Id",
	            "id"=>"TechnicalServiceListID",
	            "type"=>"hidden"
	          	]
		];
		$this->load->model("general_model");
		$TechnicalServiceId = $this->input->post("TechnicalServiceId");
		$technicalService = $this->general_model->getTechnicalServiceById($TechnicalServiceId);
		$countries = $this->general_model->getCountries();
		$cities = $this->general_model->getCitiesByCountryId($technicalService[0]->CountryID);
		$counties = $this->general_model->getDistrictsByCityId($technicalService[0]->CityID);
		$areas = $this->general_model->getAreasByDistrictId($technicalService[0]->CountyID);
		$i=0;
		echo '<div class="row">';
		foreach ($formFields as $key => $field) {
			$i++;
			$message = "Bu alan zorunludur";
			if($field["type"] == "email"){
				$message = "Lütfen geçerli bir mail adresi giriniz.";
			}
			$class = "";
			if($field["type"] == "hidden"){
				$class ="unvisible";
			}
			if($i%2==1 && $i!=1){
				echo '</div><div class="row">';
			}
			if($field["type"]!="select"){
				echo '<div class="col-sm-6">
				<div class="form-group form-group-default required '.$class.' ">
					<label>'.$field["name"].':</label>
					<div class="controls">
						<input type="'.$field["type"].'" class="form-control" name="'.$field["id"].'" id="'.$field["id"].'" required data-msg="'.$message.'" value="'.@$technicalService[0]->{$field["id"]}.'">
					</div>
				</div>
			</div>';
			}else{
				if($field["id"] == "CountryID"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($countries as $key => $country) {
							$selected = '';
							if($country->CountryID == $technicalService[0]->CountryID){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$country->CountryID.'>'.$country->CountryName.'</option>';
						}
						echo '</select>
					</div></div>';
				}else
				if($field["id"] == "CityID"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($cities as $key => $city) {
							$selected = '';
							if($city->CityID == $technicalService[0]->CityID){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$city->CityID.'>'.$city->CityName.'</option>';
						}
						echo '</select>
					</div></div>';
				}else
				if($field["id"] == "CountyID"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($counties as $key => $county) {
							$selected = '';
							if($county->CountyID == $technicalService[0]->CountyID){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$county->CountyID.'>'.$county->CountyName.'</option>';
						}
						echo '</select>
					</div></div>';
				}else
				if($field["id"] == "AreaID"){
					echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
					<label class="">'.$field["name"].'</label>
					<select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
						<option value="0">Lütfen seçin</option>';
						foreach ($areas as $key => $area) {
							$selected = '';
							if($area->AreaID == $technicalService[0]->AreaID){
								$selected = 'selected = "selected"';
							}
							echo '<option '.$selected.' value='.$area->AreaID.'>'.$area->AreaName.'</option>';
						}
						echo '</select>
					</div></div>';
				}else{
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
	public function getCompanyDailyGuestById(){
		$formFields= [
		[
	            "name"=>"Tarih",
	            "id"=>"Date",
	            "type"=>"text"
	          	],
	          	[
	            "name"=>"Toplam Kişi",
	            "id"=>"TotalGuest",
	            "type"=>"text"
	          	],
	          	[
	            "name"=>"Şirket seçin",
	            "id"=>"CompanyID",
	            "type"=>"select",
	            "disabled"=>"",
	            "class"=>""
	          	],
	          	[
	            "name"=>"Id",
	            "id"=>"TotalDailyGuestID",
	            "type"=>"hidden"
	          	]
		];
		$this->load->model("general_model");
		$TotalDailyGuestID = $this->input->post("CompanyDailyGuestId");
		$totalDailyGuest = $this->general_model->getTotalDailyGuestById($TotalDailyGuestID);
		$companies = $this->general_model->getCompanies();
		foreach ($formFields as $key => $field) {
			$message = "Bu alan zorunludur";
			if($field["type"] == "email"){
				$message = "Lütfen geçerli bir mail adresi giriniz.";
			}
			if($field["type"]!="select"){
				$class = "";
				if($field["type"] == "hidden"){
					$class ="unvisible";
				}
				echo '<div class="row"><div class="col-sm-12">
				<div class="form-group form-group-default '.$class.' required">
					<label>'.$field["name"].':</label>
					<div class="controls">
						<input type="'.$field["type"].'" class="form-control" name="'.$field["id"].'" id="'.$field["id"].'" required data-msg="'.$message.'" value="'.$totalDailyGuest[0]->{$field["id"]}.'">
					</div>
				</div>
			</div></div>';
			}else{
				echo '<div class="form-group form-group-default form-group-default-select2 required">
		                        <label class="">'.$field["name"].'</label>
		                          <select class="full-width '.$field["class"].' '.$field["disabled"].'" name="'.$field["id"].'" id="'.$field["id"].'" data-placeholder="Alkol grubu seçin" data-init-plugin="select2">
		                          <option value="0">Lütfen seçin</option>';
		                            foreach ($companies as $key => $company) {
		                            	$selected = '';
					if($company->CompanyID == $totalDailyGuest[0]->CompanyID){
						$selected = 'selected = "selected"';
					}
		                              echo '<option '.$selected.' value='.$company->CompanyID.'>'.$company->CompanyName.'</option>';
		                            }
		                          echo '</select>
		                        </div>';
			}
		}
	}
	public function getCompanyDailyGuest(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$dailyGuests = $this->general_model->getTotalDailyGuests();
		echo json_encode($dailyGuests);
	}
	public function getCompanyBarGroups(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$getCompanyBarGroups = $this->general_model->getCompanyBarGroups();
		echo json_encode($getCompanyBarGroups);
	}
	public function getCompanyBarGroupByCompanyId(){
		$this->load->model("general_model");
		$CompanyID = $this->input->post("CompanyID");
		$companyBarGroup = $this->general_model->getCompanyBarGroupByCompanyId($CompanyID);
		$barGroups = $this->general_model->getBarGroups();
		$companyBarGroups = explode(",",$companyBarGroup[0]->barGroups);
		echo '<div class="row">
		<input type="hidden" name="CompanyID" value="'.$companyBarGroup[0]->CompanyID.'" />
		<div class="col-md-12">
		<div class="<div class="form-group form-group-default form-group-default-select2 required">
		<select class="full-width" id="multiple" multiple data-init-plugin="select2" name="BarGroups">';
		foreach ($barGroups as $key => $barGroup) {
				$selected = '';
				foreach ($companyBarGroups as $key => $bar) {
					if($barGroup->BarGroupID == $bar){
						$selected = 'selected = "selected"';
					}	
				}
				echo '<option '.$selected.' value="'.$barGroup->BarGroupID.'">'.$barGroup->Name.'</option>';
			}	
		echo '</select>
		</div>
		</div>
		</div>';
	}
	public function getTechnicalServiceUsers(){
		$this->load->model("general_model");
		$technicalServiceId = $this->input->post("technicalServiceId");
		$technicalServiceUser = $this->general_model->getTechnicalServiceUsersById($technicalServiceId);
		$allTechnicalServiceUsers = $this->general_model->getTechnicalServiceUsers();
		$users = explode(",",$technicalServiceUser[0]->ids);
		echo '<div class="row">
		<input type="hidden" name="TechnicalServiceListID" value="'.$technicalServiceUser[0]->TechnicalServiceListID.'" />
		<div class="col-md-12">
		<div class="<div class="form-group form-group-default form-group-default-select2 required">
		<select class="full-width" id="multiple" multiple data-init-plugin="select2" name="technicalServiceUsers">';
		foreach ($allTechnicalServiceUsers as $key => $allTechnicalServiceUser) {
				$selected = '';
				foreach ($users as $key => $user) {
					if($allTechnicalServiceUser->id == $user){
						$selected = 'selected = "selected"';
					}	
				}
				echo '<option '.$selected.' value="'.$allTechnicalServiceUser->id.'">'.$allTechnicalServiceUser->yetkili_kisi.'</option>';
			}	
		echo '</select>
		</div>
		</div>
		</div>';
	}
	public function getQualifiedUsers(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$technicalServiceId = $this->input->post("technicalServiceId");
		$technicalServiceUser = $this->general_model->getTechnicalServiceUsersById($technicalServiceId);
		$allTechnicalServiceUsers = $this->general_model->getTechnicalServiceUsers();
		$usernames = explode(",",$technicalServiceUser[0]->usernames);
		$emails = explode(",",$technicalServiceUser[0]->emails);
		$phones = explode(",",$technicalServiceUser[0]->phones);
		$response["message"]["usernames"] = $usernames;
		$response["message"]["emails"] = $emails;
		$response["message"]["phones"] = $phones;
		echo json_encode($response);
	}
	public function getTaps(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$areas = $this->general_model->getTaps();
		echo json_encode($areas);
	}
	public function getTapById(){
		$formFields= [
		          	[
		            "name"=>"Adı",
		            "id"=>"Name",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"ID 1",
		            "id"=>"ID1",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"ID 2",
		            "id"=>"ID2",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"ID 3",
		            "id"=>"ID3",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Versiyon",
		            "id"=>"Version",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Musluk Durumu",
		            "id"=>"TapStatusID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>"tapstatusinmodal"
		            ],
		            [
		            "name"=>"Holding seçin",
		            "id"=>"HoldingID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>"holdings"
		            ],
		            [
		            "name"=>"Şirket seçin",
		            "id"=>"CompanyID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>"companies"
		            ],
		            [
		            "name"=>"Bar grubu seçin",
		            "id"=>"BarGroupID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>"bars"
		            ],
		            [
		            "name"=>"İçki grubu seçin",
		            "id"=>"AlcoholGroupID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>"alcoholgroupsinmodal"
		            ],
		            [
		            "name"=>"İçki tipi seçin",
		            "id"=>"AlcoholTypeID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>"alcoholtypesinmodal"
		            ],
		            [
		            "name"=>"İçki markası seçin",
		            "id"=>"AlcoholBrandID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>"alcoholbrandsinmodal"
		            ],
		            [
		            "name"=>"Toplayıcı seçin",
		            "id"=>"collector_id",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>"alcoholbrandsinmodal"
		            ],
		          	[
		            "name"=>"CL Başı Maliyet",
		            "id"=>"NetPrice",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Satış Fiyatı",
		            "id"=>"SalePrice",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Id",
		            "id"=>"TapID",
		            "type"=>"hidden"
		          	]
	          	];
		$this->load->model("general_model");
		$tapId = $this->input->post("TapId");
		$tap = $this->general_model->getTapById($tapId);
		$tapStatuses = $this->general_model->getTapStatuses();
		$holdings = $this->general_model->getHoldings();
		$companies = $this->general_model->getCompanies();
		$barGroups = $this->general_model->getBarGroups();
		$alcoholGroups = $this->general_model->getAlcoholGrouplist();
		$alcoholTypes = $this->general_model->getAlcoholTypelist();
		$alcoholBrands = $this->general_model->getAlcoholBrandlist();
		$collectors = $this->general_model->getCollectorList();
		$i=0;
	              echo '<div class="row">';
	              foreach ($formFields as $key => $field) {
	                $i++;
	                $message = "Bu alan zorunludur";
	                if($field["type"] == "email"){
	                  $message = "Lütfen geçerli bir mail adresi giriniz.";
	                }
	                $class = "";
	                if($field["type"] == "hidden"){
	                  $class ="unvisible";
	                }
	                if($i%2==1 && $i!=1){
	                  echo '</div><div class="row">';
	                }
	                if($field["type"]!="select"){
	                  echo '<div class="col-sm-6">
	                  <div class="form-group form-group-default required '.$class.' ">
	                    <label>'.$field["name"].':</label>
	                    <div class="controls">
	                      <input type="'.$field["type"].'" class="form-control" name="'.$field["id"].'" id="'.$field["id"].'" required data-msg="'.$message.'" value="'.$tap[0]->{$field["id"]}.'">
	                    </div>
	                  </div>
	                </div>';
	                }else{
	                  if($field["id"] == "AlcoholGroupID"){
	                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
	                    <label class="">'.$field["name"].'</label>
	                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
	                      <option value="0">Lütfen seçin</option>';
	                      	foreach ($alcoholGroups as $key => $alcoholGroup) {
	                      	$selected = '';
			if($alcoholGroup->AlcoholGroupID == $tap[0]->AlcoholGroupID){
				$selected = 'selected = "selected"';
			}
	                        echo '<option '.$selected.' value='.$alcoholGroup->AlcoholGroupID.'>'.$alcoholGroup->Name.'</option>';
	                      }
	                      echo '</select>
	                    </div></div>';
	                  }else
	                  if($field["id"] == "AlcoholBrandID"){
	                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
	                    <label class="">'.$field["name"].'</label>
	                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
	                      <option value="0">Lütfen seçin</option>';
	                      foreach ($alcoholBrands as $key => $alcoholBrand) {
	                      	$selected = '';
			if($alcoholBrand->AlcoholBrandID == $tap[0]->AlcoholBrandID){
				$selected = 'selected = "selected"';
			}
	                        echo '<option '.$selected.' value='.$alcoholBrand->AlcoholBrandID.'>'.$alcoholBrand->Name.'</option>';
	                      }
	                      echo '</select>
	                    </div></div>';
	                  }else
	                  if($field["id"] == "AlcoholTypeID"){
	                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
	                    <label class="">'.$field["name"].'</label>
	                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
	                      <option value="0">Lütfen seçin</option>';
	                      foreach ($alcoholTypes as $key => $alcoholType) {
	                      	$selected = '';
			if($alcoholType->AlcoholTypeID == $tap[0]->AlcoholTypeID){
				$selected = 'selected = "selected"';
			}
	                        echo '<option '.$selected.' value='.$alcoholType->AlcoholTypeID.'>'.$alcoholType->Name.'</option>';
	                      }
	                      echo '</select>
	                    </div></div>';
	                  }else
	                  if($field["id"] == "HoldingID"){
	                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2">
	                    <label class="">'.$field["name"].'</label>
	                    <select class="full-width '.$field["class"].' '.$field["disabled"].'" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Holding seçin" data-init-plugin="select2">
	                      <option value="0">Lütfen seçin</option>';
	                      foreach ($holdings->message as $key => $holding) {
	                      	$selected = '';
			if($holding->HoldingID == $tap[0]->HoldingID){
				$selected = 'selected = "selected"';
			}
	                        echo '<option '.$selected.' value='.$holding->HoldingID.'>'.$holding->HoldingName.'</option>';
	                      }
	                      echo '</select>
	                    </div></div>';
	                  }else
	                  if($field["id"] == "TapStatusID"){
	                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2">
	                    <label class="">'.$field["name"].'</label>
	                    <select class="full-width '.$field["class"].' '.$field["disabled"].'" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Holding seçin" data-init-plugin="select2">
	                      <option value="0">Lütfen seçin</option>';
	                      foreach ($tapStatuses as $key => $tapStatus) {
	                      	$selected = '';
			if($tapStatus->TapStatusID == $tap[0]->TapStatusID){
				$selected = 'selected = "selected"';
			}
	                        echo '<option '.$selected.' value='.$tapStatus->TapStatusID.'>'.$tapStatus->Name.'</option>';
	                      }
	                      echo '</select>
	                    </div></div>';
	                  }else
	                  if($field["id"] == "CompanyID"){
	                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2">
	                    <label class="">'.$field["name"].'</label>
	                    <select class="full-width '.$field["class"].' '.$field["disabled"].'" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Holding seçin" data-init-plugin="select2">
	                      <option value="0">Lütfen seçin</option>';
	                      foreach ($companies as $key => $company) {
	                      	$selected = '';
			if($company->CompanyID == $tap[0]->CompanyID){
				$selected = 'selected = "selected"';
			}
	                        echo '<option '.$selected.' value='.$company->CompanyID.'>'.$company->CompanyName.'</option>';
	                      }
	                      echo '</select>
	                    </div></div>';
	                  }else
	                  if($field["id"] == "BarGroupID"){
	                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2">
	                    <label class="">'.$field["name"].'</label>
	                    <select class="full-width '.$field["class"].' '.$field["disabled"].'" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Holding seçin" data-init-plugin="select2">
	                      <option value="0">Lütfen seçin</option>';
	                      foreach ($barGroups as $key => $barGroup) {
	                      	$selected = '';
			if($barGroup->BarGroupID == $tap[0]->BarGroupID){
				$selected = 'selected = "selected"';
			}
	                        echo '<option '.$selected.' value='.$barGroup->BarGroupID.'>'.$barGroup->Name.'</option>';
	                      }
	                      echo '</select>
	                    </div></div>';
	                  }else
	                  if($field["id"] == "collector_id"){
	                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
	                    <label class="">'.$field["name"].'</label>
	                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Şirket Tipi seçin" data-init-plugin="select2">
	                      <option value="0">Lütfen seçin</option>';
	                      foreach ($collectors as $key => $collector) {
	                      	$selected = '';
			if($collector->collector_id == $tap[0]->collector_id){
				$selected = 'selected = "selected"';
			}
	                        echo '<option '.$selected.' value='.$collector->collector_id.'>'.$collector->device_key.'</option>';
	                      }
	                      echo '</select>
	                    </div></div>';
	                  }else{
	                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
	                    <label class="">'.$field["name"].'</label>
	                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" '.$field["disabled"].' data-placeholder="Ülke seçin" data-init-plugin="select2">
	                      <option value="0">Lütfen seçin</option>
	                    </select>
	                  </div></div>';
	                  }
	                }
	              }
	              $buttons = @json_decode($tap[0]->Buttons);
	              echo '
	              <div class="clearfix"></div>
              <div class="row m-b-10">
                  <div class="col-md-4">
                  <div class="form-group form-group-default required m-t-10">
                    <label>Button CL Real</label>
                    <div class="controls">
                    <input type="text" class="form-control" id="buttonClReal" placeholder="0.00">
                    </div>
                  </div>
                  <div class="form-group form-group-default required m-t-10">
                    <label>Button CL Shown</label>
                    <div class="controls">
                    <input type="text" class="form-control" id="buttonClShown" placeholder="0.00">
                    </div>
                  </div>
                  <button type="button" class="btn btn-primary pull-right addButtonDataToTableForUpdate"><i class="fa fa-angle-double-right"></i></button>
                  </div>
                  <div class="col-md-8">
                    <table class="table table-striped updateButtonTable">
                        <thead>
                          <th style="text-transform: none !important; padding-top: 0px;">Button Adı</th>
                          <th style="text-transform: none !important; padding-top: 0px;">Button CL Real</th>
                          <th style="text-transform: none !important; padding-top: 0px;">Button CL Shown</th>
                          <th style="text-transform: none !important; padding-top: 0px;"></th>
                        </thead>
                        <tbody>';
                        if(count(@$buttons->buttons) > 0){
                        foreach (@$buttons->buttons as $key => $button) {
                        	echo '
                        	<tr id="'.$button->id.'">
                        		<td>'.$button->name.'</td>
                        		<td>'.$button->clReal.'</td>
                        		<td>'.$button->clShown.'</td>
                        		<td>
                        		<div class="pull-right">
                        		<button type="button" class="btn btn-danger btn-xs deleteButtonForUpdate"><i class="fa fa-times"></i></button>
                        		</div>
                        		</td>
                        	</tr>';
                        	}
                        }
                        echo '</tbody>
                    </table>
                  </div>
                  </div>';
	}
	public function getTapByBarGroupId(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$barGroupId = $this->input->post("barGroupId");
		$barGroups = $this->general_model->getTapByBarGroupId($barGroupId);
		echo json_encode($barGroups);
	}
	public function getTapStatuses(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$areas = $this->general_model->getTapStatuses();
		echo json_encode($areas);
	}
	public function getTechnicalServiceList(){
		header("Content-type:application/json");
		$this->load->model("general_model");
		$technicalServices = $this->general_model->getTechnicalServiceList();
		echo json_encode($technicalServices);
	}
	public function getTechnicalServiceFormById(){
		$formFields= [
		          	[
		            "name"=>"Rapor Tipi",
		            "id"=>"technicalServiceReportTypeID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>""
		          	],
		          	[
		            "name"=>"Başlangıç Tarihi",
		            "id"=>"beginDate",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Bitiş Tarihi",
		            "id"=>"endDate",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Gönderen Kullanıcı",
		            "id"=>"declaredUserID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>""
		          	],
		          	[
		            "name"=>"Alan Kullanıcı",
		            "id"=>"receivedUserID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>""
		          	],
		          	[
		            "name"=>"Tamamlayan Kullanıcı",
		            "id"=>"completedUserID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>""
		          	],
		          	[
		            "name"=>"Açıklama",
		            "id"=>"description",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Öncelik",
		            "id"=>"technicalServicePriorityID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>""
		          	],
		          	[
		            "name"=>"Durum",
		            "id"=>"technicalServiceStatusID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>""
		          	],
		          	[
		            "name"=>"Şirket seçin",
		            "id"=>"CompanyID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>""
		          	],
		          	[
		            "name"=>"Musluk",
		            "id"=>"tapID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>""
		          	],
		          	[
		            "name"=>"Id",
		            "id"=>"technicalServiceFormID",
		            "type"=>"hidden"
		          	]
	          	];
		$this->load->model("general_model");
		$this->load->model("admin_model");
		$TechnicalServiceFormId = $this->input->post("TechnicalServiceFormId");
		$technicalServiceForm = $this->general_model->getTechnicalServiceFormById($TechnicalServiceFormId);
		$technicalServiceUsers = $this->general_model->getTechnicalServiceUsers();
		$technicalServiceStatuses = $this->general_model->getTechnicalServiceStatuses();
		$technicalServiceReportTypes = $this->general_model->getTechnicalServiceReportTypes();
		$technicalServicePriorities = $this->general_model->getTechnicalServicePriorities();
		$users = $this->admin_model->getUsers();
		$companies = $this->general_model->getCompanies();
		$taps = $this->general_model->getTaps();
		$i=0;
	              echo '<div class="row">';
	              foreach ($formFields as $key => $field) {
	                $i++;
	                $message = "Bu alan zorunludur";
	                if($field["type"] == "email"){
	                  $message = "Lütfen geçerli bir mail adresi giriniz.";
	                }
	                $class = "";
	                if($field["type"] == "hidden"){
	                  $class ="unvisible";
	                }
	                if($i%2==1 && $i!=1){
	                  echo '</div><div class="row">';
	                }
	                if($field["type"]!="select"){
	                  echo '<div class="col-sm-6">
	                  <div class="form-group form-group-default required '.$class.' ">
	                    <label>'.$field["name"].':</label>
	                    <div class="controls">
	                      <input type="'.$field["type"].'" class="form-control" name="'.$field["id"].'" id="'.$field["id"].'" required data-msg="'.$message.'" value="'.$technicalServiceForm[0]->{$field["id"]}.'">
	                    </div>
	                  </div>
	                </div>';
	                }else{
	                if($field["id"] == "completedUserID" || $field["id"] == "receivedUserID" || $field["id"] == "declaredUserID"){
	                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
	                    <label class="">'.$field["name"].'</label>
	                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Ülke seçin" data-init-plugin="select2">
	                      <option value="0">Lütfen seçin</option>';
	                      if($field["id"] == "completedUserID" || $field["id"] == "receivedUserID"){
	                        foreach ($technicalServiceUsers as $key => $technicalServiceUser) {
	                        	$completedSelected = '';
	                      	$receivedSelected = '';
	                        	if($technicalServiceUser->id == $technicalServiceForm[0]->CompletedUserID){
				$completedSelected = 'selected = "selected"';
			}
			if($technicalServiceUser->id == $technicalServiceForm[0]->ReceivedUserID){
				$receivedSelected = 'selected = "selected"';
			}
	                          echo '<option '.$receivedSelected.' '.$completedSelected.' value='.$technicalServiceUser->id.'>'.$technicalServiceUser->yetkili_kisi.'</option>';
	                        }
	                      }
	                      if($field["id"] == "declaredUserID"){
	                        foreach ($users as $key => $user) {
	                        	$declaredSelected = '';
	                        	if($user->id == $technicalServiceForm[0]->DeclaredUserID){
				$declaredSelected = 'selected = "selected"';
			}
	                          echo '<option '.$declaredSelected.' value='.$user->id.'>'.$user->first_name.' '.$user->last_name.'</option>';
	                        }
	                      }
	                      echo '</select>
	                    </div></div>';
	                  }else
	                  if($field["id"] == "tapID"){
	                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
	                    <label class="">'.$field["name"].'</label>
	                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Şirket Tipi seçin" data-init-plugin="select2">
	                      <option value="0">Lütfen seçin</option>';
	                      foreach ($taps as $key => $tap) {
	                      	$selected = '';
			if($tap->TapID == $technicalServiceForm[0]->TapID){
				$selected = 'selected = "selected"';
			}
	                        echo '<option '.$selected.' value='.$tap->TapID.'>'.$tap->Name.'</option>';
	                      }
	                      echo '</select>
	                    </div></div>';
	                  }else
	                  if($field["id"] == "CompanyID"){
	                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
	                    <label class="">'.$field["name"].'</label>
	                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Şirket Tipi seçin" data-init-plugin="select2">
	                      <option value="0">Lütfen seçin</option>';
	                      foreach ($companies as $key => $company) {
	                      	$selected = '';
			if($company->CompanyID == $technicalServiceForm[0]->CompanyID){
				$selected = 'selected = "selected"';
			}
	                        echo '<option '.$selected.' value='.$company->CompanyID.'>'.$company->CompanyName.'</option>';
	                      }
	                      echo '</select>
	                    </div></div>';
	                  }else
	                  if($field["id"] == "technicalServiceReportTypeID"){
	                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
	                    <label class="">'.$field["name"].'</label>
	                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Şirket Tipi seçin" data-init-plugin="select2">
	                      <option value="0">Lütfen seçin</option>';
	                      foreach ($technicalServiceReportTypes as $key => $technicalServiceReportType) {
	                      	$selected = '';
			if($technicalServiceReportType->TechnicalServiceReportTypeID == $technicalServiceForm[0]->technicalServiceReportTypeID){
				$selected = 'selected = "selected"';
			}
	                        echo '<option '.$selected.' value='.$technicalServiceReportType->TechnicalServiceReportTypeID.'>'.$technicalServiceReportType->Name.'</option>';
	                      }
	                      echo '</select>
	                    </div></div>';
	                  }else
	                  if($field["id"] == "technicalServiceStatusID"){
	                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
	                    <label class="">'.$field["name"].'</label>
	                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Şirket Tipi seçin" data-init-plugin="select2">
	                      <option value="0">Lütfen seçin</option>';
	                      foreach ($technicalServiceStatuses as $key => $technicalServiceStatus) {
	                      	$selected = '';
			if($technicalServiceStatus->TechnicalServiceStatusID == $technicalServiceForm[0]->technicalServiceStatusID){
				$selected = 'selected = "selected"';
			}
	                        echo '<option '.$selected.' value='.$technicalServiceStatus->TechnicalServiceStatusID.'>'.$technicalServiceStatus->Name.'</option>';
	                      }
	                      echo '</select>
	                    </div></div>';
	                  }else
	                  if($field["id"] == "technicalServicePriorityID"){
	                    echo '<div class="col-sm-6"><div class="form-group form-group-default form-group-default-select2 required">
	                    <label class="">'.$field["name"].'</label>
	                    <select class="full-width '.$field["class"].' '.$field["disabled"].' required" name="'.$field["id"].'" data-msg="'.$message.'" data-placeholder="Şirket Tipi seçin" data-init-plugin="select2">
	                      <option value="0">Lütfen seçin</option>';
	                      foreach ($technicalServicePriorities as $key => $technicalServicePriority) {
	                      	$selected = '';
			if($technicalServicePriority->TechnicalServicePriorityID == $technicalServiceForm[0]->technicalServicePriorityID){
				$selected = 'selected = "selected"';
			}
	                        echo '<option '.$selected.' value='.$technicalServicePriority->TechnicalServicePriorityID.'>'.$technicalServicePriority->Name.'</option>';
	                      }
	                      echo '</select>
	                    </div></div>';
	                  }else{
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
}