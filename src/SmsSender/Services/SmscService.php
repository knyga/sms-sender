<?php

namespace SmsSender\Services;

use SmsSender\SmsSenderServiceInterface;
use SmsSender\Helpers\Curl;

class SmscService implements SmsSenderServiceInterface {
	protected $options = array();
	protected $login = '';
	protected $password = '';
	protected $sender = '';

	public function __construct($options) {
		$this->setOptions($options);
	}

	public function setOptions($options) {
		$this->options = $options;

		if(isset($this->options['login'])) {
			$this->login = $this->options['login'];
		}

		if(isset($this->options['password'])) {
			$this->password = $this->options['password'];	
		}
		
		if(isset($this->options['sender'])) {
			$this->sender = $this->options['sender'];
		}
	}

	public function sendMessage($phones, $message) {
		return Curl::send('http://smsc.ru/sys/send.php', 'GET', array(
			'login'=>$this->login,
			'psw'=>$this->password, //OR `md5(password)`.
			'sender'=>$this->sender,
			'fmt'=>3, // output in json format
			'charset'=>'utf-8',
			'phones'=>$phones,
			'mes'=>$message,
		));
	}
}