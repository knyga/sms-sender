```
		'smser' => array(
			'class' => 'vendor.knyga.sms-sender.SmsSender',
			'options' => array(
				'login' => '',
				'password' => '',
				'sender' => ''
			),
			'serviceName' => 'smsc',
		),
```

```
	Yii::app()->smser->sendMessage('+380976290873', 'text');
```

```
	$message = Yii::app()->smser->renderMessage('//sms/hello', array('name' => 'Oleks Knigge'));
	Yii::app()->smser->sendMessage('+380976290873', $message);
```