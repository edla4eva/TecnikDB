
    <?php  
    defined('BASEPATH') OR exit('No direct script access allowed');
    header('Content-type: application/json');
    //PDO is a extension which  defines a lightweight, consistent interface for accessing databases in PHP.  
    $db=new PDO('mysql:dbname=efamily;host=localhost;','root','');  
    //here prepare the query for analyzing, prepared statements use less resources and thus run faster  
    $row=$db->prepare('select * from efamily where id=4');  
      
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
        $json_array['bio']=$rec['bio'];               
    //here pushing the values in to an array  
        array_push($json_data,$json_array);        
    }  

    
    //built in PHP function to encode the data in to JSON format 
    $db_data_json=trim(json_encode($json_data)); 
    echo $db_data_json;  
   // echo "{"bio": "...."}";
    //$json_decode = htmlspecialchars(json_encode($json_data), ENT_QUOTES, 'UTF-8');




    
      
    ?>  