<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('CONNECTPATH', '');
require_once 'connect.php';

$efamily_id=0;
$bio="";
$id=0; //first generation

//get counts
$count_all=0; $count_maternal=0;$count_paternal=0;$count_sons=0;$count_daughters=0;
$count_first_gen=0;$count_second_gen=0; $count_not_approved=0;
$sql = "SELECT * FROM efamily WHERE parent_idr>0 AND approved=1";
$results = $con->query($sql);
$count_all=$results->num_rows;

$sql = "SELECT * FROM efamily WHERE parent_idr>0 AND approved=0";
$results = $con->query($sql);
$count_not_approved=$results->num_rows;
$sql = 'SELECT * FROM efamily WHERE paternal_maternal= "maternal" AND approved=1';
$results = $con->query($sql);
$count_maternal=$results->num_rows;
$count_paternal=$count_all-$count_maternal;

$sql = 'SELECT * FROM efamily WHERE parent_idr=1 AND approved=1'; //first get parent name
$results = $con->query($sql);
if ($results->num_rows > 0) $count_first_gen=$results->num_rows;

$sql = 'SELECT * FROM efamily WHERE gender="male" AND approved=1'; //sons
$results = $con->query($sql);
if ($results->num_rows > 0) $count_sons=$results->num_rows;
$count_daughters=$count_all-$count_sons;

//first get parent name
$first_gen_family_list="";
$first_gen_family_table="";
$sql = 'SELECT * FROM efamily WHERE parent_idr=1 AND approved=1 ORDER BY dob';
$results = $con->query($sql);

