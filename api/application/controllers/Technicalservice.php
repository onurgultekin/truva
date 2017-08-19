<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Technicalservice extends REST_Controller {

	function __construct(){
		parent::__construct();
		$this->requestTime = date("Y-m-d H:i:s.u",round(microtime(true)));
		$this->load->model("TechnicalService_model");
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
	public function getTechnicalServicelist_post(){
		$message = $this->TechnicalService_model->getTechnicalServicelist($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getUsersByTechnicalService_post(){
		$message = $this->TechnicalService_model->getUsersByTechnicalService($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTechnicalServiceUsers_post(){
		$message = $this->TechnicalService_model->getTechnicalServiceUsers($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function addTechnicalService_post(){
		$message = $this->TechnicalService_model->addTechnicalService($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function updateTechnicalService_post(){
		$message = $this->TechnicalService_model->updateTechnicalService($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function deleteTechnicalService_post(){
		$message = $this->TechnicalService_model->deleteTechnicalService($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function updateUsersTechnicalService_post(){
		$message = $this->TechnicalService_model->updateUsersTechnicalService($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}


}