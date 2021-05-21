<?php 
define('CONNECTPATH', '');
require_once 'connect.php';
session_start(); /* Starts the session */
$gender=""; $okay=0;
  try{
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pass = test_input($_POST["inputPassword"]);
    $email = test_input($_POST["inputEmail"]);
  
    $id = test_input($_POST["id"]);
    $first_name = test_input($_POST["first_name"]);
    $sur_name = test_input($_POST["sur_name"]);
    $title = test_input($_POST["title"]);
    $parent_idr = test_input($_POST["parent_idr"]);
    $has_children = test_input($_POST["has_children"]);
    $children_names = test_input($_POST["children_names"]);
    $dob = test_input($_POST["dob"]);
   
    $year=date('Y', strtotime($dob));
    $is_alive = test_input($_POST["is_alive"]);
    if (isset($_POST["gender"])) $gender = test_input($_POST["gender"]);
    if (isset($_POST["male"])) $gender = "male";
    if (isset($_POST["female"])) $gender = "female";
    // echo "dob  - ".$dob." <br>";
    // echo "year  - ".$year." <br>";
    // echo "gender  - ".$gender." <br>";
    $pix = test_input($_POST["pix"]);
    $bio = test_input($_POST["bio"]);
    $paternal_maternal = test_input($_POST["paternal_maternal"]);
    $dod = test_input($_POST["dod"]);
    $other_names = test_input($_POST["other_names"]);

  //UPDATE `efamily` SET `sur_name` = 'bbb', `title` = 'mr', `children_names` = 'unknown' WHERE `efamily`.`id` = 343; 
  // prepare and bind
  //$stmt = $con->prepare('INSERT INTO requests (id, first_name, sur_name, title, parent_idr, has_children,     children_names, dob, `year`, is_alive, gender, pix, bio, paternal_maternal, dod, other_names) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
  //                          $stmt->bind_param('', $first_name, $sur_name, $title, $parent_idr, $has_children, $children_names, $dob, $year, $is_alive, $gender, $pix, $bio, $paternal_maternal, $dod, $other_names);
  $sql = 'UPDATE `efamily` SET first_name ="' .$first_name. '", sur_name="' .$sur_name. '", title="' .$title. '", parent_idr="' .$parent_idr. '", has_children="' .$has_children. '", children_names="' .$children_names. '", dob="' .$dob. '", `year`="' .$year. '", is_alive="' .$is_alive. '", gender="' .$gender. '", pix="' .$pix. '", bio="' .$bio. '", paternal_maternal="' .$paternal_maternal. '", dod="' .$dod. '", other_names="' .$other_names. '" ';  
 
  $sql = $sql.'WHERE (id='.$id.');';
  //echo $sql;
  $okay=1;
} //end if
}catch(Exception $e1){
  $okay=0;
  }



  try
  {
   $result=-1;
   if ($okay==1) $result = $con->query($sql); 
    if ($result > 0) {
      //echo "<span style='color:blue'>New records created successfully</span></br>";
      $msg="<span style='color:blue'>New records created successfully</span></br>";
      //header("location:input-success.php"); //show success
      exit;
    }else{
      $msg= '-1'; "<span style='color:red'>New records could not be added</span></br>";
      //echo "<span style='color:red'>New records could not be loaded</span></br>";
      //header("location:../update.php?id=$id&msg=-1"); //show error
      exit;
    }
    
  } catch (Exception $e) {
    //echo'Exception caught by eFamily App: '.$e->getMessage();
    error_log( 'Exception caught by eFamily App: '.$e->getMessage());
    //header("location:../update.php?id=$id&msg=-1"); //show error
  }







/* Update Users table for those claiming a record in efamily tabe is theirs */
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>