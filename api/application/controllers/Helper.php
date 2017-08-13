<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Helper extends REST_Controller {

	function __construct(){
		parent::__construct();
		$this->requestTime = date("Y-m-d H:i:s.u",round(microtime(true)));
		$this->load->model("Helper_model");
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
	public function getLastTapData_post(){
		$message = $this->Helper_model->getLastTapData($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getLeftSideMenu_post(){
		$message = $this->Helper_model->getLeftSideMenu($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalCompany_post(){
		$message = $this->Helper_model->getTotalCompany($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalTap_post(){
		$message = $this->Helper_model->getTotalTap($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalActiveTap_post(){
		$message = $this->Helper_model->getTotalActiveTap($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalActiveTapByHoldingID_post(){
		$message = $this->Helper_model->getTotalActiveTapByHoldingID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalActiveTapByCompanyID_post(){
		$message = $this->Helper_model->getTotalActiveTapByCompanyID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalActiveTapByBarGroupID_post(){
		$message = $this->Helper_model->getTotalActiveTapByBarGroupID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getActiveTapByTapID_post(){
		$message = $this->Helper_model->getActiveTapByTapID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getAlcoholTypePercentage_post(){
		$message = $this->Helper_model->getAlcoholTypePercentage($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalBarGroupByHoldingID_post(){
		$message = $this->Helper_model->getTotalBarGroupByHoldingID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalBarGroupByCompanyID_post(){
		$message = $this->Helper_model->getTotalBarGroupByCompanyID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalBarGroupByBarGroupID_post(){
		$message = $this->Helper_model->getTotalBarGroupByBarGroupID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalBarGroupByTapID_post(){
		$message = $this->Helper_model->getTotalBarGroupByTapID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalDailyCostForDailyByHoldingID_post(){
		$message = $this->Helper_model->getTotalDailyCostForDailyByHoldingID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalDailyCostForDailyByCompanyID_post(){
		$message = $this->Helper_model->getTotalDailyCostForDailyByCompanyID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
}