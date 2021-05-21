<?php 
require_once 'connect.php'; // TODO: REMOVE: works header("location:../home.html");
session_start(); /* Starts the session */
$pass2 = $pass = $oldpass2 ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pass2 = test_input($_POST["inputPassword2"]);
  $pass = test_input($_POST["inputPassword"]);
  $oldpass2 = test_input($_POST["OldinputPassword"]);

//UPDATE `efamily` SET approved="0",  other_names="--" WHERE (`id`=1)
//$sql = 'INSERT INTO efamily (first_name, sur_name, title, parent_idr, has_children, children_names, dob, `year`, is_alive, gender, pix, bio, paternal_maternal, dod, other_names) VALUES ("'.$first_name.'", "'.$sur_name.'", "'.$title.'", "'.$parent_idr.'", "'.$has_children.'", "'.$children_names.'", "'.$dob.'", "'.$year.'", "'.$is_alive.'", "'.$gender.'", "'.$pix.'", "'.$bio.'", "'.$paternal_maternal.'", "'.$dod.'", "'.$other_names.'")';
$sql = 'UPDATE `users` SET password=' .$pass.  
'WHERE (username='.$username.') AND (password='.$pass.');';

// echo $sql."</br>";
//  echo "\n";
 try
 {
  if (pass!==pass2) { header("location:../password.php?msg=-1");}
  $result = $con->query($sql);
  echo $result."</br>";
 
  if ($result > 0) { 
    //echo 'true' ;
    //echo "<span style='color:blue'>New records created successfully</span></br>";
    $msg="<span style='color:blue'>Password changed successfully</span></br>";
    header("location:../password.php?msg=1"); //show success
  }else{
    $msg= '-1'; //"<span style='color:red'>Password could not be changed</span></br>";
    //echo "<span style='color:red'>New records could not be loaded</span></br>";
    header("location:../password.php?msg=-1"); //show success
  }
  
 } catch (Exception $e) {
  error_log( 'Exception caught by eFamily App: '.$e->getMessage());
  header("location:../update.php?id=$id&msg=-1"); //show error
 }


 

} //end if



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>