if ($results->num_rows > 0) {
    // output data of each row
    $first_gen_family_list=$first_gen_family_list.   ' <ul id="myULSearch" class="list-group animate__animated animate__backInRight animate__delay-1s">';
    $first_gen_family_list=$first_gen_family_list.      '<li class="list-group-item active"><a href="#">1</a><span> First Generation Family Members</span>  <span id="default_id" style=""><?php echo "Your ID:".$id;?></span></li>'; 

    $first_gen_family_table=$first_gen_family_table.  '<div class="table-responsive">';
    $first_gen_family_table=$first_gen_family_table.  ' <table class="table table-striped">';
    $first_gen_family_table=$first_gen_family_table.  '<thead class="thead-inverse"> ';
    $first_gen_family_table=$first_gen_family_table.  ' <tr>';
    $first_gen_family_table=$first_gen_family_table.  ' <th>Name</th>';
    $first_gen_family_table=$first_gen_family_table.  ' <th>Surname</th>';
    $first_gen_family_table=$first_gen_family_table.  ' <th>Gender</th>';
    $first_gen_family_table=$first_gen_family_table.  ' <th>Date of Birth</th>';
    $first_gen_family_table=$first_gen_family_table.  ' </tr>';
    $first_gen_family_table=$first_gen_family_table.  '</thead> ';
    $first_gen_family_table=$first_gen_family_table.  ' <tbody>';

    $count=-1;
    while($row = $results->fetch_assoc()) {
        $first_gen_family_list=$first_gen_family_list. '<li class="list-group-item d-flex justify-content-between  align-items-center">'.$row["first_name"].'</li>';
        //echo '<li class="list-group-item d-flex justify-content-between  align-items-center"><a href="tree.php?id='.$efamily_id.'" id="'.$efamily_id.'">'.$first_name.'</a><a href="update.php?id='.$efamily_id.'"> <span class="badge badge-primary badge-pill">update</span></a>'.'<a href="me.php?id='.$efamily_id.'"> <span class="badge badge-primary badge-pill">This is Me</span></a> </li>';
        $count=$count+1;
        $first_gen_family_table=$first_gen_family_table.  '<tr>';
        $first_gen_family_table=$first_gen_family_table.  ' <td>'.$row["first_name"].'</td>';
        $first_gen_family_table=$first_gen_family_table.  ' <td>'.$row["sur_name"].'</td>';
        $first_gen_family_table=$first_gen_family_table.  ' <td>'.$row["gender"].'</td>';
        $first_gen_family_table=$first_gen_family_table.  ' <td>'.$row["dob"].'</td>';
         $first_gen_family_table=$first_gen_family_table.  '</tr>';
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
      $first_gen_family_list=$first_gen_family_list.   ' </ul>';
      //close table
      $first_gen_family_table=$first_gen_family_table.  ' </tr>';
      $first_gen_family_table=$first_gen_family_table.  ' </tbody>';
      $first_gen_family_table=$first_gen_family_table.  ' </table>';
      $first_gen_family_table=$first_gen_family_table.  ' </div>';
} else {
    $first_name = 'Unknown';
    echo 'Unknown';

}


//------------------contact---------------------
$sql = 'SELECT * FROM `efamily_contact` ORDER BY `efamily_contact`.`contact_date` DESC;';
$results = $con->query($sql);

$contact_table="";
if ($results->num_rows > 0) {
    $contact_table=$contact_table.  '<div class="table-responsive">';
    $contact_table=$contact_table.  ' <table class="table table-striped">';
    $contact_table=$contact_table.  '<thead class="thead-inverse"> ';
    $contact_table=$contact_table.  ' <tr>';
    $contact_table=$contact_table.  ' <th>Email</th>';
    $contact_table=$contact_table.  ' <th>Phone</th>';
    $contact_table=$contact_table.  ' <th>Contact Info</th>';
    $contact_table=$contact_table.  ' <th>Date</th>';
    $contact_table=$contact_table.  ' </tr>';
    $contact_table=$contact_table.  '</thead> ';
    $contact_table=$contact_table.  ' <tbody>';
    // output data of each row
    $count=-1;
    while($row = $results->fetch_assoc()) {
        $count=$count+1;
        if (($count % 2)==0) $contact_table=$contact_table.  '<tr>';
        $contact_table=$contact_table.  ' <td>'.$row["email"].'</td>';
        $contact_table=$contact_table.  ' <td>'.$row["phone"].'</td>';
        $contact_table=$contact_table.  ' <td>'.$row["contact_info"].'</td>';
        $contact_table=$contact_table.  ' <td>'.$row["contact_date"].'</td>';
        if (($count % 2)==0) $contact_table=$contact_table.  '</tr>';
      }
            //close table
            $contact_table=$contact_table.  ' </tr>';
            $contact_table=$contact_table.  ' </tbody>';
            $contact_table=$contact_table.  ' </table>';
            $contact_table=$contact_table.  ' </div>';
} else {
    $first_name = 'Unknown';
}




//------------------USERS---------------------
$sql = 'SELECT `username`,`name`,`email`,`efamily_id`,`phone`,`status` FROM `users` ORDER BY `name` ASC;';
$results = $con->query($sql);

$users_table="";
if ($results->num_rows > 0) {
    $users_table=$users_table.  '<div class="table-responsive">';
    $users_table=$users_table.  ' <table class="table table-striped">';
    $users_table=$users_table.  '<thead class="thead-inverse"> ';
    $users_table=$users_table.  ' <tr>';
    $users_table=$users_table.  ' <th>Name</th>';
    $users_table=$users_table.  ' <th>Username</th>';
    $users_table=$users_table.  ' <th>Email/Phone Info</th>';
    $users_table=$users_table.  ' <th>ID</th>';
    $users_table=$users_table.  ' <th>Status</th>';
    $users_table=$users_table.  ' </tr>';
    $users_table=$users_table.  '</thead> ';
    $users_table=$users_table.  ' <tbody>';
    // output data of each row
    $count=-1;
    while($row = $results->fetch_assoc()) {
        $count=$count+1;
        if (($count % 2)==0) $users_table=$users_table.  '<tr>';
        $users_table=$users_table.  ' <td>'.$row["name"].'</td>';
        $users_table=$users_table.  ' <td>'.$row["username"].'</td>';
        $users_table=$users_table.  ' <td>'.$row["email"].'/'.$row["phone"].'</td>';
        $users_table=$users_table.  ' <td>'.$row["efamily_id"].'</td>';
        if($row["status"]==1)    $users_table=$users_table.  ' <td>online</td>';  else  $users_table=$users_table.  ' <td>offline</td>';
        if (($count % 2)==0) $users_table=$users_table.  '</tr>';
      }
            //close table
            $users_table=$users_table.  ' </tr>';
            $users_table=$users_table.  ' </tbody>';
            $users_table=$users_table.  ' </table>';
            $users_table=$users_table.  ' </div>';
} else {
    $first_name = 'Unknown';
}

//$con->close(); //dont close yet
 
?>


