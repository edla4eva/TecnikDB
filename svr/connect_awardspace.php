<?php
$DATABASE_HOST = 'fdb29.awardspace.net';  //localhost:3306 Change this to your connection info.
$DATABASE_USER = ' 3515883_efamily';  //id14008062_admin
$DATABASE_PASS = '6yyetr68hgafs437g7dhAWFINAL';  //nsTSb1yA+H}4Bn_1WEBHOST
$DATABASE_NAME = '3515883_efamily'; 
try{
	$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME); // Try and connect using the info above.
	$db=new PDO('mysql:host='.$DATABASE_HOST.';dbname='.$DATABASE_NAME.';charset=utf8', $DATABASE_USER, $DATABASE_PASS);  
} catch (PDOException $e) {
	error_log('Connection failed: ' . $e->getMessage()); //, 3, "/tmp/efamilyerrors.log"); //log it
	throw $e; //rethrow it	
}
?>