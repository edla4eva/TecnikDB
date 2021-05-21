<?php
//These three liines have already bbeen executed in get-bio
//defined('BASEPATH') OR exit('No direct script access allowed');
//define('CONNECTPATH', '');
//require_once 'connect.php';

//first get parent name
$sql = "SELECT * FROM efamily WHERE id=".$id;
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "<br> id: ". $row["id"]. " - Name: ". $row["first_name"]. " " . $row["sur_name"] . "<br>";
        $first_name = $row["first_name"];
        // $title = $row["title"];
        // $parent_idr = $row["parent_idr"];
        // $has_children = $row["has_children"];
        // $children_names = $row["children_names"];
        // $dob = $row["dob"];
        // $is_alive = $row["is_alive"];
        // $gender = $row["gender"];
        // $pix = $row["pix"];
        // $bio = $row["bio"];
        // $paternal_maternal = $row["paternal_maternal"];
        // $dod = $row["dod"];
        // $other_names = $row["other_names"];
        // $sur_name = $row["sur_name"];
        // $efamily_id = $row["id"];
      }
} else {
    $first_name = 'Unknown';
}

$sql = "SELECT * FROM efamily WHERE parent_idr=".$id;
$result = $con->query($sql);



echo '<div id="json-list-branch">';
            
    echo  ' <ul id="myULSearch" class="list-group animate__animated animate__flash animate__delay-1s">';
    echo     '<li class="list-group-item active"><a href="#">1</a><span>'.$first_name.' Family Members</span>  <span id="default_id" style=""><?php echo "Your ID:".$id;?></span></li>'; 

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
        $efamily_id = $row["id"];
        echo '<li class="list-group-item d-flex justify-content-between  align-items-center"><a href="tree.php?id='.$efamily_id.'" id="'.$efamily_id.'">'.$first_name.'</a><a href="update.php?id='.$efamily_id.'"> <span class="badge badge-primary badge-pill">update</span></a>'.'<a href="svr/me.php?id='.$id.'&efamily_id='.$efamily_id.'"> <span class="badge badge-primary badge-pill">This is Me</span></a> </li>';


    }
} else {
    echo '<li class="list-group-item d-flex justify-content-between  align-items-center">No immediate family members</a> </li>';

}

$con->close();

echo '</ul>';
echo '</div>';
?>


