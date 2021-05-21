<?php
defined('CONFIGPATH') OR exit('No direct CONF script access allowed');
/*
|--------------------------------------------------------------------------
| Base Site URL
|--------------------------------------------------------------------------
| URL to your CodeIgniter root. Typically this will be your base URL,
| WITH a trailing slash:
*/
$config['base_url'] = 'http://localhost/efamily/app/admin';
$config['base_url'] = 'https://efamily-crimpsoft.000webhostapp.com/admin';
/*
|--------------------------------------------------------------------------
| Default Character Set
|--------------------------------------------------------------------------
|
| This determines which character set is used by default in various methods
| that require a character set to be provided.
|
| See http://php.net/htmlspecialchars for a list of supported charsets.
|
*/
$config['charset'] = 'UTF-8';
/*
|--------------------------------------------------------------------------
| Database
|--------------------------------------------------------------------------
| This determines the db settings
|
*/
$active_group = 'default';
$query_builder = TRUE;

$config_db_default = array(
	'dsn'	=> '',
	'hostname' => 'localhost', //localhost
	'username' => 'id14008062_admin', //'id14008062_admin id14008062_admin',
	'password' =>  'nsTSb1yA+H}4Bn_1WEBHOST', //'',
	'database' => 'id14008062_efamily', //efamily
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$config_db_dev = array(
	'dsn'	=> '',
	'hostname' => 'localhost', //localhost
	'username' => 'root',
	'password' => '',
	'database' => 'efamily', //efamily
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
?>