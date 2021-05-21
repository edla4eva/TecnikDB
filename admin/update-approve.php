<?php 
require_once 'connect.php';
session_start(); /* Starts the session */
$id=1;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $id = test_input($_GET["id"]);

//UPDATE `efamily` SET approved="0",  other_names="--" WHERE (`id`=1)
//$sql = 'INSERT INTO efamily (first_name, sur_name, title, parent_idr, has_children, children_names, dob, `year`, is_alive, gender, pix, bio, paternal_maternal, dod, other_names) VALUES ("'.$first_name.'", "'.$sur_name.'", "'.$title.'", "'.$parent_idr.'", "'.$has_children.'", "'.$children_names.'", "'.$dob.'", "'.$year.'", "'.$is_alive.'", "'.$gender.'", "'.$pix.'", "'.$bio.'", "'.$paternal_maternal.'", "'.$dod.'", "'.$other_names.'")';
$sql = 'UPDATE `efamily` SET approved = 1 WHERE (id='.$id.');';

 try
 {
  $result = $con->query($sql);
 
  if ($result > 0) {
    //echo 'true' ;
    //echo "<span style='color:blue'>New records created successfully</span></br>";
    $msg="<span style='color:blue'>New records created successfully</span></br>";
    header("location:approve.php"); //show success
  }else{
    $msg= '-1'; "<span style='color:red'>New records could not be added</span></br>";
    //echo "<span style='color:red'>New records could not be loaded</span></br>";
    header("location:approve.php?id=$id&msg=-1"); //show success
  }
  
 } catch (Exception $e) {
  error_log( 'Exception caught by eFamily App: '.$e->getMessage());
  header("location:approve.php?id=$id&msg=-1"); //show error
 }


} //end if



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>