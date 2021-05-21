<?php 
define('BASEPATH', '');
define('CONNECTPATH', '');
require_once 'connect.php';
session_start(); /* Starts the session */

$name = $email = $gender = $comment = $website = "";
echo 'test';
if ($_SERVER["REQUEST_METHOD"] == "GET") {

  $email = test_input($_POST["inputEmail"]);
  $id = test_input($_GET["id"]);
  $efamily_id = test_input($_GET["efamily_id"]);
//$sql = 'INSERT INTO efamily (first_name, sur_name, title, parent_idr, has_children, children_names, dob, `year`, is_alive, gender, pix, bio, paternal_maternal, dod, other_names) VALUES ("'.$first_name.'", "'.$sur_name.'", "'.$title.'", "'.$parent_idr.'", "'.$has_children.'", "'.$children_names.'", "'.$dob.'", "'.$year.'", "'.$is_alive.'", "'.$gender.'", "'.$pix.'", "'.$bio.'", "'.$paternal_maternal.'", "'.$dod.'", "'.$other_names.'")';
$sql = 'UPDATE `users` SET efamily_id =' .$efamily_id. 'WHERE (user_id='.$id.');';
//TODO: bring it up for approvals
//$stmt = $con->prepare('INSERT INTO requests (id, first_name, sur_name, title, parent_idr, has_children,     children_names, dob, `year`, is_alive, gender, pix, bio, paternal_maternal, dod, other_names) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
//                          $stmt->bind_param('', $first_name, $sur_name, $title, $parent_idr, $has_children, $children_names, $dob, $year, $is_alive, $gender, $pix, $bio, $paternal_maternal, $dod, $other_names);


 try
 {
  $result = $con->query($sql);

  if ($result > 0) {
    $msg="<span style='color:blue'>New records created successfully</span></br>";
    echo $msg;
    header("location:input-success.php"); //show success
    exit;
  }else{
    $msg= '-1'; "<span style='color:red'>New records could not be added</span></br>";
    header("location:../tree.php?id=$id&msg=-1"); //show success
    exit;
  }
  
 } catch (Exception $e) {
  error_log( 'Exception caught by eFamily App: '.$e->getMessage());
  header("location:fancy-error.php?id=$id&msg=-1"); //show error
 }


 


} //end if


/* Update Users table for those claiming a record in efamily tabe is theirs */
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>