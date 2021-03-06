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
        public function forgotPassword($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("email");
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("email");
                        foreach ($parameters as $key => $parameter) {
                                if(!in_array($key,$availableParameters)){
                                        $i++;
                                }
                        }
                        if($i>0){
                                $response = $this->globalfunctions->returnMessage(1001,"Geçersiz istek. Bilinmeyen parametre girdiniz.",true);
                        }else{
                                $email = $parameters["email"];
                                if(!$email){
                                        $response = $this->globalfunctions->returnMessage(1,"E-posta adresinizi giriniz.",true);
                                }else{
                                        $query = $this->db->query("CALL CHECK_EMAIL('".$email."')");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $userId = $query->row()->id;
                                                $hashCode = $query->row()->hashCode;
                                                $name = $query->row()->first_name;
                                                $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
                                                <html xmlns="http://www.w3.org/1999/xhtml">
                                                        <head>
                                                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                                                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                                                                <title>Your Activation Link @ Blesh</title>

                                                                <style type="text/css">
                                                                        /* Client-specific Styles */
                                                                        #outlook a {padding:0;} /* Force Outlook to provide a "view in browser" menu link. */
                                                                        body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
                                                                        /* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
                                                                        .ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
                                                                        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing.*/
                                                                        #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
                                                                        img {outline:none; text-decoration:none;border:none; -ms-interpolation-mode: bicubic;}
                                                                        a img {border:none;}
                                                                        .image_fix {display:block;}
                                                                        p {margin: 0px 0px !important;}
                                                                        table td {border-collapse: collapse;}
                                                                        table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
                                                                        a {color: #0a8cce;text-decoration: none;text-decoration:none!important;}
                                                                        /*STYLES*/
                                                                        table[class=full] { width: 100%; clear: both; }
                                                                        /*IPAD STYLES*/
                                                                        @media only screen and (max-width: 640px) {
                                                                                a[href^="tel"], a[href^="sms"] {
                                                                                        text-decoration: none;
                                                                                        color: #0a8cce; /* or whatever your want */
                                                                                        pointer-events: none;
                                                                                        cursor: default;
                                                                                }
                                                                                .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                                                                                        text-decoration: default;
                                                                                        color: #0a8cce !important;
                                                                                        pointer-events: auto;
                                                                                        cursor: default;
                                                                                }
                                                                                table[class=devicewidth] {width: 440px!important;text-align:center!important;}
                                                                                table[class=devicewidthinner] {width: 420px!important;text-align:center!important;}
                                                                                img[class=banner] {width: 440px!important;height:220px!important;}
                                                                                img[class=colimg2] {width: 440px!important;height:220px!important;}
                                                                        }
                                                                        /*IPHONE STYLES*/
                                                                        @media only screen and (max-width: 480px) {
                                                                                a[href^="tel"], a[href^="sms"] {
                                                                                        text-decoration: none;
                                                                                        color: #0a8cce; /* or whatever your want */
                                                                                        pointer-events: none;
                                                                                        cursor: default;
                                                                                }
                                                                                .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                                                                                        text-decoration: default;
                                                                                        color: #0a8cce !important; 
                                                                                        pointer-events: auto;
                                                                                        cursor: default;
                                                                                }
                                                                                table[class=devicewidth] {width: 280px!important;text-align:center!important;}
                                                                                table[class=devicewidthinner] {width: 260px!important;text-align:center!important;}
                                                                                img[class=banner] {width: 280px!important;height:140px!important;}
                                                                                img[class=colimg2] {width: 280px!important;height:140px!important;}
                                                                                td[class=mobile-hide]{display:none!important;}
                                                                                td[class="padding-bottom25"]{padding-bottom:25px!important;}
                                                                        }
                                                                </style>
                                                        </head>
                                                        <body>
                                                                <!-- Start of header -->
                                                                <table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="header">
                                                                        <tbody>
                                                                                <tr>
                                                                                        <td>
                                                                                                <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
                                                                                                        <tbody>
                                                                                                                <tr>
                                                                                                                        <td width="100%">
                                                                                                                                <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
                                                                                                                                        <tbody>
                                                                                                                                                <!-- Spacing -->
                                                                                                                                                <tr>
                                                                                                                                                        <td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                                                                                                                                </tr>
                                                                                                                                                <!-- Spacing -->
                                                                                                                                                <tr>
                                                                                                                                                        <td>
                                                                                                                                                                <!-- logo -->
                                                                                                                                                                <table width="140" align="center" border="0" cellpadding="0" cellspacing="0" class="devicewidth">
                                                                                                                                                                        <tbody>
                                                                                                                                                                                <tr>
                                                                                                                                                                                        <td width="169" height="45" align="center">
                                                                                                                                                                                                <div class="imgpop">
                                                                                                                                                                                                        <a target="_blank" href="#">
                                                                                                                                                                                                                <img src="'.base_url().'images/logo.png" alt="" border="0" style="display:block; border:none; outline:none; text-decoration:none;">
                                                                                                                                                                                                        </a>
                                                                                                                                                                                                </div>
                                                                                                                                                                                        </td>
                                                                                                                                                                                </tr>
                                                                                                                                                                        </tbody>
                                                                                                                                                                </table>
                                                                                                                                                                <!-- end of logo -->
                                                                                                                                                        </td>
                                                                                                                                                </tr>
                                                                                                                                                <!-- Spacing -->
                                                                                                                                                <tr>
                                                                                                                                                        <td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                                                                                                                                </tr>
                                                                                                                                                <!-- Spacing -->
                                                                                                                                        </tbody>
                                                                                                                                </table>
                                                                                                                        </td>
                                                                                                                </tr>
                                                                                                        </tbody>
                                                                                                </table>
                                                                                        </td>
                                                                                </tr>
                                                                        </tbody>
                                                                </table>
                                                                <!-- End of Header -->
                                                                <!-- Start of seperator -->
                                                                <table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="seperator">
                                                                        <tbody>
                                                                                <tr>
                                                                                        <td>
                                                                                                <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth">
                                                                                                        <tbody>
                                                                                                                <tr>
                                                                                                                        <td align="center" height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                                                                                                                </tr>
                                                                                                        </tbody>
                                                                                                </table>
                                                                                        </td>
                                                                                </tr>
                                                                        </tbody>
                                                                </table>
                                                                <!-- End of seperator -->
                                                                <!-- Start Full Text -->
                                                                <table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="full-text">
                                                                        <tbody>
                                                                                <tr>
                                                                                        <td>
                                                                                                <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
                                                                                                        <tbody>
                                                                                                                <tr>
                                                                                                                        <td width="100%">
                                                                                                                                <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
                                                                                                                                        <tbody>
                                                                                                                                                <!-- Spacing -->
                                                                                                                                                <tr>
                                                                                                                                                        <td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                                                                                                                                </tr>
                                                                                                                                                <!-- Spacing -->
                                                                                                                                                <tr>
                                                                                                                                                        <td>
                                                                                                                                                                <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
                                                                                                                                                                        <tbody>
                                                                                                                                                                                <!-- Title -->
                                                                                                                                                                                <tr>
                                                                                                                                                                                        <td style="font-family: Helvetica, arial, sans-serif; font-size: 30px; color: #333333; text-align:center; line-height: 30px;" st-title="fulltext-heading">
                                                                                                                                                                                                Merhaba, '.$name.'
                                                                                                                                                                                        </td>
                                                                                                                                                                                </tr>
                                                                                                                                                                                <!-- End of Title -->
                                                                                                                                                                                <!-- spacing -->
                                                                                                                                                                                <tr>
                                                                                                                                                                                        <td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                                                                                                                                                                </tr>
                                                                                                                                                                                <!-- End of spacing -->
                                                                                                                                                                                <!-- content -->
                                                                                                                                                                                <tr>
                                                                                                                                                                                        <td style="font-family: Helvetica, arial, sans-serif; font-size: 16px; color: #666666; text-align:center; line-height: 30px;" st-content="fulltext-content">
                                                                                                                                                                                                Şifrenizi unuttuğunuz için bu maili aldınız.<br>
                                                                                                                                                                                                Şifrenizi sıfırlamak için aşağıdaki linkte tıklayın.<br>
                                                                                                                                                                                                <a href ="http://test.truva.co/resetPassword/'.$userId.'/'.$hashCode.'"><b>Şifrenizi sıfırlayın</b></a>
                                                                                                                                                                                        </td>
                                                                                                                                                                                </tr>
                                                                                                                                                                                <!-- End of content -->
                                                                                                                                                                        </tbody>
                                                                                                                                                                </table>
                                                                                                                                                        </td>
                                                                                                                                                </tr>
                                                                                                                                                <!-- Spacing -->
                                                                                                                                                <tr>
                                                                                                                                                        <td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                                                                                                                                </tr>
                                                                                                                                                <!-- Spacing -->
                                                                                                                                        </tbody>
                                                                                                                                </table>
                                                                                                                        </td>
                                                                                                                </tr>
                                                                                                        </tbody>
                                                                                                </table>
                                                                                        </td>
                                                                                </tr>
                                                                        </tbody>
                                                                </table>
                                                                <!-- end of full text -->
                                                                <!-- Start of seperator -->
                                                                <table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="seperator">
                                                                        <tbody>
                                                                                <tr>
                                                                                        <td>
                                                                                                <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth">
                                                                                                        <tbody>
                                                                                                                <tr>
                                                                                                                        <td align="center" height="30" style="font-size:1px; line-height:1px;">&nbsp;</td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                        <td width="550" align="center" height="1" bgcolor="#d1d1d1" style="font-size:1px; line-height:1px;">&nbsp;</td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                        <td align="center" height="30" style="font-size:1px; line-height:1px;">&nbsp;</td>
                                                                                                                </tr>
                                                                                                        </tbody>
                                                                                                </table>
                                                                                        </td>
                                                                                </tr>
                                                                        </tbody>
                                                                </table>
                                                                <!-- End of seperator -->
                                                                <!-- Start of Postfooter -->
                                                                <table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="postfooter" >
                                                                        <tbody>
                                                                                <tr>
                                                                                        <td>
                                                                                                <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
                                                                                                        <tbody>
                                                                                                                <tr>
                                                                                                                        <td width="100%">
                                                                                                                                <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
                                                                                                                                        <tbody>
                                                                                                                                                <tr>
                                                                                                                                                        <td align="center" valign="middle" style="font-family: Helvetica, arial, sans-serif; font-size: 14px;color: #666666" st-content="postfooter">
                                                                                                                                                                Click here to <a href="#" style="text-decoration: none; color: #0a8cce">Unsubscribe</a> 
                                                                                                                                                        </td>
                                                                                                                                                </tr>
                                                                                                                                                <!-- Spacing -->
                                                                                                                                                <tr>
                                                                                                                                                        <td width="100%" height="20"></td>
                                                                                                                                                </tr>
                                                                                                                                                <!-- Spacing -->
                                                                                                                                        </tbody>
                                                                                                                                </table>
                                                                                                                        </td>
                                                                                                                </tr>
                                                                                                        </tbody>
                                                                                                </table>
                                                                                        </td>
                                                                                </tr>
                                                                        </tbody>
                                                                </table>
                                                                <!-- End of postfooter -->
                                                        </body>
                                                </html>';
                                                /*$this->load->library('email');
                                                $this->email->from('support@truva.co');
                                                $this->email->to($email);
                                                $this->email->reply_to("support@truva.co");
                                                $this->email->subject("Truva Şifremi unuttum servisi.");
                                                $this->email->message($message);
                                                $send = $this->email->send();*/
                                                $to = $email;
                                                $subject = 'Truva Şifremi Unuttum Servisi';
                                                $headers = 'From: no-reply@truva.co' . "\r\n" .
                                                    'Reply-To: no-reply@truva.co' . "\r\n" .
                                                    'Content-Type: text/html;' . "\r\n" .
                                                    'X-Mailer: PHP/' . phpversion();
                                                $send = mail($to, $subject, $message, $headers);
                                                if( $send == false ) {
                                                        $response = $this->globalfunctions->returnMessage(1502,"E-posta gönderilemedi.",1);
                                                }else{
                                                        $response["result"] = true;
                                                        $response["resultCode"] = 0;
                                                        $response["message"] = $query->result();
                                                }
                                        }
                                }
                        }
                }
                return $response;
        }
        public function resetPassword($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("password","password2","userId","hashCode"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("password","password2","userId","hashCode");
                        foreach ($parameters as $key => $parameter) {
                                if(!in_array($key,$availableParameters)){
                                        $i++;
                                }
                        }
                        if($i>0){
                                $response = $this->globalfunctions->returnMessage(1001,"Geçersiz istek. Bilinmeyen parametre girdiniz.",true);
                        }else{
                                $password2 = $parameters["password2"];
                                $password = $parameters["password"];
                                $userId = $parameters["userId"];
                                $hashCode = $parameters["hashCode"];
                                if(!$userId){
                                        $response = $this->globalfunctions->returnMessage(1,"user id giriniz.",true);
                                }else
                                if(!$hashCode){
                                        $response = $this->globalfunctions->returnMessage(2,"hashCode giriniz.",true);
                                }else
                                if(!$password){
                                        $response = $this->globalfunctions->returnMessage(3,"Şifrenizi giriniz.",true);
                                }else
                                if(!$password2){
                                        $response = $this->globalfunctions->returnMessage(4,"Şifrenizi tekrar giriniz.",true);
                                }else
                                if($password2 != $password){
                                        $response = $this->globalfunctions->returnMessage(5,"Şifreleriniz eşleşmiyor.",true);
                                }else{
                                        $query = $this->db->query("CALL RESET_PASSWORD('".$password."',".$userId.",'".$hashCode."')");
                                        $result = $query->row();
                                        $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,$result->isError);
                                }
                        }
                }
                return $response;
        }
}
?>