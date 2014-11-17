<?php

namespace SmsSender;

class SmsSender extends \CApplicationComponent implements SmsSenderServiceInterface {
	public $serviceName = '';
	public $options = array();

	protected $service = null;

	public function init() {
		$this->service = SmsSenderServiceFactory::get($this->serviceName, $this->options);
	}

	public function sendMessage($phones, $message) {
		return $this->service->sendMessage($phones, $message);
	}

	public function setOptions($options) {
		return $this->service->setOptions($options);
	}

	public function renderMessage($view, array $data = array()) {
        $controller = new \CController('SmsSender');
        $viewPath = \Yii::app()->getBasePath() . DIRECTORY_SEPARATOR . 'views';
        $viewFile   = $controller->resolveViewFile($view, $viewPath, $viewPath);
        $body = $controller->renderInternal($viewFile, $data, true);

        return $body;
	}
}