<?php

namespace SmsSender\Tests;

use SmsSender\SmsSender;
use SmsSender\Serivces\SmscService;

/**
 * Class SmsServiceTest
 *
 * @package SmsSender\Tests
 */
class SmsServiceTest extends \PHPUnit_Framework_TestCase
{
	protected $service = null;

    protected function setUp()
    {
		$this->service = new SmsSender();
		$this->service->options = array(
			'login' => 'iprice',
			'password' => 'iprice-shop',
			'sender' => ''
			);
		$this->service->serviceName = 'smsc';
		$this->service->init();
    }

    public function testShow()
    {
        $this->service->sendMessage('+380976290873', 'text');
    }

}
