<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('CONNECTPATH', '');
require_once 'connect.php';

$first_gen_family_table="";
$id=0; //first generation

//--------Static hyperlink list for OBADAN--------------//
$initial_dynamic_tree_input=''; //'Igele,OBADAN'; //some static nodes
$sql = 'SELECT * FROM efamily WHERE parent_idr=1 AND approved=1';
$result = $con->query($sql);
$dynamic_links="";  
//$inner_tree="";
$iCount=0;
if ($result->num_rows > 0) {
    $inner_link='';
    while($row = $result->fetch_assoc()) { // output data of each row
        $iCount++;
        //if ($iCount%8 == 0 ) $inner_link = $inner_link. '<br>';
        $inner_link=$inner_link.'<a href="update.php?search_id='.$row["id"].'&id='.$row["id"].'&search_name='.$row["first_name"].'">'.$row["first_name"].' '.$row["sur_name"]."</a> ";
    }
    $dynamic_links = $inner_link;
} else {
    $dynamic_links='No parent information';

}

//$sql = 'SELECT * FROM efamily WHERE `first_name` like "%ohi%" or `sur_name` LIKE "%ohi%" AND approved=1 ORDER BY `efamily`.`first_name` DESC';
$sql = 'SELECT * FROM efamily WHERE `first_name` like "%'.$search_str.'%" or `sur_name` LIKE "%'.$search_str.'%" AND approved=1 ORDER BY `efamily`.`first_name` ASC LIMIT 5';

$results = $con->query($sql);
$searched = "You Searched for -".$search_str;
if ($results->num_rows > 0) {
    // output data of each row
    $first_gen_family_table=$first_gen_family_table.  '<h4>Search Results</h4>';
    $first_gen_family_table=$first_gen_family_table.  '<div class="table-responsive">';
    $first_gen_family_table=$first_gen_family_table.  ' <table class="table table-striped">';
    $first_gen_family_table=$first_gen_family_table.  '<thead class="thead-inverse"> ';
    $first_gen_family_table=$first_gen_family_table.  ' <tr>';
    $first_gen_family_table=$first_gen_family_table.  ' <th>Name</th>';
    //$first_gen_family_table=$first_gen_family_table.  ' <th>Gender</th>';
    $first_gen_family_table=$first_gen_family_table.  ' <th>ID</th>';
    $first_gen_family_table=$first_gen_family_table.  ' <th></th>';
    $first_gen_family_table=$first_gen_family_table.  ' </tr>';
    $first_gen_family_table=$first_gen_family_table.  '</thead> ';
    $first_gen_family_table=$first_gen_family_table.  ' <tbody>';

    $count=-1;
    while($row = $results->fetch_assoc()) {
        $count=$count+1;
        $first_gen_family_table=$first_gen_family_table.  '<tr>';
        $first_gen_family_table=$first_gen_family_table.  ' <td>'.$row["first_name"]." ".$row["sur_name"].'</td>';
        //$first_gen_family_table=$first_gen_family_table.  ' <td>'.$row["gender"].'</td>';
        $first_gen_family_table=$first_gen_family_table.  ' <td>'.$row["id"].'</td>';
        $first_gen_family_table=$first_gen_family_table.  ' <td><a href="update.php?search_id='.$row["id"].'&id='.$row["id"].'&search_name='.$row["first_name"].'">Use This</a></td>';
       $first_gen_family_table=$first_gen_family_table.  '</tr>';
      }
      //close table
      $first_gen_family_table=$first_gen_family_table.  ' </tr>';
      $first_gen_family_table=$first_gen_family_table.  ' </tbody>';
      $first_gen_family_table=$first_gen_family_table.  ' </table>';
      $first_gen_family_table=$first_gen_family_table.  ' </div>';
} else {
    $first_gen_family_table="No record found";

}

$con->close(); //close connection


?>


