
    <?php 
    
    define('CONNECTPATH', '');//define('BASEPATH', '');
    
    require_once('connect.php') ;
   
    $row=$db->prepare('select * from efamily WHERE approved = "1"');  
    $row->execute();//execute the query  
    $json_data=array();//create the array 
    $first_name_array=array();//create the array 
    $i=0; 
    echo '<ul id="myULSearch" class="list-group" style="display: none;>';
    foreach($row as $rec)//foreach loop  
    {  
        echo '<li class="list-group-item d-flex justify-content-between  align-items-center"><a>' . $rec['first_name'].'</a><span class="badge badge-secondary badge-pill">' .$rec['id']. '</span></li>';
        //echo '<li class=text-success> jjj</li>';
        //$first_name_array[$i]=$rec['first_name']; 
       // array_push($first_name_array,$rec['first_name']); 
        //$i=i+1;
      
    }  
    echo "</ul>";
      //printArrayList($first_name_array); 



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