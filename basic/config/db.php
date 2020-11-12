<?php

$user_data = require __DIR__ . '/db/user_data_db.php';

return [

	"servername" => $user_data["servername"],
	"db_name" => $user_data["db_name"],	
	"username" => $user_data["username"],
	"password" => $user_data["password"],
	"port" => $user_data["port"],
	"charset" => "utf8",
	"flags" => MYSQLI_CLIENT_SSL,

	/*
    'ssl_set' => [
        'MYSQL_SSL_KEY'    =>				'/etc/php/mysql_ssl/client-key.pem',
        'MYSQL_SSL_CERT'   =>				'/etc/php/mysql_ssl/client-cert.pem',
        'MYSQL_SSL_CA'     =>				'/etc/php/mysql_ssl/ca.pem',
        'MYSQL_SSL_CAPATH' => 				'',
        'MYSQL_SSL_CIPHER' => 				'',
    ],
    */	
];
