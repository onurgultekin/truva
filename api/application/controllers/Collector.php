<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Collector extends REST_Controller {

	function __construct(){
		parent::__construct();
		$this->requestTime = date("Y-m-d H:i:s.u",round(microtime(true)));
		$this->load->model("Collector_model");
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
	public function getCollectorList_post(){
		$message = $this->Collector_model->getCollectorList($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function addCollector_post(){
		$message = $this->Collector_model->addCollector($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function updateCollector_post(){
		$message = $this->Collector_model->updateCollector($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function deleteCollector_post(){
		$message = $this->Collector_model->deleteCollector($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
}