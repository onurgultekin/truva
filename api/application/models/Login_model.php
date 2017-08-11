<?php 
class Login_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
        public function login_user($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("email","password"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("email","password");
                        foreach ($parameters as $key => $parameter) {
                                if(!in_array($key,$availableParameters)){
                                        $i++;
                                }
                        }
                        if($i>0){
                                $response = $this->globalfunctions->returnMessage(1001,"Geçersiz istek. Bilinmeyen parametre girdiniz.",true);
                        }else{
                                $email = $parameters["email"];
                                $password = $parameters["password"];
                                if(!$email){
                                        $response = $this->globalfunctions->returnMessage(1,"E-posta adresinizi giriniz.",true);
                                }else
                                if(!$password){
                                        $response = $this->globalfunctions->returnMessage(2,"Şifrenizi giriniz.",true);
                                }else{
                                        $query = $this->db->query("CALL USER_LOGIN('".$email."','".$password."')");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,$result->isError);
                                        if(@$result->accessToken){
                                                $response["accessToken"] = $result->accessToken;
                                                $response["userId"] = $result->userId;
                                                $response["username"] = $result->userfullname;
                                                $response["userType"] = $result->userType;
                                        }
                                }
                        }
                }
                return $response;
        }
}
?>