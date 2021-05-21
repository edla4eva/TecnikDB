<?php
$DATABASE_HOST = 'localhost';  //
$DATABASE_USER = 'descxggb_admin';  //
$DATABASE_PASS = 'o}4A9Dppv#4vEOBADAN';  //
$DATABASE_NAME = 'descxggb_efamily'; 
try{
	$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME); // Try and connect using the info above.
	$db=new PDO('mysql:host='.$DATABASE_HOST.';dbname='.$DATABASE_NAME.';charset=utf8', $DATABASE_USER, $DATABASE_PASS);  
} catch (PDOException $e) {
	error_log('Connection failed: ' . $e->getMessage()); //, 3, "/tmp/efamilyerrors.log"); //log it
	throw $e; //rethrow it	
}
?>