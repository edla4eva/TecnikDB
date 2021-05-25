<?php
define('CONFIGPATH', '');
defined('CONNECTPATH') OR exit();
$DATABASE_HOST = "descsfww@localhost"; //descsfww@localhost 
$DATABASE_USER = 'descsfww_descsfww_tecnikdb_user'; //descsfww_descsfww_tecnikdb_user
$DATABASE_PASS = 'descsfww_tecnikdb97h702)7e(ggs3vsSITETECCHDB';
$DATABASE_NAME = 'descsfww_tecnikdb'; //'descsfww_tecnikdb'
try{
	$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME); // Try and connect using the info above.
	$db=new PDO('mysql:host='.$DATABASE_HOST.';dbname='.$DATABASE_NAME.';charset=utf8', $DATABASE_USER, $DATABASE_PASS);  
} catch (PDOException $e) {
	error_log('Connection failed: ' . $e->getMessage()); //, 3, "/tmp/efamilyerrors.log"); //log it
	throw $e; //rethrow it	
}
?>