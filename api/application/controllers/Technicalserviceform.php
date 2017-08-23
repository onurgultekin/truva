<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Technicalserviceform extends REST_Controller {

	function __construct(){
		parent::__construct();
		$this->requestTime = date("Y-m-d H:i:s.u",round(microtime(true)));
		$this->load->model("TechnicalServiceForm_model");
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
		$query = $this->db->query("CALL INSERT_LOG('".md5($this->post("accessToken"))."','".$this->input->ip_address()."','".addslashes(json_encode($this->post(),JSON_UNESCAPED_UNICODE))."','".addslashes($message)."','".$method."',".$userId.",'".$requestTime."','".$responseTime."')");
	}
	public function getTechnicalServiceForm_post(){
		$message = $this->TechnicalServiceForm_model->getTechnicalServiceForm($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function addTechnicalServiceForm_post(){
		$message = $this->TechnicalServiceForm_model->addTechnicalServiceForm($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function updateTechnicalServiceForm_post(){
		$message = $this->TechnicalServiceForm_model->updateTechnicalServiceForm($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTechnicalServiceStatus_post(){
		$message = $this->TechnicalServiceForm_model->getTechnicalServiceStatus($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTechnicalServiceReportType_post(){
		$message = $this->TechnicalServiceForm_model->getTechnicalServiceReportType($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTechnicalServicePriority_post(){
		$message = $this->TechnicalServiceForm_model->getTechnicalServicePriority($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
}