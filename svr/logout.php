<?php
define('CONNECTPATH', '');
//defined('BASEPATH') OR exit('No direct script access allowed');

try {
    require_once 'connect.php';
}  catch(Exception $e) {
    //header("location:fancy-error.php?msg=db");
    require_once 'fancy-error.php'; //also works
    exit;
 }


session_start(); /* Starts the session */
if(isset($_SESSION['UserData']['inputEmail'])){
    $id=$_SESSION['UserData']['id'];
    $sql = 'UPDATE users SET `status`=0 WHERE (username="'.$id.'");'; 
    try{
        $result = $con->query($sql);  
        }
        catch (Exception $ex)
        {

        }
    session_unset();
    session_destroy();
}
header("location:../index.php");
exit;
?>