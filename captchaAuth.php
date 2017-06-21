<?php

/*

Recaptcha library including Curl functions


*/

class Recaptcha {
	
	private $secret = "jshfjashfuogbaobfahfsduo9230";//fake key for demo purpose
	
	public function check()
	{
		$code = $_POST['g-recaptcha-response'];
		$url = "https://www.google.com/recaptcha/api/siteverify?secret=".$this->secret."&response=".$code."&remoteip=".$_SERVER['REMOTE_ADDR'];
		
		$response = $this->get($url);

		$resp_a = json_decode($response, true);
		
		return (isset($resp_a['success']) ? $resp_a['success'] : false);
	}
	
    private function get($url) {
        $curl_handle = curl_init($url);

        curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($curl_handle,CURLOPT_TIMEOUT, 5);

        $return_data = curl_exec($curl_handle);


        curl_close($curl_handle);

        return $return_data;
    }

    private function post($url,$data) {
        $curl_handle = curl_init($url);

        curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,5);
        curl_setopt($curl_handle,CURLOPT_TIMEOUT, 5);
        curl_setopt($curl_handle,CURLOPT_POST, true);
        curl_setopt($curl_handle,CURLOPT_POSTFIELDS, $data);

        $return_data = curl_exec($curl_handle);


        curl_close($curl_handle);

        return $return_data;
    }
}

?>