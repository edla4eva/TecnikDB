<?php 

require_once 'connect.php';
    // works header("location:../home.html");
echo 'Update in progress....';
session_start(); /* Starts the session */

//--------------------------
$album_array=array();//create the array  
$tmp_array=array();//create the array  
$sql = 'SELECT * FROM admin_data WHERE id>1 AND id=2'; //.$id;
$results = $con->query($sql);
if ($results->num_rows > 0) {
    // output data of each row
    $count=-1;

    while($row = $results->fetch_assoc()) {
        //$family_info = $row["family_info"];
        $tmp_array=array("id"=>$row["album_info"], "path"=>$row["family_info"]);
        array_push($album_array,$tmp_array);  
        //array_push($album_array,$row["album_info"]); 
        $count=$count+1;
      }
} else {
    $first_name = 'Unknown';
}




//-------------------------



$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pass = test_input($_POST["inputPassword"]);
  $email = test_input($_POST["inputEmail"]);
 
  $id = test_input($_POST["id"]);
  $first_name = test_input($_POST["first_name"]);
  $sur_name = test_input($_POST["sur_name"]);
 
  echo $sur_name;







  /* Define username and associated password array */

  //id 	first_name 	sur_name 	title 	parent_idr 	has_children 	children_names 	dob 	year 	
//is_alive 	gender 	pix 	bio 	paternal_maternal 	dod 	other_names

//echo  'id, first_name, sur_name, title, parent_idr, has_children, ...'.$sur_name.', '.$first_name.', '.$title.', '.$parent_idr.', '.$has_children.', '.$children_names.', '.$dob;
// prepare and bind
//$stmt = $con->prepare('INSERT INTO requests (id, first_name, sur_name, title, parent_idr, has_children,     children_names, dob, `year`, is_alive, gender, pix, bio, paternal_maternal, dod, other_names) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
//                          $stmt->bind_param('', $first_name, $sur_name, $title, $parent_idr, $has_children, $children_names, $dob, $year, $is_alive, $gender, $pix, $bio, $paternal_maternal, $dod, $other_names);

//UPDATE `efamily` SET approved="0",  other_names="--" WHERE (`id`=1)
//$sql = 'INSERT INTO efamily (first_name, sur_name, title, parent_idr, has_children, children_names, dob, `year`, is_alive, gender, pix, bio, paternal_maternal, dod, other_names) VALUES ("'.$first_name.'", "'.$sur_name.'", "'.$title.'", "'.$parent_idr.'", "'.$has_children.'", "'.$children_names.'", "'.$dob.'", "'.$year.'", "'.$is_alive.'", "'.$gender.'", "'.$pix.'", "'.$bio.'", "'.$paternal_maternal.'", "'.$dod.'", "'.$other_names.'")';
$sql = 'UPDATE `efamily` SET first_name =' .$first_name. ', sur_name, title, parent_idr, has_children, children_names, dob, `year`, is_alive, gender, pix, bio, paternal_maternal, dod, other_names  
VALUES ("'.$first_name.'", "'.$sur_name.'", "'.$title.'", "'.$parent_idr.'", "'.$has_children.'", "'.$children_names.'", "'.$dob.'", "'.$year.'", "'.$is_alive.'", "'.$gender.'", "'.$pix.'", "'.$bio.'", "'.$paternal_maternal.'", "'.$dod.'", "'.$other_names.'")'.
'WHERE (id='.$id.');';


echo $sql."</br>";
 echo "\n";
 try
 {
  $result = $con->query($sql);
  echo $result."</br>";
 
  if ($result > 0) {
    //echo 'true' ;
    //echo "<span style='color:blue'>New records created successfully</span></br>";
    $msg="<span style='color:blue'>New records created successfully</span></br>";
    header("location:input-success.php"); //show success
  }else{
    $msg= '-1'; "<span style='color:red'>New records could not be added</span></br>";
    //echo "<span style='color:red'>New records could not be loaded</span></br>";
    header("location:../update.php?id=$id&msg=-1"); //show success
  }
  
 } catch (Exception $e) {
  error_log( 'Exception caught by eFamily App: '.$e->getMessage());
  header("location:../update.php?id=$id&msg=-1"); //show error
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