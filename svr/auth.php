<?php
define('BASEPATH', ''); // Path to the system directory
  session_start();
  if (!isset( $_SESSION['UserData']['inputEmail'])) {
    header("location:sign-in.php") ;
    exit;
  } else {
    $usernamePara='('.$_SESSION['UserData']['inputEmail'].')';
    $username=$_SESSION['UserData']['inputEmail'];
    $id=1;
    if (isset( $_SESSION['UserData']['id'])) $id=$_SESSION['UserData']['id'];
  }
?>