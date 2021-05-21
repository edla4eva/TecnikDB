<?php

	//Make a list from an array
	function makeList($array) {

		//Base case: an empty array produces no list
		if (empty($array)) return '';

		//Recursive Step: make a list with child lists
		$output = '<ul>';
		foreach ($array as $key => $subArray) {
			$output .= '<li>' . $key . makeList($subArray) . '</li>';
		}
		$output .= '</ul>';
		
		return $output;
    }
 
    function ToUl($input){
        // echo '<ul id="myUL">';
      
         $oldvalue = null;
         foreach($input as $key =>$value){
     
           if($oldvalue != null && !is_array($value))
             echo "</li>"; 
     
           if(is_array($value)){
             echo '<li class="caret">' . 'name' . '<ul class="nested">'.  ToUl($value) .'</ul>'; //. '<ul class="nested"> </ul>';
           }else
          
           if  ($key=='first_name') echo "<li>" . $value . "</li>" ;
            $oldvalue = $value;
          }
      
         //echo "</ul>";
    }

         
    function categoriesToTree(&$json_data) {
    
        $map = array(
            0 => array('Children' => array())
        );
    
        foreach ($json_data as &$category) {
            $category['Children'] = array();
            $map[$category['id']] = &$category;
        }
    
        foreach ($json_data as &$category) {
            $map[$category['parent_idr']]['Children'][] = &$category;
        }
    
        return $map[0]['Children'];
    
    }

	$array = array("Apple"=>array(), "Banana"=>array(), "Tangerine"=>array("Pear"=>array("Walnut"=>array(), "Ice Cream"=>array(), "Candy"=>array()), "Nectar"=>array()), "Honey"=>array(), "Sweets"=>array());
    print_r($array); //test
    echo makeList($array);
    
    define('CONNECTPATH', '');
    require_once 'connect.php' ;
    $row=$db->prepare('select * from efamily');  
      
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
    print_r($json_data); //test
    
    // here creating ul
    $tree = categoriesToTree($json_data); //create tree from array
    echo "=== TREE ===\n";
    print_r ($tree);
    //echo '<ul id="myUL">';
    makeList($tree);  // best option for ul - directly echo the ul
    //echo '</ul>';

    echo '<ul id="myUL">';
    ToUl($tree);  // best option for ul - directly echo the ul
    echo '</ul>';
?>