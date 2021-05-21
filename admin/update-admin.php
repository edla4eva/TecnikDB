<?php 
require_once 'connect.php';
    // works header("location:../home.html");
echo 'Update in progress....';
session_start(); /* Starts the session */

$name = $email = $gender = $comment = $website= $family_history =$album_info= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $family_history = test_input($_POST["family_history"]);
  $album_info = test_input($_POST["album_info"]);
  $id=1;
//UPDATE `efamily` SET approved="0",  other_names="--" WHERE (`id`=1)
//$sql = 'INSERT INTO efamily (first_name, sur_name, title, parent_idr, has_children, children_names, dob, `year`, is_alive, gender, pix, bio, paternal_maternal, dod, other_names) VALUES ("'.$first_name.'", "'.$sur_name.'", "'.$title.'", "'.$parent_idr.'", "'.$has_children.'", "'.$children_names.'", "'.$dob.'", "'.$year.'", "'.$is_alive.'", "'.$gender.'", "'.$pix.'", "'.$bio.'", "'.$paternal_maternal.'", "'.$dod.'", "'.$other_names.'")';
$sql = 'UPDATE `admin_data` SET family_history =' .$family_history. 'WHERE (id='.$id.');';


//echo $sql."</br>";  echo "\n";
 try
 {
  $result = $con->query($sql);
 // echo $result."</br>";
 
  if ($result > 0) {
    //echo 'true' ;
    //echo "<span style='color:blue'>New records created successfully</span></br>";
    $msg="<span style='color:blue'>New records created successfully</span></br>";
    header("location:input-success.php"); //show success
  }else{
    $msg= '-1'; "<span style='color:red'>New records could not be added</span></br>";
    //echo "<span style='color:red'>New records could not be loaded</span></br>";
    header("location:../admin.php?id=$id&msg=-1"); //show success
  }
  
 } catch (Exception $e) {
  error_log( 'Exception caught by eFamily App: '.$e->getMessage());
  header("location:../admin.php?id=$id&msg=-1"); //show error
 }


} //end if



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>