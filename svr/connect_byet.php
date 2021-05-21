<?php
$DATABASE_HOST = 'sql210.byethost.com';  //localhost:3306 Change this to your connection info.
$DATABASE_USER = 'b13_26314943';  //id14008062_admin
$DATABASE_PASS = '1tl3ola8@BYET';  //nsTSb1yA+H}4Bn_1WEBHOST
$DATABASE_NAME = 'b13_26314943_efamily'; 
try{
	$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME); // Try and connect using the info above.
	$db=new PDO('mysql:host='.$DATABASE_HOST.';dbname='.$DATABASE_NAME.';charset=utf8', $DATABASE_USER, $DATABASE_PASS);  
} catch (PDOException $e) {
	error_log('Connection failed: ' . $e->getMessage()); //, 3, "/tmp/efamilyerrors.log"); //log it
	throw $e; //rethrow it	
}
?>