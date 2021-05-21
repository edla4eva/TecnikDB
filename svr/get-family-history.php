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



//first get parent name
$first_gen_family_list="";
$first_gen_family_table="";
$news = "";
$news_headline = "";
$family_history = "";
$sql = 'SELECT * FROM admin_data WHERE id=1';
$results = $con->query($sql);

if ($results->num_rows > 0) {
    // output data of each row
    $count=-1;
    while($row = $results->fetch_assoc()) {
        $first_gen_family_list=$first_gen_family_list. $row["family_info"];
        $news =  $row["news_info"];
        $news_headline =  $row["news_headline"];
        
        $family_history = $row["family_history"];
        echo $row["family_info"];
        $count=$count+1;
       
      }
} else {
    $first_name = 'Unknown';
    echo 'Unknown';

}


//$con->close(); //dont close yet

?>


