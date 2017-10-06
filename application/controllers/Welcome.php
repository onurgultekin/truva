<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login(){
		header("Content-Type:application/json");
		$identity = $_POST["identity"];
		$password = $_POST["password"];
		$data = array("email" => $identity, "password" => $password);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'login',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$resp = curl_exec($curl);
		$response = json_decode($resp);
		if($response->resultCode == 0){
			$sessiondata = array(
			        'token'  => $response->accessToken,
			        'accessToken'  => $response->accessToken,
			        'userId'  => $response->userId,
			        'identity' =>$identity,
			        'userType' =>$response->userType,
			        'username' =>$response->username
			);
			$this->session->set_userdata($sessiondata);
			$result["success"] = true;
		}else{
			$result["success"] = false;
		}
		echo json_encode($result);
	}
	public function forgotPasswordCheck(){
		header("Content-Type:application/json");
		$email = $_POST["email"];
		$data = array("email" => $email);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'login/forgotPassword',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$resp = curl_exec($curl);
		$response = json_decode($resp);
		if($response->resultCode == 0){
			$result["success"] = true;
		}else{
			$result["success"] = false;
		}
		echo json_encode($result);
	}

	public function forgotPassword()
	{
		$this->load->view('forgotPassword');
	}

	public function resetPassword()
	{
		$this->load->view('resetPassword');
	}

	public function changePassword()
	{
		$this->load->view('changePassword');
	}

	public function resetPasswordProcess(){
		header("Content-Type:application/json");
		$password = $_POST["password"];
		$password2 = $_POST["password2"];
		$userId = $_POST["userId"];
		$hashCode = $_POST["hashCode"];
		$data = array("password" => $password,"password2"=>$password2,"userId"=>$userId,"hashCode"=>$hashCode);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => NEW_API_ENDPOINT.'login/resetPassword',
		CURLOPT_POSTFIELDS => http_build_query($data)
		));
		$resp = curl_exec($curl);
		$response = json_decode($resp);
		if($response->resultCode == 0){
			$result["success"] = true;
		}else{
			$result["success"] = false;
		}
		echo json_encode($result);
	}
	/*public function getAlcoholBrandByAlcoholType(){
		$token = $this->session->userdata("token");
		$ch = curl_init(API_ENDPOINT.'alcoholbrand/getAlcoholBrandByAlcoholType');                                                                
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json',
		    'token:'.$token.'',
		    'identity:admin@admin.com')                                                                       
		);                                                                                         
		$response = curl_exec($ch);
		print_r($response);
	}*/
}
