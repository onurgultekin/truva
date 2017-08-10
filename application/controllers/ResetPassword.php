<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResetPassword extends CI_Controller {

	public function index(){
		$key = $this->input->get("key");
		$ch = curl_init(API_ENDPOINT.'token/reset_password/'.$key);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		$response = curl_exec($ch);
		$response = json_decode($response);
		if($response->result == 200){
			redirect(base_url()."welcome/changePassword?key=$key");
		}
	}
	public function changePassword(){
		header("Content-Type:application/json");
		$reset_key = $_POST["reset_key"];
		$password = $_POST["password"];
		$data = array("reset_key" => $reset_key, "password" => $password);                                                                    
		$data_string = json_encode($data); 
		$ch = curl_init(API_ENDPOINT.'token/new_password');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($data_string))                                                              
		);                                                                                                                   
		                                                                                                                     
		$response = curl_exec($ch);
		$response = json_decode($response);
		if($response->result == 200){
			$result["success"] = true;
		}else{
			$result["success"] = false;
		}
		echo json_encode($result);
	}
}
