<?php

namespace SmsSender;

interface SmsSenderServiceInterface {
	public function sendMessage($phones, $message);
}