<?php


return [

	'app' => [
		"lang" => "en",
		"dbs" => [
			"db" => "/../config/db.php",
		],		
		//'error_log' => '/var/log/php/php_errors.log'
		'error_log' => __DIR__ . '/../runtime/logs/error.log',

		"authentication" => [		
			"cookies" => [
				"secure" => false,
				"httponly" => true,
			    "samesite" => "strict",			
			],
		],
	],

	'debug_panel' => [
		'panel_url' => 'AdFGFggGHhhHHyhhhbfi9878IK/debug_panhel',
		'allow_ips' => ['109.87.54.192', '127.0.0.1', '::1'],
	],

	'models' => [
		//'error_log' => '/var/log/php/errors_validation.log'
		'error_log' => __DIR__ . '/../runtime/logs/error_validation.log'
	],

	'logger' => [
		'default' => [
			'init' => true
		]
	]
	

];