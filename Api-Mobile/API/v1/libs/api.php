<?php

class API{
	
	static function status($status){
		header('Content-type: application/json; charset=utf-8');
		header('HTTP/1.1 ' . $status);
	}

	static function response($response){
		echo json_encode(array("meta" => array("code" => 200, "error" => "succed"), "data" => $response), JSON_NUMERIC_CHECK);
	}

    static function error($code, $error){
        API::status($code);
        $json = array(
            'meta'=>array(
                'code'=>$code,
                'error'=>$error
            )
        );

        print json_encode($json);
    }
}