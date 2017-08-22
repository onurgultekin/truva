<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata("token")){
			redirect(base_url());
		}
	}

	public function index()
	{
		$this->load->model("general_model");
		$data["countries"] = $this->general_model->getCountries();
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["holdings"] = $this->general_model->getHoldings();
		$data["totalCompanyCount"] = $this->general_model->getTotalCompanyCount();
		$data["totalTapCount"] = $this->general_model->getTotalTapCount();
		$data["totalActiveTapCount"] = $this->general_model->getTotalActiveTapCount();
		$data["alcoholTypePercentages"] = $this->general_model->getAlcoholTypePercentage();
		$dateBegin = date("Y-m-d", strtotime("-1 week"));
		$dateEnd = date("Y-m-d");
		$data["totalDailyConsumed"] = $this->general_model->getDailyConsumedAlcoholFilteredByDate($dateBegin,$dateEnd,0,0,0,0);
		$data["averageConsumed"] = $this->general_model->getDailyAverageConsumedAlcoholFilteredByDate($dateBegin,$dateEnd,0,0,0,0);
		$data["last5taps"] = $this->general_model->getLastTapData();
		$this->load->view('dashboard',$data);
	}

	public function userlog()
	{
		$dateBegin = date("Y-m-d", strtotime("-1 day"));
		$dateEnd = date("Y-m-d");
		$this->load->model("general_model");
		$this->load->model("admin_model");
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["userlogs"] = $this->admin_model->getUserLog($dateBegin,$dateEnd);
		$this->load->view('userlog',$data);
	}

	public function holdings()
	{
		$data["formFields"]= [
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
	          ]
	          ];
		$this->load->model("general_model");
		$data["countries"] = $this->general_model->getCountries();
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["holdings"] = $this->general_model->getHoldings();
		$this->load->view('holdings',$data);
	}

	public function companies()
	{
		$this->load->model("general_model");
		$data["formFields"]= [
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
	            "name"=>"Şirket Tabela Adı.",
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
	            "disabled"=>"disabled",
	            "class"=>"citiesinmodal"
	          ],
	          [
	            "name"=>"İlçe seçin",
	            "id"=>"CountyID",
	            "type"=>"select",
	            "disabled"=>"disabled",
	            "class"=>"districtsinmodal"
	          ],
	          [
	            "name"=>"Semt seçin",
	            "id"=>"AreaID",
	            "type"=>"select",
	            "disabled"=>"disabled",
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
	          ]
	          ];
		$data["countries"] = $this->general_model->getCountries();
		$data["holdings"] = $this->general_model->getHoldings();
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["companies"] = $this->general_model->getCompanies();
		$data["companyTypes"] = $this->general_model->getCompanyTypes();
		$this->load->view('companies',$data);
	}

	public function users()
	{
		$this->load->model("general_model");
		$this->load->model("admin_model");
		$data["formFields"]= [
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
	            "id"=>"user_email",
	            "type"=>"email"
	          ],
	          [
	            "name"=>"Şifre",
	            "id"=>"user_password",
	            "type"=>"password"
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
	            "disabled"=>"disabled",
	            "class"=>"citiesinmodal",
	          ],
	          [
	            "name"=>"İlçe seçin",
	            "id"=>"county_id",
	            "type"=>"select",
	            "disabled"=>"disabled",
	            "class"=>"districtsinmodal",
	          ],
	          [
	            "name"=>"Posta Kodu",
	            "id"=>"postcode",
	            "type"=>"text"
	          ]
	          ];
	          	$data["countries"] = $this->general_model->getCountries();
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["users"] = $this->admin_model->getUsers();
		$data["userGroups"] = $this->general_model->getUserGroups();
		$data["companies"] = $this->general_model->getCompanies();
		$data["holdings"] = $this->general_model->getHoldings();
		$this->load->view('users',$data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
	public function countries(){
		$data["formFields"]= [
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
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["countries"] = $this->general_model->getCountries();
		$this->load->view('countries',$data);
	}
	public function cities(){
		$data["formFields"]= [
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
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["countries"] = $this->general_model->getCountries();
		$data["cities"] = $this->general_model->getCities();
		$this->load->view('cities',$data);
	}
	public function counties(){
		$data["formFields"]= [
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
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["cities"] = $this->general_model->getCities();
		$data["counties"] = $this->general_model->getDistricts();
		$this->load->view('counties',$data);
	}
	public function areas(){
		$data["formFields"]= [
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
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["counties"] = $this->general_model->getDistricts();
		$data["areas"] = $this->general_model->getAreas();
		$this->load->view('areas',$data);
	}
	public function alcoholGroups(){
		$data["formFields"]= [
		          	[
		            "name"=>"Kod",
		            "id"=>"Code",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Adı",
		            "id"=>"Name",
		            "type"=>"text"
		          	]
	          	];
		$this->load->model("general_model");
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["alcoholGroups"] = $this->general_model->getAlcoholGrouplist();
		$this->load->view('alcoholGroups',$data);
	}
	public function alcoholTypes(){
		$data["formFields"]= [
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
		          	]
	          	];
		$this->load->model("general_model");
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["alcoholTypes"] = $this->general_model->getAlcoholTypelist();
		$data["alcoholGroups"] = $this->general_model->getAlcoholGrouplist();
		$this->load->view('alcoholTypes',$data);
	}
	public function alcoholBrands(){
		$data["formFields"]= [
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
		          	]
	          	];
		$this->load->model("general_model");
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["alcoholTypes"] = $this->general_model->getAlcoholTypelist();
		$data["alcoholBrands"] = $this->general_model->getAlcoholBrandlist();
		$this->load->view('alcoholBrands',$data);
	}
	public function collectors(){
		$data["formFields"]= [
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
		          	]
	          	];
		$this->load->model("general_model");
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["collectors"] = $this->general_model->getCollectorList();
		$this->load->view('collectors',$data);
	}
	public function barGroups(){
		$data["formFields"]= [
		          	[
		            "name"=>"Kod",
		            "id"=>"Code",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Adı",
		            "id"=>"Name",
		            "type"=>"text"
		          	]
	          	];
		$this->load->model("general_model");
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["barGroups"] = $this->general_model->getBarGroups();
		$this->load->view('barGroups',$data);
	}
	public function tapWizard(){
		$data["holdingFields"]= [
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
	          ]
	          ];
	          $data["companyFields"]= [
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
	            "name"=>"Şirket Tabela Adı.",
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
	            "disabled"=>"disabled",
	            "class"=>"citiesinmodal"
	          ],
	          [
	            "name"=>"İlçe seçin",
	            "id"=>"CountyID",
	            "type"=>"select",
	            "disabled"=>"disabled",
	            "class"=>"districtsinmodal"
	          ],
	          [
	            "name"=>"Semt seçin",
	            "id"=>"AreaID",
	            "type"=>"select",
	            "disabled"=>"disabled",
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
	          ]
	          ];
	          $data["barGroupFields"]= [
		          	[
		            "name"=>"Kod",
		            "id"=>"Code",
		            "type"=>"text"
		          	],
		          	[
		            "name"=>"Adı",
		            "id"=>"Name",
		            "type"=>"text"
		          	]
	          	];
	          	$data["alcoholTypeFields"]= [
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
		          	]
	          	];
	          	$data["alcoholBrandFields"]= [
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
		          	]
	          	];
		$this->load->model("general_model");
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["collectors"] = $this->general_model->getCollectorList();
		$data["holdings"] = $this->general_model->getHoldings();
		$data["companies"] = $this->general_model->getCompanies();
		$data["barGroups"] = $this->general_model->getBarGroups();
		$data["alcoholTypes"] = $this->general_model->getAlcoholTypelist();
		$data["alcoholGroups"] = $this->general_model->getAlcoholGrouplist();
		$data["alcoholBrands"] = $this->general_model->getAlcoholBrandlist();
		$data["countries"] = $this->general_model->getCountries();
		$this->load->view('tapWizard',$data);
	}
	public function consumption(){
		$dateBegin = date("Y-m-d", strtotime("-1 month"));
		$dateEnd = date("Y-m-d");
		$this->load->model("general_model");
		$data["reports"] = $this->general_model->getDailyConsumedAlcoholFilteredByDate($dateBegin,$dateEnd,0,0,0,0);
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["holdings"] = $this->general_model->getHoldings();
		$this->load->view('consumption',$data);
	}
	public function technicalServiceList(){
		$data["formFields"]= [
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
		]
	          	];
		$this->load->model("general_model");
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["technicalServices"] = $this->general_model->getTechnicalServiceList();
		$data["countries"] = $this->general_model->getCountries();
		$this->load->view('technicalService',$data);
	}
	public function companyBarGroups(){
		$data["formFields"]= [
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
		            "name"=>"Şirket seçin",
		            "id"=>"CompanyID",
		            "type"=>"select",
		            "disabled"=>"",
		            "class"=>""
		          	]
	          	];
		$this->load->model("general_model");
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["barGroups"] = $this->general_model->getCompanyBarGroups();
		$data["companies"] = $this->general_model->getCompanies();
		$this->load->view('companyBarGroup',$data);
	}
	public function taps(){
		$data["formFields"]= [
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
		            "disabled"=>"disabled",
		            "class"=>"companies"
		            ],
		            [
		            "name"=>"Bar grubu seçin",
		            "id"=>"BarGroupID",
		            "type"=>"select",
		            "disabled"=>"disabled",
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
		            ]
	          	];
		$this->load->model("general_model");
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["taps"] = $this->general_model->getTaps();
		$data["tapStatuses"] = $this->general_model->getTapStatuses();
		$data["holdings"] = $this->general_model->getHoldings();
		$data["alcoholGroups"] = $this->general_model->getAlcoholGrouplist();
		$data["alcoholTypes"] = $this->general_model->getAlcoholTypelist();
		$data["alcoholBrands"] = $this->general_model->getAlcoholBrandlist();
		$data["collectors"] = $this->general_model->getCollectorList();
		$this->load->view('taps',$data);
	}
	public function totalDailyGuest(){
		$data["formFields"]= [
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
		          	]
	          	];
		$this->load->model("general_model");
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["totalDailyGuests"] = $this->general_model->getTotalDailyGuests();
		$data["companies"] = $this->general_model->getCompanies();
		$this->load->view('totalDailyGuests',$data);
	}
	public function troubleDemand(){
		$data["formFields"]= [
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
		          	]
	          	];
		$this->load->model("general_model");
		$this->load->model("admin_model");
		$data["leftsidemenuitems"] = $this->general_model->getLeftSideMenu();
		$data["technicalServiceForms"] = $this->general_model->getTechnicalServiceForm();
		$data["technicalServiceUsers"] = $this->general_model->getTechnicalServiceUsers();
		$data["users"] = $this->admin_model->getUsers();
		$data["companies"] = $this->general_model->getCompanies();
		$data["taps"] = $this->general_model->getTaps();
		$this->load->view('troubleDemand',$data);
	}
}
