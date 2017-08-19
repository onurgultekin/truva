<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class User extends REST_Controller {

	function __construct(){
		parent::__construct();
		$this->requestTime = date("Y-m-d H:i:s.u",round(microtime(true)));
		$this->load->model("User_model");
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
		$query = @$this->db->query("CALL INSERT_LOG('".md5($this->post("accessToken"))."','".$this->input->ip_address()."','".addslashes(json_encode($this->post(),JSON_UNESCAPED_UNICODE))."','".addslashes($message)."','".$method."',".$userId.",'".$requestTime."','".$responseTime."')");
	}
	public function getUserLog_post(){
		$message = $this->User_model->getUserLog($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getUserList_post(){
		$message = $this->User_model->getUserList($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTapByBarGroupId_post(){
		$message = $this->User_model->getTapByBarGroupId($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function getTapStatuses_post(){
		$message = $this->User_model->getTapStatuses($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function addTap_post(){
		$message = $this->User_model->addTap($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function updateTap_post(){
		$message = $this->User_model->updateTap($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
	public function deleteTap_post(){
		$message = $this->User_model->deleteTap($this->post());
		$this->set_response($message, REST_Controller::HTTP_OK);
	}
}