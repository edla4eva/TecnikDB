<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('CONNECTPATH', '');
require_once 'connect.php';

$efamily_id=0;
$bio="";
$id=0; //first generation

//get counts
$count_all=0; $index_welcome="";
$sql = "SELECT * FROM webapp WHERE app_segment=`index_welcome` AND approved=1";
$results = $con->query($sql);
$results = $con->query($sql);

if ($results->num_rows > 0) {
    // output data of each row
    $count=-1;
    while($row = $results->fetch_assoc()) {
        $index_welcome=$index_welcome. $row["content"];
        $count=$count+1;
       
      }
      echo $index_welcome;
} else {
    echo 'Unknown';

}




//news
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


