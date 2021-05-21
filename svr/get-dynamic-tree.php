<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('CONNECTPATH', '');
require_once 'connect.php';



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
        if ($iCount%8 == 0 ) $inner_link = $inner_link. '<br>';
        $inner_link=$inner_link.'<a href="fulltree.php?id='.$row["id"].'&input='.$initial_dynamic_tree_input.','.$row["first_name"].'">'.$row["first_name"]."</a> ";
    }
    $dynamic_links = $inner_link;
} else {
    $dynamic_links='No immediate family members';

}
//---------------------------------------------------------------------


//-------------Get input and generate array----------------
if (!isset($input)) {
$dynamic_tree_input=''; //'Igele,OBADAN'; //some static nodes
} else{
    $dynamic_tree_input = $input;
}
$dynamic_tree_input_aray = explode(",",$dynamic_tree_input);
$array_count=2;
$array_count=count($dynamic_tree_input_aray);

//Test values: // $input='Ozolua,Pa,Igele'; // $dynamic_tree_input='Obadan,Alice'; // $dynamic_tree_input_aray=array("Ozolua", "Pa","Igele");
$dynamic_tree_input_prefix ='<ul id="dynamicULStart" class="tree">';
$dynamic_tree_input_suffix='</ul> End of Dynamic Tree';
//Some hardcoded values
$dynamic_tree_input_prefix = $dynamic_tree_input_prefix.'<ul><li><span><a href="#hist">Patrons</a></span>';
$dynamic_tree_input_suffix ='</ul></li>'. $dynamic_tree_input_suffix;
$dynamic_tree_input_prefix = $dynamic_tree_input_prefix.'<ul><li><span>...</span>';
$dynamic_tree_input_suffix ='</ul></li>'. $dynamic_tree_input_suffix;
$dynamic_tree_input_prefix = $dynamic_tree_input_prefix.'<ul><li><span>OBADAN</span>';
$dynamic_tree_input_suffix ='</ul></li>'. $dynamic_tree_input_suffix;
        //lump up all links inside a box (happens once)
        $dynamic_tree_input_prefix = $dynamic_tree_input_prefix.'<ul><li><span>'.$dynamic_links .'</span>'; //
        $dynamic_tree_input_suffix ='</ul></li>'. $dynamic_tree_input_suffix;
$i=0;
for ($i=0;$i<$array_count;$i++){
    $dynamic_tree_input_prefix = $dynamic_tree_input_prefix.'<ul><li><span>'.$dynamic_tree_input_aray[$i].'</span>';
    $dynamic_tree_input_suffix ='</ul></li>'. $dynamic_tree_input_suffix;
}



// //------------first get parent name------------------
// $sql = "SELECT * FROM efamily WHERE id=".$id.' AND approved=1';
// $result = $con->query($sql);
 $inner_parent_tree=  '';
// if ($id>1){  //do for nodes not already  generated only
//     if ($result->num_rows > 0) {
//         //$inner_parent_tree=  ' <ul id="parent">';// output data of each row
//         while($row = $result->fetch_assoc()) {
//            $dynamic_tree_input =$dynamic_tree_input.",".$row["first_name"]; //add the node
//            //$inner_parent_tree=$inner_parent_tree.'<li><span>'.$row["first_name"].">></span></li>";
//           }
//           //$inner_parent_tree=$inner_parent_tree. ' </ul>' ;
//     } else {
//         $dynamic_tree_input =$dynamic_tree_input .",".'Unknown';
//     }
// }
// //----------------------------------------------------------------


//----------------------get inner tree for descenndants----------------------------
$dynamic_tree= $dynamic_tree_input_prefix.$inner_parent_tree.$dynamic_tree_input_suffix;
if ($id>1){
    $sql = "SELECT * FROM efamily WHERE parent_idr=".$id.' AND approved=1';
    $result = $con->query($sql);
    //$inner_tree="";  
    if ($result->num_rows > 0) {
        // output data of each row
        $inner_tree=  ' <ul id="inner">';
        while($row = $result->fetch_assoc()) {
            
            $inner_tree=$inner_tree.'<li><span><a href="fulltree.php?id='.$row["id"].'&input='.$dynamic_tree_input.','.$row["first_name"].'">'.$row["first_name"]."</a></span></li>";
        
        }
        $inner_tree=$inner_tree. ' </ul>' ;
    // $dynamic_tree_input_suffix = '</ul>'. $dynamic_tree_input_suffix; //add closing ul for prefix
        $dynamic_tree= $dynamic_tree_input_prefix.$inner_parent_tree. $inner_tree .$dynamic_tree_input_suffix;

    } else {
        $dynamic_tree=$dynamic_tree_input_prefix.' <ul id="dynamicTreeEmpty" class="tree"><li><span>No immediate family members</span></li></ul>'.$dynamic_tree_input_suffix;

    }
}//end if($id>1)
$con->close();
?>


