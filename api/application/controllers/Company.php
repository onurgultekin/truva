<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Company extends REST_Controller {

	function __construct(){
		parent::__construct();
		$this->requestTime = date("Y-m-d H:i:s.u",round(microtime(true)));
	}
	function __destruct(){
		parent::__destruct();
		$url = $this->uri->uri_string();
		$message = $this->output->final_output;
		$userIp = $this->post("userIp");
		$userId = $this->post("userId");
		if(!$userId){
			$userId = 0;
		}
		$responseTime = date("Y-m-d H:i:s.u",round(microtime(true)));
		$this->insertLogs($message,$url,$userId,$this->requestTime,$responseTime);
	}
	function insertLogs($message,$method,$userId,$requestTime,$responseTime){
		$this->db->close();
		$message = json_decode($message);
		$message = json_encode($message,JSON_UNESCAPED_UNICODE);
		$query = $this->db->query("CALL INSERT_LOG('".md5($this->post("accessToken"))."','".$this->input->ip_address()."','".json_encode($this->post(),JSON_UNESCAPED_UNICODE)."','".addslashes($message)."','".$method."',".$userId.",'".$requestTime."','".$responseTime."')");
	}
	public function getCompanyByCountry_post(){
		$this->load->model("Company_model");
		$message = $this->Company_model->getCompanyByCountry($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getCompanyByCity_post(){
		$this->load->model("Company_model");
		$message = $this->Company_model->getCompanyByCity($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getCompanyByCounties_post(){
		$this->load->model("Company_model");
		$message = $this->Company_model->getCompanyByCounties($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getCompanyByAreas_post(){
		$this->load->model("Company_model");
		$message = $this->Company_model->getCompanyByAreas($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getCompanyByHolding_post(){
		$this->load->model("Company_model");
		$message = $this->Company_model->getCompanyByHolding($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getCompanylist_post(){
		$this->load->model("Company_model");
		$message = $this->Company_model->getCompanylist($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function addCompany_post(){
		$this->load->model("Company_model");
		$message = $this->Company_model->addCompany($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function updateCompany_post(){
		$this->load->model("Company_model");
		$message = $this->Company_model->updateCompany($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function deleteCompany_post(){
		$this->load->model("Company_model");
		$message = $this->Company_model->deleteCompany($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
}