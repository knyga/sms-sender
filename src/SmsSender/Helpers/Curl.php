<?php

namespace SmsSender\Helpers;

/**
 * Description of Curl
 *
 * @author anton_lyubch
 */
class Curl
{
	public static function send($url, $method='GET', $data=array())
	{
		if($method==='GET')
			$url.=(count($data)>0)?'?'.http_build_query($data):'';
		else
			$data=json_encode($data);

		$ch=curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);
		switch($method){
		    case "POST":
		    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		    break;
		case "GET":
		    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		    break;
		case "PUT":
		    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		default:
		    break;
		}
//		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
		$content = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		return array(
			'http_code' => $http_code,
			'content' => $content,
		);
	}
}
