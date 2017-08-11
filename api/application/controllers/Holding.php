<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Holding extends REST_Controller {

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
		$query = $this->db->query("CALL INSERT_LOG('".md5($this->post("accessToken"))."','".$this->input->ip_address()."','".json_encode($this->post(),JSON_UNESCAPED_UNICODE)."','".$message."','".$method."',".$userId.",'".$requestTime."','".$responseTime."')");
	}
	public function getHoldingByCountry_post(){
		$this->load->model("holding_model");
		$message = $this->holding_model->getHoldingByCountry($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getHoldingByCity_post(){
		$this->load->model("holding_model");
		$message = $this->holding_model->getHoldingByCity($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getHoldingByCounties_post(){
		$this->load->model("holding_model");
		$message = $this->holding_model->getHoldingByCounties($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getHoldingByAreas_post(){
		$this->load->model("holding_model");
		$message = $this->holding_model->getHoldingByAreas($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getHoldinglist_post(){
		$this->load->model("holding_model");
		$message = $this->holding_model->getHoldinglist($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function addHolding_post(){
		$this->load->model("holding_model");
		$message = $this->holding_model->addHolding($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function updateHolding_post(){
		$this->load->model("holding_model");
		$message = $this->holding_model->updateHolding($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function deleteHolding_post(){
		$this->load->model("holding_model");
		$message = $this->holding_model->deleteHolding($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
}