<?php
    //header('Content-type: application/json');  causes problems in hosting use calling ajax 
    define('BASEPATH', '');
    define('CONNECTPATH', '');
    require_once 'connect.php';
    //here prepare the query for analyzing, prepared statements use less resources and thus run faster  
    // $row=$db->prepare('select * from efamily WHERE approved = "1"'); //LIMIT 1,100; LIMIT 101,100;  //LIMIT offset rows
    // $row->execute();//execute the query  
    // $json_data=array();//create the array  
    // foreach($row as $rec)//foreach loop  
    // {  
    // $json_array['id']=$rec['id'];  
    //     $json_array['first_name']=$rec['first_name'];   
    //     $json_array['sur_name']=$rec['sur_name'];  
    //     $json_array['parent_idr']=$rec['parent_idr'];  
    //     $json_array['year']=$rec['year']; 
    //     $json_array['gender']=$rec['gender'];   
    //     $json_array['depth']=$rec['parent_idr'];               
    // //here pushing the values in to an array  
    //     array_push($json_data,$json_array);        
    // }  
    // $db_data_json=trim(json_encode($json_data)); 
    // echo $db_data_json; 

// ---------------------------------------
//         Get Immediate Family
//----------------------------------------
//id first_name sur_name title 	parent_idr 	has_children children_names dob year is_alive 	gender 	pix bio paternal_maternal dod other_names
session_start(); /* Starts the session */
if ($_SERVER["REQUEST_METHOD"] == "GET") { //GET criteria from 
    $parent_idr=1;
    $id=1;
    if (isset($_POST["parent_idr"])) 
    {
        $parent_idr = test_input($_GET["parent_idr"]);
        $sql = 'SELECT id, first_name, sur_name, title, parent_idr, has_children, children_names, dob, `year`, 
        is_alive, gender, pix, bio, paternal_maternal, dod, other_names 
        FROM efamily  
        WHERE (approved = "1" AND parent_idr = :parent_idr);';
        $row=$db->prepare($sql);  
        $row->bindParam("parent_idr", $parent_idr);
    } else {
        $id = test_input($_GET["id"]);
        $sql = 'SELECT id, first_name, sur_name, title, parent_idr, has_children, children_names, dob, `year`, 
        is_alive, gender, pix, bio, paternal_maternal, dod, other_names 
        FROM efamily  
        WHERE (approved = "1" AND id = :id);';
        $row=$db->prepare($sql);  
        $row->bindParam("id", $id);
    }
    {    //HIDE ME
        //   $first_name = test_input($_POST["first_name"]);
        //   $sur_name = test_input($_POST["sur_name"]);
        //   $title = test_input($_POST["title"]);
        //   $parent_idr = test_input($_POST["parent_idr"]);
        //   $has_children = test_input($_POST["has_children"]);
        //   $children_names = test_input($_POST["children_names"]);
        //   $dob = test_input($_POST["dob"]);
        //   $year = test_input($_POST["year"]);
        //   $is_alive = test_input($_POST["is_alive"]);
        //   $gender = test_input($_POST["gender"]);
        //   $pix = test_input($_POST["pix"]);
        //   $bio = test_input($_POST["bio"]);
        //   $paternal_maternal = test_input($_POST["paternal_maternal"]);
        //   $dod = test_input($_POST["dod"]);
        //   $other_names = test_input($_POST["other_names"]);
    }


    $row->execute();//execute the query  

    $json_data=array();//create the array  
    foreach($row as $rec)//foreach loop  
    {  
    $json_array['id']=$rec['id'];  
        $json_array['first_name']=$rec['first_name'];   
        $json_array['sur_name']=$rec['sur_name'];  
        $json_array['parent_idr']=$rec['parent_idr'];  
        $json_array['year']=$rec['year']; 
        $json_array['gender']=$rec['gender'];   
        $json_array['depth']=$rec['parent_idr'];               
    //here pushing the values in to an array  
        array_push($json_data,$json_array);        
    }  
    $db_data_json=trim(json_encode($json_data)); 
    echo $db_data_json; 

} 

    // ---------------------------------------
    //                 Functions
    //----------------------------------------
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>
