<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
// define('CONNECTPATH', '');
// require_once 'connect.php';


$sql = "SELECT * FROM efamily WHERE id=".$id;
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "<br> id: ". $row["id"]. " - Name: ". $row["first_name"]. " " . $row["sur_name"] . "<br>";
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

    }
} else {
   // echo "0 results";
}

$con->close();
?>

