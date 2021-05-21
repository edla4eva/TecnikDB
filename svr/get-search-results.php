<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('CONNECTPATH', '');
require_once 'connect.php';

$first_gen_family_table="";
$id=0; //first generation


//$sql = 'SELECT * FROM efamily WHERE `first_name` like "%ohi%" or `sur_name` LIKE "%ohi%" AND approved=1 ORDER BY `efamily`.`first_name` DESC';
$sql = 'SELECT * FROM efamily WHERE `first_name` like "%'.$search_str.'%" or `sur_name` LIKE "%'.$search_str.'%" AND approved=1 ORDER BY `efamily`.`first_name` ASC';

$results = $con->query($sql);
$searched = "You Searched for -".$search_str;
if ($results->num_rows > 0) {
    // output data of each row
    $first_gen_family_table=$first_gen_family_table.  '<div class="table-responsive">';
    $first_gen_family_table=$first_gen_family_table.  ' <table class="table table-striped">';
    $first_gen_family_table=$first_gen_family_table.  '<thead class="thead-inverse"> ';
    $first_gen_family_table=$first_gen_family_table.  ' <tr>';
    $first_gen_family_table=$first_gen_family_table.  ' <th>Name</th>';
    $first_gen_family_table=$first_gen_family_table.  ' <th>Gender</th>';
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
        $first_gen_family_table=$first_gen_family_table.  ' <td>'.$row["gender"].'</td>';
        $first_gen_family_table=$first_gen_family_table.  ' <td>'.$row["id"].'</td>';
        $first_gen_family_table=$first_gen_family_table.  ' <td><a href="tree.php?id='.$row["id"].'">View profile</a></td>';
       $first_gen_family_table=$first_gen_family_table.  '</tr>';
      }
      //close table
      $first_gen_family_table=$first_gen_family_table.  ' </tr>';
      $first_gen_family_table=$first_gen_family_table.  ' </tbody>';
      $first_gen_family_table=$first_gen_family_table.  ' </table>';
      $first_gen_family_table=$first_gen_family_table.  ' </div>';

      $first_gen_family_table= $searched."<br>".$first_gen_family_table;
} else {
    $first_gen_family_table="No record found";

}

$con->close(); //close connection


?>


