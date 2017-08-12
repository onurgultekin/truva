<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Alcoholtype extends REST_Controller {

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
	public function getAlcoholTypelist_post(){
		$this->load->model("AlcoholType_model");
		$message = $this->AlcoholType_model->getAlcoholTypelist($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getAlcoholTypeByAlcoholGroup_post(){
		$this->load->model("AlcoholType_model");
		$message = $this->AlcoholType_model->getAlcoholTypeByAlcoholGroup($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function addAlcoholType_post(){
		$this->load->model("AlcoholType_model");
		$message = $this->AlcoholType_model->addAlcoholType($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function updateAlcoholType_post(){
		$this->load->model("AlcoholType_model");
		$message = $this->AlcoholType_model->updateAlcoholType($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function deleteAlcoholType_post(){
		$this->load->model("AlcoholType_model");
		$message = $this->AlcoholType_model->deleteAlcoholType($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
}