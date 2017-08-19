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
	public function getTotalCompanyByCountryId_post(){
		$message = $this->Helper_model->getTotalCompanyByCountryId($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalCompanyByCityId_post(){
		$message = $this->Helper_model->getTotalCompanyByCityId($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalCompanyByCountyId_post(){
		$message = $this->Helper_model->getTotalCompanyByCountyId($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalCompanyByAreaId_post(){
		$message = $this->Helper_model->getTotalCompanyByAreaId($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalTap_post(){
		$message = $this->Helper_model->getTotalTap($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalTapByCountryId_post(){
		$message = $this->Helper_model->getTotalTapByCountryId($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalTapByCityId_post(){
		$message = $this->Helper_model->getTotalTapByCityId($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalTapByCountyId_post(){
		$message = $this->Helper_model->getTotalTapByCountyId($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalTapByAreaId_post(){
		$message = $this->Helper_model->getTotalTapByAreaId($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalActiveTap_post(){
		$message = $this->Helper_model->getTotalActiveTap($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalActiveTapByCountryId_post(){
		$message = $this->Helper_model->getTotalActiveTapByCountryId($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalActiveTapByCityId_post(){
		$message = $this->Helper_model->getTotalActiveTapByCityId($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalActiveTapByCountyId_post(){
		$message = $this->Helper_model->getTotalActiveTapByCountyId($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalActiveTapByAreaId_post(){
		$message = $this->Helper_model->getTotalActiveTapByAreaId($this->post());
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
	public function getDailyAverageConsumedAlcoholFilteredByDate_post(){
		$message = $this->Helper_model->getDailyAverageConsumedAlcoholFilteredByDate($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getDailyAverageConsumedAlcoholFilteredByDateByHoldingID_post(){
		$message = $this->Helper_model->getDailyAverageConsumedAlcoholFilteredByDateByHoldingID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getDailyAverageConsumedAlcoholFilteredByDateByCompanyID_post(){
		$message = $this->Helper_model->getDailyAverageConsumedAlcoholFilteredByDateByCompanyID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getDailyAverageConsumedAlcoholFilteredByDateByBarGroupID_post(){
		$message = $this->Helper_model->getDailyAverageConsumedAlcoholFilteredByDateByBarGroupID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getDailyAverageConsumedAlcoholFilteredByDateByTapID_post(){
		$message = $this->Helper_model->getDailyAverageConsumedAlcoholFilteredByDateByTapID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getDailyConsumedAlcoholFilteredByDate_post(){
		$message = $this->Helper_model->getDailyConsumedAlcoholFilteredByDate($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getDailyConsumedAlcoholFilteredByDateByHoldingID_post(){
		$message = $this->Helper_model->getDailyConsumedAlcoholFilteredByDateByHoldingID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getDailyConsumedAlcoholFilteredByDateByCompanyID_post(){
		$message = $this->Helper_model->getDailyConsumedAlcoholFilteredByDateByCompanyID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getDailyConsumedAlcoholFilteredByDateByBarGroupID_post(){
		$message = $this->Helper_model->getDailyConsumedAlcoholFilteredByDateByBarGroupID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getDailyConsumedAlcoholFilteredByDateByTapID_post(){
		$message = $this->Helper_model->getDailyConsumedAlcoholFilteredByDateByTapID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalConsumedCl_post(){
		$message = $this->Helper_model->getTotalConsumedCl($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalConsumedClByHoldingID_post(){
		$message = $this->Helper_model->getTotalConsumedClByHoldingID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalConsumedClByCompanyID_post(){
		$message = $this->Helper_model->getTotalConsumedClByCompanyID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalConsumedClByBarGroupID_post(){
		$message = $this->Helper_model->getTotalConsumedClByBarGroupID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTotalConsumedClByTapID_post(){
		$message = $this->Helper_model->getTotalConsumedClByTapID($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
}