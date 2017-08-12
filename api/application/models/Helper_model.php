<?php 
class Helper_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
        
        public function getLeftSideMenu($parameters){
                $i = 0;
                $k = 0;
                $mandatoryParameters = array("accessToken","userId"); 
                foreach ($mandatoryParameters as $mandatoryParameter) {
                        if(!array_key_exists($mandatoryParameter,$parameters)){
                                $k++;
                        }
                } 
                if($k>0){
                        $response = $this->globalfunctions->returnMessage(1000,"Geçersiz istek. Zorunlu parametre eksik.",true);
                }else{
                        $availableParameters = array("accessToken","userId");
                        foreach ($parameters as $key => $parameter) {
                                if(!in_array($key,$availableParameters)){
                                        $i++;
                                }
                        }
                        if($i>0){
                                $response = $this->globalfunctions->returnMessage(1001,"Geçersiz istek. Bilinmeyen parametre girdiniz.",true);
                        }else{
                                $accessToken = $parameters["accessToken"];
                                $userId = $parameters["userId"];
                                if(!is_numeric($userId)){
                                        $response = $this->globalfunctions->returnMessage(1002,"User Id parametresi numeric olmalıdır.",true);
                                }else{
                                        $query = $this->db->query("CALL GET_LEFT_SIDE_MENU('".$accessToken."',".$userId.")");
                                        $result = $query->row();
                                        if(@$result->isError == 1){
                                                $response = $this->globalfunctions->returnMessage($result->responseCode,$result->responseMessage,@$result->isError);
                                        }else{
                                                $result = $query->result_array();
                                                foreach($result as $key => &$item) {
                                                    $items[$item['MenuID']] = &$item;
                                                    $items[$item['MenuID']]['children'] = array();
                                                }
                                                foreach($result as $key => &$item){
                                                    if($item['ParentId'] && isset($items[$item['ParentId']]))
                                                        $items [$item['ParentId']]['children'][] = &$item;
                                                }
                                                $i = 0;

                                                foreach($result as $key => &$item) {
                                                    if($item['ParentId'] && isset($items[$item['ParentId']])) unset($result[$key]); }
                                                        foreach ($result as $row) { $data[$i++] = $row; 
                                                }
                                                $response["result"] = true;
                                                $response["resultCode"] = 0;
                                                $response["message"] = $data;
                                        }
                                }
                        }
                }
                return $response;
        }
}
?>