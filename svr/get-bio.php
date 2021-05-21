<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('CONNECTPATH', '');
require_once 'connect.php';

$efamily_id=0;
$bio="";
//first get parent name
$sql = "SELECT * FROM efamily WHERE id=".$id;
$results = $con->query($sql);
if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {
        echo $row["first_name"]." ".$row["sur_name"];
        $first_name = $row["first_name"];
        $title = $row["title"];
        $parent_idr = $row["parent_idr"];
        $has_children = $row["has_children"];
        $children_names = $row["children_names"];
        $dob = $row["dob"];
        $is_alive = $row["is_alive"];
        $gender = $row["gender"];
        $pix = $row["pix"];
        $bio = $row["bio"];
        $paternal_maternal = $row["paternal_maternal"];
        $dod = $row["dod"];
        $other_names = $row["other_names"];
        $sur_name = $row["sur_name"];
        $efamily_id = $row["id"];
      }
} else {
    $first_name = 'Unknown';
    echo 'Unknown';

}


//$con->close(); //dont close yet

?>


