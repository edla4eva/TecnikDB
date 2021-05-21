<?php 
    define('CONNECTPATH', '');
    require_once 'connect.php';
    session_start(); /* Starts the session */
    /* Check Login form submitted */
    if(isset($_POST['submit'])){
        $contact_info="";
        $phone="";
        $inputEmail="";
        $username="";
        $date="";
    /* Check and assign submitted Username and Password to new variable */
    $username = isset($_POST['username']) ? test_input($_POST['username']) : '';
    $inputEmail = isset($_POST['inputEmail']) ? test_input($_POST['inputEmail']) : '';
   
    $phone = isset($_POST['phone']) ? test_input($_POST['phone']) : '';
    $contact_info = isset($_POST['request']) ? test_input($_POST['request']) : '';
        $date=date('Y-m-d');

    /* Check Username and Password existence in db */
    if ($con->connect_error) {
        error_log("Connection failed: " . $con->connect_error);
    }
    
//INSERT INTO `efamily_contact` (`id`, `email`, `phone`, `contact_info`, `contact_date`) 
// VALUES (NULL, 'user@usr.co', '123456789', 'Great Job!', '2020-12-01'); 

//
    $sql = 'INSERT INTO `efamily_contact` (`id`, `email`, `phone`, `contact_info`, `contact_date`)';
    $sql = $sql.' VALUES (NULL, ?,?,?,?);';
    try{
        $row = $con->prepare($sql);
        $row->bind_param( "ssss",$inputEmail, $phone, $contact_info, $date);

        
        $row->execute();
        $result=$row->get_result();//print_r($result);
        


        if($result->num_rows>0){

            //We cant add tell user
            $msg="<span style='color:red'>Invalid Login Details</span>";
            header("location:../guide.php?msg=-1"); //-1 usename exists
            exit; //000webhost
        } else {
            $con->close();
            header("location:../guide.php?msg=1");
            exit; //000webhost

        }

    $con->close();
    exit; //000webhost
    } catch(Exception $e) {
        //We cant add tell user
        $msg="<span style='color:red'>Invalid Login Details</span>";
        header("location:../signup.php?msg=-2");
        exit; //000webhost alsomake sure there is no echo stmt

    }
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


