<?php

if(strpos(getenv("DOCUMENT_ROOT"),"wamp") !== false)
{
	$_config['database'] = array(
	'driver' 		=> "pdo_mysql",
	'host' 			=> "localhost",
	'dbname' 		=> "birdibeuk",
	'user' 			=> "root",
	'password' 		=> "",
	'charset'		=> "utf8",
	'driverOptions' => array(1002 => 'SET NAMES utf8')
	//'options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
	);
}
else
{
	/*SECRET*/
}

