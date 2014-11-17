<?php

namespace SmsSender;

use SmsSender\Services\SmscService;

class SmsSenderServiceFactory {

	public static function get($name, $options = array()) {
		switch($name) {
			case SmsSenderList::SMSC: return new SmscService($options);
		}

		return null;
	}
}