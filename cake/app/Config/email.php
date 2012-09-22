<?php
//http://book.cakephp.org/1.3/en/view/1290/Sending-A-Message-Using-SMTP
class EmailConfig {

	public $default = array(
		'transport' => 'Mail',
		'from' => 'AtiWebApps@yahoo.com',
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);
	
	//Configuración para mandar correo
	public $email = array(
    		'port' => 465,
    		'timeout' => 30,
		'host' => 'ssl://smtp.mail.yahoo.com',
    		'username' => 'AtiWebApps@yahoo.com',
    		'password' => '12345678',
    		'transport' => 'Smtp'
	);

}

