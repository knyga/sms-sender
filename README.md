```php
	'smser' => array(
		'class' => 'vendor.knyga.sms-sender.SmsSenderComponent',
		'options' => array(
			'login' => '',
			'password' => '',
			'sender' => ''
		),
		'serviceName' => 'smsc',
	),
```

```php
	Yii::app()->smser->sendMessage('+380976290873', 'text');
```

```php
	Yii::app()->smser->setOptions(array(
		'login' => '',
		'password' => '',
		'sender' => ''
	));
```

```php
	$message = Yii::app()->smser->renderMessage('//sms/hello', array('name' => 'Oleks Knigge'));
	Yii::app()->smser->sendMessage('+380976290873', $message);
```