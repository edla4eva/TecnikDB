<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('CONNECTPATH', '');
require_once 'connect.php';

// session_start(); /* Starts the session */
// $msg="";
// $id="1";
// $username='';
// if (!isset( $_SESSION['UserData']['inputEmail'])) {
//  // header("location:admin-sign-in.php") ;
// } else {
//   if (isset($_GET["msg"])) $msg = $_GET["msg"];
//   if ($msg=="-1") $msg="Could not get record! Please check the inputs and try again </br>";
//   if (isset($_GET["id"])) $id = $_GET["id"];
//   if (isset($_SESSION['UserData']['inputEmail'])) $username=$_SESSION['UserData']['inputEmail'];
// }

$family_info="";
$other_info="";
$album_info="";
$news=""; $news_headline=""; $family_history="";

$sql = 'SELECT * FROM admin_data WHERE id=1';
$results = $con->query($sql);
if ($results->num_rows > 0) {
    // output data of each row
    $count=-1;
    while($row = $results->fetch_assoc()) {
        $family_info = $row["family_info"];
        $other_info = $row["family_history"];
        $news =  $row["news_info"];
        $news_headline =  $row["news_headline"];
        
        $family_history = $row["family_history"];
        $count=$count+1;
      }
} else {
    $first_name = 'Unknown';
}



$con->close(); //dont close yet

?>


