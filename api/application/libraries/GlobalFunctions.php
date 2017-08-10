<?php defined('BASEPATH') OR exit('No direct script access allowed');
class GlobalFunctions {

    public function returnMessage($code,$message,$isError)
	{
		$result = true;
		$resultCode = 0;
		if($isError){
			$result = false;
			$resultCode = $code;
		}
		$response["result"] = $result;
		$response["resultCode"] = $resultCode;
		$response["message"] = $message;
		return $response;
	}

}